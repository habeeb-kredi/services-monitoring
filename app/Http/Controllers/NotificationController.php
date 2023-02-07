<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Services\NotificationService;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NotificationController extends Controller
{
   public function notification()
   {
        return app(NotificationService::class)->notification();
   }
}
