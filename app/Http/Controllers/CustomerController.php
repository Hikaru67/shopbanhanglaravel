<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('customer_id');
        if($admin_id){
            return Redirect::to('login-checkout');
        }
    }
    public function messenger(){
        $this->AuthLogin();
        return view('pages.customer.messenger');
    }
}
