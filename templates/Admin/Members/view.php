<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Member $member
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Member'), ['action' => 'edit', $member->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Member'), ['action' => 'delete', $member->id], ['confirm' => __('Are you sure you want to delete # {0}?', $member->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Members'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Member'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="members view content">
            <h3><?= h($member->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $member->hasValue('user') ? $this->Html->link($member->user->login, ['controller' => 'Users', 'action' => 'view', $member->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Project') ?></th>
                    <td><?= $member->hasValue('project') ? $this->Html->link($member->project->name, ['controller' => 'Projects', 'action' => 'view', $member->project->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($member->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created On') ?></th>
                    <td><?= h($member->created_on) ?></td>
                </tr>
                <tr>
                    <th><?= __('Mail Notification') ?></th>
                    <td><?= $member->mail_notification ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Member Roles') ?></h4>
                <?php if (!empty($member->member_roles)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Member Id') ?></th>
                            <th><?= __('Role Id') ?></th>
                            <th><?= __('Inherited From') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($member->member_roles as $memberRole) : ?>
                        <tr>
                            <td><?= h($memberRole->id) ?></td>
                            <td><?= h($memberRole->member_id) ?></td>
                            <td><?= h($memberRole->role_id) ?></td>
                            <td><?= h($memberRole->inherited_from) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'MemberRoles', 'action' => 'view', $memberRole->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'MemberRoles', 'action' => 'edit', $memberRole->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'MemberRoles', 'action' => 'delete', $memberRole->id], ['confirm' => __('Are you sure you want to delete # {0}?', $memberRole->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
