<?php

/**
 *
 * @see XenResource_ControllerPublic_Author
 */
class ThemeHouse_ResAuthors_Extend_XenResource_ControllerPublic_Author extends XFCP_ThemeHouse_ResAuthors_Extend_XenResource_ControllerPublic_Author
{

    public function actionIndex()
    {
        if (class_exists('ThemeHouse_ResMans_ResourceManager')) {
            if (ThemeHouse_ResMans_ResourceManager::hasInstance()) {
                $resourceManager = ThemeHouse_ResMans_ResourceManager::getInstance();
                if (!empty($resourceManager['resource_manager_id'])) {

                    if ($this->_input->filterSingle('user_id', XenForo_Input::UINT)) {
                        return $this->responseReroute(__CLASS__, 'view');
                    }

                    $resourceModel = $this->_getResourceModel();

                    $authors = $resourceModel->getMostActiveAuthorsForResourceManager(
                        $resourceManager['resource_manager_id'], 20);
                    if (!$authors) {
                        return $this->responseRedirect(XenForo_ControllerResponse_Redirect::RESOURCE_CANONICAL,
                            XenForo_Link::buildPublicLink('resources'));
                    }

                    $viewParams = array(
                        'authors' => $authors
                    );
                    return $this->responseView('XenResource_ViewPublic_Author_List', 'resource_author_list',
                        $viewParams);
                }
            }
        }

        return parent::actionIndex();
    } /* END actionIndex */
}