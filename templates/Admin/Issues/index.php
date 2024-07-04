<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Issue> $issues
 */
?>
<div class="issues index content">
    <?= $this->Html->link(__('New Issue'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Issues') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('tracker_id') ?></th>
                    <th><?= $this->Paginator->sort('project_id') ?></th>
                    <th><?= $this->Paginator->sort('subject') ?></th>
                    <th><?= $this->Paginator->sort('due_date') ?></th>
                    <th><?= $this->Paginator->sort('category_id') ?></th>
                    <th><?= $this->Paginator->sort('status_id') ?></th>
                    <th><?= $this->Paginator->sort('assigned_to_id') ?></th>
                    <th><?= $this->Paginator->sort('priority_id') ?></th>
                    <th><?= $this->Paginator->sort('fixed_version_id') ?></th>
                    <th><?= $this->Paginator->sort('author_id') ?></th>
                    <th><?= $this->Paginator->sort('lock_version') ?></th>
                    <th><?= $this->Paginator->sort('created_on') ?></th>
                    <th><?= $this->Paginator->sort('updated_on') ?></th>
                    <th><?= $this->Paginator->sort('start_date') ?></th>
                    <th><?= $this->Paginator->sort('done_ratio') ?></th>
                    <th><?= $this->Paginator->sort('estimated_hours') ?></th>
                    <th><?= $this->Paginator->sort('parent_id') ?></th>
                    <th><?= $this->Paginator->sort('root_id') ?></th>
                    <th><?= $this->Paginator->sort('lft') ?></th>
                    <th><?= $this->Paginator->sort('rgt') ?></th>
                    <th><?= $this->Paginator->sort('is_private') ?></th>
                    <th><?= $this->Paginator->sort('closed_on') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($issues as $issue): ?>
                <tr>
                    <td><?= $this->Number->format($issue->id) ?></td>
                    <td><?= $issue->hasValue('tracker') ? $this->Html->link($issue->tracker->name, ['controller' => 'Trackers', 'action' => 'view', $issue->tracker->id]) : '' ?></td>
                    <td><?= $issue->hasValue('project') ? $this->Html->link($issue->project->name, ['controller' => 'Projects', 'action' => 'view', $issue->project->id]) : '' ?></td>
                    <td><?= h($issue->subject) ?></td>
                    <td><?= h($issue->due_date) ?></td>
                    <td><?= $issue->category_id === null ? '' : $this->Number->format($issue->category_id) ?></td>
                    <td><?= $issue->hasValue('status') ? $this->Html->link($issue->status->id, ['controller' => 'Statuses', 'action' => 'view', $issue->status->id]) : '' ?></td>
                    <td><?= $issue->assigned_to_id === null ? '' : $this->Number->format($issue->assigned_to_id) ?></td>
                    <td><?= $this->Number->format($issue->priority_id) ?></td>
                    <td><?= $issue->fixed_version_id === null ? '' : $this->Number->format($issue->fixed_version_id) ?></td>
                    <td><?= $this->Number->format($issue->author_id) ?></td>
                    <td><?= $this->Number->format($issue->lock_version) ?></td>
                    <td><?= h($issue->created_on) ?></td>
                    <td><?= h($issue->updated_on) ?></td>
                    <td><?= h($issue->start_date) ?></td>
                    <td><?= $this->Number->format($issue->done_ratio) ?></td>
                    <td><?= $issue->estimated_hours === null ? '' : $this->Number->format($issue->estimated_hours) ?></td>
                    <td><?= $issue->hasValue('parent_issue') ? $this->Html->link($issue->parent_issue->subject, ['controller' => 'Issues', 'action' => 'view', $issue->parent_issue->id]) : '' ?></td>
                    <td><?= $issue->root_id === null ? '' : $this->Number->format($issue->root_id) ?></td>
                    <td><?= $issue->lft === null ? '' : $this->Number->format($issue->lft) ?></td>
                    <td><?= $issue->rgt === null ? '' : $this->Number->format($issue->rgt) ?></td>
                    <td><?= h($issue->is_private) ?></td>
                    <td><?= h($issue->closed_on) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $issue->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $issue->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $issue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $issue->id)]) ?>
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
