<dl>
    <?php
    foreach ($tableAssociations as $nextAlias => $nextAssociation) {
        $navigateLink = $this->Html->link(__('[navigate]'), '#', [
            'data-url' => $this->Url->build([
                'plugin' => 'ReportBuilder',
                'controller' => 'Reports',
                'action' => 'navigateAssociations',
                $report->id,
                $association ? h($association) . '.' . h($nextAlias) : h($nextAlias),
            ]),
            'class' => 'navigate',
        ]);

        echo $this->Html->tag('dd', $nextAlias . ' ' . $navigateLink);
    }
    ?>
</dl>
