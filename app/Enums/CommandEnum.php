<?php

namespace App\Enums;

//enum CommandEnum: string
enum CommandEnum: string
{
    case Find = '/find';
    case Index = '/index';
    case Store = '/store';
    case Show = 'show';
    case Update = '/update';
    case Destroy = '/destroy';
}
