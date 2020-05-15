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
$t205_parameter_delete = new t205_parameter_delete();

// Run the page
$t205_parameter_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t205_parameter_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft205_parameterdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft205_parameterdelete = currentForm = new ew.Form("ft205_parameterdelete", "delete");
	loadjs.done("ft205_parameterdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t205_parameter_delete->showPageHeader(); ?>
<?php
$t205_parameter_delete->showMessage();
?>
<form name="ft205_parameterdelete" id="ft205_parameterdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t205_parameter">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t205_parameter_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t205_parameter_delete->Category->Visible) { // Category ?>
		<th class="<?php echo $t205_parameter_delete->Category->headerCellClass() ?>"><span id="elh_t205_parameter_Category" class="t205_parameter_Category"><?php echo $t205_parameter_delete->Category->caption() ?></span></th>
<?php } ?>
<?php if ($t205_parameter_delete->Parameter->Visible) { // Parameter ?>
		<th class="<?php echo $t205_parameter_delete->Parameter->headerCellClass() ?>"><span id="elh_t205_parameter_Parameter" class="t205_parameter_Parameter"><?php echo $t205_parameter_delete->Parameter->caption() ?></span></th>
<?php } ?>
<?php if ($t205_parameter_delete->Nilai->Visible) { // Nilai ?>
		<th class="<?php echo $t205_parameter_delete->Nilai->headerCellClass() ?>"><span id="elh_t205_parameter_Nilai" class="t205_parameter_Nilai"><?php echo $t205_parameter_delete->Nilai->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t205_parameter_delete->RecordCount = 0;
$i = 0;
while (!$t205_parameter_delete->Recordset->EOF) {
	$t205_parameter_delete->RecordCount++;
	$t205_parameter_delete->RowCount++;

	// Set row properties
	$t205_parameter->resetAttributes();
	$t205_parameter->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t205_parameter_delete->loadRowValues($t205_parameter_delete->Recordset);

	// Render row
	$t205_parameter_delete->renderRow();
?>
	<tr <?php echo $t205_parameter->rowAttributes() ?>>
<?php if ($t205_parameter_delete->Category->Visible) { // Category ?>
		<td <?php echo $t205_parameter_delete->Category->cellAttributes() ?>>
<span id="el<?php echo $t205_parameter_delete->RowCount ?>_t205_parameter_Category" class="t205_parameter_Category">
<span<?php echo $t205_parameter_delete->Category->viewAttributes() ?>><?php echo $t205_parameter_delete->Category->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t205_parameter_delete->Parameter->Visible) { // Parameter ?>
		<td <?php echo $t205_parameter_delete->Parameter->cellAttributes() ?>>
<span id="el<?php echo $t205_parameter_delete->RowCount ?>_t205_parameter_Parameter" class="t205_parameter_Parameter">
<span<?php echo $t205_parameter_delete->Parameter->viewAttributes() ?>><?php echo $t205_parameter_delete->Parameter->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t205_parameter_delete->Nilai->Visible) { // Nilai ?>
		<td <?php echo $t205_parameter_delete->Nilai->cellAttributes() ?>>
<span id="el<?php echo $t205_parameter_delete->RowCount ?>_t205_parameter_Nilai" class="t205_parameter_Nilai">
<span<?php echo $t205_parameter_delete->Nilai->viewAttributes() ?>><?php echo $t205_parameter_delete->Nilai->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t205_parameter_delete->Recordset->moveNext();
}
$t205_parameter_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t205_parameter_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t205_parameter_delete->showPageFooter();
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
$t205_parameter_delete->terminate();
?>