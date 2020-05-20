<?php 
if(!isset($actions)) $actions = false;
if(!isset($details)) $details = true;

$travel_count = 0;
foreach ($users as $travels) {
    $travel_count += count($travels);
}
?>
<div class="container">
    <div class="row">
    <?php if(!empty ($users)): ?>
        <div class="col-md-8 col-md-offset-3">
            <h3>Solicitudes de Viajes (<?php echo $travel_count?>)</h3>
            
            <div>Páginas: <?php echo $this->Paginator->numbers();?></div>
            <br/>
            <?php echo $this->element('widget/widget_search_filters', array('filters' => App\Controller\TravelsController::SEARCH_FILTERS))?>
            
            <br/><br/><br/>

            <ul style="list-style-type: none;padding: 0px">
            <?php foreach ($users as $travels) :?>  
                <div style="position: absolute;left: -300px;float: left;max-width: 300px;word-wrap: break-word;padding: 20px">
                    <div style="margin-left: -20px;float: left"><i class="glyphicon glyphicon-user text-muted"></i></div>
                    <p><?php echo $travels[0]->user->username?></p>
                    <p><code><b><?php echo count($travels)?></b> solicitudes</code></p>
                </div>
                <li style="margin-bottom: 100px">
                    <?php 
                        if(count($travels) > 1)
                            echo '<hr/>'.$this->element('admin/travels/travels_from_user_carousel', array('travels'=>$travels, 'actions'=>$actions, 'details'=>$details));
                        else        
                            echo $this->element('admin/travels/travel', array('travel'=>$travels[0], 'actions'=>$actions, 'details'=>$details));
                    ?>
                </li> 
            <?php endforeach; ?>
            </ul>

            <br/>
                
            <div>Páginas: <?php echo $this->Paginator->numbers();?></div>
        </div>

    <?php else :?>
        No hay anuncios de viajes
    <?php endif; ?>

    </div>
</div>

<?php 
    $drivers_in = array();
    foreach($users as $user)
        foreach($user as $travel)
            foreach($travel->conversations as $conversation)
                $drivers_in[ $travel->id ][] = $conversation->driver_id;
    
    echo $this->element('js/scripts_notify_drivers', compact('drivers_in'));
?>