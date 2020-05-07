<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DriversProfile Entity
 *
 * @property string $id
 * @property int $driver_id
 * @property string $driver_nick
 * @property string $driver_name
 * @property string $avatar_filepath
 * @property string|null $featured_img_url
 * @property string $description_es
 * @property string $description_en
 * @property bool $show_profile
 * @property string $driver_code
 * @property int $testimonial_attempts
 *
 * @property \App\Model\Entity\Driver $driver
 */
class DriversProfile extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'driver_id' => true,
        'driver_nick' => true,
        'driver_name' => true,
        'avatar_filename' => true,
        'avatar_filedir'=>true,
        'featured_img_url' => true,
        'description_es' => true,
        'description_en' => true,
        'show_profile' => true,
        'driver_code' => true,
        'testimonial_attempts' => true,
        'driver' => true,
    ];
    
}
