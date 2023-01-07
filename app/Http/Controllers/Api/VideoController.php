<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    const STATUS_CODE = [
        'success' => 200,
        'internalError' => 500
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $responseCode = self::STATUS_CODE['success'];
        $responseMsg = "ok";
        try {
            $apiUrl = "https://1oltxev2o5.execute-api.ap-northeast-1.amazonaws.com/subtitle_modify";
            $vid = $request->input('vid');
            $index = $request->input('index');
            $twTxt = $request->input('tw');
            $jpTxt = $request->input('jp');

            $client = new \GuzzleHttp\Client();

            $response = $client->request(
                'POST',
                $apiUrl,
                [
                    'json'=>  $request->all()
                ]
            );

            if ($response->getStatusCode() != self::STATUS_CODE['success']) {
                throw new \Exception($response->getBody(true));
            }
            return response()->json($responseMsg, $responseCode);
        } catch ( \Exception $ex ) {
            $responseCode = self::STATUS_CODE['internalError'];
            $responseMsg = $ex->getMessage();
            return response()->json($responseMsg, $responseCode);
        }
    }
}
