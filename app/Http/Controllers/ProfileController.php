<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;


class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $profile = Profile::all()->sortByDesc('updated_at')->first();
        
        $user = User::find($profile->user_id);
        
        return view('profile.index', ['profile' => $profile, 'user' => $user ]);
    }
}
