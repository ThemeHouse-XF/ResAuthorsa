<?php

class ThemeHouse_ResAuthors_Install_Controller extends ThemeHouse_Install
{
    protected $_resourceManagerUrl = 'http://xenforo.com/community/resources/resource-authors-by-th.2746/';

    protected function _getPrerequisites()
    {
        return array(
            'XenResource' => '1000000'
        );
    } /* END _getPrerequisites */

    /**
     * Gets the tables (with fields) to be created for this add-on.
     * See parent for explanation.
     *
     * @return array Format: [table name] => fields
     */
    protected function _getTables()
    {
        return array(
            'xf_resource_category_user_th' => array(
                'resource_category_id' => 'INT(10) UNSIGNED NOT NULL', /* END 'resource_category_id' */
                'user_id' => 'INT(10) UNSIGNED NOT NULL', /* END 'user_id' */
                'resource_count' => 'INT(10) UNSIGNED NOT NULL', /* END 'resource_count' */
            ), /* END 'xf_resource_category_user_th' */
        );
    } /* END _getTables */

    protected function _getPrimaryKeys()
    {
        return array(
            'xf_resource_category_user_th' => array(
                'resource_category_id',
                'user_id'
            ), /* END 'xf_resource_category_user_th' */
        );
    } /* END _getPrimaryKeys */


    protected function _postInstall()
    {
        $addOn = $this->getModelFromCache('XenForo_Model_AddOn')->getAddOnById('YoYo_');
        if ($addOn) {
            $db->query("
                INSERT INTO xf_resource_category_user_th (resource_category_id, user_id, resource_count)
                    SELECT resource_category_id, user_id, resource_count
                        FROM xf_resource_category_user_waindigo"); 
        }
    }

}