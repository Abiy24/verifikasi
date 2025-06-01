<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => $request->name,
            'neighborhood_association' => $request->neighborhood_association,
            'dasa_wisma' => $request->dasa_wisma,
            'email' => $request->email,
        ]);

        User::create([
            'name' => $request->name,
            'neighborhood_association' => $request->neighborhood_association,
            'dasa_wisma' => $request->dasa_wisma,
            'email' => $request->email,
        ]);

        return redirect()->route(route: 'user.index')
            ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'neighborhood_association' => 'required',
            'dasa_wisma' => 'required',
            'email' => 'required',
        ]);
        $user->update([
            'name' => 'required',
            'neighborhood_association' => 'required',
            'dasa_wisma' => 'required',
            'email' => 'required',
        ]);

        return redirect()->route(route: 'user.index')
            ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route(route: 'user.index')
            ->with('success','User deleted successfully');
    }
}
