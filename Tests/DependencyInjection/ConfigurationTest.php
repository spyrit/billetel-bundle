<?php

namespace Spyrit\BilletelBundle\Tests\DependencyInjection;

use Generator;
use Matthias\SymfonyConfigTest\PhpUnit\ConfigurationTestCaseTrait;
use PHPUnit\Framework\TestCase;
use Spyrit\BilletelBundle\DependencyInjection\Configuration;

class ConfigurationTest extends TestCase
{
    use ConfigurationTestCaseTrait;

    /**
     * @dataProvider provideValidValues
     */
    public function testValuesAreValid(array $values): void
    {
        $this->assertConfigurationIsValid($values);
    }

    public static function provideValidValues(): Generator
    {
        yield 'valid configuration' => [
            [
                [
                    'api_authorization' => 'YOUR_TOKEN',
                    'api_desk' => 'YOUR_DESK',
                    'api_url' => 'http://api.billetel.fr',
                    'api_booking_url' => 'http://api-booking.billetel.fr',
                ],
            ],
        ];
    }

    public function testProcessedValues(): void
    {
        $this->assertProcessedConfigurationEquals(
            [
                [
                    'api_authorization' => 'YOUR_TOKEN',
                    'api_desk' => 'YOUR_DESK',
                    'api_url' => 'http://api.billetel.fr',
                    'api_booking_url' => 'http://api-booking.billetel.fr',
                ],
            ],
            [
                'api_authorization' => 'YOUR_TOKEN',
                'api_desk' => 'YOUR_DESK',
                'api_url' => 'http://api.billetel.fr',
                'api_booking_url' => 'http://api-booking.billetel.fr',
            ]
        );
    }

    /**
     * @dataProvider provideInvalidValues
     */
    public function testValuesAreInvalid(array $values): void
    {
        $this->assertConfigurationIsInvalid($values);
    }

    public static function provideInvalidValues(): Generator
    {
        yield 'Invalid when no values' => [
            [
                [],
            ],
        ];

        yield 'Invalid when api_authorisation is empty' => [
            [
                [
                    'api_authorization' => '',
                    'api_desk' => 'YOUR_DESK',
                    'api_url' => 'http://api.billetel.fr',
                    'api_booking_url' => 'http://api-booking.billetel.fr',
                ],
            ],
        ];

        yield 'Invalid when api_desk is empty' => [
            [
                [
                    'api_authorization' => 'YOUR_TOKEN',
                    'api_desk' => '',
                    'api_url' => 'http://api.billetel.fr',
                    'api_booking_url' => 'http://api-booking.billetel.fr',
                ],
            ],
        ];

        yield 'Invalid when api_url is empty' => [
            [
                [
                    'api_authorization' => 'YOUR_TOKEN',
                    'api_desk' => 'YOUR_DESK',
                    'api_url' => '',
                    'api_booking_url' => 'http://api-booking.billetel.fr',
                ],
            ],
        ];

        yield 'Invalid when api_booking_url is empty' => [
            [
                [
                    'api_authorization' => 'YOUR_TOKEN',
                    'api_desk' => 'YOUR_DESK',
                    'api_url' => 'http://api.billetel.fr',
                    'api_booking_url' => '',
                ],
            ],
        ];
    }

    protected function getConfiguration(): Configuration
    {
        return new Configuration();
    }
}
