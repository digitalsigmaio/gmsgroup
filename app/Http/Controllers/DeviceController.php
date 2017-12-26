<?php

namespace App\Http\Controllers;

use App\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DeviceController extends Controller
{
    /*
     * Store new device token to the database
     *
     * @param Illuminate\Http\Request
     * @return JsonResponse
     **/
    public function store(Request $request)
    {
        $device = new Device;
        // Logging new devices for testing
        // Log::useDailyFiles(storage_path() . '/logs/new_device.log');
        // Log::info(['Report' => $request->token]);
	
		if (isset($request->token) && $request->token != null) {
			$device->token = $request->token;
			$device->save();
			return response()->json(['message' => 'device has been saved', 'status' => 200], 200);
		} else {
			return response()->json(['message' => 'token is empty or null', 'status' => 401], 401);
		}
    }
}
