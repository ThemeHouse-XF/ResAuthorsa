<?php

class ThemeHouse_ResAuthors_Listener_LoadClass extends ThemeHouse_Listener_LoadClass
{

    protected function _getExtendedClasses()
    {
        return array(
            'ThemeHouse_ResAuthors' => array(
                'datawriter' => array(
                    'XenResource_DataWriter_Resource',
                    'XenResource_DataWriter_Category'
                ), /* END 'datawriter' */
                'controller' => array(
                    'XenResource_ControllerPublic_Resource',
                    'XenResource_ControllerPublic_Author'
                ), /* END 'controller' */
                'model' => array(
                    'XenResource_Model_Category',
                    'XenResource_Model_Resource'
                ), /* END 'model' */
            ), /* END 'ThemeHouse_ResAuthors' */
        );
    } /* END _getExtendedClasses */

    public static function loadClassDataWriter($class, array &$extend)
    {
        $loadClassDataWriter = new ThemeHouse_ResAuthors_Listener_LoadClass($class, $extend, 'datawriter');
        $extend = $loadClassDataWriter->run();
    } /* END loadClassDataWriter */

    public static function loadClassController($class, array &$extend)
    {
        $loadClassController = new ThemeHouse_ResAuthors_Listener_LoadClass($class, $extend, 'controller');
        $extend = $loadClassController->run();
    } /* END loadClassController */

    public static function loadClassModel($class, array &$extend)
    {
        $loadClassModel = new ThemeHouse_ResAuthors_Listener_LoadClass($class, $extend, 'model');
        $extend = $loadClassModel->run();
    } /* END loadClassModel */
}