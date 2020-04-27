<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Driver $driver
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Drivers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="drivers form content">
            <?= $this->Form->create($driver) ?>
            <fieldset>
                <legend><?= __('Add Driver') ?></legend>
                <?php
                    echo $this->Form->control('username');
                    echo $this->Form->control('password');
                    echo $this->Form->control('name');
                    echo $this->Form->control('web_auth_token');
                    echo $this->Form->control('role');
                    echo $this->Form->control('min_people_count');
                    echo $this->Form->control('max_people_count');
                    echo $this->Form->control('active');
                    echo $this->Form->control('receive_requests');
                    echo $this->Form->control('has_modern_car');
                    echo $this->Form->control('has_classic_car');
                    echo $this->Form->control('has_air_conditioner');
                    echo $this->Form->control('province_id', ['options' => $provinces]);
                    echo $this->Form->control('description');
                    echo $this->Form->control('travel_count');
                    echo $this->Form->control('last_notification_date');
                    echo $this->Form->control('speaks_english');
                    echo $this->Form->control('operator_id', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('mobile_app_active');
                    echo $this->Form->control('email_active');
                    echo $this->Form->control('localities._ids', ['options' => $localities]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
