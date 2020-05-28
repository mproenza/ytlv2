<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DriversProfilesFixture
 */
class DriversProfilesFixture extends TestFixture
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
        'slug' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_bin', 'comment' => '', 'precision' => null],
        'driver_name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_bin', 'comment' => '', 'precision' => null],
        'avatar_filepath' => ['type' => 'string', 'length' => 250, 'null' => false, 'default' => null, 'collate' => 'latin1_bin', 'comment' => '', 'precision' => null],
        'featured_img_url' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'latin1_bin', 'comment' => '', 'precision' => null],
        'description_es' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'description_en' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'latin1_bin', 'comment' => '', 'precision' => null],
        'show_profile' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'driver_code' => ['type' => 'string', 'length' => 10, 'null' => false, 'default' => null, 'collate' => 'latin1_bin', 'comment' => '', 'precision' => null],
        'testimonial_attempts' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'drivers_profiles_driver_fk' => ['type' => 'index', 'columns' => ['driver_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'drivers_profiles_driver_unique' => ['type' => 'unique', 'columns' => ['driver_id'], 'length' => []],
            'drivers_profiles_slug_unique' => ['type' => 'unique', 'columns' => ['slug'], 'length' => []],
            'drivers_profiles_ibfk_1' => ['type' => 'foreign', 'columns' => ['driver_id'], 'references' => ['drivers', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'id' => 'b07950f8-b84e-4972-a64b-79c294b1bc4e',
                'driver_id' => 1,
                'slug' => 'Lorem ipsum dolor sit amet',
                'driver_name' => 'Lorem ipsum dolor sit amet',
                'avatar_filepath' => 'Lorem ipsum dolor sit amet',
                'featured_img_url' => 'Lorem ipsum dolor sit amet',
                'description_es' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'description_en' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'show_profile' => 1,
                'driver_code' => 'Lorem ip',
                'testimonial_attempts' => 1,
            ],
        ];
        parent::init();
    }
}
