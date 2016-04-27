<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;

/**
 * App\Controller\UsersController Test Case
 */
class UsersControllerTest extends IntegrationTestCase
{


    public $fixtures = ['app.users'];
    public $dropTables = false;
	public function truncate($db) { return null; }
    public function drop($db) { return null; }


    public function testRegistrar()
    {
        $data = [
            'username' => 'prueba1@ucr.ac.cr',
            'password' => 'prueba1',
            'first_name' => 'Prueba1',
            'last_name' => 'Prueba1'
        ];
        $this->post('/users/registrar', $data);

        $this->assertResponseSuccess();
        $users = TableRegistry::get('Users');
        $query = $users->find();
        $this->assertEquals(1, $query->count());
    }
}
