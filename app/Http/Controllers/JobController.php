<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendWelcomeEmail;
use App\Jobs\SendContactFormEmail;

class JobController extends Controller
{
    public function processQueue()
    {
        $emailJob = new SendContactFormEmail();
        dispatch($emailJob);
    }
}
