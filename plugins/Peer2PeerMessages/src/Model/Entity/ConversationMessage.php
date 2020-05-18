<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ConversationMessage Entity
 *
 * @property int $id
 * @property string $conversation_id
 * @property string $response_by
 * @property string $response_text
 * @property string|null $attachments_ids
 * @property string|null $msg_source
 * @property \Cake\I18n\FrozenTime $created
 * @property string|null $read_by
 * @property \Cake\I18n\FrozenTime|null $date_read
 *
 * @property \App\Model\Entity\Conversation $conversation
 */
class ConversationMessage extends Entity
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
        'conversation_id' => true,
        'response_by' => true,
        'response_text' => true,
        'attachments_ids' => true,
        'msg_source' => true,
        'created' => true,
        'read_by' => true,
        'date_read' => true,
        'conversation' => true,
    ];
}
