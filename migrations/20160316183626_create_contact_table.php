<?php

use Phinx\Migration\AbstractMigration;

class CreateContactTable extends AbstractMigration
{
    
    public function up()
    {
        $users = $this->table('contacts');
        $users->addColumn('first_name', 'string')
            ->addColumn('last_name', 'string')
            ->addColumn('email', 'string')
            ->addColumn('phone', 'string')
            ->addColumn('birth_date', 'date')
            ->save();
    }

    public function down() 
    {
        $this->dropTable('contacts');
    }
}
