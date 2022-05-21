<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordEmail;
use App\Models\PasswordResets;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * check autentification user from data base an create session
     */
    public function auth()
    {
        request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = request()->only('email', 'password');
        $credentials['active'] = 1;

        if (!Auth::attempt($credentials))
            return redirect("login")->withErrors(['error_login' => 'invalid credentials']);;

        return redirect()->route('dashboard');
    }

    /**
     * DEstroy session sistem
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }

    /**
     * Send mail for user reser password
     */
    public function update_password()
    {

        try {
            request()->validate([
                'email' => 'required|email|exists:users|unique:password_resets',
            ]);

            $credentials = request()->only('email');

            $token = PasswordResets::create([
                'email' => $credentials['email'],
                'token' => Str::random(60),
                'created_at' => Carbon::now()
            ]);

            Mail::to($credentials['email'])->send(new ResetPasswordEmail([
                'url' => route('reset.password.view_user',[
                    'token' => $token->token
                ])
            ]));

            return redirect()->back()
                ->with('status', 'Check your email address.');

        }
        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error_status' => $e->getMessage()]);
        }

    }

    /**
     * Return form for reset password
     */
    public function reset_password_view_user()
    {
        $validator = Validator::make(request()->all(),[
            'token' => 'required|exists:password_resets',
        ]);

        if ($validator->fails())
            return abort(404);

        return view('auth.new_password',[
            'token' => request('token')
        ]);
    }

    /**
     * Get data from form for update password
     */
    public function update_password_user()
    {
        request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed'
        ]);

        try {
            $data = request()->all();

            User::where('email',$data['email'])->update([
                'password' => Hash::make($data['password'])
            ]);

            PasswordResets::where('email',$data['email'])->delete();

            return redirect()->route('login');
        }
        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error_update_password' => $e->getMessage()]);
        }
    }

    /**
     * Create and validate new user
     */
    public function create()
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        try {
            $data = request()->all();
            User::create([
                'email' => $data['email'],
                'name' => $data['name'],
                'password' => Hash::make($data['password'])
            ]);
            return redirect()->route('login');
        }
        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error_register' => $e->getMessage()]);
        }
    }

    /**
     * Active an desactive user for login
     */
    public function user_active()
    {
        request()->validate([
            'user' => 'required',
            'active' => 'required'
        ]);

        $data = request()->all();
        $data['user'] = decrypt($data['user']);

        $user = User::find($data['user']);
        $user->active = $data['active'];
        $user->save();
        return redirect()->route('dashboard');
    }
}
