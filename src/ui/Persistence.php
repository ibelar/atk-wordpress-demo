<?php
/**
 * Demo UI persistence.
 */

namespace atkdemo\ui;


use atk4\ui\Persistence\UI;

class Persistence extends UI
{
    public function __construct()
    {
        //set currency symbol for this plugin.
        $this->currency = '$';
    }
}