<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Tracker> $trackers
 */
?>
<div class="trackers index content">
    <?= $this->Html->link(__('New Tracker'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Trackers') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('is_in_chlog') ?></th>
                    <th><?= $this->Paginator->sort('position') ?></th>
                    <th><?= $this->Paginator->sort('is_in_roadmap') ?></th>
                    <th><?= $this->Paginator->sort('fields_bits') ?></th>
                    <th><?= $this->Paginator->sort('default_status_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($trackers as $tracker) : ?>
                <tr>
                    <td><?= $this->Number->format($tracker->id) ?></td>
                    <td><?= h($tracker->name) ?></td>
                    <td><?= h($tracker->description) ?></td>
                    <td><?= h($tracker->is_in_chlog) ?></td>
                    <td><?= $tracker->position === null ? '' : $this->Number->format($tracker->position) ?></td>
                    <td><?= h($tracker->is_in_roadmap) ?></td>
                    <td><?= $tracker->fields_bits === null ? '' : $this->Number->format($tracker->fields_bits) ?></td>
                    <td><?= $tracker->default_status_id === null ? '' : $this->Number->format($tracker->default_status_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $tracker->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tracker->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tracker->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tracker->id)]) ?>
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
