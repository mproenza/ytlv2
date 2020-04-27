<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Travel Entity
 *
 * @property int $id
 * @property string $origin
 * @property string $destination
 * @property int|null $origin_locality_id
 * @property int|null $destination_locality_id
 * @property int $direction
 * @property \Cake\I18n\FrozenDate $date
 * @property \Cake\I18n\FrozenDate|null $original_date
 * @property int $people_count
 * @property string $details
 * @property int $user_id
 * @property string $state
 * @property int $drivers_sent_count
 * @property int $drivers_sent_by_admin_count
 * @property int $drivers_sent_by_user_count
 * @property bool $need_modern_car
 * @property int $need_air_conditioner
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property string $created_from_ip
 * @property int $archive_conversations_count
 * @property int|null $operator_id
 *
 * @property \App\Model\Entity\OriginLocality $origin_locality
 * @property \App\Model\Entity\DestinationLocality $destination_locality
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Operator $operator
 * @property \App\Model\Entity\ArchiveDriversTravel[] $archive_drivers_travels
 * @property \App\Model\Entity\Conversation[] $conversations
 * @property \App\Model\Entity\DriversTravelsByEmail[] $drivers_travels_by_email
 * @property \App\Model\Entity\TravelsConversationsMetum[] $travels_conversations_meta
 * @property \App\Model\Entity\TravelsByEmail[] $travels_by_email
 */
class Travel extends Entity
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
        'origin' => true,
        'destination' => true,
        'origin_locality_id' => true,
        'destination_locality_id' => true,
        'direction' => true,
        'date' => true,
        'original_date' => true,
        'people_count' => true,
        'details' => true,
        'user_id' => true,
        'state' => true,
        'drivers_sent_count' => true,
        'drivers_sent_by_admin_count' => true,
        'drivers_sent_by_user_count' => true,
        'need_modern_car' => true,
        'need_air_conditioner' => true,
        'created' => true,
        'modified' => true,
        'created_from_ip' => true,
        'archive_conversations_count' => true,
        'operator_id' => true,
        'origin_locality' => true,
        'destination_locality' => true,
        'user' => true,
        'operator' => true,
        'archive_drivers_travels' => true,
        'conversations' => true,
        'drivers_travels_by_email' => true,
        'travels_conversations_meta' => true,
        'travels_by_email' => true,
    ];
}
