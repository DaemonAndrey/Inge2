<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ReservationsFixture
 *
 */
class ReservationsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10,  'null' => false],
        'start_date' => ['type' => 'datetime', 'length' => null, 'null' => false],
        'end_date' => ['type' => 'datetime', 'length' => null, 'null' => false],
        'reservation_title' => ['type' => 'string', 'length' => 30, 'null' => false],
        'resource_id' => ['type' => 'integer', 'length' => 10, 'null' => false],
        'user_comment' => ['type' => 'text', 'length' => null, 'null' => true],
        'administrator_comment' => ['type' => 'text', 'length' => null, 'null' => true],
        'state' => ['type' => 'integer', 'length' => 10,'null' => false],
        'user_seen' => ['type' => 'binary', 'length' => null, 'null' => true],
        'administrator_seen' => ['type' => 'binary', 'length' => null, 'null' => true],
        'user_id' => ['type' => 'integer', 'length' => 10, 'null' => false],
        'course_name' => ['type' => 'string', 'length' => 70, 'null' => true],
        'course_id' => ['type' => 'string', 'length' => 10, 'null' => true],
        '_indexes' => [
            'resource_id' => ['type' => 'index', 'columns' => ['resource_id'], 'length' => []],
            'user_id' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'start_date' => ['type' => 'unique', 'columns' => ['start_date', 'resource_id'], 'length' => []],
            'reservations_ibfk_1' => ['type' => 'foreign', 'columns' => ['resource_id'], 'references' => ['resources', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'reservations_ibfk_2' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'start_date' => '2016-01-20 07:00:00',
            'end_date' => '2016-01-20 09:00:00',
            'reservation_title' => 'Sala de audiovisuales - WR-016',
            'resource_id' => 2,
            'user_comment' => 'Integer vel accumsan tellus nisi eu orci.',
            'administrator_comment' => 'Suspendisse accumsan turpis.',
            'state' => 4,
            'user_seen' => '1',
            'administrator_seen' => '1',
            'user_id' => 5,
            'course_name' => 'suscipit',
            'course_id' => 'WR-0166'
        ],
    ];
}
