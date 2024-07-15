<?php
/**
 * @var \App\View\AppView $this
 */
$this->Form->addWidget('conditionInteger', [
    \ReportBuilder\View\Widget\ConditionIntegerWidget::class,
    'select',
]);
$this->Form->addWidget('conditionDate', \ReportBuilder\View\Widget\ConditionDateWidget::class);
echo $this->Form->create();
foreach ($typeMap as $column => $type) {
    if (!in_array($type, ['integer', 'date'])) {
        continue;
    }
    echo $this->Form->control($column, [
        'type' => 'condition' . ucfirst($type),
    ]);
}
echo $this->Form->submit();
echo $this->Form->end();
