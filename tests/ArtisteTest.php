<?php

namespace App\Tests;

use App\Entity\Artiste;
use PHPUnit\Framework\TestCase;

class ArtisteTest extends TestCase
{
    public function testSomething(): void
    {
        $this->assertTrue(true);
    }

    public function testFullName(): void
    {
        $client = new Artiste();
        $client->setPrenom('John');
        $client->setNom('Doe');

        $this->assertSame('John Doe', $client->getFullName());
    }
}
