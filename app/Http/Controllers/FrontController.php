<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Link;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {
        $request->validate(['link' => 'required|string|url']);
        if (Auth::check()) {
            $link = Auth::user()->links()->create([
                'name' => $request->input('link'),
                'code' => Link::generateCode(),
                'real_link' => $request->input('link'),
            ]);
        } else {
            $link = Link::create([
                'name' => $request->input('link'),
                'code' => Link::generateCode(),
                'real_link' => $request->input('link'),
            ]);
        }

        return redirect()->route('welcome')->with('data', ['message'=>'link success created', 'link' => $link]);
    }

    public function redirect(Link $link)
    {
        $link->update([
            'visit_count' => $link->visit_count + 1,
            'last_visited_at' => now(),
        ]);

        return redirect($link->real_link, 302);
    }
}
