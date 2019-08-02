<?php
namespace App\LmaDev\ShopwareApiBundle\Controller;

use App\LmaDev\ShopwareApiBundle\DependencyInjection\Service\ConnectionApi;
use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Response;

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
     * @param ParameterBagInterface $params
     */
    public function __construct(ConnectionApi $api, ParameterBagInterface $params)
    {
        $this->api = $api;
        $this->params = $params;
    }

    /**
     * @param String $action
     * @return object|\Symfony\Component\HttpFoundation\JsonResponse
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     * @example filter[0][property] filter[0][value]
     */
    public function get(String $action){
        /**
         * @var Request
         */
        $request = Request::createFromGlobals();
        /**
         * @var string
         */
        $params = null;

        if(null !== $request->get('filter') && is_array($request->get('filter')))
        {
            $params .= http_build_query(['filter' => $request->get('filter')]);
        }

        if(null !== $request->get('sort') && is_array($request->get('sort')))
        {
            $params .= http_build_query(['sort' => $request->get('sort')]);
        }

        if(null !== $request->get('limit'))
        {
            $params .= http_build_query(['limit'=>$request->get('limit')]);
        }
        /**
         * @var Client
         */
        $response = $this->api->call()->request('GET', $action.'/?'.$params);

        return $this->json($response->getBody());
    }

    /**
     * @param String $action
     * @return JsonResponse
     * @example add[name] add[tax] .....
     */
    public function post(String $action)
    {
        /**
         * @var Request
         */
        $request = Request::createFromGlobals();
        /**
         * @var array
         */
        $data = null;

        if(null !== $request->get('add') && is_array($request->get('add')))
        {
            $data = $request->get('add');
        }

        $response = $this->api->call()->post($action,['json' => $data]);

        return $this->json($response->getBody());
    }

    /***
     * @param String $action
     * @param int $productID
     * @return JsonResponse
     * @example update[name] update[tax] .....
     */
    public function put(String $action, int $productID)
    {
        /**
         * @var Request
         */
        $request = Request::createFromGlobals();
        /**
         * @var array
         */
        $data = null;

        if(null !== $request->get('update') && is_array($request->get('update')))
        {
            $data = $request->get('update');
        }

        $response = $this->api->call()->put($action.'/'.$productID, ['json' => $data]);

        return $this->json($response->getBody());
    }

    /**
     * @param String $action
     * @param int $productID
     */
    public function delete(String $action, int $productID)
    {
        $response = $this->api->call()->delete($action.'/'.$productID);
        return $this->json($response->getBody());
    }
}