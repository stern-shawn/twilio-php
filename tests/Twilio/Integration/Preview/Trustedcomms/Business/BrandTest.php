<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Preview\Trustedcomms\Business;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class BrandTest extends HolodeckTestCase {
    public function testFetchRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->trustedComms->businesses("BXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                                ->brands("BZXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://preview.twilio.com/TrustedComms/Businesses/BXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Brands/BZXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
        ));
    }

    public function testFetchResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "business_sid": "BXaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "sid": "BZaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "links": {
                    "branded_channels": "https://preview.twilio.com/TrustedComms/Businesses/BXaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Brands/BZaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/BrandedChannels"
                },
                "url": "https://preview.twilio.com/TrustedComms/Businesses/BXaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Brands/BZaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
            }
            '
        ));

        $actual = $this->twilio->preview->trustedComms->businesses("BXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                                      ->brands("BZXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->fetch();

        $this->assertNotNull($actual);
    }
}