<?php

namespace App\Constantes\DataImport\Weapon;

enum MapFieldHeader: string
{
    case NAME = 'name';
    case SIZE = 'size';
    case LOCATION = 'location';
    case DLC = 'dlc';
}