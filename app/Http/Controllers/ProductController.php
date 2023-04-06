<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = $request->all();
        // $product = Product::create($data);

        
       $file = $request->file('photo');
       $filename = time() . '.' .
       $file->getClientOriginalExtension();

       $photo_path = $request->file('photo')->storeAs('public/products',$filename);
        
       

       $photo_path = str_replace('public/','',$photo_path);
       $data = [
       'name' => $request->name,
       'price' => $request->price,
       'stocks' => $request->stocks,
       'photo' => $photo_path
       ];

    //    $product = Product::create($data);
       $product = Product::create($data);
       return redirect()->route('product.index');
        
       
        
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
        return view('product.update', compact('product'));
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
        $file = $request->file('photo');
        $filename = time() . '.' .
        $file->getClientOriginalExtension();

        $photo_path = $request->file('photo')->storeAs('public/products',$filename);
        $photo_path = str_replace('public/','',$photo_path);

        $product = Product::find($id);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->stocks = $request->stocks;
        $product->photo = $photo_path;
        $product->save();

        return redirect()->route('product.index');
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
        try {
            Storage::delete('public/'.$product->photo);
            $product->delete();
    
        } catch (\Throwable $th){

        }
        $product->delete();

        return redirect()->route('product.index');
    }
}
