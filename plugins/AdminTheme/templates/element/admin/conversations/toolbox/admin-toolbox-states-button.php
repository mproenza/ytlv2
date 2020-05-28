<?php
use App\Model\Entity\Conversation;
use Cake\Routing\Router;
?>

<?php
$btnType = 'default';
if($conversation->meta->state == Conversation::STATES['DONE']) $btnType = 'warning';
else if($conversation->meta->state == Conversation::STATES['PAID']) $btnType = 'success';
?>
<div class="btn-group">
    <div class="input-group">
        <span class="input-group-btn">
            <button type="button" class="btn btn-<?php echo $btnType?> dropleft-toggle" data-toggle="dropdown">
                <?php 
                if ($conversation->meta->state == Conversation::STATES['NONE']) echo 'Ninguno';
                elseif ($conversation->meta->state == Conversation::STATES['DONE']) echo '<i class="glyphicon glyphicon-thumbs-up"></i> Realizado';
                elseif ($conversation->meta->state == Conversation::STATES['PAID']) echo '<i class="glyphicon glyphicon-usd"></i> Pagado';
                ?>
                <span class="caret"></span>
            </button>
            <div class="dropdown-menu">
                <?php if($conversation->meta->state != Conversation::STATES['NONE']):?>
                    <div><?php echo $this->Form->button('Ninguno', array('class'=>'btn btn-default states-btn', 'data-url' => Router::url(array('action' => 'set_state', $conversation->id, Conversation::STATES['NONE']), true)), true);?></div>
                <?php endif?>

                <?php if($conversation->meta->state != Conversation::STATES['DONE']):?>
                    <div><?php echo $this->Form->button('<i class="glyphicon glyphicon-thumbs-up"></i> Realizado', array('class'=>'btn btn-warning states-btn', 'data-url' => Router::url(array('action' => 'set_state', $conversation->id, Conversation::STATES['DONE']), true), 'escape'=>false), true);?></div>
                <?php endif?>

                <?php if($conversation->meta->state != Conversation::STATES['PAID']):?>
                    <div><?php echo $this->Form->button('<i class="glyphicon glyphicon-usd"></i> Pagado', array('class'=>'btn btn-success states-btn', 'data-url' => Router::url(array('action' => 'set_state', $conversation->id, Conversation::STATES['PAID']), true), 'escape'=>false), true);?></div>
                <?php endif?>
            </div>
        </span>
        <span class="input-group-addon">Estado</span>
    </div>
</div> 

<!-- INCOME CONTROLS -->
<?php
if($conversation->meta->state == Conversation::STATES['PAID']) {
    echo $this->element('travel_income_controls', array('thread'=>$conversation, 'conversation'=>$data, 'modal'=>true));
}
?>

<?php
    echo $this->Html->script('jquery', array('inline' => false));
    echo $this->Html->script('ajaxify/buttons');
?>

<script type="text/javascript">
    function statesSuccess(response){
        var states = $("#states").html(response.conversation_toolbox_states);
        $("#travel_verification_div").html(response.addon_travel_verification).find('button').addClass('btn btn-info btn-block');
        $("#testimonial_request_div").html(response.addon_testimonial_request);
        
        if(response.state == '<?php echo Conversation::STATES['PAID']; ?>'){
            states.find(".open-form").click(openForm);
            states.find('#income-form-<?php echo $conversation->id; ?> input[type="text"]').addClass('form-control');
            states.find('#income-form-<?php echo $conversation->id; ?> input[type="submit"]').addClass('btn btn-primary btn-block');
            states.find('#income-form-<?php echo $conversation->id; ?> fieldset div').addClass('form-group');
        }    
    }
    
    function statesError(error){
        alert(error.responseText);
    }
    
    ajaxifyButton($('.states-btn'), statesSuccess, statesError);
 </script>