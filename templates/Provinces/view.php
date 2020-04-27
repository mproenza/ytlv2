<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Province $province
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Province'), ['action' => 'edit', $province->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Province'), ['action' => 'delete', $province->id], ['confirm' => __('Are you sure you want to delete # {0}?', $province->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Provinces'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Province'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="provinces view content">
            <h3><?= h($province->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($province->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($province->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Drivers') ?></h4>
                <?php if (!empty($province->drivers)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Username') ?></th>
                            <th><?= __('Password') ?></th>
                            <th><?= __('Web Auth Token') ?></th>
                            <th><?= __('Role') ?></th>
                            <th><?= __('Min People Count') ?></th>
                            <th><?= __('Max People Count') ?></th>
                            <th><?= __('Active') ?></th>
                            <th><?= __('Receive Requests') ?></th>
                            <th><?= __('Has Modern Car') ?></th>
                            <th><?= __('Has Classic Car') ?></th>
                            <th><?= __('Has Air Conditioner') ?></th>
                            <th><?= __('Province Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Travel Count') ?></th>
                            <th><?= __('Last Notification Date') ?></th>
                            <th><?= __('Speaks English') ?></th>
                            <th><?= __('Operator Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Mobile App Active') ?></th>
                            <th><?= __('Email Active') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($province->drivers as $drivers) : ?>
                        <tr>
                            <td><?= h($drivers->id) ?></td>
                            <td><?= h($drivers->username) ?></td>
                            <td><?= h($drivers->password) ?></td>
                            <td><?= h($drivers->web_auth_token) ?></td>
                            <td><?= h($drivers->role) ?></td>
                            <td><?= h($drivers->min_people_count) ?></td>
                            <td><?= h($drivers->max_people_count) ?></td>
                            <td><?= h($drivers->active) ?></td>
                            <td><?= h($drivers->receive_requests) ?></td>
                            <td><?= h($drivers->has_modern_car) ?></td>
                            <td><?= h($drivers->has_classic_car) ?></td>
                            <td><?= h($drivers->has_air_conditioner) ?></td>
                            <td><?= h($drivers->province_id) ?></td>
                            <td><?= h($drivers->description) ?></td>
                            <td><?= h($drivers->travel_count) ?></td>
                            <td><?= h($drivers->last_notification_date) ?></td>
                            <td><?= h($drivers->speaks_english) ?></td>
                            <td><?= h($drivers->operator_id) ?></td>
                            <td><?= h($drivers->created) ?></td>
                            <td><?= h($drivers->mobile_app_active) ?></td>
                            <td><?= h($drivers->email_active) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Drivers', 'action' => 'view', $drivers->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Drivers', 'action' => 'edit', $drivers->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Drivers', 'action' => 'delete', $drivers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $drivers->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Localities') ?></h4>
                <?php if (!empty($province->localities)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Province Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($province->localities as $localities) : ?>
                        <tr>
                            <td><?= h($localities->id) ?></td>
                            <td><?= h($localities->name) ?></td>
                            <td><?= h($localities->province_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Localities', 'action' => 'view', $localities->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Localities', 'action' => 'edit', $localities->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Localities', 'action' => 'delete', $localities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $localities->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
