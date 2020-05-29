<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Driver[]|\Cake\Collection\CollectionInterface $drivers
 */
?>
<div class="drivers index content">
    <?= $this->Html->link(__('New Driver'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Drivers') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('username') ?></th>
                    <th><?= $this->Paginator->sort('password') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('web_auth_token') ?></th>
                    <th><?= $this->Paginator->sort('role') ?></th>
                    <th><?= $this->Paginator->sort('min_people_count') ?></th>
                    <th><?= $this->Paginator->sort('max_people_count') ?></th>
                    <th><?= $this->Paginator->sort('active') ?></th>
                    <th><?= $this->Paginator->sort('receive_requests') ?></th>
                    <th><?= $this->Paginator->sort('has_modern_car') ?></th>
                    <th><?= $this->Paginator->sort('has_classic_car') ?></th>
                    <th><?= $this->Paginator->sort('has_air_conditioner') ?></th>
                    <th><?= $this->Paginator->sort('province_id') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('travel_count') ?></th>
                    <th><?= $this->Paginator->sort('last_notification_date') ?></th>
                    <th><?= $this->Paginator->sort('speaks_english') ?></th>
                    <th><?= $this->Paginator->sort('operator_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('mobile_app_active') ?></th>
                    <th><?= $this->Paginator->sort('email_active') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($drivers as $driver): ?>
                <tr>
                    <td><?= $this->Number->format($driver->id) ?></td>
                    <td><?= h($driver->username) ?></td>
                    <td><?= h($driver->password) ?></td>
                    <td><?= h($driver->name) ?></td>
                    <td><?= h($driver->web_auth_token) ?></td>
                    <td><?= h($driver->role) ?></td>
                    <td><?= $this->Number->format($driver->min_people_count) ?></td>
                    <td><?= $this->Number->format($driver->max_people_count) ?></td>
                    <td><?= h($driver->active) ?></td>
                    <td><?= h($driver->receive_requests) ?></td>
                    <td><?= h($driver->has_modern_car) ?></td>
                    <td><?= h($driver->has_classic_car) ?></td>
                    <td><?= h($driver->has_air_conditioner) ?></td>
                    <td><?= $driver->has('province') ? $this->Html->link($driver->province->name, ['controller' => 'Provinces', 'action' => 'view', $driver->province->id]) : '' ?></td>
                    <td><?= h($driver->description) ?></td>
                    <td><?= $this->Number->format($driver->travel_count) ?></td>
                    <td><?= h($driver->last_notification_date) ?></td>
                    <td><?= h($driver->speaks_english) ?></td>
                    <td><?= $driver->has('user') ? $this->Html->link($driver->user->id, ['controller' => 'Users', 'action' => 'view', $driver->user->id]) : '' ?></td>
                    <td><?= h($driver->created) ?></td>
                    <td><?= h($driver->mobile_app_active) ?></td>
                    <td><?= h($driver->email_active) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $driver->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $driver->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $driver->id], ['confirm' => __('Are you sure you want to delete # {0}?', $driver->id)]) ?>
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
