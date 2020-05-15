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
$t004_asset_delete = new t004_asset_delete();

// Run the page
$t004_asset_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t004_asset_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft004_assetdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft004_assetdelete = currentForm = new ew.Form("ft004_assetdelete", "delete");
	loadjs.done("ft004_assetdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t004_asset_delete->showPageHeader(); ?>
<?php
$t004_asset_delete->showMessage();
?>
<form name="ft004_assetdelete" id="ft004_assetdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t004_asset">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t004_asset_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t004_asset_delete->property_id->Visible) { // property_id ?>
		<th class="<?php echo $t004_asset_delete->property_id->headerCellClass() ?>"><span id="elh_t004_asset_property_id" class="t004_asset_property_id"><?php echo $t004_asset_delete->property_id->caption() ?></span></th>
<?php } ?>
<?php if ($t004_asset_delete->location_id->Visible) { // location_id ?>
		<th class="<?php echo $t004_asset_delete->location_id->headerCellClass() ?>"><span id="elh_t004_asset_location_id" class="t004_asset_location_id"><?php echo $t004_asset_delete->location_id->caption() ?></span></th>
<?php } ?>
<?php if ($t004_asset_delete->signature_id->Visible) { // signature_id ?>
		<th class="<?php echo $t004_asset_delete->signature_id->headerCellClass() ?>"><span id="elh_t004_asset_signature_id" class="t004_asset_signature_id"><?php echo $t004_asset_delete->signature_id->caption() ?></span></th>
<?php } ?>
<?php if ($t004_asset_delete->Asset->Visible) { // Asset ?>
		<th class="<?php echo $t004_asset_delete->Asset->headerCellClass() ?>"><span id="elh_t004_asset_Asset" class="t004_asset_Asset"><?php echo $t004_asset_delete->Asset->caption() ?></span></th>
<?php } ?>
<?php if ($t004_asset_delete->Periode->Visible) { // Periode ?>
		<th class="<?php echo $t004_asset_delete->Periode->headerCellClass() ?>"><span id="elh_t004_asset_Periode" class="t004_asset_Periode"><?php echo $t004_asset_delete->Periode->caption() ?></span></th>
<?php } ?>
<?php if ($t004_asset_delete->Qty->Visible) { // Qty ?>
		<th class="<?php echo $t004_asset_delete->Qty->headerCellClass() ?>"><span id="elh_t004_asset_Qty" class="t004_asset_Qty"><?php echo $t004_asset_delete->Qty->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t004_asset_delete->RecordCount = 0;
$i = 0;
while (!$t004_asset_delete->Recordset->EOF) {
	$t004_asset_delete->RecordCount++;
	$t004_asset_delete->RowCount++;

	// Set row properties
	$t004_asset->resetAttributes();
	$t004_asset->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t004_asset_delete->loadRowValues($t004_asset_delete->Recordset);

	// Render row
	$t004_asset_delete->renderRow();
?>
	<tr <?php echo $t004_asset->rowAttributes() ?>>
<?php if ($t004_asset_delete->property_id->Visible) { // property_id ?>
		<td <?php echo $t004_asset_delete->property_id->cellAttributes() ?>>
<span id="el<?php echo $t004_asset_delete->RowCount ?>_t004_asset_property_id" class="t004_asset_property_id">
<span<?php echo $t004_asset_delete->property_id->viewAttributes() ?>><?php echo $t004_asset_delete->property_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t004_asset_delete->location_id->Visible) { // location_id ?>
		<td <?php echo $t004_asset_delete->location_id->cellAttributes() ?>>
<span id="el<?php echo $t004_asset_delete->RowCount ?>_t004_asset_location_id" class="t004_asset_location_id">
<span<?php echo $t004_asset_delete->location_id->viewAttributes() ?>><?php echo $t004_asset_delete->location_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t004_asset_delete->signature_id->Visible) { // signature_id ?>
		<td <?php echo $t004_asset_delete->signature_id->cellAttributes() ?>>
<span id="el<?php echo $t004_asset_delete->RowCount ?>_t004_asset_signature_id" class="t004_asset_signature_id">
<span<?php echo $t004_asset_delete->signature_id->viewAttributes() ?>><?php echo $t004_asset_delete->signature_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t004_asset_delete->Asset->Visible) { // Asset ?>
		<td <?php echo $t004_asset_delete->Asset->cellAttributes() ?>>
<span id="el<?php echo $t004_asset_delete->RowCount ?>_t004_asset_Asset" class="t004_asset_Asset">
<span<?php echo $t004_asset_delete->Asset->viewAttributes() ?>><?php echo $t004_asset_delete->Asset->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t004_asset_delete->Periode->Visible) { // Periode ?>
		<td <?php echo $t004_asset_delete->Periode->cellAttributes() ?>>
<span id="el<?php echo $t004_asset_delete->RowCount ?>_t004_asset_Periode" class="t004_asset_Periode">
<span<?php echo $t004_asset_delete->Periode->viewAttributes() ?>><?php echo $t004_asset_delete->Periode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t004_asset_delete->Qty->Visible) { // Qty ?>
		<td <?php echo $t004_asset_delete->Qty->cellAttributes() ?>>
<span id="el<?php echo $t004_asset_delete->RowCount ?>_t004_asset_Qty" class="t004_asset_Qty">
<span<?php echo $t004_asset_delete->Qty->viewAttributes() ?>><?php echo $t004_asset_delete->Qty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t004_asset_delete->Recordset->moveNext();
}
$t004_asset_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t004_asset_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t004_asset_delete->showPageFooter();
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
$t004_asset_delete->terminate();
?>