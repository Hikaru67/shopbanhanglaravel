<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Login;
use App\Social;
use Socialite;

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

            $result = Login::where('admin_username', $admin_username)->where('admin_password', $admin_password)->first();
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
        //login in vao trang quan tri
            $account_name = Login::where('admin_id',$account->user)->first();
            Session::put('admin_name',$account_name->admin_name);
            Session::put('admin_id',$account_name->admin_id);
            return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
        }else{

            $admin_login = new Social([
                'provider_user_id' => $provider->getId(),
                'provider' => 'facebook'
            ]);

            $orang = Login::where('admin_email',$provider->getEmail())->first();

            if(!$orang){
                $orang = Login::create([

                    'admin_name' => $provider->getName(),
                    'admin_username' => '',
                    'admin_email' => $provider->getEmail(),
                    'admin_password' => '',
                    'admin_phone' => ''

                ]);
            }
            $admin_login->login()->associate($orang);
            $admin_login->save();

            $account_name = Login::where('admin_id',$admin_login->user)->first();

            Session::put('admin_name',$account_name->admin_name);
            Session::put('admin_id',$account_name->admin_id);
            return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
        }
    }

    public function login_google(){
        return Socialite::driver('google')->redirect();
    }

    public function callback_google(){
        $users = Socialite::driver('google')->stateless()->user();
        // return $users->id;
        $authUser = $this->findOrCreateUser($users,'google');
        $account_name = Login::where('admin_id',$authUser->user)->first();
        Session::put('admin_login',$account_name->admin_name);
        Session::put('admin_id',$account_name->admin_id);
        return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
    }

    public function findOrCreateUser($users,$provider){
        $authUser = Social::where('provider_user_id', $users->id)->first();
        if($authUser){

            return $authUser;
        }

        $hieu = new Social([
            'provider_user_id' => $users->id,
            'provider' => strtoupper($provider)

        ]);

        $orang = Login::where('admin_email',$users->email)->first();

        if(!$orang){
            $orang = Login::create([
                'admin_name' => $users->name,
                'admin_email' => $users->email,
                'admin_password' => '',

                'admin_phone' => '',
                'admin_status' => 1
            ]);
        }
        $hieu->login()->associate($orang);
        $hieu->save();

        $account_name = Login::where('admin_id',$authUser->user)->first();
        Session::put('admin_login',$account_name->admin_name);
        Session::put('admin_id',$account_name->admin_id);
        return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');

    }
}
