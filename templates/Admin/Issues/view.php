<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Issue $issue
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Issue'), ['action' => 'edit', $issue->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Issue'), ['action' => 'delete', $issue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $issue->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Issues'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Issue'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="issues view content">
            <h3><?= h($issue->subject) ?></h3>
            <table>
                <tr>
                    <th><?= __('Tracker') ?></th>
                    <td><?= $issue->hasValue('tracker') ? $this->Html->link($issue->tracker->name, ['controller' => 'Trackers', 'action' => 'view', $issue->tracker->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Project') ?></th>
                    <td><?= $issue->hasValue('project') ? $this->Html->link($issue->project->name, ['controller' => 'Projects', 'action' => 'view', $issue->project->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Subject') ?></th>
                    <td><?= h($issue->subject) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $issue->hasValue('status') ? $this->Html->link($issue->status->id, ['controller' => 'Statuses', 'action' => 'view', $issue->status->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Parent Issue') ?></th>
                    <td><?= $issue->hasValue('parent_issue') ? $this->Html->link($issue->parent_issue->subject, ['controller' => 'Issues', 'action' => 'view', $issue->parent_issue->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($issue->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Category Id') ?></th>
                    <td><?= $issue->category_id === null ? '' : $this->Number->format($issue->category_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Assigned To Id') ?></th>
                    <td><?= $issue->assigned_to_id === null ? '' : $this->Number->format($issue->assigned_to_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Priority Id') ?></th>
                    <td><?= $this->Number->format($issue->priority_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fixed Version Id') ?></th>
                    <td><?= $issue->fixed_version_id === null ? '' : $this->Number->format($issue->fixed_version_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Author Id') ?></th>
                    <td><?= $this->Number->format($issue->author_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lock Version') ?></th>
                    <td><?= $this->Number->format($issue->lock_version) ?></td>
                </tr>
                <tr>
                    <th><?= __('Done Ratio') ?></th>
                    <td><?= $this->Number->format($issue->done_ratio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Estimated Hours') ?></th>
                    <td><?= $issue->estimated_hours === null ? '' : $this->Number->format($issue->estimated_hours) ?></td>
                </tr>
                <tr>
                    <th><?= __('Root Id') ?></th>
                    <td><?= $issue->root_id === null ? '' : $this->Number->format($issue->root_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lft') ?></th>
                    <td><?= $issue->lft === null ? '' : $this->Number->format($issue->lft) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rgt') ?></th>
                    <td><?= $issue->rgt === null ? '' : $this->Number->format($issue->rgt) ?></td>
                </tr>
                <tr>
                    <th><?= __('Due Date') ?></th>
                    <td><?= h($issue->due_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created On') ?></th>
                    <td><?= h($issue->created_on) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated On') ?></th>
                    <td><?= h($issue->updated_on) ?></td>
                </tr>
                <tr>
                    <th><?= __('Start Date') ?></th>
                    <td><?= h($issue->start_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Closed On') ?></th>
                    <td><?= h($issue->closed_on) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Private') ?></th>
                    <td><?= $issue->is_private ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($issue->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Issues') ?></h4>
                <?php if (!empty($issue->child_issues)) : ?>
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
                        <?php foreach ($issue->child_issues as $childIssue) : ?>
                        <tr>
                            <td><?= h($childIssue->id) ?></td>
                            <td><?= h($childIssue->tracker_id) ?></td>
                            <td><?= h($childIssue->project_id) ?></td>
                            <td><?= h($childIssue->subject) ?></td>
                            <td><?= h($childIssue->description) ?></td>
                            <td><?= h($childIssue->due_date) ?></td>
                            <td><?= h($childIssue->category_id) ?></td>
                            <td><?= h($childIssue->status_id) ?></td>
                            <td><?= h($childIssue->assigned_to_id) ?></td>
                            <td><?= h($childIssue->priority_id) ?></td>
                            <td><?= h($childIssue->fixed_version_id) ?></td>
                            <td><?= h($childIssue->author_id) ?></td>
                            <td><?= h($childIssue->lock_version) ?></td>
                            <td><?= h($childIssue->created_on) ?></td>
                            <td><?= h($childIssue->updated_on) ?></td>
                            <td><?= h($childIssue->start_date) ?></td>
                            <td><?= h($childIssue->done_ratio) ?></td>
                            <td><?= h($childIssue->estimated_hours) ?></td>
                            <td><?= h($childIssue->parent_id) ?></td>
                            <td><?= h($childIssue->root_id) ?></td>
                            <td><?= h($childIssue->lft) ?></td>
                            <td><?= h($childIssue->rgt) ?></td>
                            <td><?= h($childIssue->is_private) ?></td>
                            <td><?= h($childIssue->closed_on) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Issues', 'action' => 'view', $childIssue->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Issues', 'action' => 'edit', $childIssue->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Issues', 'action' => 'delete', $childIssue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childIssue->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Time Entries') ?></h4>
                <?php if (!empty($issue->time_entries)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Project Id') ?></th>
                            <th><?= __('Author Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Issue Id') ?></th>
                            <th><?= __('Hours') ?></th>
                            <th><?= __('Comments') ?></th>
                            <th><?= __('Activity Id') ?></th>
                            <th><?= __('Spent On') ?></th>
                            <th><?= __('Tyear') ?></th>
                            <th><?= __('Tmonth') ?></th>
                            <th><?= __('Tweek') ?></th>
                            <th><?= __('Created On') ?></th>
                            <th><?= __('Updated On') ?></th>
                            <th><?= __('Rate Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($issue->time_entries as $timeEntry) : ?>
                        <tr>
                            <td><?= h($timeEntry->id) ?></td>
                            <td><?= h($timeEntry->project_id) ?></td>
                            <td><?= h($timeEntry->author_id) ?></td>
                            <td><?= h($timeEntry->user_id) ?></td>
                            <td><?= h($timeEntry->issue_id) ?></td>
                            <td><?= h($timeEntry->hours) ?></td>
                            <td><?= h($timeEntry->comments) ?></td>
                            <td><?= h($timeEntry->activity_id) ?></td>
                            <td><?= h($timeEntry->spent_on) ?></td>
                            <td><?= h($timeEntry->tyear) ?></td>
                            <td><?= h($timeEntry->tmonth) ?></td>
                            <td><?= h($timeEntry->tweek) ?></td>
                            <td><?= h($timeEntry->created_on) ?></td>
                            <td><?= h($timeEntry->updated_on) ?></td>
                            <td><?= h($timeEntry->rate_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'TimeEntries', 'action' => 'view', $timeEntry->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'TimeEntries', 'action' => 'edit', $timeEntry->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'TimeEntries', 'action' => 'delete', $timeEntry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $timeEntry->id)]) ?>
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
