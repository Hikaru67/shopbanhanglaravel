<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Login;
use App\Social;
use Socialite;
use App\Admin;
session_start();

class AdminController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }
        else {
            return Redirect::to('admin')->send();
        }
    }
    public function index()
    {
        if(Session::get('admin_id')){
            return Redirect::to('dashboard');
        }
        return view('admin_login');
    }

    public function show_dashboard()
    {
        $this->AuthLogin();
        return view('admin.dashboard');
    }

    public function dashboard(Request $request)
    {
        //$this->AuthLogin();
        if(Session::get('admin_id')){
            return Redirect::to('dashboard');
        }else{
            $admin_username = $request->admin_username;
            $admin_password = md5($request->admin_password);

            //    	$result = FacadesDB::table('tbl_admin')->where('admin_username', $admin_username)->where('admin_password', $admin_password)->first();
            $result = Admin::where('admin_username', $admin_username)->where('admin_password', $admin_password)->first();
            if($result){
                // $request->session()->put('admin_name', $result->admin_name);
                // $request->session()->put('admin_id', $result->admin_id);
                Session::put('admin_name', $result->admin_name);
                Session::put('admin_id', $result->admin_name);
                return Redirect('/dashboard');
            }
            else
            {
                // $request->session()->put('message', 'Tên tài khoản hoặc mật khẩu không chính xác');
                Session::put('message', 'Tên đăng nhập hoặc mật khẩu không chính xác');
                return Redirect::to('/admin');
            }
        }
    }

    public function logout()
    {
        $this->AuthLogin();
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return Redirect::to('/admin');
    }

    public function login_facebook(){
        return Socialite::driver('facebook')->redirect();
    }


    public function callback_facebook(){
        $provider = Socialite::driver('facebook')->user();
        echo '<pre>';
        var_dump($provider);
        echo '</pre>';
        $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
        if($account){
            //login in fb
            $account_name = Login::where('customer_id',$account->user)->first();
            Session::put('customer_name',$account_name->customer_name);
            Session::put('customer_id',$account_name->customer_id);
            return redirect('/trang-chu')->with('message', 'Đăng nhập thành công');
        }else{

            $customer_login = new Social([
                'provider_user_id' => $provider->getId(),
                'provider' => 'facebook'
            ]);

            $orang = Login::where('customer_email',$provider->getEmail())->first();

            if(!$orang){
                $orang = Login::create([
                    'customer_name' => $provider->getName(),
                    'customer_email' => $provider->getEmail(),
                    'customer_password' => '',
                    'customer_phone' => '',

                ]);
            }
            $customer_login->login()->associate($orang);
            $customer_login->save();

            $account_name = Login::where('customer_id',$customer_login->user)->first();

            Session::put('customer_name',$account_name->customer_name);
            Session::put('customer_id',$account_name->customer_id);
            return redirect('/trang-chu')->with('message', 'Đăng nhập thành công');
        }
    }

    public function login_google(){
        return Socialite::driver('google')->redirect();
    }

    public function callback_google(){
        $users = Socialite::driver('google')->stateless()->user();
        // return $users->id;
        $authUser = $this->findOrCreateUser($users,'google');
        $account_name = Login::where('customer_id',$authUser->user)->first();
        Session::put('customer_name',$account_name->customer_name);
        Session::put('customer_id',$account_name->customer_id);
        return redirect('/trang-chu')->with('message', 'Đăng nhập thành công');
    }

    public function findOrCreateUser($users,$provider){
        $authUser = Social::where('provider','GOOGLE')->where('provider_user_id', $users->id)->first();
        if($authUser){
            return $authUser;
        }

        $new_user = new Social([
            'provider_user_id' => $users->id,
            'provider' => strtoupper($provider)
        ]);

        $orang = Login::where('customer_email',$users->email)->first();

        if(!$orang){
            $orang = Login::create([
                'customer_name' => $users->name,
                'customer_email' => $users->email,
                'customer_password' => '',

                'customer_phone' => '',
                'customer_status' => 1
            ]);
        }
        $new_user->login()->associate($orang);
        $new_user->save();
        return $new_user;

    }
}
