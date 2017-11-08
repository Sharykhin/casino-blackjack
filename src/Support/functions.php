<?php

if (! function_exists('config')) {
    function config(string $name) {
        $filePath = __DIR__ . "/../../config/{$name}.php";

        if (!file_exists($filePath)) {
            throw new InvalidArgumentException("File does not exist: {$filePath}");
        }

        $config = require $filePath;
        return $config;
    }
}
