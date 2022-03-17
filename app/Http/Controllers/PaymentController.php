<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\District;
use App\Status;
use App\line_item_clone;
use App\User;
use App\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with(['district','status'])->orderBy('created_at', 'DESC');
   
       
        if (request()->status_id != '') {
            $payments = $payments->where('status_id', request()->status_id);
        }

        $payments = $payments->paginate(10);
        return view('payments.index', compact('payments'));
    }

    public function view($id)
    {
        $payment= DB::table('payments')
        ->join('statuses', 'payments.status_id', '=', 'statuses.id')
        ->select('statuses.status','payments.cart_id','payments.fullname','payments.address','payments.phone')
        ->where('payments.cart_id', '=', $id)
        ->first();
        $district= District::get();
        $line_item_clone=DB::table('line_item_clones')
        ->join('images', 'images.id', '=', 'line_item_clones.image_id')
        ->select('line_item_clones.product_name','line_item_clones.quantity','images.warna')
        ->where('line_item_clones.cart_id', '=', $id)->get();
        
        $user=User::get();
        return ([
            "payment" => $payment,
            "district" => $district,
            "line_item_clone" => $line_item_clone,
            "user"=>$user
        ]);
    }

    public function acceptPayment($id)
    {
        $payment = Payment::where('id', $id)->first();
        $payment->update(['status_id' => 3]);
        return redirect()->back()->with(['success' => 'Status Diubah!']);
    }
  
    public function done($id)
    {
        $payment = Payment::where('id', $id)->first();
        $payment->update(['status_id' => 2]);
        return redirect()->back()->with(['success' => 'Status Diubah!']);
    }

}
