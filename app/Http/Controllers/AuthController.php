<?php

namespace App\Http\Controllers;

use App\Interactor\AuthInteractor;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

    private AuthInteractor $authInteractor;

    public function __construct(AuthInteractor $authInteractor) {
        $this->authInteractor = $authInteractor;
    }

    public function authenticate(Request $request) {
        $userData = $request->validate([
            'name' => 'required',
            'password' => 'required|string',
        ]);

        try {
            if ($request->has('login')) {
                $this->authInteractor->login([
                    'name' => $userData['name'],
                    'password' => $userData['password']
                ]);
            } elseif ($request->has('register')) {
                $this->authInteractor->register([
                    'name' => $userData['name'],
                    'password' => $userData['password']
                ]);
            } else {
                return response()->json(['error' => 'Invalid request'], 400);
            }
            return redirect()->route('home');
        }
        catch (\Exception $e) {
            return view('pages.login', ['error' => $e->getMessage()]);
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }

    public function login() {
        return view('pages.login');
    } 
}