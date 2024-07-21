<?php
/**
 * @var \App\View\AppView $this
 */
$this->Form->addWidget('conditionInteger',
    \ReportBuilder\View\Widget\ConditionIntegerWidget::class);
$this->Form->addWidget('conditionDate', \ReportBuilder\View\Widget\ConditionDateWidget::class);
$this->Form->addWidget('autocompleteAssociation', ['ReportBuilder.AutocompleteAssociation', '_view']);
echo $this->Form->create();
foreach ($typeMap as $column => $type) {
    $association = $report->columnForeignKeyAssociationName($column);
    if ($association) {
        echo $this->Form->control($column, [
            'type' => 'autocompleteAssociation',
            'association' => $association,
            'reportId' => $report->id,
        ]);
        continue;
    }
    if (!in_array($type, ['integer', 'date'])) {
        continue;
    }
    echo $this->Form->control($column, [
        'type' => 'condition' . ucfirst($type),
    ]);
}
echo $this->Form->submit();
echo $this->Form->end();
