<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DrewM\MailChimp\MailChimp;
use Spatie\Newsletter\Facades\Newsletter;


class NewsletterController extends Controller
{
    // public function subscribe(Request $request)
    // {

    //     $email = $request->input('email');

    //     Newsletter::subscribe($email);

    //     return redirect()->back()->with('success', 'You have been subscribed to our newsletter.');
    // }

    // public function unsubscribe(Request $request)
    // {
    //     $email = $request->input('email');

    //   Newsletter::unsubscribe($email);

    //     return redirect()->back()->with('success', 'You have been unsubscribed from our newsletter.');
    // }



    // public function subscribe(Request $request)
    // {
    //     $apiKey = 'f572ac13fa0683df4004701a512eebd7-us21';
    //     $listId = '9c784bbac6';
    //     $email = $request->input('email');

    //     $mailchimp = new MailChimp($apiKey);

    //     $result = $mailchimp->post("lists/$listId/members", [
    //         'email_address' => $email,
    //         'status' => 'subscribed',
    //     ]);

    //     if ($mailchimp->success()) {
    //         return "Subscribed successfully!";
    //     } else {
    //         return "Error: " . $mailchimp->getLastError();
    //     }
    // }
    public function subscribe(Request $request)
    {
        $apiKey = 'f572ac13fa0683df4004701a512eebd7-us21';
        $listId = '9c784bbac6';
        $email = $request->input('email');
    
        $mailchimp = new MailChimp($apiKey);
    
        // Attempt to subscribe the email address
        $result = $mailchimp->post("lists/$listId/members", [
            'email_address' => $email,
            'status' => 'subscribed',
        ]);
    
        if ($mailchimp->success()) {
            toastr()->success('Subscribed successfully');
            return redirect()->back(); 


        } elseif ($result['status'] === 400 && $result['title'] === 'Member Exists') {
            toastr()->info('Email address is already subscribed!');
            return redirect()->back(); 


        } else {
            return "Error: " . $mailchimp->getLastError();
        }
    }
    


}
