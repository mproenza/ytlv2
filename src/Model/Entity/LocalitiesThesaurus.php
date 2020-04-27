<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LocalitiesThesaurus Entity
 *
 * @property int $id
 * @property int $locality_id
 * @property string $fake_name
 * @property string $real_name
 * @property bool $use_as_hint
 *
 * @property \App\Model\Entity\Locality $locality
 */
class LocalitiesThesaurus extends Entity
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
        'locality_id' => true,
        'fake_name' => true,
        'real_name' => true,
        'use_as_hint' => true,
        'locality' => true,
    ];
}
