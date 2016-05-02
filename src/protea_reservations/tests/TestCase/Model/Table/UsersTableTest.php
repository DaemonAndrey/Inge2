<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

class UsersTableTest extends TestCase
{
    public $Users;
    public $fixtures = [
        'app.users'
    ];

    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Users') ? [] : ['className' => 'App\Model\Table\UsersTable'];
        $this->Users = TableRegistry::get('Users', $config);
    }

    public function tearDown()
    {
        unset($this->Users);
        parent::tearDown();
    }

    public function testValidationDefault()
    {
        $result = $this->loadFixtures('Users');
		debug($result);
    }

    public function testRegistrationConfirmed()
    {
        $query = $this->Articles->findByState(1);
        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->hydrate(false)->toArray();
        $expected = [
            ['username' => 'Usuario1', 'password' => 'usuario1',
              'first_name' => 'Usuario1',
              'last_name' => 'Apellido1',
              'telephone_number' => '88990099',
              'department' => 'Educacion',
              'position' => 'Docente',
              'state' => '1'],
        ];

        $this->assertEquals($expected, $result);
        
    }
    
    public function testEqualtofield()
    {
        $result = $this->loadFixtures('Users');
		//debug($result);
    }
}
