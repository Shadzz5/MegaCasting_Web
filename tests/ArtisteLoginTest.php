<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ArtisteLoginTest extends WebTestCase
{
    public function testLogin()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/connexion');
        $form = $crawler->selectButton('Connexion')->form([
            '_username' => 'quiercelinkevin@gmail.com',
            '_password' => 'Not24get'
        ]);
        $client->submit($form);
        $this->assertResponseRedirects('/connexion');
        $client->followRedirect();
    }
}
