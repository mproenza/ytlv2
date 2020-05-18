<?php
if(!isset ($modal)) $modal = true; // Esto es para hacer que el formulario se comporte de forma modal o no
?>

<span id="ganancias-<?php echo $conversation['id']?>">
    <!-- GANANCIAS -->
    <?php if($conversation->meta->income != null && $conversation->meta->income != 0):?>
        <span class="label label-success info" title="Ganancia total"><i class="glyphicon glyphicon-usd"></i><?php echo $conversation->meta->income?></span>
    <?php endif?>
    <?php if($conversation->meta->income_saving != null && $conversation->meta->income_saving != 0):?>
        <span class="label label-default info" title="Ahorro"><i class="glyphicon glyphicon-usd"></i><?php echo $conversation->meta->income_saving?></span>
    <?php endif?>
</span>

<!-- TODO: Poner ganancias solo los super administradores -->
<?php //if(AuthComponent::user('username') == 'mproenza@grm.desoft.cu' || AuthComponent::user('username') == 'martin@yotellevocuba.com'):?>
    <span id="income-set-<?php echo $conversation['id']?>" style="display: inline-block">
        <a href="#!" class="open-form edit-income-<?php echo $conversation['id']?>" data-form="income-form-<?php echo $conversation['id']?>">&ndash; <?php echo __('ganancia')?></a>
    </span>
    <span id="income-cancel-<?php echo $conversation['id']?>" style="display:none">
        <a href="#!" class="cancel-edit-income-<?php echo $conversation['id']?>">&ndash; <?php echo __('cancelar')?></a>
    </span>
    <div id='income-form-<?php echo $conversation['id']?>' style="display:none">
        <br/>
        <?php echo $this->element('admin/conversations/controls/conversation_income_form', array('conversation' => $conversation)); ?>
    </div>

    <?php if(!$modal):?> <!-- Inline form -->
        <script type="text/javascript">
            $('.edit-income-<?php echo $conversation['id']?>, .cancel-edit-income-<?php echo $conversation['id']?>').click(function() {
                $('#income-form-<?php echo $conversation['id']?>, #income-set-<?php echo $conversation['id']?>, #income-cancel-<?php echo $conversation['id']?>').toggle();
            });
        </script>
    <?php endif?>
<?php //endif?>