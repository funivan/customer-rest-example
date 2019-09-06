<?php
declare(strict_types=1);

spl_autoload_register(function (string $class): void {
    // project-specific namespace prefix
    $prefix = 'Funivan\\CustomersRest\\';
    $directory = __DIR__ . '/src/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) === 0) {
        $relativeClass = substr($class, $len);
        $file = $directory . str_replace('\\', '/', $relativeClass) . '.php';
        if (file_exists($file)) {
            /** @noinspection PhpIncludeInspection */
            require $file;
        }
    }
});