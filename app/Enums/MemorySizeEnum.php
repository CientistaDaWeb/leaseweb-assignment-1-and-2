<?php

namespace App\Enums;

enum MemorySizeEnum: int
{
    case GIGABYTE1 = 1;
    case GIGABYTE2 = 2;
    case GIGABYTE4 = 4;
    case GIGABYTE8 = 8;
    case GIGABYTE16 = 16;
    case GIGABYTE32 = 32;
    case GIGABYTE64 = 64;
    case GIGABYTE128 = 128;
    case GIGABYTE256 = 256;
    case GIGABYTE512 = 512;
}
