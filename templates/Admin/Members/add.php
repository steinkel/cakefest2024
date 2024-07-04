<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Member $member
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $projects
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Members'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="members form content">
            <?= $this->Form->create($member) ?>
            <fieldset>
                <legend><?= __('Add Member') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('project_id', ['options' => $projects]);
                    echo $this->Form->control('created_on', ['empty' => true]);
                    echo $this->Form->control('mail_notification');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
