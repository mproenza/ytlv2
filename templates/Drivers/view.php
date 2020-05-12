<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Driver $driver
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Driver'), ['action' => 'edit', $driver->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Driver'), ['action' => 'delete', $driver->id], ['confirm' => __('Are you sure you want to delete # {0}?', $driver->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Drivers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Driver'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="drivers view content">
            <h3><?= h($driver->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Username') ?></th>
                    <td><?= h($driver->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Password') ?></th>
                    <td><?= h($driver->password) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($driver->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Web Auth Token') ?></th>
                    <td><?= h($driver->web_auth_token) ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= h($driver->role) ?></td>
                </tr>
                <tr>
                    <th><?= __('Province') ?></th>
                    <td><?= $driver->has('province') ? $this->Html->link($driver->province->name, ['controller' => 'Provinces', 'action' => 'view', $driver->province->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($driver->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $driver->has('user') ? $this->Html->link($driver->user->id, ['controller' => 'Users', 'action' => 'view', $driver->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($driver->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Min People Count') ?></th>
                    <td><?= $this->Number->format($driver->min_people_count) ?></td>
                </tr>
                <tr>
                    <th><?= __('Max People Count') ?></th>
                    <td><?= $this->Number->format($driver->max_people_count) ?></td>
                </tr>
                <tr>
                    <th><?= __('Travel Count') ?></th>
                    <td><?= $this->Number->format($driver->travel_count) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Notification Date') ?></th>
                    <td><?= h($driver->last_notification_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($driver->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Active') ?></th>
                    <td><?= $driver->active ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Receive Requests') ?></th>
                    <td><?= $driver->receive_requests ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Has Modern Car') ?></th>
                    <td><?= $driver->has_modern_car ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Has Classic Car') ?></th>
                    <td><?= $driver->has_classic_car ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Has Air Conditioner') ?></th>
                    <td><?= $driver->has_air_conditioner ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Speaks English') ?></th>
                    <td><?= $driver->speaks_english ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Mobile App Active') ?></th>
                    <td><?= $driver->mobile_app_active ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Email Active') ?></th>
                    <td><?= $driver->email_active ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Localities') ?></h4>
                <?php if (!empty($driver->localities)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Province Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($driver->localities as $localities) : ?>
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
            <div class="related">
                <h4><?= __('Related Activity Driver Subscriptions') ?></h4>
                <?php if (!empty($driver->activity_driver_subscriptions)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Driver Id') ?></th>
                            <th><?= __('Activity Id') ?></th>
                            <th><?= __('Price') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($driver->activity_driver_subscriptions as $activityDriverSubscriptions) : ?>
                        <tr>
                            <td><?= h($activityDriverSubscriptions->id) ?></td>
                            <td><?= h($activityDriverSubscriptions->driver_id) ?></td>
                            <td><?= h($activityDriverSubscriptions->activity_id) ?></td>
                            <td><?= h($activityDriverSubscriptions->price) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ActivityDriverSubscriptions', 'action' => 'view', $activityDriverSubscriptions->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ActivityDriverSubscriptions', 'action' => 'edit', $activityDriverSubscriptions->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ActivityDriverSubscriptions', 'action' => 'delete', $activityDriverSubscriptions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $activityDriverSubscriptions->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Archive Drivers Travels') ?></h4>
                <?php if (!empty($driver->archive_drivers_travels)) : ?>
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
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($driver->archive_drivers_travels as $archiveDriversTravels) : ?>
                        <tr>
                            <td><?= h($archiveDriversTravels->id) ?></td>
                            <td><?= h($archiveDriversTravels->driver_id) ?></td>
                            <td><?= h($archiveDriversTravels->travel_id) ?></td>
                            <td><?= h($archiveDriversTravels->notification_type) ?></td>
                            <td><?= h($archiveDriversTravels->last_driver_email) ?></td>
                            <td><?= h($archiveDriversTravels->message_count) ?></td>
                            <td><?= h($archiveDriversTravels->notified_by) ?></td>
                            <td><?= h($archiveDriversTravels->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ArchiveDriversTravels', 'action' => 'view', $archiveDriversTravels->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ArchiveDriversTravels', 'action' => 'edit', $archiveDriversTravels->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ArchiveDriversTravels', 'action' => 'delete', $archiveDriversTravels->id], ['confirm' => __('Are you sure you want to delete # {0}?', $archiveDriversTravels->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Conversations') ?></h4>
                <?php if (!empty($driver->conversations)) : ?>
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
                        <?php foreach ($driver->conversations as $conversations) : ?>
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
                <h4><?= __('Related Discount Rides') ?></h4>
                <?php if (!empty($driver->discount_rides)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Driver Id') ?></th>
                            <th><?= __('Origin') ?></th>
                            <th><?= __('Destination') ?></th>
                            <th><?= __('People Count') ?></th>
                            <th><?= __('Date') ?></th>
                            <th><?= __('Hour Min') ?></th>
                            <th><?= __('Hour Max') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Is Booked') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Active') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($driver->discount_rides as $discountRides) : ?>
                        <tr>
                            <td><?= h($discountRides->id) ?></td>
                            <td><?= h($discountRides->driver_id) ?></td>
                            <td><?= h($discountRides->origin) ?></td>
                            <td><?= h($discountRides->destination) ?></td>
                            <td><?= h($discountRides->people_count) ?></td>
                            <td><?= h($discountRides->date) ?></td>
                            <td><?= h($discountRides->hour_min) ?></td>
                            <td><?= h($discountRides->hour_max) ?></td>
                            <td><?= h($discountRides->price) ?></td>
                            <td><?= h($discountRides->is_booked) ?></td>
                            <td><?= h($discountRides->created) ?></td>
                            <td><?= h($discountRides->active) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'DiscountRides', 'action' => 'view', $discountRides->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'DiscountRides', 'action' => 'edit', $discountRides->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'DiscountRides', 'action' => 'delete', $discountRides->id], ['confirm' => __('Are you sure you want to delete # {0}?', $discountRides->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Drivers Profiles') ?></h4>
                <?php if (!empty($driverprofiles)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Driver Id') ?></th>
                            <th><?= __('Driver Nick') ?></th>
                            <th><?= __('Driver Name') ?></th>
                            <th><?= __('Avatar Filepath') ?></th>
                            <th><?= __('Featured Img Url') ?></th>
                            <th><?= __('Description Es') ?></th>
                            <th><?= __('Description En') ?></th>
                            <th><?= __('Show Profile') ?></th>
                            <th><?= __('Driver Code') ?></th>
                            <th><?= __('Testimonial Attempts') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($driverprofiles as $driversProfiles) : ?>
                        <tr>
                            <td><?= h($driversProfiles->id) ?></td>
                            <td><?= h($driversProfiles->driver_id) ?></td>
                            <td><?= h($driversProfiles->driver_nick) ?></td>
                            <td><?= h($driversProfiles->driver_name) ?></td>
                            <td><?= h($driversProfiles->avatar_filepath) ?></td>
                            <td><?= h($driversProfiles->featured_img_url) ?></td>
                            <td><?= h($driversProfiles->description_es) ?></td>
                            <td><?= h($driversProfiles->description_en) ?></td>
                            <td><?= h($driversProfiles->show_profile) ?></td>
                            <td><?= h($driversProfiles->driver_code) ?></td>
                            <td><?= h($driversProfiles->testimonial_attempts) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'DriversProfiles', 'action' => 'view', $driversProfiles->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'DriversProfiles', 'action' => 'edit', $driversProfiles->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'DriversProfiles', 'action' => 'delete', $driversProfiles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $driversProfiles->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Drivers Transactional Emails') ?></h4>
                <?php if (!empty($driver->drivers_transactional_emails)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Driver Id') ?></th>
                            <th><?= __('Transaction Type') ?></th>
                            <th><?= __('Last Sent') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($driver->drivers_transactional_emails as $driversTransactionalEmails) : ?>
                        <tr>
                            <td><?= h($driversTransactionalEmails->id) ?></td>
                            <td><?= h($driversTransactionalEmails->driver_id) ?></td>
                            <td><?= h($driversTransactionalEmails->transaction_type) ?></td>
                            <td><?= h($driversTransactionalEmails->last_sent) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'DriversTransactionalEmails', 'action' => 'view', $driversTransactionalEmails->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'DriversTransactionalEmails', 'action' => 'edit', $driversTransactionalEmails->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'DriversTransactionalEmails', 'action' => 'delete', $driversTransactionalEmails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $driversTransactionalEmails->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Drivers Travels By Email') ?></h4>
                <?php if (!empty($driver->drivers_travels_by_email)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Driver Id') ?></th>
                            <th><?= __('Travel Id') ?></th>
                            <th><?= __('Sent') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($driver->drivers_travels_by_email as $driversTravelsByEmail) : ?>
                        <tr>
                            <td><?= h($driversTravelsByEmail->id) ?></td>
                            <td><?= h($driversTravelsByEmail->driver_id) ?></td>
                            <td><?= h($driversTravelsByEmail->travel_id) ?></td>
                            <td><?= h($driversTravelsByEmail->sent) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'DriversTravelsByEmail', 'action' => 'view', $driversTravelsByEmail->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'DriversTravelsByEmail', 'action' => 'edit', $driversTravelsByEmail->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'DriversTravelsByEmail', 'action' => 'delete', $driversTravelsByEmail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $driversTravelsByEmail->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Testimonials') ?></h4>
                <?php if (!empty($driver->testimonials)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Author') ?></th>
                            <th><?= __('Country') ?></th>
                            <th><?= __('Text') ?></th>
                            <th><?= __('State') ?></th>
                            <th><?= __('Lang') ?></th>
                            <th><?= __('Image Filepath') ?></th>
                            <th><?= __('Conversation Id') ?></th>
                            <th><?= __('Driver Id') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Validation Token') ?></th>
                            <th><?= __('Driver Reply Token') ?></th>
                            <th><?= __('Validated') ?></th>
                            <th><?= __('Featured') ?></th>
                            <th><?= __('Use As Sample') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($driver->testimonials as $testimonials) : ?>
                        <tr>
                            <td><?= h($testimonials->id) ?></td>
                            <td><?= h($testimonials->author) ?></td>
                            <td><?= h($testimonials->country) ?></td>
                            <td><?= h($testimonials->text) ?></td>
                            <td><?= h($testimonials->state) ?></td>
                            <td><?= h($testimonials->lang) ?></td>
                            <td><?= h($testimonials->image_filepath) ?></td>
                            <td><?= h($testimonials->conversation_id) ?></td>
                            <td><?= h($testimonials->driver_id) ?></td>
                            <td><?= h($testimonials->email) ?></td>
                            <td><?= h($testimonials->created) ?></td>
                            <td><?= h($testimonials->modified) ?></td>
                            <td><?= h($testimonials->validation_token) ?></td>
                            <td><?= h($testimonials->driver_reply_token) ?></td>
                            <td><?= h($testimonials->validated) ?></td>
                            <td><?= h($testimonials->featured) ?></td>
                            <td><?= h($testimonials->use_as_sample) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Testimonials', 'action' => 'view', $testimonials->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Testimonials', 'action' => 'edit', $testimonials->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Testimonials', 'action' => 'delete', $testimonials->id], ['confirm' => __('Are you sure you want to delete # {0}?', $testimonials->id)]) ?>
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
