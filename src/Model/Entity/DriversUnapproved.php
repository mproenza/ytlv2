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
 * @property string $featured_img_url
 * @property string $about
 * @property string $profile_img_url
 * @property string $phone 
 * @property int $max_people_count
 * 
 *
 * 
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
        'phone'=>true,
        'max_people_count' => true,
        'about' => true,
        'featured_img_url' => true,
        'avatar_path' => true,
        'profile_img_url' => true,        
    ];
    
    
    public function _getAvatarPath() {
     if(isset($this->avatar_path)) return $this->avatar_path;

     return $this->avatar_path_dir.DS.$this->avatar_path;
    }

    public function _getFeaturedImageUrlPath() {
         if(isset($this->featured_image_url)) return $this->featured_image_url;
         return $this->featured_image_url_dir.DS.$this->featured_image_url;
    }

    public function _getProfileImageUrlPath() {
         if(isset($this->profile_image_url)) return $this->profile_image_url;
         return $this->profile_image_url_dir.DS.$this->profile_image_url;
    }
    
}
