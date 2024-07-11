<dl>
<?php
echo $this->Form->create();
foreach ($report->all_columns as $associationName => $columns) {
    echo $this->Html->tag('dd', h($associationName));
    foreach ($columns as $column) {
        echo '<dl>';
        echo $this->Html->tag('dd', $this->Form->control(str_replace('.', ':', $associationName) . '.' . $column, [
            'type' => 'checkbox',
        ]));
        echo '</dl>';
    }
}
?>
</dl>
<?php
echo $this->Form->submit();
echo $this->Form->end();
