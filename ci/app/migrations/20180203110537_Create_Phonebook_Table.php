<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Phonebook_Table extends	CI_Migration {
	
	private $table = 'phonebooks';
	
	function up() 
	{	
		if (!$this->db->table_exists($this->table )) 
		{	
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->add_field([
				'id' => [ 'type' => 'MEDIUMINT', 'constraint' => 8, 'unsigned' => TRUE, 'null' => FALSE, 'auto_increment' => TRUE ],
				'user_id' => [ 'type' => 'MEDIUMINT', 'constraint' => 8, 'unsigned' => TRUE, 'null' => FALSE  ],
				'name' => [ 'type' => 'VARCHAR', 'constraint' => '30', 'null' => FALSE ],
				'phone' => [ 'type' => 'VARCHAR', 'constraint' => '20', 'null' => FALSE ],
        'notes' => [ 'type' => 'VARCHAR', 'constraint' => '150', 'null' => FALSE ],
				'created_on' => [ 'type' => 'DATETIME', 'null' => FALSE ],
        'updated_on' => [ 'type' => 'TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP', 'null' => FALSE ]
      ] );
			$this->dbforge->create_table($this->table, TRUE);
			
		}
	}

	function down() 
	{
  		$this->dbforge->drop_table($this->groups);
	}
}