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
$t101_ho_head_delete = new t101_ho_head_delete();

// Run the page
$t101_ho_head_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_ho_head_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft101_ho_headdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft101_ho_headdelete = currentForm = new ew.Form("ft101_ho_headdelete", "delete");
	loadjs.done("ft101_ho_headdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t101_ho_head_delete->showPageHeader(); ?>
<?php
$t101_ho_head_delete->showMessage();
?>
<form name="ft101_ho_headdelete" id="ft101_ho_headdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_ho_head">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t101_ho_head_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t101_ho_head_delete->tr_no->Visible) { // tr_no ?>
		<th class="<?php echo $t101_ho_head_delete->tr_no->headerCellClass() ?>"><span id="elh_t101_ho_head_tr_no" class="t101_ho_head_tr_no"><?php echo $t101_ho_head_delete->tr_no->caption() ?></span></th>
<?php } ?>
<?php if ($t101_ho_head_delete->tr_date->Visible) { // tr_date ?>
		<th class="<?php echo $t101_ho_head_delete->tr_date->headerCellClass() ?>"><span id="elh_t101_ho_head_tr_date" class="t101_ho_head_tr_date"><?php echo $t101_ho_head_delete->tr_date->caption() ?></span></th>
<?php } ?>
<?php if ($t101_ho_head_delete->ho_to->Visible) { // ho_to ?>
		<th class="<?php echo $t101_ho_head_delete->ho_to->headerCellClass() ?>"><span id="elh_t101_ho_head_ho_to" class="t101_ho_head_ho_to"><?php echo $t101_ho_head_delete->ho_to->caption() ?></span></th>
<?php } ?>
<?php if ($t101_ho_head_delete->cno_to->Visible) { // cno_to ?>
		<th class="<?php echo $t101_ho_head_delete->cno_to->headerCellClass() ?>"><span id="elh_t101_ho_head_cno_to" class="t101_ho_head_cno_to"><?php echo $t101_ho_head_delete->cno_to->caption() ?></span></th>
<?php } ?>
<?php if ($t101_ho_head_delete->dept_to->Visible) { // dept_to ?>
		<th class="<?php echo $t101_ho_head_delete->dept_to->headerCellClass() ?>"><span id="elh_t101_ho_head_dept_to" class="t101_ho_head_dept_to"><?php echo $t101_ho_head_delete->dept_to->caption() ?></span></th>
<?php } ?>
<?php if ($t101_ho_head_delete->ho_by->Visible) { // ho_by ?>
		<th class="<?php echo $t101_ho_head_delete->ho_by->headerCellClass() ?>"><span id="elh_t101_ho_head_ho_by" class="t101_ho_head_ho_by"><?php echo $t101_ho_head_delete->ho_by->caption() ?></span></th>
<?php } ?>
<?php if ($t101_ho_head_delete->cno_by->Visible) { // cno_by ?>
		<th class="<?php echo $t101_ho_head_delete->cno_by->headerCellClass() ?>"><span id="elh_t101_ho_head_cno_by" class="t101_ho_head_cno_by"><?php echo $t101_ho_head_delete->cno_by->caption() ?></span></th>
<?php } ?>
<?php if ($t101_ho_head_delete->dept_by->Visible) { // dept_by ?>
		<th class="<?php echo $t101_ho_head_delete->dept_by->headerCellClass() ?>"><span id="elh_t101_ho_head_dept_by" class="t101_ho_head_dept_by"><?php echo $t101_ho_head_delete->dept_by->caption() ?></span></th>
<?php } ?>
<?php if ($t101_ho_head_delete->sign1->Visible) { // sign1 ?>
		<th class="<?php echo $t101_ho_head_delete->sign1->headerCellClass() ?>"><span id="elh_t101_ho_head_sign1" class="t101_ho_head_sign1"><?php echo $t101_ho_head_delete->sign1->caption() ?></span></th>
<?php } ?>
<?php if ($t101_ho_head_delete->sign2->Visible) { // sign2 ?>
		<th class="<?php echo $t101_ho_head_delete->sign2->headerCellClass() ?>"><span id="elh_t101_ho_head_sign2" class="t101_ho_head_sign2"><?php echo $t101_ho_head_delete->sign2->caption() ?></span></th>
<?php } ?>
<?php if ($t101_ho_head_delete->sign3->Visible) { // sign3 ?>
		<th class="<?php echo $t101_ho_head_delete->sign3->headerCellClass() ?>"><span id="elh_t101_ho_head_sign3" class="t101_ho_head_sign3"><?php echo $t101_ho_head_delete->sign3->caption() ?></span></th>
<?php } ?>
<?php if ($t101_ho_head_delete->sign4->Visible) { // sign4 ?>
		<th class="<?php echo $t101_ho_head_delete->sign4->headerCellClass() ?>"><span id="elh_t101_ho_head_sign4" class="t101_ho_head_sign4"><?php echo $t101_ho_head_delete->sign4->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t101_ho_head_delete->RecordCount = 0;
$i = 0;
while (!$t101_ho_head_delete->Recordset->EOF) {
	$t101_ho_head_delete->RecordCount++;
	$t101_ho_head_delete->RowCount++;

	// Set row properties
	$t101_ho_head->resetAttributes();
	$t101_ho_head->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t101_ho_head_delete->loadRowValues($t101_ho_head_delete->Recordset);

	// Render row
	$t101_ho_head_delete->renderRow();
?>
	<tr <?php echo $t101_ho_head->rowAttributes() ?>>
<?php if ($t101_ho_head_delete->tr_no->Visible) { // tr_no ?>
		<td <?php echo $t101_ho_head_delete->tr_no->cellAttributes() ?>>
<span id="el<?php echo $t101_ho_head_delete->RowCount ?>_t101_ho_head_tr_no" class="t101_ho_head_tr_no">
<span<?php echo $t101_ho_head_delete->tr_no->viewAttributes() ?>><?php echo $t101_ho_head_delete->tr_no->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_ho_head_delete->tr_date->Visible) { // tr_date ?>
		<td <?php echo $t101_ho_head_delete->tr_date->cellAttributes() ?>>
<span id="el<?php echo $t101_ho_head_delete->RowCount ?>_t101_ho_head_tr_date" class="t101_ho_head_tr_date">
<span<?php echo $t101_ho_head_delete->tr_date->viewAttributes() ?>><?php echo $t101_ho_head_delete->tr_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_ho_head_delete->ho_to->Visible) { // ho_to ?>
		<td <?php echo $t101_ho_head_delete->ho_to->cellAttributes() ?>>
<span id="el<?php echo $t101_ho_head_delete->RowCount ?>_t101_ho_head_ho_to" class="t101_ho_head_ho_to">
<span<?php echo $t101_ho_head_delete->ho_to->viewAttributes() ?>><?php echo $t101_ho_head_delete->ho_to->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_ho_head_delete->cno_to->Visible) { // cno_to ?>
		<td <?php echo $t101_ho_head_delete->cno_to->cellAttributes() ?>>
<span id="el<?php echo $t101_ho_head_delete->RowCount ?>_t101_ho_head_cno_to" class="t101_ho_head_cno_to">
<span<?php echo $t101_ho_head_delete->cno_to->viewAttributes() ?>><?php echo $t101_ho_head_delete->cno_to->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_ho_head_delete->dept_to->Visible) { // dept_to ?>
		<td <?php echo $t101_ho_head_delete->dept_to->cellAttributes() ?>>
<span id="el<?php echo $t101_ho_head_delete->RowCount ?>_t101_ho_head_dept_to" class="t101_ho_head_dept_to">
<span<?php echo $t101_ho_head_delete->dept_to->viewAttributes() ?>><?php echo $t101_ho_head_delete->dept_to->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_ho_head_delete->ho_by->Visible) { // ho_by ?>
		<td <?php echo $t101_ho_head_delete->ho_by->cellAttributes() ?>>
<span id="el<?php echo $t101_ho_head_delete->RowCount ?>_t101_ho_head_ho_by" class="t101_ho_head_ho_by">
<span<?php echo $t101_ho_head_delete->ho_by->viewAttributes() ?>><?php echo $t101_ho_head_delete->ho_by->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_ho_head_delete->cno_by->Visible) { // cno_by ?>
		<td <?php echo $t101_ho_head_delete->cno_by->cellAttributes() ?>>
<span id="el<?php echo $t101_ho_head_delete->RowCount ?>_t101_ho_head_cno_by" class="t101_ho_head_cno_by">
<span<?php echo $t101_ho_head_delete->cno_by->viewAttributes() ?>><?php echo $t101_ho_head_delete->cno_by->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_ho_head_delete->dept_by->Visible) { // dept_by ?>
		<td <?php echo $t101_ho_head_delete->dept_by->cellAttributes() ?>>
<span id="el<?php echo $t101_ho_head_delete->RowCount ?>_t101_ho_head_dept_by" class="t101_ho_head_dept_by">
<span<?php echo $t101_ho_head_delete->dept_by->viewAttributes() ?>><?php echo $t101_ho_head_delete->dept_by->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_ho_head_delete->sign1->Visible) { // sign1 ?>
		<td <?php echo $t101_ho_head_delete->sign1->cellAttributes() ?>>
<span id="el<?php echo $t101_ho_head_delete->RowCount ?>_t101_ho_head_sign1" class="t101_ho_head_sign1">
<span<?php echo $t101_ho_head_delete->sign1->viewAttributes() ?>><?php echo $t101_ho_head_delete->sign1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_ho_head_delete->sign2->Visible) { // sign2 ?>
		<td <?php echo $t101_ho_head_delete->sign2->cellAttributes() ?>>
<span id="el<?php echo $t101_ho_head_delete->RowCount ?>_t101_ho_head_sign2" class="t101_ho_head_sign2">
<span<?php echo $t101_ho_head_delete->sign2->viewAttributes() ?>><?php echo $t101_ho_head_delete->sign2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_ho_head_delete->sign3->Visible) { // sign3 ?>
		<td <?php echo $t101_ho_head_delete->sign3->cellAttributes() ?>>
<span id="el<?php echo $t101_ho_head_delete->RowCount ?>_t101_ho_head_sign3" class="t101_ho_head_sign3">
<span<?php echo $t101_ho_head_delete->sign3->viewAttributes() ?>><?php echo $t101_ho_head_delete->sign3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_ho_head_delete->sign4->Visible) { // sign4 ?>
		<td <?php echo $t101_ho_head_delete->sign4->cellAttributes() ?>>
<span id="el<?php echo $t101_ho_head_delete->RowCount ?>_t101_ho_head_sign4" class="t101_ho_head_sign4">
<span<?php echo $t101_ho_head_delete->sign4->viewAttributes() ?>><?php echo $t101_ho_head_delete->sign4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t101_ho_head_delete->Recordset->moveNext();
}
$t101_ho_head_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t101_ho_head_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t101_ho_head_delete->showPageFooter();
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
$t101_ho_head_delete->terminate();
?>