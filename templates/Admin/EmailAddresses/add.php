<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EmailAddress $emailAddress
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Email Addresses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="emailAddresses form content">
            <?= $this->Form->create($emailAddress) ?>
            <fieldset>
                <legend><?= __('Add Email Address') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('address');
                    echo $this->Form->control('is_default');
                    echo $this->Form->control('notify');
                    echo $this->Form->control('created_on');
                    echo $this->Form->control('updated_on');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
