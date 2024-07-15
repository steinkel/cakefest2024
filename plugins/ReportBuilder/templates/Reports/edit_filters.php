<?php
/**
 * @var \App\View\AppView $this
 */
$this->Form->addWidget('conditionInteger', [
    \ReportBuilder\View\Widget\ConditionIntegerWidget::class,
    'select',
]);
echo $this->Form->create();
foreach ($typeMap as $column => $type) {
    if ($type !== 'integer') {
        continue;
    }
    echo $this->Form->control($column, [
        'type' => 'condition' . ucfirst($type),
    ]);
}
echo $this->Form->submit();
echo $this->Form->end();
