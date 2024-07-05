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
        $addLink = $this->Html->link(__('[+ add]'), '#', [
            'data-url' => $this->Url->build([
                'plugin' => 'ReportBuilder',
                'controller' => 'Reports',
                'action' => 'addAssociation',
                $report->id,
                $association ? h($association) . '.' . h($nextAlias) : h($nextAlias),
            ]),
            'data-csrf' => $this->request->getAttribute('csrfToken'),
            'class' => 'add-association',
        ]);

        echo $this->Html->tag('dd', $nextAlias . ' ' . $addLink . ' ' . $navigateLink);
    }
    ?>
</dl>
