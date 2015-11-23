<?php

class ThemeHouse_ResAuthors_Listener_FileHealthCheck
{

    public static function fileHealthCheck(XenForo_ControllerAdmin_Abstract $controller, array &$hashes)
    {
        $hashes = array_merge($hashes,
            array(
                'library/ThemeHouse/ResAuthors/Extend/XenResource/ControllerPublic/Author.php' => '5fc654e8df288385282c7cbb21b659c8',
                'library/ThemeHouse/ResAuthors/Extend/XenResource/ControllerPublic/Resource.php' => 'd93988a0983d657de7cd2ae1a23132d2',
                'library/ThemeHouse/ResAuthors/Extend/XenResource/DataWriter/Category.php' => '420e068e691641177937565a518bcb8f',
                'library/ThemeHouse/ResAuthors/Extend/XenResource/DataWriter/Resource.php' => '7553d9f180118789e0e4a16df0d0faa2',
                'library/ThemeHouse/ResAuthors/Extend/XenResource/Model/Category.php' => '956b58e3aa600b6cf7771a89b048dd09',
                'library/ThemeHouse/ResAuthors/Extend/XenResource/Model/Resource.php' => '1dca9f6bb3aab828ea055baee2c287b6',
                'library/ThemeHouse/ResAuthors/Install/Controller.php' => '11ef143ec171aa801bf4ad4743ba0f45',
                'library/ThemeHouse/ResAuthors/Listener/LoadClass.php' => '6926818d1e4826efcc791abd3abc7147',
                'library/ThemeHouse/ResAuthors/Listener/NavigationTabs.php' => '7549ab9fe3c81497ebbb41fcc33a0797',
                'library/ThemeHouse/Install.php' => '18f1441e00e3742460174ab197bec0b7',
                'library/ThemeHouse/Install/20151109.php' => '2e3f16d685652ea2fa82ba11b69204f4',
                'library/ThemeHouse/Deferred.php' => 'ebab3e432fe2f42520de0e36f7f45d88',
                'library/ThemeHouse/Deferred/20150106.php' => 'a311d9aa6f9a0412eeba878417ba7ede',
                'library/ThemeHouse/Listener/ControllerPreDispatch.php' => 'fdebb2d5347398d3974a6f27eb11a3cd',
                'library/ThemeHouse/Listener/ControllerPreDispatch/20150911.php' => 'f2aadc0bd188ad127e363f417b4d23a9',
                'library/ThemeHouse/Listener/InitDependencies.php' => '8f59aaa8ffe56231c4aa47cf2c65f2b0',
                'library/ThemeHouse/Listener/InitDependencies/20150212.php' => 'f04c9dc8fa289895c06c1bcba5d27293',
                'library/ThemeHouse/Listener/LoadClass.php' => '5cad77e1862641ddc2dd693b1aa68a50',
                'library/ThemeHouse/Listener/LoadClass/20150518.php' => 'f4d0d30ba5e5dc51cda07141c39939e3',
                'library/ThemeHouse/Listener/NavigationTabs.php' => '68240ed2ca8e53f5c177997ea265d3b7',
                'library/ThemeHouse/Listener/NavigationTabs/20150106.php' => '5bffa2f8f925136f3277c867262c1d8d',
            ));
    }
}