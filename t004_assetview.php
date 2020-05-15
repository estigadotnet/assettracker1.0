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
$t004_asset_view = new t004_asset_view();

// Run the page
$t004_asset_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t004_asset_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t004_asset_view->isExport()) { ?>
<script>
var ft004_assetview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft004_assetview = currentForm = new ew.Form("ft004_assetview", "view");
	loadjs.done("ft004_assetview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t004_asset_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t004_asset_view->ExportOptions->render("body") ?>
<?php $t004_asset_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t004_asset_view->showPageHeader(); ?>
<?php
$t004_asset_view->showMessage();
?>
<form name="ft004_assetview" id="ft004_assetview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t004_asset">
<input type="hidden" name="modal" value="<?php echo (int)$t004_asset_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t004_asset_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $t004_asset_view->TableLeftColumnClass ?>"><span id="elh_t004_asset_id"><?php echo $t004_asset_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $t004_asset_view->id->cellAttributes() ?>>
<span id="el_t004_asset_id">
<span<?php echo $t004_asset_view->id->viewAttributes() ?>><?php echo $t004_asset_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t004_asset_view->property_id->Visible) { // property_id ?>
	<tr id="r_property_id">
		<td class="<?php echo $t004_asset_view->TableLeftColumnClass ?>"><span id="elh_t004_asset_property_id"><?php echo $t004_asset_view->property_id->caption() ?></span></td>
		<td data-name="property_id" <?php echo $t004_asset_view->property_id->cellAttributes() ?>>
<span id="el_t004_asset_property_id">
<span<?php echo $t004_asset_view->property_id->viewAttributes() ?>><?php echo $t004_asset_view->property_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t004_asset_view->location_id->Visible) { // location_id ?>
	<tr id="r_location_id">
		<td class="<?php echo $t004_asset_view->TableLeftColumnClass ?>"><span id="elh_t004_asset_location_id"><?php echo $t004_asset_view->location_id->caption() ?></span></td>
		<td data-name="location_id" <?php echo $t004_asset_view->location_id->cellAttributes() ?>>
<span id="el_t004_asset_location_id">
<span<?php echo $t004_asset_view->location_id->viewAttributes() ?>><?php echo $t004_asset_view->location_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t004_asset_view->signature_id->Visible) { // signature_id ?>
	<tr id="r_signature_id">
		<td class="<?php echo $t004_asset_view->TableLeftColumnClass ?>"><span id="elh_t004_asset_signature_id"><?php echo $t004_asset_view->signature_id->caption() ?></span></td>
		<td data-name="signature_id" <?php echo $t004_asset_view->signature_id->cellAttributes() ?>>
<span id="el_t004_asset_signature_id">
<span<?php echo $t004_asset_view->signature_id->viewAttributes() ?>><?php echo $t004_asset_view->signature_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t004_asset_view->Asset->Visible) { // Asset ?>
	<tr id="r_Asset">
		<td class="<?php echo $t004_asset_view->TableLeftColumnClass ?>"><span id="elh_t004_asset_Asset"><?php echo $t004_asset_view->Asset->caption() ?></span></td>
		<td data-name="Asset" <?php echo $t004_asset_view->Asset->cellAttributes() ?>>
<span id="el_t004_asset_Asset">
<span<?php echo $t004_asset_view->Asset->viewAttributes() ?>><?php echo $t004_asset_view->Asset->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t004_asset_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t004_asset_view->isExport()) { ?>
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
$t004_asset_view->terminate();
?>