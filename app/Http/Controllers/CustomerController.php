<?php

namespace App\Http\Controllers;

use App\Conversations;
use App\Customer;
use App\Events\ChatEvent;
use App\Messenger;
use App\Participants;
use Illuminate\Support\Facades\Redirect;
use Session;
use Cookie;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('customer_id');
        if(!$admin_id){
            return redirect::to('/login')->send();
        }
    }

    public function login(){
        return view('pages.customer.login');
    }

    public function login2(Request $request){

        $data = $request->validate([
            'customer_username' => '',
            'customer_password' => '',
            'login_remember' => ''
        ]);
        $username = $data['customer_username'];
        $password = md5($data['customer_password']);
//        $result = DB::table('tbl_customers')->where('customer_username', $username)->where('customer_password', $password)->first();
        $result = Customer::where('customer_username', $username)->where('customer_password', $password)->first();
        if($result){
            if(isset($data['login_remember'])){
                Cookie::queue('customerId', $result->customer_id);
                Cookie::queue('customerName', $result->customer_name);
            }
            Session::put('customer_id', $result->customer_id);
            Session::put('customer_name', $result->customer_name);
            return Redirect('/trang-chu');
        }
        Session::put('message', 'Tên tài khoản hoặc mật khẩu không chính xác');
        return Redirect('/login');
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

    public function messenger2($conversation_id){
        $this->AuthLogin();
        $customer_id = Session::get('customer_id');
        if(!$conversation_id){
            $conversation = Conversations::join('participants', 'participants.conversation_id', '=', 'conversations.id')
                ->where('participants.customer_id',$customer_id)
                ->orderBy('conversations.id', 'desc')
                ->first();
            //$receiver_id = Messenger::select('receiver_id')->first();

            return Redirect::to('/messenger2/'.$conversation['conversation_id'])->send();
        }
//        $list_customer = Customer::join('messengers','tbl_customers.customer_id','=','messengers.customer_id')->select('tbl_customers.*', 'messengers.content')->orderby();
        $list_conversation = Conversations::join('participants', function ($join) {
                $join->on('participants.conversation_id', '=', 'conversations.id')
                    ->where('participants.customer_id', '=', Session::get('customer_id'));
            })
            //->join('tbl_customers', 'tbl_customers.customer_id', '=', 'participants.customer_id')
            ->select('conversations.id')
            //->select('conversations.*', 'tbl_customers.customer_id', 'tbl_customers.avatar', 'tbl_customers.customer_name')
            ->orderBy('conversations.id', 'desc')
            ->get();
        foreach ($list_conversation as $key => $value){
            $list_c[] = $value->id;
        }
            $list_conversation = Conversations::join('participants', 'participants.conversation_id', '=', 'conversations.id')
                ->wherein('conversations.id', $list_c)
                ->where('participants.customer_id', '!=', $customer_id)
                ->join('tbl_customers', 'tbl_customers.customer_id', '=', 'participants.customer_id')
                ->select('conversations.*', 'tbl_customers.customer_id', 'tbl_customers.avatar', 'tbl_customers.customer_name')
                ->orderBy('conversations.updated_at', 'desc')
                ->get();
//        dd($list_conversation);
        /*$list_customer = Messenger::where('messengers.receiver_id', $customer_id)
            ->orwhere('messengers.customer_id', $customer_id)
            ->join('tbl_customers','messengers.customer_id', '=', 'tbl_customers.customer_id')
            ->select('messengers.*', 'tbl_customers.customer_name', 'tbl_customers.avatar')
            ->orderBy('messengers.id', 'desc')->get();*/
//        dd($list_customer);
        $list_message = Messenger::where('conversation_id', $conversation_id)->get();
        /*$list_message = Messenger::where('customer_id', $customer_id)
            ->where('receiver_id', $receiver_id)
            ->orwhere('customer_id', $receiver_id)
            ->where('receiver_id', $customer_id)
            ->get();*/
//        $receiver = Customer::find($receiver_id);
        /*$count_cus = Conversations::join('participants', 'participants.conversation_id', '=', 'conversations.id')
            ->withCount('participants.customer_id')
            ->where('conversations.id', $conversation_id)
            ->get();*/
        $receiver_id = Conversations::join('participants', 'participants.conversation_id', '=', 'conversations.id')
            ->where('conversations.id', $conversation_id)
            ->where('participants.customer_id', '!=', $customer_id)
            ->select('participants.customer_id')
            ->first();
        $receiver = Customer::find($receiver_id['customer_id']);
        $customer = Customer::find($customer_id);
        return view('pages.customer.messenger', compact(['list_conversation', 'list_message', 'customer', 'receiver', 'conversation_id']));
    }

    /*public function messenger2(){
        return view('pages.customer.messenger');
    }*/

    public function add_message(Request $request){
        $data_r = $request->validate([
            'sender_id' => 'required',
            'conversation_id' => 'required',
            'content' => 'required',
//            'type_message' => ''
        ]);
        $message = new Messenger();
        $message->sender_id = $data_r['sender_id'];
        $message->conversation_id = $data_r['conversation_id'];
        $message->content = $data_r['content'];
//        $message->type_message = $data_r['type_message'];
        $message->save();

        event(
            $e = new ChatEvent($message)
        );
        $conversation = Conversations::find($data_r['conversation_id']);
        $conversation->last_user = $data_r['sender_id'];
        $conversation->preview = $data_r['content'];
        $conversation->save();

    }

}
