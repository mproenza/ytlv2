<div>
    <span class="bg-warning">¿Qué pasa con este viaje? ¿Hay problemas? ¿Te parece importante? Escribe en los comentarios cualquier nota que te permita saber por qué pineaste esta conversación.</span>
    <?php echo $this->Form->create(null, array('url' => array('controller' => 'conversations', 'action' =>'pin/'.$data->id))); ?>
    <fieldset>
        <?php
        //echo $this->Form->input('conversation_id', array('type'=>'hidden'));
        echo $this->Form->input('flag_comment', array('type'=>'textarea', 'label'=>'Comentarios','value'=>$data->meta->flag_comment));
        echo $this->Form->submit('Pinear conversación con estos comentarios');
        ?>
    </fieldset>
    <?php echo $this->Form->end(); ?>
</div>