<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TimeEntry $timeEntry
 * @var \Cake\Collection\CollectionInterface|string[] $projects
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $issues
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Time Entries'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="timeEntries form content">
            <?= $this->Form->create($timeEntry) ?>
            <fieldset>
                <legend><?= __('Add Time Entry') ?></legend>
                <?php
                    echo $this->Form->control('project_id', ['options' => $projects]);
                    echo $this->Form->control('author_id');
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('issue_id', ['options' => $issues, 'empty' => true]);
                    echo $this->Form->control('hours');
                    echo $this->Form->control('comments');
                    echo $this->Form->control('activity_id');
                    echo $this->Form->control('spent_on');
                    echo $this->Form->control('tyear');
                    echo $this->Form->control('tmonth');
                    echo $this->Form->control('tweek');
                    echo $this->Form->control('created_on');
                    echo $this->Form->control('updated_on');
                    echo $this->Form->control('rate_id');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
