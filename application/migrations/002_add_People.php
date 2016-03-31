<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_People extends CI_Migration {

	public function up(){
		$this->dbforge->add_field([
			'first_name' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'NULL' => FALSE
			],
			'last_name' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'NULL' => FALSE
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'NULL' => FALSE
			],
			'job_role' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'NULL' => FALSE
			],
			'id' => [
				'type' => 'INT',
				'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			]
		]);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('People');
	}

	public function down(){
		$this->dbforge->drop_table('People');
	}
}