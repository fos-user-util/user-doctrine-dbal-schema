<?php

/*
 * This file is part of the FOS User Util package.
 *
 * (c) Jean-Bernard Addor
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FosUserUtil\Doctrine\DBAL;

use Doctrine\DBAL\Schema\Schema;

class SchemaBuilder
{
    protected $schema;

    public function __construct(Schema $schema)
    {
        $this->schema = $schema;
    }

    public function UserTable()
    {
        $UserTable = $this->schema->createTable('http_user');
        $UserTable->addColumn('uuid', 'guid');
        $UserTable->setPrimaryKey(['uuid']);
        // $UserTable->addColumn('deleted', 'datetime', ['notnull' => false]);
        //^ Users should not be able to delete this, probably.
        $UserTable->addColumn('username', 'string', ['length' => 180]);
        $UserTable->addColumn('username_canonical', 'string', ['length' => 180]);
        $UserTable->addUniqueIndex(['username_canonical'], 'username_canonical_unique_index'); // name probably not needed
        $UserTable->addColumn('email', 'string', ['length' => 180]);
        $UserTable->addColumn('email_canonical', 'string', ['length' => 180]);
        $UserTable->addUniqueIndex(['email_canonical'], 'email_canonical_unique_index'); // name probably not needed
        $UserTable->addColumn('enabled', 'boolean');
        $UserTable->addColumn('salt', 'string', ['notnull' => false]); // 'length' => 255
        $UserTable->addColumn('password', 'string'); // 'length' => 255
        $UserTable->addColumn('last_login', 'datetime', ['notnull' => false]);
        $UserTable->addColumn('confirmation_token', 'string', ['length' => 180, 'notnull' => false]);
        $UserTable->addUniqueIndex(['confirmation_token'], 'confirmation_token_unique_index'); // name probably not needed
        $UserTable->addColumn('password_requested_at', 'datetime', ['notnull' => false]);
        $UserTable->addColumn('roles', 'array');

        return $UserTable;
    }
}

// https://github.com/FriendsOfSymfony/FOSUserBundle/blob/master/Resources/config/doctrine-mapping/User.orm.xml
