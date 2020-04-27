<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Testimonial[]|\Cake\Collection\CollectionInterface $testimonials
 */
?>
<div class="testimonials index content">
    <?= $this->Html->link(__('New Testimonial'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Testimonials') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('author') ?></th>
                    <th><?= $this->Paginator->sort('country') ?></th>
                    <th><?= $this->Paginator->sort('state') ?></th>
                    <th><?= $this->Paginator->sort('lang') ?></th>
                    <th><?= $this->Paginator->sort('image_filepath') ?></th>
                    <th><?= $this->Paginator->sort('conversation_id') ?></th>
                    <th><?= $this->Paginator->sort('driver_id') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('validation_token') ?></th>
                    <th><?= $this->Paginator->sort('driver_reply_token') ?></th>
                    <th><?= $this->Paginator->sort('validated') ?></th>
                    <th><?= $this->Paginator->sort('featured') ?></th>
                    <th><?= $this->Paginator->sort('use_as_sample') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($testimonials as $testimonial): ?>
                <tr>
                    <td><?= h($testimonial->id) ?></td>
                    <td><?= h($testimonial->author) ?></td>
                    <td><?= h($testimonial->country) ?></td>
                    <td><?= h($testimonial->state) ?></td>
                    <td><?= h($testimonial->lang) ?></td>
                    <td><?= h($testimonial->image_filepath) ?></td>
                    <td><?= $testimonial->has('conversation') ? $this->Html->link($testimonial->conversation->id, ['controller' => 'Conversations', 'action' => 'view', $testimonial->conversation->id]) : '' ?></td>
                    <td><?= $testimonial->has('driver') ? $this->Html->link($testimonial->driver->name, ['controller' => 'Drivers', 'action' => 'view', $testimonial->driver->id]) : '' ?></td>
                    <td><?= h($testimonial->email) ?></td>
                    <td><?= h($testimonial->created) ?></td>
                    <td><?= h($testimonial->modified) ?></td>
                    <td><?= h($testimonial->validation_token) ?></td>
                    <td><?= h($testimonial->driver_reply_token) ?></td>
                    <td><?= h($testimonial->validated) ?></td>
                    <td><?= h($testimonial->featured) ?></td>
                    <td><?= h($testimonial->use_as_sample) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $testimonial->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $testimonial->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $testimonial->id], ['confirm' => __('Are you sure you want to delete # {0}?', $testimonial->id)]) ?>
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
