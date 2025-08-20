<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $activePlans = $user->plans()->where('status', 'active')->get();
        $expiredPlans = $user->plans()->where('status', 'expired')->get();

        return view('client.dashboard', compact('activePlans', 'expiredPlans'));
    }
}
