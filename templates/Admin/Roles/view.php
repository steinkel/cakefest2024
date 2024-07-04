<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Role'), ['action' => 'edit', $role->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Role'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Roles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Role'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="roles view content">
            <h3><?= h($role->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($role->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Issues Visibility') ?></th>
                    <td><?= h($role->issues_visibility) ?></td>
                </tr>
                <tr>
                    <th><?= __('Users Visibility') ?></th>
                    <td><?= h($role->users_visibility) ?></td>
                </tr>
                <tr>
                    <th><?= __('Time Entries Visibility') ?></th>
                    <td><?= h($role->time_entries_visibility) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($role->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Position') ?></th>
                    <td><?= $role->position === null ? '' : $this->Number->format($role->position) ?></td>
                </tr>
                <tr>
                    <th><?= __('Builtin') ?></th>
                    <td><?= $this->Number->format($role->builtin) ?></td>
                </tr>
                <tr>
                    <th><?= __('Assignable') ?></th>
                    <td><?= $role->assignable ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('All Roles Managed') ?></th>
                    <td><?= $role->all_roles_managed ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Permissions') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($role->permissions)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Settings') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($role->settings)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Member Roles') ?></h4>
                <?php if (!empty($role->member_roles)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Member Id') ?></th>
                            <th><?= __('Role Id') ?></th>
                            <th><?= __('Inherited From') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($role->member_roles as $memberRole) : ?>
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
