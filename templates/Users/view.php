<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users view content">
            <h3><?= h($user->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Username') ?></th>
                    <td><?= h($user->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Password') ?></th>
                    <td><?= h($user->password) ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= h($user->role) ?></td>
                </tr>
                <tr>
                    <th><?= __('Display Name') ?></th>
                    <td><?= h($user->display_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Registered From Ip') ?></th>
                    <td><?= h($user->registered_from_ip) ?></td>
                </tr>
                <tr>
                    <th><?= __('Register Type') ?></th>
                    <td><?= h($user->register_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lang') ?></th>
                    <td><?= h($user->lang) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email Config') ?></th>
                    <td><?= h($user->email_config) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Travel Count') ?></th>
                    <td><?= $this->Number->format($user->travel_count) ?></td>
                </tr>
                <tr>
                    <th><?= __('Conversations Count') ?></th>
                    <td><?= $this->Number->format($user->conversations_count) ?></td>
                </tr>
                <tr>
                    <th><?= __('Travel By Email Count') ?></th>
                    <td><?= $this->Number->format($user->travel_by_email_count) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Unsubscribe Date') ?></th>
                    <td><?= h($user->unsubscribe_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Notification Date') ?></th>
                    <td><?= h($user->last_notification_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Active') ?></th>
                    <td><?= $user->active ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Email Confirmed') ?></th>
                    <td><?= $user->email_confirmed ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Shared Ride Offered') ?></th>
                    <td><?= $user->shared_ride_offered ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Casas Find Requests') ?></h4>
                <?php if (!empty($user->casas_find_requests)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('User Interaction Id') ?></th>
                            <th><?= __('Guests Names') ?></th>
                            <th><?= __('Details') ?></th>
                            <th><?= __('Send To') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->casas_find_requests as $casasFindRequests) : ?>
                        <tr>
                            <td><?= h($casasFindRequests->id) ?></td>
                            <td><?= h($casasFindRequests->user_id) ?></td>
                            <td><?= h($casasFindRequests->user_interaction_id) ?></td>
                            <td><?= h($casasFindRequests->guests_names) ?></td>
                            <td><?= h($casasFindRequests->details) ?></td>
                            <td><?= h($casasFindRequests->send_to) ?></td>
                            <td><?= h($casasFindRequests->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'CasasFindRequests', 'action' => 'view', $casasFindRequests->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'CasasFindRequests', 'action' => 'edit', $casasFindRequests->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'CasasFindRequests', 'action' => 'delete', $casasFindRequests->id], ['confirm' => __('Are you sure you want to delete # {0}?', $casasFindRequests->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Conversations') ?></h4>
                <?php if (!empty($user->conversations)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Driver Id') ?></th>
                            <th><?= __('Travel Id') ?></th>
                            <th><?= __('Notification Type') ?></th>
                            <th><?= __('Last Driver Email') ?></th>
                            <th><?= __('Message Count') ?></th>
                            <th><?= __('Notified By') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Identifier') ?></th>
                            <th><?= __('Travel Date') ?></th>
                            <th><?= __('Original Date') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Child Conversation Id') ?></th>
                            <th><?= __('Discount Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->conversations as $conversations) : ?>
                        <tr>
                            <td><?= h($conversations->id) ?></td>
                            <td><?= h($conversations->driver_id) ?></td>
                            <td><?= h($conversations->travel_id) ?></td>
                            <td><?= h($conversations->notification_type) ?></td>
                            <td><?= h($conversations->last_driver_email) ?></td>
                            <td><?= h($conversations->message_count) ?></td>
                            <td><?= h($conversations->notified_by) ?></td>
                            <td><?= h($conversations->created) ?></td>
                            <td><?= h($conversations->identifier) ?></td>
                            <td><?= h($conversations->travel_date) ?></td>
                            <td><?= h($conversations->original_date) ?></td>
                            <td><?= h($conversations->user_id) ?></td>
                            <td><?= h($conversations->child_conversation_id) ?></td>
                            <td><?= h($conversations->discount_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Conversations', 'action' => 'view', $conversations->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Conversations', 'action' => 'edit', $conversations->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Conversations', 'action' => 'delete', $conversations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $conversations->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Travels') ?></h4>
                <?php if (!empty($user->travels)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Origin') ?></th>
                            <th><?= __('Destination') ?></th>
                            <th><?= __('Origin Locality Id') ?></th>
                            <th><?= __('Destination Locality Id') ?></th>
                            <th><?= __('Direction') ?></th>
                            <th><?= __('Date') ?></th>
                            <th><?= __('Original Date') ?></th>
                            <th><?= __('People Count') ?></th>
                            <th><?= __('Details') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('State') ?></th>
                            <th><?= __('Drivers Sent Count') ?></th>
                            <th><?= __('Drivers Sent By Admin Count') ?></th>
                            <th><?= __('Drivers Sent By User Count') ?></th>
                            <th><?= __('Need Modern Car') ?></th>
                            <th><?= __('Need Air Conditioner') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Created From Ip') ?></th>
                            <th><?= __('Archive Conversations Count') ?></th>
                            <th><?= __('Operator Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->travels as $travels) : ?>
                        <tr>
                            <td><?= h($travels->id) ?></td>
                            <td><?= h($travels->origin) ?></td>
                            <td><?= h($travels->destination) ?></td>
                            <td><?= h($travels->origin_locality_id) ?></td>
                            <td><?= h($travels->destination_locality_id) ?></td>
                            <td><?= h($travels->direction) ?></td>
                            <td><?= h($travels->date) ?></td>
                            <td><?= h($travels->original_date) ?></td>
                            <td><?= h($travels->people_count) ?></td>
                            <td><?= h($travels->details) ?></td>
                            <td><?= h($travels->user_id) ?></td>
                            <td><?= h($travels->state) ?></td>
                            <td><?= h($travels->drivers_sent_count) ?></td>
                            <td><?= h($travels->drivers_sent_by_admin_count) ?></td>
                            <td><?= h($travels->drivers_sent_by_user_count) ?></td>
                            <td><?= h($travels->need_modern_car) ?></td>
                            <td><?= h($travels->need_air_conditioner) ?></td>
                            <td><?= h($travels->created) ?></td>
                            <td><?= h($travels->modified) ?></td>
                            <td><?= h($travels->created_from_ip) ?></td>
                            <td><?= h($travels->archive_conversations_count) ?></td>
                            <td><?= h($travels->operator_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Travels', 'action' => 'view', $travels->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Travels', 'action' => 'edit', $travels->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Travels', 'action' => 'delete', $travels->id], ['confirm' => __('Are you sure you want to delete # {0}?', $travels->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related User Interactions') ?></h4>
                <?php if (!empty($user->user_interactions)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Interaction Code') ?></th>
                            <th><?= __('Interaction Due') ?></th>
                            <th><?= __('Context Values') ?></th>
                            <th><?= __('Sent') ?></th>
                            <th><?= __('Displayed') ?></th>
                            <th><?= __('Visited') ?></th>
                            <th><?= __('Expired') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->user_interactions as $userInteractions) : ?>
                        <tr>
                            <td><?= h($userInteractions->id) ?></td>
                            <td><?= h($userInteractions->user_id) ?></td>
                            <td><?= h($userInteractions->interaction_code) ?></td>
                            <td><?= h($userInteractions->interaction_due) ?></td>
                            <td><?= h($userInteractions->context_values) ?></td>
                            <td><?= h($userInteractions->sent) ?></td>
                            <td><?= h($userInteractions->displayed) ?></td>
                            <td><?= h($userInteractions->visited) ?></td>
                            <td><?= h($userInteractions->expired) ?></td>
                            <td><?= h($userInteractions->created) ?></td>
                            <td><?= h($userInteractions->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'UserInteractions', 'action' => 'view', $userInteractions->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'UserInteractions', 'action' => 'edit', $userInteractions->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserInteractions', 'action' => 'delete', $userInteractions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userInteractions->id)]) ?>
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
