<?php

/**
 *
 * @see XenResource_DataWriter_Category
 */
class ThemeHouse_ResAuthors_Extend_XenResource_DataWriter_Category extends XFCP_ThemeHouse_ResAuthors_Extend_XenResource_DataWriter_Category
{

    /**
     *
     * @see XenResource_DataWriter_Category::rebuildCounters()
     */
    public function rebuildCounters()
    {
        parent::rebuildCounters();

        $this->updateUserResourceCount();
    } /* END rebuildCounters */

    public function updateUserResourceCount()
    {
        $this->_db->delete('xf_resource_category_user_th',
            'resource_category_id = ' . $this->get('resource_category_id'));
        $this->_db->query(
            '
            INSERT INTO xf_resource_category_user_th
            (resource_category_id, user_id, resource_count)
                SELECT resource_category_id, user_id, COUNT(*)
                FROM xf_resource
                WHERE resource_category_id = ?
                    AND resource_state = \'visible\'
                GROUP BY user_id
            ', $this->get('resource_category_id'));
    } /* END updateUserResourceCount */
}