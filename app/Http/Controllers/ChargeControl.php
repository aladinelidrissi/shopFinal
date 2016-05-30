<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;
use App\Charge;
use App\ChargeItem;
use App\Trolley;
use App\TrolleyItem;

class ChargeControl extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkout(Request $request)
    {
        $token = $request->input('stripeToken');

        //Retrieve trolley information
        $trolley = Trolley::where('user_id',Auth::user()->id)->first();
        $items = $trolley->trolleyItems;
        $total=0;
        foreach($items as $item){
            $total+=$item->product->price;
        }
        if(
        Auth::user()->charge($total*100, [
            'source' => $token,
            'receipt_email' => Auth::user()->email,
        ])){

            $charge = new Charge();
            $charge->total_paid= $total;
            $charge->user_id=Auth::user()->id;
            $charge->save();

            foreach($items as $item){
                $chargeItem = new ChargeItem();
                $chargeItem->charge_id=$charge->id;
                $chargeItem->product_id=$item->product->id;
                $chargeItem->file_id=$item->product->file->id;
                $chargeItem->save();

                TrolleyItem::destroy($item->id);
            }
            return redirect('/charge/'.$charge->id);

        }else{
            return redirect('/trolley');
        }

    }

    public function index(){
        $charges = Charge::where('user_id',Auth::user()->id)->get();

        return view('charge.charges',['charges'=>$charges]);
    }

    public function showCharge($chargeId){
        $charge = Charge::find($chargeId);
        return view('charge.view',['charge'=>$charge]);
    }
}
