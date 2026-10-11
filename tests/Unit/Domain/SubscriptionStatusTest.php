<?php
declare(strict_types=1);
namespace Tests\Unit\Domain;
use PHPUnit\Framework\TestCase;
use Pilot\Subscriptions\Domain\SubscriptionStatus;
final class SubscriptionStatusTest extends TestCase { public function test_active_has_a_stable_value(): void { self::assertSame('active', SubscriptionStatus::ACTIVE->value); } }
