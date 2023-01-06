<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $apiUrl = "https://1oltxev2o5.execute-api.ap-northeast-1.amazonaws.com/subtitle_modify";
        var_dump($request->vid);
        var_dump("==============");
        var_dump($request);
        //return response('Success', 200);

        return response()->json(
            [
                'id' => $request->vid
            ]
        );
    }
}
