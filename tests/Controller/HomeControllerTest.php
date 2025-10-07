<?php
namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeControllerTest extends WebTestCase
{
    public function testHomepage(): void
    {
        // Désactive le gestionnaire d'exception pour éviter le risky
        $client = static::createClient([
            'disable_exception_handling' => true,
        ]);

        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Welcome');
        $this->assertStringContainsString('Welcome', $crawler->filter('title')->text());
    }
}
