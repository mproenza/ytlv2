<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Add User') ?></legend>
                <?php
                    echo $this->Form->control('username');
                    echo $this->Form->control('password');
                    echo $this->Form->control('role');
                    echo $this->Form->control('active');
                    echo $this->Form->control('display_name');
                    echo $this->Form->control('email_confirmed');
                    echo $this->Form->control('travel_count');
                    echo $this->Form->control('conversations_count');
                    echo $this->Form->control('travel_by_email_count');
                    echo $this->Form->control('registered_from_ip');
                    echo $this->Form->control('register_type');
                    echo $this->Form->control('unsubscribe_date', ['empty' => true]);
                    echo $this->Form->control('lang');
                    echo $this->Form->control('last_notification_date', ['empty' => true]);
                    echo $this->Form->control('email_config');
                    echo $this->Form->control('shared_ride_offered');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
