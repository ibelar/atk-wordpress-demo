<?php
/**
 * Main task class.
 */

namespace atkdemo\tasks;

use atkdemo\Plugin;
use atkwp\AtkWp;

class Task
{
    /**
     * The plugin that need the task.
     *
     * @var Plugin
     */
    protected $plugin;

    public function __construct(Plugin $plugin)
    {
        $this->plugin = $plugin;
    }
}
