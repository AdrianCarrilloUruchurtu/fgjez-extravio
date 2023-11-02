<?php

namespace App\Http\Controllers;

use App\Mail\MailBox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Dompdf\Dompdf;



class MailController extends Controller
{
    /**
     * [Description for sendMail]
     *  Función para controlar el envío de correos
     *  
     *  Se usa request para almacenar los datos que envia la vista index
     *  del empleado, una vez almacenados se genera el pdf con algunos de
     *  los datos se almacena el PDF y después se manda el correo con los 
     *  datos pertinentes
     * 
     */
    public function sendMail(Request $request){

        $extraviado = $request->input('nombre');
        $nombreExtrav = $request->input('nombreExtrav');
        $descripcion = $request->input('descripcion');
        $descripHechos = $request->input('descripHechos');
        $fechaExtravio = $request->input('fechaExtravio');
        $lugarExtravio = $request->input('lugarExtravio');
        $fechaActual = now();
        $estatus = $request->input('estatus');
        $email = $request->input('email');
        $curp = $request->input('curp');
      
        

        $dompdf = new Dompdf();
        $html = view('emails.pdf_constancia', compact('extraviado', 'nombreExtrav','curp', 'descripcion','descripHechos', 'fechaExtravio', 'lugarExtravio', 'fechaActual'));

        $dompdf->loadHtml($html);
        $dompdf->render();
        $output = $dompdf->output();
        $namepdf = "Constancia_extravio_".$extraviado.".pdf";
        $path = 'PDFDOC/'.$namepdf;
        file_put_contents($path,$output);

        $correo = new MailBox($extraviado,$estatus);
        $correo->attach($path,['as'=>$namepdf,'mime'=>'application/pdf']);
        $envioExitoso=Mail::to($email)->send($correo);
       
        if ($envioExitoso) {
        return redirect()->back()->with('success', 'Correo enviado con éxito');
         } else {
        return redirect()->back()->with('error', 'No se pudo enviar el correo');
            }
            }
}
