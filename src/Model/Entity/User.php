<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $role
 * @property bool $active
 * @property string $display_name
 * @property bool $email_confirmed
 * @property int $travel_count
 * @property int|null $conversations_count
 * @property int $travel_by_email_count
 * @property \Cake\I18n\FrozenDate $created
 * @property string|null $registered_from_ip
 * @property string|null $register_type
 * @property \Cake\I18n\FrozenDate|null $unsubscribe_date
 * @property string $lang
 * @property \Cake\I18n\FrozenTime|null $last_notification_date
 * @property string|null $email_config
 * @property bool $shared_ride_offered
 *
 * @property \App\Model\Entity\CasasFindRequest[] $casas_find_requests
 * @property \App\Model\Entity\Conversation[] $conversations
 * @property \App\Model\Entity\Travel[] $travels
 * @property \App\Model\Entity\TravelsByEmail[] $travels_by_email
 * @property \App\Model\Entity\UserInteraction[] $user_interactions
 */
class User extends Entity
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
        'password' => true,
        'role' => true,
        'active' => true,
        'display_name' => true,
        'email_confirmed' => true,
        'travel_count' => true,
        'conversations_count' => true,
        'travel_by_email_count' => true,
        'created' => true,
        'registered_from_ip' => true,
        'register_type' => true,
        'unsubscribe_date' => true,
        'lang' => true,
        'last_notification_date' => true,
        'email_config' => true,
        'shared_ride_offered' => true,
        'casas_find_requests' => true,
        'conversations' => true,
        'travels' => true,
        'travels_by_email' => true,
        'user_interactions' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];
}
