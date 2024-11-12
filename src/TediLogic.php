<?php

namespace molkuski\TediFramework;

class TediLogic
{
    public static function Run($file)
    {
        include('tedi-logic/' . $file . '.php');
    }
}
