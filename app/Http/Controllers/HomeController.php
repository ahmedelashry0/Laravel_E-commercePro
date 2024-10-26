<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;

class HomeController extends Controller
{
    public function redirect()
    {
        $products = Product::paginate(6);
        $userType = Auth::user()->userType;
        if ($userType == '1') {
            $total_products = Product::all()->count();
            $total_orders = Order::all()->count();
            $total_users = User::all()->count();
            $total_revenue = Order::sum('price');
            $orders_delivered = Order::where('delivery_status', 'delivered')->count();
            $orders_processing = Order::where('delivery_status', 'processing')->count();
            return view('admin.home' , compact('total_products' , 'total_orders' , 'total_users' , 'total_revenue' , 'orders_delivered' , 'orders_processing'));
        }
        else {
            return view('home.userpage' , compact('products'));
        }
    }

    public function index()
    {
        $products = Product::paginate(6);
        return view('home.userpage' , compact('products'));
    }

    public function product_details($id)
    {
        $product = Product::findOrFail($id);
        return view('home.product_details' , compact('product'));
    }

    public function add_toCart(Request $request , $id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $product = Product::find($id);
            $price = $product->discount_price ? $product->discount_price : $product->price;
            Cart::create([
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'address' => $user->address,
                'product_title' => $product->title,
                'price' => $this->product_final_price($request->quantity , $price),
                'quantity' => $request->quantity,
                'image' => $product->image,
                'product_id' => $product->id,
                'user_id' => $user->id,
            ]);
            return redirect()->back();
        }
        else{
            return redirect('login');
        }
    }

    public function cart()
    {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $products = Cart::where('user_id', '=' ,$id )->get();
            return view('home.cart' , compact('products'));
        }
        else{
            return redirect('login');
        }
    }

    public function delete_cart($id)
    {
        Cart::destroy($id);
        return redirect()->back();
    }

    public function cashOnDelivery()
    {
        $orders = Cart::where('user_id', Auth::id())->get();
       foreach ($orders as $order) {
           Order::create([
               'name' => $order->name,
               'email' => $order->email,
               'phone' => $order->phone,
               'address' => $order->address,
               'product_title' => $order->product_title,
               'price' => $order->price,
               'quantity' => $order->quantity,
               'image' => $order->image,
               'product_id' => $order->product_id,
               'user_id' => $order->user_id,
               'payment_method' => 'cash on delivery',
               'delivery_status' => 'processing',
           ]);
              Cart::destroy($order->id);
       }
       return redirect()->back()->with('message' , 'Your order has been placed successfully');
    }

    public function stripe($totalPrice)
    {
        return view('home.stripe' , compact('totalPrice'));
    }

    public function stripePost(Request $request , $totalPrice)

    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));



        Stripe\Charge::create ([

            "amount" => $totalPrice * 100,

            "currency" => "usd",

            "source" => $request->stripeToken,

            "description" => "Thank you for purchasing!",

        ]);

        $orders = Cart::where('user_id', Auth::id())->get();
        foreach ($orders as $order) {
            Order::create([
                'name' => $order->name,
                'email' => $order->email,
                'phone' => $order->phone,
                'address' => $order->address,
                'product_title' => $order->product_title,
                'price' => $order->price,
                'quantity' => $order->quantity,
                'image' => $order->image,
                'product_id' => $order->product_id,
                'user_id' => $order->user_id,
                'payment_method' => 'Paid with card',
                'delivery_status' => 'processing',
            ]);
            Cart::destroy($order->id);
        }

        Session::flash('success', 'Payment successful!');



        return back();

    }

    public function user_orders()
    {
        if (Auth::id()) {
            $orders = Order::where('user_id', Auth::id())->get();
            return view('home.user_orders' , compact('orders'));
        }
        else{
            return redirect('login');
        }
    }

    public function cancel_order($id)
    {
        $order = Order::findOrFail($id);

        $order->delivery_status = 'cancelled';

        $order->save();

        return redirect()->back()->with('message' , 'Your order has been cancelled successfully');
    }

    public function search_products(Request $request)
    {
        $search = $request->input('search');

        // Fetch products based on search criteria, with pagination
        $products = Product::where('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->paginate(6);

        return view('home.userpage', compact('products'));
    }

    public function product_final_price($qty , $price)
    {
        return $qty * $price;
    }
}
