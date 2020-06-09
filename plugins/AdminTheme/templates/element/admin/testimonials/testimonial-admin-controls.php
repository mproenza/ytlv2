<?php /* -- params --
 * -> $testimonial
 */ ?>

<?php
$urlConversation = array('controller' => 'driver_traveler_conversations', 'action' => 'view', $testimonial->conversation_id);

$statesStr = array('P' => 'Pendiente', 'A' => 'Aprobado', 'R' => 'Rechazado');
$statesClasses = array('P' => 'btn-default', 'A' => 'btn-success', 'R' => 'btn-danger');

$idiomas = array('es' => 'Español',
    'en' => 'Inglés');
$action = $this->request->getData('action');
?>

<div class="panel">
    <table class="table table-condensed">
        <thead>
            <tr>
                <th>Estado</th>
                <th>Idioma <small class="text-muted">(cambiar si es otro)</small></th>
                <th>Creado</th>
                <th>Modificado</th>
                <th><?php echo ( ($testimonial->conversation_id) ? "Conversación" : "Email"); ?></th>
                <th>
                    <?php
                    if($testimonial->featured) echo $this->Html->link('Quitar featured', array('action'=>'unset_featured/'.$testimonial->id), array('class'=>'btn btn-danger btn-sm','escape'=>false));
                    else echo $this->Html->link('Poner featured', array('action'=>'set_featured/'.$testimonial->id),array('class'=>'btn btn-info btn-sm','escape'=>false));
                    ?>
                </th>
                <th>
                    <?php
                    if($testimonial->use_as_sample) echo  $this->Html->link('Quitar de Homepage', array( 'action'=>'unset_sample/'.$testimonial->id), array('class'=>'btn btn-danger btn-sm'));
                    else echo $this->Html->link('Mostrar en Homepage', array('action'=>'set_sample/'.$testimonial->id), array('class'=>'btn btn-info btn-sm'));
                    ?>
                </th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <!-- Estado -->
                <td>
                    <div class="btn-group" style="cursor: pointer">
                        <span class="<?php echo $statesClasses[$testimonial->state]; ?>" data-toggle="dropdown" style="display: table-cell">
                            <?php  echo $statesStr[$testimonial->state]; ?>
                            <i class="caret"></i>
                        </span>

                        <div class="dropdown-menu">
                            <?php
                            foreach ($statesStr as $clave => $valor)
                                if ($testimonial->state != $clave)
                                    echo $this->Html->link("$valor", array( 'action' => "state_change/{$testimonial->id}/$clave/$action"), array('class' => "btn btn-block {$statesClasses[$clave]}"));
                            ?>
                        </div>
                    </div>
                </td>

                <!-- Idioma -->
                <td>
                    <div class="btn-group" style="cursor: pointer">
                        <span data-toggle="dropdown">
                            <?php echo $idiomas[$testimonial['lang']]; ?>
                            <i class="caret"></i>
                        </span>

                        <div class="dropdown-menu" style="min-width: 50px">
                            <?php
                            foreach ($idiomas as $clave => $valor)
                                if ($testimonial['lang'] != $clave)
                                    echo $this->Html->link("$valor", array('escape' => false, 'action' => "lang_change/{$testimonial['id']}/$clave/$action"), array('class'=>'btn'));
                            ?>
                        </div>
                    </div>
                </td>

                <!-- Creado -->
                <td><?php echo $testimonial['created']; ?></td>

                <!-- Modificado -->
                <td><?php
                    if ($testimonial['modified'] != $testimonial['created'])
                        echo "<span class='label label-warning'>{$testimonial['modified']}</span>";
                    else
                        echo $testimonial['modified'];
                    ?>
                </td>

                <!-- Conversación -->
                <td>
                    <?php if ($testimonial['conversation_id']): ?>
                        <a href="<?php echo $this->Url->build($urlConversation); ?>" target="_blank">
                            Ver conversación
                        </a>
                    <?php
                    else:
                        echo $testimonial['email'];
                    endif;
                    ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>
