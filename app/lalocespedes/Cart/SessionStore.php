<?php

namespace lalocespedes\Cart;

use Cart\Storage\Store;

class SessionStore implements Store
{
    /**
     * {@inheritdoc}
     */
    public function get($cartId)
    {
        return isset($_SESSION[$cartId]) ? $_SESSION[$cartId] : serialize(array());
    }

    /**
     * {@inheritdoc}
     */
    public function put($cartId, $data)
    {
        $_SESSION[$cartId] = $data;
    }

    /**
     * {@inheritdoc}
     */
    
    public function flush($cartId)
    {
        unset($_SESSION[$cartId]);
    }
}
