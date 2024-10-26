<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Notifications\EmailNotification;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function view_category()
    {
        $categories = Category::all();
        return view('admin.category', compact('categories'));
    }

    public function add_category(Request $request)
    {
        Category::create([
            'category_name' => $request->category_name,
        ]);
        return redirect()->back()->with('message', 'Category added successfully');
    }

    public function view_product()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('admin.view_product' , compact('categories' , 'products'));
    }
    public function show_products()
    {
        $products = Product::all();
        return view('admin.show_product' , compact( 'products'));
    }

    public function add_product(Request $request)
    {
//        if ($request->hasFile('image')) {
//            $imagePath = $request->file('image')->store('products', 'public');
//        }
//        Product::create([
//            'title' => $request->title,
//            'description' => $request->description,
//            'price' => $request->price,
//            'category' => $request->category_id,
//            'image' => $imagePath ?? null,
//            'discount_price' => $request->discount_price,
//        ]);
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->discount_price;
            $image = $request->image;
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('product', $image_name);
            $product->image = $image_name;
        $product->save();
        return redirect()->back()->with('message', 'product added successfully');
    }

    public function edit_product($id)
    {
        // Find the product by ID
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('admin.edit_product', compact('product', 'categories'));
    }

    public function update_product($id , Request $request)
    {
        $product = Product::findOrFail($id);
        $product->title = $request->title ?? $product->title;
        $product->description = $request->description ?? $product->description;
        $product->price = $request->price ?? $product->price;
        $product->category_id = $request->category_id ?? $product->category;
        $product->quantity = $request->quantity ?? $product->quantity;
        $product->discount_price = $request->discount_price ?? $product->discount_price;
        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('product', $image_name);
            $product->image = $image_name;
        }
        $product->save();
        return redirect()->back()->with('message', 'Product updated successfully');
    }

    public function delete_category($id)
    {
        Category::find($id)->delete();
        return redirect()->back()->with('message', 'Category deleted successfully');
    }
    public function delete_product($id)
    {
        Product::find($id)->delete();
        return redirect()->back()->with('message', 'Product deleted successfully');
    }

    public function view_order()
    {
        $orders = Order::all();
        return view('admin.view_order' , compact('orders'));
    }

    public function delivered($id)
    {
        $order = Order::findOrFail($id);
        $order->delivery_status = 'delivered';
        $order->save();
        return redirect()->back()->with('message', 'Order delivered successfully');
    }

    public function print_pdf($id)
    {
        $order = Order::findOrFail($id);
        $pdf = PDF::loadView('admin.print_pdf', compact('order'));
        return $pdf->download('order_details.pdf');
    }

    public function send_email($id)
    {
        $order = Order::findOrFail($id);

        return view('admin.send_email', compact('order'));
    }

    public function send_user_email(Request $request ,$id)
    {
        $order = Order::findOrFail($id);
        $details = [
            'email_greeting' => $request->email_greeting,
            'email_subject' => $request->email_subject,
            'email_body' => $request->email_body,
            'email_button_name' => $request->email_button_name,
            'email_url' => $request->email_url,
        ];
        Notification::send($order->user, new EmailNotification($details));
        return redirect()->back()->with('message', 'Email sent successfully');
    }


    public function search(Request $request)
    {
        if ($request->has('query')) {
            $query = $request->get('query');

            $orders = Order::where('name', 'LIKE', "%{$query}%")
                ->orWhere('email', 'LIKE', "%{$query}%")
                ->orWhere('product_title', 'LIKE', "%{$query}%")
                ->get();
        } else {
            $orders = Order::all();
        }

        return response()->json($orders);
    }
}
