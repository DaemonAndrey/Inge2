<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ReservationsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ReservationsController Test Case
 */
class ReservationsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.reservations',
        'app.users'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/reservations/index');
        $this->assertResponseOk();
    }

    /**
     * Test isAuthorized method
     *
     * @return void
     */
    public function testIsAuthorized()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'user_id' => 5,
                ]
        ]
    ]);
    $this->get('/users/registrar');

    $this->assertResponseOk();
    }
}
