<?php

/**
 *
 * @see XenResource_DataWriter_Resource
 */
class ThemeHouse_ResAuthors_Extend_XenResource_DataWriter_Resource extends XFCP_ThemeHouse_ResAuthors_Extend_XenResource_DataWriter_Resource
{

    /**
     *
     * @see XenResource_DataWriter_Resource::_postSave()
     */
    protected function _postSave()
    {
        parent::_postSave();

        if ($this->isUpdate() && ($this->isChanged('user_id') || $this->isChanged('resource_category_id'))) {
            if ($this->get('user_id') && $this->get('resource_category_id') && $this->get('resource_state') == 'visible' && !$this->isChanged(
                'resource_state')) {
                $this->_db->query(
                    '
					INSERT INTO xf_resource_category_user_th
					(resource_category_id, user_id, resource_count)
					VALUES (?, ?, 1)
                    ON DUPLICATE KEY UPDATE resource_count = resource_count + 1
				',
                    array(
                        $this->get('resource_category_id'),
                        $this->get('user_id')
                    ));
            }

            if ($this->getExisting('user_id') && $this->getExisting('resource_category_id') &&
                 $this->getExisting('resource_state') == 'visible') {
                $this->_db->query(
                    '
					UPDATE xf_resource_category_user_th
					SET resource_count = resource_count - 1
					WHERE user_id = ? AND resource_category_id = ?
				',
                    array(
                        $this->getExisting('user_id'),
                        $this->getExisting('resource_category_id')
                    ));
            }
        }
    } /* END _postSave */

    /**
     *
     * @see XenResource_DataWriter_Resource::_resourceRemoved()
     */
    protected function _resourceRemoved()
    {
        if ($this->get('user_id') && $this->get('resource_category_id')) {
            $this->_db->query(
                '
					UPDATE xf_resource_category_user_th
					SET resource_count = resource_count - 1
					WHERE user_id = ? AND resource_category_id = ?
				',
                array(
                    $this->getExisting('user_id'),
                    $this->getExisting('resource_category_id')
                ));
        }
    } /* END _resourceRemoved */

    /**
     *
     * @see XenResource_DataWriter_Resource::_resourceMadeVisible()
     */
    protected function _resourceMadeVisible(array &$postSaveChanges)
    {
        parent::_resourceMadeVisible($postSaveChanges);

        if ($this->get('user_id') && $this->get('resource_category_id') && $this->get('resource_state') == 'visible') {
            $this->_db->query(
                '
					INSERT INTO xf_resource_category_user_th
					(resource_category_id, user_id, resource_count)
					VALUES (?, ?, 1)
                    ON DUPLICATE KEY UPDATE resource_count = resource_count + 1
				',
                array(
                    $this->get('resource_category_id'),
                    $this->get('user_id')
                ));
        }
    } /* END _resourceMadeVisible */
}