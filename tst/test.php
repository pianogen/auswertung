<?php

include_once 'mdl_packagesTest.php';
include_once 'mdl_searchTest.php';
include_once 'mdl_updatesTest.php';
$mdl_search = new mdl_searchTest();
$mdl_packages = new mdl_packagesTest();
$mdl_updates = new mdl_updatesTest();
$mdl_packages->updatesToPackagesTest();
$mdl_packages->getSpecificPackageTest();
$mdl_packages->saveTest();
$mdl_packages->deleteTest();
$mdl_packages->getTypesTest();
$mdl_search->findAllUpdatesTest();
$mdl_search->findSpecificPackageTest();
$mdl_search->findSpecificUpdatesTest();
$mdl_search->getTypesTest();
$mdl_updates->findIdTest();
$mdl_updates->packagesToUpdatesTest();
$mdl_updates->getPackagesTest();
$mdl_updates->otherPackagesTest();
$mdl_updates->saveTest();
$mdl_updates->updateTest();
$mdl_updates->deleteTest();
?>