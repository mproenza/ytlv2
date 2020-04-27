<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TestimonialsFixture
 */
class TestimonialsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'author' => ['type' => 'string', 'length' => 1000, 'null' => false, 'default' => null, 'collate' => 'latin1_bin', 'comment' => '', 'precision' => null],
        'country' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'latin1_bin', 'comment' => '', 'precision' => null],
        'text' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'latin1_bin', 'comment' => '', 'precision' => null],
        'state' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => 'P', 'collate' => 'latin1_bin', 'comment' => '', 'precision' => null],
        'lang' => ['type' => 'char', 'length' => 2, 'null' => false, 'default' => 'es', 'collate' => 'latin1_bin', 'comment' => '', 'precision' => null],
        'image_filepath' => ['type' => 'string', 'length' => 250, 'null' => false, 'default' => null, 'collate' => 'latin1_bin', 'comment' => '', 'precision' => null],
        'conversation_id' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'driver_id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'email' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'collate' => 'latin1_bin', 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => null, 'comment' => ''],
        'modified' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => null, 'comment' => ''],
        'validation_token' => ['type' => 'char', 'length' => 32, 'null' => false, 'default' => null, 'collate' => 'latin1_bin', 'comment' => '', 'precision' => null],
        'driver_reply_token' => ['type' => 'string', 'length' => 32, 'null' => true, 'default' => null, 'collate' => 'latin1_bin', 'comment' => '', 'precision' => null],
        'validated' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'featured' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'use_as_sample' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'driver_travel_id_fk' => ['type' => 'index', 'columns' => ['conversation_id'], 'length' => []],
            'driver_id' => ['type' => 'index', 'columns' => ['driver_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'testimonials_ibfk_1' => ['type' => 'foreign', 'columns' => ['conversation_id'], 'references' => ['conversations', 'id'], 'update' => 'cascade', 'delete' => 'setNull', 'length' => []],
            'testimonials_ibfk_2' => ['type' => 'foreign', 'columns' => ['driver_id'], 'references' => ['drivers', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'id' => 'c59da915-6c28-438c-a694-135c7dc72457',
                'author' => 'Lorem ipsum dolor sit amet',
                'country' => 'Lorem ipsum dolor sit amet',
                'text' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'state' => 'Lorem ipsum dolor sit amet',
                'lang' => '',
                'image_filepath' => 'Lorem ipsum dolor sit amet',
                'conversation_id' => 'f15f6308-1f1e-4174-96e3-05f32488baf1',
                'driver_id' => 1,
                'email' => 'Lorem ipsum dolor sit amet',
                'created' => '2020-04-22 18:31:08',
                'modified' => '2020-04-22 18:31:08',
                'validation_token' => '',
                'driver_reply_token' => 'Lorem ipsum dolor sit amet',
                'validated' => 1,
                'featured' => 1,
                'use_as_sample' => 1,
            ],
        ];
        parent::init();
    }
}
