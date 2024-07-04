<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MemberRole $memberRole
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Member Role'), ['action' => 'edit', $memberRole->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Member Role'), ['action' => 'delete', $memberRole->id], ['confirm' => __('Are you sure you want to delete # {0}?', $memberRole->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Member Roles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Member Role'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="memberRoles view content">
            <h3><?= h($memberRole->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Member') ?></th>
                    <td><?= $memberRole->hasValue('member') ? $this->Html->link($memberRole->member->id, ['controller' => 'Members', 'action' => 'view', $memberRole->member->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= $memberRole->hasValue('role') ? $this->Html->link($memberRole->role->name, ['controller' => 'Roles', 'action' => 'view', $memberRole->role->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($memberRole->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Inherited From') ?></th>
                    <td><?= $memberRole->inherited_from === null ? '' : $this->Number->format($memberRole->inherited_from) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
