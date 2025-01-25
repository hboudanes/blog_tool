<?php

namespace App\Enum;

enum InputType: string
{
    case DEFAULT = 'default';
    case SELECT = 'select';
    case TEXTAREA = 'textarea';
}