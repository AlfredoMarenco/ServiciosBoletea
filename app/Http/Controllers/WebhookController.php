<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Openpay;

class WebhookController extends Controller
{
    public function webhook()
    {
        $openpay = Openpay::getInstance('m4gx48zqyw8xs4en1z1u', 'sk_d70ffc17846544e39488869d11fac3dc');
        $webhook = array(
            'url' => 'https://commercelaravel.com/openpay/webhook',
            'event_types' => array(
                'charge.refunded',
                'charge.failed',
                'charge.cancelled',
                'charge.created',
                'chargeback.accepted'
            )
        );
        $webhook = $openpay->webhooks->add($webhook);
    }
}
