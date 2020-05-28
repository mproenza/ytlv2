<?php 
use App\Model\Entity\Province;
?>
<div class="testimonials-item col-md-6 col-lg-4 col-sm-6 mt-5">
    <div style="background: #ffffff" class="pt-1 pb-3">
        <div class="col-lg-2 col-md-3">
            <div class="user_image" style="width: 150px;height: 150px;overflow: hidden;margin: 2rem auto 2rem auto;">
                <img src="<?php echo $driver->profile->featured_img_url?>" style="width: 100%;min-width: 100%;min-height: 100%;">
            </div>
        </div>
        <div class="testimonials-caption col-lg-10 col-md-9">
            <div class="user_text ">
                <p class="mbr-fonts-style  display-7">
                    <strong><?php echo $driver->profile->driver_name?></strong>
                    <br><br>
                    <?php echo __d('drivers_by_province', 'Vive en {0}', Province::$provinces[$driver->province_id]['name'])?>
                    <br>
                    <?php echo __d('drivers_by_province', 'Capacidad')?>: <strong><?php echo $driver->max_people_count?> pax</strong> 

                    <?php if($driver->has_air_conditioner):?>
                        <br>
                        <b><?php echo __d('drivers_by_province', 'Aire acondicionado')?></b>
                    <?php endif?>      
                    

                    <br>
                    <?php echo __d('drivers_by_province', '{0} contratos', $driver->travel_count)?>, <?php echo __d('drivers_by_province', '{0} clientes', $driver->total_travelers)?><br>
                </p>
            </div>

            <div class="user_desk mbr-light mbr-fonts-style align-left pt-2 display-7">
                <?php echo $this->Html->link(__d('drivers_by_province', 'Ver perfil'), array('controller'=>'drivers', 'action'=>'profile', $driver->profile->slug), array('class'=>'btn-sm btn-success'))?>
            </div>
        </div>
    </div>
</div>