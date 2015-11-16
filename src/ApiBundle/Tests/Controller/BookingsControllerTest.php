<?php

namespace ApiBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BookingsControllerTest extends WebTestCase
{
    public function testGetlist()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/list');
    }

}
