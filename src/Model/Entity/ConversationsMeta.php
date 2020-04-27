<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ConversationsMetum Entity
 *
 * @property string $conversation_id
 * @property bool $following
 * @property string|null $flag_type
 * @property string|null $flag_comment
 * @property string $state
 * @property int $read_entry_count
 * @property string|null $income
 * @property string|null $income_saving
 * @property string|null $comments
 * @property string|null $arrangement
 * @property bool $asked_confirmation
 * @property string|null $received_confirmation_type
 * @property string|null $received_confirmation_details
 * @property bool|null $archived
 * @property bool $testimonial_requested
 * @property string|null $testimonial_id
 *
 * @property \App\Model\Entity\Testimonial $testimonial
 */
class ConversationsMeta extends Entity
{
    public static $SERVICE_STATE_NONE = 'N';
    public static $SERVICE_STATE_DONE = 'D';
    public static $SERVICE_STATE_NOT_DONE = 'X';
    public static $SERVICE_STATE_PAID = 'P';
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
        'following' => true,
        'flag_type' => true,
        'flag_comment' => true,
        'state' => true,
        'read_entry_count' => true,
        'income' => true,
        'income_saving' => true,
        'comments' => true,
        'arrangement' => true,
        'asked_confirmation' => true,
        'received_confirmation_type' => true,
        'received_confirmation_details' => true,
        'archived' => true,
        'testimonial_requested' => true,
        'testimonial_id' => true,
        'testimonial' => true,
    ];
}
