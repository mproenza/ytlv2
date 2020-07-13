<?php
use App\Model\Entity\Conversation;

?>

<style>
 /*
 *
 *	 This is style for skin config
 *	 Used in lateral menu
 *
*/

    /*.theme-config  a {
            color: #0c0b0b!important;
        }*/

    .theme-config {
        position: fixed;
        top: 110px;
        right: 0; 
        overflow: hidden;
        z-index: 40;
        padding-bottom: 80px;
    }
    .theme-config-box {
        margin-right: -220px;
        position: relative;        
        transition-duration: 0.4s;

    }
    .theme-config-box.show {
        margin-right: 0;
    }
    .spin-icon {
        /*background:#06f;*/
        position: absolute;
        padding: 3px;
        padding-right: 20px;
        /*border-radius: 20px 0 0 20px;*/
        font-size: 20px;
        top: 150px;
        left: 0;	
        /*color: #fff;*/
        cursor: pointer;
        /*opacity: .8;*/
        /*height: 35px;*/
    }
    .skin-settings {
        width: 220px;
        margin-left: 43px;
        background-color: rgba(200, 219, 243, 0.6);
        /*box-shadow:  5px 1px 1px 2px rgba(0, 0, 0, 0.4);*/
        border-radius: 0 0 0 10px;
    }
    .setings-item {
        padding: 10px 30px;
    }
    .setings-item.skin {
        text-align: center;
    }
    .setings-item .switch {
        float: right;
    }
    .skin-name a {
        text-transform: uppercase;
    }
    /*.setings-item a {
            color: #fff;
    }*/

	    
       
   

/*Ocultar el panel superior*/
    #main-header {      
      transition: top 0.5s!important;
      display: block;
      background-color: white;
      position: fixed;
      z-index: 10;
      top: 45px
           
   }
</style>

<?php $fechaCambiada = isset ($conversation->original_date) && $conversation->original_date != null;?>
        
<div class="row">
    <?= $this->element('admin/conversations/widgets/widget_driver_info_header')?>
</div>
<div class="theme-config">
    <div class="theme-config-box">
        <div class="spin-icon alert alert-info">
            <i id="box-menu" class="glyphicon glyphicon-chevron-left pull-left"></i>
        </div>
        <div class="skin-settings">            
            <div class="well">
                   <?= $this->element('admin/conversations/toolbox/admin-toolbox')?>
            </div>
        </div>
    </div>
</div>  

<!-- VIAJES Y CONTROLES -->
<div class="row" style="margin-top: 110px">
    <div class="col-md-6 col-md-offset-3">
        <?php
            if($conversation->notification_type == Conversation::NOTIFICATION_TYPES['DIRECT_MESSAGE'])
                echo $this->element('direct_message', array('data'=>$conversation, 'show_header' => false, 'show_perfil' => false));
            else if($conversation->notification_type == Conversation::NOTIFICATION_TYPES['DISCOUNT_OFFER_REQUEST'])
                echo $this->element('discount_travel', array('travel'=>$data, 'details'=>false, 'actions'=>false, 'changeDate'=>false));  
            else
                echo $this->element('admin/travels/travel', array('travel'=>$conversation->travel, 'details'=>false, 'showConversations'=>false, 'actions'=>false, 'changeDate'=>true));
        ?>
        <!--<div>
            <?php //$this->element('conversation_controls', array('data'=>$data))?>
        </div>-->
    </div>
</div>

<div class="col-md-6 col-md-offset-3"><?= $this->element('admin/conversations/controls/addons/addon_travel_arrangement');?></div>
<div class="col-md-6 col-md-offset-3" id="travel_verification_div"><?= $this->element('admin/conversations/controls/addons/addon_travel_verification');?></div>
<div class="col-md-6 col-md-offset-3" id="testimonial_request_div"><?= $this->element('admin/conversations/controls/addons/addon_testimonial_request');?></div>
<div class="col-md-6 col-md-offset-3"><?= $this->element('admin/conversations/controls/addons/addon_shared_ride_offer');?></div>

<br/>
<br/>

<!-- MENSAJES -->
<?php if(empty ($conversation->messages)):?><div class="row"><div class="col-md-6 col-md-offset-3">No hay conversaciones hasta el momento</div></div>
<?php else:?>
    <?php foreach ($conversation->messages as $message):?>
    <div class="row container-fluid">
        <div class="col-md-9 col-md-offset-1">
            <?= $this->element('admin/conversations/widgets/widget_message', array('message'=>$message))?>
        </div>
        <br/>
    </div>
    <?php endforeach;?>
<?php endif?>

<script type="text/javascript">
    /************** Logica para ocultar el panel superior****************/
    var prevscroll=window.pageYOffset;
        // on scroll, let the interval function know the user has scrolled
        $(window).scroll(function(event){
            var current = window.pageYOffset;
            
            if(prevscroll > current)
                document.getElementById("main-header").style.top="45px";
            else
                document.getElementById("main-header").style.top="-150px";
           
           prevscroll = current;
        });
    /************** FIN Logica para ocultar el panel superior****************/
	
	// SKIN Select
    $('.spin-icon').click(function () {		
        $(".theme-config-box").toggleClass("show");
        if ($("#box-menu").hasClass('glyphicon glyphicon-chevron-left'))
            $("#box-menu").attr('class', 'glyphicon glyphicon-chevron-right');
        else
            $("#box-menu").attr('class', 'glyphicon glyphicon-chevron-left');
    });

    
</script>

