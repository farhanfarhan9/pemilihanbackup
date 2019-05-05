<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Organization;
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
    protected $redirectTo = '/home';

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['required'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'org_name' => ['required', 'string'],
            'org_phone_number' => ['required'],
            'org_address' => ['required', 'string'],
            'agreement' => ['required'],
        ], [
            'required' => ':attribute harus diisi.',
            'email.email' => 'Alamat email tidak valid.',
            'password.min' => 'Password harus 6 digit.',
            'password.confirmed' => 'Konfirmasi password tidak sama.',
        ], [
            'name' => 'Nama lengkap',
            'email' => 'Alamat email',
            'phone_number' => 'Nomor telepon',
            'password' => 'Password',
            'org_name' => 'Nama organisasi',
            'org_phone_number' => 'Nomor telepon organisasi',
            'org_address' => 'Alamat organisasi',
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
        $organization = Organization::create([
            'name' => $data['org_name'],
            'shortname' => str_random(6),
            'phone_number' => $data['phone_number'],
            // 'address' => $data['org_address'],
        ]);

        return User::create([
            'organization_id' => $organization->id,
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
