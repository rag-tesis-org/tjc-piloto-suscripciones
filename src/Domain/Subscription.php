<?php
declare(strict_types=1);

namespace Pilot\Subscriptions\Domain;

final class Subscription
{
    public function __construct(
        public readonly string $id,
        public Plan $plan,
        private SubscriptionStatus $status,
        private \DateTimeImmutable $nextBillingAt,
        private ?Plan $pendingPlan = null,
    ) {}

    public function status(): SubscriptionStatus { return $this->status; }
    public function nextBillingAt(): \DateTimeImmutable { return $this->nextBillingAt; }
    public function renewAt(\DateTimeImmutable $date): void { $this->nextBillingAt = $date; }
    public function schedulePlanChange(Plan $plan): void { $this->pendingPlan = $plan; }
    public function pendingPlan(): ?Plan { return $this->pendingPlan; }
    public function applyPendingPlan(): void
    {
        if ($this->pendingPlan !== null) {
            $this->plan = $this->pendingPlan;
            $this->pendingPlan = null;
        }
    }
    public function handleFailedPayment(): void { $this->status = SubscriptionStatus::PAST_DUE; }
}
