<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DriversProfile $driversProfile
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Drivers Profiles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="driversProfiles form content">
            <?= $this->Form->create($driversProfile) ?>
            <fieldset>
                <legend><?= __('Add Drivers Profile') ?></legend>
                <?php
                    echo $this->Form->control('driver_id', ['options' => $drivers]);
                    echo $this->Form->control('driver_nick');
                    echo $this->Form->control('driver_name');
                    echo $this->Form->control('avatar_filepath', ['type'=>'file']);
                    echo $this->Form->control('featured_img_url');
                    echo $this->Form->control('description_es');
                    echo $this->Form->control('description_en');
                    echo $this->Form->control('show_profile');
                    echo $this->Form->control('driver_code');
                    echo $this->Form->control('testimonial_attempts');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
