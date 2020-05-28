<?php
declare(strict_types=1);

namespace App\Model\Entity;
use Cake\Core\Configure;
use DateTime;

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
    
    public function _getDaysCreated() {
        $now = new DateTime(date('Y-m-d', time()));
        return $now->diff($this->created, true)->format('%a');
    }
    
    public function _getPrettyText() {
        $text = strip_tags(trim($this->response_text)); 
        
        $text = preg_replace("/\d+\.*\d*\s*(\r\n|\n|\r)*cuc*/i", "<b>$0</b>", $text);
        $text = preg_replace("/\d+\.*\d*\s*(\r\n|\n|\r)*(kms*|kilometros*|kilómetros*)/i", '<span style="color:tomato"><b>$0</b></span>', $text);
        $text = preg_replace("/(\r\n|\n|\r)/", "<br/>", $text);
        
        return $text;
    }
    
    public static function prettyText($text) {
        $text = strip_tags(trim($text));
        $text = preg_replace("/\d+\.*\d*\s*(\r\n|\n|\r)*cuc*/i", "<b>$0</b>", $text);
        $text = preg_replace("/\d+\.*\d*\s*(\r\n|\n|\r)*(kms*|kilometros*|kilómetros*)/i", '<span style="color:tomato"><b>$0</b></span>', $text);
        $text = preg_replace("/(\r\n|\n|\r)/", "<br/>", $text);
        
        return $text;
    }
    
    public function _getStrippedTextData() {
        $text = strip_tags(trim($this->response_text));
        
        $shortText = $text;
        $msgWasShortened = false;
        
        if($this->msg_source === 'EML' || $this->msg_source == null) { // ONLY STRIP FOR MESSAGES COMING FROM EMAIL
            foreach(Configure::read('Custom.Email.email_message_separator_stripped') as $separator) {
            if(strpos($text, $separator)) {
                $shortText = substr($text, 0, strpos($text, $separator));
                $msgWasShortened = true;
                }
            }
        }
        
        return ['was_shortened' => $msgWasShortened, 'text'=> $shortText];
    }
}
