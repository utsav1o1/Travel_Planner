<?php

namespace App\Http\Controllers;

use App\Models\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{



    public function showLoginForm()
    {
        return view('login.admin.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

// dd(Auth::guard('admin')
// ->attempt([
//     'email' => $request->email,
//     'password' => $request->password
// ]));

        if (Auth::guard('admin')
            ->attempt([
                'email' => $request->email,
                'password' => $request->password
            ])
        ) {
            $request->session()->regenerate();
            return redirect()->intended('admin/index');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
