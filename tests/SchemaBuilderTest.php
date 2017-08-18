<?php

use Doctrine\DBAL\Schema\Schema
use FosUserUtil\Doctrine\DBAL\SchemaBuilder as  UserSchemaBuilder;

(new UserSchemaBuilder(new Schema()))->UserTable();
