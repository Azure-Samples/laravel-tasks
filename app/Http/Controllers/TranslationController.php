<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $videoIds = array(
            '0yKmBMQ44HU',
            '4zH_I1fh_5A',
            'm5vJTOF4PnE',
            'tTjFLfeMYdg',
            'Y9uZbU_JzsA',
            'ZZDJBEdsoAE'
        );
        return view('translation.list', [
            'videoIds' => $videoIds
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        return view('translation.edit');
    }
}
