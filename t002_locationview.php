<?php
namespace PHPMaker2020\p_assettracker1_0;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$t002_location_view = new t002_location_view();

// Run the page
$t002_location_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t002_location_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t002_location_view->isExport()) { ?>
<script>
var ft002_locationview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft002_locationview = currentForm = new ew.Form("ft002_locationview", "view");
	loadjs.done("ft002_locationview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t002_location_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t002_location_view->ExportOptions->render("body") ?>
<?php $t002_location_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t002_location_view->showPageHeader(); ?>
<?php
$t002_location_view->showMessage();
?>
<form name="ft002_locationview" id="ft002_locationview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t002_location">
<input type="hidden" name="modal" value="<?php echo (int)$t002_location_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t002_location_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $t002_location_view->TableLeftColumnClass ?>"><span id="elh_t002_location_id"><?php echo $t002_location_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $t002_location_view->id->cellAttributes() ?>>
<span id="el_t002_location_id">
<span<?php echo $t002_location_view->id->viewAttributes() ?>><?php echo $t002_location_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t002_location_view->Location->Visible) { // Location ?>
	<tr id="r_Location">
		<td class="<?php echo $t002_location_view->TableLeftColumnClass ?>"><span id="elh_t002_location_Location"><?php echo $t002_location_view->Location->caption() ?></span></td>
		<td data-name="Location" <?php echo $t002_location_view->Location->cellAttributes() ?>>
<span id="el_t002_location_Location">
<span<?php echo $t002_location_view->Location->viewAttributes() ?>><?php echo $t002_location_view->Location->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t002_location_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t002_location_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$t002_location_view->terminate();
?>