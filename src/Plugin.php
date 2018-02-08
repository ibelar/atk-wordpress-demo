<?php
/**
 * The Plugin implementation.
 */

namespace atkdemo;

use atkdemo\services\ActionService;
use atkdemo\services\UserService;
use atkwp\interfaces\PluginInterface;
use atkwp\AtkWp;

class Plugin extends AtkWp implements PluginInterface
{
    /**
     * The options name for this plugin
     * saved in WP options table.
     *
     * @var string
     */
    protected $optionName;

    private $userService = null;
    private $actionService = null;

    public function init()
    {
        $this->setDbConnection();
        $this->optionName = "_{$this->getPluginName()}_options";
        $this->setAppUiPersistence(new ui\Persistence());
        $this->userService = new UserService();
        $this->actionService = (new ActionService($this->userService))->setupPluginAction($this);
    }

    public function getOptionName()
    {
        return $this->optionName;
    }

    public function getUserService()
    {
        return $this->userService;
    }

    public function activatePlugin()
    {
        $this->userService->addRoleCapability();
    }

    public function deactivatePlugin()
    {
        $this->userService->removeRole();
    }

    public function uninstallPlugin()
    {
        // TODO: Implement uninstallPlugin() method.
    }
}
