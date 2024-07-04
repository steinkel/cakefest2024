<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Project'), ['action' => 'edit', $project->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Project'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Projects'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Project'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="projects view content">
            <h3><?= h($project->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($project->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Homepage') ?></th>
                    <td><?= h($project->homepage) ?></td>
                </tr>
                <tr>
                    <th><?= __('Parent Project') ?></th>
                    <td><?= $project->hasValue('parent_project') ? $this->Html->link($project->parent_project->name, ['controller' => 'Projects', 'action' => 'view', $project->parent_project->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Identifier') ?></th>
                    <td><?= h($project->identifier) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($project->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($project->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lft') ?></th>
                    <td><?= $project->lft === null ? '' : $this->Number->format($project->lft) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rgt') ?></th>
                    <td><?= $project->rgt === null ? '' : $this->Number->format($project->rgt) ?></td>
                </tr>
                <tr>
                    <th><?= __('Default Version Id') ?></th>
                    <td><?= $project->default_version_id === null ? '' : $this->Number->format($project->default_version_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Default Assigned To Id') ?></th>
                    <td><?= $project->default_assigned_to_id === null ? '' : $this->Number->format($project->default_assigned_to_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created On') ?></th>
                    <td><?= h($project->created_on) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated On') ?></th>
                    <td><?= h($project->updated_on) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Public') ?></th>
                    <td><?= $project->is_public ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Inherit Members') ?></th>
                    <td><?= $project->inherit_members ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($project->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Trackers') ?></h4>
                <?php if (!empty($project->trackers)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Is In Chlog') ?></th>
                            <th><?= __('Position') ?></th>
                            <th><?= __('Is In Roadmap') ?></th>
                            <th><?= __('Fields Bits') ?></th>
                            <th><?= __('Default Status Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($project->trackers as $tracker) : ?>
                        <tr>
                            <td><?= h($tracker->id) ?></td>
                            <td><?= h($tracker->name) ?></td>
                            <td><?= h($tracker->description) ?></td>
                            <td><?= h($tracker->is_in_chlog) ?></td>
                            <td><?= h($tracker->position) ?></td>
                            <td><?= h($tracker->is_in_roadmap) ?></td>
                            <td><?= h($tracker->fields_bits) ?></td>
                            <td><?= h($tracker->default_status_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Trackers', 'action' => 'view', $tracker->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Trackers', 'action' => 'edit', $tracker->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Trackers', 'action' => 'delete', $tracker->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tracker->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Issue Categories') ?></h4>
                <?php if (!empty($project->issue_categories)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Project Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Assigned To Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($project->issue_categories as $issueCategory) : ?>
                        <tr>
                            <td><?= h($issueCategory->id) ?></td>
                            <td><?= h($issueCategory->project_id) ?></td>
                            <td><?= h($issueCategory->name) ?></td>
                            <td><?= h($issueCategory->assigned_to_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'IssueCategories', 'action' => 'view', $issueCategory->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'IssueCategories', 'action' => 'edit', $issueCategory->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'IssueCategories', 'action' => 'delete', $issueCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $issueCategory->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Issues') ?></h4>
                <?php if (!empty($project->issues)) : ?>
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
                        <?php foreach ($project->issues as $issue) : ?>
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
            <div class="related">
                <h4><?= __('Related Members') ?></h4>
                <?php if (!empty($project->members)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Project Id') ?></th>
                            <th><?= __('Created On') ?></th>
                            <th><?= __('Mail Notification') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($project->members as $member) : ?>
                        <tr>
                            <td><?= h($member->id) ?></td>
                            <td><?= h($member->user_id) ?></td>
                            <td><?= h($member->project_id) ?></td>
                            <td><?= h($member->created_on) ?></td>
                            <td><?= h($member->mail_notification) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Members', 'action' => 'view', $member->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Members', 'action' => 'edit', $member->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Members', 'action' => 'delete', $member->id], ['confirm' => __('Are you sure you want to delete # {0}?', $member->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Projects') ?></h4>
                <?php if (!empty($project->child_projects)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Homepage') ?></th>
                            <th><?= __('Is Public') ?></th>
                            <th><?= __('Parent Id') ?></th>
                            <th><?= __('Created On') ?></th>
                            <th><?= __('Updated On') ?></th>
                            <th><?= __('Identifier') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Lft') ?></th>
                            <th><?= __('Rgt') ?></th>
                            <th><?= __('Inherit Members') ?></th>
                            <th><?= __('Default Version Id') ?></th>
                            <th><?= __('Default Assigned To Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($project->child_projects as $childProject) : ?>
                        <tr>
                            <td><?= h($childProject->id) ?></td>
                            <td><?= h($childProject->name) ?></td>
                            <td><?= h($childProject->description) ?></td>
                            <td><?= h($childProject->homepage) ?></td>
                            <td><?= h($childProject->is_public) ?></td>
                            <td><?= h($childProject->parent_id) ?></td>
                            <td><?= h($childProject->created_on) ?></td>
                            <td><?= h($childProject->updated_on) ?></td>
                            <td><?= h($childProject->identifier) ?></td>
                            <td><?= h($childProject->status) ?></td>
                            <td><?= h($childProject->lft) ?></td>
                            <td><?= h($childProject->rgt) ?></td>
                            <td><?= h($childProject->inherit_members) ?></td>
                            <td><?= h($childProject->default_version_id) ?></td>
                            <td><?= h($childProject->default_assigned_to_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Projects', 'action' => 'view', $childProject->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Projects', 'action' => 'edit', $childProject->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Projects', 'action' => 'delete', $childProject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childProject->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Statuses') ?></h4>
                <?php if (!empty($project->statuses)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Project Id') ?></th>
                            <th><?= __('Message') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th><?= __('Created On') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($project->statuses as $status) : ?>
                        <tr>
                            <td><?= h($status->id) ?></td>
                            <td><?= h($status->user_id) ?></td>
                            <td><?= h($status->project_id) ?></td>
                            <td><?= h($status->message) ?></td>
                            <td><?= h($status->created_at) ?></td>
                            <td><?= h($status->updated_at) ?></td>
                            <td><?= h($status->created_on) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Statuses', 'action' => 'view', $status->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Statuses', 'action' => 'edit', $status->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Statuses', 'action' => 'delete', $status->id], ['confirm' => __('Are you sure you want to delete # {0}?', $status->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Time Entries') ?></h4>
                <?php if (!empty($project->time_entries)) : ?>
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
                        <?php foreach ($project->time_entries as $timeEntry) : ?>
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
