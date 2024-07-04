<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $role->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $role->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Roles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="roles form content">
            <?= $this->Form->create($role) ?>
            <fieldset>
                <legend><?= __('Edit Role') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('position');
                    echo $this->Form->control('assignable');
                    echo $this->Form->control('builtin');
                    echo $this->Form->control('permissions');
                    echo $this->Form->control('issues_visibility');
                    echo $this->Form->control('users_visibility');
                    echo $this->Form->control('time_entries_visibility');
                    echo $this->Form->control('all_roles_managed');
                    echo $this->Form->control('settings');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
