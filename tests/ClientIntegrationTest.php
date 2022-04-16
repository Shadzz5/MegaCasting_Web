<?php

namespace App\Tests;

use App\Entity\Artiste;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ClientIntegrationTest extends KernelTestCase
{
    public function testSomething(): void
    {
        $kernel = self::bootKernel();
        $em = self::$kernel->getContainer()->get('doctrine')->getManager();
        $this->assertCount(10, ($em->getRepository(Artiste::class)->findAll()));
        //$routerService = static::getContainer()->get('router');
        //$myCustomService = static::getContainer()->get(CustomService::class);
    }
}
