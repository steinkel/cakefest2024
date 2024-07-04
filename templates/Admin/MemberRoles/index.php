<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\MemberRole> $memberRoles
 */
?>
<div class="memberRoles index content">
    <?= $this->Html->link(__('New Member Role'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Member Roles') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('member_id') ?></th>
                    <th><?= $this->Paginator->sort('role_id') ?></th>
                    <th><?= $this->Paginator->sort('inherited_from') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($memberRoles as $memberRole) : ?>
                <tr>
                    <td><?= $this->Number->format($memberRole->id) ?></td>
                    <td><?= $memberRole->hasValue('member') ? $this->Html->link($memberRole->member->id, ['controller' => 'Members', 'action' => 'view', $memberRole->member->id]) : '' ?></td>
                    <td><?= $memberRole->hasValue('role') ? $this->Html->link($memberRole->role->name, ['controller' => 'Roles', 'action' => 'view', $memberRole->role->id]) : '' ?></td>
                    <td><?= $memberRole->inherited_from === null ? '' : $this->Number->format($memberRole->inherited_from) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $memberRole->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $memberRole->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $memberRole->id], ['confirm' => __('Are you sure you want to delete # {0}?', $memberRole->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
