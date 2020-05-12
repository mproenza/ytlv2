<?php
use Cake\Core\Configure;
?>

<!DOCTYPE html>
<html>
    <head>        
        <?php echo $this->Html->charset(); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        
        <?php if(is_callable($meta['title'])) $meta['title'] = $meta['title']($this->viewVars, $this->request);?>
        <?php if(is_callable($meta['description'])) $meta['description'] = $meta['description']($this->viewVars, $this->request);?>

        <title><?php echo $meta['title']." | YoTeLlevo" ?></title>
        <meta name="description" content="<?php echo $meta['description']?>"/>
        
        <?php echo $this->fetch('meta'); ?>
        
        <style type="text/css">
            
            #navbar #nav a.nav-link{
                /*color:white;*/
                font-family:'Montserrat', sans-serif;
                font-size:13px;
                /*margin-top:4px;*/
                text-transform:uppercase
            }
            #navbar #nav a.nav-link:hover,#navbar #nav a.nav-link:focus{
                background-color:transparent;
                text-decoration:none
            }
        </style>
        
        <?php
        // META
        echo $this->Html->meta('icon');
        
        echo $this->Html->css('default-bundle');
        echo $this->Html->css('/assets/datepicker/css/datepicker');
        ?>
        <?php 
        echo $this->fetch('css');
        echo $this->fetch('css_top');
        ?>
    </head>
    <body>
        <div id="container">
            <div id="navbar" class="navbar navbar-default navbar-fixed-top" role="navigation">
                <nav id="nav">
                <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#app-navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                            <span class="navbar-brand"><big>Yo</big>Te<big>Llevo</big></span>
                        <div class="pull-left navbar-brand">
                            <?php $lang = Configure::read('App.language');?>
                            <?= $this->element('widget/lang-link');?>
                        </div>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <ul class="nav navbar-nav">
                            
                            <?php if ($isUserLoggedIn) :?>
                                <?php if($userRole === 'admin' || $userRole === 'operator'):?>

                                    <li title="Revisa todas las conversaciones que tienen nuevos mensajes y mantente al tanto de los acuerdos entre choferes y viajeros." class="info">
                                        <?php echo $this->Html->link('<button type="button" class="btn btn-success navbar-btn">Nuevos Mensajes</button>', array('controller' => 'driver_travels', 'action' => 'view_filtered', DriverTravel::$SEARCH_NEW_MESSAGES), array('escape'=>false, 'style'=>'padding:0px;padding-right:10px'))?>
                                    </li>
                                    <li title="Chequea las conversaciones de los próximos viajes que expiran y que se están Siguiendo y asegúrate que todo está bien." class="info">
                                        <?php echo $this->Html->link('<button type="button" class="btn btn-info navbar-btn">Conversaciones Siguiendo</button>', array('controller' => 'driver_travels', 'action' => 'view_filtered', DriverTravel::$SEARCH_FOLLOWING), array('escape'=>false, 'style'=>'padding:0px;padding-right:10px'))?>
                                    </li>
                                    <li title="Mira los datos y las conversaciones de las últimas solicitudes de viaje creadas. Verifica cómo se comporta la interacción entre choferes y viajeros y notifica otros choferes si es necesario." class="info">
                                        <?php echo $this->Html->link('<button type="button" class="btn btn-default navbar-btn">Solicitudes de Viajes</button>', array('controller' => 'travels', 'action' => 'view_filtered', Travel::$SEARCH_ALL), array('escape'=>false, 'style'=>'padding:0px;padding-right:10px'))?>
                                    </li>

                                    <li class="divider-vertical"></li>

                                    <li class="dropdown">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link">
                                            Opciones
                                            <b class="caret"></b>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-submenu">
                                                <a tabindex="-1" href="#">Administrar</a>
                                                <ul class="dropdown-menu">
                                                    <li><?php echo $this->Html->link('Usuarios', array('controller' => 'users', 'action' => 'index')) ?></li>
                                                    <li><?php echo $this->Html->link('Choferes', array('controller' => 'drivers', 'action' => 'index')) ?></li>                                            
                                                    <li class="divider"></li>
                                                    <li><?php echo $this->Html->link('Provincias', array('controller' => 'provinces', 'action' => 'index')) ?></li>
                                                    <li><?php echo $this->Html->link('Localidades', array('controller' => 'localities', 'action' => 'index')) ?></li>
                                                    <li><?php echo $this->Html->link('Tesauro', array('controller' => 'locality_thesaurus', 'action' => 'index')) ?></li>
                                                    <li class="divider"></li>
                                                    <li><?php echo $this->Html->link('Testimonios', array('controller' => 'testimonials', 'action' => 'index')) ?></li>
                                                    <li><?php echo $this->Html->link('Respuestas a Testimonios', array('controller' => 'testimonials', 'action' => 'replies')) ?></li>
                                                    <li class="divider"></li>
                                                    <li><?php echo $this->Html->link('Ofertas de precios', array('controller' => 'discount_rides', 'action' => 'index')) ?></li>
                                                </ul>
                                            </li>
                                            
                                            <?php if($userRole === 'admin'):?>
                                            <li class="dropdown-submenu">
                                                <a tabindex="-1" href="#">Ver</a>
                                                <ul class="dropdown-menu">
                                                    <li><?php echo $this->Html->link('Viajes Pendientes (Todos)', array('controller' => 'travels', 'action' => 'all_pending')) ?></li>
                                                    <li class="divider"></li>
                                                    <li><?php echo $this->Html->link('Interacciones de Usuarios', array('controller' => 'user_interactions', 'action' => 'view_filtered/all'))?></li>
                                                    <li><?php echo $this->Html->link(__('Urls Compartidas'), array('controller' => 'url_invitations', 'action'=>'index'))?></li> 
                                                    <li class="divider"></li>
                                                    <li><?php echo $this->Html->link('Dashboard', array('controller' => 'metrics', 'action' => 'dashboard'));?></li>                                                     
                                                </ul>
                                            </li>
                                            
                                            <li class="dropdown-submenu">
                                                <a tabindex="-1" href="#">Operaciones</a>
                                                <ul class="dropdown-menu">
                                                    <li><?php echo $this->Html->link('Reglas de operadores', array('controller' => 'op_action_rules', 'action'=>'index')) ?></li>
                                                </ul>
                                            </li>
                                            
                                            <li class="divider"></li>
                                            <li class="dropdown-submenu">
                                                <a tabindex="-1" href="#">Sistema</a>
                                                <ul class="dropdown-menu">
                                                    <li><?php echo $this->Html->link('Email Queue', array('controller' => 'email_queues', 'action' => 'index')) ?></li>
                                                    <!--<li class="divider"></li>
                                                    <li><?php echo $this->Html->link('Datos Archivados', array('controller' => 'driver_traveler_conversations', 'action' => 'archive_state'));?></li>
                                                    -->
                                                    <li class="divider"></li>
                                                    <li><?php echo $this->Html->link('Transactional Emails: Choferes', array('controller' => 'd_transactional_emails', 'action' => 'index')) ?></li>
                                                    
                                                    <li class="divider"></li>
                                                    <li class="dropdown-submenu">
                                                        <a tabindex="-1" href="#">Logs</a>
                                                        <ul class="dropdown-menu">
                                                            <li><?php echo $this->Html->link('Info Choferes', array('controller' => 'admins', 'action' => 'view_log/info_choferes')) ?></li>
                                                            <li><?php echo $this->Html->link('Viajes Fallidos', array('controller' => 'admins', 'action' => 'view_log/travels_failed')) ?></li>
                                                            <li><?php echo $this->Html->link('Conversaciones', array('controller' => 'admins', 'action' => 'view_log/conversations')) ?></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <?php endif?>
                                            
                                            <li class="divider"></li>
                                            <li class="dropdown-submenu">
                                                <a tabindex="-1" href="#">Pruebas</a>
                                                <ul class="dropdown-menu">
                                                    <li><?php echo $this->Html->link('Solicitar viaje', array('controller' => 'travels', 'action' => 'add'));?></li> 
                                                    <li><?php echo $this->Html->link('Mis Anuncios', array('controller' => 'travels', 'action' => 'index'));?></li>
                                                    <li class="divider"></li>
                                                    <li><?php echo $this->Html->link('Mis Mensajes', array('controller' => 'conversations'));?></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                
                                <li> <?php echo $this->element('Search.form_search_user_travels')?> </li>

                            <?php endif?>

                            <?php if($userRole === 'regular' || $userRole === 'tester') :?>
                                <li><?php echo $this->Html->link(__('Solicitar viaje'), array('controller' => 'travels', 'action' => 'add'), array('class' => 'nav-link', 'escape'=>false));?></li> 
                                <li class="divider-vertical"></li>
                                <li><?php echo $this->Html->link(__('Mis Solicitudes'), array('controller' => 'travels', 'action' => 'index'), array('class' => 'nav-link', 'escape'=>false));?></li>
                                <li class="divider-vertical"></li>
                                <li title="<?php echo __('Mira los mensajes que tienes con cada uno de los choferes y mantente al tanto de tus acuerdos de viaje')?>" class="info">
                                    <?php echo $this->Html->link('<button type="button" class="btn btn-success navbar-btn">'.__('Mis Mensajes').'</button>', array('controller' => 'conversations'), array('escape'=>false, 'style'=>'padding:0px;padding-right:10px'))?>
                                </li>
                            <?php endif;?>
                                    
                        <?php else: ?>
                            <li><?php echo $this->Html->link(__('Ir al Inicio'), '/'.Configure::read('App.language'), array('class' => 'nav-link', 'escape'=>false));?></li>
                        <?php endif;?>            
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <?php if ($isUserLoggedIn): ?>
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link">
                                    <?php echo $pretty_user_name;?>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><?php echo $this->Html->link(__('Perfil'), array('controller' => 'users', 'action' => 'profile')) ?></li>
                                    <li class="divider"></li>
                                    <?php if($userRole  == 'operator'):?><li><?php echo $this->Html->link(__('Operaciones'), array('controller' => 'users', 'action' => 'operations')) ?></li><li class="divider"></li><?php endif?>
                                    <li><?php echo $this->Html->link(__('Salir'), array('controller' => 'users', 'action' => 'logout')) ?></li>
                                </ul>
                            </li>
                        <?php else: ?>
                            <li>
                                <?php echo $this->Html->link(__('Entrar'), array('controller' => 'users', 'action' => 'login'), array('class' => 'nav-link', 'rel'=>'nofollow')) ?>
                            </li>
                        <?php endif ?>

                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
        </div>
            
            
            <div style="height: 80px;width:100%;clear:both"></div>
            <?php echo $this->Flash->render('auth'); ?>
            <div id="content" class="container-fluid">
                <?php echo $this->Flash->render(); ?>
                <?php echo $this->fetch('content'); ?>
            </div>

            <div id="footer">
                <div class="container-fluid">
                    <?php echo $this->element('general/footer')?>
                </div>
            </div>
        </div>
        
        <?php
        echo $this->Html->script('jquery');
        echo $this->Html->script('bootstrap');
        
        echo $this->Html->script('/assets/jquery-validation-1.10.0/dist/jquery.validate.min');
        echo $this->Html->script('/assets/datepicker/js/datepicker');
        
        ?>
        
        <?= $this->fetch('script');?>
        <?= $this->fetch('script_bottom');?>
        <?= $this->fetch('script_internal');?>
        
        <script type="text/javascript">
            function goTo(id, time, offset) {
                $('html, body').animate({
                    scrollTop: $('#' + id).offset().top + offset
                }, time);
            };
            
            <?php if($this->request->getQueryParams('highlight')):?>
                $(document).ready(function() {
                    goTo('<?php echo $this->request->getQueryParams('highlight')?>', 500, -70);
                });
            <?php endif?>
         </script>
         
         <script type="text/javascript">
            $(document).ready(function() {
                
                /*Logica para el mensaje directo en conv. cerrada*/
                $('.datepicker').datepicker({
                format: "dd/mm/yyyy",
                language: '<?php echo Configure::read('Config.language')?>',
                startDate: 'today',
                todayBtn: "linked",
                autoclose: true,
                todayHighlight: true
            });

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
                $('#CDirectSubmit').val('<?php echo __d('mobirise/default', 'Espera')?> ...');
            });
               /*---------------------------------------------------------------------------------*/ 
                $.each($('.info'), function(pos, obj) {
                    var placement = 'bottom';
                    if($(obj).attr('data-placement') !== undefined) placement = $(obj).attr('data-placement');
                    $(obj).tooltip({placement:placement, html:true});
                });
                
                //$('.info').tooltip({placement:'bottom', html:true});
            })
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