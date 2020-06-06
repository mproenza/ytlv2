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
            <?php echo $this->element('widget/widget-search-filters', array('filters'=>Testimonial::$states))?>

            <!-- Resumen de cantidad de testimonios por choferes -->
            <div>
                <b>Resumen de esta página</b><hr/>
                <?= $this->element('admin/testimonials/addons/addon-counter-testimonials-drivers', ['testimonials'=>$testimonials])?>
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

                      echo $this->element('admin/testimonials/testimonial-admin-widget', $pass);
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
