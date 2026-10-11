<?php
declare(strict_types=1);

namespace Pilot\Subscriptions\Contracts;

use Pilot\Subscriptions\Domain\Subscription;

interface SubscriptionRepository
{
    public function save(Subscription $subscription): void;
}
