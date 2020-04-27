<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Province Entity
 *
 * @property int $id
 * @property string $name
 *
 * @property \App\Model\Entity\Driver[] $drivers
 * @property \App\Model\Entity\Locality[] $localities
 */
class Province extends Entity
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
        'name' => true,
        'drivers' => true,
        'localities' => true,
    ];
    
    public static $provinces = array(
        1=>array('name'=>'Granma', 'slug'=>'granma', 'featured_activity'=>'Visita a la Sierra Maestra', 'airport'=>'Manzanillo'),
        2=>array('name'=>'Santiago de Cuba', 'slug'=>'santiago-de-cuba', 'featured_activity'=>'Traslado a Baracoa', 'airport'=>'Santiago de Cuba', 'alternative_province'=>4),
        4=>array('name'=>'Holguín', 'slug'=>'holguin-guardalavaca', 'featured_activity'=>'Traslado a Guardalavaca', 'airport'=>'Holguín', 'alternative_province'=>2),
        5=>array('name'=>'La Habana', 'slug'=>'la-habana', 'featured_activity'=>'Tour de un día a Viñales', 'airport'=>'La Habana'),
        6=>array('name'=>'Varadero, Matanzas', 'slug'=>'varadero-matanzas', 'featured_activity'=>'Visita de un día a La Habana', 'airport'=>'Varadero', 'alternative_province'=>5),
        7=>array('name'=>'Villa Clara', 'slug'=>'santa-clara-villa-clara', 'featured_activity'=>'Traslados en Santa Clara', 'airport'=>'Santa Clara'),
        8=>array('name'=>'Viñales, Pinar del Río', 'slug'=>'vinales-pinar-del-rio', 'featured_activity'=>'Traslado a La Habana', 'airport'=>false, 'alternative_province'=>5),
        9=>array('name'=>'Camaguey', 'slug'=>'camaguey', 'featured_activity'=>'Traslado a Trinidad', 'airport'=>'Camaguey'),
        10=>array('name'=>'Trinidad, Sancti Spíritus', 'slug'=>'trinidad-sancti-spiritus', 'featured_activity'=>'Visita a El Nicho', 'airport'=>false, 'alternative_province'=>11),
        11=>array('name'=>'Cienfuegos', 'slug'=>'cienfuegos', 'featured_activity'=>'Traslado a Trinidad', 'airport'=>false, 'alternative_province'=>10),
        12=>array('name'=>'Ciego de Ávila', 'slug'=>'cayo-coco-guillermo-ciego-de-avila', 'featured_activity'=>'Transfers desde/hasta Cayo Coco y Guillermo', 'airport'=>'Cayo Coco')
    );
    public static function _provinceFromSlug($slug) {
        // Sanity checks
        if($slug == null) return null;
        
        // Convertir slug a id
        $province = null;
        foreach (self::$provinces as $k=>$p) {
            if($p['slug'] == $slug) {
                $province = $p;
                $province['id'] = $k;
                break;
            }
        }
        
        return $province;
    }
    public static function _servicesDescription($provinceId) {
        $province = self::$provinces[$provinceId];
        
        $desc = __d('drivers_by_province', 'Taxi a tiempo completo').' - ';
        if($province['airport']) $desc .= __d('drivers_by_province', 'Recogida en aeropuerto de {0}', __($province['airport'])).' - ';
        $desc .= __d('drivers_by_province', __d('drivers_by_province', $province['featured_activity'])).' - ';
        $desc .= __d('drivers_by_province', 'Tour por toda Cuba').' - ';
        $desc .= __d('drivers_by_province', 'Traslados desde {0} a cualquier destino', __($province['name']));
        
        return $desc;
    }
}
