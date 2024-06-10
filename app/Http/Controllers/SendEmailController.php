<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use Illuminate\Http\Request;
use App\Models\Provider;

class SendEmailController extends Controller
{
    public function __invoke(Provider $provider)
    {
        SendEmail::dispatch($provider);
    }
}
