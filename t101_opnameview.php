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
$t101_opname_view = new t101_opname_view();

// Run the page
$t101_opname_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_opname_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t101_opname_view->isExport()) { ?>
<script>
var ft101_opnameview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft101_opnameview = currentForm = new ew.Form("ft101_opnameview", "view");
	loadjs.done("ft101_opnameview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t101_opname_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t101_opname_view->ExportOptions->render("body") ?>
<?php $t101_opname_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t101_opname_view->showPageHeader(); ?>
<?php
$t101_opname_view->showMessage();
?>
<form name="ft101_opnameview" id="ft101_opnameview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_opname">
<input type="hidden" name="modal" value="<?php echo (int)$t101_opname_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t101_opname_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $t101_opname_view->TableLeftColumnClass ?>"><span id="elh_t101_opname_id"><?php echo $t101_opname_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $t101_opname_view->id->cellAttributes() ?>>
<span id="el_t101_opname_id">
<span<?php echo $t101_opname_view->id->viewAttributes() ?>><?php echo $t101_opname_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_opname_view->OpnameDate->Visible) { // OpnameDate ?>
	<tr id="r_OpnameDate">
		<td class="<?php echo $t101_opname_view->TableLeftColumnClass ?>"><span id="elh_t101_opname_OpnameDate"><?php echo $t101_opname_view->OpnameDate->caption() ?></span></td>
		<td data-name="OpnameDate" <?php echo $t101_opname_view->OpnameDate->cellAttributes() ?>>
<span id="el_t101_opname_OpnameDate">
<span<?php echo $t101_opname_view->OpnameDate->viewAttributes() ?>><?php echo $t101_opname_view->OpnameDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_opname_view->property_id->Visible) { // property_id ?>
	<tr id="r_property_id">
		<td class="<?php echo $t101_opname_view->TableLeftColumnClass ?>"><span id="elh_t101_opname_property_id"><?php echo $t101_opname_view->property_id->caption() ?></span></td>
		<td data-name="property_id" <?php echo $t101_opname_view->property_id->cellAttributes() ?>>
<span id="el_t101_opname_property_id">
<span<?php echo $t101_opname_view->property_id->viewAttributes() ?>><?php echo $t101_opname_view->property_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_opname_view->location_id->Visible) { // location_id ?>
	<tr id="r_location_id">
		<td class="<?php echo $t101_opname_view->TableLeftColumnClass ?>"><span id="elh_t101_opname_location_id"><?php echo $t101_opname_view->location_id->caption() ?></span></td>
		<td data-name="location_id" <?php echo $t101_opname_view->location_id->cellAttributes() ?>>
<span id="el_t101_opname_location_id">
<span<?php echo $t101_opname_view->location_id->viewAttributes() ?>><?php echo $t101_opname_view->location_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_opname_view->asset_id->Visible) { // asset_id ?>
	<tr id="r_asset_id">
		<td class="<?php echo $t101_opname_view->TableLeftColumnClass ?>"><span id="elh_t101_opname_asset_id"><?php echo $t101_opname_view->asset_id->caption() ?></span></td>
		<td data-name="asset_id" <?php echo $t101_opname_view->asset_id->cellAttributes() ?>>
<span id="el_t101_opname_asset_id">
<span<?php echo $t101_opname_view->asset_id->viewAttributes() ?>><?php echo $t101_opname_view->asset_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_opname_view->signature_id->Visible) { // signature_id ?>
	<tr id="r_signature_id">
		<td class="<?php echo $t101_opname_view->TableLeftColumnClass ?>"><span id="elh_t101_opname_signature_id"><?php echo $t101_opname_view->signature_id->caption() ?></span></td>
		<td data-name="signature_id" <?php echo $t101_opname_view->signature_id->cellAttributes() ?>>
<span id="el_t101_opname_signature_id">
<span<?php echo $t101_opname_view->signature_id->viewAttributes() ?>><?php echo $t101_opname_view->signature_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_opname_view->Actual->Visible) { // Actual ?>
	<tr id="r_Actual">
		<td class="<?php echo $t101_opname_view->TableLeftColumnClass ?>"><span id="elh_t101_opname_Actual"><?php echo $t101_opname_view->Actual->caption() ?></span></td>
		<td data-name="Actual" <?php echo $t101_opname_view->Actual->cellAttributes() ?>>
<span id="el_t101_opname_Actual">
<span<?php echo $t101_opname_view->Actual->viewAttributes() ?>><?php echo $t101_opname_view->Actual->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_opname_view->OpnameQty->Visible) { // OpnameQty ?>
	<tr id="r_OpnameQty">
		<td class="<?php echo $t101_opname_view->TableLeftColumnClass ?>"><span id="elh_t101_opname_OpnameQty"><?php echo $t101_opname_view->OpnameQty->caption() ?></span></td>
		<td data-name="OpnameQty" <?php echo $t101_opname_view->OpnameQty->cellAttributes() ?>>
<span id="el_t101_opname_OpnameQty">
<span<?php echo $t101_opname_view->OpnameQty->viewAttributes() ?>><?php echo $t101_opname_view->OpnameQty->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_opname_view->Diff->Visible) { // Diff ?>
	<tr id="r_Diff">
		<td class="<?php echo $t101_opname_view->TableLeftColumnClass ?>"><span id="elh_t101_opname_Diff"><?php echo $t101_opname_view->Diff->caption() ?></span></td>
		<td data-name="Diff" <?php echo $t101_opname_view->Diff->cellAttributes() ?>>
<span id="el_t101_opname_Diff">
<span<?php echo $t101_opname_view->Diff->viewAttributes() ?>><?php echo $t101_opname_view->Diff->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_opname_view->Remarks->Visible) { // Remarks ?>
	<tr id="r_Remarks">
		<td class="<?php echo $t101_opname_view->TableLeftColumnClass ?>"><span id="elh_t101_opname_Remarks"><?php echo $t101_opname_view->Remarks->caption() ?></span></td>
		<td data-name="Remarks" <?php echo $t101_opname_view->Remarks->cellAttributes() ?>>
<span id="el_t101_opname_Remarks">
<span<?php echo $t101_opname_view->Remarks->viewAttributes() ?>><?php echo $t101_opname_view->Remarks->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t101_opname_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t101_opname_view->isExport()) { ?>
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
$t101_opname_view->terminate();
?>