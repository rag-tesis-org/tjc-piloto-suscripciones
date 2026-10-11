<?php
declare(strict_types=1);

namespace Pilot\Subscriptions\Domain;

enum SubscriptionStatus: string
{
    case ACTIVE = 'active';
    case PAST_DUE = 'past_due';
    case SUSPENDED = 'suspended';
    case CANCELLED = 'cancelled';
}
