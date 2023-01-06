<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class EditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $videoId)
    {
        return view('edit');
    }
}
