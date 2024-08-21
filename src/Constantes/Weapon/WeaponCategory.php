<?php

namespace App\Constantes\Weapon;

enum WeaponCategory: string
{
    case ASSAULT_RIFLES = 'Assault Rifles';
    case SUBMACHINE_GUNS = 'Submachine Guns';
    case SHOTGUNS = 'Shotguns';
    case SNIPER_RIFLES = 'Sniper Rifles';
    case LIGHT_MACHINE_GUNS = 'Light Machine Guns';
    case PISTOLS = 'Pistols';
    case ROCKET_LAUNCHERS = 'Rocket Launchers';
}