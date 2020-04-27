<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Testimonial Entity
 *
 * @property string $id
 * @property string $author
 * @property string|null $country
 * @property string $text
 * @property string $state
 * @property string $lang
 * @property string $image_filepath
 * @property string|null $conversation_id
 * @property int $driver_id
 * @property string|null $email
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $validation_token
 * @property string|null $driver_reply_token
 * @property bool $validated
 * @property bool $featured
 * @property bool $use_as_sample
 *
 * @property \App\Model\Entity\Conversation $conversation
 * @property \App\Model\Entity\Driver $driver
 * @property \App\Model\Entity\ConversationsMetum[] $conversations_meta
 * @property \App\Model\Entity\TestimonialsReply[] $testimonials_replies
 */
class Testimonial extends Entity
{
    public static $basicContain = ['Drivers', 'Drivers.DriversProfiles', 'Conversations', 'TestimonialsReplies'];
    
    public static $langs = array('es', 'en');
    public static $states = array('L' => 'all', 'P' => 'pending', 'A' => 'approved', 'R' => 'rejected');
    public static $statesValues = array('all' => 'L', 'pending' => 'P', 'approved' => 'A', 'rejected' => 'R');
    
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
        'author' => true,
        'country' => true,
        'text' => true,
        'state' => true,
        'lang' => true,
        'image_filepath' => true,
        'conversation_id' => true,
        'driver_id' => true,
        'email' => true,
        'created' => true,
        'modified' => true,
        'validation_token' => true,
        'driver_reply_token' => true,
        'validated' => true,
        'featured' => true,
        'use_as_sample' => true,
        'conversation' => true,
        'driver' => true,
        'conversations_meta' => true,
        'testimonials_replies' => true,
    ];
}
