<?php
declare(strict_types=1);

namespace ReportBuilder\View\Helper;

use Cake\View\Helper;

/**
 * Report helper
 */
class ReportHelper extends Helper
{
    public array $helpers = ['Html'];

    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected array $_defaultConfig = [];

    public function row(array $row, $collapsed = false): string
    {
        $rowData = collection($row)
            ->filter(fn($value) => !is_array($value))
            ->toArray();

        $rowDataNested = collection($row)
            ->filter(fn($value) => is_array($value))
            ->toArray();

        $nestedRowHtml = '';
        foreach ($rowDataNested as $name => $nestedRows) {
            foreach ($nestedRows as $nestedRow) {
                $nestedRowHtml .= $this->row($nestedRow, true);
            }
        }

        $hideTr = [
            'style' => 'display: none',
            'class' => 'collapsible-content',
        ];
        if ($collapsed) {
            return $this->Html->tableCells([$rowData], $hideTr, $hideTr) . $nestedRowHtml;
        } else {
            return $this->Html->tableCells([$rowData], ['class' => 'collapsible-header'], ['class' => 'collapsible-header']) . $nestedRowHtml;
        }
    }
}
