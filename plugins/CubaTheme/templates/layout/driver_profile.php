<?php use Cake\Core\Configure;?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">
<head>

    <!-- Site made with Mobirise Website Builder v4.8.6, https://mobirise.com -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v4.8.6, mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
        
    <link rel="shortcut icon" href="/assets/images/favicon.png" type="image/x-icon">

    <?= $this->Html->metaCanonical($this->request);?>
        
    <?php if(is_callable($meta['title'])) $meta['title'] = $meta['title']($this->viewVars, $this->request);?>
    <?php if(is_callable($meta['description'])) $meta['description'] = $meta['description']($this->viewVars, $this->request);?>

    <?php
    $title = $meta['title'];
    $description = $meta['description'];
    ?>
    <title><?= $title . ' | YoTeLlevo' ?></title>
    <meta name="description" content="<?= $description ?>"/>

    <!-- SOCIAL SHARE -->
    <?php
    $socialTitle = $title;
    $socialDescription = $description;
    $socialImageUrl = $driverWithProfile->drivers_profile->featured_img_url;
    ?>
    
    <?php
    $isShowingReview = isset($this->request->getQueryParams()['see-review']) && $this->request->getQueryParams()['see-review'];
    $isShowingDiscountOffer = isset($discount);
    ?>
    <?php if($isShowingDiscountOffer):?>
        <?php
        $socialTitle = __d('cheap_taxi', 'Taxi privado %s > %s por %s. Oferta de taxi económico en Cuba.', 
                $discount['DiscountRide']['origin'], 
                $discount['DiscountRide']['destination'],
                '$'.$discount['DiscountRide']['price']);
        $socialDescription = __d('cheap_taxi', '%s oferta taxi privado %s > %s por %s el próximo %s. Mira los detalles de esta oferta económica en su perfil.',
                $profile['DriverProfile']['driver_name'],
                $discount['DiscountRide']['origin'], 
                $discount['DiscountRide']['destination'],
                '$'.$discount['DiscountRide']['price'],
                TimeUtil::prettyDateShort($discount['DiscountRide']['date'], false));
        ?>
    <?php ?>
    <?php elseif($isShowingReview):?>
        <?php
        $socialTitle = __d('testimonials', 'Testimonio de %s sobre su chofer en Cuba, %s', $highlighted['Testimonial']['author'], $profile['DriverProfile']['driver_name']);
        $socialDescription = $highlighted['Testimonial']['text'];
        
        if ($highlighted['Testimonial']['image_filepath']) $socialImageUrl = PathUtil::getFullPath($highlighted['Testimonial']['image_filepath']);
        else if ($profile['DriverProfile']['featured_img_url']) $socialImageUrl = $profile['DriverProfile']['featured_img_url'];
        else $socialImageUrl = PathUtil::getFullPath($profile['DriverProfile']['avatar_filepath']);
        ?>
    <?php endif?>
    
    <?php
    $urlParams = \App\Util\LangUtil::getUrlParamsForLanguage(\Cake\Core\Configure::read('App.language'), $this->request);
    $urlParams['_full'] = true;
    ?>
    
    <!-- FACEBOOK SHARE -->  
    <meta property="og:title" content="<?= substr($socialTitle, 0, 120)?>">
    <meta property="og:description" content="<?= substr($socialDescription, 0, 300)?>">
    <meta property="og:image" content="<?= $socialImageUrl?>">
    <meta property="og:url" content="<?= \Cake\Routing\Router::url($urlParams) ?>" />
    
    <!-- TWITTER SHARE -->   
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= substr($socialTitle, 0, 70)?>">
    <meta name="twitter:description" content="<?= substr($socialDescription, 0, 200)?>">
    <meta name="twitter:site" content="@yotellevocuba">
    <meta name="twitter:creator" content="@yotellevocuba">
    <meta name="twitter:image:src" content="<?= $socialImageUrl?>">
    
    <?php
    // CSS
    echo $this->Html->css('web/assets/mobirise-icons/mobirise-icons', array('inline' => false));
    echo $this->Html->css('tether/tether.min', array('inline' => false));
    echo $this->Html->css('bootstrap/css/bootstrap.min', array('inline' => false));
    echo $this->Html->css('bootstrap/css/bootstrap-grid.min', array('inline' => false));
    echo $this->Html->css('bootstrap/css/bootstrap-reboot.min', array('inline' => false));
    echo $this->Html->css('dropdown/css/style', array('inline' => false));
    echo $this->Html->css('socicon/css/styles', array('inline' => false));
    echo $this->Html->css('theme/css/style', array('inline' => false));
    echo $this->Html->css('gallery/style', array('inline' => false));
    echo $this->Html->css('mobirise/css/mbr-additional', array('inline' => false));

    echo $this->fetch('css');
    ?>

    <?php
    // CSS
    echo $this->Html->css('datepicker/css/datepicker', array('inline' => false));
    //echo $this->Html->css('typeaheadjs/css/typeahead.js-bootstrap', array('inline' => false));
    echo $this->Html->css('font-awesome/css/font-awesome.min', array('inline' => false));

    echo $this->fetch('css');
    ?>

    <?php
    // Hay que cargar JQuery aqui arriba porque el ajax-load de los testimonios lo necesita
    echo $this->Html->script('web/assets/jquery/jquery.min', array('inline' => false));
    echo $this->fetch('script');
    ?>

</head>

<body>
    <?= $this->element('general/ribbon')?>
    
    <?= $this->element('general/menu', ['cta'=>__d('driver_profile', 'Contactar a {0}', $driverWithProfile->drivers_profile->driver_name)]) ?>

    <?= $this->fetch('content') ?>

    <?= $this->element('general/footer1') ?>

    <?php
    // echo $this->Html->script('web/assets/jquery/jquery.min', array('inline' => false)); // Ya JQuery esta cargado arriba
    echo $this->Html->script('popper/popper.min', array('inline' => false));
    echo $this->Html->script('tether/tether.min', array('inline' => false));
    echo $this->Html->script('bootstrap/js/bootstrap.min', array('inline' => false));
    //echo $this->Html->script('smoothscroll/smooth-scroll', array('inline' => false));
    echo $this->Html->script('dropdown/js/script.min', array('inline' => false));
    echo $this->Html->script('touchswipe/jquery.touch-swipe.min', array('inline' => false));
    echo $this->Html->script('masonry/masonry.pkgd.min', array('inline' => false));
    echo $this->Html->script('imagesloaded/imagesloaded.pkgd.min', array('inline' => false));
    echo $this->Html->script('bootstrapcarouselswipe/bootstrap-carousel-swipe', array('inline' => false));
    //echo $this->Html->script('vimeoplayer/jquery.mb.vimeo_player', array('inline' => false));
    echo $this->Html->script('sociallikes/social-likes', array('inline' => false));
    echo $this->Html->script('theme/js/script', array('inline' => false));
    echo $this->Html->script('slidervideo/script', array('inline' => false));
    echo $this->Html->script('gallery/player.min', array('inline' => false));
    echo $this->Html->script('gallery/script', array('inline' => false));
    echo $this->Html->script('theme/js/script', array('inline' => false));
    //echo $this->Html->script('formoid/formoid.min', array('inline' => false));
    ?>

    <?php

    echo $this->Html->script('datepicker/js/datepicker', array('inline' => false));

    echo $this->Html->script('jquery-validation-1.10.0/dist/jquery.validate.min', array('inline' => false));
    if(Configure::read('App.language') != 'en') echo $this->Html->script('jquery-validation-1.10.0/localization/messages_'.Configure::read('App.language'), array('inline' => false));

    echo $this->fetch('script');

    ?>

    <script type="text/javascript">
        $(document).ready(function () {            
            $('.datepicker').datepicker({
                format: "dd/mm/yyyy",
                language: "<?= Configure::read('App.language')?>",
                startDate: "today",
                todayBtn: "linked",
                autoclose: true,
                todayHighlight: true,
               
            });
      <?php if($isShowingDiscountOffer): ?>
            $('.datepicker').datepicker('setDate',pickervalue);
            goTo('<?= __d('default', 'solicitar')?>', 500, 20);
            $("#DriverTravelerConversationResponseText").focus();
      <?php endif; ?>      

            $('#CDirectForm').validate({
                wrapper: 'div',
                errorClass: 'text-danger',
                errorElement: 'div'
            });


            $('#CDirectForm').submit(function () {
                if (!$(this).valid())
                    return false;

                //$('#TravelForm :input').prop('disabled', true);
                //$('#TravelFormDiv').prop('disabled', true);

                $('#CDirectSubmit').attr('disabled', true);
                $('#CDirectSubmit').val('<?= __d('default', 'Espera')?> ...');
            });
        })
    </script>

    <script type="text/javascript">
        //<![CDATA[
        function get_form(element)
        {
            while (element)
            {
                element = element.parentNode
                if (element.tagName.toLowerCase() == "form") {
                    return element
                }
            }
            return 0; //error: no form found in ancestors
        }
        //]]>
    </script>
    
    <!--Getting a given review for highlight :) -->
    <script type="text/javascript">
        function goTo(id, time, offset) {
            $('html, body').animate({
                scrollTop: $('#' + id).offset().top + offset
            }, time);
        };

    <?php if($this->request->getQueryParams()['see-review']): ?>

        $(document).ready(function () {
            goTo('<?= $this->request->getQueryParams()['see-review']?>', 500, -70);
        });
    <?php endif; ?>

    </script>
    
    <?php if( ROOT != 'C:\xampp-new\htdocs\yotellevo' && (!$isUserLoggedIn || $userRole === 'regular') ):?>
        <!-- Google Analytics -->
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-60694533-1', 'auto');
            ga('send', 'pageview');
        </script>
    <?php endif;?>
</body>
    
</html>