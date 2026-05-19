<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Login Page
    public function login()
    {
        return view('auth.login');
    }

    // Login Check
    public function authenticate(Request $request)
    {

        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = DB::table('tb_club_users')
            ->where('email', $request->email)
            ->first();

        if ($user && Hash::check($request->password, $user->password)) {

            session([
                'user_id'   => $user->userId,
                'user_name' => $user->name,
            ]);

            return redirect('/admin/sports');
        }

        return back()->with('error', 'Invalid Email or Password');
    }

    // Logout
    public function logout()
    {
        session()->flush();

        return redirect('/admin/login');
    }
}
