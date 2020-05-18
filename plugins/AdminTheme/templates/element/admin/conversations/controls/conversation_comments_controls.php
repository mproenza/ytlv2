
<?php 
$comments = '';
if(isset ($conversation->meta->comments)) $comments = $conversation->meta->comments;

$colorClass = 'text-muted';
$title = 'Adicionar un comentario';
if(!empty($comments)) {
    $colorClass = 'text-info';
    $title = '';
}
?>

<span id="comments-set-<?php echo $conversation->id?>" style="display: inline-block">
    <a href="#!" title="<?php echo $title?>" class="edit-comments-<?php echo $conversation->id?>" style="text-decoration: none"><span class="info" title="<?php echo $comments?>"><i class="glyphicon glyphicon-comment <?php echo $colorClass?>"></i></span></a>
</span>
<span id="comments-cancel-<?php echo $conversation->id?>" style="display:none">
    <a href="#!" class="cancel-edit-comments-<?php echo $conversation->id?>">&ndash; cancelar</a>
</span>
<div id='comments-form-<?php echo $conversation->id?>' style="display:none">
    <br/>
    <span class="bg-warning text-warning">Si ya hay comentarios, no borres los anteriores y agrega el tuyo debajo.</span>
    
    <div>
        <?php echo $this->Form->create(null, array('url' => array('controller' => 'conversations_meta', 'action' =>'update_meta_field', $conversation->id))); ?>
        <fieldset>
            <?php
            echo $this->Form->input('conversation_id', array('type'=>'hidden'));
            echo $this->Form->input('comments', array('type'=>'textarea', 'class'=>'input-sm', 'label'=>'Comentarios'));
            echo $this->Form->submit('Guardar Comentarios');
            ?>
        </fieldset>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

<script type="text/javascript">
    $('.edit-comments-<?php echo $conversation->id?>, .cancel-edit-comments-<?php echo $conversation->id?>').click(function() {
        $('#comments-form-<?php echo $conversation->id?>, #comments-set-<?php echo $conversation->id?>, #comments-cancel-<?php echo $conversation->id?>').toggle();
    });
</script>