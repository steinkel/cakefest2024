<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MemberRole $memberRole
 * @var \Cake\Collection\CollectionInterface|string[] $members
 * @var \Cake\Collection\CollectionInterface|string[] $roles
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Member Roles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="memberRoles form content">
            <?= $this->Form->create($memberRole) ?>
            <fieldset>
                <legend><?= __('Add Member Role') ?></legend>
                <?php
                    echo $this->Form->control('member_id', ['options' => $members]);
                    echo $this->Form->control('role_id', ['options' => $roles]);
                    echo $this->Form->control('inherited_from');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
