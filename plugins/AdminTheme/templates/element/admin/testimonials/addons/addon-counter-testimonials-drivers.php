<?php
$results = [];
foreach($testimonials as $t) {
    if(!array_key_exists($t->driver->id, $results)) {
        $subject = $t->driver->id;
        $count = 0;
        foreach($testimonials as $again) {
            if($again->driver->id == $subject) $count ++;
        }
        $results[$subject] = array(
            'driver_name' => $t->driver->profile->driver_name,
            'driver_nick' => $t->driver->profile->slug,
            'driver_avatar' => \App\Util\PathUtil::getFullPath($t->driver->profile->avatar_path),
            'testimonials_count'=>$count);
    }
}
?>
<ul class="list-inline">
<?php foreach($results as $r):?>
    <li style="text-align: center"><img src="<?php echo \App\Util\PathUtil::getFullPath($r['driver_avatar'])?>" title="<?php echo $r['driver_name']?>" class="info img-responsive" style="max-width: 40px "/>
    <big><b><?php echo $this->Html->link($r['testimonials_count'], array('controller'=>'drivers', 'action'=>'profile', $r['driver_nick']), array('target'=>'_blank'))?></b></big></li>
<?php endforeach?>
</ul>
<hr/>