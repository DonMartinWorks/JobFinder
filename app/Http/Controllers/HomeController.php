<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $works = Work::latest()->where(['status' => 1])->limit(6)->get();

        return view('pages.home')->with('works', $works);
    }
}
