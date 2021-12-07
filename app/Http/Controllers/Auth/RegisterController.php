<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
            'business_name' => ['required', 'string', 'max:80'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string', 'max:70'],
            'street_number' => ['required', 'string', 'max:70'],
            'vat_number' => ['required', 'numeric', 'digits:11'],
            'description' => ['string', 'nullable'],
            'url_cover' => ['nullable', 'image', 'max:200']
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
        if (array_key_exists('url_cover', $data)) {
            $cover_path = Storage::put('user_covers', $data['url_cover']);
            $data['url_cover'] = $cover_path;
        } else {
            $data['url_cover'] = NULL;
        }

        $newUser = new User();
        $newUser['business_name'] = $data['business_name'];
        $newUser['slug'] = Str::of($data['business_name'])->slug('-');
        $newUser['email'] = $data['email'];
        $newUser['password'] = Hash::make($data['password']);
        $newUser['address'] = $data['address'];
        $newUser['street_number'] = $data['street_number'];
        $newUser['vat_number'] = $data['vat_number'];
        $newUser['description'] = $data['description'];
        $newUser['url_cover'] = $data['url_cover'];
        $newUser->save();

        foreach ($data['types'] as $type) {
            $newUser->types()->attach($type);
        }

        return $newUser;
    }
}
