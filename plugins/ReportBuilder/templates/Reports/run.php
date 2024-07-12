<style>
    .collapsible-content {
        display: none;
    }
    .collapsible-header {
        cursor: pointer;
        background-color: #f2f2f2;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const headers = document.querySelectorAll('.collapsible-header');
        headers.forEach(header => {
            header.addEventListener('click', () => {
                let next = header.nextElementSibling;
                while (next && !next.classList.contains('collapsible-header')) {
                    next.style.display = next.style.display === 'none' ? 'block' : 'none';
                    next = next.nextElementSibling;
                }
            });
        });
    });
</script>
<?php
echo $this->Html->tag('h1', h($report->name));
echo '<table>';
foreach ($reportRun as $row) {
    echo $this->Report->row($row);
}
echo '</table>';
?>
