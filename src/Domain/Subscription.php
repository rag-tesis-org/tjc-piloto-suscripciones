<?php
declare(strict_types=1);

namespace Pilot\Subscriptions\Domain;

final class Subscription
{
    public function __construct(
        public readonly string $id,
        public readonly Plan $plan,
        private SubscriptionStatus $status,
        private \DateTimeImmutable $nextBillingAt,
    ) {}

    public function status(): SubscriptionStatus { return $this->status; }
    public function nextBillingAt(): \DateTimeImmutable { return $this->nextBillingAt; }
    public function renewAt(\DateTimeImmutable $date): void { $this->nextBillingAt = $date; }
    public function handleFailedPayment(): void { $this->status = SubscriptionStatus::PAST_DUE; }
}
