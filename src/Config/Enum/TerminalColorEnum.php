<?php
namespace Config\Enum;
enum TerminalColorEnum: string
{
    case BLACK   = "\033[30m";
    case RED     = "\033[31m";
    case GREEN   = "\033[32m";
    case YELLOW  = "\033[33m";
    case BLUE    = "\033[34m";
    case MAGENTA = "\033[35m";
    case CYAN    = "\033[36m";
    case WHITE   = "\033[37m";
    case RESET   = "\033[0m";
}