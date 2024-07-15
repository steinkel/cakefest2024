<?php
declare(strict_types=1);

namespace ReportBuilder\View\Widget;

use Cake\View\StringTemplate;
use Cake\View\Widget\BasicWidget;
use Cake\View\Widget\SelectBoxWidget;

class ConditionIntegerWidget extends BasicWidget
{
    protected SelectBoxWidget $selectBoxWidget;

    public function __construct(StringTemplate $templates)
    {
        parent::__construct($templates);
        $this->selectBoxWidget = new SelectBoxWidget($templates);
    }

    public function render(array $data, \Cake\View\Form\ContextInterface $context): string
    {
        return $this->selectBoxWidget->render([
                'name' => $data['name'] . '[condition]',
                'options' => $data['options'] ?? ['>=' => '>=', '=' => '=', '<=' => '<='],
                'empty' => __('No filter conditions'),
            ], $context) . parent::render([
                    'name' => $data['name'] . '[value]',
                ] + $data, $context);
    }

    public function secureFields(array $data): array
    {
        return [];
    }
}
