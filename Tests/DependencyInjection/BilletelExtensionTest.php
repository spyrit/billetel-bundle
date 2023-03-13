<?php

namespace Spyrit\BilletelBundle\Tests\DependencyInjection;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use Spyrit\Billetel\Client\ArtistsClient;
use Spyrit\Billetel\Client\BookingAvailabilityClient;
use Spyrit\Billetel\Client\CartClient;
use Spyrit\Billetel\Client\CategoriesClient;
use Spyrit\Billetel\Client\ClientClient;
use Spyrit\Billetel\Client\GroupsClient;
use Spyrit\Billetel\Client\OrderClient;
use Spyrit\Billetel\Client\PlacesClient;
use Spyrit\Billetel\Client\TicketClient;
use Spyrit\Billetel\Client\TicketOfficesClient;
use Spyrit\BilletelBundle\DependencyInjection\BilletelExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class BilletelExtensionTest extends TestCase
{
    public function testServiceWiring(): void
    {
        $container = new ContainerBuilder();

        $extension = new BilletelExtension();
        $config = [
            'api_authorization' => 'YOUR_TOKEN',
            'api_desk' => 'YOUR_DESK',
            'api_url' => 'http://api.billetel.fr',
            'api_booking_url' => 'http://api-booking.billetel.fr',
        ];

        $extension->load([$config], $container);

        $this->assertTrue($container->has('guzzle.http_client.class'));
        $this->assertTrue($container->has('billetel.artists'));
        $this->assertTrue($container->has('billetel.categories'));
        $this->assertTrue($container->has('billetel.groups'));
        $this->assertTrue($container->has('billetel.places'));
        $this->assertTrue($container->has('billetel.ticket_offices'));
        $this->assertTrue($container->has('billetel.booking.availability'));
        $this->assertTrue($container->has('billetel.booking.cart'));
        $this->assertTrue($container->has('billetel.booking.client'));
        $this->assertTrue($container->has('billetel.booking.order'));
        $this->assertTrue($container->has('billetel.booking.ticket'));
    }
}
