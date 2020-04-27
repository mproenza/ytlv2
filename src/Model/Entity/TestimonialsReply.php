<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TestimonialsReply Entity
 *
 * @property int $id
 * @property string $testimonial_id
 * @property string $reply_text
 * @property string $reply_by
 * @property string $state
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\Testimonial $testimonial
 */
class TestimonialsReply extends Entity
{
    public static $langs = array('es', 'en');
    public static $filters = array('L' => 'all', 'P' => 'pending', 'A' => 'approved', 'R' => 'rejected');
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
        'testimonial_id' => true,
        'reply_text' => true,
        'reply_by' => true,
        'state' => true,
        'created' => true,
        'testimonial' => true,
    ];
}
