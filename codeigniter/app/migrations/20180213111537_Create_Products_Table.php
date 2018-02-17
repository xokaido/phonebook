<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Products_Table extends	CI_Migration {
	
	private $table = 'products';
	
	function up() 
	{	
		if (!$this->db->table_exists($this->table )) 
		{	
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->add_field([
        'id' => [ 'type' => 'MEDIUMINT', 'constraint' => 8, 'unsigned' => TRUE, 'null' => FALSE, 'auto_increment' => TRUE ],
        'brand' => [ 'type' => 'varchar', 'constraint' => '25', 'null' => false, 'default' => '' ],
        'sku_model' => [ 'type' => 'MEDIUMINT', 'constraint' => 8, 'null' => false, 'unique' => true, 'default' => '198287' ],
        'itemname' => [ 'type' => 'varchar', 'constraint' => '35', 'null' => false, 'default' => '' ],
        'itemdescription' => [ 'type' => 'text', 'constraint' => '', 'null' => false, 'default' => '' ],
        'itemupc' => [ 'type' => 'MEDIUMINT', 'constraint' => 8, 'null' => false, 'unique' => true, 'default' => '198287' ],
        'singleitemlength' => [ 'type' => 'varchar', 'constraint' => '5', 'null' => false, 'default' => '' ],
        'singleitemweight' => [ 'type' => 'varchar', 'constraint' => '5', 'null' => false, 'default' => '' ],
        'singleitemwidth' => [ 'type' => 'varchar', 'constraint' => '5', 'null' => false, 'default' => '' ],
        'singleitemheight' => [ 'type' => 'varchar', 'constraint' => '5', 'null' => false, 'default' => '' ],
        'singleitemdepth' => [ 'type' => 'varchar', 'constraint' => '5', 'null' => false, 'default' => '' ],
        'singlepackagelength' => [ 'type' => 'varchar', 'constraint' => '5', 'null' => false, 'default' => '' ],
        'singlepackagewidth' => [ 'type' => 'varchar', 'constraint' => '5', 'null' => false, 'default' => '' ],
        'singlepackageheight' => [ 'type' => 'varchar', 'constraint' => '5', 'null' => false, 'default' => '' ],
        'singlepackageweight' => [ 'type' => 'varchar', 'constraint' => '5', 'null' => false, 'default' => '' ],
        'itemdimunit' => [ 'type' => 'varchar', 'constraint' => '5', 'null' => false, 'default' => '' ],
        'itemweightunit' => [ 'type' => 'varchar', 'constraint' => '5', 'null' => false, 'default' => '' ],
        'packagedimunit' => [ 'type' => 'varchar', 'constraint' => '5', 'null' => false, 'default' => '' ],
        'liquid' => [ 'type' => 'tinyint', 'constraint' => 1, 'null' => false, 'default' => '0' ],
        'glass' => [ 'type' => 'tinyint', 'constraint' => 1, 'null' => false, 'default' => '0' ],
        'sealedcap' => [ 'type' => 'tinyint', 'constraint' => 1, 'null' => false, 'default' => '0' ],
        'packagingtype' => [ 'type' => 'varchar', 'constraint' => '20', 'null' => false, 'default' => '' ],
        'itemfluidounces' => [ 'type' => 'float', 'constraint' => '2,2', 'null' => false, 'default' => '0' ],
        'itemvolumemil' => [ 'type' => 'int', 'constraint' => '5', 'unsigned' => true, 'null' => false, 'default' => '0' ],
        'itemingredients' => [ 'type' => 'varchar', 'constraint' => '250', 'null' => false, 'default' => '' ],
        'itembenefits' => [ 'type' => 'text', 'null' => false, 'default' => '' ],
        'itemsuggesteduse' => [ 'type' => 'varchar', 'constraint' => '250', 'null' => false, 'default' => '' ],
        'itemdirections' => [ 'type' => 'text', 'null' => false, 'default' => '' ],
        'itemcountryoforigin' => [ 'type' => 'varchar', 'constraint' => '50', 'null' => false, 'default' => '' ],
        'shelflife' => [ 'type' => 'varchar', 'constraint' => '50', 'null' => false, 'default' => '' ],
        'itemmainimagelink' => [ 'type' => 'varchar', 'constraint' => '250', 'null' => false, 'default' => '' ],
        'itemimagelink2' => [ 'type' => 'varchar', 'constraint' => '250', 'null' => false, 'default' => '' ],
        'itemimagelink3' => [ 'type' => 'varchar', 'constraint' => '250', 'null' => false, 'default' => '' ],
        'itemimagelink4' => [ 'type' => 'varchar', 'constraint' => '250', 'null' => false, 'default' => '' ],
        'itemimagelink5' => [ 'type' => 'varchar', 'constraint' => '250', 'null' => false, 'default' => '' ],
        'electroniccomponent' => [ 'type' => 'varchar', 'constraint' => '50', 'null' => false, 'default' => '' ],
        'voltage' => [ 'type' => 'varchar', 'constraint' => '20', 'null' => false, 'default' => '' ],
        'electriccertification' => [ 'type' => 'varchar', 'constraint' => '50', 'null' => false, 'default' => '' ],
        'itemcasepack' => [ 'type' => 'varchar', 'constraint' => '50', 'null' => false, 'default' => '' ],
        'casepackupc' => [ 'type' => 'varchar', 'constraint' => '50', 'null' => false, 'default' => '' ],
        'innerpackupc' => [ 'type' => 'varchar', 'constraint' => '50', 'null' => false, 'default' => '' ],
        'singleitemcostusd' => [ 'type' => 'float', 'constraint' => '4,2', 'null' => false, 'default' => '0' ],
        'singleitemretailusd' => [ 'type' => 'float', 'constraint' => '4,2', 'null' => false, 'default' => '0' ],
        'singleitemmapusd' => [ 'type' => 'varchar', 'constraint' => '25', 'null' => false, 'default' => '' ],
        'batteriesrequired' => [ 'type' => 'tinyint', 'constraint' => 1, 'null' => false, 'default' => '0' ],
        'batteriesincluded' => [ 'type' => 'tinyint', 'constraint' => 1, 'null' => false, 'default' => '0' ],
        'howmanybatteries' => [ 'type' => 'int', 'constraint' => '2', 'null' => false, 'default' => '0' ],
        'batterytype' => [ 'type' => 'int', 'constraint' => '3', 'null' => false, 'default' => '0' ],
        'brandstory' => [ 'type' => 'text', 'null' => false, 'default' => '' ],
        'itemsioc' => [ 'type' => 'tinyint', 'constraint' => 1, 'null' => false, 'default' => '0' ],
        'itempfp' => [ 'type' => 'tinyint', 'constraint' => 1, 'null' => false, 'default' => '0' ],
        'duallanguage' => [ 'type' => 'tinyint', 'constraint' => 1, 'null' => false, 'default' => '0' ],
        'hazmat' => [ 'type' => 'tinyint', 'constraint' => 1, 'null' => false, 'default' => '0' ],
        'unnumber' => [ 'type' => 'tinyint', 'constraint' => 1, 'null' => false, 'default' => '0' ],
        'canadiancert' => [ 'type' => 'tinyint', 'constraint' => 1, 'null' => false, 'default' => '0' ],
        'datesubmittedtoamazon' => [ 'type' => 'datetime', 'null' => false, 'default' => 'CURRENT_TIMESTAMP' ],
        'amazonasin' => [ 'type' => 'varchar', 'constraint' => '20', 'null' => false, 'default' => '' ],
        'amazonlivelink' => [ 'type' => 'varchar', 'constraint' => '250', 'null' => false, 'default' => '' ],
        'msdslink' => [ 'type' => 'varchar', 'constraint' => '250', 'null' => false, 'default' => '' ],
        'datesubmittedtodb' => [ 'type' => 'datetime', 'null' => false, 'default' => 'CURRENT_TIMESTAMP' ],
        'warnings' => [ 'type' => 'varchar', 'constraint' => '250', 'null' => false, 'default' => '' ],
        'whatsincluded' => [ 'type' => 'varchar', 'constraint' => '250', 'null' => false, 'default' => '' ],
        'amazontitle' => [ 'type' => 'varchar', 'constraint' => '150', 'null' => false, 'default' => '' ],
        'amazonbulletpoint1' => [ 'type' => 'varchar', 'constraint' => '250', 'null' => false, 'default' => '' ],
        'amazonbulletpoint2' => [ 'type' => 'varchar', 'constraint' => '250', 'null' => false, 'default' => '' ],
        'amazonbulletpoint3' => [ 'type' => 'varchar', 'constraint' => '250', 'null' => false, 'default' => '' ],
        'amazonbulletpoint4' => [ 'type' => 'varchar', 'constraint' => '250', 'null' => false, 'default' => '' ],
        'amazonbulletpoint5' => [ 'type' => 'varchar', 'constraint' => '250', 'null' => false, 'default' => '' ],
        'amazondescription' => [ 'type' => 'text', 'null' => false, 'default' => '' ],
        'amazonkeywords' => [ 'type' => 'varchar', 'constraint' => '250', 'null' => false, 'default' => '' ],

        'amazonsubmissionid' => [ 'type' => 'int', 'constraint' => '8', 'unsigned' => true, 'null' => false, 'default' => '' ],
        'amazonchannel' => [ 'type' => 'varchar', 'constraint' => '250', 'null' => false, 'default' => '' ],
        'amazonvendorcode' => [ 'type' => 'varchar', 'constraint' => '250', 'null' => false, 'default' => '' ],

        'labellanguages' => [ 'type' => 'varchar', 'constraint' => '250', 'null' => false, 'default' => '' ],
      ] );
			$this->dbforge->create_table($this->table, TRUE);
			
		}
	}

	function down() 
	{
  		$this->dbforge->drop_table($this->groups);
	}
}