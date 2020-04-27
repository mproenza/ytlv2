<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DriversLocality Entity
 *
 * @property int $id
 * @property int $driver_id
 * @property int $locality_id
 *
 * @property \App\Model\Entity\Driver $driver
 * @property \App\Model\Entity\Locality $locality
 */
class DriversLocality extends Entity
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
        'locality_id' => true,
        'driver' => true,
        'locality' => true,
    ];
}
