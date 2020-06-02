<?php
use App\Model\Entity\Testimonial;
?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>Testimonios (<?php echo count($testimonials)?>)</h3>

            <b>Páginas: </b><div class="paginator">
                <ul class="pagination">
                     <?= $this->Paginator->numbers() ?>
                </ul>

            </div>
            <br/>
            <?php echo $this->element('admin/testimonials/addon_filters_for_search', array('filters_for_search'=>Testimonial::$states))?>

            <!-- Resumen de cantidad de testimonios por choferes -->
            <div>
                <b>Resumen de esta página</b><hr/>
                <?php
                $results = array();
                foreach($testimonials as $data) {
                    if(!array_key_exists($data['driver']['id'], $results)) {
                        $subject = $data['driver']['id'];
                        $count = 0;
                        foreach($testimonials as $again) {
                            if($again['driver']['id'] == $subject) $count ++;
                        }
                        $results[$subject] = array(
                            'driver_name' => $data['driver']['profile']['driver_name'],
                            'driver_nick' => $data['driver']['profile']['slug'],
                            'driver_avatar' => \App\Util\PathUtil::getFullPath($data['driver']['profile']['avatar_path']),
                            'testimonials_count'=>$count);
                    }

                }

                ?>

                <ul class="list-inline">
                <?php foreach($results as $r):?>
                    <li style="text-align: center"><img src="<?php echo \App\Util\PathUtil::getFullPath($r['driver_avatar'])?>" title="<?php echo $r['driver_name']?>" class="info img-responsive" style="max-width: 40px "/>
                    <big><b><?php echo $this->Html->link($r['testimonials_count'], array('controller'=>'drivers', 'action'=>'profile/'.$r['driver_nick']), array('target'=>'_blank'))?></b></big></li>
                <?php endforeach?>
                </ul>
                <hr/>
            </div>


            <?php if(!empty ($testimonials)): ?>
                <br/>
                <br/>
                <!-- body -->
                <?php
                   foreach($testimonials as $data){
                    //print_r($data); die();
                      $pass = array('testimonial' => $data, 'driver' => $data['driver']);
                      //if( isset($data['driver']['profile']['avatar_path']) )
                         $pass = array_merge($pass, array('driver_profile' => $data['driver']['profile']));

                      if( isset($data['driverTravel']['Travel']) )
                         $pass = array_merge($pass, array('travel' => $data['driverTravel']['Travel'], 'user' => $data['driverTravel']['Travel']['User']));

                      echo $this->element('admin/testimonials/testimonial_index', $pass);
                      echo '<br/><hr/>';
                   }
                ?>

        <?php else :?>
            No hay testimonios
        <?php endif; ?>
            <b>Páginas: </b><div class="paginator">
                <ul class="pagination">
                  <?= $this->Paginator->numbers() ?>
                </ul>

            </div>
        </div>

    </div>
</div>
