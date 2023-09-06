<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\CreateNewUserRequest;
use App\Providers\RouteServiceProvider;
use App\Repositories\AuthRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Input;

class AuthController extends Controller
{

    private $authRepository;
    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                ->withSuccess('You have Successfully loggedin');
        }
        return redirect("/")
            ->withInput($request->only('email'))
            ->withErrors(['login' => 'Oppes! You have entered invalid credentials']);
    }


    public function register(CreateNewUserRequest $request)
    {
        try {
            $storeUser = $this->authRepository->register($request);
            return $storeUser;
        } catch (Exception $e) {
            report($e);
            return response()->json(['status' => 'error', 'message' => 'Something went Wrong... Please Try Again Later.', 'key' => '0']);
        }
    }

    public function dashboard()
    {
        return view('home');
    }

    public function deposit()
    {
        return view('deposit');
    }
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }
}
