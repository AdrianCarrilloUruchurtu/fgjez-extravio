<?php

namespace App\Http\Controllers;

use App\Mail\MailBox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    // public function index()
    // {
    //     //
    // }
    public function sendMail(){
        Mail::to('carrilloadrian62@gmail.com')->send(new MailBox());
        return view('empleado');
    }
}
