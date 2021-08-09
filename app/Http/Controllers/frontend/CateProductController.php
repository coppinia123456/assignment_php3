<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CateProductController extends Controller
{
    public $products_DT = [];
    public $cp = [];
    public function index(Request $request)
    {
        //   dd($request->cp);
        if (isset($request->cp) || !empty($request->cp)) {
            $this->cp[] = $request->cp;

            Product::with('categories')->orderBy('updated_at', 'DESC')->chunk(
                100,
                function ($products) {
                    foreach ($products as $product) {
                        $cate = $product->categories;
                        foreach ($cate as $cat) {
                            if ($cat->slug == $this->cp[0]) {
                                $this->products_DT[] = $product;
                            }
                        }
                    }
                }
            );
            $product = $this->products_DT;
            if ($product) {
                return view('client.pages.cateProduct', compact('product'));
            }
        }
        return redirect()->route('/');
    }
}
