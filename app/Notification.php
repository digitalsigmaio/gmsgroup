<?php

namespace App;


use Illuminate\Support\Facades\Log;

class Notification extends Device
{
	const TYPE = 'news';
    const URL = "https://fcm.googleapis.com/fcm/send";
    const HEADERS = [
    	'Accept: application/json',
    	'Content-Type: application/json',
        'Authorization: key=AIzaSyBtC73DptdfWi6medMAVdodCe0nSrAneKo'
    ];

    public $report = '';



    private  static function send(array $tokens, array $message)
    {

        $fields = [
            'registration_ids' => $tokens,
            'data' => $message
        ];
        if (count($tokens) > 0 && $message != '')
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

        return count($tokens);
    }

    public static function response_report($response)
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

    public function notification($message)
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
