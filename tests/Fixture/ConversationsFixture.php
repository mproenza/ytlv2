<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ConversationsFixture
 */
class ConversationsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'driver_id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'travel_id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'notification_type' => ['type' => 'char', 'length' => 1, 'null' => false, 'default' => 'A', 'collate' => 'latin1_bin', 'comment' => '', 'precision' => null],
        'last_driver_email' => ['type' => 'string', 'length' => 250, 'null' => false, 'default' => null, 'collate' => 'latin1_bin', 'comment' => '', 'precision' => null],
        'message_count' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'notified_by' => ['type' => 'string', 'length' => 250, 'null' => true, 'default' => null, 'collate' => 'latin1_bin', 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => true, 'default' => null, 'comment' => ''],
        'identifier' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'travel_date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'original_date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'user_id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'child_conversation_id' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'discount_id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'drivers_travels_driver_fk' => ['type' => 'index', 'columns' => ['driver_id'], 'length' => []],
            'drivers_travels_travel_fk' => ['type' => 'index', 'columns' => ['travel_id'], 'length' => []],
            'user_id' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
            'discount_conversation_fk' => ['type' => 'index', 'columns' => ['discount_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'id' => ['type' => 'unique', 'columns' => ['id'], 'length' => []],
            'conversations_ibfk_2' => ['type' => 'foreign', 'columns' => ['travel_id'], 'references' => ['travels', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'conversations_ibfk_3' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'conversations_ibfk_4' => ['type' => 'foreign', 'columns' => ['driver_id'], 'references' => ['drivers', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'conversations_ibfk_5' => ['type' => 'foreign', 'columns' => ['discount_id'], 'references' => ['discount_rides', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_bin'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => '64ef8743-fd0d-4142-9e89-51fbe090bfec',
                'driver_id' => 1,
                'travel_id' => 1,
                'notification_type' => '',
                'last_driver_email' => 'Lorem ipsum dolor sit amet',
                'message_count' => 1,
                'notified_by' => 'Lorem ipsum dolor sit amet',
                'created' => '2020-04-13 01:34:21',
                'identifier' => 1,
                'travel_date' => '2020-04-13',
                'original_date' => '2020-04-13',
                'user_id' => 1,
                'child_conversation_id' => '48a38620-c669-4258-b989-661f883ae514',
                'discount_id' => 1,
            ],
        ];
        parent::init();
    }
}
