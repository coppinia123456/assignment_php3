<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\carts;
use App\Models\Product;

class CheckoutController extends Controller
{
    private $carts;
    public function __construct(carts $carts)
    {
        $this->carts = $carts;
    }

    public function index()
    {
        $users_login = Auth::user();

        // $cart= carts::where("user_id",$users->id)->get();
        $users = User::firstWhere("id", $users_login->id);
        $users->load('product');
        $users->load('carts');

        return view("client.pages.checkout", compact("users"));
    }

    public function add_product(Request $request)
    {
        $users_login = Auth::user();
        // 
        if (Auth::check()) {

            $product = Product::firstWhere("id", $request->id);
            if ($product) {
                $request->id = (int)$request->id;
                //  
                $cart = carts::Where("user_id", $users_login->id)->Where("pro_id", $request->id)->first();
               
                if ($cart) {
                    $cart->quantity = (int)$cart->quantity+1;
                   
                    carts::Where("user_id", $users_login->id)->Where("pro_id", $request->id)->update([              
                        'quantity' => $cart->quantity,
                    ]);
                    return response()->json(['success' => 'Thêm sản phẩm thành công']);
                }
                else{
                     $this->carts->create([
                        'user_id' => $users_login->id,
                        'pro_id' => $request->id,
                        'quantity' => 1,
                    ]);
                
                return response()->json(['success' => 'Thêm sản phẩm thành công']);
                }
                   
            }
            return response()->json(['errors' => 'Sản phẩm không tồn tại']);
        }
        return response()->json(['errors' => 'Yêu cầu đăng nhập']);
    }
}
