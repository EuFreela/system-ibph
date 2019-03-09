<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\AlphaNumPointRules;
use Illuminate\Mail\Mailer;
use App\Mail\RecoveryCodMail;
use DB;
use Mail;

class AccountController extends Controller
{
    /**
    * GETTERS
    *
    */
    public function getSignin()
    {   
        return view('account.signin');
    }
    
    public function getRecovery()
    {
        return view('account.recovery');
    }

    /**
     * POSTTERS
     */
    public function postSignin(Request $request)
    {
        $request->validate([
            'Email' => 'required|email',
            'Codigo_Avaliacao' => ['required',new AlphaNumPointRules()]
        ]);

        if(DB::table('Inscricao')->whereRaw('email=? and codigoAvaliacao=?',[$request->Email,$request->Codigo_Avaliacao])->count()>0)
            return redirect()->route('wheel.mywheel',[$request->Email,$request->Codigo_Avaliacao]);
        
        return redirect()->back()->with('error','E-mail ou Código inválidos');
    }

    public function postRecovery(Request $request, Mailer $mailer)
    {
        $request->validate([
            'Email' => 'required|email'
        ]);              
        
        $client = DB::table('Inscricao')->where('email','=',$request->Email)->first();
       
        Mail::to($request->Email)        
        ->send(new RecoveryCodMail($client->nome,$client->codigoAvaliacao));
              
        return redirect()->back()->with('success', 'Sucesso! Verifique sua caixa de email.');
    }



}
