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










    public function sendVideoCallMesage($userModel,$message)
    {
        $content = [
            'subject' => 'MedlifeiLink Appoinment VideoCall',
            'model' => $userModel,
            'view' => 'mails.videocallrequest',
            'message' => $message,
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


    public function forgetPasswordMail($userModel,$otp)
    {
        $content = [
            'subject' => 'Forget password request',
            'model' => $userModel,
            'view' => 'mails.forgetpassword',
            'otp'=>$otp
        ];

        Mail::to($content['model']->email)->send(new SampleMail($content));

        //return "Email has been sent.";
    }

    public function notification($userModel,$subject,$message)
    {
        $content = [
            'subject' => $subject,
            'model' => $userModel,
            'view' => 'mails.notification',
            'message'=>$message
        ];

        Mail::to($content['model']->email)->send(new SampleMail($content));

        //return "Email has been sent.";
    }
}
