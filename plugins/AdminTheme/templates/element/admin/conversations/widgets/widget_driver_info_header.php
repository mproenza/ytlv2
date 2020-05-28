<?php
use App\Util\PathUtil;
use App\Model\Entity\Conversation;
use \App\Util\TimeUtil;

$driver = $conversation->driver;
$driverHasProfile = isset ($driver->profile) && $driver->profile != null;
?>
<div id="main-header" class="col-md-8 col-md-offset-2 col-xs-12 well">
    <div class="row" style="/*background-color: rgba(200, 219, 243, 0.6);*/ padding: 3px;">

        <div class="col-md-6 col-xs-12">
            <?php if($driverHasProfile):?><div style="float: left"><img src="<?= PathUtil::getFullPath($driver->profile->avatar_filepath)?>" style="max-height: 30px; max-width: 30px"/></div> <?php endif;?>
            <div style="float: left;padding-left: 10px"><h4><?= $this->Html->link($driver->name, ['controller'=>'drivers', 'action'=>'profile', $driver->profile->slug],array('target'=>'_blank', 'style'=>'color:inherit')); ?></h4></div>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="row">
                <div class="col-md-2">
                    <span><span class="text-muted">#</span><big><big><?= $conversation->full_identifier;?></big></big></span>
                </div>
                <div class="col-md-8">
                    <!-- SIGUIENDO -->
                    <?php if($conversation->meta->following):?> 
                         <small><span class="label label-info" style="margin-left:5px">Siguiendo</span></small>
                    <?php endif?> 
                    <!-- ESTADOS -->
                    <?php if($conversation->meta->state != Conversation::STATES['NONE']):?>

                        <?php if($conversation->meta->state == Conversation::STATES['DONE']):?>
                            <small><span class="label label-warning" style="margin-left:5px"><i class="glyphicon glyphicon-thumbs-up"></i> Realizado</span></small>
                        <?php elseif($conversation->meta->state == Conversation::STATES['PAID']):?>
                            <small><span class="label label-success" style="margin-left:5px"><i class="glyphicon glyphicon-usd"></i> Pagado</span></small>
                        <?php endif?>                        

                    <?php endif?>
                </div>
            </div>

            <br/>
            <?php if($conversation->notification_type == Conversation::NOTIFICATION_TYPES['DISCOUNT_OFFER_REQUEST']): ?>
                <div style="padding-top: 9px">&nbsp;<span class="label label-success"><i class="glyphicon glyphicon-gift"></i> Promo</span></div>
            <?php endif; ?>
            <?= TimeUtil::prettyDate($conversation->due_date) ?>

            <!--Control para el cambio de fecha-->
            <?php if($isUserLoggedIn && ($userRole == 'admin' || $userRole == 'operator')):?>
            <?= $this->element('form_travel_date_controls', array('travel'=>$data, 'keepOriginal'=>!$fechaCambiada, 'originalDate'=>strtotime($conversation->due_date)))?>
            <?php endif; ?>
        </div>

    </div>
</div>

<style>
#main-header {      
  transition: top 0.5s!important;
  display: block;
  background-color: white;
  position: fixed;
  z-index: 10;
  top: 45px
}
</style>