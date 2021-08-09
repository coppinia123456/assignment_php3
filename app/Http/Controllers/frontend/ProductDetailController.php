<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductDetailController extends Controller
{
    public function index(Request $request)
    {

        if (isset($request->pr) || !empty($request->pr)) {
            $product = Product::firstWhere('slug', $request->pr);
            if (isset($product->id)) {
            $product->load('image_products');
            $product->load('branch');
                return view('client.pages.productDetail',compact('product'));
            }
        }
        return redirect()->route('/');
    }
}
