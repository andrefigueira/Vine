## Vine PHP API Client

A PHP Vine API client

[![Build Status](https://travis-ci.org/andrefigueira/Vine.svg?branch=master&style=flat)](https://travis-ci.org/andrefigueira/vine)
[![Latest Stable Version](https://img.shields.io/packagist/dt/twitter/vine.svg?style=flat)](https://packagist.org/packages/twitter/vine) 
[![Code Coverage](https://img.shields.io/codecov/c/github/andrefigueira/vine.svg?style=flat)](https://codecov.io/github/andrefigueira/Vine)
[![Version](https://img.shields.io/packagist/v/twitter/vine.svg?style=flat)](https://packagist.org/packages/twitter/vine)

### Usage:

Create a new instance of the Client:

    $vine = new \Api\Vine\Client();

Then use the `get` method to call one of the get resources, e.g.

    $searchResults = $vine->get('timelines/tag/{{searchQuery}}');

You can see the documentation here: [https://github.com/starlock/vino/wiki/API-Reference](Vine API Reference)
