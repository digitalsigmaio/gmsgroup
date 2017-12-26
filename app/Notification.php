<?php

namespace App;


use Illuminate\Support\Facades\Log;

class Notification extends Device
{
    /*
     * Constant value for Notification type
     *
     * @var string
     * */
	const TYPE = 'news';

	/*
	 * Constant value for Firebase endpoint
	 *
	 * @var string
	 * */
    const URL = "https://fcm.googleapis.com/fcm/send";

    /*
     * Default parameters for headers
     *
     * @var array
     * */
    const HEADERS = [
    	'Accept: application/json',
    	'Content-Type: application/json',
        'Authorization: key=AIzaSyBtC73DptdfWi6medMAVdodCe0nSrAneKo'
    ];

    /*
     * Sent notification report
     *
     * @val string
     * */
    public $report = '';


    /*
     * Send push notification to Firebase
     *
     * @param array $tokens
     * @param array $message
     * @return object $response
     * */
    private  static function send(array $tokens, array $message)
    {
        /*
         * Required fields for HttpRequest to Firebase
         *
         * @var array
         * */
        $fields = [
            'registration_ids' => $tokens,
            'data' => $message
        ];


        if (count($tokens) > 0 && $message != '')  // Check if tokens exist in database
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, self::URL);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, self::HEADERS);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
            
            $response = curl_exec($ch);
            
            curl_close($ch);
           
            if ($response)
            {
                return json_decode($response);
            } else {
                return curl_error($ch);
            }

        }

        return null;  // Return null if there's no tokens in database
    }

    /*
     * Gives a report about sent notification
     *
     * @param object $response
     * @return string
     * */
    public static function response_report(array $response)
    {
        $success = 0;
        $failure = 0;

        foreach ($response as $item){
            $success += $item['success'];
            $failure += $item['failure'];
        }
        $device_count = $success + $failure;
        $request_count = count($response);
        $report = 'Total devices: ' . $device_count . ', Total requests: ' . $request_count . ', Total success: ' . $success . ', Total failure: ' . $failure;
        Log::useDailyFiles(storage_path() . '/logs/notifications_report.log');
        Log::info(['Report' => $report]);


        return $report;
    }

    /*
     * Fetch tokens in database and divide them to chunks by 500
     * And pass to send() method
     *
     * @param array $message
     * @return void
     * */
    public function notification(array $message)
    {
        $tokens = self::tokens();
        $tokens_chunk = array_chunk($tokens, 500);

        $response = [];
        foreach ($tokens_chunk as $group) {
            $ticket = self::send($group, $message);
            if($ticket){
                $response_array = [];
                $response_array['success'] = $ticket->success;
                $response_array['failure'] = $ticket->failure;
                $response[] = $response_array;
            }

        }
		/*
        $token = ["fX2WvKeQq_I:APA91bGb_ERVzKONVyBR65VFAA6GHTGOkeRscGH9xgD0TV7lspxA_iUQ28GSTDbgJsrnDm71p5uhT7v7obMHtX8ufNHMke6VzrTGftaOdCkbRnzVexPDo4H0E5_vzMMcKax-a_1qsG7Q", "fLO-0E5Y2XE:APA91bH26axA-q0JUgVTjYZ-8gg7mjUru7qhtvxZvb8cQ0UMcA2C0_I6BlLi1AEVI4rLp558e4JnfqOzVNb-eStAKqBUzxtugjZfNHkxjUvwv2rd2kH1DMVx9AHHJ7HE0RRxlWabt-A-"];
        $ticket = self::send($token, $message);
      	if($ticket){
                $response_array = [];
                $response_array['success'] = $ticket->success;
                $response_array['failure'] = $ticket->failure;
                $response[] = $response_array;
            }
			*/
        $this->report = self::response_report($response);
    }
}
