<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\SellerRequest;
use App\Models\Variety;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function admin_orders(){
        $sellerRequest = SellerRequest::all();
        $countRequest = count($sellerRequest);
        $orders = Order::query()->orderBy('date' , )->get();
        $newOrder = [];

        foreach ($orders as $order){
            $order->{'image'} =  explode(',' , $order->variety[0]->product->image)[0] ;
            $order->{'prodoct_id'} = $order->variety[0]->product->id ;
            $order->{'name'} = $order->variety[0]->product->name ;
            $order->{'warranty_name'} = $order->variety[0]->warranty->name ;
            $order->{'warranty_period'} = $order->variety[0]->warranty->period ;
            $order->{'PDateDay'} = verta($order->date , 'iran')->day ;
            $order->{'PDateMonth'} = verta($order->date , 'iran')->month ;
            $order->{'PDateYear'} = verta($order->date , 'iran')->year ;
            $order->{'nowDay'} = verta('','iran')->day ;
            $order->{'nowMonth'} = verta('','iran')->month ;
            $order->{'nowYear'} = verta('','iran')->year ;
            $order->{'seller_id'} = $order->variety[0]->user_id ;
            $order->{'auth_id'} = auth()->user()->id ;

            if ($order->variety[0]->product->variety_type == 'color'){
                $order->{'var_name'} = $order->variety[0]->color->name;
            }elseif ($order->variety[0]->product->variety_type == 'size'){
                $order->{'var_name'} = $order->variety[0]->size->size;
            }elseif ($order->variety[0]->product->variety_type == 'Weight'){
                $order->{'var_name'} = $order->variety[0]->Weight->weight;
            }elseif ($order->variety[0]->product->variety_type == 'volume'){
                $order->{'var_name'} = $order->variety[0]->volume->volume;
            }elseif ($order->variety[0]->product->variety_type == 'number'){
                $order->{'var_name'} = $order->variety[0]->num->number;
            }elseif ($order->variety[0]->product->variety_type == 'null'){
                $order->{'var_name'} = '';
            }

            $order->{'user_name'} = $order->user[0]->name ;
            $order->{'user_address'} = $order->user[0]->address ;
            $order->{'user_phone'} = $order->user[0]->phone ;
            array_push($newOrder , $order);

        }
        $orderLast = json_encode($newOrder);
        return view('admin.order.order' , compact('orderLast' , 'orders' , 'countRequest'));
    }


    public function admin_orders_update(Request $request){
        $varity = Variety::query()->where('id', $request->varietyId)->get();
        Order::where('id' , $request->orderId)->update(['order_status'=>$request->status]);
        if($request->action == 'canceled'){
            Variety::where('id', $request->varietyId)->update([
                'reserve_num'=> $varity[0]->reserve_num - $request->number,
                'remain'=> $varity[0]->remain + $request->number,
            ]);
        }

    }
}
