<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tracker $tracker
 * @var string[]|\Cake\Collection\CollectionInterface $projects
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tracker->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tracker->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Trackers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="trackers form content">
            <?= $this->Form->create($tracker) ?>
            <fieldset>
                <legend><?= __('Edit Tracker') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('description');
                    echo $this->Form->control('is_in_chlog');
                    echo $this->Form->control('position');
                    echo $this->Form->control('is_in_roadmap');
                    echo $this->Form->control('fields_bits');
                    echo $this->Form->control('default_status_id');
                    echo $this->Form->control('projects._ids', ['options' => $projects]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
