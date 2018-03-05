<?php
/**
 * Created by abelair.
 * Date: 2018-02-13
 * Time: 9:55 AM
 */

namespace atkdemo\ui;


class Wizard extends \atk4\ui\Wizard
{
    public function urlNext()
    {
        return $this->stepCallback->getURL($this->currentStep + 1, ['page' => 'comp-wizard-index']);
    }
}