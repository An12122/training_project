<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CartController extends Controller
{

    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index()
    {
        return view('frontend.pages.cart.index');
    }



    public function fetchCart(Request $request)
    {


        $cart = $this->cartService->viewCart($request);

        $guestToken = $request->cookie('guest_token') ?? Str::uuid();

        $cartItems = Cart::with('course')->where('guest_token', $guestToken)->get();


        $subTotal = $cartItems->sum(function ($cartItem) {
            $price = $cartItem->course->discount_price ?? $cartItem->course->selling_price;
            return $cartItem->quantity * ($price ?? 0);
        });

        $html = view('frontend.pages.cart.partial.main', compact('cart', 'subTotal'))->render();

        return response()->json([
            'status' => 'success',
            'html' => $html,
        ]);
    }



    public function addToCart(Request $request)
    {

        $validated_data = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'quantity' => 'nullable|integer|min:1',
        ]);

        $course_id = $validated_data['course_id'];

        return $this->cartService->createCart($course_id, $request);
    }

    public function cartAll(Request $request)
    {

        $cart =  $this->cartService->viewCart($request);
        $subTotal = $cart->sum(function ($cartItem) {
            $price = $cartItem->course->discount_price ?? $cartItem->course->selling_price;
            return $cartItem->quantity * ($price ?? 0);
        });

        $html = view('frontend.pages.home.partials.cart', compact('cart', 'subTotal'))->render();

        return response()->json([
            'status' => 'success',
            'html' => $html,
        ]);
    }

    public function removeCart(Request $request)
    {
        $cartItem = Cart::find($request->id);
        if (!$cartItem) {
            return response()->json(['status' => 'error', 'message' => 'Cart item not found']);
        }

        $cartItem->delete();

        return response()->json(['status' => 'success', 'message' => 'Course removed from cart']);
    }
}