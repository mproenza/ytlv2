<?php if($conversation->has_meta && $conversation->meta->arrangement != null):?>
<span class="alert alert-warning" style="display: inline-block; width: 100%">
    <p>
        <b>Este viaje fue <code>ACORDADO</code> con este chofer</b>
    </p>
    <hr/>
    <p><?php echo preg_replace("/(\r\n|\n|\r)/", "<br/>", $conversation->meta->arrangement);?></p>
</span>
<?php endif?>