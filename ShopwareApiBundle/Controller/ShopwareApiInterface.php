<?php

namespace App\LmaDev\ShopwareApiBundle\Controller;


interface ShopwareApiInterface
{
    /**
     * @param String $action
     * @return mixed
     */
    public function get(String $action);

    /**
     * @param String $action
     * @return mixed
     */
    public function post(String $action);

    /**
     * @param String $action
     * @param int $productID
     * @return mixed
     */
    public function put(String $action, int $productID);

    /**
     * @param String $action
     * @param int $productID
     * @return mixed
     */
    public function delete(String $action, int $productID);
}