<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class DestinationController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $destinations = Destination::get();
        return view('destination.index', ['destinations' => $destinations]);
    }

    public function search(Request $request)
    {
        $data = $request->validate([
            'title' => 'nullable||string|max:255',
            'location' => 'nullable|string|max:255',
            'budget' => 'nullable|numeric',
        ]);

        if (isset($data['budget'])) {

            $data['budget'] = (float) $data['budget'];
        }


        $query = Destination::query();
        if (!empty($data['title'])) {
            $query->where(function ($query) use ($data) {
                $query->where('title', 'like', '%' . $data['title'] . '%')
                    ->orWhere('description', 'like', '%' . $data['title'] . '%');
            });
        }


        if (!empty($data['location'])) {
            $query->where('location', 'like', '%' . $data['location'] . '%');
        }


        if (!empty($data['budget'])) {
            $query->where('estimated_price', '<=', $data['budget']);
        }

        // Execute query to get destinations
        $destinations = $query->get();

        return view('destination.index', ['destinations' => $destinations]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('destination.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
           
            
        $validatedData = $request->validate([
            'title' => ['required','string','max:255'],
            'description' => ['required','string'],
            'location' => ['required','string','max:255'],
            'estimated_price' => ['required','numeric'],
            
        ]);
        if (Auth::check()) {
            // User is authenticated, get the authenticated user's id
          
            $userId = Auth::id();
           
            $photoPath = $request->file('photo_path')->store('/public/images/destinations');
            $filename = basename($photoPath);
          
         
            Destination::create([
                'user_id' => $userId,
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'location' => $validatedData['location'],
                'estimated_price' => $validatedData['estimated_price'],
                'photo_path' => $filename,
            ]);
            return redirect()->route('user.profile');
        } else {

            return redirect()->route('user.profile');
        }

    
    }

    /**
     * Display the specified resource.
     */
    public function show(Destination $destination)
    {

        return view('destination.show', ['destination' => $destination]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Destination $destination)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Destination $destination)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Destination $destination)
    {
        //
    }
}
