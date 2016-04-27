<?php

namespace App\Test\TestCase\Model\Table;

use src\Model\Table\UsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

class UsersTableTest extends TestCase
{
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
                    'username' => 'testing',
                    // other keys.
                ]
            ]
        ]);
        $this->get('/users/add');

        $this->assertResponseOk();
        // Other assertions.
    }
}

?>

