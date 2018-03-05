<?php
/**
 * Plugin installation.
 */

namespace atkdemo\tasks;

use atkwp\models\Options;

class Install extends Task
{
    private $version = '1.0.0';

    public function checkVersion()
    {
        $this->plugin->activateLoader();
        $optionModel = new Options($this->plugin->getDbConnection());
        $options = $optionModel->getOptionValue($this->plugin->getOptionName(), null);

        if (!$options['version']) {
            $options['version'] = $this->version;
            $optionModel->saveOptionValue($this->plugin->getOptionName(), $options);
        }
    }

    public function install()
    {

    }
}
