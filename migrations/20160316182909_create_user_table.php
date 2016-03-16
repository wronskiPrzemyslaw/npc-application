<?php

use Phinx\Migration\AbstractMigration;

class CreateUserTable extends AbstractMigration
{
    
    public function up()
    {
        $users = $this->table('users');
        $users->addColumn('email', 'string')
            ->addColumn('password', 'string')
            ->addColumn('name', 'string')
            ->save();
    }

    public function down() 
    {
        $this->dropTable('users');
    }
}
