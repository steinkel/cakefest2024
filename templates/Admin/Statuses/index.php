<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Status> $statuses
 */
?>
<div class="statuses index content">
    <?= $this->Html->link(__('New Status'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Statuses') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('project_id') ?></th>
                    <th><?= $this->Paginator->sort('message') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th><?= $this->Paginator->sort('created_on') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($statuses as $status) : ?>
                <tr>
                    <td><?= $this->Number->format($status->id) ?></td>
                    <td><?= $status->hasValue('user') ? $this->Html->link($status->user->login, ['controller' => 'Users', 'action' => 'view', $status->user->id]) : '' ?></td>
                    <td><?= $status->hasValue('project') ? $this->Html->link($status->project->name, ['controller' => 'Projects', 'action' => 'view', $status->project->id]) : '' ?></td>
                    <td><?= h($status->message) ?></td>
                    <td><?= h($status->created_at) ?></td>
                    <td><?= h($status->updated_at) ?></td>
                    <td><?= h($status->created_on) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $status->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $status->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $status->id], ['confirm' => __('Are you sure you want to delete # {0}?', $status->id)]) ?>
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
