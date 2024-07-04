<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Status $status
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $projects
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $status->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $status->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Statuses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="statuses form content">
            <?= $this->Form->create($status) ?>
            <fieldset>
                <legend><?= __('Edit Status') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('project_id', ['options' => $projects, 'empty' => true]);
                    echo $this->Form->control('message');
                    echo $this->Form->control('created_at', ['empty' => true]);
                    echo $this->Form->control('updated_at', ['empty' => true]);
                    echo $this->Form->control('created_on', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
