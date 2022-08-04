<?php

use App\Models\products;
use Gloudemans\Shoppingcart\Facades\Cart;

function quantity($product_id){

    $product = Products::find($product_id);


}


function qty_added($product_id){

$cart = Cart::content();

$item = $cart->where('id', $product_id);


if($item){

    return $item->qty;
}

else{

    return 0;
}

}


function qty_available($product_id){

    return quantity($product_id) . - qty_added($product_id);


}
