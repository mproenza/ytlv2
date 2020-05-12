<?php 
use App\Model\Entity\Conversation;
?>

<?php 
if(!isset($showComments)) $showComments = true;

$hasMetadata = isset ($conversation->meta) && $conversation->meta != null;
?>

<?php
$info = array('class'=>'info');
if(isset ($conversation->driver)) $info['title'] = $conversation->driver->name;
if($conversation->notification_type == Conversation::NOTIFICATION_TYPES['BY_ADMIN']) $info['class'] .= ' text-muted';
if($conversation->notification_type == Conversation::NOTIFICATION_TYPES['BY_ADMIN_WITH_NOTE']) $info['class'] .= ' text-success';
?>

<?= $conversation->driver->name.': '.$this->Html->link($conversation->id, array('controller'=>'conversations', 'action'=>'view', $conversation->id), $info);?>

<?php $badgesMargin = -30; $badgesSpacing = 25;?>
<?php if($hasMetadata):?>

    <!-- VERIFICACION DE VIAJE -->
    <?php if($conversation->meta->received_confirmation_type != null):?>
        <!-- Verificacion recibida --> 
        <small>
            <span title='<b>Confirmación de Viaje:</b><br/><?= preg_replace("/(\r\n|\n|\r)/", "<br/>", strip_tags($conversation->meta->received_confirmation_details));?>' class="label label-info info" data-trigger="click" style="float:left;margin-left: <?= $badgesMargin; $badgesMargin-=$badgesSpacing?>px;">
                <a href="#!">
                    <i class="glyphicon glyphicon-envelope"></i>
                </a>
            </span>
        </small>
        
    <!-- Pedido de confirmacion enviado al chofer --> 
    <?php elseif($hasMetadata && $conversation->meta->asked_confirmation):?>
           
        <small>
            <span class="label label-default info" style="float:left;margin-left: <?= $badgesMargin; $badgesMargin-=$badgesSpacing?>px;" title="Pedido de confirmación del viaje enviado al chofer">
                <i class="glyphicon glyphicon-share-alt"></i>
            </span>
        </small>
    <?php endif?>
    
    <!-- TESTIMONIAL -->
    <?php if($conversation->meta->testimonial_id):?> 
        <small>
            <span class="label info" style="float:left;margin-left: <?= $badgesMargin; $badgesMargin-=$badgesSpacing?>px;" title="Ver testimonio recibido">                
                <a target="_blank" href="<?= $this->Html->url(array('controller' => 'testimonials', 'action' => 'admin', $conversation->meta->testimonial_id))?>"><big><i style="color: red !important" class="glyphicon glyphicon-heart"></i></big></a>
            </span>
        </small>    
    <?php elseif($conversation->meta->testimonial_requested):?> 
        <small>
            <span class="label label-default info" style="float:left;margin-left: <?= $badgesMargin; $badgesMargin-=$badgesSpacing?>px;" title="Solicitud de testimonio enviada al viajero">
                <i class="glyphicon glyphicon-heart-empty"></i>
            </span>
        </small>
    <?php endif?>
    
    <!-- PINNED -->
    <?php if($conversation->meta->flag_type):?>
        <small>
            <span class="label label-warning info" style="float:left;margin-left: <?= $badgesMargin; $badgesMargin-=$badgesSpacing?>px;" title="<b>Comentario Pin:</b><br/><?= preg_replace("/(\r\n|\n|\r)/", "<br/>", $conversation->meta->flag_comment);?>">
                <i class="glyphicon glyphicon-pushpin"></i>
            </span>
        </small>
    <?php endif?>
        
    <!-- ARCHIVADO -->
    <?php if(isset ($conversation->meta->archived)):?>
        
        
        <div style="float:right;padding-right: 10px">
            <?php if($conversation->meta->archived):?>
                <?= $this->Html->link('<i class="glyphicon glyphicon-export"></i>', array('controller'=>'conversations', 'action'=>'unarchive', $thread->id), array('escape'=>false, 'title'=>'Sacar del archivo', 'class'=>'info'))?>
            <?php endif?>

            <?php if(!$conversation->meta->archived && 
                        ( 
                            (isset ($conversation['Travel']) && TimeUtil::wasBefore('60 days', strtotime($travelDate)))
                        ||
                            (isset ($conversation['Travel']) && $conversation->meta->state == DriverTravelerConversation::$STATE_TRAVEL_DONE && TimeUtil::wasBefore('15 days', strtotime($travelDate)))
                        ) 
                    ):?>
                <?= $this->Html->link('<i class="glyphicon glyphicon-import"></i>', array('controller'=>'driver_traveler_conversations', 'action'=>'archive', $thread->id), array('escape'=>false, 'title'=>'Archivar este viaje', 'class'=>'info text-danger'))?>
            <?php endif?>
        </div>
    <?php endif?>

<?php endif?>
    
<!-- NOTIFIED BY -->
<?php if(isset($thread->notified_by) /*&& isset($userRole) && $userRole == 'admin'*/ && $thread->notified_by != null):?>
    <small>    
        <span class="info" style="float:left;margin-left: <?= $badgesMargin - strlen($thread->notified_by)*5; $badgesMargin-=$badgesSpacing?>px;" title="Notificado por <?= $thread->notified_by;if($thread->created != null) echo '<br/> el '.TimeUtil::prettyDate($thread->created, false)?>">
            <code><?= $thread->notified_by?></code>
        </span>
    </small>
<?php endif?>

<!-- COMMENTS -->
<?php if($showComments):?>
<div style="float:right;padding-right: 10px">
    <?= $this->element('admin/conversations/controls/conversation_comments_controls', array('conversation'=>$conversation)); ?>
    &nbsp;
</div>
<?php endif?>

<!-- ARRANGEMENTS -->
<?php if(isset ($conversation->meta->arrangement) && !empty($conversation->meta->arrangement)):?>
<div style="float:right;padding-right: 10px">
    <span class="info" title="<b>Acuerdo:</b> <?= $conversation->meta->arrangement?>"><i class="glyphicon glyphicon-link"></i></span>
</div>
<?php endif?>

<!-- CANTIDAD TOTAL DE MENSAJES -->
<?php
if($conversation->message_count > 0): // Respondido ?>
     <small><span class="label label-primary info" title="<?= $conversation->message_count?> mensajes en total"><?= $conversation->message_count;?></span></small>
<?php endif?>
     
<!-- MENSAJES SIN LEER -->
<?php if($conversation->unread_messages_count > 0):?>
    <small>
        <span class="label label-success info" title="<?= $conversation->unread_messages_count?> nuevos mensajes">
            +<?= $conversation->unread_messages_count?>
        </span>
    </small>
<?php endif?>

<!-- METADATOS -->
<?php if($hasMetadata):?>
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
            <?= $this->element('admin/conversations/controls/conversation_income_controls', array('conversation'=>$conversation));?>
        <?php endif?>
    <?php endif?>
<?php endif?>