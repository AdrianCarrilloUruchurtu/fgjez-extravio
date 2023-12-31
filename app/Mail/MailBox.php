<?php

namespace App\Mail;

use Illuminate\Mail\Mailables\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailBox extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $estatus;
    /**
     * Create a new message instance.
     */
    public function __construct($nombre,$estatus)
    {
        //
        $this->nombre=$nombre;
        $this->estatus=$estatus;


    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('fgjez@fgjez.mx','FGJEZ'),
            subject: 'Reporte revisado',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content( ): Content
    {
        
        $nombre = $this->nombre;
        $estatus = $this->estatus;
        if($estatus=='correcto'){
            $doc = 'mailDocCorrecta';
        }
        elseif($estatus=='incorrecto'){
            $doc = 'mailDocIncorrecta';
        }
        return new Content(
            view:$doc,
            with:[$nombre]
        );

    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    // public function build(){
    //     return $this->view('sendMail');
    // }
}
