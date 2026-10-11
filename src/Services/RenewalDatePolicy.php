<?php
declare(strict_types=1);

namespace Pilot\Subscriptions\Services;

final class RenewalDatePolicy
{
    public function nextDate(\DateTimeImmutable $current): \DateTimeImmutable
    {
        $firstOfNextMonth = $current->modify('first day of next month')->setTime(
            (int) $current->format('H'), (int) $current->format('i'), (int) $current->format('s')
        );
        $lastDay = (int) $firstOfNextMonth->modify('last day of this month')->format('d');
        return $firstOfNextMonth->setDate(
            (int) $firstOfNextMonth->format('Y'), (int) $firstOfNextMonth->format('m'), min((int) $current->format('d'), $lastDay)
        );
    }
}
