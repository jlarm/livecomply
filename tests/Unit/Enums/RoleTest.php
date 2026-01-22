<?php

declare(strict_types=1);

use App\Enums\Role;

test('Role enum has the correct values', function (): void {
    expect(Role::ADMIN->value)->toBe('admin')
        ->and(Role::CONSULTANT->value)->toBe('consultant')
        ->and(Role::OWNER->value)->toBe('owner')
        ->and(Role::CFO->value)->toBe('cfo')
        ->and(Role::GM->value)->toBe('gm')
        ->and(Role::GSM->value)->toBe('gsm')
        ->and(Role::MANAGER->value)->toBe('manager')
        ->and(Role::EMPLOYEE->value)->toBe('employee')
        ->and(Role::PORTER->value)->toBe('porter');
});

test('Role enum has the correct labels', function (): void {
    expect(Role::ADMIN->label())->toBe('Admin')
        ->and(Role::CONSULTANT->label())->toBe('Consultant')
        ->and(Role::OWNER->label())->toBe('Owner')
        ->and(Role::CFO->label())->toBe('CFO')
        ->and(Role::GM->label())->toBe('GM')
        ->and(Role::GSM->label())->toBe('GSM')
        ->and(Role::MANAGER->label())->toBe('Manager')
        ->and(Role::EMPLOYEE->label())->toBe('Employee')
        ->and(Role::PORTER->label())->toBe('Porter');
});
