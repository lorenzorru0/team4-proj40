<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();

        $ordersFiltered = [];

        foreach ($orders as $order) {
            if ($order->deliver == 0) {
                $ordersFiltered[] = $order;
            }
        }

        $orders = $ordersFiltered;

        return view('orders.index', compact('orders'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexDelivered()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();

        $ordersFiltered = [];

        foreach ($orders as $order) {
            if ($order->deliver) {
                $ordersFiltered[] = $order;
            }
        }

        $orders = $ordersFiltered;

        return view('orders.indexDelivered', compact('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        if ($order->user_id != Auth::id()) {
            abort("403");
        }

        return view('orders.show', compact('order'));
    }

    /**
     * Change visibilty of the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeDeliver(Request $request)
    {

        $order = Order::find($request->deleteId);

        $order->deliver = 1;

        $order->save();

        return redirect()->route("admin.orders.index")->with('success', "Ordine segnato come consegnato.");
    }

    public function orderStats(){

        $data = Order::where('user_id', Auth::user()->id)->get()->groupBy(function($data){
            return Carbon::parse($data->created_at)->format('M/Y');
        });
        // $allOrders = Order::all()->where('user_id', Auth::user()->id);

        // $years = $allOrders->groupBy(function($allOrders){
        //     return Carbon::parse($allOrders->created_at)->format('Y');
        // });
        

        // $months = ['Gen','Feb','Mar','Apr','Mag','Giu','Lug','Ago','Sep','Oct','Nov','Dic'];

        // dd($months);
        
        $months=[];
        $monthOrders=[];
        foreach($data as $month => $values){
            $months[]=$month;
            $monthOrders[]=count($values);
        }
    
        return view('orders.stats', compact('data', 'months', 'monthOrders'));
    
    }
}
