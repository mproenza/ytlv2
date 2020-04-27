<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DriversLocalitiesFixture
 */
class DriversLocalitiesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'driver_id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'locality_id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'driver_localities_driver_fk' => ['type' => 'index', 'columns' => ['driver_id'], 'length' => []],
            'driver_localities_locality_fk' => ['type' => 'index', 'columns' => ['locality_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'id' => ['type' => 'unique', 'columns' => ['id'], 'length' => []],
            'drivers_localities_ibfk_1' => ['type' => 'foreign', 'columns' => ['driver_id'], 'references' => ['drivers', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'drivers_localities_ibfk_2' => ['type' => 'foreign', 'columns' => ['locality_id'], 'references' => ['localities', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
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
                'id' => 1,
                'driver_id' => 1,
                'locality_id' => 1,
            ],
        ];
        parent::init();
    }
}
