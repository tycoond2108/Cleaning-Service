<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Carbon\Carbon;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if(!session()->has('url.intended'))
        {
            session(['url.intended' => url()->previous()]);
        }
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        //Validate age
        $obj = new Carbon();
        $before = $obj->subYears(18)->format('Y-m-d');

        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role_id' => ['required'],
            'phone' => ['required', 'min:5', 'max:11', 'unique:users,phone'],
            'address' => ['required', 'string', 'min:10', 'max:500'],
            'country' => ['required', 'string','min:3', 'max:20'],
            'state' => ['required', 'string', 'min:3', 'max:20'],
            'city' => ['required', 'string', 'min:3', 'max:20'],
            'zip' => ['required', 'string', 'min:3', 'max:20'],
            'language' => ['required', 'string', 'min:2', 'max:20'],
            'birthdate' => ['required','before:'.$before ],

            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $request->merge(['password' => Hash::make($request->password),]);
        $user = User::create($request->all());

        event(new Registered($user));

        Auth::login($user);

        return redirect('/')->with('success', "Welcome To our website");
    }
}
