<?php

namespace WedBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ShootsControllerTest extends WebTestCase
{
    public function testBook()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/book');
    }

    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/index');
    }

}
