<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Project> $projects
 */
?>
<div class="projects index content">
    <?= $this->Html->link(__('New Project'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Projects') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('homepage') ?></th>
                    <th><?= $this->Paginator->sort('is_public') ?></th>
                    <th><?= $this->Paginator->sort('parent_id') ?></th>
                    <th><?= $this->Paginator->sort('created_on') ?></th>
                    <th><?= $this->Paginator->sort('updated_on') ?></th>
                    <th><?= $this->Paginator->sort('identifier') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('lft') ?></th>
                    <th><?= $this->Paginator->sort('rgt') ?></th>
                    <th><?= $this->Paginator->sort('inherit_members') ?></th>
                    <th><?= $this->Paginator->sort('default_version_id') ?></th>
                    <th><?= $this->Paginator->sort('default_assigned_to_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projects as $project): ?>
                <tr>
                    <td><?= $this->Number->format($project->id) ?></td>
                    <td><?= h($project->name) ?></td>
                    <td><?= h($project->homepage) ?></td>
                    <td><?= h($project->is_public) ?></td>
                    <td><?= $project->hasValue('parent_project') ? $this->Html->link($project->parent_project->name, ['controller' => 'Projects', 'action' => 'view', $project->parent_project->id]) : '' ?></td>
                    <td><?= h($project->created_on) ?></td>
                    <td><?= h($project->updated_on) ?></td>
                    <td><?= h($project->identifier) ?></td>
                    <td><?= $this->Number->format($project->status) ?></td>
                    <td><?= $project->lft === null ? '' : $this->Number->format($project->lft) ?></td>
                    <td><?= $project->rgt === null ? '' : $this->Number->format($project->rgt) ?></td>
                    <td><?= h($project->inherit_members) ?></td>
                    <td><?= $project->default_version_id === null ? '' : $this->Number->format($project->default_version_id) ?></td>
                    <td><?= $project->default_assigned_to_id === null ? '' : $this->Number->format($project->default_assigned_to_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $project->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $project->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)]) ?>
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
