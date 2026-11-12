<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use RuntimeException;

abstract class TestCase extends BaseTestCase
{
    public function createApplication()
    {
        $app = parent::createApplication();
        $connection = $app['config']['database.default'];
        $database = $app['db']->connection($connection)->getDatabaseName();

        // Runs before RefreshDatabase can migrate or wipe any schema.
        if ($connection !== 'mariadb' || ! str_ends_with($database, '_test')) {
            throw new RuntimeException('Tests require a dedicated MariaDB database ending in _test.');
        }

        return $app;
    }
}
