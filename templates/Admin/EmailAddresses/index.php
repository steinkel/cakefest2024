<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\EmailAddress> $emailAddresses
 */
?>
<div class="emailAddresses index content">
    <?= $this->Html->link(__('New Email Address'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Email Addresses') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('is_default') ?></th>
                    <th><?= $this->Paginator->sort('notify') ?></th>
                    <th><?= $this->Paginator->sort('created_on') ?></th>
                    <th><?= $this->Paginator->sort('updated_on') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($emailAddresses as $emailAddress) : ?>
                <tr>
                    <td><?= $this->Number->format($emailAddress->id) ?></td>
                    <td><?= $emailAddress->hasValue('user') ? $this->Html->link($emailAddress->user->login, ['controller' => 'Users', 'action' => 'view', $emailAddress->user->id]) : '' ?></td>
                    <td><?= h($emailAddress->address) ?></td>
                    <td><?= h($emailAddress->is_default) ?></td>
                    <td><?= h($emailAddress->notify) ?></td>
                    <td><?= h($emailAddress->created_on) ?></td>
                    <td><?= h($emailAddress->updated_on) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $emailAddress->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $emailAddress->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $emailAddress->id], ['confirm' => __('Are you sure you want to delete # {0}?', $emailAddress->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
