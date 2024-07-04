<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\IssueCategory $issueCategory
 * @var string[]|\Cake\Collection\CollectionInterface $projects
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $issueCategory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $issueCategory->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Issue Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="issueCategories form content">
            <?= $this->Form->create($issueCategory) ?>
            <fieldset>
                <legend><?= __('Edit Issue Category') ?></legend>
                <?php
                    echo $this->Form->control('project_id', ['options' => $projects]);
                    echo $this->Form->control('name');
                    echo $this->Form->control('assigned_to_id');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
