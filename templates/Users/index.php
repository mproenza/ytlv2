<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="users index content">
    <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Users') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('username') ?></th>
                    <th><?= $this->Paginator->sort('password') ?></th>
                    <th><?= $this->Paginator->sort('role') ?></th>
                    <th><?= $this->Paginator->sort('active') ?></th>
                    <th><?= $this->Paginator->sort('display_name') ?></th>
                    <th><?= $this->Paginator->sort('email_confirmed') ?></th>
                    <th><?= $this->Paginator->sort('travel_count') ?></th>
                    <th><?= $this->Paginator->sort('conversations_count') ?></th>
                    <th><?= $this->Paginator->sort('travel_by_email_count') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('registered_from_ip') ?></th>
                    <th><?= $this->Paginator->sort('register_type') ?></th>
                    <th><?= $this->Paginator->sort('unsubscribe_date') ?></th>
                    <th><?= $this->Paginator->sort('lang') ?></th>
                    <th><?= $this->Paginator->sort('last_notification_date') ?></th>
                    <th><?= $this->Paginator->sort('email_config') ?></th>
                    <th><?= $this->Paginator->sort('shared_ride_offered') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->username) ?></td>
                    <td><?= h($user->password) ?></td>
                    <td><?= h($user->role) ?></td>
                    <td><?= h($user->active) ?></td>
                    <td><?= h($user->display_name) ?></td>
                    <td><?= h($user->email_confirmed) ?></td>
                    <td><?= $this->Number->format($user->travel_count) ?></td>
                    <td><?= $this->Number->format($user->conversations_count) ?></td>
                    <td><?= $this->Number->format($user->travel_by_email_count) ?></td>
                    <td><?= h($user->created) ?></td>
                    <td><?= h($user->registered_from_ip) ?></td>
                    <td><?= h($user->register_type) ?></td>
                    <td><?= h($user->unsubscribe_date) ?></td>
                    <td><?= h($user->lang) ?></td>
                    <td><?= h($user->last_notification_date) ?></td>
                    <td><?= h($user->email_config) ?></td>
                    <td><?= h($user->shared_ride_offered) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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
