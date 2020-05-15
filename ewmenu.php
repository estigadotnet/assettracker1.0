<?php
namespace PHPMaker2020\p_assettracker1_0;

// Menu Language
if ($Language && function_exists(PROJECT_NAMESPACE . "Config") && $Language->LanguageFolder == Config("LANGUAGE_FOLDER")) {
	$MenuRelativePath = "";
	$MenuLanguage = &$Language;
} else { // Compat reports
	$LANGUAGE_FOLDER = "../lang/";
	$MenuRelativePath = "../";
	$MenuLanguage = new Language();
}

// Navbar menu
$topMenu = new Menu("navbar", TRUE, TRUE);
$topMenu->addMenuItem(14, "mi_d301_home", $MenuLanguage->MenuPhrase("14", "MenuText"), $MenuRelativePath . "d301_homedsb.php", -1, "", AllowListMenu('{A1916BF1-858E-4493-B275-C510122AD7E3}d301_home'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(10, "mci_Setup", $MenuLanguage->MenuPhrase("10", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(1, "mi_t001_property", $MenuLanguage->MenuPhrase("1", "MenuText"), $MenuRelativePath . "t001_propertylist.php", 10, "", AllowListMenu('{A1916BF1-858E-4493-B275-C510122AD7E3}t001_property'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(2, "mi_t002_location", $MenuLanguage->MenuPhrase("2", "MenuText"), $MenuRelativePath . "t002_locationlist.php", 10, "", AllowListMenu('{A1916BF1-858E-4493-B275-C510122AD7E3}t002_location'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(3, "mi_t003_signature", $MenuLanguage->MenuPhrase("3", "MenuText"), $MenuRelativePath . "t003_signaturelist.php", 10, "", AllowListMenu('{A1916BF1-858E-4493-B275-C510122AD7E3}t003_signature'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(4, "mi_t004_asset", $MenuLanguage->MenuPhrase("4", "MenuText"), $MenuRelativePath . "t004_assetlist.php", 10, "", AllowListMenu('{A1916BF1-858E-4493-B275-C510122AD7E3}t004_asset'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(34, "mci_Proses", $MenuLanguage->MenuPhrase("34", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(48, "mi_t101_ho_head", $MenuLanguage->MenuPhrase("48", "MenuText"), $MenuRelativePath . "t101_ho_headlist.php", 34, "", AllowListMenu('{A1916BF1-858E-4493-B275-C510122AD7E3}t101_ho_head'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(5, "mi_t101_opname", $MenuLanguage->MenuPhrase("5", "MenuText"), $MenuRelativePath . "t101_opnamelist.php", 34, "", AllowListMenu('{A1916BF1-858E-4493-B275-C510122AD7E3}t101_opname'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(45, "mci_Disposal", $MenuLanguage->MenuPhrase("45", "MenuText"), "", 34, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(46, "mci_Sold", $MenuLanguage->MenuPhrase("46", "MenuText"), "", 34, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(27, "mci_Report", $MenuLanguage->MenuPhrase("27", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(13, "mi_r001_asset", $MenuLanguage->MenuPhrase("13", "MenuText"), $MenuRelativePath . "r001_assetsmry.php", 27, "", AllowListMenu('{A1916BF1-858E-4493-B275-C510122AD7E3}r001_asset'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(12, "mci_Utility", $MenuLanguage->MenuPhrase("12", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(47, "mi_t205_parameter", $MenuLanguage->MenuPhrase("47", "MenuText"), $MenuRelativePath . "t205_parameterlist.php", 12, "", AllowListMenu('{A1916BF1-858E-4493-B275-C510122AD7E3}t205_parameter'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(6, "mi_t201_users", $MenuLanguage->MenuPhrase("6", "MenuText"), $MenuRelativePath . "t201_userslist.php", 12, "", AllowListMenu('{A1916BF1-858E-4493-B275-C510122AD7E3}t201_users'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(7, "mi_t202_userlevels", $MenuLanguage->MenuPhrase("7", "MenuText"), $MenuRelativePath . "t202_userlevelslist.php", 12, "", AllowListMenu('{A1916BF1-858E-4493-B275-C510122AD7E3}t202_userlevels'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(9, "mi_t204_audittrail", $MenuLanguage->MenuPhrase("9", "MenuText"), $MenuRelativePath . "t204_audittraillist.php", 12, "", AllowListMenu('{A1916BF1-858E-4493-B275-C510122AD7E3}t204_audittrail'), FALSE, FALSE, "", "", TRUE);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", TRUE, FALSE);
$sideMenu->addMenuItem(14, "mi_d301_home", $MenuLanguage->MenuPhrase("14", "MenuText"), $MenuRelativePath . "d301_homedsb.php", -1, "", AllowListMenu('{A1916BF1-858E-4493-B275-C510122AD7E3}d301_home'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(10, "mci_Setup", $MenuLanguage->MenuPhrase("10", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(1, "mi_t001_property", $MenuLanguage->MenuPhrase("1", "MenuText"), $MenuRelativePath . "t001_propertylist.php", 10, "", AllowListMenu('{A1916BF1-858E-4493-B275-C510122AD7E3}t001_property'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(2, "mi_t002_location", $MenuLanguage->MenuPhrase("2", "MenuText"), $MenuRelativePath . "t002_locationlist.php", 10, "", AllowListMenu('{A1916BF1-858E-4493-B275-C510122AD7E3}t002_location'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(3, "mi_t003_signature", $MenuLanguage->MenuPhrase("3", "MenuText"), $MenuRelativePath . "t003_signaturelist.php", 10, "", AllowListMenu('{A1916BF1-858E-4493-B275-C510122AD7E3}t003_signature'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(4, "mi_t004_asset", $MenuLanguage->MenuPhrase("4", "MenuText"), $MenuRelativePath . "t004_assetlist.php", 10, "", AllowListMenu('{A1916BF1-858E-4493-B275-C510122AD7E3}t004_asset'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(34, "mci_Proses", $MenuLanguage->MenuPhrase("34", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(48, "mi_t101_ho_head", $MenuLanguage->MenuPhrase("48", "MenuText"), $MenuRelativePath . "t101_ho_headlist.php", 34, "", AllowListMenu('{A1916BF1-858E-4493-B275-C510122AD7E3}t101_ho_head'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(5, "mi_t101_opname", $MenuLanguage->MenuPhrase("5", "MenuText"), $MenuRelativePath . "t101_opnamelist.php", 34, "", AllowListMenu('{A1916BF1-858E-4493-B275-C510122AD7E3}t101_opname'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(45, "mci_Disposal", $MenuLanguage->MenuPhrase("45", "MenuText"), "", 34, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(46, "mci_Sold", $MenuLanguage->MenuPhrase("46", "MenuText"), "", 34, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(27, "mci_Report", $MenuLanguage->MenuPhrase("27", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(13, "mi_r001_asset", $MenuLanguage->MenuPhrase("13", "MenuText"), $MenuRelativePath . "r001_assetsmry.php", 27, "", AllowListMenu('{A1916BF1-858E-4493-B275-C510122AD7E3}r001_asset'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(12, "mci_Utility", $MenuLanguage->MenuPhrase("12", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(47, "mi_t205_parameter", $MenuLanguage->MenuPhrase("47", "MenuText"), $MenuRelativePath . "t205_parameterlist.php", 12, "", AllowListMenu('{A1916BF1-858E-4493-B275-C510122AD7E3}t205_parameter'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(6, "mi_t201_users", $MenuLanguage->MenuPhrase("6", "MenuText"), $MenuRelativePath . "t201_userslist.php", 12, "", AllowListMenu('{A1916BF1-858E-4493-B275-C510122AD7E3}t201_users'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(7, "mi_t202_userlevels", $MenuLanguage->MenuPhrase("7", "MenuText"), $MenuRelativePath . "t202_userlevelslist.php", 12, "", AllowListMenu('{A1916BF1-858E-4493-B275-C510122AD7E3}t202_userlevels'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(9, "mi_t204_audittrail", $MenuLanguage->MenuPhrase("9", "MenuText"), $MenuRelativePath . "t204_audittraillist.php", 12, "", AllowListMenu('{A1916BF1-858E-4493-B275-C510122AD7E3}t204_audittrail'), FALSE, FALSE, "", "", TRUE);
echo $sideMenu->toScript();
?>