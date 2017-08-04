<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sendEmail(Request $request)
    {

    }

}
