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
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="users view content">
            <h3><?= h($user->login) ?></h3>
            <table>
                <tr>
                    <th><?= __('Login') ?></th>
                    <td><?= h($user->login) ?></td>
                </tr>
                <tr>
                    <th><?= __('Hashed Password') ?></th>
                    <td><?= h($user->hashed_password) ?></td>
                </tr>
                <tr>
                    <th><?= __('Firstname') ?></th>
                    <td><?= h($user->firstname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lastname') ?></th>
                    <td><?= h($user->lastname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Language') ?></th>
                    <td><?= h($user->language) ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($user->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Identity Url') ?></th>
                    <td><?= h($user->identity_url) ?></td>
                </tr>
                <tr>
                    <th><?= __('Mail Notification') ?></th>
                    <td><?= h($user->mail_notification) ?></td>
                </tr>
                <tr>
                    <th><?= __('Salt') ?></th>
                    <td><?= h($user->salt) ?></td>
                </tr>
                <tr>
                    <th><?= __('Otp Secret Key') ?></th>
                    <td><?= h($user->otp_secret_key) ?></td>
                </tr>
                <tr>
                    <th><?= __('Mobile Phone') ?></th>
                    <td><?= h($user->mobile_phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Two Fa') ?></th>
                    <td><?= h($user->two_fa) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($user->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Auth Source Id') ?></th>
                    <td><?= $user->auth_source_id === null ? '' : $this->Number->format($user->auth_source_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Two Fa Id') ?></th>
                    <td><?= $user->two_fa_id === null ? '' : $this->Number->format($user->two_fa_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Login On') ?></th>
                    <td><?= h($user->last_login_on) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created On') ?></th>
                    <td><?= h($user->created_on) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated On') ?></th>
                    <td><?= h($user->updated_on) ?></td>
                </tr>
                <tr>
                    <th><?= __('Passwd Changed On') ?></th>
                    <td><?= h($user->passwd_changed_on) ?></td>
                </tr>
                <tr>
                    <th><?= __('Admin') ?></th>
                    <td><?= $user->admin ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Must Change Passwd') ?></th>
                    <td><?= $user->must_change_passwd ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Mobile Phone Confirmed') ?></th>
                    <td><?= $user->mobile_phone_confirmed ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Ignore 2fa') ?></th>
                    <td><?= $user->ignore_2fa ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Api Allowed') ?></th>
                    <td><?= $user->api_allowed ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Email Addresses') ?></h4>
                <?php if (!empty($user->email_addresses)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Address') ?></th>
                            <th><?= __('Is Default') ?></th>
                            <th><?= __('Notify') ?></th>
                            <th><?= __('Created On') ?></th>
                            <th><?= __('Updated On') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->email_addresses as $emailAddress) : ?>
                        <tr>
                            <td><?= h($emailAddress->id) ?></td>
                            <td><?= h($emailAddress->user_id) ?></td>
                            <td><?= h($emailAddress->address) ?></td>
                            <td><?= h($emailAddress->is_default) ?></td>
                            <td><?= h($emailAddress->notify) ?></td>
                            <td><?= h($emailAddress->created_on) ?></td>
                            <td><?= h($emailAddress->updated_on) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'EmailAddresses', 'action' => 'view', $emailAddress->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'EmailAddresses', 'action' => 'edit', $emailAddress->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'EmailAddresses', 'action' => 'delete', $emailAddress->id], ['confirm' => __('Are you sure you want to delete # {0}?', $emailAddress->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Members') ?></h4>
                <?php if (!empty($user->members)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Project Id') ?></th>
                            <th><?= __('Created On') ?></th>
                            <th><?= __('Mail Notification') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->members as $member) : ?>
                        <tr>
                            <td><?= h($member->id) ?></td>
                            <td><?= h($member->user_id) ?></td>
                            <td><?= h($member->project_id) ?></td>
                            <td><?= h($member->created_on) ?></td>
                            <td><?= h($member->mail_notification) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Members', 'action' => 'view', $member->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Members', 'action' => 'edit', $member->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Members', 'action' => 'delete', $member->id], ['confirm' => __('Are you sure you want to delete # {0}?', $member->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Statuses') ?></h4>
                <?php if (!empty($user->statuses)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Project Id') ?></th>
                            <th><?= __('Message') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th><?= __('Created On') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->statuses as $status) : ?>
                        <tr>
                            <td><?= h($status->id) ?></td>
                            <td><?= h($status->user_id) ?></td>
                            <td><?= h($status->project_id) ?></td>
                            <td><?= h($status->message) ?></td>
                            <td><?= h($status->created_at) ?></td>
                            <td><?= h($status->updated_at) ?></td>
                            <td><?= h($status->created_on) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Statuses', 'action' => 'view', $status->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Statuses', 'action' => 'edit', $status->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Statuses', 'action' => 'delete', $status->id], ['confirm' => __('Are you sure you want to delete # {0}?', $status->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Time Entries') ?></h4>
                <?php if (!empty($user->time_entries)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Project Id') ?></th>
                            <th><?= __('Author Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Issue Id') ?></th>
                            <th><?= __('Hours') ?></th>
                            <th><?= __('Comments') ?></th>
                            <th><?= __('Activity Id') ?></th>
                            <th><?= __('Spent On') ?></th>
                            <th><?= __('Tyear') ?></th>
                            <th><?= __('Tmonth') ?></th>
                            <th><?= __('Tweek') ?></th>
                            <th><?= __('Created On') ?></th>
                            <th><?= __('Updated On') ?></th>
                            <th><?= __('Rate Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->time_entries as $timeEntry) : ?>
                        <tr>
                            <td><?= h($timeEntry->id) ?></td>
                            <td><?= h($timeEntry->project_id) ?></td>
                            <td><?= h($timeEntry->author_id) ?></td>
                            <td><?= h($timeEntry->user_id) ?></td>
                            <td><?= h($timeEntry->issue_id) ?></td>
                            <td><?= h($timeEntry->hours) ?></td>
                            <td><?= h($timeEntry->comments) ?></td>
                            <td><?= h($timeEntry->activity_id) ?></td>
                            <td><?= h($timeEntry->spent_on) ?></td>
                            <td><?= h($timeEntry->tyear) ?></td>
                            <td><?= h($timeEntry->tmonth) ?></td>
                            <td><?= h($timeEntry->tweek) ?></td>
                            <td><?= h($timeEntry->created_on) ?></td>
                            <td><?= h($timeEntry->updated_on) ?></td>
                            <td><?= h($timeEntry->rate_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'TimeEntries', 'action' => 'view', $timeEntry->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'TimeEntries', 'action' => 'edit', $timeEntry->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'TimeEntries', 'action' => 'delete', $timeEntry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $timeEntry->id)]) ?>
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
