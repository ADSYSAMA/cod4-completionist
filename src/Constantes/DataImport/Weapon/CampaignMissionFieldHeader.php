<?php

namespace App\Constantes\DataImport\Weapon;

enum CampaignMissionFieldHeader: string
{
    case NAME = 'name';
    case LOCATION = 'location';
    case RELATED_MAPS = 'related_maps';
    case NUMBER = 'number';
    case BONUS_MISSION = 'bonus_mission';
}