<?php
declare(strict_types=1);

namespace Pilot\Subscriptions\Services;

use Pilot\Subscriptions\Contracts\PaymentGateway;
use Pilot\Subscriptions\Contracts\SubscriptionRepository;
use Pilot\Subscriptions\Domain\Subscription;
use Pilot\Subscriptions\Domain\SubscriptionStatus;

final readonly class RenewalService
{
    public function __construct(private PaymentGateway $payments, private SubscriptionRepository $subscriptions, private RenewalDatePolicy $dates) {}
    public function renew(Subscription $subscription): void
    {
        if ($subscription->status() === SubscriptionStatus::CANCELLED) {
            return;
        }

        $subscription->applyPendingPlan();
        $amountToCharge = $subscription->plan->monthlyPrice;
        $this->payments->chargeOrFail($subscription->id, $amountToCharge);
        $subscription->renewAt($this->dates->nextDate($subscription->nextBillingAt()));
        $this->subscriptions->save($subscription);
    }
}
