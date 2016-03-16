<?php

use Phinx\Migration\AbstractMigration;

class SeedUsersTable extends AbstractMigration
{
    public function up()
    {
        $password = password_hash('verysecret', PASSWORD_BCRYPT);

        $this->execute("
            INSERT INTO users (email, password, name) VALUES ('wronski@example.com', '$password', 'User');
        ");
    }

    public function down() 
    {

    }
}
