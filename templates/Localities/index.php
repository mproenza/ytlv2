<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Locality[]|\Cake\Collection\CollectionInterface $localities
 */
?>
<div class="localities index content">
    <?= $this->Html->link(__('New Locality'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Localities') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('province_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($localities as $locality): ?>
                <tr>
                    <td><?= $this->Number->format($locality->id) ?></td>
                    <td><?= h($locality->name) ?></td>
                    <td><?= $locality->has('province') ? $this->Html->link($locality->province->name, ['controller' => 'Provinces', 'action' => 'view', $locality->province->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $locality->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $locality->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $locality->id], ['confirm' => __('Are you sure you want to delete # {0}?', $locality->id)]) ?>
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
