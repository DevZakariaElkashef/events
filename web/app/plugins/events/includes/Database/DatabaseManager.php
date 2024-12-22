<?php

namespace Events\Database;

use Events\Database\Migrations\CreateEventsTable;
use Events\Database\Migrations\CreateEventCategoriesTable;
use Events\Database\Migrations\CreateEventTagsTable;
use Events\Database\Migrations\CreateEventTagRelationsTable;

class DatabaseManager
{
    public static function runMigrations()
    {
        CreateEventsTable::up();
        CreateEventCategoriesTable::up();
        CreateEventTagsTable::up();
        CreateEventTagRelationsTable::up();
    }

    public static function rollbackMigrations()
    {
        CreateEventTagRelationsTable::down();
        CreateEventTagsTable::down();
        CreateEventCategoriesTable::down();
        CreateEventsTable::down();
    }
}
