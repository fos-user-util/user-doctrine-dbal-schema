<?php

use Doctrine\DBAL\Schema\Schema;
// use FosUserUtil\Doctrine\DBAL\SchemaBuilder as  UserSchemaBuilder;
use PHPUnit\Framework\TestCase;

/**
 * @covers \SchemaBuilder
 */
final class SchemaBuilderTest extends TestCase
{
    public function testCanBeCreatedFromValidSchema()
    {
        $this->assertInstanceOf(
            \SchemaBuilder::class,
            new \SchemaBuilder(new Schema())
        );
    }
}

// (new UserSchemaBuilder())->UserTable();
