<?php
/**
 * Demo table.
 */

namespace atkdemo\panels\components;

use atkdemo\models\SomeData;
use atkwp\components\PanelComponent;

class TablePanel extends PanelComponent
{
    public function init()
    {
        parent::init();
        date_default_timezone_set('UTC');

        /////////////////////////////////////////////////
        $this->add(['Header', 'Table with data from model']);

        $bb = $this->add(['View', 'ui' => 'buttons']);
        $table = $this->add(['Table', 'celled' => true]);

        $bb->add(['Button', 'Refresh Table', 'icon' => 'refresh'])
           ->on('click', new \atk4\ui\jsReload($table));

        $bb->on('click', $table->js()->reload());

        $table->setModel(new SomeData(), false);

        $table->addColumn('name');
        $table->addColumn('surname', new \atk4\ui\TableColumn\Template('{$surname}'))->addClass('warning');
        $table->addColumn('title', new \atk4\ui\TableColumn\Status([
            'positive' => ['Prof.'],
            'negative' => ['Dr.'],
        ]));

        $table->addColumn('date');
        $table->addColumn('salary', new \atk4\ui\TableColumn\Money()); //->addClass('right aligned single line', 'all'));

        $table->addHook('getHTMLTags', function ($table, $row) {
            if ($row->id == 1) {
                return [
                    'name' => $table->app->getTag('div', ['class' => 'ui ribbon label'], $row['name']),
                ];
            }
        });

        $table->addTotals(['name' => 'Totals:', 'salary' => ['sum']]);

        ///////////////////////////////////////////////////

        $this->add(['Header', 'Table with data from array']);

        $my_array = [
            ['name' => 'Vinny', 'surname' => 'Sihra', 'birthdate' => new \DateTime('1973-02-03')],
            ['name' => 'Zoe', 'surname' => 'Shatwell', 'birthdate' => new \DateTime('1958-08-21')],
            ['name' => 'Darcy', 'surname' => 'Wild', 'birthdate' => new \DateTime('1968-11-01')],
            ['name' => 'Brett', 'surname' => 'Bird', 'birthdate' => new \DateTime('1988-12-20')],
        ];

        $table = $this->add('Table');
        $table->setSource($my_array, false);

        $table->addColumn('surname'/*, ['Link', 'url' => 'details.php?surname={$surname}']*/);
        $table->addColumn('birthdate', null, ['type' => 'date']);

    }
}