<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Edit User') ?></legend>
                <?php
                    echo $this->Form->control('login');
                    echo $this->Form->control('hashed_password');
                    echo $this->Form->control('firstname');
                    echo $this->Form->control('lastname');
                    echo $this->Form->control('admin');
                    echo $this->Form->control('status');
                    echo $this->Form->control('last_login_on', ['empty' => true]);
                    echo $this->Form->control('language');
                    echo $this->Form->control('auth_source_id');
                    echo $this->Form->control('created_on', ['empty' => true]);
                    echo $this->Form->control('updated_on', ['empty' => true]);
                    echo $this->Form->control('type');
                    echo $this->Form->control('identity_url');
                    echo $this->Form->control('mail_notification');
                    echo $this->Form->control('salt');
                    echo $this->Form->control('must_change_passwd');
                    echo $this->Form->control('passwd_changed_on', ['empty' => true]);
                    echo $this->Form->control('otp_secret_key');
                    echo $this->Form->control('mobile_phone');
                    echo $this->Form->control('mobile_phone_confirmed');
                    echo $this->Form->control('ignore_2fa');
                    echo $this->Form->control('two_fa_id');
                    echo $this->Form->control('api_allowed');
                    echo $this->Form->control('two_fa');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
