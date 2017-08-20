<?php

/*
 * This file is part of the FOS User Util package.
 *
 * (c) Jean-Bernard Addor
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Schema\Table;
use FosUserUtil\Doctrine\DBAL\SchemaBuilder;
use PHPUnit\Framework\TestCase;

/**
 * @covers SchemaBuilder
 */
final class SchemaBuilderTest extends TestCase
{
    public function testCanBeCreatedFromValidSchema()
    {
        $this->assertInstanceOf(
            SchemaBuilder::class,
            new SchemaBuilder(new Schema())
        );
    }

    public function testReturnsTable()
    {
        $this->assertInstanceOf(
            Table::class,
            (new SchemaBuilder(new Schema()))->UserTable()
        );
    }
}
