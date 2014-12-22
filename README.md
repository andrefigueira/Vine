Vine PHP API Client
====

A PHP Vine API client

### Usage:

Create a new instance of the Client:

    $vine = new \Api\Vine\Client();

Then use the `get` method to call one of the get resources, e.g.

    $searchResults = $vine->get('timelines/tag/{{searchQuery}}');

You can see the documentation here: (Vine API Reference)[https://github.com/starlock/vino/wiki/API-Reference]
