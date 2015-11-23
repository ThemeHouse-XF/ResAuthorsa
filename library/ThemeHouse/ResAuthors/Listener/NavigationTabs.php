<?php

class ThemeHouse_ResAuthors_Listener_NavigationTabs extends ThemeHouse_Listener_NavigationTabs
{

    protected function _getNavigationTabs()
    {
        return array();
    } /* END _getNavigationTabs */

    public function run()
    {
        parent::run();

        foreach ($this->_extraTabs as &$extraTab) {
            if (!empty($extraTab['linksTemplate']) && $extraTab['linksTemplate'] == 'resources_tab_links') {
                $extraTab['showActiveAuthorLink'] = true;
            }
        }

        return $this->_extraTabs;
    } /* END run */

    public static function navigationTabs(array &$extraTabs, $selectedTabId)
    {
        $navigationTabsModel = new ThemeHouse_ResAuthors_Listener_NavigationTabs($extraTabs, $selectedTabId);
        $extraTabs = $navigationTabsModel->run();
    } /* END navigationTabs */
}