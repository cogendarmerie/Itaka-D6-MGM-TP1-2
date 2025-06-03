<?php

namespace Config\Domain;

use Config\Enum\TerminalColorEnum;

class Notification
{
    public static function showSuccessMessage(string $message): void
    {
        echo TerminalColorEnum::GREEN->value . $message . TerminalColorEnum::RESET->value . PHP_EOL;
    }

    public static function showErrorMessage(string $message): void
    {
        echo TerminalColorEnum::RED->value . $message . TerminalColorEnum::RESET->value . PHP_EOL;
    }

    public static function showWarningMessage(string $message): void
    {
        echo TerminalColorEnum::YELLOW->value . $message . TerminalColorEnum::RESET->value . PHP_EOL;
    }

    public static function showMessage(string $message): void
    {
        echo $message . PHP_EOL;
    }

    public static function showSeparator(int $len = 20, $character = "-"): void
    {
        echo str_repeat($character, $len) . PHP_EOL;
    }

    public static function showTitle(string $title): void
    {
        Notification::showSeparator(strlen($title));
        Notification::showMessage($title);
        Notification::showSeparator(strlen($title));
    }
}