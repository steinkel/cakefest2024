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

        $htmlString = '<div class="collapsible-header">';
        if ($collapsed) {
            $htmlString = '<div class="collapsible-content" style="display: none">';
        }

        foreach ($rowData as $rowValue) {
            $htmlString .= $this->Html->tag('div', (string)$rowValue, [
                'escape' => true,
                'class' => 'report-value',
            ]);
        }

        return $htmlString .= '</div>' . $nestedRowHtml;
    }
}
