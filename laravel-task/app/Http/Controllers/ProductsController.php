<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\This;

class ProductsController extends Controller
{
    public function  __construct(){
        $this->middleware('auth');
    }

    public function product(){

        $products = Product::paginate(10);
        return view('product', ['products' => $products]);
    }

    public function addProduct(Request $request){

        $car_vin = $request->car_vin;
        $car_model = $request->car_model;
        $price = $request->price;
        $stock = $request->stock;
        $year = $request->year;
        $image = $request->image;
        $image_path = null;

        $this->validate($request, [
            'car_vin' => 'required|unique:products',
            'car_model' => 'required',
            'price' => 'required',
            'stock' => 'required|numeric',
            'year' => 'required|numeric'
        ]);

        if($request->hasFile('image')){
            $image_path = $request->file('image')->store('products');
        }

        Product::create([
            'car_vin' => $car_vin,
            'car_model' => $car_model,
            'price' => $price,
            'stock' => $stock,
            'year' => $year,
            'image_path' => $image_path
        ]);


        return redirect()->back()->with('success', 'Product has been successfully added');
    }

    public function topUpProductStock(Request $request){

        $stock = $request->stock;
        $product_id = $request->product_id;

        $this->validate($request, [
            'stock' => 'required|numeric',
            'product_id' => 'required|exists:products,id'
        ]);

        $product = Product::findOrFail($product_id);
        $product->stock = $product->stock + $stock;
        $product->save();

        return redirect()->back()->with('success', 'Product stock has been successfully top up');
    }

    public function editProduct(Request $request){

        $car_vin = $request->car_vin;
        $car_model = $request->car_model;
        $price = $request->price;
        $year = $request->year;
        $id = $request->id;

        $this->validate($request, [
            'car_vin' => 'required',
            'car_model' => 'required',
            'price' => 'required',
            'year' => 'required|numeric',
            'id' => 'required|exists:products'
        ]);

        Product::where('id', $id)
            ->update([
                'car_vin' => $car_vin,
                'car_model' => $car_model,
                'price' => $price,
                'year' => $year,
            ]);


        return redirect()->back()->with('success', 'Product has been successfully edited');
    }
}
