<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><span class="fa fa-list"></span>Nuevos registros de choferes</h5>

                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>                                
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">

                            <table class="footable table table-stripped toggle-arrow-tiny">
                                <thead>
                                <tr>

                                    <th data-toggle="true">Nombre</th>
                                    <th>Correo</th>
                                    <th data-hide="all">Fotos</th>
                                    <th data-hide="all">Telefono</th>
                                    <th data-hide="all">Carro/modelo</th>
                                    <th data-hide="all">Pasajeros</th>
                                    <th data-hide="all">Habla inglés?</th>
                                    <th data-hide="all">A/C</th>                                    
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($driversUnapproved as $profile): ?>
                                <tr>
                                    <td><?php echo $profile->full_name ?></td>
                                    <td><?php echo $profile->username ?></td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-4 col-xs-12 b-r" ><a data-target="#IM1" data-toggle="modal"><img style="width: 80px; height: 60px" class="img img-responsive" src="<?= App\Util\PathUtil::getFullPath($profile->profile_img_url)?>"></a></div>
                                        
                                        <div class="col-md-4 col-xs-12 b-r" href="#IM2" data-toggle="modal"><img style="width: 80px; height: 60px" class="img img-responsive" src="<?= App\Util\PathUtil::getFullPath($profile->featured_img_url)?>"></div>
                                        
                                        <div class="col-md-4 col-xs-12" href="#IM3" data-toggle="modal"><img style="width: 80px; height: 60px" class="img img-responsive" src="<?= App\Util\PathUtil::getFullPath($profile->avatar_path)?>"></div>
                                        <div class="modal fade" id="#IM3">
                                                <div class="modal-content">
                                                    <div class="modal-body"><div class="carousel-inner">                                                            
                                                            <div class="carousel-item active"><img src="<?= App\Util\PathUtil::getFullPath($profile->avatar_path)?>" alt="" title=""></div>                                                            
                                                            
                                                            <a class="close" href="#" role="button" data-dismiss="modal"><span class="sr-only">Close</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                         </div>
                                        </div>                                        
                                    </td>
                                    <td><?php echo $profile->phone ?></td>
                                    <td><?php echo $profile->car_model ?></td>
                                    <td><span class="pie"><?php echo $profile->max_people_count ?></span></td>
                                    <td><?php if($profile->speaks_english) echo "Si"; else echo "No"; ?></td>
                                    <td><?php if($profile->has_air_conditioner) echo "Si"; else echo "No"; ?></td>                                    
                                    <td>
                                        <a href="#"><i class="fa fa-check text-navy"></i></a>
                                        <a href="#"><i class="fa fa-edit text-navy"></i></a>
                                    </td>
                                </tr>
                                   <?php endforeach; ?>                                
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="5">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
<div class="modal fade" role="dialog" aria-hidden="true" tabindex="-1" id="#IM1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body"><div class="carousel-inner">
                                                            <div class="carousel-item active"><img src="<?= App\Util\PathUtil::getFullPath($profile->profile_img_url)?>" alt="" title=""></div>                                                
                                                            <a class="close" href="#" role="button" data-dismiss="modal"><span class="sr-only">Close</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                         </div>
<div class="modal fade" id="#IM2">
                                                <div class="modal-content">
                                                    <div class="modal-body"><div class="carousel-inner">                                                            
                                                            <div class="carousel-item active"><img src="<?= App\Util\PathUtil::getFullPath($profile->featured_img_url)?>" alt="" title=""></div>                                                  
                                                            <a class="close" href="#" role="button" data-dismiss="modal"><span class="sr-only">Close</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                         </div>
<script>
        $(document).ready(function() {

            $('.footable').footable();
            $('.footable2').footable();

        });

    </script>