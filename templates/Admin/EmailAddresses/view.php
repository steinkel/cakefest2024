<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EmailAddress $emailAddress
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Email Address'), ['action' => 'edit', $emailAddress->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Email Address'), ['action' => 'delete', $emailAddress->id], ['confirm' => __('Are you sure you want to delete # {0}?', $emailAddress->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Email Addresses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Email Address'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="emailAddresses view content">
            <h3><?= h($emailAddress->address) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $emailAddress->hasValue('user') ? $this->Html->link($emailAddress->user->login, ['controller' => 'Users', 'action' => 'view', $emailAddress->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($emailAddress->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($emailAddress->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created On') ?></th>
                    <td><?= h($emailAddress->created_on) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated On') ?></th>
                    <td><?= h($emailAddress->updated_on) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Default') ?></th>
                    <td><?= $emailAddress->is_default ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Notify') ?></th>
                    <td><?= $emailAddress->notify ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
