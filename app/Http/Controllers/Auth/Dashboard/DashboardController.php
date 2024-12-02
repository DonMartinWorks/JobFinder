<?php

namespace App\Http\Controllers\Auth\Dashboard;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Models\Work;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * @desc Show all users job listings.
     */
    public function index(): View
    {
        $user = Auth::user();
        $works = Work::where('user_id', $user->id)->get();

        return view('auth.dashboard.index', compact('user', 'works'));
    }
}
