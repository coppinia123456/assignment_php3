<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public $products_DT = [];
  public $products_DDG = [];
  public function index(Request $request)
  {
    // get slider
    $slider = Slider::orderBy('updated_at', 'desc')->get();
    $products_sales = [];
    // get producs Điện tử


    Product::with('categories')->orderBy('updated_at', 'DESC')->chunk(100, 
    function ($products) { 
        foreach ($products as $product) {
            $cate = $product->categories;            
            foreach ($cate as $cat) {                           
                if ($cat->status == config('categories.cate.ts.ĐT')) {
                  if(count( $this->products_DT)<4){
                    $this->products_DT[]=$product;
                  }                            
                }              
              }         
            }
    });
    // get producs Điện gia dung
    Product::with('categories')->orderBy('updated_at', 'DESC')->chunk(100, 
    function ($products) { 
        foreach ($products as $product) {
            $cate = $product->categories;            
            foreach ($cate as $cat) {                           
                if ($cat->status == config('categories.cate.ts.ĐDG')) {
                  if(count( $this->products_DDG)<4){
                    $this->products_DDG[]=$product;
                  }                            
                }              
              }         
            }
    });
    $products_DT = $this->products_DT;
    $products_DDG = $this->products_DDG;
    // get producs sale >45%
    $products_sales = Product::where('discount', '>=', '15')->orderBy('discount', 'desc')->orderBy('updated_at', 'desc')->paginate(4);
    // dd($products_sales);
    return view('client.pages.home', compact( 'slider', 'products_DT','products_DDG', 'products_sales'));
  }
}
