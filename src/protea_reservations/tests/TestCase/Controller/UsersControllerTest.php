<?php
namespace App\Test\TestCase\Controller;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestCase;
use App\Controller\UsersController;

class UsersControllerTest extends IntegrationTestCase
{
    public $fixtures = ['app.users'];

    public function testAddUnauthenticatedFails()
    {
        // No session data set.
        $this->get('/users/add');

        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    public function testAddAuthenticated()
    {
        // Set session data
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'Usuario1',
                    'password' => 'usuario1',
                    'first_name' => 'Usuario1',
                    'last_name' => 'Apellido1',
                    'telephone_number' => '88990099',
                    'department' => 'Educacion',
                    'position' => 'Docente',
                    'state' => '1'
                ]
            ]
        ]);
        $this->get('/users/add');

        $this->assertResponseOk();
        // Other assertions.
    }

}
