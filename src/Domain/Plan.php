<?php
declare(strict_types=1);

namespace Pilot\Subscriptions\Domain;

final readonly class Plan
{
    public function __construct(public string $code, public float $monthlyPrice) {}
}
