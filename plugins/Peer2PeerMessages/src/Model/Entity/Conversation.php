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
    
}
