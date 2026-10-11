<?php
declare(strict_types=1);
namespace Tests\Unit\Services;
use PHPUnit\Framework\TestCase;
use Pilot\Subscriptions\Services\RenewalDatePolicy;
final class RenewalDatePolicyTest extends TestCase { public function test_it_keeps_time_when_moving_to_next_month(): void { $result=(new RenewalDatePolicy())->nextDate(new \DateTimeImmutable('2026-05-12 14:30:00 UTC')); self::assertSame('2026-06-12 14:30', $result->format('Y-m-d H:i')); } }
