<?= $this->Html->tag('h1', __('Edit associations for report: {0}', h($report->name))) ?>
<?php
echo $this->element('navigate_associations');
echo $this->Html->linkFromPath(__('Continue'), 'ReportBuilder.Reports::selectColumns', [$report->id]);
$this->Html->script('ReportBuilder.navigate-associations', ['block' => 'script']);

