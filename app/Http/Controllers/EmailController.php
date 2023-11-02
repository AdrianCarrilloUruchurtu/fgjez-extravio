<?php

namespace App\Http\Controllers;
use Dompdf\Dompdf;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailManager;
use Dompdf\Adapter\PDFLib;

class EmailController extends Controller
{
    //
    public function sendEmail($extraviado,$estatus)
{
    $nombre = $extraviado->Nombre;
    $correo = $extraviado->Correo;

    Mail::to($correo)->send(new MailManager());

    if($estatus == 0){
        // Enviar mail de todo ok y la constancia
        return view('sendEmail',$nombre);
    }elseif($estatus == 1){
        // Enviar mail de volver a generar reporte
    }
    
}

public function generatePdf(Request $request)
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml('hello world');
        $dompdf->render();
        $output = $dompdf->output();
        $namepdf = "Constancia extravío"."pdf";
        $path = '../../PDFDOC/'.$namepdf;
        file_put_contents($path,$output);
    
    }
}
