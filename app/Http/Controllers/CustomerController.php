<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Events\ChatEvent;
use App\Messenger;
use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('customer_id');
        if(!$admin_id){
            return redirect::to('/login-checkout')->send();
        }
    }

    public function messenger($receiver_id){
        $this->AuthLogin();
        if(!$receiver_id){
            $receiver_id = Messenger::select('receiver_id')->first();
            return Redirect::to('/messenger/'.$receiver_id['receiver_id'])->send();
        }
//        $list_customer = Customer::join('messengers','tbl_customers.customer_id','=','messengers.customer_id')->select('tbl_customers.*', 'messengers.content')->orderby();
        $customer_id = Session::get('customer_id');
        $list_customer = Messenger::where('messengers.receiver_id', $customer_id)
            ->orwhere('messengers.customer_id', $customer_id)
            ->join('tbl_customers','messengers.customer_id', '=', 'tbl_customers.customer_id')
            ->select('messengers.*', 'tbl_customers.customer_name', 'tbl_customers.avatar')
            ->orderBy('messengers.created_at', 'desc')->get();
//        dd($list_customer);

        $list_message = Messenger::where('customer_id', $customer_id)
            ->where('receiver_id', $receiver_id)
            ->orwhere('customer_id', $receiver_id)
            ->where('receiver_id', $customer_id)
            ->get();
        $receiver = Customer::find($receiver_id);
        $customer = Customer::find($customer_id);
        return view('pages.customer.messenger2', compact(['list_customer','list_message', 'customer', 'receiver']));
    }

    public function messenger2(){
        return view('pages.customer.messenger');
    }

    public function add_message(Request $request){
        $data_r = $request->validate([
            'customer_id' => 'required',
            'receiver_id' => 'required',
            'content' => 'required',
//            'type_message' => ''
        ]);
        $message = new Messenger();
        $message->customer_id = $data_r['customer_id'];
        $message->receiver_id = $data_r['receiver_id'];
        $message->content = $data_r['content'];
//        $message->type_message = $data_r['type_message'];

        $message->save();
        event(
            $e = new ChatEvent($message)
        );
    }
}
