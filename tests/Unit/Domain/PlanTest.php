<?php
declare(strict_types=1);
namespace Tests\Unit\Domain;
use PHPUnit\Framework\TestCase;
use Pilot\Subscriptions\Domain\Plan;
final class PlanTest extends TestCase { public function test_it_exposes_its_code(): void { self::assertSame('pro', (new Plan('pro', 20.0))->code); } }
