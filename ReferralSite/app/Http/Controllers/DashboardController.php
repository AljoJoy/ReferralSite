<?php

namespace App\Http\Controllers;

use App\Models\Refer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $currentUser = auth()->user();
        $isAdmin = $currentUser->is_admin;
        if ($isAdmin === 1) {
            $data = Refer::all();
        }else {
            $data = Refer::with('user')->where('refer_id', $currentUser->id)->where('is_admin','0')->value('referral_text');
        }
        
        return view('dashboard', compact(['isAdmin', 'data']));
    }
}
