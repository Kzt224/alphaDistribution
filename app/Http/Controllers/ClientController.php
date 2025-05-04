<?php

namespace App\Http\Controllers;

use App\Models\Way;
use App\Models\Order;
use App\Models\Outlet;
use App\Models\Product;
use App\Models\ComfirmOrder;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    
public function home()
{
    $day = strtolower(date('l')); // e.g., 'monday'

    $way = Way::whereRaw('LOWER(day) = ?', [$day])->first();

    if (!$way || !$way->city_id) {
        return view("Client.Index", ['outlets' => collect()]);
    }

    $outlets = Outlet::where('city_id', $way->city_id)->get();
    return view("Client.Index", compact('outlets'));
}


    public function product(Request $request)
    {
        $outlet = $request->outlet;
        $products = Product::all();
        return view ('Client.Client_product',compact('products','outlet'));
    }

    public function order(Request $request)
    {

        $validated = $request->validate([
            'product_id' => 'required',
            'user_id' => 'required',
            'price' => 'required',
            'outlet_id' => 'required',
            'qty' => 'required||numeric|gt:0',
        ]);
         $price = $request->price;
         $qty = $request->qty;
         $total = $price * $qty;
         $outlet_id = $request->outlet_id;

         $order = new Order;
         $order->outlet_id = $request->outlet_id;
         $order->product_id = $request->product_id;
         $order->user_id = $request->user_id;
         $order->price = $request->price;
         $order->qty = $qty;
         $order->total = $total;

 
         $order->save();
         return back()->with('message','Add To Cart  Successfully');
    }


    public function order_list()
    {
        
        $groupedOrders = Order::all()->groupBy('outlet_id');

        $groupedOrdersWithTotal = $groupedOrders->map(function($orders){
            $total = $orders->sum(function ($order){
                return $order->total;
            });
            return['orders' => $orders,'total' => $total];

        });
        return view('Client/OrderList',compact('groupedOrdersWithTotal'));
    }


    public function upload(Product $product){
        $orders = Order::all();
        $order_id  = rand(1,999);

        foreach($orders as $key => $order){
            $outlet_id = $order->outlet_id;
            $product_id = $order->product_id;
            $user_id  = $order->user_id;
            $price = $order->price;
            $qty = $order->qty;
            $total = $order->total;


           $comfirmOrder = new ComfirmOrder;

           for ($i=0; $i <= $key ; $i++) { 
             $comfirmOrder->outlet_id = $outlet_id;
             $comfirmOrder->order_id = $order_id;
             $comfirmOrder->product_id = $product_id;
             $comfirmOrder->user_id = $user_id;
             $comfirmOrder->price = $price;
             $comfirmOrder->qty = $qty;
             $comfirmOrder->total = $total;

             $done = $comfirmOrder->save();
           }

        }
            if(isset($done)){
               $this -> updateData();
            }else{
                return redirect('/client/orderlist')->with('warning','no data for upload');
            }
            Order::whereNotNull('id')->delete();  
             
        return redirect('/client/orderlist')->with("message",'Upload Successfully');
    }
    
    public function updateData(){
        
        $orders = Order::all();
        foreach ($orders as $key => $order) {
            $id = $order->product_id;
            $qty = $order->qty;

            $products = Product::where('id',$id)->get();
            
            foreach ($products as $key => $product) {
                $Pqty = $product->qty;
                $upQty = $Pqty - $qty;
                $product->qty = $upQty;
                $product->save();
            }

        }

        return redirect()->back()->with('message','all data uploaded');
    
    }

    //client logout 
    public function logout(){
        
        return view("Client.Login");
    }

}
