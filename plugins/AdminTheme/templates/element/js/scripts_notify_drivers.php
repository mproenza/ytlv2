<?php
use App\Model\Table\DriversTable;
use Cake\Routing\Router;

$this->Html->css('typeaheadjs-bootstrapcss/typeahead.js-bootstrap', ['block' => 'css_top']);

$this->Html->script('typeaheadjs/typeahead-martin', ['block' => 'script_internal']);
$this->Html->script('bootbox/bootbox', ['block' => 'script_internal']);
$this->Html->script('ajaxify/forms', ['block' => 'script_internal']);
?>

<?php $this->start('script_inline');?>
<script>
window.app = {};
window.app.drivers_in = <?php echo json_encode($drivers_in)?>;

$(document).ready(function() {
    
    $( ".open-modal" ).click(function( event ) {
    
        // Crear el bootbox
        bootbox.dialog({title:$(this).data('title'), message:$( '#' + $(this).data('modal') ).html(), onEscape: true});
        event.preventDefault();

        // Para cada formulario dentro del bootbox...
        var forms = $( '.bootbox form' );
        $.each(forms, function(pos, obj) {
            var _form = $(obj);

            // ... convertir cada formulario en ajax
            _ajaxifyForm(_form, null,
                // onSuccess
                function(obj) {
                    window.app.drivers_in[window.app.notificationtravel].push(window.app.notifieddriver);
                    convLinkClass = 'text-muted';
                    if(obj.notification_type == 'R') convLinkClass = 'text-success';
                    var convLink = 
                        $('<a>')
                        .html(obj.conversation_id)
                        .attr('href', "<?php echo Router::url(['plugin'=>false, 'controller' => 'conversations', 'action' => 'view'])?>/" + obj.conversation_id)
                        .addClass(convLinkClass).addClass('info')
                        .attr('title', obj.driver_email)
                        .tooltip({placement: 'bottom', html:true});

                    var next = $('#conversations-travel-' + _form.data('travel-id') + ' .next-conversations');
                    next.append($('<li>').append(convLink));

                    _form.find('input.driver-typeahead').typeahead('setQuery', '').focus();

                    var messageDiv = _form.find('.ajax-msg');
                    messageDiv.empty().append($("<div class='text-success'>" + obj.driver_name + " fue notificado exitosamente...</div><br/>"));
                        setTimeout(function(){
                            messageDiv.empty();
                        }, 5000);
                    }, 

                // onError
                function(jqXHR) {
                    alert(jqXHR.responseText);
                }

            );
        });

        // Crear los typeahead
        $('input.driver-typeahead').typeahead({
            valueKey: 'driver_id',
            local: <?php echo json_encode(DriversTable::getAsSuggestions())?>,
            template: function(datum) {
                var display = datum.driver_id + ':';
                if(datum.driver_name != null) display += ' <b> ' + datum.driver_name + ' </b>';// Los espacios entre las <b> y el nombre son importantes para poder matchear por el nombre
                display += ' | ' + datum.driver_username;
                display += ' | ' + ' <b> ' + datum.province_name + ' </b>';// Los espacios entre las <b> y la provincia son importantes para poder matchear por la provincia
                display += ' | ' + datum.driver_pax + ' pax';

                return display;
            },
            limit: 50
        });
        $('input.tt-hint').addClass('form-control');
        $('.twitter-typeahead').css('display', 'block');

    });
    
});

function validar(travel_id, index){
    var driver_id = $(".bootbox-body").find("." + travel_id + "input" + index).val();
    if(driver_id == "") return true;
    var drivers_in = window.app.drivers_in;

    var i, result = true;
    for(i in drivers_in[travel_id]){
        if(driver_id == drivers_in[travel_id][i]){
            result = confirm('Este chofer ya fue notificado en este viaje. ¿Notificar de todas formas?');
            break;
        }    
    }
    window.app.notifieddriver     = driver_id;
    window.app.notificationtravel = travel_id;
    return result;
}
</script>

<?php $this->end();?>
