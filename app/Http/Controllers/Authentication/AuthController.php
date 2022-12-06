<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        try {
            //code...
            DB::beginTransaction();
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            DB::commit();
            Auth::guard('web')->login($user);

            return redirect()->intended('dashboard');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return $this->sendError($th->getMessage(), $th->getTrace(), 'SERVER_ERROR', 500);
        }
    }

    public function login(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:100',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }

        return $this->sendError('Unauthorized', [], 'UNAUTHORIZED', 401);
    }
}
