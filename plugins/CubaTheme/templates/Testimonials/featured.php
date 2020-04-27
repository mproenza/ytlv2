<?php 
use App\Util\LangUtil;
use Cake\Core\Configure;
?>

<?php $pageNumbers = substr($this->Paginator->numbers(['modulus'=>20]), 0, -1) // Quitarle el ultimo caracter?>

<section class="mbr-section content5 cid-r6TcRZEk3l mbr-parallax-background" id="content5-n">
    <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(35, 35, 35);">
    </div>

    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-1">
                    <br><?= __d('testimonials', 'Opiniones sobre choferes de taxi en Cuba')?></h2>
            </div>
        </div>
    </div>
</section>

<section class="counters1 counters cid-r78ZyzVth3" id="counters1-24">

    <div class="container">
        
        <h3 class="mbr-section-subtitle mbr-fonts-style display-5">
            <?= __d('testimonials', 'Desde Enero 2016, nuestros choferes han estado trabajando para lograr números como estos')?>
        </h3>

        <?php $stats = \App\Util\AppUtil::getVanityStats()?>
        <div class="container pt-4 mt-2">
            <div class="media-container-row">
                <div class="card p-3 align-center col-12 col-md-6 col-lg-4">
                    <div class="panel-item p-3">
                        <div class="card-img pb-3">
                            <span class="mbr-iconfont mbri-like"></span>
                        </div>

                        <div class="card-text">
                            <h3 class="count pt-3 pb-3 mbr-fonts-style display-5"><?= __d('testimonials', '{0} contrataciones', $stats['hires'])?></h3>
                            
                            <p class="mbr-content-text mbr-fonts-style display-7"><?= __d('testimonials', 'Nuestros choferes han sido contratados {0} veces. Un contrato puede ser una simple recogida en aeropuerto, hasta un viaje de más de tres semanas por toda la isla.', '<strong>'.$stats['hires'].'</strong>')?></p>
                        </div>
                    </div>
                </div>


                <div class="card p-3 align-center col-12 col-md-6 col-lg-4">
                    <div class="panel-item p-3">
                        <div class="card-img pb-3">
                            <span class="mbr-iconfont mbri-briefcase"></span>
                        </div>
                        <div class="card-text">
                            <h3 class="count pt-3 pb-3 mbr-fonts-style display-5"><?= __d('testimonials', '{0} viajeros', $stats['people'])?></h3>
                            
                            <p class="mbr-content-text mbr-fonts-style display-7"><?= __d('testimonials', 'Desde viajeros solitarios, hasta parejas de vacaciones, familias enteras, o grupos de más de 10 personas, {0} viajeros han ido de viaje con nuestros choferes hasta ahora.', '<strong>'.$stats['people'].'</strong>')?></p>
                        </div>
                    </div>
                </div>

                <div class="card p-3 align-center col-12 col-md-6 col-lg-4">
                    <div class="panel-item p-3">
                        <div class="card-img pb-3">
                            <span class="mbr-iconfont mbri-image-slider"></span>
                        </div>
                        <div class="card-text">
                            <h3 class="count pt-3 pb-3 mbr-fonts-style display-5"><?= __d('testimonials', '{0} opiniones', $stats['reviews'])?></h3>
                            
                            <p class="mbr-content-text mbr-fonts-style display-7">
                                    <?= __d('testimonials', 'Desde Diciembre 2016 comenzamos a recolectar opiniones, y {0} comentarios han sido escritos sobre nuestros choferes, muchos con fotos incluídas.', '<strong>'.$stats['reviews'].'</strong>')?></p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
   </div>
</section>

<section class="mbr-section article content9 cid-r6Tfi0B9Hg" id="content9-p">

    <div class="container">
        <div class="inner-container" style="width: 100%;">
            <hr class="line" style="width: 25%;">
            <div class="section-text align-center mbr-fonts-style display-5"><?= __d('testimonials', 'Estas son algunas opiniones, comentarios e historias de viajeros que han hecho recorridos y traslados con nuestros choferes. Lee algunas, inspírate y anímate a contratar a algún chofer con auto aquí en Cuba.')?></div>
            <hr class="line" style="width: 25%;">
        </div>
    </div>
</section>

<section class="mbr-section article content9 cid-r6Tfi0B9Hg">

    <div class="container">
        <div class="inner-container" style="width: 100%;">
            <div class="section-text align-center mbr-fonts-style display-5" style="margin-bottom:0px !important;padding-bottom:0px !important">
                <?= __d('testimonials', '{0} historias aquí... y hay más', count($testimonials))?>: 
                <span style="display: inline-block"><?= $pageNumbers?></span>
            </div>

            <?php 
            $currentLang = LangUtil::getLangSetup(Configure::read('App.language'));

            $proposeAltLang = 
                    !isset($this->request->getQueryParams()['also']) 
                    || Configure::read('App.language') == $this->request->getQueryParams()['also']
                    || !in_array($this->request->getQueryParams()['also'], array('en', 'es'));

            $query = null;
            if(isset($this->request->getQueryParams()['in'])) $query = '?in='.$this->request->getQueryParams()['in'];
            ?>    
            <?php if($proposeAltLang):?>
                <?php 
                $query = '?also='.$currentLang['alt'];
                if(isset($this->request->getQueryParams()['in'])) $query .= '&in='.$this->request->getQueryParams()['in'];
                ?>
                <div class="section-text align-center mbr-fonts-style display-4">
                    <span class="text-muted"><?= __d('testimonials', 'Descubre más choferes')?>:</span>
                    <span style="display: inline-block"><?= $this->Html->link(__d('testimonials', 'Mostrar también reseñas en {0}', $currentLang['altDesc']), $query)?></span>
                </div>
            <?php else:?>
                <?php 
                $query = '';
                if(isset($this->request->getQueryParams()['in'])) $query .= '?in='.$this->request->getQueryParams()['in'];
                ?>
                <div class="section-text align-center mbr-fonts-style display-4">
                    <span class="text-muted"><?= __d('testimonials', 'Se muestran reseñas en {0} e {1}', $currentLang['desc'], $currentLang['altDesc'])?></span>
                    - <span><?= $this->Html->link(__d('testimonials', 'Mostrar sólo en {0}', $currentLang['desc']), array('action'=>'featured'.$query) )?></span>
                </div>
            <?php endif?>
        </div>
    </div>
    
</section>


<?php foreach($testimonials as $i=>$t):?>
    <section class="testimonials3 cid-r6TeBtPTdm" id="testimonials3-o">
        <div class="container">
            <?= $this->element('testimonials/testimonial-full', 
                            array('testimonial'=>$t, 
                            'driver'=>$t->driver,
                            'driverReplies'=>$t->testimonials_replies,
                            'linkToProfile'=>true))?>
        </div>        
    </section>

    <!-- Poner el formulario de solicitud despues del nth testimonio -->
    <?php if($i == 4):?>
    <section class="mbr-section form1 cid-r6Ri3tnZFB" id="<?= __d('default', 'solicitar')?>">
        <div class="container">
            <div class="row justify-content-center">
                <div class="title col-12 col-lg-8">
                    <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2"><?= __d('testimonials', '¿Ya te gustan nuestros choferes?')?></h2>
                    <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">
                    <?= __d('testimonials', 'Solicita presupuesto para tu viaje a varios de ellos.')?>
                    <br><?= __d('homepage', 'Selecciona uno si así lo decides.')?></h3>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="media-container-column col-lg-8" data-form-type="formoid">
                    <?= $this->element('/form/travel-form')?>
                </div>
            </div>
        </div>
    </section>
    <?php endif?>


<?php endforeach;?>

<section class="mbr-section article content9 cid-r6Tfi0B9Hg">

    <div class="container">
        <div class="inner-container" style="width: 100%;">
            <div class="section-text align-center mbr-fonts-style display-5">
                <?= __d('testimonials', 'Mira más historias')?>: 
                <span style="display: inline-block"><?= $pageNumbers?></span>
            </div>
        </div>
    </div>
</section>

<?= $this->element('general/share-page')?>