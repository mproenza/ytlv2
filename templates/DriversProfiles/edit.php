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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $driversProfile->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $driversProfile->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Drivers Profiles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="driversProfiles form content">
            <img src="<?= App\Util\PathUtil::getFullPath($driversProfile->avatar_path)?>">
            <?= $this->Form->create($driversProfile, ['type'=>'file']) ?>
            <fieldset>
                <legend><?= __('Edit Drivers Profile') ?></legend>
                <?php
                    echo $this->Form->control('driver_id', ['options' => $drivers]);
                    echo $this->Form->control('driver_nick');
                    echo $this->Form->control('driver_name');
                    echo $this->Form->control('avatar', ['type'=>'file']);
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
