<?php
declare(strict_types=1);

namespace Pilot\Subscriptions\Contracts;

interface PaymentGateway
{
    public function chargeOrFail(string $subscriptionId, float $amount): void;
}
