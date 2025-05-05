<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Order;
use App\Models\Outlet;
use App\Models\ComfirmOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    public function index()
    {
        $orders = ComfirmOrder::whereDate('created_at', '=', Carbon::today()->toDateString())->get();
        $groupedOrders = $orders->groupBy('outlet_id');
        // $groupedOrders = ComfirmOrder::all()->groupBy('outlet_id');
        $groupedOrdersWithTotal = $groupedOrders->map(function($orders){
            $total = $orders->sum(function ($order){
                return $order->total;
            });
            return['orders' => $orders,'total' => $total];

        });
        
        return view('Admin.Order',compact('groupedOrdersWithTotal'));
    }

    public function detail(Request $requset,Outlet $outlet)
    {
        $id = $outlet->id;
        $orders = ComfirmOrder::where('outlet_id', $id)
                    ->whereDate('created_at', Carbon::today())
                    ->get();
        $name = $outlet->name;
        $address = $outlet->city->name;
        $phno =   $outlet->Phone_Number;
        $total = 0;

        
        foreach ($orders as $key => $order) {
            $total += $order->total;
            $date = date_format($order->created_at,"d/m/Y");
            $order_id = $order->order_id;
            
        }
        // $date = date('d,m,Y');
        $datas = [
             "name" => $name,
             "address" => $address,
             "ph"  => $phno,
             "total" => $total,
             "order_id" => $order_id,
             "date" => $date,
        ];

        return view('Admin.OrderVoucher',compact('orders','datas'));
    }

    //for report
    public function report(){

        return view('Admin.Report');
    }

    public function report_detail(Request $request){

        $validated = $request->validate([
            'date' => 'required',
        ]);

        $date = $request->date;

        $format = Carbon::parse($date)->toDateString();
        $raw = ComfirmOrder::whereDate('created_at', '=', $format)->get();

        $productTotal = $raw->groupBy('product_id')->map(function($group){
            return[
                'product_id' =>$group->first()->product_id,
                'product_name' => $group->first()->product->name,
                'price' => $group->first()->product->price,
                'total_qty' => $group->sum('qty'),
                'total_price' => $group->sum(function ($order) {
                   return $order->qty * $order->price;
               }),

            ];
        });
        $grandTotal = $productTotal->sum('total_price');
        return view('Admin.Report',compact('productTotal','grandTotal','format'));

        

        // $orders = ComfirmOrder::where
        
    }
}
