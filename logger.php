<?php

class Logger
{
    public static function logError($message)
    {
        $logfile = fopen("logs/errors.txt", "a") or die("Unable to open file!");
        fwrite($logfile, PHP_EOL . $message);
        fclose($logfile);
    }
}
