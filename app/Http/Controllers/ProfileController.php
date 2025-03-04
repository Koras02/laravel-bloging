<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user(); // 현재 로그인한 사용자 정보 가져오기

        if(!$user) {
            return redirect()->route('login');
        }

        return view('profile.show', compact('user'));
    }
}
