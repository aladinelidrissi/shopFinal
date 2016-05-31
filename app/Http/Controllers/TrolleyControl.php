<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Trolley;
use App\TrolleyItem;

use Illuminate\Support\Facades\Session;
use App\Http\Requests;


class TrolleyControl extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addItem ($productId){
        $user = Auth::user();
        $trolley = Trolley::where('user_id',$user->id)->first();

        if(!$trolley){
            $trolley =  new Trolley();
            $trolley->user_id=$user->id;
            $trolley->save();
        }

        $trolleyItem  = new TrolleyItem();
        $trolleyItem->product_id=$productId;
        $trolleyItem->trolley_id= $trolley->id;
        $trolleyItem->save();

        Session::flash('message', 'Producte afegit.');
        Session::flash('alert-class', 'alert-success');

        return redirect('/trolley');

    }
    public function showTrolley(){
        $user = Auth::user();
        $trolley = Trolley::where('user_id',$user->id)->first();

        if(!$trolley){
            $trolley =  new Trolley();
            $trolley->user_id=$user->id;
            $trolley->save();
        }

        $items = $trolley->trolleyItems;
        $total=0;
        foreach($items as $item){
            $total+=$item->product->price;
        }

        return view('trolley.show',['items'=>$items,'total'=>$total]);
    }

    public function removeItem($id){

        TrolleyItem::destroy($id);


        Session::flash('message', 'Producte eliminat.');
        Session::flash('alert-class', 'alert-danger');

        return redirect('/trolley');
    }

}