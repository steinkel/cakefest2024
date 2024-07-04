<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\IssueCategory> $issueCategories
 */
?>
<div class="issueCategories index content">
    <?= $this->Html->link(__('New Issue Category'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Issue Categories') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('project_id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('assigned_to_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($issueCategories as $issueCategory) : ?>
                <tr>
                    <td><?= $this->Number->format($issueCategory->id) ?></td>
                    <td><?= $issueCategory->hasValue('project') ? $this->Html->link($issueCategory->project->name, ['controller' => 'Projects', 'action' => 'view', $issueCategory->project->id]) : '' ?></td>
                    <td><?= h($issueCategory->name) ?></td>
                    <td><?= $issueCategory->assigned_to_id === null ? '' : $this->Number->format($issueCategory->assigned_to_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $issueCategory->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $issueCategory->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $issueCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $issueCategory->id)]) ?>
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
