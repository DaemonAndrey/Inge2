<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\UsersController Test Case
 */
class UsersControllerTest extends IntegrationTestCase
{
    public $fixtures = [
        'app.users'
    ];
    public $dropTables = false;
	public function truncate($db) { return null; }
    public function drop($db) { return null; }


    public function testRegistrar()
    {
        $data = array('User' => array(  'id' => 1,
                                        'username' => 'Usuario1',
                                        'password' => 'usuario1',
                                        'first_name' => 'Usuario1',
                                        'last_name' => 'Apellido1',
                                        'telephone_number' => '88990099',
                                        'department' => 'Educacion',
                                        'position' => 'Docente',
                                        'state' => '1'
									 )
					);

        $result = $this->post('/users/registrar', $data);
        $this->assertResponseOk();
    }
    


}
