<?php

use App\Models\Cart;
function countCartItems(){
	if (auth()->user()) {
		$count = Cart::where('user_email', auth()->user()->email)->count();
		return $count;
	} else {
		if (session()->get('cart')) {
			return session()->get('cart')->count();
		} else {
			return 0;
		}
	}
}

function getCartItems(){
	if (auth()->user()) {
		$cart = Cart::where('user_email', auth()->user()->email)->get();
		return $cart;
	} else {
		if (session()->has('cart')) {
			return session()->get('cart');

		}else{
			return null;
		}
	}
}

function getUserCartMenuIds(){
	$ids = [];
	$cartItems = Cart::where('user_email', auth()->user()->email ?? 'None')->get();
	foreach ($cartItems as $item) {
		$ids[] = $item->menu_id;
	}
	return $ids;
}
   