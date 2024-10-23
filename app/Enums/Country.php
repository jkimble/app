<?php

namespace App\Enums;

enum Country: string // can be integer/other types
{
    case United_States = 'US';
    case Mexico = 'MX';
    case Cuba = 'CU';
    case Djibouti = 'DB';

    public function label() {
        return (string) str($this->name)->replace('_', ' ');
    }
}
