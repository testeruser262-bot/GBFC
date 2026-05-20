<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Show form
    public function showRegisterForm()
    {
        return view('frontend.register');
    }

    // Handle register
    public function register(Request $request)
    {

        try {

            DB::enableQueryLog();

            $userId = DB::table('tb_club_users')->insertGetId([
                'roleId'     => 3,
                'firstName'  => $request->first_name,
                'lastName'   => $request->last_name,
                'email'      => $request->email,
                'phone'      => $request->phone,
                'age_group'  => $request->age_group,
                'password'   => Hash::make($request->password),
                'created_at' => now(),
                'updated_at' => now(),
                'status'     => 'Active',
            ]);

            session([
                'userId' => $userId,
                'email'  => $request->email,
            ]);

            return redirect('/club-payment');

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
