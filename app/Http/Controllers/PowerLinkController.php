<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PowerLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('links-powergrid.index');
    }
}
