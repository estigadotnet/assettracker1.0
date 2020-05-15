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
$t101_opname_delete = new t101_opname_delete();

// Run the page
$t101_opname_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_opname_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft101_opnamedelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft101_opnamedelete = currentForm = new ew.Form("ft101_opnamedelete", "delete");
	loadjs.done("ft101_opnamedelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t101_opname_delete->showPageHeader(); ?>
<?php
$t101_opname_delete->showMessage();
?>
<form name="ft101_opnamedelete" id="ft101_opnamedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_opname">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t101_opname_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t101_opname_delete->id->Visible) { // id ?>
		<th class="<?php echo $t101_opname_delete->id->headerCellClass() ?>"><span id="elh_t101_opname_id" class="t101_opname_id"><?php echo $t101_opname_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($t101_opname_delete->OpnameDate->Visible) { // OpnameDate ?>
		<th class="<?php echo $t101_opname_delete->OpnameDate->headerCellClass() ?>"><span id="elh_t101_opname_OpnameDate" class="t101_opname_OpnameDate"><?php echo $t101_opname_delete->OpnameDate->caption() ?></span></th>
<?php } ?>
<?php if ($t101_opname_delete->property_id->Visible) { // property_id ?>
		<th class="<?php echo $t101_opname_delete->property_id->headerCellClass() ?>"><span id="elh_t101_opname_property_id" class="t101_opname_property_id"><?php echo $t101_opname_delete->property_id->caption() ?></span></th>
<?php } ?>
<?php if ($t101_opname_delete->location_id->Visible) { // location_id ?>
		<th class="<?php echo $t101_opname_delete->location_id->headerCellClass() ?>"><span id="elh_t101_opname_location_id" class="t101_opname_location_id"><?php echo $t101_opname_delete->location_id->caption() ?></span></th>
<?php } ?>
<?php if ($t101_opname_delete->asset_id->Visible) { // asset_id ?>
		<th class="<?php echo $t101_opname_delete->asset_id->headerCellClass() ?>"><span id="elh_t101_opname_asset_id" class="t101_opname_asset_id"><?php echo $t101_opname_delete->asset_id->caption() ?></span></th>
<?php } ?>
<?php if ($t101_opname_delete->signature_id->Visible) { // signature_id ?>
		<th class="<?php echo $t101_opname_delete->signature_id->headerCellClass() ?>"><span id="elh_t101_opname_signature_id" class="t101_opname_signature_id"><?php echo $t101_opname_delete->signature_id->caption() ?></span></th>
<?php } ?>
<?php if ($t101_opname_delete->Actual->Visible) { // Actual ?>
		<th class="<?php echo $t101_opname_delete->Actual->headerCellClass() ?>"><span id="elh_t101_opname_Actual" class="t101_opname_Actual"><?php echo $t101_opname_delete->Actual->caption() ?></span></th>
<?php } ?>
<?php if ($t101_opname_delete->OpnameQty->Visible) { // OpnameQty ?>
		<th class="<?php echo $t101_opname_delete->OpnameQty->headerCellClass() ?>"><span id="elh_t101_opname_OpnameQty" class="t101_opname_OpnameQty"><?php echo $t101_opname_delete->OpnameQty->caption() ?></span></th>
<?php } ?>
<?php if ($t101_opname_delete->Diff->Visible) { // Diff ?>
		<th class="<?php echo $t101_opname_delete->Diff->headerCellClass() ?>"><span id="elh_t101_opname_Diff" class="t101_opname_Diff"><?php echo $t101_opname_delete->Diff->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t101_opname_delete->RecordCount = 0;
$i = 0;
while (!$t101_opname_delete->Recordset->EOF) {
	$t101_opname_delete->RecordCount++;
	$t101_opname_delete->RowCount++;

	// Set row properties
	$t101_opname->resetAttributes();
	$t101_opname->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t101_opname_delete->loadRowValues($t101_opname_delete->Recordset);

	// Render row
	$t101_opname_delete->renderRow();
?>
	<tr <?php echo $t101_opname->rowAttributes() ?>>
<?php if ($t101_opname_delete->id->Visible) { // id ?>
		<td <?php echo $t101_opname_delete->id->cellAttributes() ?>>
<span id="el<?php echo $t101_opname_delete->RowCount ?>_t101_opname_id" class="t101_opname_id">
<span<?php echo $t101_opname_delete->id->viewAttributes() ?>><?php echo $t101_opname_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_opname_delete->OpnameDate->Visible) { // OpnameDate ?>
		<td <?php echo $t101_opname_delete->OpnameDate->cellAttributes() ?>>
<span id="el<?php echo $t101_opname_delete->RowCount ?>_t101_opname_OpnameDate" class="t101_opname_OpnameDate">
<span<?php echo $t101_opname_delete->OpnameDate->viewAttributes() ?>><?php echo $t101_opname_delete->OpnameDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_opname_delete->property_id->Visible) { // property_id ?>
		<td <?php echo $t101_opname_delete->property_id->cellAttributes() ?>>
<span id="el<?php echo $t101_opname_delete->RowCount ?>_t101_opname_property_id" class="t101_opname_property_id">
<span<?php echo $t101_opname_delete->property_id->viewAttributes() ?>><?php echo $t101_opname_delete->property_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_opname_delete->location_id->Visible) { // location_id ?>
		<td <?php echo $t101_opname_delete->location_id->cellAttributes() ?>>
<span id="el<?php echo $t101_opname_delete->RowCount ?>_t101_opname_location_id" class="t101_opname_location_id">
<span<?php echo $t101_opname_delete->location_id->viewAttributes() ?>><?php echo $t101_opname_delete->location_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_opname_delete->asset_id->Visible) { // asset_id ?>
		<td <?php echo $t101_opname_delete->asset_id->cellAttributes() ?>>
<span id="el<?php echo $t101_opname_delete->RowCount ?>_t101_opname_asset_id" class="t101_opname_asset_id">
<span<?php echo $t101_opname_delete->asset_id->viewAttributes() ?>><?php echo $t101_opname_delete->asset_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_opname_delete->signature_id->Visible) { // signature_id ?>
		<td <?php echo $t101_opname_delete->signature_id->cellAttributes() ?>>
<span id="el<?php echo $t101_opname_delete->RowCount ?>_t101_opname_signature_id" class="t101_opname_signature_id">
<span<?php echo $t101_opname_delete->signature_id->viewAttributes() ?>><?php echo $t101_opname_delete->signature_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_opname_delete->Actual->Visible) { // Actual ?>
		<td <?php echo $t101_opname_delete->Actual->cellAttributes() ?>>
<span id="el<?php echo $t101_opname_delete->RowCount ?>_t101_opname_Actual" class="t101_opname_Actual">
<span<?php echo $t101_opname_delete->Actual->viewAttributes() ?>><?php echo $t101_opname_delete->Actual->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_opname_delete->OpnameQty->Visible) { // OpnameQty ?>
		<td <?php echo $t101_opname_delete->OpnameQty->cellAttributes() ?>>
<span id="el<?php echo $t101_opname_delete->RowCount ?>_t101_opname_OpnameQty" class="t101_opname_OpnameQty">
<span<?php echo $t101_opname_delete->OpnameQty->viewAttributes() ?>><?php echo $t101_opname_delete->OpnameQty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_opname_delete->Diff->Visible) { // Diff ?>
		<td <?php echo $t101_opname_delete->Diff->cellAttributes() ?>>
<span id="el<?php echo $t101_opname_delete->RowCount ?>_t101_opname_Diff" class="t101_opname_Diff">
<span<?php echo $t101_opname_delete->Diff->viewAttributes() ?>><?php echo $t101_opname_delete->Diff->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t101_opname_delete->Recordset->moveNext();
}
$t101_opname_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t101_opname_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t101_opname_delete->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$t101_opname_delete->terminate();
?>