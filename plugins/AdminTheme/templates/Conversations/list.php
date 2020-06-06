<?php 
if(!isset($actions)) $actions = false;
if(!isset($details)) $details = true;
?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h3>Conversaciones (<?php echo count($conversations)?>)</h3>
            
            <div>Páginas: <?php echo $this->Paginator->numbers();?></div>
            <br/>
            <?php echo $this->element('widget/widget-search-filters', array('filters'=> App\Controller\ConversationsController::SEARCH_FILTERS))?>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <?php if(!empty ($conversations)): ?>
                <br/>
                <br/>
                
                <!-- SUMMARY -->
                <?php 
                $totalIncome = 0.00;
                $totalSavings = 0.00;
                foreach ($conversations as $conversation) {
                    if( $conversation->has_meta 
                        && $conversation->meta->state == \App\Model\Entity\Conversation::STATES['PAID']
                        && $conversation->meta->income != null
                        ) {
                        $totalIncome += $conversation->meta->income;
                        if($conversation->meta->income_saving != null) $totalSavings += $conversation->meta->income_saving;
                    }
                }
                ?>
                
                <?php if($totalIncome > 0):?>
                    <div>Resumen de esta página</div>
                    <big><big>
                        <span class="label label-success">
                            Ganancia Total: $<span id="income-total"><?php echo $totalIncome;?></span>
                        </span>
                        <span class="label label-default" style="margin-left:5px">
                            Ahorro Total: $<span id="income-save-total"><?php echo $totalSavings;?></span>
                        </span>
                    </big></big>
                    <br/>
                    <br/>
                <?php endif;?>

                <ul style="list-style-type: none;padding: 0px">
                <?php foreach ($conversations as $conversation) :?>
                    <li style="margin-bottom: 60px">
                        <?php echo $this->element('admin/conversations/conversation_card', array('conversation'=>$conversation));?>
                    </li> 
                <?php endforeach; ?>
                </ul>

                <br/>

            <?php else :?>
                No hay conversaciones
            <?php endif; ?>
                
            <div>Páginas: <?php echo $this->Paginator->numbers();?></div>
        </div>

    </div>
</div>

<!-- all .open-form opens in a bootbox -->
<?php
    $this->Html->css('vitalets-bootstrap-datepicker/datepicker.min', ['block'=>'css_top']);
    
    $this->Html->script('bootbox/bootbox', ['block'=>'script_internal']);
    $this->Html->script('vitalets-bootstrap-datepicker/bootstrap-datepicker.min', ['block'=>'script_internal']);

    //echo $this->Js->writeBuffer(array('inline' => true));
?>

<script type="text/javascript"> 
    $(document).ready(function(){
        $(".open-form").click(
            function (event){
                bootbox.dialog({title:$(this).data('title'), message:$( '#' + $(this).data('form') ).html()});
                event.preventDefault();
            }
        );
    });
</script>