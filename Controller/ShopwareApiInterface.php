<?php

namespace App\LmaDev\ShopwareApiBundle\Controller;


interface ShopwareApiInterface
{
    public function get(String $action, array $params = null);
    public function post(array $data, array $params = null);
    public function put(array $data, array $params);
    public function delete(array $params);
}