<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Role> $roles
 */
?>
<div class="roles index content">
    <?= $this->Html->link(__('New Role'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Roles') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('position') ?></th>
                    <th><?= $this->Paginator->sort('assignable') ?></th>
                    <th><?= $this->Paginator->sort('builtin') ?></th>
                    <th><?= $this->Paginator->sort('issues_visibility') ?></th>
                    <th><?= $this->Paginator->sort('users_visibility') ?></th>
                    <th><?= $this->Paginator->sort('time_entries_visibility') ?></th>
                    <th><?= $this->Paginator->sort('all_roles_managed') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($roles as $role) : ?>
                <tr>
                    <td><?= $this->Number->format($role->id) ?></td>
                    <td><?= h($role->name) ?></td>
                    <td><?= $role->position === null ? '' : $this->Number->format($role->position) ?></td>
                    <td><?= h($role->assignable) ?></td>
                    <td><?= $this->Number->format($role->builtin) ?></td>
                    <td><?= h($role->issues_visibility) ?></td>
                    <td><?= h($role->users_visibility) ?></td>
                    <td><?= h($role->time_entries_visibility) ?></td>
                    <td><?= h($role->all_roles_managed) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $role->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $role->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id)]) ?>
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
