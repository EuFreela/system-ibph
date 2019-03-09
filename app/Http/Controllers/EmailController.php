<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendContactMail;
use Mail;

class EmailController extends Controller
{
    /**
     * POSTTERS
     */
    public function sendEmail(Request $request)
    {
        $request->validate([
            'Email' => 'required|email',
            'Assunto' => 'required',
            'MSG' => 'required'
        ]);              
        
        Mail::to(env('MAIL_CONTACT'))
        ->send(new SendContactMail($request->Nome,$request->Email,$request->MSG));
        
        return redirect()->to($request->endereco.'#send-msg')
        ->with('success','Email enviado!'); 
    }



}
