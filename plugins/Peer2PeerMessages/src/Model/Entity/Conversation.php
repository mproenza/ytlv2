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
    // Notifications Types (CUIDADO: NO CAMBIAR - Lo uso debajo en las cache_count del belongsTo(Travel))
    public static $NOTIFICATION_TYPE_AUTO = 'A'; // Para los choferes que se notifican al crearse el viaje
    public static $NOTIFICATION_TYPE_BY_ADMIN = 'M'; // Para los choferes que se notifican manualmente por un administrador
    //public static $NOTIFICATION_TYPE_BY_USER = 'U'; // Para los choferes que el viajero decide notificar adicionalmente (ej. si nosotros le damos la opción)
    public static $NOTIFICATION_TYPE_PREARRANGED = 'R'; // Para los viajes que se le notifiquen a los choferes y hayan sido prearreglados (ej. para hacer un descuento)
    public static $NOTIFICATION_TYPE_DIRECT_MESSAGE = 'D'; // Para las conversaciones directas (sin un viaje asociado)
    public static $NOTIFICATION_TYPE_DISCOUNT_OFFER_REQUEST = 'O'; // Para las ofertas de descuento
    
    
    // Filters
    public static $SEARCH_ALL = 'all';
    public static $SEARCH_NEW_MESSAGES = 'new-messages';
    public static $SEARCH_FOLLOWING = 'following';
    public static $SEARCH_DONE = 'done';
    public static $SEARCH_PAID = 'paid';
    public static $SEARCH_PINNED = 'pinned';
    public static $SEARCH_ARCHIVED = 'archived';
    public static $SEARCH_DIRECT_MESSAGES = 'direct-messages';
    public static $SEARCH_DISCOUNT_OFFER = 'discount-offers';
    public static $filtersForSearch = array(
        'all'=>array('label'=>'Todas', 'title'=>''), 
        'new-messages'=>array('label'=>'Nuevos Mensajes', 'title'=>''), 
        'following'=>array('label'=>'Siguiendo', 'title'=>''), 
        'done'=>array('label'=>'Realizados', 'title'=>''), 
        'paid'=>array('label'=>'Pagados', 'title'=>''), 
        'pinned'=>array('label'=>'<i class="glyphicon glyphicon-pushpin"></i> Pineados', 'title'=>'Viajes que llevan una atención urgente. Revísalos cuanto antes!!!'), 
        'archived'=>array('label'=>'Archivados', 'title'=>''),
        'direct-messages'=>array('label'=>'Mensajes Directos', 'title'=>''),
        'discount-offers'=>array('label'=>'Ofertas', 'title'=>''));
    
    
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
        //'driver_id' => true,
        'peer1_id' => true,
        
        //'user_id' => true,
        'peer2_id' => true,
        
        'notification_type' => true,
        
        //'last_driver_email' => true,
        
        'message_count' => true,
        'notified_by' => true,
        'created' => true,
        'identifier' => true,
        
        //'travel_date' => true,
        'due_date' => true,
        
        'original_date' => true,
        'original_due_date' => true,
        
        'child_conversation_id' => true,
        'discount_id' => true,
        
        'child_conversation' => true,
        'discount_ride' => true,
        'api_sync_queue2driver_conversations' => true,
        'archive_driver_traveler_conversations' => true,
        'archive_travels_conversations_meta' => true,
        'conversation_messages' => true,
        'driver' => true,
        'travel' => true,
        'user' => true,
        'testimonials' => true,
        'travels_conversations_meta' => true,
    ];
}
