<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReservationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReservationsTable Test Case
 */
class ReservationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ReservationsTable
     */
    public $Reservations;

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
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Reservations') ? [] : ['className' => 'App\Model\Table\ReservationsTable'];
        $this->Reservations = TableRegistry::get('Reservations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Reservations);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
         $congig['id'] = 1;
         $config['user_id'] = 5;
    }
}
