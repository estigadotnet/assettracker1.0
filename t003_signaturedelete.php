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
$t003_signature_delete = new t003_signature_delete();

// Run the page
$t003_signature_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t003_signature_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft003_signaturedelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft003_signaturedelete = currentForm = new ew.Form("ft003_signaturedelete", "delete");
	loadjs.done("ft003_signaturedelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t003_signature_delete->showPageHeader(); ?>
<?php
$t003_signature_delete->showMessage();
?>
<form name="ft003_signaturedelete" id="ft003_signaturedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t003_signature">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t003_signature_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t003_signature_delete->Signature->Visible) { // Signature ?>
		<th class="<?php echo $t003_signature_delete->Signature->headerCellClass() ?>"><span id="elh_t003_signature_Signature" class="t003_signature_Signature"><?php echo $t003_signature_delete->Signature->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t003_signature_delete->RecordCount = 0;
$i = 0;
while (!$t003_signature_delete->Recordset->EOF) {
	$t003_signature_delete->RecordCount++;
	$t003_signature_delete->RowCount++;

	// Set row properties
	$t003_signature->resetAttributes();
	$t003_signature->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t003_signature_delete->loadRowValues($t003_signature_delete->Recordset);

	// Render row
	$t003_signature_delete->renderRow();
?>
	<tr <?php echo $t003_signature->rowAttributes() ?>>
<?php if ($t003_signature_delete->Signature->Visible) { // Signature ?>
		<td <?php echo $t003_signature_delete->Signature->cellAttributes() ?>>
<span id="el<?php echo $t003_signature_delete->RowCount ?>_t003_signature_Signature" class="t003_signature_Signature">
<span<?php echo $t003_signature_delete->Signature->viewAttributes() ?>><?php echo $t003_signature_delete->Signature->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t003_signature_delete->Recordset->moveNext();
}
$t003_signature_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t003_signature_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t003_signature_delete->showPageFooter();
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
$t003_signature_delete->terminate();
?>