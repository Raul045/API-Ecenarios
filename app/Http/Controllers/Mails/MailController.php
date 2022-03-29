<?php

namespace App\Http\Controllers\Mails;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Mailjet\Resources;
use App\Mail\CorreoController;

class MailController extends Controller
{
    public function EnviarCorreos(){
       $correo = Mail::to('19170038@uttcampus.edu.mx')->send(new CorreoController());
       return response()->json(["Correo"=>$correo],200);

    }
}
