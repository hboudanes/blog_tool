<?php

namespace App\Enums;

enum InputType: string
{
    case DEFAULT = 'default';
    case SELECT = 'select';
    case TEXTAREA = 'textarea';
}