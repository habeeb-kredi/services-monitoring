<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function register(Request $request)
    {
        Service::create([
            "service_url" => $request->service_url,
            "service_name" => $request->service_name,
            "developer_id" => $request->developer_id,
            "http_method" => $request->http_method
        ]);
    }
}


// SELECT `id`, `service_url`, `service_name`, `downtime`, `downtime_message`, `developer_id`, `http_method`, `serp`, `created_at`, `updated_at` FROM `services` WHERE 1