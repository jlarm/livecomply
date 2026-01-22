<?php

declare(strict_types=1);

namespace App\Enums;

enum Role: string
{
    case ADMIN = 'admin';
    case CONSULTANT = 'consultant';
    case OWNER = 'owner';
    case CFO = 'cfo';
    case GM = 'gm';
    case GSM = 'gsm';
    case MANAGER = 'manager';
    case EMPLOYEE = 'employee';
    case PORTER = 'porter';

    public function label(): string
    {
        return match ($this) {
            self::ADMIN => 'Admin',
            self::CONSULTANT => 'Consultant',
            self::OWNER => 'Owner',
            self::CFO => 'CFO',
            self::GM => 'GM',
            self::GSM => 'GSM',
            self::MANAGER => 'Manager',
            self::EMPLOYEE => 'Employee',
            self::PORTER => 'Porter',
        };
    }
}
