<?php

namespace lalocespedes\Cart;

use Cart\Cart;
use Cart\CartItem;
use lalocespedes\Cart\SessionStore;

class PlazaCart
{

  public $cart;
  
  public function __construct()
  {

    $cart = new Cart('cart-02', new SessionStore());
    $this->cart = $cart;

    (empty($_SESSION['cart-02'])) ? $this->cart->save() : $this->cart->restore();

  }

  public function insert($data)
  {
    $item = new CartItem;
    foreach($data as $key => $value)
    {
      $item->$key = $value;
    }
    $this->cart->add($item);
    $this->cart->save();
  }

  public function findItemId($key)
  {
    return $this->cart->all()[$key]->getId();
  }
  
  public function __call($method, $params)
  {
    $result = call_user_func_array(array($this->cart, $method), $params);
    $this->cart->save();
    return $result;
  }

}
