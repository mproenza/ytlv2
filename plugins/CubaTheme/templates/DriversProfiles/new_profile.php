<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DriversProfile $driversProfile
 */
?>
<style>


.nav-tabs > li.active > a,
.nav-tabs > li.active > a:hover,
.nav-tabs > li.active > a:focus {
	-moz-border-bottom-colors: none;
	-moz-border-left-colors: none;
	-moz-border-right-colors: none;
	-moz-border-top-colors: none;
	border-color: #dddddd #dddddd rgba(0, 0, 0, 0);
	border-bottom: #f3f3f4;
	border-image: none;
	border-style: solid;
	border-width: 1px;
	color: #555555;
	cursor: default;
}

.nav-tabs > li .nav-item{	
	color: #555555;
	cursor: default;
}



/* Tabs */
.tabs-container .panel-body {
	background: #fff;
	border: 1px solid #e7eaec;
	border-radius: 2px;
	padding: 20px;
	position: relative;
}

.tabs-container .nav-tabs > li {
	float: left;
	margin-bottom: -1px;
}
.tabs-container .tab-pane .panel-body {
	border-top: none;
}

.tabs-container .nav-tabs {
	border-bottom: 1px solid #e7eaec;
}
.tabs-container .tab-pane .panel-body {
	border-top: none;
}
.tabs-container .tabs-left .tab-pane .panel-body,
.tabs-container .tabs-right .tab-pane .panel-body {
	border-top: 1px solid #e7eaec;
}
.tabs-container .nav-tabs > li a:hover {
	background: #f3f3f4;
	border-color: transparent;
}
.tabs-container .tabs-below > .nav-tabs,
.tabs-container .tabs-right > .nav-tabs,
.tabs-container .tabs-left > .nav-tabs {
	border-bottom: 0;
}
.tabs-container .tabs-left .panel-body {
	position: static;
}
.tabs-container .tabs-left > .nav-tabs,
.tabs-container .tabs-right > .nav-tabs {
	width: 20%;
}
.tabs-container .tabs-left .panel-body {
	width: 80%;
	margin-left: 20%;
}
.tabs-container .tabs-right .panel-body {
	width: 80%;
	margin-right: 20%;
}
.tabs-container .tab-content > .tab-pane,
.tabs-container .pill-content > .pill-pane {
	display: none;
}
.tabs-container .tab-content > .active,
.tabs-container .pill-content > .active {
	display: block;
}
.tabs-container .tabs-below > .nav-tabs {
	border-top: 1px solid #e7eaec;
}
.tabs-container .tabs-below > .nav-tabs > li {
	margin-top: -1px;
	margin-bottom: 0;
}
.tabs-container .tabs-below > .nav-tabs > li > a {
	-webkit-border-radius: 0 0 4px 4px;
	-moz-border-radius: 0 0 4px 4px;
	border-radius: 0 0 4px 4px;
}
.tabs-container .tabs-below > .nav-tabs > li > a:hover,
.tabs-container .tabs-below > .nav-tabs > li > a:focus {
	border-top-color: #e7eaec;
	border-bottom-color: transparent;
}
.tabs-container .tabs-left > .nav-tabs > li,
.tabs-container .tabs-right > .nav-tabs > li {
	float: none;
}
.tabs-container .tabs-left > .nav-tabs > li > a,
.tabs-container .tabs-right > .nav-tabs > li > a {
	min-width: 74px;
	margin-right: 0;
	margin-bottom: 3px;
}
.tabs-container .tabs-left > .nav-tabs {
	float: left;
	margin-right: 19px;
}
.tabs-container .tabs-left > .nav-tabs > li > a {
	margin-right: -1px;
	-webkit-border-radius: 4px 0 0 4px;
	-moz-border-radius: 4px 0 0 4px;
	border-radius: 4px 0 0 4px;
}
.tabs-container .tabs-left > .nav-tabs .active > a,
.tabs-container .tabs-left > .nav-tabs .active > a:hover,
.tabs-container .tabs-left > .nav-tabs .active > a:focus {
	border-color: #e7eaec transparent #e7eaec #e7eaec;
}
.tabs-container .tabs-right > .nav-tabs {
	float: right;
	margin-left: 19px;
}
.tabs-container .tabs-right > .nav-tabs > li > a {
	margin-left: -1px;
	-webkit-border-radius: 0 4px 4px 0;
	-moz-border-radius: 0 4px 4px 0;
	border-radius: 0 4px 4px 0;
}
.tabs-container .tabs-right > .nav-tabs .active > a,
.tabs-container .tabs-right > .nav-tabs .active > a:hover,
.tabs-container .tabs-right > .nav-tabs .active > a:focus {
	border-color: #e7eaec #e7eaec #e7eaec transparent;
	z-index: 1;
}
@media (max-width: 767px) {
	.tabs-container .nav-tabs > li {
		float: none !important;
	}
	
}





</style>
<div style="background-color: graytext">
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><div class="col-md-10 offset-3"><legend style="color: white!important"><u><b><?= __('DATOS DEL NUEVO CHOFER') ?></b></u></legend></div></p>
<div class="container">
<div class="row"> 
    
    <div class="col-lg-10">
                    <div class="tabs-container">
                        <?= $this->Form->create($driversProfile) ?>
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab-3" aria-expanded="true"> <i class="fa fa-user"></i></a></li>
                            <li class="nav-item"><a id="images-tab" class="nav-link" data-toggle="tab" href="#tab-4" aria-expanded="false"><i class="fa fa-image"></i></a></li>                            
                        </ul>
                        <div class="tab-content">
                            
                            
                            <div id="tab-3" class="tab-pane active">
                                <div class="panel-body">
                                     
                                    <div class="column-responsive column-80">
                                        <div class="driversProfiles form content">                


                                                    <?php
                                                    echo $this->Form->control('id', array('type'=>'hidden'));
                                                    ?>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <?php echo $this->Form->control('username', array('type'=>'text', 'label' => 'Correo','class'=>'form-control')); ?>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <?php echo $this->Form->control('password', array('label'=>'Contraseña', 'placeholder'=>'Contraseña de acceso', 'required'=>true,'class'=>'form-control')); ?>
                                                                </div>
                                                            </div> 
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                   <?php echo $this->Form->control('full_name', array('type'=>'text', 'label' => 'Nombre completo','class'=>'form-control')); ?>
                                                                </div>
                                                                <div class="col-md-6">
                                                                   <?php echo $this->Form->control('province_id', array('type' => 'select', 'options' => $provinces, 'label' => 'Provincia donde vive')); ?>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <?php echo $this->Form->control('about', array('label' => 'Descripción (Resumen Bio para los clientes)','class'=>'form-control','type'=>'textarea')); ?>                        
                                                                </div>
                                                                <div class="col-md-6">  
                                                                    <table>
                                                                        <tr><td colspan="2"><?php echo $this->Form->control('car_model', array('type'=>'text', 'label' => 'Marca y modelo auto','class'=>'form-control')); ?></td></tr>               
                                                                        <tr>
                                                                            <td style="margin-left:3px"><?php echo $this->Form->control('min_people_count', array('default' => 1, 'min' => 1, 'label' => 'Cap. mínima','class'=>'form-control')); ?></td>       
                                                                            <td style="margin-right:2px"> <?php echo $this->Form->control('max_people_count', array('default' => 4, 'min' => 1, 'label' => 'Cap. máxima','class'=>'form-control')); ?></td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="conainer" style="border: solid 2px #F9F2F4; margin-top: 3px; padding: 5px; border-radius: 5px">
                                                                <div class="row">
                                                                    <div class="col-md-3">                            
                                                                        <?php echo $this->Form->control('has_classic_car',['label'=>' Auto clásico','class'=>'i-checks']); ?>                  
                                                                    </div>
                                                                     <div class="col-md-3">                            
                                                                        <?php echo $this->Form->control('has_modern_car',['label'=>' Auto moderno','class'=>'i-checks']); ?>                  
                                                                    </div>    
                                                                    <div class="col-md-3">
                                                                        <?php echo $this->Form->control('has_air_conditioner', array('label'=>' Aire?','class'=>'i-checks')); ?>                        
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <?php echo $this->Form->control('speaks_english', array('label'=>' Habla inglés?','class'=>'i-checks')); ?>                        
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <button class="btn btn-primary" onclick="$('#images-tab').click()">Continuar</button>
                                                            </div>                                           
                                                        
                                         </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-4" class="tab-pane">
                                <div class="panel-body">
                                   <div class="row">
                                       <div class="col-xs-4 col-md-4" id="uploader">
                                            <form role="form">
                                              <input id="sample_input" type="hidden" name="test[image]">
                                            </form>        
                                        </div>
                                       <div class="col-xs-8 col-md-8" id="cropper">
                                           
                                                    
                                       </div>
                                       
                                   </div> 
                                    <div class="row">
                                    submit
                                </div> 
                                </div>
                            </div>                      

                                 
                        </div>
                        <?= $this->Form->end() ?>
                    </div>
        <br>
    </div>
    
    
    
</div>
</div>


</div>