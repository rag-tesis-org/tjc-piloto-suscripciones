<?php
declare(strict_types=1);

namespace Pilot\Subscriptions\Services;

final class PlanPriceCalculator
{
    public function monthlyAmount(int $licenses, float $unitPrice): float
    {
        return round($licenses * $unitPrice, 2);
    }
}
