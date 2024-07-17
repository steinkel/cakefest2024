<?php
$this->Paginator->setTemplates(
    [
        'nextActive' => '<a rel="next" href="{{url}}">| {{text}}</a>',
        'nextDisabled' => '...',
        'prevActive' => '<a rel="prev" href="{{url}}">{{text}} |</a>',
        'prevDisabled' => '...',
    ]
);
echo $this->Paginator->prev();
echo $this->Paginator->next();
