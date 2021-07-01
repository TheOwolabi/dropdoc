<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Request as FacadesRequest;

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
            'firstname' => ['required', 'string'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
  public function register(Request $request)
  {
     $user = new User();

     $user->firstname = $request->firstname;
     $user->lastname = $request->lastname;
     $user->email = $request->email;
     $user->password = Hash::make($request->password);
     $user->verification_code = sha1(time());
     $user->save();

     if($user != null)
     {
         MailController::sendSignupEmail($user->firstname, $user->lastname, $user->email, $user->verification_code); 
         return redirect()->back()->with(session()->flash('alert-success', 'Votre compte a été créée avec succès ! Merci de valider votre compte en verifiant votre boite mail @efrei.net'));
     
     }

     return redirect()->back()->with(session()->flash('alert-danger', "Oops ... Quelque chose s'est mal passé "));
     

  }

  public function verifyUser()
  {
    $verification_code =   FacadesRequest::get('code') ;
    
    $user = User::where(['verification_code' => $verification_code ])->first();

    if($user != null)
    {
        $user->is_verified = 1;
        $user->save();
        return redirect()->route('login')->with(session()->flash('alert-success', "Merci ! Ton compte a été vérifié avec succès. Connectes toi pour accéder à toutes les ressources "));
     
    }

    return redirect()->route('login')->with(session()->flash('alert-danger', "Oops ... Code de vérification non valide "));
     
  }
}
