<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendWelcomeEmail;
use App\Jobs\SendContactFormEmail;
use Carbon\Carbon;

class JobController extends Controller
{
    public function processQueue()
    {
        //$emailJob = new SendContactFormEmail();
        $emailJob = (new SendContactFormEmail())->delay(Carbon::now()->addMinutes(1));
        dispatch($emailJob);
    }
}
