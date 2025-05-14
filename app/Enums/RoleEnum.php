<?php

namespace App\Enums;

enum RoleEnum: string
{
    case ADMIN = 'Admin';
	case MANAGER = 'Manager';
    case BROTHER = 'Brother';
}
