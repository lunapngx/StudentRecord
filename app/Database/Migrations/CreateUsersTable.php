<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        // Define fields for the 'users' table
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'unique'     => true,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'unique'     => true,
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        // Add primary key
        $this->forge->addPrimaryKey('id');

        // Check if the table does NOT exist before creating it
        if (!$this->db->tableExists('users')) {
            $this->forge->createTable('users');
            echo "Table 'users' created successfully.\n";
        } else {
            echo "Table 'users' already exists, skipping creation.\n";
        }
    }

    public function down()
    {
        // Drop the table if it exists
        if ($this->db->tableExists('users')) {
            $this->forge->dropTable('users');
            echo "Table 'users' dropped successfully.\n";
        } else {
            echo "Table 'users' does not exist, skipping drop.\n";
        }
    }
}