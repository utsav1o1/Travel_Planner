<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Destination;
use App\Notifications\DestinationApproved;
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



        if (Auth::guard('admin')
            ->attempt([
                'email' => $request->email,
                'password' => $request->password
            ])
        ) { 
            $request->session()->regenerate();
            
            return redirect()->intended('admin/dashboard');
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

    public function dashboard()
    {
        $destinations = Destination::where('approval_status', 0)->get();
        return view('admin.dashboard', compact('destinations'));
    }

    public function showUnapprovedDestinations()
    {
        $destinations = Destination::where('approval_status', 0)->get();
        return view('admin.destinations.unapproved', compact('destinations'));
    }

    public function showDestinationDetails(Destination $destination)
    {
        return view('admin.destinations.show', compact('destination'));
    }

    public function approveDestination(Request $request, Destination $destination)
    {
        $destination->update(['approval_status' => 1]);
        $user = $destination->user;
        $user->notify(new DestinationApproved($destination));
        return redirect()->route('admin.dashboard')->with('success', 'Destination approved successfully.');
    }
}
