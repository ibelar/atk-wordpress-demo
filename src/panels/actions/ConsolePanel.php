<?php
/**
 * Demo Console panel.
 */

namespace atkdemo\panels\actions;

use atkdemo\models\Test;
use atkwp\components\PanelComponent;

class ConsolePanel extends PanelComponent
{
    public function init()
    {
        parent::init();

        $c = $this->add('Console')->set(function ($console) {
            $console->output('Executing test process...');
            sleep(1);
            $console->output('Now trying something dangerous..');
            sleep(1);

            throw new \atk4\data\Exception('BOOM');
            $console->output('hello there');
        });
        $c->addStyle('overflow', 'auto');

        $this->add('Console')->setModel($this->add(new Test()), 'generateReport');
    }
}
