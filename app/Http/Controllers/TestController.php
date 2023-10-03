<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    public function sedMensad()
    {
        try{
            $token = 'EAATd9zYLfFoBOxbQaB0ZCdrBBWR1JDhxoU9n9CrldymMOZBpBkgZCXZATM6iG162aehrGeP860v46XKa16LsGAv8TvVXZCGtMETmDPHyVwBa13LkmgSZAfhQMWEwNCn0xpIRDirgccvzsMmLOGB1DgKaQanareNohiHaBQKnbHMGZC32ykhGudeKkmeiMvzjqaEl7pbCCYhk5PWdEafVdAZD';
        $phoneId ='153886304464407';
        $version = 'v17.0';
        $payload = [
            'messaging_product' => 'whatsapp',
            'to' => '573024709509',
            'type' => 'template',
            "template" => [
                "name" => "hello_world",
                "language" => [
                    "code" => "en_US"
                ]

            ]


        ];
        
        $message = Http::withToken($token)->post('https://graph.facebook.com/' . $version . '/'  . $phoneId . '/messages', $payload)->throw()->json();

        return response()->json([
            'success' => true,
            'data' => $message,
           ],200);

        }
        catch (Exception $e){
            return response()->json([
                'success' => true,
                'error' => $e->getMessage(),
            
            ],500);
        }
        

    }
}
