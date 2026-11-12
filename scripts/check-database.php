<?php

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\DB;

require __DIR__.'/../vendor/autoload.php';
$app = require __DIR__.'/../bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

$result = DB::selectOne('SELECT VERSION() AS version, DATABASE() AS name, @@character_set_database AS charset, @@default_storage_engine AS engine');
if (! str_contains($result->version, 'MariaDB') || $result->charset !== 'utf8mb4' || strtolower($result->engine) !== 'innodb') {
    throw new RuntimeException('Expected MariaDB with utf8mb4 and InnoDB. Check your local database configuration.');
}
if ($app->environment('testing') && ! str_ends_with($result->name, '_test')) {
    throw new RuntimeException('Testing must use a separate database ending in _test.');
}
printf("Database connected: %s; %s; %s; %s\n", $result->version, $result->name, $result->charset, $result->engine);
