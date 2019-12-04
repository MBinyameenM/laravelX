<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::latest()->get();
            return Datatables::of($data)
                    // ->addIndexColumn()
                    ->addColumn('edit', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct"> Edit </a>';                            
                            return $btn;
                    })
                    ->addColumn('delete', function($row){

                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Delete" class="edit btn btn-danger btn-sm deleteProduct"> Delete </a>';
                        return $btn;
                    })

                    ->rawColumns(['edit','delete'])
                    ->make(true);
        }
      
        return view('products');
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
        Product::updateOrCreate(
            [ 'id' => $request->product_id ],
            ['name' => $request->name,
            'price' => $request->price,
            'description' => $request->description
            ]);

        return response()->json(['success' => 'Product is saved successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['success' => 'Product is deleted successfully.']);
    }
}
