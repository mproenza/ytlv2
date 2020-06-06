<?php
if($conversation->is_expired) $conversation->pretty_date .= ' <span class="badge">Expirado</span>';

$driver = $conversation->driver;
$driverHasProfile = isset ($driver->profile) && $driver->profile != null;
?>

<div>
    <h2>
        <?php 
        if($driverHasProfile) :?>
            <img src="<?= \App\Util\PathUtil::getFullPath($driver->profile->avatar_path)?>" style="max-height: 40px; max-width: 40px"/>
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

<div style="padding-top: 5px"> <?= 'Fecha del Viaje: '.$conversation->pretty_date;?></div>

