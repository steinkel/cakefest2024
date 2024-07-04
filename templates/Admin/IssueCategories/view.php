<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\IssueCategory $issueCategory
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Issue Category'), ['action' => 'edit', $issueCategory->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Issue Category'), ['action' => 'delete', $issueCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $issueCategory->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Issue Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Issue Category'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="issueCategories view content">
            <h3><?= h($issueCategory->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Project') ?></th>
                    <td><?= $issueCategory->hasValue('project') ? $this->Html->link($issueCategory->project->name, ['controller' => 'Projects', 'action' => 'view', $issueCategory->project->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($issueCategory->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($issueCategory->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Assigned To Id') ?></th>
                    <td><?= $issueCategory->assigned_to_id === null ? '' : $this->Number->format($issueCategory->assigned_to_id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
