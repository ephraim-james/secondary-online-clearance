<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Message;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;


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
        if ($data['role'] != 'student') {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'role' => ['required', 'unique:users'],
            ]);
        } else {

            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'role' => ['required'],
            ]);

        }

    }

    private function generatePassword()
    {
        $password = rand(1, 99999) . substr(str_shuffle('@Bc)DeFg#km+p*l%z$k=yxt+Uv'), 0, 3);
        return $password;
    }

    private function generateUsername($email)
    {
        $parts = substr(explode("@", $email)[0], 0, 4);
        $username = $parts . rand(1, 9999);
        return $username;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $username = $this->generateUsername($data['email']);
        $role = $data['role'];

        if ($role != 'student') {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'username' => $username,
                'role' => $role,
                'password' => Hash::make($data['password']),
            ]);
        } else {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'username' => $username,
                'role' => $role,
                'password' => Hash::make($data['password']),
            ]);
        }

        if ($role == 'student') {
            $role = 'Student';
            $user->assignRole(Role::findByName('student'));
        } elseif ($role == 'librarian') {
            $role = 'librarian';
            $user->assignRole(Role::findByName('librarian'));
        } elseif ($role == 'bursar') {
            $role = 'bursar';
            $user->assignRole(Role::findByName('bursar'));
        } elseif ($role == 'class_teacher') {
            $role = 'class_teacher';
            $user->assignRole(Role::findByName('class_teacher'));
        } elseif ($role == 'matron_patron') {
            $role = 'matron_patron';
            $user->assignRole(Role::findByName('matron_patron'));
        } elseif ($role == 'store_keeper') {
            $role = 'store_keeper';
            $user->assignRole(Role::findByName('store_keeper'));
        }
        elseif($role == 'academic_master'){
            $role = 'academic_master';
            $user->assignRole(Role::findByName('academic_master'));
        }
        elseif ($role == 'head_master') {
            $role = 'head_master';
            $user->assignRole(Role::findByName('head_master'));
        } else {
            $role = 'user';
            $user->assignRole(Role::findByName('user'));
        }


        return $user;

    }
}