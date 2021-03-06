<?php

namespace App\Http\Controllers\Auth;

use App\Genre;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255', 'min:1'],
            'restaurant_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'vat_number' => ['required', 'numeric', 'digits:11','unique:users'],
            'phone_number' => ['required', 'numeric'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //Salvo in una variabile le proprieta da salvare
        $user =  User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'address' => $data['address'],
            'city' => $data['city'],
            'restaurant_name' => $data['restaurant_name'],
            'vat_number' => $data['vat_number'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        //Attach delle categorie
        $user->genres()->attach($data['genres']);

        //Return
        return $user;
    }
    //Funzione per mostrare le categorie nella registrazione
    public function showRegistrationForm()
    {
        $genres = Genre::all();

        return view('auth.register', compact('genres'));
    }
}
