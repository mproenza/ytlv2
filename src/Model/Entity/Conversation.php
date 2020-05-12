<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Conversation Entity
 *
 * @property string $id
 * @property int $driver_id
 * @property int|null $travel_id
 * @property string $notification_type
 * @property string $last_driver_email
 * @property int $message_count
 * @property string|null $notified_by
 * @property \Cake\I18n\FrozenTime|null $created
 * @property int|null $identifier
 * @property \Cake\I18n\FrozenDate|null $travel_date
 * @property \Cake\I18n\FrozenDate|null $original_date
 * @property int|null $user_id
 * @property string|null $child_conversation_id
 * @property int|null $discount_id
 *
 * @property \App\Model\Entity\Driver $driver
 * @property \App\Model\Entity\Travel $travel
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\ChildConversation $child_conversation
 * @property \App\Model\Entity\DiscountRide $discount_ride
 * @property \App\Model\Entity\ApiSyncQueue2driverConversation[] $api_sync_queue2driver_conversations
 * @property \App\Model\Entity\ArchiveDriverTravelerConversation[] $archive_driver_traveler_conversations
 * @property \App\Model\Entity\ArchiveTravelsConversationsMetum[] $archive_travels_conversations_meta
 * @property \App\Model\Entity\ConversationMessage[] $conversation_messages
 * @property \App\Model\Entity\Testimonial[] $testimonials
 * @property \App\Model\Entity\TravelsConversationsMetum[] $travels_conversations_meta
 */
class Conversation extends Entity
{
    public static $myCommonRelatedModels = ['Drivers', 'Drivers.DriversProfiles', 'Users', 'Travels', 'ConversationsMeta'];
    
    const NOTIFICATION_TYPES = [
        'AUTO' => 'A',
        'BY_ADMIN' => 'M',
        'BY_ADMIN_WITH_NOTE' => 'R',
        'DIRECT_MESSAGE' => 'D',
        'DISCOUNT_OFFER_REQUEST' => 'O',
    ];
    
    const STATES = [
        'NONE' => 'N',
        'DONE' => 'D',
        'PAID' => 'P'
    ];
    
    
    /*// Notifications Types (CUIDADO: NO CAMBIAR - Lo uso debajo en las cache_count del belongsTo(Travel))
    public static $NOTIFICATION_TYPE_AUTO = 'A'; // Para los choferes que se notifican al crearse el viaje
    public static $NOTIFICATION_TYPE_BY_ADMIN = 'M'; // Para los choferes que se notifican manualmente por un administrador
    //public static $NOTIFICATION_TYPE_BY_USER = 'U'; // Para los choferes que el viajero decide notificar adicionalmente (ej. si nosotros le damos la opción)
    public static $NOTIFICATION_TYPE_PREARRANGED = 'R'; // Para los viajes que se le notifiquen a los choferes y hayan sido prearreglados (ej. para hacer un descuento)
    public static $NOTIFICATION_TYPE_DIRECT_MESSAGE = 'D'; // Para las conversaciones directas (sin un viaje asociado)
    public static $NOTIFICATION_TYPE_DISCOUNT_OFFER_REQUEST = 'O'; // Para las ofertas de descuento*/
    
    
    
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
        'travel_id' => true,
        'notification_type' => true,
        'last_driver_email' => true,
        'message_count' => true,
        'notified_by' => true,
        'created' => true,
        'identifier' => true,
        'travel_date' => true,
        'original_date' => true,
        'user_id' => true,
        'child_conversation_id' => true,
        'discount_id' => true,
        'driver' => true,
        'travel' => true,
        'user' => true,
        'child_conversation' => true,
        'discount_ride' => true,
        'api_sync_queue2driver_conversations' => true,
        'archive_driver_traveler_conversations' => true,
        'archive_travels_conversations_meta' => true,
        'conversation_messages' => true,
        'testimonials' => true,
        'travels_conversations_meta' => true,
    ];
    
    
    public function _getIsExpired() {
        return $this->due_date->isPast();
    }
    
    public function _getUnreadMessagesCount() {
        $unreadCount = 0;
        if(isset($this->meta)) {
             if($this->meta->read_entry_count < $this->message_count) {
                 $unreadCount = $this->message_count - $this->meta->read_entry_count;
             }
        } else if($this->message_count > 0) {
            $unreadCount = $this->message_count;
        }
        
        return $unreadCount;
    }
    
    public function _getPrettyLocalizedDate() {
        // TODO:
        return $this->due_date;
    }
    
    public function _getFullIdentifier() {
        $identifier = $this->identifier;
        
        $hasTravelRequest = isset($this->travel) && $this->travel != null;
        if($hasTravelRequest) $identifier = $this->travel->id;
        
        return $this->notification_type.$identifier;
    }
}
