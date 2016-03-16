<?php

use Phinx\Migration\AbstractMigration;
use fzaninotto\faker\Faker\Factory;

class SeedContactsTable extends AbstractMigration
{
    public function up()
    {

        $this->execute("
            INSERT INTO contacts (first_name, last_name, email, phone, birth_date) 
            VALUES ('Przemysław', 'Wroński', 'wronski.przemyslaw@gmail.com', '698-695-652', '1989-03-22');

            INSERT INTO contacts (first_name, last_name, email, phone, birth_date) 
            VALUES ('Jane', 'Doe', 'jane@example.com', '654-665-676', '1992-05-15');

            INSERT INTO contacts (first_name, last_name, email, phone, birth_date) 
            VALUES ('Thurman', 'Goodpasture', 'thurman@example.com', '596-123-632', '1983-01-21');
 
            INSERT INTO contacts (first_name, last_name, email, phone, birth_date) 
            VALUES ('Abram', 'Lammert', 'abram@example.com', '123-123-123', '1980-01-01');
 
            INSERT INTO contacts (first_name, last_name, email, phone, birth_date) 
            VALUES ('Chanel', 'Bonneau', 'chanel@example.com', '555-555-555', '1965-09-09');
 
            INSERT INTO contacts (first_name, last_name, email, phone, birth_date) 
            VALUES ('Latasha', 'Soliday', 'soliday@example.com', '118-965-888', '1995-04-22');
  
            INSERT INTO contacts (first_name, last_name, email, phone, birth_date) 
            VALUES ('Francesco', 'Bergdoll', 'francesco.b@example.com', '222-333-444', '1980-06-10');
        ");
    }

    public function down() 
    {

    }
}
