<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendContactMail;
use App\Mail\SendEmailScheduleMail;
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

    public function sendEmailSchedule(Request $request)
    {
        
        $request->validate([
            'Nome' => 'required',
            'Email' => 'required|email',
            'Telefone' => 'required',
            'Mensagem' => 'required'
        ]);              
        
        Mail::to(env('MAIL_CONTACT'))
        ->send(new SendEmailScheduleMail($request->Nome,$request->Email,$request->Telefone,$request->Mensagem));
        
        return redirect()->to(url()->previous().'#contact')
        ->with('success_mail','Email enviado!'); 
    }



}
