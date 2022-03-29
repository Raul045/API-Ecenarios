<?php

namespace App\Http\Controllers\Mails;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Mailjet\Resources;

class Correo extends Controller
{
    public function emailbody(){
        $apikey = config('app.mjapikeypub');
        $apisecret = config('app.mjapikeypriv');
        $mj = new \Mailjet\Client($apikey,$apisecret,true,['version' => 'v3.1']);
        $body = [
            'Messages' => [
              [
                'From' => [
                  'Email' => "19170038@uttcampus.edu.mx",
                  'Name' => "Raul Alejandro"
                ],
                'To' => [
                  [
                    'Email' => "19170038@uttcampus.edu.mx",
                    'Name' => "Raul Alejandro"
                  ]
                ],
                'Subject' => "Bienvenido a la familia",
                'TextPart' => "Ya casi terminamos con tu registro",
                'HTMLPart' => "<h3>Si tienes alguna duda contactanos </h3><br />May the delivery force be with you!",
                'CustomID' => "AppGettingStartedTest"
              ]
            ]
          ];
          $response = $mj->post(Resources::$Email, ['body' => $body]);
            //$response->success() && var_dump($response->getData());
          if($response->success())
            return response()->json(["data"=>$response->getData()],200);
          return response()->json(["data"=>$response->getData()],500);
        
    }
}
