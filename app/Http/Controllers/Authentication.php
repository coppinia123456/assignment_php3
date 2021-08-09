<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\Auth\StorePassword;
use App\Http\Requests\Admin\Auth\registerValidator;
class Authentication extends Controller
{
    private $user;
    public function __construct(User $user)
    {
        session_start();
        $this->user = $user;
    }
    public function login_get()
    {
        return view('admin.auth.login');
    }
    public function register(registerValidator $request)
    {
        // validator
       // dd($request->name);
        $request->status = 1;
        try {
            DB::beginTransaction();
            $user = $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'register_at' => date('Y-m-d'),
                'last_login' => date('Y-m-d'),
                'status' => $request->status,
                'phone_number' => "",
                'profile' => "",
                'image' => "",
                'intro' => "",
            ]);

            $user->roles()->attach(2); // upload create array to roles ===> 'attach'
            DB::commit();
            return response()->json(['status'=>'Đăng ký thành công !']);
        } catch (Exception $exception) {
            DB::rollBack();
            return response()->json(['error'=>'Đăng ký thất bại !']);
        }
      
// return response()->json(['adasfdsfsdf']);
    }
    public function login_post(Request $request)
    {
        //  $users = DB::table('users')->where("email", $request->email)->first();
        $data = $request->only([
            'email',
            'password',
        ]);
        $result = Auth::attempt($data);
        $users = Auth::user();
        // dd($data);

        if (!isset($users->status) || $users->status != 1) { // check status account when status != 1
            return redirect()->back()->with('status', 'Tài khoản bị khóa vui lòng liên hệ admin !');
        }
        if (!isset($users->is_manage) || $users->is_manage != 1) { // check manager account when is_manage = 1
            return redirect()->back()->with('status', 'Tài khoản không được quyền truy cập!');
        }
        if ($result === false) { // check passworrd account
            return redirect()->back()->with('status', 'Sai email hoặc mật khẩu');
        }
        // session(['admin_login' => $users]); //store the user's data into the session
        if (isset($request->remember) && $request->remember == "on") {
            $minutes = 3600 * 30;
            $hash = $users->id . $users->email . $request->_token;
            $cookieValue = Hash::make($hash);
            Cookie::queue('admin_login_remember', $cookieValue, $minutes);
            // update phiên token vào phiên làm việc vào database
            /// $this->user->find($users->id)->update(['remember_token' => $cookieValue]);
            try {
                DB::beginTransaction();
                DB::table('users')->where('id', $users->id)->update(['remember_token' => $cookieValue]);
                DB::commit();
            } catch (Exception $exception) {
                DB::rollBack();
                Log::error('message :', $exception->getMessage() . '--line :' . $exception->getLine());
            }
        }
        $Cookie_user = Cookie::get('admin_login_remember');
        return redirect("/");
    }
    public function login_post_model(Request $request)
    {
        //  $users = DB::table('users')->where("email", $request->email)->first();
        $data = $request->only([
            'email',
            'password',

        ]);
        //dd($request->remember_token);
        if (Auth::user() != null) {
            Auth::logout();
        }
        $result = Auth::attempt($data);
        $users = Auth::user();
        if ($result === false) { // check passworrd account
            if (Auth::user() != null) {
                Auth::logout();
            }
            return response()->json(["error" => "Sai email hoặc mật khẩu"]);
        } else if (!isset($users->status) || $users->status != 1) { // check status account when status != 1

            if (Auth::user() != null) {
                Auth::logout();
            }
            return response()->json(["error" => "Tài khoản bị khóa vui lòng liên hệ admin !"]);
        } else if (!isset($users->is_manage) || $users->is_manage != 1) { // check manager account when is_manage = 1
            if (Auth::user() != null) {
                Auth::logout();
            }
            return response()->json(["error" => "Tài khoản không được quyền truy cập!"]);
        }

        //  dd($request->remember_token);
        if (isset($request->remember_token) && $request->remember_token == "1") {

            $minutes = 3600 * 30;
            $hash = $users->id . $users->email . $request->_token;
            $cookieValue = Hash::make($hash);
            Cookie::queue('admin_login_remember', $cookieValue, $minutes);
            // update phiên token vào phiên làm việc vào database
            try {
                DB::beginTransaction();
                DB::table('users')->where('id', $users->id)->update(['remember_token' => $cookieValue]);
                DB::commit();
            } catch (Exception $exception) {
                DB::rollBack();
                Log::error('message :', $exception->getMessage() . '--line :' . $exception->getLine());
            }
        }
        $Cookie_user = Cookie::get('admin_login_remember');

        return response()->json($Cookie_user);
    }
    public function login_out(Request $request)
    {
        Cookie::queue('admin_login_remember', "", -3600);
        Cookie::queue('token_forget', "", -3600);
        Auth::logout();
        return redirect()->route("/");
    }


    public function forgot()
    {
        return view('admin.auth.forgot');
    }
    public function new_password(Request $request)
    {
        $token_forget = json_decode(Cookie::get('token_forget')) == true ? json_decode(Cookie::get('token_forget')) : "";

        if (!empty($_REQUEST['tp']) && !empty($token_forget->token) && ($_REQUEST['tp'] == $token_forget->token)) {
            return view('admin.auth.new_pass');
        }
        return redirect('auth/login');
    }

    public function strore_password(StorePassword $request)
    {


        $token_forget = json_decode(Cookie::get('token_forget')) == true ? json_decode(Cookie::get('token_forget')) : "";
        $users = DB::table('users')->where("email", $token_forget->address)->first();
        $request->password = Hash::make($request->password);
        DB::table('users')->where('id', $users->id)->update(['password' => $request->password]);
        try {
            DB::beginTransaction();

            DB::commit();
            Cookie::queue('token_forget', "", -300);
            return redirect("auth/login");
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error('message :', $exception->getMessage() . '--line :' . $exception->getLine());
        }
    }
}
