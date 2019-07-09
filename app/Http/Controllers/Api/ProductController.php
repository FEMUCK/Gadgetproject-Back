<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return response()->json($product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'productName' => 'required',
            'productCategory' => 'required',
            'productQuantity' => 'required|numeric',
            'productPrice_1' => 'required|numeric',
            'imageName' => 'required',
        ]);  

        $product = new Product();
        $product->name = $request->get('productName');
        $product->category = $request->get('productCategory');
        $product->description = $request->get('productDescription');
        $product->discount = $request->get('productDiscount');
        $product->quantity = $request->get('productQuantity');
        $product->image = $request->get('imageName');
        $product->price1 = $request->get('productPrice_1');
        $product->price2 = $request->get('productPrice_2');
        $product->price3 = $request->get('productPrice_3');
        $product->price4 = $request->get('productPrice_4');
        $product->price5 = $request->get('productPrice_5');
        $product->price6 = $request->get('productPrice_6');
        $product->price7 = $request->get('productPrice_7');
        $product->save();

        return response()->json([
            'message' => 'Create Success'
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'productName' => 'required',
            'productCategory' => 'required',
            'productQuantity' => 'required|numeric',
            'productPrice_1' => 'required|numeric',
            'imageName' => 'required',
        ]);  

        $product = Product::find($id);
        $product->name = $request->get('productName');
        $product->category = $request->get('productCategory');
        $product->description = $request->get('productDescription');
        $product->discount = $request->get('productDiscount');
        $product->quantity = $request->get('productQuantity');
        $product->image = $request->get('imageName');
        $product->price1 = $request->get('productPrice_1');
        $product->price2 = $request->get('productPrice_2');
        $product->price3 = $request->get('productPrice_3');
        $product->price4 = $request->get('productPrice_4');
        $product->price5 = $request->get('productPrice_5');
        $product->price6 = $request->get('productPrice_6');
        $product->price7 = $request->get('productPrice_7');
        $product->save();

        return response()->json([
            'message' => 'Update Success'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        $productList = Product::all();

        return response()->json($productList);
    }
}
