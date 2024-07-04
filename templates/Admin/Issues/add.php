<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Issue $issue
 * @var \Cake\Collection\CollectionInterface|string[] $trackers
 * @var \Cake\Collection\CollectionInterface|string[] $projects
 * @var \Cake\Collection\CollectionInterface|string[] $statuses
 * @var \Cake\Collection\CollectionInterface|string[] $parentIssues
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Issues'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="issues form content">
            <?= $this->Form->create($issue) ?>
            <fieldset>
                <legend><?= __('Add Issue') ?></legend>
                <?php
                    echo $this->Form->control('tracker_id', ['options' => $trackers]);
                    echo $this->Form->control('project_id', ['options' => $projects]);
                    echo $this->Form->control('subject');
                    echo $this->Form->control('description');
                    echo $this->Form->control('due_date', ['empty' => true]);
                    echo $this->Form->control('category_id');
                    echo $this->Form->control('status_id', ['options' => $statuses]);
                    echo $this->Form->control('assigned_to_id');
                    echo $this->Form->control('priority_id');
                    echo $this->Form->control('fixed_version_id');
                    echo $this->Form->control('author_id');
                    echo $this->Form->control('lock_version');
                    echo $this->Form->control('created_on', ['empty' => true]);
                    echo $this->Form->control('updated_on', ['empty' => true]);
                    echo $this->Form->control('start_date', ['empty' => true]);
                    echo $this->Form->control('done_ratio');
                    echo $this->Form->control('estimated_hours');
                    echo $this->Form->control('parent_id', ['options' => $parentIssues, 'empty' => true]);
                    echo $this->Form->control('root_id');
                    echo $this->Form->control('lft');
                    echo $this->Form->control('rgt');
                    echo $this->Form->control('is_private');
                    echo $this->Form->control('closed_on', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
