<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function noHeader(Request $request)
    {
        $apiUrl = "https://1oltxev2o5.execute-api.ap-northeast-1.amazonaws.com/subtitle_modify";
        $response = Http::post($apiUrl, [
            'vid' => '0yKmBMQ44HU',
            'index' => 1,
            'jp' => 'えっと、AさんとBさんが同じ場所から池に沿って反対方向に進みました。',
            'tw' => '嗯，A和b從同一個地方沿著池子向相反的方向走去。'
        ]);

        var_dump($response);
    }

    public function withHeader(Request $request)
    {
        $apiUrl = "https://1oltxev2o5.execute-api.ap-northeast-1.amazonaws.com/subtitle_modify";

        $response = Http::withHeaders([
            'Access-Control-Allow-Origin' => '*'
        ])->post($apiUrl, [
            'vid' => '0yKmBMQ44HU',
            'index' => 1,
            'jp' => 'えっと、AさんとBさんが同じ場所から池に沿って反対方向に進みました。',
            'tw' => '嗯，A和b從同一個地方沿著池子向相反的方向走去。'
        ]);

        var_dump($response);
    }


}
