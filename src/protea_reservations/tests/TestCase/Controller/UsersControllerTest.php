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


    public function testAdd()
    {
        $data = [
            'username' => 'prueba1@ucr.ac.cr',
            'password' => 'prueba1',
            'first_name' => 'Prueba1',
            'last_name' => 'Prueba1'
        ];
        $this->post('/users/add', $data);

        $this->assertResponseSuccess();
        $users = TableRegistry::get('Users');
        $query = $users->find();
        $this->assertEquals(1, $query->count());
    }      
    
    public function testLoginRedirect()
    {
        // Set session data
        $this->session([
            'Auth' => [
                'User' => [                    
                    'username' => 'admin@ucr.ac.cr',
                    'password' => 'adminadmin'                    
                ]
            ]
        ]);
                
        $this->get('/reservations/');
        $this->assertResponseOk();
        
        // Other assertions.       
        $this->get('/users/add');
        $this->assertRedirect(['controller' => 'pages', 'action' => 'home']); 
        
        $this->get('/users/login');
        $this->assertRedirect(['controller' => 'pages', 'action' => 'home']);            
    }
     
    public function testLoginRedirectFails()
    {
        // No session data set.                       
        $this->get('/users/login');        
        $this->assertResponseOk();
        
        $this->get('/users/add');        
        $this->assertResponseOk();
        
        $this->get('/reservations/');                
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);        
    }       
    
}
