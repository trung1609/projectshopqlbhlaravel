<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Models\Login;
use App\Models\Social;
use Validator;
use Socialite;
session_start();
class AdminController extends Controller
{
    public function AuthLogin(){
    $admin_id = Session::get('admin_id');
    if($admin_id){
        return Redirect::to('dashboard');
    }else{
        return Redirect::to('admin')->send();
    }
}

    public function index(){
        return view('admin_login');
    }
    public function show_dashboard(){
        $this -> AuthLogin();
        return view('admin.dashboard');
    }
    public function dashboard(Request $request){
        // $data = $request->all();
        $data = $request->validate([
            'admin_email' => 'required|email',
            'admin_password' => 'required|string',
            // 'g-recaptcha-response' => new Captcha(), //dòng kiểm tra Captcha
        ]);

        $admin_email = $data['admin_email'];
        $admin_password = md5($data['admin_password']);
        $login = Login::where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
        if($login){
            Session::put('admin_name',$login->admin_name);
            Session::put('admin_id',$login->admin_id);
            return Redirect::to('/dashboard');
        }else{
            Session::put('message','Retry to login');
            return Redirect::to('/admin');
        }

        // $admin_email = $request->admin_email;
        // $admin_password = md5($request->admin_password);
        // $result = DB::table('tbl_admin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
        // if($result){
        //     Session::put('admin_name',$result->admin_name);
        //     Session::put('admin_id',$result->admin_id);
        //     return Redirect::to('/dashboard');
        // }else{
        //     Session::put('message','Retry to login');
        //     return Redirect::to('/admin');
        // }
    }
    public function logout(){
        $this->AuthLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');
    }
}
