<?php

namespace App\Http\Controllers;

## include Product Model
use App\Models\Product;
## Include Session
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    ## display all product with pagination
    public function index(){
        $products = Product::paginate(10);
        return view('product.index', compact('products'));
    }

    ## store created product
    public function store(Request $request){

        ## validation
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => 'required|numeric|min:0.01|max:10000.00',
        ]);

        ## save product to Product Table
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description ? $request->description : null,
        ]);


        // Set a flash message
        Session::flash('success', 'User created successfully!');

        // Redirect to the current page
        return redirect()->back();
    }

    ## Edit Product Page
    public function edit($product_id){
        ## find product by product id;
        $product_modal = Product::find($product_id);
        // return view('product.edit', compact('product'));
        return view('product.index', compact('product_modal'));
    }

    public function update(Request $request, $product_id){

        ## validation
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => 'required|numeric|min:0.01|max:10000.00',
        ]);



        $product = Product::find($product_id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->status = $request->status ? 'active' : 'inactive' ;
        $product->description = $request->description ? $request->description : null;
        ## update product
        $product->update();


        // Set a flash message
        Session::flash('success', 'Product updated successfully!');

        // Redirect to the current page
        return redirect()->back();
    }

    ## Soft delete product and update product status to inactive
    public function delete($productId){
        $product = Product::findOrFail($productId);
        $product->status = 'inactive';

        $product->delete();

        Session::flash('success', 'Product deleted successfully!');

        return redirect()->back();
    }

    public function archive(){
        $products = Product::onlyTrashed()->paginate(10);
        return view('product.archive', compact('products'));
    }

    public function restore($productId){
        $product = Product::withTrashed()->find($productId);
        $product->status = 'active';
        $product->restore();

        Session::flash('success', 'Product restored successfully!');

        return redirect('/product');
    }
}
