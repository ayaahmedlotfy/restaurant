<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Respnse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
<<<<<<< HEAD
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
=======
>>>>>>> 34d88f7eef4f555c7bab8b461a538f00f1b3acad

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
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
        $request->validate([
<<<<<<< HEAD
            'name' => ['required', 'string','min:3', 'max:255'],
=======
            'name' => ['required', 'string', 'max:255'],
>>>>>>> 34d88f7eef4f555c7bab8b461a538f00f1b3acad
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
<<<<<<< HEAD
         Mail::to($request->email)->send(new WelcomeMail());


    //     event(new Registered($user));


        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);


=======

    //     event(new Registered($user));

    //     Auth::login($user);

    //     return redirect(RouteServiceProvider::HOME);
>>>>>>> 34d88f7eef4f555c7bab8b461a538f00f1b3acad
    // }

    $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
<<<<<<< HEAD

=======
>>>>>>> 34d88f7eef4f555c7bab8b461a538f00f1b3acad
    }
}
