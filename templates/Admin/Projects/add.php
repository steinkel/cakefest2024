<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 * @var \Cake\Collection\CollectionInterface|string[] $parentProjects
 * @var \Cake\Collection\CollectionInterface|string[] $trackers
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Projects'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="projects form content">
            <?= $this->Form->create($project) ?>
            <fieldset>
                <legend><?= __('Add Project') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('description');
                    echo $this->Form->control('homepage');
                    echo $this->Form->control('is_public');
                    echo $this->Form->control('parent_id', ['options' => $parentProjects, 'empty' => true]);
                    echo $this->Form->control('created_on', ['empty' => true]);
                    echo $this->Form->control('updated_on', ['empty' => true]);
                    echo $this->Form->control('identifier');
                    echo $this->Form->control('status');
                    echo $this->Form->control('lft');
                    echo $this->Form->control('rgt');
                    echo $this->Form->control('inherit_members');
                    echo $this->Form->control('default_version_id');
                    echo $this->Form->control('default_assigned_to_id');
                    echo $this->Form->control('trackers._ids', ['options' => $trackers]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
