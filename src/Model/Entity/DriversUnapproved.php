<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DriversUnapproved Entity
 *
 * @property string $username
 * @property int $id
 * @property string $full_name
 * @property string $car_model
 * @property string $avatar_path
 * @property string|null $featured_img_url
 * @property string $about
 * @property string $profile_img_url
 * @property bool $has_classic_car 
 * @property int $max_people_count
 * 
 *
 * @property \App\Model\Entity\Driver $driver
 */
class DriversUnapproved extends Entity
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
        'username' => true,
        'full_name' => true,
        'car_model' => true,
        'max_people_count' => true,
        'about' => true,
        'featured_img_url' => true,
        'avatar_path' => true,
        'profile_img_url' => true,        
    ];
    
}
