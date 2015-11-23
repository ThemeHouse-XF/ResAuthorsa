<?php

/**
 *
 * @see XenResource_ControllerPublic_Resource
 */
class ThemeHouse_ResAuthors_Extend_XenResource_ControllerPublic_Resource extends XFCP_ThemeHouse_ResAuthors_Extend_XenResource_ControllerPublic_Resource
{

    /**
     *
     * @see XenResource_ControllerPublic_Resource::actionIndex()
     */
    public function actionIndex()
    {
        $response = parent::actionIndex();

        if ($response instanceof XenForo_ControllerResponse_View) {
            $categoryModel = $this->_getCategoryModel();

            if (class_exists('ThemeHouse_ResMans_ResourceManager')) {
                if (ThemeHouse_ResMans_ResourceManager::hasInstance()) {
                    $resourceManager = ThemeHouse_ResMans_ResourceManager::getInstance();
                    if (!empty($resourceManager['resource_manager_id'])) {
                        $resourceModel = $this->_getResourceModel();
                        $response->params['activeAuthorsForRM'] = $resourceModel->getMostActiveAuthorsForResourceManager(
                            $resourceManager['resource_manager_id'], 5);
                    }
                }
            }
        }

        return $response;
    } /* END actionIndex */

    /**
     *
     * @see XenResource_ControllerPublic_Resource::actionCategory()
     */
    public function actionCategory()
    {
        $response = parent::actionCategory();

        if ($response instanceof XenForo_ControllerResponse_View) {
            $categoryModel = $this->_getCategoryModel();

            $category = $response->params['category'];

            $response->params['activeAuthors'] = $categoryModel->getMostActiveAuthors($category, 5);
        }

        return $response;
    } /* END actionCategory */
}