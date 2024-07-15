<?php
declare(strict_types=1);

namespace ReportBuilder\View\Widget;

use Cake\View\Widget\SelectBoxWidget;

class ConditionDateWidget extends SelectBoxWidget
{
    public function render(array $data, \Cake\View\Form\ContextInterface $context): string
    {
        return parent::render([
                'name' => $data['name'] . '[condition]',
                'options' => $data['options'] ?? [
                        'this_month' => __('This month'),
                        'this_week' => __('This week'),
                        'last_month' => __('Last month'),
                    ],
                'empty' => __('No filter conditions'),
            ], $context);
    }

    public function secureFields(array $data): array
    {
        return [];
    }
}
