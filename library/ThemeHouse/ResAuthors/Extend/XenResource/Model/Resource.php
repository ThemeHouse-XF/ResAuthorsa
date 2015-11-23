<?php

/**
 *
 * @see XenResource_Model_Resource
 */
class ThemeHouse_ResAuthors_Extend_XenResource_Model_Resource extends XFCP_ThemeHouse_ResAuthors_Extend_XenResource_Model_Resource
{

    public function getMostActiveAuthorsForResourceManager($resourceManagerId, $limit, $offset = 0)
    {
        return $this->fetchAllKeyed(
            $this->limitQueryResults(
                '
				SELECT user.*, user_profile.*, SUM(resource_category_user_th.resource_count) AS resource_count
				FROM xf_user AS user
				LEFT JOIN xf_user_profile AS user_profile ON
					(user.user_id = user_profile.user_id)
                LEFT JOIN xf_resource_category_user_th AS resource_category_user_th ON
                    (user.user_id = resource_category_user_th.user_id)
                INNER JOIN xf_resource_category AS resource_category ON
                    (resource_category_user_th.resource_category_id = resource_category.resource_category_id)
                INNER JOIN xf_resource_manager_category_th AS resource_manager_category_th ON
                    (resource_category.resource_category_id = resource_manager_category_th.resource_category_id)
				WHERE user.resource_count > 0
                    AND resource_manager_category_th.resource_manager_id = ?
                GROUP BY user.user_id
				ORDER BY resource_count DESC
			', $limit, $offset), 'user_id', $resourceManagerId);
    } /* END getMostActiveAuthorsForResourceManager */
}