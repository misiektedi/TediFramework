<?php

namespace molkuski\TediFramework;

use Symfony\Component\Yaml\Yaml;

class TediConfig
{
    public static function get($config, $key)
    {
        $config = Yaml::parseFile('tedi-config/' . $config . '.yaml');

        $keys = explode('/', $key);

        echo $config[$keys[0]][$keys[1]] . PHP_EOL;
    }
}
