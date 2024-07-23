# Share and follow together

## Create project
## Ddev config
``` 
curl -L https://raw.githubusercontent.com/steinkel/cakefest2024/master/db.sql > db.sql 

bin/cake bake all --everything --prefix Admin
```

Fix prefix routes

```
$routes->prefix('Admin', function (RouteBuilder $builder): void {
    	$builder->fallbacks();
	});
```


## Bake the plugin


```
bin/cake bake plugin ReportBuilder
```

Shorten plugin routes

```
['path' => '/rb'],
```

Bake initial migration for the plugin

```
bin/cake bake migration initial --plugin ReportBuilder
```

```
$this->table('rb_reports')
        	->addColumn('name', 'string')
        	->addColumn('created', 'datetime')
        	->addColumn('modified', 'datetime')
        	->save();
```

```
bin/cake bake model --table rb_reports Reports --plugin ReportBuilder
bin/cake bake controller Reports --plugin ReportBuilder
bin/cake bake template Reports --plugin ReportBuilder
bin/cake bake migration addStartingTable --plugin ReportBuilder
```

```
$this->table('rb_reports')
        	->addColumn('starting_table', 'string', [
            	'null' => false,
        	])
        	->save();
```

## Validation for existing

```
->add('starting_table', 'tableExists', [
   'rule' => function ($value, $context) {
       try {
           $this->fetchTable($value);
       } catch (MissingTableClassException) {
           return false;
       }

       return true;
   },
   'message' => __('Table not found'),
]);
```


## navigate associations

### Go to edit associations on report save

```
return $this->redirect([
           	'action' => 'editAssociations',
           	$report->id,
]);
```

### then in ReportsController

```
public function editAssociations(int $id, ?string $association = null)
{
    	$this->navigateAssociations($id, $association);
    	$this->viewBuilder()->enableAutoLayout();
}

public function navigateAssociations(int $id, ?string $association = null)
{
    	$report = $this->Reports->get($id);
    	$startingTable = $report->starting_table;
    	[$currentTable, $tableAssociations] = $this->Reports->goToAssociation($startingTable, $association);
    	$this->set(compact('report', 'currentTable', 'tableAssociations', 'startingTable', 'association'));
    	$this->viewBuilder()->disableAutoLayout();
}
```

### in ReportsTable

```
public function goToAssociation(string $initialTable, ?string $association = null): array
{
    	$currentTable = $this->fetchTable($initialTable);
    	$associationsArray = Text::tokenize($association ?? '', '.');
    	foreach ($associationsArray as $associationItem) {
        	$currentTable = $currentTable->getAssociation($associationItem);
   	}

    	return [$currentTable, $currentTable->associations()];
}
```

### plugins/ReportBuilder/templates/Reports/edit_associations.php

```
<?= $this->Html->tag('h1', __('Edit associations for report: {0}', h($report->name))) ?>
<?php
echo $this->element('navigate_associations');
$this->Html->script('ReportBuilder.navigate-associations', ['block' => 'script']);
```

### plugins/ReportBuilder/templates/Reports/navigate_associations.php

```
echo $this->element('navigate_associations');
```

### plugins/ReportBuilder/templates/element/navigate_associations.php

```
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
```


### plugins/ReportBuilder/webroot/js/navigate-associations.js

```
document.addEventListener('click', async function (event) {
	if (event.target.classList.contains('navigate')) {
    	const element = event.target;
    	const response = await fetch(element.dataset.url);
    	const body = await response.text();

    	const insertElement = document.createElement('div');
    	insertElement.innerHTML = body;
    	element.parentNode.insertBefore(insertElement, element.nextSibling);
	}
});
```

## Add association

```
    	$this->table('rb_associations')
        	->addColumn('name', 'string', [
            	'null' => false,
        	])
        	->addColumn('report_id', 'integer', [
            	'signed' => false,
            	'null' => false,
        	])
        	->addForeignKey('report_id', 'rb_reports', 'id', [
            	'delete' => 'cascade',
        	])
        	->save();
```


```
bin/cake bake model --table rb_associations Associations --plugin ReportBuilder
```

### correct association in AssociationsTable

```
    	$this->belongsTo('Reports', [
        	'foreignKey' => 'report_id',
        	'joinType' => 'INNER',
        	'className' => 'ReportBuilder.Reports',
    	]);
```

...below

```
$rules->add($rules->existsIn(['report_id'], 'Reports'), ['errorField' => 'report_id']);
```


### in ReportsController

```
	public function addAssociation(int $id, ?string $association = null)
	{
    	$result = 'OK';
    	$message = __('Association saved');
    	$association = $this->fetchTable('ReportBuilder.Associations')
        	->findOrCreate([
            	'report_id' => $id,
            	'name' => $association,
        	]);
    	if (!$association) {
        	$result = 'FAILED';
        	$message = __('Unable to save association');
    	}

    	$this->set(compact('result', 'message'));
    	$this->viewBuilder()->setOption('serialize', ['result', 'message']);
    	// forced to return json
    	$this->viewBuilder()->setClassName('Json');
	}

```

### in navigate_associations element

```
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
```

### in navigate-associations js

```

 if (event.target.classList.contains('add-association')) {
    	const element = event.target;
    	const response = await fetch(element.dataset.url, {
        	method: 'POST',
        	headers: {
            	'Content-Type': 'application/json',
            	'Accept': 'application/json',
            	'X-CSRF-Token': element.dataset.csrf,
        	},
    	});
    	const body = await response.json();
    	alert(body.result + ' ' + body.message);
	}
```

NOTE if it does not work, check asset cache and fix it in app.php


## OPTIONAL Add validation for associations added

### In AssociationsTable

```
->add('name', 'validAssociation', [
            	'rule' => function ($value, $context) {
                	$reportId = $context['data']['report_id'] ?? null;
                	if (!$reportId) {
                    	return false;
                	}
                	$reportsTable = $this->fetchTable('ReportBuilder.Reports');
                	$report = $reportsTable->get($reportId);

                	try {
                    	$reportsTable->goToAssociation($report->starting_table, $value);
                	} catch (\InvalidArgumentException) {
                    	return false;
                	}

                	return true;
            	},
            	'message' => __('Invalid association'),
        	]);
```

## add new database type comma separated

```
<?php
declare(strict_types=1);


namespace ReportBuilder\Database\Type;


use Cake\Database\Driver;
use Cake\Database\Type\BaseType;


class CommaSeparatedType extends BaseType
{
   public function toPHP(mixed $value, Driver $driver): mixed
   {
       if ($value === null) {
           return null;
       }


       return explode(',', $value);
   }


   public function marshal(mixed $value): mixed
   {
       if (is_array($value) || $value === null) {
           return $value;
       }


       return explode(',', $value);
   }


   public function toDatabase(mixed $value, Driver $driver): mixed
   {
       if (!$value) {
           return null;
       }
       return implode(',', $value);
   }


   public function toStatement(mixed $value, Driver $driver): int
   {
       if ($value === null) {
           return \PDO::PARAM_NULL;
       }


       return \PDO::PARAM_STR;
   }
}
```

### in bootstrap

```

\Cake\Database\TypeFactory::map('commaSeparated', \ReportBuilder\Database\Type\CommaSeparatedType::class);
```


### Then prepare new MIGRATION db columns to store the comma separated values

```
$this->table('rb_reports')
        	->addColumn('starting_table_columns', 'text', [
            	'null' => true,
        	])
        	->save();
    	$this->table('rb_associations')
        	->addColumn('table_columns', 'text', [
            	'null' => true,
        	])
        	->save();
```


### Add to Associations entity

```
'table_columns' => true,
```

### Add to Report entity

```
'starting_table_columns' => true,
```

### AssociationsTable

```
public function getSchema(): TableSchemaInterface
	{
    	return parent::getSchema()
        	->setColumnType('table_columns', 'commaSeparated');
	}
```

### ReportsTable
 
```

public function getSchema(): TableSchemaInterface
	{
    	return parent::getSchema()
        	->setColumnType('starting_table_columns', 'commaSeparated');
	}
```

## Save the columns

### in edit_associations

```
echo $this->Html->linkFromPath(__('Continue'), 'ReportBuilder.Reports::selectColumns', [$report->id]);
```


### in ReportsController

```
public function selectColumns(int $id)
	{
    	$report = $this->Reports->get($id, contain: ['Associations']);
    	$this->set(compact('report'));
    	if ($this->request->is('post')) {
        	if ($this->Reports->saveAssociationColumns($report, $this->request->getData())) {
            	$this->Flash->success(__('Columns saved'));
            	dd($report);

            	return $this->redirect([
                	'action' => 'editFilters',
                	$report->id,
            	]);
        	}

        	$this->Flash->error(__('Unable to save association columns'));
    	}
	}
```

### new template plugins/ReportBuilder/templates/Reports/select_columns.php

```
<dl>
   <?php
   echo $this->Form->create();
   foreach ($report->all_columns as $associationName => $columns) {
       echo $this->Html->tag('dd', h($associationName));
       foreach ($columns as $column) {
           echo '<dl>';
           echo $this->Html->tag('dd', $this->Form->control(str_replace('.', ':', $associationName) . '.' . $column, [
               'type' => 'checkbox',
			'label' => h($column),
           ]));
           echo '</dl>';
       }
   }
   ?>
</dl>
<?php
echo $this->Form->submit();
echo $this->Form->end();
```

### in Report entity allColumns

```
protected function _getAllColumns(): array
   {
       $allColumns = [
           $this->starting_table => $this->fetchTable($this->starting_table)->getSchema()->columns(),
       ];


       $reportsTable = $this->fetchTable('ReportBuilder.Reports');
       foreach ($this->associations ?? [] as $association) {
           [$associationTable,]  = $reportsTable->goToAssociation($this->starting_table, $association->name);
           $allColumns[$association->name] = $associationTable->getSchema()->columns();
       }


       return $allColumns;
   }
}
```

### then in ReportsTable

```
public function saveAssociationColumns(Report $report, array $data)
{
   // columns for the starting table
   $columnsForStartingTable = $data[$report->starting_table] ?? [];
   $report->starting_table_columns = $this->checkedColumns($columnsForStartingTable);
   unset($data[$report->starting_table]);


   foreach ($data as $associationName => $columns) {
       $association = $report->getAssociationByName(str_replace(':', '.', $associationName));
       if ($association) {
           $association->table_columns = $this->checkedColumns($columns);
           $report->setDirty('associations');
       }
   }


   return $this->save($report);
}


protected function checkedColumns(array $columns): array
{
   return array_keys(
       collection($columns)
           ->filter(function ($value) {
               return $value === '1';
           })
           ->toArray()
   );
}
```

### In Report entity

```
public function getAssociationByName(string $associationName): Association|null
{
   foreach ($this->associations as $association) {
       if ($association->name === $associationName) {
           return $association;
       }
   }


   return null;
}
```

### check it's being saved 

## Run the report

### Reports/index.php template

```
<?= $this->Html->link(__('Run'), ['action' => 'run', $report->id]) ?>
```

### ReportsController

```
public function run(int $id)
{
   $report = $this->Reports->get($id, contain: ['Associations']);
   $reportRun = $this->Reports->run($report);


   $this->set(compact('reportRun', 'report'));
}

```

### ReportsTable

```
public function run(Report $report): array
{
   $startingTable = $this->fetchTable($report->starting_table);
   $runQuery = $startingTable->find();


   return $this->addContain($report, $runQuery)
       ->disableHydration()
       ->toArray();
}


protected function addContain(Report $report, SelectQuery $runQuery): SelectQuery
{
   foreach ($report->associations as $association) {
       /**
        * @var \ReportBuilder\Model\Entity\Association $association
        */
       $runQuery->contain($association->name);
   }


   return $runQuery;
}
```

### Reports/run.php template

```
<style>
   .collapsible-content {
       display: none;
   }


   .collapsible-header {
       cursor: pointer;
       background-color: #f2f2f2;
   }


   .report-value {
       display: table-cell;
       padding: 2px;
       width: 200px;
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


foreach ($reportRun as $row) {
   echo $this->Report->row($row);
}
```



###  New Report helper

```
bin/cake bake helper Report --plugin ReportBuilder
```

```
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
           $belongsToData = [];
           foreach ($nestedRows as $nestedName => $nestedRow) {
               if (is_array($nestedRow)) {
                   $nestedRowHtml .= $this->row($nestedRow, true);
               } else {
                   $belongsToData[$nestedName] = $nestedRow;
               }
           }
           if ($belongsToData) {
               $nestedRowHtml .= $this->row($belongsToData, true);
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
```

## Add selected columns to the run report

### In ReportsTable

```
public function run(Report $report): array
{
   $startingTable = $this->fetchTable($report->starting_table);
   $runQuery = $startingTable->find();
   $runQuery = $this->addContain($report, $runQuery);


   return $this->addSelect($report, $runQuery)
       ->disableHydration()
       ->toArray();
}


protected function addContain(Report $report, SelectQuery $runQuery): SelectQuery
{
   foreach ($report->associations as $association) {
       /**
        * @var \ReportBuilder\Model\Entity\Association $association
        */
       $runQuery->contain([
           $association->name => [
               'fields' => $association->table_columns,
           ]
       ]);
   }


   return $runQuery;
}


protected function addSelect(Report $report, SelectQuery $runQuery): SelectQuery
{
   if (!$report->starting_table_columns) {
       return $runQuery;
   }
   $startingTable = $this->fetchTable($report->starting_table);
   $runQuery->select(collection($report->starting_table_columns)
       ->map(fn($column) => $startingTable->aliasField($column))
       ->toArray());


   return $runQuery;
}
```

## Add filter widget for ints

### new migration

```
   	$this->table('rb_reports')
        	->addColumn('filters', 'json', [
            	'null' => true,
        	])
        	->save();
```

### in ReportsController 

```
public function editFilters(int $id)
{
   $report = $this->Reports->get($id);
   $typeMap = $this->fetchTable($report->starting_table)->getSchema()->typeMap();
   if ($this->request->is('post')) {
       $report->filters = collection($this->request->getData())
           ->filter(fn($value, $key) => in_array($key, array_keys($typeMap)))
           ->toArray();
       if (!$this->Reports->save($report)) {
           $this->Flash->error(__('Unable to save the filters'));
       }


       return $this->redirect([
           'action' => 'index',
       ]);
   }


   $this->set(compact('typeMap'));
}
```

### in Report entity

```
'filters' => true,
```

### create edit_filters template

```
<?php
/**
* @var \App\View\AppView $this
*/
$this->Form->addWidget('conditionInteger', spec: [
   \ReportBuilder\View\Widget\ConditionIntegerWidget::class,
   'select',
]);
echo $this->Form->create();
foreach ($typeMap as $column => $type) {
   if ($type !== 'integer') {
       continue;
   }
   echo $this->Form->control($column, [
       'type' => 'condition' . ucfirst($type),
   ]);
}
echo $this->Form->submit();
echo $this->Form->end();
```

### create plugins/ReportBuilder/View/Widget/ConditionIntegerWidget.php

```
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
```

## Apply filters to report run

### on ReportsTable::run

```
$runQuery = $this->applyFilters($report, $runQuery);
```

And 

```
protected function applyFilters(Report $report, SelectQuery $runQuery): SelectQuery
{
   if (!$report->filters) {
       return $runQuery;
   }


   foreach ($report->filters as $column => $filter) {
       $value = $filter['value'] ?? null;
       $condition = $filter['condition'] ?? null;
       $startingTable = $this->fetchTable($report->starting_table);


       if (!$condition) {
           continue;
       }
       switch ($condition) {
           case '>=':
               $runQuery->where($runQuery->newExpr()->gte($startingTable->aliasField($column), $value));
               break;
           case '<=':
               $runQuery->where($runQuery->newExpr()->lte($startingTable->aliasField($column), $value));
               break;
           case '=':
               $runQuery->where($runQuery->newExpr()->eq($startingTable->aliasField($column), $value));
               break;
           default:
               throw new \OutOfBoundsException('Condition not found');
       }
   }


   return $runQuery;
}
```



## OPTIONAL new widget for dates

### add new conditions to applyFilters

```
case 'this_month':
   $runQuery->where($runQuery->newExpr()->between(
       $startingTable->aliasField($column),
       Date::parse('first day of this month'),
       Date::parse('last day of this month'))
   );
   break;
case 'last_month':
   $runQuery->where($runQuery->newExpr()->between(
       $startingTable->aliasField($column),
       Date::parse('first day of last month'),
       Date::parse('last day of last month'))
   );
   break;
case 'this_week':
   $runQuery->where($runQuery->newExpr()->between(
       $startingTable->aliasField($column),
       Date::parse('this week'),
       Date::parse('next week')->subDays(1))
   );
   break;
```


### create plugins/ReportBuilder/src/View/Widget/ConditionDateWidget.php

```
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
```

### add the widget to edit_filters

```
$this->Form->addWidget('conditionDate', \ReportBuilder\View\Widget\ConditionDateWidget::class);
```

```
if (!in_array($type, ['integer', 'date'])) {
```       

## Simple Pagination

### in ReportsController

```
public function run(int $id)
{
   $report = $this->Reports->get($id, contain: ['Associations']);
   $paginator = new SimplePaginator();
   $reportRun = $paginator->paginate(
       $this->Reports->run($report),
       $this->request->getQueryParams()
   );


   $this->set(compact('reportRun', 'report'));
}
```


### fix return type for run method in ReportsTable to SelectQuery

### add the pagination element in run template

```
echo $this->element('simple_pagination');
```

### add simple pagination with custom templates plugins/ReportBuilder/templates/element/simple_pagination.php

```
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
```

## optional add report headers

### ReportHelper

```
public function headers(array $row): string
{
   $headers = '';
   foreach (array_keys($row) as $name) {
       $headers .= $this->Html->tag('div', $name, [
           'escape' => true,
           'class' => 'report-value',
       ]);
   }


   return $headers;
}
```

### run template

```
echo $this->Report->headers($reportRun->items()->first() ?? []);
```

## Add API

plugins/ReportBuilder/src/Controller/ApiController.php

```
<?php
declare(strict_types=1);


namespace ReportBuilder\Controller;


use Cake\Datasource\Paging\SimplePaginator;
use Cake\ORM\Locator\LocatorAwareTrait;


/**
* Reports Controller
*
* @property \ReportBuilder\Model\Table\ReportsTable $Reports
*/
class ApiController extends AppController
{
   use LocatorAwareTrait;
   /**
    * Index method
    *
    * @return \Cake\Http\Response|null|void Renders view
    */
   public function index(int $id)
   {
       $reportsTable = $this->fetchTable('ReportBuilder.Reports');
       $report = $reportsTable->get($id, contain: ['Associations']);
       $paginator = new SimplePaginator();
       $reportRun = $paginator->paginate(
           $reportsTable->run($report),
           $this->request->getQueryParams()
       );


       $this->set(compact('reportRun'));
       $this->viewBuilder()->setOption('serialize', ['reportRun']);
       // forced to return json
       $this->viewBuilder()->setClassName('Json');
   }
}
```

### tweak API routes

```
$builder->connect('/api/{id}', [
   'controller' => 'Api',
   'action' => 'index',
], [
   'pass' => ['id'],
]);
```

## Optional update API to use a report slug

```
composer require muffin/slug
bin/cake plugin load Muffin/Slug
```

### add migration 

```
$this->table('rb_reports')
        	->addColumn('slug', 'string', [
            	'null' => true,
        	])
        	->save();
```

### Change ApiController to

```
public function index(string $slug)
	{
    	$reportsTable = $this->fetchTable('ReportBuilder.Reports');
    	$report = $reportsTable
        	->findBySlug($slug)
        	->contain('Associations')
        	->firstOrFail();
    	$paginator = new SimplePaginator();
    	$reportRun = $paginator->paginate(
        	$reportsTable->run($report),
        	$this->request->getQueryParams()
    	);

    	$this->set(compact('reportRun'));
    	$this->viewBuilder()->setOption('serialize', ['reportRun']);
    	// forced to return json
    	$this->viewBuilder()->setClassName('Json');
	}
}
```

### add behavior to ReportsTable

```
$this->addBehavior('Muffin/Slug.Slug');
```

### update routes for API

```
$builder
   ->connect('/api/{slug}', [
       'controller' => 'Api',
       'action' => 'index',
   ])
   ->setPass([
       'slug',
   ])
   ->setPatterns([
       'slug' => '[a-z0-9]+(?:-[a-z0-9]+)*',
   ])
   ->setMethods([
       'get'
   ]);
```

## Consume API for chart

### create templates/Pages/chart.php

```
<?php
$this->disableAutoLayout();
?>
<!DOCTYPE html>
<html>
<head>
   <title>Total Time Per Project Chart</title>
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<canvas id="projectsChart" width="400" height="200"></canvas>
<script>
   // Fetch data from the endpoint
   fetch('https://cf24.ddev.site/rb/api/chart') // Replace with your actual endpoint
       .then(response => response.json())
       .then(data => {
           // Aggregate total time per project
           const projects = data.reportRun;
           const projectNames = [];
           const projectHours = [];


           projects.forEach(project => {
               let totalHours = 0;
               project.issues.forEach(issue => {
                   issue.time_entries.forEach(entry => {
                       totalHours += entry.hours ? entry.hours : 0;
                   });
               });
               projectNames.push(project.name);
               projectHours.push(totalHours);
           });


           // Create the chart
           const ctx = document.getElementById('projectsChart').getContext('2d');
           const projectsChart = new Chart(ctx, {
               type: 'pie',
               data: {
                   labels: projectNames,
                   datasets: [{
                       label: 'Total Hours',
                       data: projectHours,
                       backgroundColor: [
                           'rgba(255, 99, 132, 0.2)',
                           'rgba(54, 162, 235, 0.2)',
                           'rgba(255, 206, 86, 0.2)',
                           'rgba(75, 192, 192, 0.2)',
                           'rgba(153, 102, 255, 0.2)',
                           'rgba(255, 159, 64, 0.2)'
                       ],
                       borderColor: [
                           'rgba(255, 99, 132, 1)',
                           'rgba(54, 162, 235, 1)',
                           'rgba(255, 206, 86, 1)',
                           'rgba(75, 192, 192, 1)',
                           'rgba(153, 102, 255, 1)',
                           'rgba(255, 159, 64, 1)'
                       ],
                       borderWidth: 1
                   }]
               },
               options: {
                   responsive: true
               }
           });
       })
       .catch(error => console.error('Error fetching data:', error));
</script>
</body>
</html>
```

NOTE you'll need a chart named chart for Projects having Issues and TimeEntries. Update the report fetch url to match your domain.

## Autocomplete widget for associations

### create widget plugins/ReportBuilder/src/View/Widget/AutocompleteAssociationWidget.php

```
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
                   list: [],
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
```

### update edit_filters

```
<?php
/**
* @var \App\View\AppView $this
*/
$this->Form->addWidget('conditionInteger', spec: [
   \ReportBuilder\View\Widget\ConditionIntegerWidget::class,
   'select',
]);
$this->Form->addWidget('conditionDate', \ReportBuilder\View\Widget\ConditionDateWidget::class);
$this->Form->addWidget('autocompleteAssociation', ['ReportBuilder.AutocompleteAssociation', '_view']);
echo $this->Form->create();
foreach ($typeMap as $column => $type) {
   $association = $report->columnForeignKeyAssociationName($column);
   if ($association) {
       echo $this->Form->control($column, [
           'type' => 'autocompleteAssociation',
           'association' => $association,
           'reportId' => $report->id,
       ]);
       continue;
   }
   if (!in_array($type, ['integer', 'date'])) {
       continue;
   }
   echo $this->Form->control($column, [
       'type' => 'condition' . ucfirst($type),
   ]);
}
echo $this->Form->submit();
echo $this->Form->end();
```

### add new case in ReportsTable::applyFilters

```
case 'autocomplete':
   if ($value) {
       $runQuery->where($runQuery->newExpr()->eq($column, $value));
   }
   break;
```

### add method to Report entity

```
public function columnForeignKeyAssociationName(string $column): string|null
{
   $startingTable = $this->fetchTable($this->starting_table);
   foreach ($startingTable->associations() as $name => $association) {
       if ($association instanceof BelongsTo && $association->getForeignKey() === $column) {
           return $association->getName();
       }
   }


   return null;
}
```


### fix ReportsController::editFilters to 

```
$this->set(compact('typeMap', 'report'));
```

### add missing method autocomplete to ReportsController

```
public function autocomplete(int $id)
{
   $this->request->allowMethod('get');
   $associationName = $this->request->getQuery('association');
   $term = $this->request->getQuery('term');
   $report = $this->Reports->get($id);


   if ($associationName && $term) {
       $startingTable = $this->fetchTable($report->starting_table);
       if ($association = $startingTable->getAssociation($associationName)) {
           $results = $association->find('list')
               ->where([
                   $association->aliasField($association->getDisplayField()) . ' LIKE' => $term . '%',
               ])
               ->formatResults(function ($results) use ($association) {
                   return $results->map(function ($label, $value) use ($association) {
                       $row['label'] = $label;
                       $row['value'] = $value;


                       return $row;
                   });
               })
               ->disableHydration()
               ->limit(20)
               ->toArray();
       }
   }


   $this->set('results', $results);
   $this->viewBuilder()->setOption('serialize', ['results']);
   $this->viewBuilder()->setClassName('Json');
}
```



