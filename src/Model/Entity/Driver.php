<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Driver Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string|null $web_auth_token
 * @property string $role
 * @property int $min_people_count
 * @property int $max_people_count
 * @property bool $active
 * @property bool $receive_requests
 * @property bool $has_modern_car
 * @property bool $has_classic_car
 * @property bool $has_air_conditioner
 * @property int $province_id
 * @property string $description
 * @property int $travel_count
 * @property \Cake\I18n\FrozenTime $last_notification_date
 * @property bool $speaks_english
 * @property int|null $operator_id
 * @property \Cake\I18n\FrozenDate|null $created
 * @property bool $mobile_app_active
 * @property bool $email_active
 *
 * @property \App\Model\Entity\Province $province
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\ActivityDriverSubscription[] $activity_driver_subscriptions
 * @property \App\Model\Entity\ArchiveDriversTravel[] $archive_drivers_travels
 * @property \App\Model\Entity\Conversation[] $conversations
 * @property \App\Model\Entity\DiscountRide[] $discount_rides
 * @property \App\Model\Entity\DriversProfile[] $drivers_profiles
 * @property \App\Model\Entity\DriversTransactionalEmail[] $drivers_transactional_emails
 * @property \App\Model\Entity\DriversTravelsByEmail[] $drivers_travels_by_email
 * @property \App\Model\Entity\Testimonial[] $testimonials
 * @property \App\Model\Entity\Locality[] $localities
 */
class Driver extends Entity
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
        //'password' => true,
        'name' => true,
        'web_auth_token' => true,
        'role' => true,
        'min_people_count' => true,
        'max_people_count' => true,
        'active' => true,
        'receive_requests' => true,
        'has_modern_car' => true,
        'has_classic_car' => true,
        'has_air_conditioner' => true,
        'province_id' => true,
        'description' => true,
        'travel_count' => true,
        'last_notification_date' => true,
        'speaks_english' => true,
        'operator_id' => true,
        'created' => true,
        'mobile_app_active' => true,
        'email_active' => true,
        'province' => true,
        'user' => true,
        'activity_driver_subscriptions' => true,
        'archive_drivers_travels' => true,
        'conversations' => true,
        'discount_rides' => true,
        'drivers_profiles' => true,
        'drivers_transactional_emails' => true,
        'drivers_travels_by_email' => true,
        'testimonials' => true,
        'localities' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];
    
    /*protected function _setPassword(string $password) : ?string {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
    }*/
    
    public static function shortenName($name){
        $name = trim($name);
        
        // Hack para manejar algunos nombres compuestos o complejos
        if(substr($name, 0, 11) == 'Juan Carlos') return 'Juan Carlos';
        if(substr($name, 0, 10) == 'Jorge Luis') return 'Jorge Luis';
        if(substr($name, 0, 11) == 'Dr. Lázaro') return 'Dr. Lázaro';
        if(substr($name, 0, 11) == 'José Angel') return 'José Angel';
        
        // Eliminar todo despues de un espacio, ej. el apellido
        $split = str_getcsv($name, ' ');
        $name = $split[0];
        
        // Eliminar cualquier cosa entre parentesis, ej. (MITAXI)
        $split = str_getcsv($name, '(');
        $name = $split[0];
        
        $name = trim($name);
        
        return $name;
    }
}
