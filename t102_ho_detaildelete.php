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
$t102_ho_detail_delete = new t102_ho_detail_delete();

// Run the page
$t102_ho_detail_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t102_ho_detail_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft102_ho_detaildelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft102_ho_detaildelete = currentForm = new ew.Form("ft102_ho_detaildelete", "delete");
	loadjs.done("ft102_ho_detaildelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t102_ho_detail_delete->showPageHeader(); ?>
<?php
$t102_ho_detail_delete->showMessage();
?>
<form name="ft102_ho_detaildelete" id="ft102_ho_detaildelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t102_ho_detail">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t102_ho_detail_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t102_ho_detail_delete->hohead_id->Visible) { // hohead_id ?>
		<th class="<?php echo $t102_ho_detail_delete->hohead_id->headerCellClass() ?>"><span id="elh_t102_ho_detail_hohead_id" class="t102_ho_detail_hohead_id"><?php echo $t102_ho_detail_delete->hohead_id->caption() ?></span></th>
<?php } ?>
<?php if ($t102_ho_detail_delete->asset_id->Visible) { // asset_id ?>
		<th class="<?php echo $t102_ho_detail_delete->asset_id->headerCellClass() ?>"><span id="elh_t102_ho_detail_asset_id" class="t102_ho_detail_asset_id"><?php echo $t102_ho_detail_delete->asset_id->caption() ?></span></th>
<?php } ?>
<?php if ($t102_ho_detail_delete->proc_date->Visible) { // proc_date ?>
		<th class="<?php echo $t102_ho_detail_delete->proc_date->headerCellClass() ?>"><span id="elh_t102_ho_detail_proc_date" class="t102_ho_detail_proc_date"><?php echo $t102_ho_detail_delete->proc_date->caption() ?></span></th>
<?php } ?>
<?php if ($t102_ho_detail_delete->proc_ccost->Visible) { // proc_ccost ?>
		<th class="<?php echo $t102_ho_detail_delete->proc_ccost->headerCellClass() ?>"><span id="elh_t102_ho_detail_proc_ccost" class="t102_ho_detail_proc_ccost"><?php echo $t102_ho_detail_delete->proc_ccost->caption() ?></span></th>
<?php } ?>
<?php if ($t102_ho_detail_delete->dep_amount->Visible) { // dep_amount ?>
		<th class="<?php echo $t102_ho_detail_delete->dep_amount->headerCellClass() ?>"><span id="elh_t102_ho_detail_dep_amount" class="t102_ho_detail_dep_amount"><?php echo $t102_ho_detail_delete->dep_amount->caption() ?></span></th>
<?php } ?>
<?php if ($t102_ho_detail_delete->dep_ytd->Visible) { // dep_ytd ?>
		<th class="<?php echo $t102_ho_detail_delete->dep_ytd->headerCellClass() ?>"><span id="elh_t102_ho_detail_dep_ytd" class="t102_ho_detail_dep_ytd"><?php echo $t102_ho_detail_delete->dep_ytd->caption() ?></span></th>
<?php } ?>
<?php if ($t102_ho_detail_delete->nb_val->Visible) { // nb_val ?>
		<th class="<?php echo $t102_ho_detail_delete->nb_val->headerCellClass() ?>"><span id="elh_t102_ho_detail_nb_val" class="t102_ho_detail_nb_val"><?php echo $t102_ho_detail_delete->nb_val->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t102_ho_detail_delete->RecordCount = 0;
$i = 0;
while (!$t102_ho_detail_delete->Recordset->EOF) {
	$t102_ho_detail_delete->RecordCount++;
	$t102_ho_detail_delete->RowCount++;

	// Set row properties
	$t102_ho_detail->resetAttributes();
	$t102_ho_detail->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t102_ho_detail_delete->loadRowValues($t102_ho_detail_delete->Recordset);

	// Render row
	$t102_ho_detail_delete->renderRow();
?>
	<tr <?php echo $t102_ho_detail->rowAttributes() ?>>
<?php if ($t102_ho_detail_delete->hohead_id->Visible) { // hohead_id ?>
		<td <?php echo $t102_ho_detail_delete->hohead_id->cellAttributes() ?>>
<span id="el<?php echo $t102_ho_detail_delete->RowCount ?>_t102_ho_detail_hohead_id" class="t102_ho_detail_hohead_id">
<span<?php echo $t102_ho_detail_delete->hohead_id->viewAttributes() ?>><?php echo $t102_ho_detail_delete->hohead_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t102_ho_detail_delete->asset_id->Visible) { // asset_id ?>
		<td <?php echo $t102_ho_detail_delete->asset_id->cellAttributes() ?>>
<span id="el<?php echo $t102_ho_detail_delete->RowCount ?>_t102_ho_detail_asset_id" class="t102_ho_detail_asset_id">
<span<?php echo $t102_ho_detail_delete->asset_id->viewAttributes() ?>><?php echo $t102_ho_detail_delete->asset_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t102_ho_detail_delete->proc_date->Visible) { // proc_date ?>
		<td <?php echo $t102_ho_detail_delete->proc_date->cellAttributes() ?>>
<span id="el<?php echo $t102_ho_detail_delete->RowCount ?>_t102_ho_detail_proc_date" class="t102_ho_detail_proc_date">
<span<?php echo $t102_ho_detail_delete->proc_date->viewAttributes() ?>><?php echo $t102_ho_detail_delete->proc_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t102_ho_detail_delete->proc_ccost->Visible) { // proc_ccost ?>
		<td <?php echo $t102_ho_detail_delete->proc_ccost->cellAttributes() ?>>
<span id="el<?php echo $t102_ho_detail_delete->RowCount ?>_t102_ho_detail_proc_ccost" class="t102_ho_detail_proc_ccost">
<span<?php echo $t102_ho_detail_delete->proc_ccost->viewAttributes() ?>><?php echo $t102_ho_detail_delete->proc_ccost->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t102_ho_detail_delete->dep_amount->Visible) { // dep_amount ?>
		<td <?php echo $t102_ho_detail_delete->dep_amount->cellAttributes() ?>>
<span id="el<?php echo $t102_ho_detail_delete->RowCount ?>_t102_ho_detail_dep_amount" class="t102_ho_detail_dep_amount">
<span<?php echo $t102_ho_detail_delete->dep_amount->viewAttributes() ?>><?php echo $t102_ho_detail_delete->dep_amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t102_ho_detail_delete->dep_ytd->Visible) { // dep_ytd ?>
		<td <?php echo $t102_ho_detail_delete->dep_ytd->cellAttributes() ?>>
<span id="el<?php echo $t102_ho_detail_delete->RowCount ?>_t102_ho_detail_dep_ytd" class="t102_ho_detail_dep_ytd">
<span<?php echo $t102_ho_detail_delete->dep_ytd->viewAttributes() ?>><?php echo $t102_ho_detail_delete->dep_ytd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t102_ho_detail_delete->nb_val->Visible) { // nb_val ?>
		<td <?php echo $t102_ho_detail_delete->nb_val->cellAttributes() ?>>
<span id="el<?php echo $t102_ho_detail_delete->RowCount ?>_t102_ho_detail_nb_val" class="t102_ho_detail_nb_val">
<span<?php echo $t102_ho_detail_delete->nb_val->viewAttributes() ?>><?php echo $t102_ho_detail_delete->nb_val->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t102_ho_detail_delete->Recordset->moveNext();
}
$t102_ho_detail_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t102_ho_detail_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t102_ho_detail_delete->showPageFooter();
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
$t102_ho_detail_delete->terminate();
?>