<?php
require __DIR__ . '/vendor/autoload.php';
$dir = __DIR__ . '/src/';
$tests = shell_exec('find  ' . $dir . " -type f -name '*Test.php'");
$files = preg_split('!\s*\n\s*!', trim($tests));
foreach ($files as $file) {
    echo "~~~~~~~~~~\n";
    echo 'Start ' . str_replace($dir, '', $file) . "\n";
    try {
        $functions = require $file;
        foreach ($functions() as $name => $fn) {
            echo ' :: ' . $name . "\n";
            $result = $fn();
            if (!$result) {
                throw new Exception('fail');
            }
            echo "\033[32m✓ OK\033[m" . "\n";
        }
    } catch (Throwable $e) {
        echo "\033[31mTest failed: " . $e->getMessage() . "\033[m" . "\n";
    }
}