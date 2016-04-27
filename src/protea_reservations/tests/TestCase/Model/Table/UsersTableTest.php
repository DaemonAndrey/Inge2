<?php

namespace App\Test\TestCase\Model\Table;

use src\Model\Table\UsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

class UsersTableTest extends TestCase
{
    public $fixtures = ['app.users'];
    
    public function setUp()
    {
        parent::setUp();
        $this->Users = TableRegistry::get('Users');
    }
}

?>

