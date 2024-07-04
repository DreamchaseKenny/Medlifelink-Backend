<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use App\Mail\SampleMail;

class MailController extends Controller
{
    //
    public function sendWelcomeMail($userModel)
    {
        $content = [
            'subject' => 'Welcome to medlifeiLink',
            'model' => $userModel,
            'view' => 'mails.welcome'
        ];

        Mail::to($content['model']->email)->send(new SampleMail($content));

        //return "Email has been sent.";
    }

    public function appointmentMail($appointment,$user,$message)
    {
        $content = [
            'subject' => 'MdlifeLink Appointment',
            'message' => $message,
            'appointment' => $appointment,
            'user' => $user,
            'view' => 'mails.appointment'
        ];

        Mail::to($content['user']->email)->send(new SampleMail($content));

        //return "Email has been sent.";
    }
}
