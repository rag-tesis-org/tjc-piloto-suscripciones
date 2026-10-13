# SDD — Suscripciones

## Propósito
Modelar planes de suscripción, sus estados y su renovación mensual.

## Stack
PHP 8.3, Composer 2, autoload PSR-4 y PHPUnit 11.5.

## Estructura
`src/Domain` contiene entidades y estados; `src/Contracts` define las colaboraciones de pago y persistencia; `src/Services` concentra las políticas y coordinadores.

## Reglas de negocio
Una renovación cobra el precio del plan vigente, avanza la fecha de cobro un mes calendario y guarda la suscripción. Las suscripciones canceladas no se renuevan. Un cambio de plan programado se aplica al inicio de la siguiente renovación y reemplaza el plan vigente.

## Decisiones de diseño
Las fechas se reciben explícitamente y la política de calendario se mantiene separada de la coordinación del cobro. El gateway de pago reporta fallos mediante su contrato.

## Ejecución
Ejecutar `composer install` y después `php vendor/bin/phpunit`.

## Fuera de alcance
HTTP, framework web, servicios externos, persistencia real y tareas asíncronas.
