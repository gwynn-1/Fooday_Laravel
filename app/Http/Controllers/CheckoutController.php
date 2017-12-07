<?php

namespace App\Http\Controllers;

use App\Mail\mailConfirm;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\foodsModel;
use App\customerModel;
use App\billModel;
use App\billdetailModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    //
    private $foods;
    public function __construct()
    {
        $this->foods = new foodsModel();
    }

    public function loadViewAction(){
        $arr_cart = $this->foods->getFoodsCart();
        return view("checkout",["arr_cart"=>$arr_cart]);
    }

    public function getPostMethod(Request $req){
        if($req->action == "update")
            return $this->UpdateCart($req);
        elseif ($req->action == "delete")
            return $this->DeleteCart($req);
        else
            return $this->AddCartToDatabase($req);
    }

    public function DeleteCart($req){
        $id_row = $req->id;
        $id = (Cart::get($id_row))->id;
        $this->foods->DeleteCart($id_row);
        $count = Cart::count();
        return ["id"=>$id,"count"=>$count];
    }

    public function UpdateCart($req){
            $id_row = $req->id;
            $qty = $req->qty;
            $this->foods->UpdateCart($id_row, $qty);
            $price = (Cart::get($id_row))->price;
            return $price * $qty;
    }

    public function AddCartToDatabase(Request $req){

//        $valid = $req->validate([
//            'fullname'=>'required|min:5|max:100',
//            'email'=>'required|email',
//            'address'=>'required|min:5|max:100',
//            'phone'=>'required|numeric'
//        ],[
//            "unique"=>":attribute bị trùng"
//        ]);
//echo 'sdf';
//        return redirect(route('checkout'));

        $validate= \Validator::make(
            $req->all(),
            [
                'fullname'=>'required|min:5|max:100',
            'email'=>'required|email',
            'address'=>'required|min:5|max:100',
            'phone'=>'required|numeric'
            ],

            [
                'required'=>':attribute không được để trống',
                'min'=>':attribute không được nhỏ hơn :min',
                'max'=>':attribute không được lớn hơn :max',
                'numeric'=>':attribute phải là số',
                'email'=>':attribute không phải dạng email'
            ]
        );

        if ($validate->fails())
        {
            return redirect()->route('checkout')->withErrors($validate)->withInput();
        }

        $arr_cus = ['name'=>$req->fullname,'gender'=>$req->gender,'email'=>$req->email,'address'=>$req->address,'phone'=>$req->phone,'note'=>$req->message];
//        $this->sendMailConfirm($arr_cus['email']);
        $this->insertCart($arr_cus);

        return redirect()->route('checkout');
    }

    public function insertCart($arr_cus){
        DB::beginTransaction();
        try{
            $customer = customerModel::create([
                'name'=>$arr_cus['name'],
                'gender'=>$arr_cus['gender'],
                'email'=>$arr_cus['email'],
                'address'=>$arr_cus['address'],
                'phone'=>$arr_cus['phone'],
                'note'=>$arr_cus['note']
            ]);

            $total = Cart::subtotal(false,"","");
            settype($total,"int");

//        dd($total);
            $today = Carbon::today();
            $token = $this->createToken();
            $token_date = Carbon::now();
//            dd(time());
//            dd(strtotime($token_date->toDateTimeString()));

            $bill = billModel::create([
                'id_customer'=>$customer->id,
                'date_order'=>$today->toDateString(),
                'total'=>$total,
                'payment_method'=>'cash',
                'note'=>$arr_cus['note'],
                'token' => $token,
                'token_date'=>$token_date->toDateTimeString(),
                'status'=> "0"
            ]);

//            dd("error");
            $all_cart = Cart::content();
            foreach ($all_cart as $cart){
                billdetailModel::create([
                    'id_bill'=>$bill->id,
                    'id_food'=>$cart->id,
                    'quantity'=>$cart->qty,
                    'price'=>$cart->price
                ]);
            }

            Cart::destroy();
            DB::commit();
            $this->sendMailConfirm($arr_cus['email'],$token,$token_date);

            return redirect()->route("checkout")->with('success','Bạn đã đặt hàng thành công');
        }
        catch (\Exception $e){
            DB::rollback();
        }

    }

    public function sendMailConfirm($user_email,$token,$tokendate){
        try{
            $data = array(
                'name' => "Learning Laravel",
            );
//            Mail::send("mail.mailconfirm" ,$data, function ($message) use($user_email) {
//
//                $message->from('huylevinh13@gmail.com', 'Huy PHP');
//
//                $message->to($user_email)->subject('Learning Laravel test email');
//
//            });
            Mail::to($user_email)->send(new mailConfirm($token,strtotime($tokendate)));
        }catch (\Exception $e){
            dd($e->getMessage());
        }
    }

    public function acceptMail($token,$tokendate){
        if(strlen($token)!=32){
            $message = "Lỗi token";
            $error = "error";
        }
        else{
            $now = strtotime((Carbon::now())->toDateTimeString());
            if($now - $tokendate <=86400){

                billModel::where("token",$token)->update([
                    'token'=>null,
                    'token_date'=>null,
                    'status'=>1
                ]);
//                dd("update");
                $message = "Đơn hàng của bạn đã được xác nhận. Bạn sẽ được giao hàng trong 24h đồng hồ tới";
                $error = "success";
            }
            else{
                $message = "Hết hạn xác nhận";
                $error = "error";
            }
        }
        return view("mailaccept",["message"=>$message,"error"=>$error]);
    }
    public function createToken(){
        $str = "0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
        $str_len = strlen($str);
        $result='';
        for($i=0;$i<32;$i++){
            $num = rand(0,$str_len-1);
            $result .= substr($str,$num,1);
        }
        return $result;
    }
}
