<?php
/**
 * Panel Configuration
 *
 * $config['panel']['id']  => $options  (array)(Required) An array containining the panel options. $options explain below.
 * 		Id must be unique within your namespace.
 *
 *		Ex: $config['panel']['panel1'] => $panel1_options;
 *			$config['panel']['panel2'] => $panel2_options;
 *
 *	array $options :
 *
 *  'uses'            => (string)(Required) The panel class to use. The class must extends atkwp\components\PanelComponent class.
 *						 					Ex: 'uses' =>  __NAMESPACE__ . '\panels\Event'.
 *
 *  'type'            => (string)(Required) The panel type, Type must be 'panel' or 'sub-panel'.
 *											A panel of type 'panel' will create an admin page accessible via an admin menu item in WP.
 *											A panel of type 'sub-panel' will create an admin page accessible via an admin sub menu item in WP.
 *											    - When panel are defined as 'sub-panel' type, they must indicate their 'parent' panel.
 *
 *  'parent'          => (string)(Required when type = 'sub-panel') A string holding the parent id in order to indicate which parent this sub panel belong too.
 *																	 Ex: 'panel1'.
 *
 *  'page'            => (string)(Required) A string holding the page title. The title of the page as shown in <title> tag.
 *
 *  'menu'            => (string)(Required) A string holding the name of the menu displayed in the admin dashboard.
 *
 *  'slug'            => (string)(Required) A sting holding the slug name that refer to the menu. Must be unique.
 *
 *  'capabilities'    => (string)(Required) A string holding the minimum capability required to view this panel.
 *
 *  'icon'            => (string)(Optional) A string holding the image path to a custom image for menu icon in dashboard.
 *											Image path value is relative to your assets directory.
 *                                          Ex: icon.png file is located under assets/images/icon.png then the path value should be 'images/icon.png'.
 *
 *  'position'        => (integer)(Optional) An integer holding the menu position in dashboard.
 *											ONLY applicable for 'panel' type.
 *
 *  'js'              => (array)(Optional)  An array of javascript file path (without the extension) to load with the panel.
 *											File path value is relative to your plugin assets/js directory.
 *                                          Ex: test.js file is located under assets/js/vendor/test.js then the path value should be 'vendor/test'.
 *
 *  'js-inc'          => (array)(Optional)  An array of already registered WordPress javascript files to load with the panel.
 *
 *  'css'             => (array)(Optional)  An array of css file path (without the extension) to load with this panel.
 *											File path value is relative to your plugin assets/css directory.
 *                                          Ex: test.css file is located under assets/css/test.css then the path value should be 'test'.
 */

namespace atkdemo;

$capabilities = 'view_demo';

$config['panel'] = [
    'basic' => [
            'type'         => 'panel',
            'page'         => 'UI Basic',
            'menu'         => 'UI Basic',
            'slug'         => 'basic-view-index',
            'uses'         => __NAMESPACE__ . '\\panels\\basics\\ViewPanel',
            'capabilities' => $capabilities,
            'position'     => null,
            'icon'         =>  'images/atk-logo.png',
            'js'           => [],
            'css'          => [],
    ],
    'basic-view' => [
            'type'         => 'sub-panel',
            'parent'       => 'basic',
            'page'         => 'View',
            'menu'         => 'View',
            'slug'         => 'basic-view-index',
            'uses'         => __NAMESPACE__ . '\\panels\\basics\\ViewPanel',
            'capabilities' => $capabilities,
            'position'     => null,
            'icon'         =>  '',
            'js'           => [],
            'css'          => [],
    ],
    'basic-button' => [
            'type'         => 'sub-panel',
            'parent'       => 'basic',
            'page'         => 'Button',
            'menu'         => 'Button',
            'slug'         => 'basic-button-index',
            'uses'         => __NAMESPACE__ . '\\panels\\basics\\ButtonPanel',
            'capabilities' => $capabilities,
            'position'     => null,
            'icon'         =>  '',
            'js'           => [],
            'css'          => [],
    ],
    'basic-header' => [
            'type'         => 'sub-panel',
            'parent'       => 'basic',
            'page'         => 'Header',
            'menu'         => 'Header',
            'slug'         => 'basic-header-index',
            'uses'         => __NAMESPACE__ . '\\panels\\basics\\HeaderPanel',
            'capabilities' => $capabilities,
            'position'     => null,
            'icon'         =>  '',
            'js'           => [],
            'css'          => [],
    ],
    'basic-msg' => [
           'type'         => 'sub-panel',
           'parent'       => 'basic',
           'page'         => 'Message',
           'menu'         => 'Message',
           'slug'         => 'basic-msg-index',
           'uses'         => __NAMESPACE__ . '\\panels\\basics\\MsgPanel',
           'capabilities' => $capabilities,
           'position'     => null,
           'icon'         =>  '',
           'js'           => [],
           'css'          => [],
    ],
    'basic-label' => [
            'type'         => 'sub-panel',
            'parent'       => 'basic',
            'page'         => 'Label',
            'menu'         => 'Label',
            'slug'         => 'basic-label-index',
            'uses'         => __NAMESPACE__ . '\\panels\\basics\\LabelPanel',
            'capabilities' => $capabilities,
            'position'     => null,
            'icon'         =>  '',
            'js'           => [],
            'css'          => [],
    ],
    //////////////////////////////////////////////////////////////
    'component' => [
            'type'         => 'panel',
            'page'         => 'UI Component',
            'menu'         => 'UI Component',
            'slug'         => 'comp-index',
            'uses'         => __NAMESPACE__ . '\\panels\\components\\MenuPanel',
            'capabilities' => $capabilities,
            'position'     => null,
            'icon'         =>  'images/atk-logo.png',
            'js'           => [],
            'css'          => [],
    ],
    'menu' =>   [
             'type'         => 'sub-panel',
             'parent'       => 'component',
             'page'         => 'Menu',
             'menu'         => 'Menu',
             'slug'         => 'comp-index',
             'uses'         => __NAMESPACE__ . '\\panels\\components\\MenuPanel',
             'capabilities' => $capabilities,
             'position'     => null,
             'icon'         =>  '',
             'js'           => [],
             'css'          => [],
    ],
    'tab' =>   [
            'type'         => 'sub-panel',
            'parent'       => 'component',
            'page'         => 'Tabs',
            'menu'         => 'Tabs',
            'slug'         => 'comp-tab-index',
            'uses'         => __NAMESPACE__ . '\\panels\\components\TabPanel',
            'capabilities' => $capabilities,
            'position'     => null,
            'icon'         =>  '',
            'js'           => [],
            'css'          => [],
    ],
    'form' => [
            'type'         => 'sub-panel',
            'parent'       => 'component',
            'page'         => 'Form',
            'menu'         => 'Form',
            'slug'         => 'comp-form-index',
            'uses'         => __NAMESPACE__ . '\\panels\\components\\FormPanel',
            'capabilities' => $capabilities,
            'position'     => null,
            'icon'         =>  '',
            'js'           => [],
            'css'          => [],
    ],
    'field' => [
            'type'         => 'sub-panel',
            'parent'       => 'component',
            'page'         => 'Field',
            'menu'         => 'Field',
            'slug'         => 'comp-field-index',
            'uses'         => __NAMESPACE__ . '\\panels\\components\\FieldPanel',
            'capabilities' => $capabilities,
            'position'     => null,
            'icon'         =>  '',
            'js'           => [],
            'css'          => [],
    ],
    'table' => [
            'type'         => 'sub-panel',
            'parent'       => 'component',
            'page'         => 'Table',
            'menu'         => 'Table',
            'slug'         => 'comp-table-index',
            'uses'         => __NAMESPACE__ . '\\panels\\components\\TablePanel',
            'capabilities' => $capabilities,
            'position'     => null,
            'icon'         =>  '',
            'js'           => [],
            'css'          => [],
    ],
    'pgtr' => [
            'type'         => 'sub-panel',
            'parent'       => 'component',
            'page'         => 'Paginator',
            'menu'         => 'Paginator',
            'slug'         => 'comp-pgtr-index',
            'uses'         => __NAMESPACE__ . '\\panels\\components\\PaginatorPanel',
            'capabilities' => $capabilities,
            'position'     => null,
            'icon'         =>  '',
            'js'           => [],
            'css'          => [],
    ],
    'column' => [
        'type'         => 'sub-panel',
        'parent'       => 'component',
        'page'         => 'Column',
        'menu'         => 'Column',
        'slug'         => 'comp-column-index',
        'uses'         => __NAMESPACE__ . '\\panels\\components\\ColumnPanel',
        'capabilities' => $capabilities,
        'position'     => null,
        'icon'         =>  '',
        'js'           => [],
        'css'          => ['columns'],
    ],
    'wizard' => [
        'type'         => 'sub-panel',
        'parent'       => 'component',
        'page'         => 'Wizard',
        'menu'         => 'Wizard',
        'slug'         => 'comp-wizard-index',
        'uses'         => __NAMESPACE__ . '\\panels\\components\\WizardPanel',
        'capabilities' => $capabilities,
        'position'     => null,
        'icon'         =>  '',
        'js'           => [],
        'css'          => [],
    ],
    //////////////////////////////////////////////////////////////
    'js-action' => [
            'type'         => 'panel',
            'page'         => 'UI Interactivity',
            'menu'         => 'UI Interactivity',
            'slug'         => 'js-index',
            'uses'         => __NAMESPACE__ . '\\panels\\actions\\JsPanel',
            'capabilities' => $capabilities,
            'position'     => null,
            'icon'         =>  'images/atk-logo.png',
            'js'           => [],
            'css'          => [],
    ],
    'js-event' => [
            'type'         => 'sub-panel',
            'parent'       => 'js-action',
            'page'         => 'js Event',
            'menu'         => 'js Event',
            'slug'         => 'js-index',
            'uses'         => __NAMESPACE__ . '\\panels\\actions\\JsPanel',
            'capabilities' => $capabilities,
            'position'     => null,
            'icon'         =>  '',
            'js'           => [],
            'css'          => [],
    ],
    'js-reload' => [
            'type'         => 'sub-panel',
            'parent'       => 'js-action',
            'page'         => 'js Reload',
            'menu'         => 'js Reload',
            'slug'         => 'js-reload-index',
            'uses'         => __NAMESPACE__ . '\\panels\\actions\\ReloadingPanel',
            'capabilities' => $capabilities,
            'position'     => null,
            'icon'         =>  '',
            'js'           => [],
            'css'          => [],
    ],
    'console' => [
            'type'         => 'sub-panel',
            'parent'       => 'js-action',
            'page'         => 'Console',
            'menu'         => 'Console',
            'slug'         => 'js-console-index',
            'uses'         => __NAMESPACE__ . '\\panels\\actions\\ConsolePanel',
            'capabilities' => $capabilities,
            'position'     => null,
            'icon'         =>  '',
            'js'           => [],
            'css'          => [],
    ],
    'profile' => [
        'type'         => 'panel',
        'page'         => 'Profile',
        'menu'         => 'Profile',
        'slug'         => 'profile-index',
        'uses'         => __NAMESPACE__ . '\\panels\\FakeProfilePanel',
        'capabilities' => $capabilities,
        'position'     => null,
        'icon'         =>  'dashicons-admin-users',
        'js'           => [],
        'css'          => [],
    ],
];
