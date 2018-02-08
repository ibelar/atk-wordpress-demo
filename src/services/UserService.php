<?php
/**
 * Manage User in WP.
 */

namespace atkdemo\services;

class UserService
{
    private $user;

    public function __construct()
    {
    }

    public function addRoleCapability()
    {
        global $wp_roles;
        if ( isset ($wp_roles)){
            $wp_roles->add_role('demo_user', 'Demo User', ['read' => true, 'view_demo'=>true]);
            $wp_roles->add_cap('administrator', 'view_demo');
        }
    }

    /**
     * Get wp user on admin_init action hook.
     */
    public function setUserActionProfile()
    {
        $this->user = wp_get_current_user();
        remove_menu_page('profile.php');
    }

    public function removeRole()
    {
        remove_role('demo_user');
    }

    public function isDemoUser()
    {
        return $this->user->roles[0] === 'demo_user';
    }
}
