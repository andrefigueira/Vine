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
     * @var string Username for login
     */
    protected $username;

    /**
     * @var string Password for login
     */
    protected $password;

    /**
     * @var string Url for the Vine API
     */
    protected $apiUrl = 'https://api.vineapp.com/';

    public function __construct()
    {

        $this->curl = new Request();

    }

    /**
     * Sets the username
     *
     * @param $username
     * @return $this
     */
    public function setUsername($username)
    {

        $this->username = $username;

        return $this;

    }

    /**
     * Sets the password
     *
     * @param $password
     * @return $this
     */
    public function setPassword($password)
    {

        $this->password = $password;

        return $this;

    }

    /**
     * Returns username
     *
     * @return string
     */
    public function getUsername()
    {

        return $this->username;

    }

    /**
     * Returns password
     *
     * @return string
     */
    public function getPassword()
    {

        return $this->password;

    }

    /**
     * This method is used for fetching results from Vines get resources
     *
     * @param $resource
     * @return mixed
     */
    public function get($resource)
    {

        $result = $this->request($resource, 'GET');

        return $result;

    }

    /**
     * Perform Vine Login
     *
     * @return mixed
     * @throws \Exception
     */
    public function login()
    {

        $result = $this->request('users/authenticate', 'POST', array(
            'username' => $this->username,
            'password' => $this->password
        ));

        return $result;

    }

    /**
     * Perform Vine Logout
     *
     * @return mixed
     * @throws \Exception
     */
    public function logout()
    {

        $result = $this->request('users/authenticate', 'DELETE');

        return $result;

    }

    /**
     * Fetches a videos info based on the URL
     *
     * @param $url
     * @return mixed
     */
    public function getEmbed($url)
    {

        $result = $this->curl
            ->set(CURLOPT_URL, 'https://vine.co/oembed.json?url=' . urlencode($url))
            ->set(CURLOPT_RETURNTRANSFER, true)
            ->exec();

        return $this->formatResponse($result);

    }

    /**
     * Array of allowed request types
     *
     * @return array
     */
    protected function validRequestTypes()
    {

        return array(
            'GET',
            'POST',
            'PUT',
            'DELETE'
        );

    }

    /**
     * Validates the request and performs the cURL request
     *
     * @param $resource
     * @param $type
     * @param array $params
     * @return mixed
     * @throws \Exception
     */
    protected function request($resource, $type, array $params = array())
    {

        if(!in_array($type, $this->validRequestTypes())){ throw new \Exception('Invalid request type');}

        $requestUrl = $this->apiUrl . $resource;

        if($type == 'GET')
        {

            $result = $this->curl
                ->set(CURLOPT_URL, $requestUrl)
                ->set(CURLOPT_RETURNTRANSFER, true)
                ->exec();

        }
        else
        {

            $result = $this->curl
                ->set(CURLOPT_URL, $requestUrl)
                ->set(CURLOPT_RETURNTRANSFER, true)
                ->set(CURLOPT_CUSTOMREQUEST, $type)
                ->set(CURLOPT_POSTFIELDS, $params)
                ->exec();

        }

        return $this->formatResponse($result);

    }

    /**
     * Un-format the response
     *
     * @param $object
     * @return mixed
     */
    protected function formatResponse($object)
    {

        return json_decode($object);

    }

}