<?php

class ClientTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var Object Api\Vine\Client
     */
    protected $vine;

    /**
     * Set up our API client
     */
    public function setUp()
    {

        $this->vine = new Api\Vine\Client();

    }

    /**
     * Test that our sets are working
     */
    public function testSetUsernameSetsUsernameValue()
    {

        $this->vine->setUsername('testUsername');

        $this->assertEquals('testUsername', $this->vine->getUsername());

    }

    /**
     * Test that our sets are working
     */
    public function testSetPasswordSetsPasswordValue()
    {

        $this->vine->setPassword('testPassword');

        $this->assertEquals('testPassword', $this->vine->getPassword());

    }

    /**
     * Test that our login gives us an object proving the API is still available
     */
    public function testInvalidLoginRespondsWithObject()
    {

        $result = $this->vine->login();

        $this->assertTrue(isset($result->success));

    }

    /**
     * Test that our logout gives us an object proving the API is still available
     */
    public function testInvalidLogoutRespondsWithObject()
    {

        $result = $this->vine->logout();

        $this->assertTrue(isset($result->success));

    }

    /**
     * Test that our get is still responding with data showing the API is still available
     */
    public function testGetTimelineRespondsWithResults()
    {

        $result = $this->vine->get('timelines/tags/banana');

        $this->assertTrue((count($result->data) > 0));

    }

}