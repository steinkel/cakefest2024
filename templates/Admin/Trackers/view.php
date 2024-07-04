<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tracker $tracker
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Tracker'), ['action' => 'edit', $tracker->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Tracker'), ['action' => 'delete', $tracker->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tracker->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Trackers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Tracker'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="trackers view content">
            <h3><?= h($tracker->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($tracker->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($tracker->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($tracker->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Position') ?></th>
                    <td><?= $tracker->position === null ? '' : $this->Number->format($tracker->position) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fields Bits') ?></th>
                    <td><?= $tracker->fields_bits === null ? '' : $this->Number->format($tracker->fields_bits) ?></td>
                </tr>
                <tr>
                    <th><?= __('Default Status Id') ?></th>
                    <td><?= $tracker->default_status_id === null ? '' : $this->Number->format($tracker->default_status_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is In Chlog') ?></th>
                    <td><?= $tracker->is_in_chlog ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Is In Roadmap') ?></th>
                    <td><?= $tracker->is_in_roadmap ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Projects') ?></h4>
                <?php if (!empty($tracker->projects)) : ?>
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
                        <?php foreach ($tracker->projects as $project) : ?>
                        <tr>
                            <td><?= h($project->id) ?></td>
                            <td><?= h($project->name) ?></td>
                            <td><?= h($project->description) ?></td>
                            <td><?= h($project->homepage) ?></td>
                            <td><?= h($project->is_public) ?></td>
                            <td><?= h($project->parent_id) ?></td>
                            <td><?= h($project->created_on) ?></td>
                            <td><?= h($project->updated_on) ?></td>
                            <td><?= h($project->identifier) ?></td>
                            <td><?= h($project->status) ?></td>
                            <td><?= h($project->lft) ?></td>
                            <td><?= h($project->rgt) ?></td>
                            <td><?= h($project->inherit_members) ?></td>
                            <td><?= h($project->default_version_id) ?></td>
                            <td><?= h($project->default_assigned_to_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Projects', 'action' => 'view', $project->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Projects', 'action' => 'edit', $project->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Projects', 'action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Issues') ?></h4>
                <?php if (!empty($tracker->issues)) : ?>
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
                        <?php foreach ($tracker->issues as $issue) : ?>
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
