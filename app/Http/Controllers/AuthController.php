<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\User;
use Input;
use Auth;

class AuthController extends Controller {

	public function getLogin(){
		return view('auth.login');
	}

	public function postLogin(){
		$email = Input::get('email');
		$password = Input::get('password');
		$user = User::where('email','=',$email)->where('password','=',$password)->first();
		if ($user === null){
			return view('auth.login');
		} else {
			Auth::login($user);
			return redirect()->intended();
		}
	}

	public function getLogout(){
		Auth::logout();
		return redirect()->route('auth.login');
	}

}
