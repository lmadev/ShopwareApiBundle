<?php
namespace App\LmaDev\ShopwareApiBundle\Controller;

use App\LmaDev\ShopwareApiBundle\DependencyInjection\Service\ConnectionApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;


class ShopwareApiController extends AbstractController implements ShopwareApiInterface
{
    /**
     * @var ConnectionApi
     */
    private $api;

    /**
     * @var ParameterBagInterface
     */
    private $params;

    /**
     * ShopwareApiController constructor.
     * @param ConnectionApi $api
     * #@param ParameterBagInterface $params
     */
    public function __construct(ConnectionApi $api, ParameterBagInterface $params)
    {
        $this->api = $api;
        $this->params = $params;
    }

    /**
     * @param String $action
     * @param array|null $params
     * @return object|\Symfony\Component\HttpFoundation\JsonResponse
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function get(String $action, array $params = null){

        /**
         * @var string
         */
        $shopUrl = $this->params->get('lma_dev.shopware_api_bundle.shop_url');

        /**
         * @var HttpClientInterface
         */
        $request = $this->api->call()->request('GET',$shopUrl);
        return $this->json($request->getContent());
    }

    /**
     * @param array $data
     * @param array|null $params
     */
    public function post(array $data, array $params = null)
    {
        // TODO: Implement put() method.
    }

    /**
     * @param array $data
     * @param array $params
     */
    public function put(array $data, array $params)
    {
        // TODO: Implement put() method.
    }

    /**
     * @param array $params
     */
    public function delete(array $params)
    {
        // TODO: Implement delete() method.
    }
}