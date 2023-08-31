<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.product');
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
            'description' => 'required|max:191',
            'price' => 'required',
            'quentity' => 'required',
            'gst' => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 400,
                'errors' => $validator->getMessageBag(),
            ]);
        } else {
            $products = new Product();
            $products->name = $request->input('name');
            $products->description = $request->input('description');
            $products->price = $request->input('price');
            $products->quentity = $request->input('quentity');
            $products->gst = $request->input('gst');
            //$products->image = $request['image'];
            $products->save();
            return response()->json([
                'status' => 200,
                'message' => "Product Add successfully",
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function fetchproduct()
    {
        $products = Product::all();

        return response()->json([
            'products' => $products,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::find($id);
        if ($products) {

            return response()->json([
                'status' => 200,
                'products' => $products,
            ]);
        } else {

            return response()->json([
                'status' => 404,
                'message' => "Product not found",
            ]);
        }
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

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
            'description' => 'required|max:191',
            'price' => 'required',
            'quentity' => 'required',
            'gst' => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 400,
                'errors' => $validator->getMessageBag(),
            ]);
        } else {
            $products = Product::find($id);
            if ($products) {

                $products->name = $request->input('name');
                $products->description = $request->input('description');
                $products->price = $request->input('price');
                $products->quentity = $request->input('quentity');
                $products->gst = $request->input('gst');
                //$products->image = $request['image'];
                $products->update();
                return response()->json([
                    'status' => 200,
                    'message' => "Product update successfully",
                ]);
            } else {

                return response()->json([
                    'status' => 404,
                    'message' => "Product not found",
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::find($id);
        $products->delete();
        return response()->json([

            'status'=>200,
            'message'=>'Product deleted successfully',
        ]);
    }
}
