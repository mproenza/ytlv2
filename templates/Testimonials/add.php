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
            <?= $this->Html->link(__('List Testimonials'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="testimonials form content">
            <?= $this->Form->create($testimonial) ?>
            <fieldset>
                <legend><?= __('Add Testimonial') ?></legend>
                <?php
                    echo $this->Form->control('author');
                    echo $this->Form->control('country');
                    echo $this->Form->control('text');
                    echo $this->Form->control('state');
                    echo $this->Form->control('lang');
                    echo $this->Form->control('image_filepath');
                    echo $this->Form->control('conversation_id', ['options' => $conversations, 'empty' => true]);
                    echo $this->Form->control('driver_id', ['options' => $drivers]);
                    echo $this->Form->control('email');
                    echo $this->Form->control('validation_token');
                    echo $this->Form->control('driver_reply_token');
                    echo $this->Form->control('validated');
                    echo $this->Form->control('featured');
                    echo $this->Form->control('use_as_sample');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
