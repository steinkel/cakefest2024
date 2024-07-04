<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
<div class="users index content">
    <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Users') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('login') ?></th>
                    <th><?= $this->Paginator->sort('hashed_password') ?></th>
                    <th><?= $this->Paginator->sort('firstname') ?></th>
                    <th><?= $this->Paginator->sort('lastname') ?></th>
                    <th><?= $this->Paginator->sort('admin') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('last_login_on') ?></th>
                    <th><?= $this->Paginator->sort('language') ?></th>
                    <th><?= $this->Paginator->sort('auth_source_id') ?></th>
                    <th><?= $this->Paginator->sort('created_on') ?></th>
                    <th><?= $this->Paginator->sort('updated_on') ?></th>
                    <th><?= $this->Paginator->sort('type') ?></th>
                    <th><?= $this->Paginator->sort('identity_url') ?></th>
                    <th><?= $this->Paginator->sort('mail_notification') ?></th>
                    <th><?= $this->Paginator->sort('salt') ?></th>
                    <th><?= $this->Paginator->sort('must_change_passwd') ?></th>
                    <th><?= $this->Paginator->sort('passwd_changed_on') ?></th>
                    <th><?= $this->Paginator->sort('otp_secret_key') ?></th>
                    <th><?= $this->Paginator->sort('mobile_phone') ?></th>
                    <th><?= $this->Paginator->sort('mobile_phone_confirmed') ?></th>
                    <th><?= $this->Paginator->sort('ignore_2fa') ?></th>
                    <th><?= $this->Paginator->sort('two_fa_id') ?></th>
                    <th><?= $this->Paginator->sort('api_allowed') ?></th>
                    <th><?= $this->Paginator->sort('two_fa') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->login) ?></td>
                    <td><?= h($user->hashed_password) ?></td>
                    <td><?= h($user->firstname) ?></td>
                    <td><?= h($user->lastname) ?></td>
                    <td><?= h($user->admin) ?></td>
                    <td><?= $this->Number->format($user->status) ?></td>
                    <td><?= h($user->last_login_on) ?></td>
                    <td><?= h($user->language) ?></td>
                    <td><?= $user->auth_source_id === null ? '' : $this->Number->format($user->auth_source_id) ?></td>
                    <td><?= h($user->created_on) ?></td>
                    <td><?= h($user->updated_on) ?></td>
                    <td><?= h($user->type) ?></td>
                    <td><?= h($user->identity_url) ?></td>
                    <td><?= h($user->mail_notification) ?></td>
                    <td><?= h($user->salt) ?></td>
                    <td><?= h($user->must_change_passwd) ?></td>
                    <td><?= h($user->passwd_changed_on) ?></td>
                    <td><?= h($user->otp_secret_key) ?></td>
                    <td><?= h($user->mobile_phone) ?></td>
                    <td><?= h($user->mobile_phone_confirmed) ?></td>
                    <td><?= h($user->ignore_2fa) ?></td>
                    <td><?= $user->two_fa_id === null ? '' : $this->Number->format($user->two_fa_id) ?></td>
                    <td><?= h($user->api_allowed) ?></td>
                    <td><?= h($user->two_fa) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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
