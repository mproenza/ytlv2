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
                        <th>Telefono</th>
                        <th>Provincia</th>
                        <th data-hide="all">Fotos</th> 
                        <th data-hide="all">Bio</th>
                        <th data-hide="all">Carro/modelo</th>
                        <th data-hide="all">Pasajeros</th>                        
                        <th data-hide="all">Habla inglÃ©s?</th>
                        <th data-hide="all">A/C</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($driversUnapproved as $profile): ?>
                    <tr>
                        <td><?php echo $profile->full_name ?></td>
                        <td><?php echo $profile->username ?></td>
                        <td><?php echo $profile->phone ?></td>
                        <td><?php echo $profile->province->name ?></td>
                        <td>
                            <div class="row">
                                <div class="col-md-4 col-xs-12 b-r"><a data-toggle="modal" data-target="#img1profile<?php echo $profile->id; ?>"><img style="width: 80px; height: 60px" class="img img-responsive" src="<?= App\Util\PathUtil::getFullPath($profile->image1_path)?>"></a></div>
                                <div class="col-md-4 col-xs-12 b-r"><a data-toggle="modal" data-target="#img2profile<?php echo $profile->id; ?>"><img style="width: 80px; height: 60px" class="img img-responsive" src="<?= App\Util\PathUtil::getFullPath($profile->image2_path)?>"></a></div>
                                <div class="col-md-4 col-xs-12"><a data-toggle="modal" data-target="#img3profile<?php echo $profile->id; ?>"><img style="width: 80px; height: 60px" class="img img-responsive" src="<?= App\Util\PathUtil::getFullPath($profile->image3_path)?>"></a></div>
                            </div>
                            <div class="modal inmodal" id="img1profile<?php echo $profile->id; ?>" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated fadeIn">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>                                            
                                        </div>
                                        <div class="modal-body">
                                            <img  class="img img-responsive" src="<?= App\Util\PathUtil::getFullPath($profile->image1_path)?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal inmodal" id="img2profile<?php echo $profile->id; ?>" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated fadeIn">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>                                            
                                        </div>
                                        <div class="modal-body">
                                            <img  class="img img-responsive" src="<?= App\Util\PathUtil::getFullPath($profile->image2_path)?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal inmodal" id="img3profile<?php echo $profile->id; ?>" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated fadeIn">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>                                            
                                        </div>
                                        <div class="modal-body">
                                            <img  class="img img-responsive" src="<?= App\Util\PathUtil::getFullPath($profile->image3_path)?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td> 
                        <td><?php echo $profile->about ?></td>
                        <td><?php echo $profile->car_model ?></td>
                        <td><span class="pie"><?php echo $profile->max_people_count ?></span></td>
                        <td><?php if($profile->speaks_english) echo "Si"; else echo "No"; ?></td>
                        <td><?php if($profile->has_air_conditioner) echo "Si"; else echo "No"; ?></td>
                        <td>
                            <a title="Aprobar perfil" href="<?php echo $this->Url->build(['action'=>'approve', $profile->id]); ?>"><i class="fa fa-edit text-navy"></i></a>
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

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $('.footable').footable();
        $('.footable2').footable();

    });
</script>
