<?php

namespace App\Enums;

//enum CommandEnum: string
enum CommandEnum: string
{
    case Find = '/find';
    case Index = '/index';
    case MyHosts = '/my_hosts';
    case Show = '/show';
    case Store = '/store';
    case Update = '/update';
    case Destroy = '/destroy';
}
