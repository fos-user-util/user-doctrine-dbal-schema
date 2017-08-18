<?php

use Doctrine\DBAL\Schema\Schema;
use FosUserUtil\Doctrine\DBAL\SchemaBuilder as  UserSchemaBuilder;
use PHPUnit\Framework\TestCase;

(new UserSchemaBuilder(new Schema()))->UserTable();
