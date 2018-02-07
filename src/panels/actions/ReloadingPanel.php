<?php
/**
 * Demo reload event panel.
 */

namespace atkdemo\panels\actions;

use atk4\ui\jsExpression;
use atk4\ui\jsReload;
use atkdemo\ui\Counter;
use atkwp\components\PanelComponent;

class ReloadingPanel extends PanelComponent
{

    public function init()
    {
        parent::init();

        // Test 1 - Basic reloading
        $this->add(['Header', 'Button reloading segment']);
        $v = $this->add(['View', 'ui' => 'segment'])->set((string) rand(1, 100));
        $this->add(['Button', 'Reload random number'])->js('click', new jsReload($v));

        // Test 2 - Reloading self
        $this->add(['Header', 'JS-actions will be re-applied']);
        $b2 = $this->add(['Button', 'Reload Myself']);
        $b2->js('click', new jsReload($b2));

        // Test 3 - avoid duplicate
        $this->add(['Header', 'No duplicate JS bindings']);
        $b3 = $this->add(['Button', 'Reload other button']);
        $b4 = $this->add(['Button', 'Add one dot']);

        $b4->js('click', $b4->js()->text(new jsExpression('[]+"."', [$b4->js()->text()])));
        $b3->js('click', new jsReload($b4));

        // Test 3 - avoid duplicate
        $this->add(['Header', 'Make sure nested JS bindings are applied too']);
        $seg = $this->add(['View', 'ui' => 'segment']);

        // Add 3 counters
        $seg->add(new Counter());
        $seg->add(new Counter('40'));
        $seg->add(new Counter('-20'));

        // Add button to reload all counters
        $bar = $this->add(['View', 'ui' => 'buttons']);
        $b = $bar->add(['Button', 'Reload counter'])->js('click', new jsReload($seg));

        // Relading with argument
        $this->add(['Header', 'We can pass argument to reloader']);

        $v = $this->add(['View', 'ui' => 'segment'])->set(isset($_GET['val']) ? $_GET['val'] : 'No value');

        $this->add(['Button', 'Set value to "hello"'])->js('click', new jsReload($v, ['val' => 'hello']));
        $this->add(['Button', 'Set value to "world"'])->js('click', new jsReload($v, ['val' => 'world']));

        $val = $this->add(['FormField/Line', '']);
        $val->addAction('Set Custom Value')->js('click', new jsReload($v, ['val' => $val->jsInput()->val()]));

    }
}