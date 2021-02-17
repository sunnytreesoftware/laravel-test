<?php

namespace App\Http\Controllers;

use App\Product;
use App\SalesHistory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class SalesController extends Controller
{
    public function order(){

        $customers = User::where('user_type', User::CUSTOMER)->get();
        $products = Product::all();
        $orders = SalesHistory::with(['product', 'customer'])->where('sales_man_id', Auth::user()->id)->latest()->paginate(10);
        return view('make_order', ['customers' => $customers, 'products' => $products, 'orders' => $orders]);
    }

    public function makeOrder(Request $request){
        $customer_id = $request->customer_id;
        $product_id = $request->product_id;
        $quantity = $request->quantity;

        $this->validate($request, [
            'customer_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|numeric'
        ]);

        DB::beginTransaction();
       try {
        $product = Product::where('id',$product_id)->lockForUpdate()->first();

        if($quantity <=0)
            return redirect()->back()->with('error', 'Invalid quantity');

        if($product->stock <= 0)
            return redirect()->back()->with('error', 'Insufficient stock');

        if($quantity > $product->stock)
            return redirect()->back()->with('error', 'Exceed stock');

        SalesHistory::create([
            'product_id' => $product_id,
            'customer_id' => $customer_id,
            'sales_man_id' => Auth::user()->id,
            'quantity' => $quantity,
            'price' => $product->price,
            'order_status' => SalesHistory::ORDER
        ]);

        Product::where('id', $product_id)
            ->update([
                'stock' => $product->stock - $quantity
            ]);

        DB::commit();
        return redirect()->back()->with('success', 'Order has been successfully created');
       }catch(Throwable $th){
           report($th);
           DB::rollBack();
           return redirect()->back()->with('error', 'Something is wrong please try again');
       }

    }

    public function makePaid($order_id){

        $order = SalesHistory::findOrFail($order_id);
        $order->order_status = SalesHistory::PAID;
        $order->save();

        return redirect()->back()->with('success', 'Order has been paid');
    }
}
