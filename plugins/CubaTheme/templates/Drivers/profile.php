<?php 
use App\Model\Entity\Driver;
use Cake\Core\Configure;
?>

<?php 
$driver_name = $driverWithProfile->drivers_profile->driver_name;
$driver_short_name = Driver::shortenName($driver_name);
$driverIsActive = $driverWithProfile->active;

$queryParams = $this->request->getQueryParams();
?>

<!-- TESTIMONIOS -->
<?php
$testimonialsCount = $this->request->getAttribute('paging')['Testimonials']?$this->request->getAttribute('paging')['Testimonials']['count']: 0;
$hasTestimonials = $testimonialsCount > 0;
?>

<?php $talkingToDriver = false/*$this->Session->read('visited-driver-'.$driverWithProfile->id);*/?>

<section class="header3 cid-r6WgrSBMcu" id="header3-10">

    <div class="container">
        <div class="media-container-row">
            <div class="mbr-figure" style="width: 50%;">
                <img src="<?= $driverWithProfile->drivers_profile->featured_img_url?>" alt="<?= $driver_short_name?>" title="">
            </div>

            <div class="media-content">
                <h1 class="mbr-section-title mbr-white pb-3 mbr-fonts-style display-2">
                    <?= __d('driver_profile', 'Conoce a {0}', $driver_name)?></h1>
                
                <div class="mbr-section-text mbr-white pb-3 ">
                    <p class="mbr-text mbr-fonts-style display-5">
                        <?= __d('driver_profile', 'Chofer de taxi en {0}', $driverWithProfile->province->name)?>, Cuba</p>
                </div>
                <div class="mbr-section-btn">
                    <?php if($talkingToDriver):?>
                        <?= $this->Html->link('<span class="mbri-cust-feedback mbr-iconfont mbr-iconfont-btn"></span> '.__d('driver_profile', 'Ver mis mensajes con {0}', $driver_short_name), array('controller'=>'conversations', 'action'=>'messages', $talkingToDriver), array('escape'=>false, 'class'=>'btn btn-md btn-primary display-4'))?>
                    <?php else:?>
                        <a class="btn btn-md btn-secondary display-4" href="#<?= __d('default', 'solicitar')?>">
                            <span class="mbri-cust-feedback mbr-iconfont mbr-iconfont-btn"></span>
                            <?= __d('driver_profile', 'Recibir oferta de {0}', $driver_short_name)?>
                        </a>
                    <?php endif?>
                    
                    <?= $this->Html->link(__d('driver_profile', 'Opinar sobre {0}', $driver_short_name), array('controller' => 'testimonials', 'action'=>'enter_code'), array('escape'=>false, 'class'=>'btn btn-md btn-white-outline display-4'))?>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="features1 cid-r6WltItbex" id="features1-14">
    
    <div class="container">
        <div class="media-container-row">

            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-img pb-3">
                    <span class="mbr-iconfont mbri-pin"></span>
                </div>
                <div class="card-box">
                    <h4 class="card-title py-3 mbr-fonts-style display-5"><?= __d('driver_profile', 'Vive en {0}', $driverWithProfile->province->name)?></h4>
                    
                </div>
            </div>

            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-img pb-3">
                    <span class="mbr-iconfont mbri-delivery"></span>
                </div>
                <div class="card-box">
                    <h4 class="card-title py-3 mbr-fonts-style display-5">
                        <?= __d('driver_profile', 'Auto hasta {0} pax', $driverWithProfile->max_people_count)?>
                        <?php if($driverWithProfile->has_air_conditioner) echo '<br>'.__d('driver_profile', 'Aire acondicionado')?>
                    </h4>
                </div>
            </div>

            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-img pb-3">
                    <span class="mbr-iconfont mbri-like"></span>
                </div>
                <div class="card-box">
                    <h4 class="card-title py-3 mbr-fonts-style display-5"><?= __d('driver_profile', '{0} opiniones', $testimonialsCount)?></h4>
                </div>
            </div>

            

        </div>

    </div>

</section>

<?php $descFieldName = 'description_'.Configure::read('App.language')?>
<?php $desc = json_decode($driverWithProfile->drivers_profile->$descFieldName, true)?>
<?php if($desc != null):?>
<section class="mbr-gallery mbr-slider-carousel cid-r6WhQMK4gz" id="gallery1-11">
    <div class="container">
        <div><!-- Filter --><!-- Gallery -->
            <div class="mbr-gallery-row">
                <div class="mbr-gallery-layout-default">
                    <div>
                        <div>
                            <?php $i = 0?>
                            <?php foreach ($desc['pics'] as $pic):?>
                                <?php
                                $attr = '';
                                foreach ($pic as $prop=>$val) {
                                    $attr .= $prop.'="'.$val.'" ';
                                }
                                ?>
                                <div class="mbr-gallery-item mbr-gallery-item--p1" data-video-url="false" data-tags="Responsive">
                                    <div href="#lb-gallery1-11" data-slide-to="<?= $i?>" data-toggle="modal">
                                        <img <?= $attr?> >
                                        <span class="icon-focus"></span>
                                    </div>
                                </div>
                                <?php $i++?>
                            <?php endforeach?>
                            
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    
                </div>
                
            </div><!-- Lightbox -->
            <div data-app-prevent-settings="" class="mbr-slider modal fade carousel slide" tabindex="-1" data-keyboard="true" data-interval="false" id="lb-gallery1-11">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="carousel-inner">
                                <?php $i = 0?>
                                <?php foreach ($desc['pics'] as $pic):?>
                                    <?php
                                    $attr = '';
                                    foreach ($pic as $prop=>$val) {
                                        $attr .= $prop.'="'.$val.'" ';
                                    }
                                    ?>
                                    <div class="carousel-item <?php if($i == 0) echo 'active'?>">
                                        <img <?= $attr?> >
                                    </div>
                                    <?php $i++?>
                                <?php endforeach?>
                            </div>
                            <a class="carousel-control carousel-control-prev" role="button" data-slide="prev" href="#lb-gallery1-11">
                                <span class="mbri-left mbr-iconfont" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control carousel-control-next" role="button" data-slide="next" href="#lb-gallery1-11">
                                <span class="mbri-right mbr-iconfont" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            <a class="close" href="#" role="button" data-dismiss="modal">
                                <span class="sr-only">Close</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<?php else:?>
<section class="features1 cid-r6WltItbex">
    <div class="container">
        <div class="media-container-row">
            <?= $driverWithProfile->drivers_profile->$descFieldName?>
        </div>
    </div>
</section>
<?php endif?>

<?php if($hasTestimonials) echo $this->element('testimonials/ajax/ajax-testimonials-list', ['testimonials'=>$testimonials]); ?>

<?php if(!$talkingToDriver):?>
    
    <?php if(!$driverIsActive):?>
        <section class="mbr-section info1 cid-r6R9vBujqk" id="<?= __d('default', 'solicitar')?>" style="padding-top: 30px">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="alert alert-danger">
                        <?= __d('driver_profile', 'Este chofer no puede ser contactado pues no está activo en nuestra plataforma actualmente')?>
                    </div>
                </div>
            </div>
        </section>
    <?php else:?>
        <?php
        $formSectionTitle = __d('driver_profile', '¿Te interesa contratar un chofer privado en Cuba?');
        $formSectionSubtitle = __d('driver_profile', '<strong>Contacta a {0}</strong> y recibe una oferta directamente de él para el viaje que quieres hacer', $driver_short_name);

        $isShowingDiscount = isset($queryParams['discount']) && $queryParams['discount'] && $discount != null;

        if($isShowingDiscount) {
            $formSectionTitle = __d('cheap_taxi', '{0} ofrece:<br>Taxi privado <span style="display:inline-block">{0} > {0}</span><br>{0}', 
                    $driver_name, 
                    '<strong>'.$discount['DiscountRide']['origin'].'</strong>',
                    '<strong>'.$discount['DiscountRide']['destination'].'</strong>',
                    '<strong>'.$discount['DiscountRide']['price'].' cuc'.'</strong>');
            $formSectionSubtitle = __d('cheap_taxi', '<strong>Contacta a {0}</strong> y reserva este viaje para el próximo {0}', 
                    $driver_short_name,
                    '<span style="display:inline-block"><strong>'.TimeUtil::prettyDate($discount['DiscountRide']['date'],false).'</strong></span>');
        }
        ?>
        <section class="mbr-section form1 cid-r6WrVSFSDf" id="<?= __d('default', 'solicitar')?>">
            
            <div class="container">
                <div class="row justify-content-center content-row">
                    <div class="title col-12 col-lg-8">
                        <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-5">
                            <?= $formSectionTitle?></h2>
                        <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">
                            <?= $formSectionSubtitle?></h3>
                    </div>
                </div>
            </div>
            
            <div class="container">
                
                <?php if($isShowingDiscount): ?>
                    <?php $pickerdate = TimeUtil::dateFormatForPicker($discount['DiscountRide']['date']); echo "<script type='text/javascript'>var pickervalue='".$pickerdate."'; </script>"; ?>
                    <div class="row cid-rDj8V5iu3T justify-content-center" style="background-color: white;padding:0px">
                        <div class="plan col-md-4 justify-content-center favorite">
                            <?= $this->element('discounts/offer-info', compact('discount') + array('showButton'=>false))?>
                        </div>

                        <div class="col-12 d-md-none" style="height:50px"></div>
                        <div class="col-md-7 offset-md-1" id="<?= $discount['DiscountRide']['id']; ?>" data-form-type="formoid">
                            <?= $this->element('form/form-contact-driver', array('discount_id'=>$discount['DiscountRide']['id']))?>
                        </div>
                    </div>
                   <?php else: ?>
                    <div class="row justify-content-center">
                        <div class="media-container-column col-lg-8" data-form-type="formoid">
                            <?= $this->element('form/form-contact-driver')?>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
            
        </section>
    <?php endif; ?>
<?php else:?>
    <section class="mbr-section info1 cid-r6R9vBujqk" id="<?= __d('default', 'solicitar')?>" sstyle="padding-top: 100px">
        <div class="container">
            <hr class="line" style="width: 25%;">
            <div class="row justify-content-center content-row">
                <div class="media-container-column title col-12 col-lg-7 col-md-6">
                    <p class="mbr-section-subtitle align-left mbr-light pb-3 mbr-fonts-style display-5">
                        <?= __d('driver_profile', 'Ya tienes una conversación con {0}', $driver_short_name)?>
                    </p>
                </div>
                <div class="media-container-column col-12 col-lg-3 col-md-4">
                    <div class="mbr-section-btn align-right py-4">
                        <?= $this->Html->link('<span class="mbri-cust-feedback mbr-iconfont mbr-iconfont-btn"></span> '.__d('driver_profile', 'Ver mis mensajes con {0}', $driver_short_name), array('controller'=>'conversations', 'action'=>'messages', $talkingToDriver), array('escape'=>false, 'class'=>'btn btn-sm btn-primary display-4'))?>
                    </div>
                </div>
            </div>
            <hr class="line" style="width: 25%;">
        </div>
    </section>
<?php endif?>

<?php if($recommended_drivers->count() > 0): ?>
<section class="testimonials4 cid-rsmhu3OqyL">
    <div class="container">
        <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">
            <?= __d('driver_profile', 'Mira otros choferes de taxi en {0}', __($driverWithProfile->province->name))?>
        </h3> 
        <div class="row content-row">                    
            <?php 
            foreach($recommended_drivers as $driver) {                             
                echo $this->element('drivers/driver-card-tiny', ['driver'=>$driver]);
            }
            ?>
        </div>
    </div>
</section>
<?php endif;?>

<?= $this->element('general/share-page')?>