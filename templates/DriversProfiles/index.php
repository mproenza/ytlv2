<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DriversProfile[]|\Cake\Collection\CollectionInterface $driversProfiles
 */
?>
<div class="driversProfiles index content">
    <?= $this->Html->link(__('New Drivers Profile'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Drivers Profiles') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('driver_id') ?></th>
                    <th><?= $this->Paginator->sort('slug') ?></th>
                    <th><?= $this->Paginator->sort('driver_name') ?></th>
                    <th><?= $this->Paginator->sort('avatar_filename') ?></th>
                    <th><?= $this->Paginator->sort('avatar_filedir') ?></th>
                    <th><?= $this->Paginator->sort('featured_img_url') ?></th>
                    <th><?= $this->Paginator->sort('show_profile') ?></th>
                    <th><?= $this->Paginator->sort('driver_code') ?></th>
                    <th><?= $this->Paginator->sort('testimonial_attempts') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($driversProfiles as $driversProfile): ?>
                <tr>
                    <td><?= h($driversProfile->id) ?></td>
                    <td><?= $driversProfile->has('driver') ? $this->Html->link($driversProfile->driver->name, ['controller' => 'Drivers', 'action' => 'view', $driversProfile->driver->id]) : '' ?></td>
                    <td><?= h($driversProfile->slug) ?></td>
                    <td><?= h($driversProfile->driver_name) ?></td>
                    <td><?= h($driversProfile->avatar_filename) ?></td>
                    <td><?= h($driversProfile->avatar_filedir) ?></td>
                    <td><?= h($driversProfile->featured_img_url) ?></td>
                    <td><?= h($driversProfile->show_profile) ?></td>
                    <td><?= h($driversProfile->driver_code) ?></td>
                    <td><?= $this->Number->format($driversProfile->testimonial_attempts) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $driversProfile->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $driversProfile->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $driversProfile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $driversProfile->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
