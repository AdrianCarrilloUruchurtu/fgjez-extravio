<?php

namespace App\Http\Controllers;

use App\Mail\MailBox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Dompdf\Dompdf;



class MailController extends Controller
{
    public function sendMail(Request $request){



        $extraviado = $request->input('nombre');
        $descripcion = $request->input('descripcion');
        $fechaExtravio = $request->input('fechaExtravio');
        $lugarExtravio = $request->input('lugarExtravio');
        $fechaActual = now();
        $estatus = $request->input('estatus');
        $email = $request->input('email');
      
        

        $dompdf = new Dompdf();
        $html = view('emails.pdf_constancia', compact('extraviado', 'descripcion', 'fechaExtravio', 'lugarExtravio', 'fechaActual'));

        $dompdf->loadHtml($html);
        $dompdf->render();
        $output = $dompdf->output();
        $namepdf = "Constancia_extravio_".$extraviado.".pdf";
        $path = 'PDFDOC/'.$namepdf;
        file_put_contents($path,$output);

        $correo = new MailBox($extraviado,$estatus);
        $correo->attach($path,['as'=>$namepdf,'mime'=>'application/pdf']);
        $envioExitoso=Mail::to($email)->send($correo);
        // echo var_dump(Mail::to('carrilloadrian62@gmail.com')->send(new MailBox()));
        // exit;
        if ($envioExitoso) {
        return redirect()->back()->with('success', 'Correo enviado con éxito');
         } else {
        return redirect()->back()->with('error', 'No se pudo enviar el correo');
            }
            }
}
