<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EmailAddress $emailAddress
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $emailAddress->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $emailAddress->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Email Addresses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="emailAddresses form content">
            <?= $this->Form->create($emailAddress) ?>
            <fieldset>
                <legend><?= __('Edit Email Address') ?></legend>
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
