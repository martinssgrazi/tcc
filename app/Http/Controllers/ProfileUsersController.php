<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class ProfileUsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('profile.show', Auth::user()->name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('profile.show', Auth::user()->name);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect()->route('profile.show', Auth::user()->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        return view('auth.profile')->with('user', Auth::user());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        return redirect()->route('profile.show', Auth::user()->name);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $username)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'same:confirmPassword'
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if($request->input('password') != null) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->route('profile.show', $user->name)->with('success', 'Informações Atualizadas!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($username)
    {
        $user = Auth::user();
        Auth::logout();
        $user->delete();
        return redirect('/login')->with('success', 'Conta excluida!');
    }
}
