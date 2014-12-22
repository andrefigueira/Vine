<?php

namespace Api\Vine;

use Curl\Request;

/**
 * Class Api
 *
 * This is a Vine API client class which connects to the unofficial Vine API and returns what the methods of the API produce
 *
 * @author Andre Figueira <andre.figueira@me.com>
 * @package Api\Vine
 */
class Client
{

    /**
     * @var Request Curl\Request
     */
    protected $curl;

    /**
     * @var string Url for the Vine API
     */
    protected $apiUrl = 'https://api.vineapp.com/';

    public function __construct()
    {

        $this->curl = new Request();

    }

    /**
     * This method is used for fetching results from Vines get resources
     *
     * @param $resource
     * @return mixed
     */
    public function get($resource)
    {

        $result = $this->curl
            ->set(CURLOPT_URL, $this->apiUrl . $resource)
            ->set(CURLOPT_RETURNTRANSFER, true)
            ->exec();

        return json_decode($result);

    }

}