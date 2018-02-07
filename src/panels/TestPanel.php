<?php
/**
 * Test.
 */

namespace atkdemo\panels;

class TestPanel extends \atkwp\components\PanelComponent
{
    public function init()
    {
        parent::init();
//        $plane = $this->add(['View', 'template' => new \atk4\ui\Template(
//            '<div id="{$_id}" class="ui statistic">
//                <div class="value">
//                  <i class="plane icon"></i> {$num}
//                </div>
//                <div class="label">
//                  Flights
//                </div>
//              </div>'
//        )]);
//        $plane->template->set('num', rand(5, 20));
//
//        $this->add(['Button', 'Reload plane', 'icon' => 'refresh'])->on('click', new \atk4\ui\jsReload($plane));

        $form = $this->add('Form');
        $form->addField('test');
        $form->onSubmit(function($f){
           return 'success';
        });
    }
}