<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Travel;

class TravelController extends Controller
{
    /**
     * Show the form for creating the resource.
     */

    public function index()
    {  
        $id = Auth::id();
        $apartments = Travel::where('user_id', $id)->get();
        return view('admin.travels.index', compact('travels'));
    }
 
    public function create()
    {
        return view('admin.travels.create');
    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request)
    {
        $form_data = $request->all();
        $form_data['slug'] = Travel::generateSlug($form_data['name']);
        $form_data['user_id'] = Auth::id();
        $new_travel = Travel::create($form_data);

        return redirect()->route('admin.travels.show', $new_travel->slug);
    }

    /**
     * Display the resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(): never
    {
        abort(404);
    }
}
