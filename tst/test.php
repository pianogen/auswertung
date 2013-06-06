<?php

include_once 'mdl_packagesTest.php';

$mdl_packages = new mdl_packagesTest();

$mdl_packages->updatesToPackagesTest();

$mdl_packages->getSpecificPackageTest();

$mdl_packages->saveTest();

$mdl_packages->deleteTest();

$mdl_packages->deletefalseIdTest();

$mdl_packages->getTypesTest();
?>