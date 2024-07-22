<?php
declare(strict_types=1);

namespace ReportBuilder\View\Widget;

use Cake\Routing\Router;
use Cake\View\StringTemplate;
use Cake\View\View;
use Cake\View\Widget\BasicWidget;

class AutocompleteAssociationWidget extends BasicWidget
{
    protected View $view;

    public function __construct(StringTemplate $templates, View $view)
    {
        parent::__construct($templates);
        $this->view = $view;
    }

    public function render(array $data, \Cake\View\Form\ContextInterface $context): string
    {
        $name = $data['name'];
        $url = $data['url'] ?? Router::url([
            'plugin' => 'ReportBuilder',
            'controller' => 'Reports',
            'action' => 'autocomplete',
            $data['reportId'],
            '?' => [
                'association' => $data['association'],
            ],
        ]);
        $this->view->Html->script('https://cdnjs.cloudflare.com/ajax/libs/awesomplete/1.1.5/awesomplete.min.js', ['block' => true]);
        $this->view->Html->css('https://cdnjs.cloudflare.com/ajax/libs/awesomplete/1.1.5/awesomplete.min.css', ['block' => true]);

        $this->view->Html->scriptBlock("
            document.addEventListener('DOMContentLoaded', function() {
                var input = document.querySelector('#$name');
                var hiddenInput = document.querySelector('#$name' + '_value');
                var awesomeplete = new Awesomplete(input, {
                    minChars: 1,
                    autoFirst: true,
                    list: ['one', 'two'],
                    filter: Awesomplete.FILTER_STARTSWITH,
                    sort: Awesomplete.SORT_BYLENGTH
                });

                input.addEventListener('input', function() {
                    fetch('$url' + '&term=' + input.value)
                        .then(response => response.json())
                        .then(data => {
                            awesomeplete.list = Object.values(data.results).map(item => ({
                                label: item.label,
                                value: item.value
                            }));
                        });
                });

                input.addEventListener('awesomplete-selectcomplete', function(event) {
                    hiddenInput.value = event.text.value;
                    input.value = event.text.label;
                });
            });
        ", ['block' => true]);

        return parent::render([
            'name' => $data['name'] . '_label',
            'empty' => __('No filter conditions'),
            'id' => $data['name'],
            'class' => 'awesomeplete',
        ], $context) .
            '<input type="hidden" name="' . $name . '[condition]" value="autocomplete" />' .
            '<input type="hidden" name="' . $name . '[value]" id="' . $name . '_value" />';
    }

    public function secureFields(array $data): array
    {
        return [];
    }
}
