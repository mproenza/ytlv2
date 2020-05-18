<?php
$pretty_date = App\Util\TimeUtil::prettyDate($conversation->pretty_localized_date);
if($conversation->is_expired) $pretty_date .= ' <span class="badge">Expirado</span>';

$driver = $conversation->driver;
$driverHasProfile = isset ($driver->profile) && $driver->profile != null;
?>

<div>
    <h2>
        <?php 
        if($driverHasProfile) :?>
            <img src="<?= \App\Util\PathUtil::getFullPath($driver->profile->avatar_filepath)?>" class="info" title="<?= $driver->profile->driver_name?>" style="max-height: 40px; max-width: 40px"/>
        <?php endif;?>
        <span style="display: inline-block">
            <small>#<?= $conversation->full_identifier; ?></small>
            
            <?php $isFromTravelRequest = isset($conversation->travel) && $conversation->travel !== null;?>
            <?php if($isFromTravelRequest): ?>
                <?= $conversation->travel->origin_text. ' - '. $conversation->travel->destination_text; ?>
                <small><small>[<?= $conversation->travel->people_count?> viajeros]</small></small>
            <?php endif;?>
                
            <small><small><?= $conversation->user->username?></small></small>
        </span> 
    </h2>
</div>
<hr/>

<div>
    <?= $this->element('admin/conversations/conversation_link_with_metadata', array('conversation'=>$conversation))?>
</div>

<div style="padding-top: 5px"> <?= 'Fecha del Viaje: '.$pretty_date;?></div>

