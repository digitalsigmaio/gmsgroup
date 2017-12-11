<?php

namespace App;


use Illuminate\Support\Facades\Log;

class Notification extends Device
{
    const URL = "https://fcm.googleapis.com/fcm/send";
    const HEADERS = [
        'Authorization: Bearer AIzaSyA64wlqh9py1DvVOj6N3Rd52uN1CfJtJos',
        'Content-Type: application/json'
    ];

    public $report = '';



    private  static function send($tokens, $message)
    {

        $fields = [
            'registration_ids' => $tokens,
            'data' => $message
        ];
        if (count($tokens) > 0 && $message != '')
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, self::URL);
            curl_setopt($ch, CURLOPT_HTTPHEADER, self::HEADERS);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);
            if ($response)
            {
                return json_decode($response);
            } else {
                return false;
            }
        }

        return false;
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

        $this->report = self::response_report($response);
    }
}
