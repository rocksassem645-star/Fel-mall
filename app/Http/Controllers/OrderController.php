<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Admin methods
    function index()
    {
        $orders = Order::all();
        return view("Order.index", ['result' => $orders]);
    }

    function show($id)
    {
        $order = Order::findOrFail($id);
        return view("Order.show", ["result" => $order]);
    }

    function delete($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route("home")->with("order_message", "Deleted successfully");
    }

    // User methods
    public function cart()
    {
        $cart = session()->get('cart', []);
        $products = [];
        $total = 0;

        foreach ($cart as $id => $details) {
            $product = Product::find($id);
            if ($product) {
                $products[] = [
                    'product' => $product,
                    'quantity' => $details['quantity'],
                    'subtotal' => $product->price * $details['quantity']
                ];
                $total += $product->price * $details['quantity'];
            }
        }

        return view('shop.cart', compact('products', 'total'));
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = ['quantity' => 1];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('cart_success', true);
    }

    public function updateCart(Request $request, $id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Cart updated!');
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Product removed!');
    }

    // Add this to OrderController
    public function deleteUserOrder($id)
    {
        $order = Order::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $order->delete();

        return redirect()->route('user.orders')->with('success', 'Order deleted successfully.');
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        $products = [];
        $total = 0;

        foreach ($cart as $id => $details) {
            $product = Product::find($id);
            if ($product) {
                $products[] = [
                    'product' => $product,
                    'quantity' => $details['quantity'],
                    'subtotal' => $product->price * $details['quantity']
                ];
                $total += $product->price * $details['quantity'];
            }
        }

        if (empty($products)) {
            return redirect()->route('cart')->with('error', 'Cart is empty!');
        }

        return view('shop.checkout', compact('products', 'total'));
    }

    public function placeOrder(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'Cart is empty!');
        }

        foreach ($cart as $id => $details) {
            $product = Product::find($id);
            if ($product) {
                Order::create([
                    'user_id' => Auth::id(),
                    'product_id' => $product->id,
                    'quantity' => $details['quantity'],
                    'total_price' => $product->price * $details['quantity'],
                    'order_number' => 'ORD-' . strtoupper(uniqid()),
                    'status' => 'pending',
                ]);
                $product->decrement('quantity', $details['quantity']);
            }
        }

        session()->forget('cart');
        return redirect()->route('user.orders')->with('success', 'Order placed!');
    }

    public function userOrders()
    {
        $orders = Order::where('user_id', Auth::id())
            ->with('product')
            ->latest()
            ->paginate(10);

        return view('shop.orders', compact('orders'));
    }

    public function userShow($id)
    {
        $order = Order::where('user_id', Auth::id())
            ->with('product')
            ->findOrFail($id);

        return view('Order.show', compact('order'));
    }

    public function cancelOrder($id)
    {
        $order = Order::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        if ($order->status !== 'pending') {
            return redirect()->back()->with('error', 'Only pending orders can be cancelled.');
        }

        $order->update(['status' => 'cancelled']);

        return redirect()->route('user.orders')->with('success', 'Order cancelled successfully.');
    }
}
