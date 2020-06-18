<?php

namespace App\Http\Controllers;

use App\Mail\MessageReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function store()
    {
        $message=request()->validate(
            [
                'name'=>'required',
                'email'=>'required|email',
                'subject'=>'required',
                'content'=>'required|min:4',
            ]
            );

            //enviar email
            
            Mail::to('jessica@aprendible.com')->queue(new MessageReceived($message));
            //guardar un mensaje de sesion
            return redirect()->route('contacto')->with('status','Recibimos su mensaje');
           
    }
}
