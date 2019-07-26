<?php

namespace App\LmaDev\ShopwareApiBundle\Controller;


interface ShopwareApiInterface
{
    public function get(String $action);
    public function post(String $action);
    public function put(String $action);
    public function delete(String $action);
}