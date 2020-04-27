<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Locality $locality
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Locality'), ['action' => 'edit', $locality->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Locality'), ['action' => 'delete', $locality->id], ['confirm' => __('Are you sure you want to delete # {0}?', $locality->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Localities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Locality'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="localities view content">
            <h3><?= h($locality->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($locality->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Province') ?></th>
                    <td><?= $locality->has('province') ? $this->Html->link($locality->province->name, ['controller' => 'Provinces', 'action' => 'view', $locality->province->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($locality->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
