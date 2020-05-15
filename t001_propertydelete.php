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
$t001_property_delete = new t001_property_delete();

// Run the page
$t001_property_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t001_property_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft001_propertydelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft001_propertydelete = currentForm = new ew.Form("ft001_propertydelete", "delete");
	loadjs.done("ft001_propertydelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t001_property_delete->showPageHeader(); ?>
<?php
$t001_property_delete->showMessage();
?>
<form name="ft001_propertydelete" id="ft001_propertydelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t001_property">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t001_property_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t001_property_delete->Property->Visible) { // Property ?>
		<th class="<?php echo $t001_property_delete->Property->headerCellClass() ?>"><span id="elh_t001_property_Property" class="t001_property_Property"><?php echo $t001_property_delete->Property->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t001_property_delete->RecordCount = 0;
$i = 0;
while (!$t001_property_delete->Recordset->EOF) {
	$t001_property_delete->RecordCount++;
	$t001_property_delete->RowCount++;

	// Set row properties
	$t001_property->resetAttributes();
	$t001_property->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t001_property_delete->loadRowValues($t001_property_delete->Recordset);

	// Render row
	$t001_property_delete->renderRow();
?>
	<tr <?php echo $t001_property->rowAttributes() ?>>
<?php if ($t001_property_delete->Property->Visible) { // Property ?>
		<td <?php echo $t001_property_delete->Property->cellAttributes() ?>>
<span id="el<?php echo $t001_property_delete->RowCount ?>_t001_property_Property" class="t001_property_Property">
<span<?php echo $t001_property_delete->Property->viewAttributes() ?>><?php echo $t001_property_delete->Property->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t001_property_delete->Recordset->moveNext();
}
$t001_property_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t001_property_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t001_property_delete->showPageFooter();
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
$t001_property_delete->terminate();
?>