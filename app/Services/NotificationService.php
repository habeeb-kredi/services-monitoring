<?php
namespace App\Services;

use App\Models\Service;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Spatie\SlackAlerts\Facades\SlackAlert;

class NotificationService
{
    public function serviceChecker($method, $serviceUrl, $serp="")
    {
        // $response = Http::get("https://services.thekredibank.com/api/v1/health-check");
        
        try{
            $response = Http::$method($serviceUrl);
            if($response->failed()){ 
                // Log::debug("Service: {$serviceUrl} - StatusCode: {$response->status()}");
                // SlackAlert::message("Service: {$serviceUrl} - StatusCode: {$response->status()}");
                // Log::debug($response->failed());
                return ["status"=>false, "code"=>$response->status()];
            }
        }catch(ConnectionException){ 
            return false;
        } 
        Log::debug("Success");
        return ["status"=>true, "code"=>$response->status()];
         
    }

    public function notification()
    {
        $sites = Service::with('developers')->get()->toArray();
        foreach($sites as $site){
       
         
        $checkService = $this->serviceChecker($site['http_method'], $site['service_url'], $serp="");
        if($checkService["status"] === false){
            $currentDate = \Carbon\Carbon::now()->toDateTimeString(); 
            if($site['downtime'] == null){
            Service::where('id', $site['id'])->update(['downtime'=> $currentDate]);
            }

            $to = \Carbon\Carbon::parse($site['downtime']);
            $from = \Carbon\Carbon::parse(now());
            $minutes = $to->diffInMinutes($from);

            // return $to.'--'. $from .' : '.$minutes;
            $setAlarm = $minutes % 5;
            $timeSinceDowntime = \Carbon\Carbon::parse($site['downtime'])->diffForHumans(); 
            if($setAlarm === 0)
            {
                SlackAlert::message("Service: {$site['service_url']} - StatusCode: {$checkService["code"]}");
                // Log::debug("Hi, {$site['developers']['fullname']} *{$site['service_name']}* is currently experiencing downtime since _{$timeSinceDowntime}_. Kindly check and restore service!");
                SlackAlert::message("Hi, {$site['developers']['fullname']} *{$site['service_name']}* is currently experiencing downtime since _{$timeSinceDowntime}_. Kindly check and restore service!");
            }
           
            
        }else{
            Service::where('id', $site['id'])->update(['downtime'=> null]);
            // $site->update(['downtime'=> null]);
        }

        echo $site['service_url'];
    }

    }
   
}