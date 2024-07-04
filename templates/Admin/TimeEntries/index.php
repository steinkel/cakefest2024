<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\TimeEntry> $timeEntries
 */
?>
<div class="timeEntries index content">
    <?= $this->Html->link(__('New Time Entry'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Time Entries') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('project_id') ?></th>
                    <th><?= $this->Paginator->sort('author_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('issue_id') ?></th>
                    <th><?= $this->Paginator->sort('hours') ?></th>
                    <th><?= $this->Paginator->sort('comments') ?></th>
                    <th><?= $this->Paginator->sort('activity_id') ?></th>
                    <th><?= $this->Paginator->sort('spent_on') ?></th>
                    <th><?= $this->Paginator->sort('tyear') ?></th>
                    <th><?= $this->Paginator->sort('tmonth') ?></th>
                    <th><?= $this->Paginator->sort('tweek') ?></th>
                    <th><?= $this->Paginator->sort('created_on') ?></th>
                    <th><?= $this->Paginator->sort('updated_on') ?></th>
                    <th><?= $this->Paginator->sort('rate_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($timeEntries as $timeEntry) : ?>
                <tr>
                    <td><?= $this->Number->format($timeEntry->id) ?></td>
                    <td><?= $timeEntry->hasValue('project') ? $this->Html->link($timeEntry->project->name, ['controller' => 'Projects', 'action' => 'view', $timeEntry->project->id]) : '' ?></td>
                    <td><?= $timeEntry->author_id === null ? '' : $this->Number->format($timeEntry->author_id) ?></td>
                    <td><?= $timeEntry->hasValue('user') ? $this->Html->link($timeEntry->user->login, ['controller' => 'Users', 'action' => 'view', $timeEntry->user->id]) : '' ?></td>
                    <td><?= $timeEntry->hasValue('issue') ? $this->Html->link($timeEntry->issue->subject, ['controller' => 'Issues', 'action' => 'view', $timeEntry->issue->id]) : '' ?></td>
                    <td><?= $this->Number->format($timeEntry->hours) ?></td>
                    <td><?= h($timeEntry->comments) ?></td>
                    <td><?= $this->Number->format($timeEntry->activity_id) ?></td>
                    <td><?= h($timeEntry->spent_on) ?></td>
                    <td><?= $this->Number->format($timeEntry->tyear) ?></td>
                    <td><?= $this->Number->format($timeEntry->tmonth) ?></td>
                    <td><?= $this->Number->format($timeEntry->tweek) ?></td>
                    <td><?= h($timeEntry->created_on) ?></td>
                    <td><?= h($timeEntry->updated_on) ?></td>
                    <td><?= $timeEntry->rate_id === null ? '' : $this->Number->format($timeEntry->rate_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $timeEntry->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $timeEntry->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $timeEntry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $timeEntry->id)]) ?>
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
