<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs; // Ensure this is the correct namespace for your ContactUs Mailable
use App\Mail\Enquiry;

class ContactController extends Controller
{
    public function send()
    {
        // Mail::raw('Hello everyone', function($message){
        //     $message->to('shadow902@gmail.com')
        //             ->subject('Welcome')
        //             ->from('gamma-alpha-admin@ibshadownet2.com');
        //     });

        // $toEmail = 'shadow902@gmail.com';
        // $subject = 'Simple Test Email';
        // $fromEmail = 'gamma-alpha-admin@ibshadownet2.com';
        // $messageContent = 'This is just another simple test email.';

        // Mail::raw($messageContent, function(Message $message) use ($toEmail, $subject, $fromEmail){
        //     $message->to($toEmail)
        //             ->subject($subject)
        //             ->from($fromEmail);
        //     });

        $toEmail = 'shadow902@gmail.com';
        $subject = 'Simple Test Email';
        $fromEmail = 'gamma-alpha-admin@ibshadownet2.com';
        $htmlContent = '<h3>This is test HTML email.</h3> <p>This is the body of the email.</p><div><img src="https://i.imgur.com/QMe4I54.png" width=100 height=100 /></div>';

        Mail::html($htmlContent, function(Message $message) use ($toEmail, $subject, $fromEmail){
            $message->to($toEmail)
                    ->subject($subject)
                    ->from($fromEmail);
            }); 
        
        // Mail::to('janedoe@gmail.com') ->send(new ContactUs());
        // return 'Mailable Email sent successfully!';
    }

    public function show()
    {
        return view('guest_pages.contact-form');
    }

    public function sendEnquiry (Request $request)
    {
         $data = $request->validate([
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|email|max:255',
            'messageContent' => 'required|string|min:5',
        ]);

        // dd($data);
        Mail::to('janedoe@gmail.com') ->send(new Enquiry($data));
        // dd('Enquiry Email sent successfully!');
        return redirect()->back()->with('success', 'Message sent successfully!');
        
    }
}
