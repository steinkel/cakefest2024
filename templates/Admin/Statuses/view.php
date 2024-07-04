<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Status $status
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Status'), ['action' => 'edit', $status->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Status'), ['action' => 'delete', $status->id], ['confirm' => __('Are you sure you want to delete # {0}?', $status->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Statuses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Status'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="statuses view content">
            <h3><?= h($status->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $status->hasValue('user') ? $this->Html->link($status->user->login, ['controller' => 'Users', 'action' => 'view', $status->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Project') ?></th>
                    <td><?= $status->hasValue('project') ? $this->Html->link($status->project->name, ['controller' => 'Projects', 'action' => 'view', $status->project->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Message') ?></th>
                    <td><?= h($status->message) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($status->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($status->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($status->updated_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created On') ?></th>
                    <td><?= h($status->created_on) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Issues') ?></h4>
                <?php if (!empty($status->issues)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Tracker Id') ?></th>
                            <th><?= __('Project Id') ?></th>
                            <th><?= __('Subject') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Due Date') ?></th>
                            <th><?= __('Category Id') ?></th>
                            <th><?= __('Status Id') ?></th>
                            <th><?= __('Assigned To Id') ?></th>
                            <th><?= __('Priority Id') ?></th>
                            <th><?= __('Fixed Version Id') ?></th>
                            <th><?= __('Author Id') ?></th>
                            <th><?= __('Lock Version') ?></th>
                            <th><?= __('Created On') ?></th>
                            <th><?= __('Updated On') ?></th>
                            <th><?= __('Start Date') ?></th>
                            <th><?= __('Done Ratio') ?></th>
                            <th><?= __('Estimated Hours') ?></th>
                            <th><?= __('Parent Id') ?></th>
                            <th><?= __('Root Id') ?></th>
                            <th><?= __('Lft') ?></th>
                            <th><?= __('Rgt') ?></th>
                            <th><?= __('Is Private') ?></th>
                            <th><?= __('Closed On') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($status->issues as $issue) : ?>
                        <tr>
                            <td><?= h($issue->id) ?></td>
                            <td><?= h($issue->tracker_id) ?></td>
                            <td><?= h($issue->project_id) ?></td>
                            <td><?= h($issue->subject) ?></td>
                            <td><?= h($issue->description) ?></td>
                            <td><?= h($issue->due_date) ?></td>
                            <td><?= h($issue->category_id) ?></td>
                            <td><?= h($issue->status_id) ?></td>
                            <td><?= h($issue->assigned_to_id) ?></td>
                            <td><?= h($issue->priority_id) ?></td>
                            <td><?= h($issue->fixed_version_id) ?></td>
                            <td><?= h($issue->author_id) ?></td>
                            <td><?= h($issue->lock_version) ?></td>
                            <td><?= h($issue->created_on) ?></td>
                            <td><?= h($issue->updated_on) ?></td>
                            <td><?= h($issue->start_date) ?></td>
                            <td><?= h($issue->done_ratio) ?></td>
                            <td><?= h($issue->estimated_hours) ?></td>
                            <td><?= h($issue->parent_id) ?></td>
                            <td><?= h($issue->root_id) ?></td>
                            <td><?= h($issue->lft) ?></td>
                            <td><?= h($issue->rgt) ?></td>
                            <td><?= h($issue->is_private) ?></td>
                            <td><?= h($issue->closed_on) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Issues', 'action' => 'view', $issue->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Issues', 'action' => 'edit', $issue->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Issues', 'action' => 'delete', $issue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $issue->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
