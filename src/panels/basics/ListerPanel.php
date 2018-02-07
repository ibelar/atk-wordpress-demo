<?php
/**
 * Demo lister.
 */

namespace atkdemo\panels\basics;


use atkwp\components\PanelComponent;

class ListerPanel extends PanelComponent
{
    public function init()
    {
        parent::init();

        $this->add(['Lister', 'defaultTemplate'=>'lister.html'])->setSource([
            ['icon'=>'map marker', 'title'=>'Krolewskie Jadlo', 'descr'=>'An excellent polish restaurant, quick delivery and hearty, filling meals'],
            ['icon'=> 'map marker', 'title'=>'Xian Famous Foods', 'descr'=>'A taste of Shaanxi\'s delicious culinary traditions, with delights like spicy cold noodles and lamb burgers.'],
            ['icon'=> 'check', 'title'=>'Sapporo Haru', 'descr'=>'Greenpoint\'s best choice for quick and delicious sushi'],
        ]);
    }
}