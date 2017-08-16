<?php
namespace FosUserUtil\Doctrine\DBAL;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Schema\Table;
class SchemaBuilder
{
    protected $schema;
    function __construct(Schema $schema)
    {
        $this->schema = $schema;
    }
    function UserTable() {
        $UserTable = $this->schema->createTable("http_user");
        $UserTable->addColumn("uuid", "guid");
        $UserTable->setPrimaryKey(["uuid"]);
        // $UserTable->addColumn("deleted", "datetime", ["notnull" => false]);
        //^ Users should not be able to delete this, probably.
        return $UserTable;
    }
}
