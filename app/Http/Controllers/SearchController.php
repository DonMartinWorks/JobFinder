<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Search any given search term.
     */
    public function __invoke(Request $request)
    {
        dd($request->all());
    }
}
