<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TimeEntry $timeEntry
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Time Entry'), ['action' => 'edit', $timeEntry->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Time Entry'), ['action' => 'delete', $timeEntry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $timeEntry->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Time Entries'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Time Entry'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="timeEntries view content">
            <h3><?= h($timeEntry->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Project') ?></th>
                    <td><?= $timeEntry->hasValue('project') ? $this->Html->link($timeEntry->project->name, ['controller' => 'Projects', 'action' => 'view', $timeEntry->project->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $timeEntry->hasValue('user') ? $this->Html->link($timeEntry->user->login, ['controller' => 'Users', 'action' => 'view', $timeEntry->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Issue') ?></th>
                    <td><?= $timeEntry->hasValue('issue') ? $this->Html->link($timeEntry->issue->subject, ['controller' => 'Issues', 'action' => 'view', $timeEntry->issue->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Comments') ?></th>
                    <td><?= h($timeEntry->comments) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($timeEntry->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Author Id') ?></th>
                    <td><?= $timeEntry->author_id === null ? '' : $this->Number->format($timeEntry->author_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Hours') ?></th>
                    <td><?= $this->Number->format($timeEntry->hours) ?></td>
                </tr>
                <tr>
                    <th><?= __('Activity Id') ?></th>
                    <td><?= $this->Number->format($timeEntry->activity_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tyear') ?></th>
                    <td><?= $this->Number->format($timeEntry->tyear) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tmonth') ?></th>
                    <td><?= $this->Number->format($timeEntry->tmonth) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tweek') ?></th>
                    <td><?= $this->Number->format($timeEntry->tweek) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rate Id') ?></th>
                    <td><?= $timeEntry->rate_id === null ? '' : $this->Number->format($timeEntry->rate_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Spent On') ?></th>
                    <td><?= h($timeEntry->spent_on) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created On') ?></th>
                    <td><?= h($timeEntry->created_on) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated On') ?></th>
                    <td><?= h($timeEntry->updated_on) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
