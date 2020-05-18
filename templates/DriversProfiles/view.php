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
            <?= $this->Html->link(__('Edit Drivers Profile'), ['action' => 'edit', $driversProfile->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Drivers Profile'), ['action' => 'delete', $driversProfile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $driversProfile->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Drivers Profiles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Drivers Profile'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="driversProfiles view content">
            <h3><?= h($driversProfile->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($driversProfile->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Driver') ?></th>
                    <td><?= $driversProfile->has('driver') ? $this->Html->link($driversProfile->driver->name, ['controller' => 'Drivers', 'action' => 'view', $driversProfile->driver->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Driver Nick') ?></th>
                    <td><?= h($driversProfile->driver_nick) ?></td>
                </tr>
                <tr>
                    <th><?= __('Driver Name') ?></th>
                    <td><?= h($driversProfile->driver_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Avatar Filename') ?></th>
                    <td><?= h($driversProfile->avatar_filename) ?></td>
                </tr>
                <tr>
                    <th><?= __('Avatar Filedir') ?></th>
                    <td><?= h($driversProfile->avatar_filedir) ?></td>
                </tr>
                <tr>
                    <th><?= __('Featured Img Url') ?></th>
                    <td><?= h($driversProfile->featured_img_url) ?></td>
                </tr>
                <tr>
                    <th><?= __('Driver Code') ?></th>
                    <td><?= h($driversProfile->driver_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Testimonial Attempts') ?></th>
                    <td><?= $this->Number->format($driversProfile->testimonial_attempts) ?></td>
                </tr>
                <tr>
                    <th><?= __('Show Profile') ?></th>
                    <td><?= $driversProfile->show_profile ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description Es') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($driversProfile->description_es)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Description En') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($driversProfile->description_en)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
