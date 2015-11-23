<?php

/**
 *
 * @see XenResource_Model_Category
 */
class ThemeHouse_ResAuthors_Extend_XenResource_Model_Category extends XFCP_ThemeHouse_ResAuthors_Extend_XenResource_Model_Category
{

    public function getMostActiveAuthors(array $category, $limit, $offset = 0)
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
				WHERE user.resource_count > 0
                    AND resource_category.lft >= ?
                    AND resource_category.rgt <= ?
                GROUP BY user.user_id
				ORDER BY resource_count DESC
			', $limit, $offset), 'user_id', array(
                $category['lft'],
                $category['rgt']
            ));
    } /* END getMostActiveAuthors */
}