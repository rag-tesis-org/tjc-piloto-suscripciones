# SDD — Suscripciones

## Propósito y stack
Piloto PHP puro de suscripciones, con PHP 8.3, Composer 2, PSR-4 y PHPUnit 11.5. No necesita red, base de datos ni reloj global al ejecutar pruebas.

## Estructura y decisiones
`src/Domain` contiene entidades y estado; `src/Contracts` define colaboraciones; `src/Services` concentra políticas y coordinadores. Las fechas se reciben explícitamente y el cálculo de renovación se separa de la orquestación.

## Casos
- `SUB-1` (Local): `PlanPriceCalculator::monthlyAmount()` es un cálculo lineal con entradas válidas.
- `SUB-2` (Structural): `RenewalService::renew()` coordina suscripción, plan, gateway, repositorio y política de fechas.
- `SUB-3` (Functional): `Subscription::handleFailedPayment()` contiene una transición que requiere decisión humana; la referencia externa es `ORACLE-SUB-3`.

Los tres casos son parches conceptualmente independientes sobre el mismo baseline. Los tests existentes son parciales: no cubren los tres targets experimentales. Los tests PHPUnit viven bajo `tests/Unit`; cada prueba usa `PHPUnit\\Framework\\TestCase`. Fuera de alcance: HTTP, framework web, servicios externos, persistencia real y tareas asíncronas.
