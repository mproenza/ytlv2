<?php 
use App\Model\Entity\Conversation;
use Cake\Routing\Router;
?>

<?php 
$is_done = !$conversation->has_meta || $conversation->meta->state != Conversation::STATES['NONE'];

$following = $conversation->has_meta && $conversation->meta->following;
$asked_confirmation = $conversation->has_meta && $conversation->meta->asked_confirmation;

$hasMessages = $conversation->messages != null && count($conversation->messages) > 0;
if($hasMessages) {
    $lastMessage = $conversation->messages[count($conversation->messages) - 1];
    $daysLastMessage = $lastMessage->daysCreated;
}
?>

<div id='conversation-alerts'>
    <?php if(!$conversation->is_expired && $following && CakeTime::isWithinNext('2 weeks',  strtotime($travelDate))):?>
        <?php if($hasMessages && $daysLastMessage > 15):?>
            <span class="alert alert-warning" style="display: inline-block; width: 100%"><i class="glyphicon glyphicon-warning-sign"></i> No hay mensajes nuevos <span class="badge">hace <?php echo $daysLastMessage?> días</span> y el viaje es <span class="label label-success">dentro de <?php echo $conversation->days_to_go?> días</span>. <b>Toma las precauciones necesarias!</b></span>
        <?php else: ?>
            <span class="alert alert-info" style="display: inline-block; width: 100%"><i class="glyphicon glyphicon-exclamation-sign"></i> Este viaje debe comenzar <span class="label label-success">dentro de <?php echo $conversation->days_to_go?> días</span>. <b>Verifica que todo esté listo!</b></span>
        <?php endif?>
    <?php endif?>
</div>

<?php if(($conversation->is_expired && $following) || $asked_confirmation):?>
<div id="travel-verification">
    
        
    <?php $showWarning = $conversation->is_expired && $following && !$asked_confirmation && !$is_done; ?>
    <span class="alert alert-warning verification-ajax-toggle" style="display: <?php echo ($showWarning) ? 'inline-block' : 'none'; ?>; width: 100%">
        <p>
            <b>Este viaje se está <span class="label label-info">Siguiendo</span> y está <span class="badge">expirado o realizándose hace <?php echo $conversation->days_expired?> días</span></b>
        </p>
        <hr/>
        <p><b>No se ha enviado el pedido de confirmación del viaje al chofer</b></p>

        <p>Realiza las siguientes acciones para verificar que el viaje realmente pudo haberse realizado:</p>
        <ul>
            <li>Verifica que la fecha de expiración es correcta y que realmente expiró el viaje.</li>
            <li>Verifica que el chofer y el viajero se pusieron de acuerdo y hubo alguna forma de que se hayan encontrado.</li>
        </ul>
        <p>Si crees que debes verificar este viaje, da click en el siguiente botón.</p>
        <br/>

        <?php echo $this->Form->button('<i class="glyphicon glyphicon-share-alt"></i> Enviar correo de verificación al chofer', array(
            'controller' => 'driver_traveler_conversations', 'action' => 'ask_confirmation_to_driver', $conversation->id,
            'class'=>'btn-info btn-block',
            'escape'=>false,
            'data-dtype' => 'text',
            'data-url' => Router::url(array('controller' => 'conversations', 'action' => 'ask_confirmation_to_driver', $conversation->id), true),
            'id' => 'verification-ajax-btn'
            ), true);
        ?>
    </span>
        
    <?php if($asked_confirmation):?>
        
        <?php if($conversation->has_meta && $conversation->meta->received_confirmation_type != null):?> <!-- Confirmacion recibida -->
            <span class="alert alert-warning" style="display: inline-block; width: 100%">
                <i class="glyphicon glyphicon-envelope"></i> Confirmación de viaje recibida:
                <br/>
                <br/>
                <div class="well"><?php echo preg_replace("/(\r\n|\n|\r)/", "<br/>", strip_tags($conversation->meta->received_confirmation_details));?></div>
            </span>
        <?php endif?>
        
    <?php endif; ?>        

    <?php $showMessage = $asked_confirmation && (!$conversation->has_meta || $conversation->meta->received_confirmation_type === null) && !$is_done; ?>
    <span class="alert alert-warning verification-ajax-toggle" style="display: <?php echo ($showMessage) ? 'inline-block' : 'none'; ?>; width: 100%">
        <i class="glyphicon glyphicon-share-alt"></i> Pedido de confirmación del viaje enviado al chofer. Esperando respuesta...
    </span>
                
    
</div>
<?php endif?>

<?php
    echo $this->Html->script('ajaxify/buttons', array('inline' => false));
    echo $this->Html->script('jquery', array('inline' => false));
?>

<script type="text/javascript">    
    ajaxifyButton( 
        $('#verification-ajax-btn'), 
        function(response){ $('.verification-ajax-toggle').toggle(); }, //success
        function(error){ alert(error.responseText); },                 //error
        '¿Está seguro que desea enviar un correo de verificación de este viaje al chofer?'
    );
</script>