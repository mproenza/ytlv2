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
  
  <title><?php echo $meta['title']." | YoTeLlevo" ?></title>
  <meta name="description" content="<?php echo $meta['description']?>"/>
  
  <!-- TWITTER SHARE -->   
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php echo substr($meta['title'], 0, 70)?>">
  <meta name="twitter:description" content="<?php echo $meta['description']?>">
  <meta name="twitter:site" content="@yotellevocuba">
  <meta name="twitter:creator" content="@yotellevocuba">
  <meta name="twitter:image:src" content="/assets/images/1525113306-ismel-kimara-jpg-2000x1333.jpg">
  
  <!-- FACEBOOK SHARE -->        
  <meta property="og:title" content="<?php echo substr($meta['title'], 0, 90)?>">
  <meta property="og:image" content="/assets/images/1525113306-ismel-kimara-jpg-2000x1333.jpg">
  <meta property="og:description" content="<?php echo $meta['description']?>">
      
<?php
// CSS
echo $this->Html->css ('web/assets/mobirise-icons/mobirise-icons', array('inline' => false));

echo $this->Html->css  ('tether/tether.min', array('inline' => false));

echo $this->Html->css ('bootstrap/css/bootstrap.min', array('inline' => false));
echo $this->Html->css ('bootstrap/css/bootstrap-grid.min', array('inline' => false));
echo $this->Html->css ('bootstrap/css/bootstrap-reboot.min', array('inline' => false));

echo $this->Html->css ('dropdown/css/style', array('inline' => false));    
echo $this->Html->css ('socicon/css/styles', array('inline' => false));
echo $this->Html->css ('theme/css/style', array('inline' => false));

echo $this->Html->css ('mobirise/css/mbr-additional', array('inline' => false));

echo $this->Html->css ('font-awesome/css/font-awesome.min', array('inline' => false));
?>
  
<?php
// CSS
echo $this->Html->css ('datepicker/css/datepicker', array('inline' => false));
echo $this->Html->css ('typeaheadjs/css/typeahead.js-bootstrap', array('inline' => false));
echo $this->Html->css ('jasny/css/jasny-bootstrap.min');

echo $this->fetch('css');
?>
      
</head>
<body>

<?php echo $this->element('general/ribbon')?>
    
<?php echo $this->element('general/menu')?>

<?php echo $this->fetch('content')?>
<?php echo $this->element('addon/pickocar-popup')?>

<?php echo $this->element('general/footer1')?>

<?php
echo $this->Html->script ('web/assets/jquery/jquery.min', array('inline' => false));
echo $this->Html->script ('popper/popper.min', array('inline' => false));
echo $this->Html->script ('tether/tether.min', array('inline' => false));

echo $this->Html->script ('bootstrap/js/bootstrap.min', array('inline' => false));
//echo $this->Html->script ('dropdown/js/nav-dropdown', array('inline' => false));
//echo $this->Html->script ('dropdown/js/navbar-dropdown', array('inline' => false));
echo $this->Html->script ('dropdown/js/script.min', array('inline' => false));
echo $this->Html->script ('touchswipe/jquery.touch-swipe.min', array('inline' => false));
echo $this->Html->script ('bootstrapcarouselswipe/bootstrap-carousel-swipe', array('inline' => false));
echo $this->Html->script ('mbr-clients-slider/mbr-clients-slider', array('inline' => false));
echo $this->Html->script ('sociallikes/social-likes', array('inline' => false));
echo $this->Html->script ('parallax/jarallax.min', array('inline' => false));
echo $this->Html->script ('theme/js/script', array('inline' => false));
?>

<?php

echo $this->Html->script ('datepicker/js/datepicker', array('inline' => false));

echo $this->Html->script ('jquery-validation-1.10.0/dist/jquery.validate.min', array('inline' => false));
if(Configure::read('App.language') != 'en') echo $this->Html->script('jquery-validation-1.10.0/localization/messages_'.Configure::read('App.language'), array('inline' => false));

echo $this->Html->script ('typeaheadjs/js/typeahead-martin', array('inline' => false));

echo $this->Html->script ('jasny/js/jasny-bootstrap.min');

?>
    
<?= $this->fetch('script');?>
<?= $this->fetch('script_bottom');?>
<?= $this->fetch('script_internal');?>

<script type="text/javascript">
    
    $(document).ready(function() { 
        
        /*Checkbox personalized and check event*/
        /*$('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-green',
        }).on('ifChanged', function(){
        });
        
        $('#sample_input').awesomeCropper(
        { width: 100, height: 100, debug: true }
        );*/
        
        /*Popover de picko linker */
        picko = $('.picko-linker');
        if(picko !== null) {
            setTimeout(function(){       
                picko.css("visibility","visible");        
            }, 45000);
            picko.find('.dismiss').click(function () {       
                picko.animate({opacity:'hide', heigh:'hide'},'slow');        
            });
        }
        
        $('.datepicker').datepicker({
            format: "dd/mm/yyyy",
            language: '<?php echo Configure::read('Config.language')?>',
            startDate: 'today',
            todayBtn: "linked",
            autoclose: true,
            todayHighlight: true
        });
        
        $('#TravelForm').validate({
            wrapper: 'div',
            errorClass: 'text-danger',
            errorElement: 'div'
        });  
        
        
        $('#TravelForm').submit(function() {
            if (!$(this).valid()) return false;

            //$('#TravelForm :input').prop('disabled', true);
            //$('#TravelFormDiv').prop('disabled', true);

            $('#TravelSubmit').attr('disabled', true);
            $('#TravelSubmit').val('<?php echo __d('mobirise/default', 'Espera')?> ...');
        });
    })
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('input.locality-typeahead').typeahead({
            valueKey: 'name',
            local: <?= json_encode(App\Model\Table\LocalitiesTable::getAsSuggestions())?>,
            limit: 20
        })/*.on('typeahead:selected', function(event, datum) {            
        });*/
        
        $('input.tt-hint').addClass('form-control');
        $('.twitter-typeahead').css('display', 'block');
    });

</script>

<script type="text/javascript">
    //<![CDATA[
    function get_form( element )
    {
        while( element )
        {
            element = element.parentNode
            if( element.tagName.toLowerCase() == "form" ) {
                return element
            }
        }
        return 0; //error: no form found in ancestors
    }
    //]]>
</script>

<?php if( ROOT != 'C:\xampp-new\htdocs\yotellevo' && (!$isUserLoggedIn || $userRole === 'regular') ):?>
<!-- Google Analytics -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-60694533-1', 'auto');
    ga('send', 'pageview');
</script>
<?php endif;?>


</body>
</html>