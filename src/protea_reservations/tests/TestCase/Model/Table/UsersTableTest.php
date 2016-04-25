<?php

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

class UsersTableTest extends TestCase
{
    public $fixtures = ['app.users'];

    public function testUserModel() 
    {
		$result = $this->loadFixtures('Users');
		debug($result);
	}
    
    public function setUp()
    {
        parent::setUp();
        $this->Users = TableRegistry::get('Users');
    }
}

?>