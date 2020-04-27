<?php
use App\Model\Entity\Conversation;
use App\Model\Entity\Driver;
use Cake\Core\Configure;

$notificationType = Conversation::$NOTIFICATION_TYPE_DIRECT_MESSAGE;

$isDiscountOffer = isset($discount_id);
if($isDiscountOffer) $notificationType = Conversation::$NOTIFICATION_TYPE_DISCOUNT_OFFER_REQUEST;
?>
<?php echo $this->Flash->render('form-error');?>

<?php 
    echo $this->Form->create(null, array('id' => 'CDirectForm', 'url' => array('controller' => 'users',  'action'=>'contact_driver')));
    
    echo $this->Form->input('Conversation.driver_id', array('type' => 'hidden', 'value' => $driverWithProfile->id));
    
    echo $this->Form->input('Conversation.last_driver_email', array('type' => 'hidden', 'value' => $driverWithProfile->username));
    
    //Para el caso de envio de mensaje directo en conversacion expirada
    if(isset($expired)) echo "<input type='hidden' name='closed' id='closed' value='".$super."'>";
    
    if($isDiscountOffer) echo $this->Form->input('Conversation.discount_id', array('type' =>'hidden', 'value'=>$discount_id));

    echo $this->Form->input('Conversation.notification_type', array('type' => 'hidden', 'value' => $notificationType));
    
    echo $this->Form->custom_date('Conversation.travel_date', array('label' => __('Fecha inicial del viaje'), 'dateFormat' => 'dd/mm/yyyy', 'class'=>'input-sm'));
    
    echo $this->Form->input('ConversationerConversation.response_text', array(
        'label' => __('Mensaje a {0} sobre lo que quieres hacer', Driver::shortenName($driverWithProfile->drivers_profile->driver_name)), 
        'type' => 'textarea', 
        'required' => 'required',
        'placeholder' => __d('mobirise/driver_profile', 'Hola {0}', Driver::shortenName($driverWithProfile->drivers_profile->driver_name)).' ...'));
    ?>

    <?php if(!$isUserLoggedIn):?>

        <div class="row row-sm-offset">
            <div class="col-md-6 multi-horizontal" data-for="name">
                <?php echo $this->Form->input("User.username", array("label" => __("Tu correo electrónico"), "type" => "email"));?>
            </div>
        </div>
        <?php echo $this->Form->input('User.lang', array('type' => 'hidden', 'value'=>  Configure::read('App.language')));?>

    <?php endif;?>

    <br>
    <span class="input-group-btn">
        <input type="submit" class="btn btn-primary btn-form btn-block display-5" id="CDirectSubmit" 
               value="<?php echo __d('mobirise/driver_profile', 'Enviar este mensaje a {0}', Driver::shortenName($driverWithProfile->drivers_profile->driver_name))?>"> 

    </span>

<?php echo $this->Form->end(); ?>