<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Testimonial $testimonial
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Testimonial'), ['action' => 'edit', $testimonial->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Testimonial'), ['action' => 'delete', $testimonial->id], ['confirm' => __('Are you sure you want to delete # {0}?', $testimonial->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Testimonials'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Testimonial'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="testimonials view content">
            <h3><?= h($testimonial->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($testimonial->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Author') ?></th>
                    <td><?= h($testimonial->author) ?></td>
                </tr>
                <tr>
                    <th><?= __('Country') ?></th>
                    <td><?= h($testimonial->country) ?></td>
                </tr>
                <tr>
                    <th><?= __('State') ?></th>
                    <td><?= h($testimonial->state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lang') ?></th>
                    <td><?= h($testimonial->lang) ?></td>
                </tr>
                <tr>
                    <th><?= __('Image Filepath') ?></th>
                    <td><?= h($testimonial->image_filepath) ?></td>
                </tr>
                <tr>
                    <th><?= __('Conversation') ?></th>
                    <td><?= $testimonial->has('conversation') ? $this->Html->link($testimonial->conversation->id, ['controller' => 'Conversations', 'action' => 'view', $testimonial->conversation->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Driver') ?></th>
                    <td><?= $testimonial->has('driver') ? $this->Html->link($testimonial->driver->name, ['controller' => 'Drivers', 'action' => 'view', $testimonial->driver->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($testimonial->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Validation Token') ?></th>
                    <td><?= h($testimonial->validation_token) ?></td>
                </tr>
                <tr>
                    <th><?= __('Driver Reply Token') ?></th>
                    <td><?= h($testimonial->driver_reply_token) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($testimonial->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($testimonial->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Validated') ?></th>
                    <td><?= $testimonial->validated ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Featured') ?></th>
                    <td><?= $testimonial->featured ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Use As Sample') ?></th>
                    <td><?= $testimonial->use_as_sample ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Text') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($testimonial->text)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Testimonials Replies') ?></h4>
                <?php if (!empty($testimonial->testimonials_replies)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Testimonial Id') ?></th>
                            <th><?= __('Reply Text') ?></th>
                            <th><?= __('Reply By') ?></th>
                            <th><?= __('State') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($testimonial->testimonials_replies as $testimonialsReplies) : ?>
                        <tr>
                            <td><?= h($testimonialsReplies->id) ?></td>
                            <td><?= h($testimonialsReplies->testimonial_id) ?></td>
                            <td><?= h($testimonialsReplies->reply_text) ?></td>
                            <td><?= h($testimonialsReplies->reply_by) ?></td>
                            <td><?= h($testimonialsReplies->state) ?></td>
                            <td><?= h($testimonialsReplies->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'TestimonialsReplies', 'action' => 'view', $testimonialsReplies->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'TestimonialsReplies', 'action' => 'edit', $testimonialsReplies->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'TestimonialsReplies', 'action' => 'delete', $testimonialsReplies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $testimonialsReplies->id)]) ?>
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
