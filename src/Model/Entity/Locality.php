<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Locality Entity
 *
 * @property int $id
 * @property string $name
 * @property int $province_id
 *
 * @property \App\Model\Entity\Province $province
 * @property \App\Model\Entity\LocalitiesThesaurus[] $localities_thesaurus
 * @property \App\Model\Entity\TravelsByEmail[] $travels_by_email
 * @property \App\Model\Entity\Driver[] $drivers
 */
class Locality extends Entity
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
        'name' => true,
        'province_id' => true,
        'province' => true,
        //'localities_thesaurus' => true,
        //'travels_by_email' => true,
        //'drivers' => true,
    ];
}
