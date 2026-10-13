# SDD — Suscripciones

## Propósito
Modelar planes de suscripción, sus estados y su renovación mensual.

## Stack
PHP 8.3, Composer 2, autoload PSR-4 y PHPUnit 11.5.

## Estructura
`src/Domain` contiene entidades y estados; `src/Contracts` define las colaboraciones de pago y persistencia; `src/Services` concentra las políticas y coordinadores.

Las reglas operativas se definen en el modelo de dominio y sus servicios asociados.

## Decisiones de diseño
Las fechas se reciben explícitamente y la política de calendario se mantiene separada de la coordinación del cobro. El gateway de pago reporta fallos mediante su contrato.

## Ejecución
Ejecutar `composer install` y después `php vendor/bin/phpunit`.

## Fuera de alcance
HTTP, framework web, servicios externos, persistencia real y tareas asíncronas.
