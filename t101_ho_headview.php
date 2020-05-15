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
$t101_ho_head_view = new t101_ho_head_view();

// Run the page
$t101_ho_head_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_ho_head_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t101_ho_head_view->isExport()) { ?>
<script>
var ft101_ho_headview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft101_ho_headview = currentForm = new ew.Form("ft101_ho_headview", "view");
	loadjs.done("ft101_ho_headview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t101_ho_head_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t101_ho_head_view->ExportOptions->render("body") ?>
<?php $t101_ho_head_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t101_ho_head_view->showPageHeader(); ?>
<?php
$t101_ho_head_view->showMessage();
?>
<form name="ft101_ho_headview" id="ft101_ho_headview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_ho_head">
<input type="hidden" name="modal" value="<?php echo (int)$t101_ho_head_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t101_ho_head_view->tr_no->Visible) { // tr_no ?>
	<tr id="r_tr_no">
		<td class="<?php echo $t101_ho_head_view->TableLeftColumnClass ?>"><span id="elh_t101_ho_head_tr_no"><?php echo $t101_ho_head_view->tr_no->caption() ?></span></td>
		<td data-name="tr_no" <?php echo $t101_ho_head_view->tr_no->cellAttributes() ?>>
<span id="el_t101_ho_head_tr_no">
<span<?php echo $t101_ho_head_view->tr_no->viewAttributes() ?>><?php echo $t101_ho_head_view->tr_no->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_ho_head_view->tr_date->Visible) { // tr_date ?>
	<tr id="r_tr_date">
		<td class="<?php echo $t101_ho_head_view->TableLeftColumnClass ?>"><span id="elh_t101_ho_head_tr_date"><?php echo $t101_ho_head_view->tr_date->caption() ?></span></td>
		<td data-name="tr_date" <?php echo $t101_ho_head_view->tr_date->cellAttributes() ?>>
<span id="el_t101_ho_head_tr_date">
<span<?php echo $t101_ho_head_view->tr_date->viewAttributes() ?>><?php echo $t101_ho_head_view->tr_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_ho_head_view->ho_to->Visible) { // ho_to ?>
	<tr id="r_ho_to">
		<td class="<?php echo $t101_ho_head_view->TableLeftColumnClass ?>"><span id="elh_t101_ho_head_ho_to"><?php echo $t101_ho_head_view->ho_to->caption() ?></span></td>
		<td data-name="ho_to" <?php echo $t101_ho_head_view->ho_to->cellAttributes() ?>>
<span id="el_t101_ho_head_ho_to">
<span<?php echo $t101_ho_head_view->ho_to->viewAttributes() ?>><?php echo $t101_ho_head_view->ho_to->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_ho_head_view->cno_to->Visible) { // cno_to ?>
	<tr id="r_cno_to">
		<td class="<?php echo $t101_ho_head_view->TableLeftColumnClass ?>"><span id="elh_t101_ho_head_cno_to"><?php echo $t101_ho_head_view->cno_to->caption() ?></span></td>
		<td data-name="cno_to" <?php echo $t101_ho_head_view->cno_to->cellAttributes() ?>>
<span id="el_t101_ho_head_cno_to">
<span<?php echo $t101_ho_head_view->cno_to->viewAttributes() ?>><?php echo $t101_ho_head_view->cno_to->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_ho_head_view->dept_to->Visible) { // dept_to ?>
	<tr id="r_dept_to">
		<td class="<?php echo $t101_ho_head_view->TableLeftColumnClass ?>"><span id="elh_t101_ho_head_dept_to"><?php echo $t101_ho_head_view->dept_to->caption() ?></span></td>
		<td data-name="dept_to" <?php echo $t101_ho_head_view->dept_to->cellAttributes() ?>>
<span id="el_t101_ho_head_dept_to">
<span<?php echo $t101_ho_head_view->dept_to->viewAttributes() ?>><?php echo $t101_ho_head_view->dept_to->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_ho_head_view->ho_by->Visible) { // ho_by ?>
	<tr id="r_ho_by">
		<td class="<?php echo $t101_ho_head_view->TableLeftColumnClass ?>"><span id="elh_t101_ho_head_ho_by"><?php echo $t101_ho_head_view->ho_by->caption() ?></span></td>
		<td data-name="ho_by" <?php echo $t101_ho_head_view->ho_by->cellAttributes() ?>>
<span id="el_t101_ho_head_ho_by">
<span<?php echo $t101_ho_head_view->ho_by->viewAttributes() ?>><?php echo $t101_ho_head_view->ho_by->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_ho_head_view->cno_by->Visible) { // cno_by ?>
	<tr id="r_cno_by">
		<td class="<?php echo $t101_ho_head_view->TableLeftColumnClass ?>"><span id="elh_t101_ho_head_cno_by"><?php echo $t101_ho_head_view->cno_by->caption() ?></span></td>
		<td data-name="cno_by" <?php echo $t101_ho_head_view->cno_by->cellAttributes() ?>>
<span id="el_t101_ho_head_cno_by">
<span<?php echo $t101_ho_head_view->cno_by->viewAttributes() ?>><?php echo $t101_ho_head_view->cno_by->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_ho_head_view->dept_by->Visible) { // dept_by ?>
	<tr id="r_dept_by">
		<td class="<?php echo $t101_ho_head_view->TableLeftColumnClass ?>"><span id="elh_t101_ho_head_dept_by"><?php echo $t101_ho_head_view->dept_by->caption() ?></span></td>
		<td data-name="dept_by" <?php echo $t101_ho_head_view->dept_by->cellAttributes() ?>>
<span id="el_t101_ho_head_dept_by">
<span<?php echo $t101_ho_head_view->dept_by->viewAttributes() ?>><?php echo $t101_ho_head_view->dept_by->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_ho_head_view->sign1->Visible) { // sign1 ?>
	<tr id="r_sign1">
		<td class="<?php echo $t101_ho_head_view->TableLeftColumnClass ?>"><span id="elh_t101_ho_head_sign1"><?php echo $t101_ho_head_view->sign1->caption() ?></span></td>
		<td data-name="sign1" <?php echo $t101_ho_head_view->sign1->cellAttributes() ?>>
<span id="el_t101_ho_head_sign1">
<span<?php echo $t101_ho_head_view->sign1->viewAttributes() ?>><?php echo $t101_ho_head_view->sign1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_ho_head_view->sign2->Visible) { // sign2 ?>
	<tr id="r_sign2">
		<td class="<?php echo $t101_ho_head_view->TableLeftColumnClass ?>"><span id="elh_t101_ho_head_sign2"><?php echo $t101_ho_head_view->sign2->caption() ?></span></td>
		<td data-name="sign2" <?php echo $t101_ho_head_view->sign2->cellAttributes() ?>>
<span id="el_t101_ho_head_sign2">
<span<?php echo $t101_ho_head_view->sign2->viewAttributes() ?>><?php echo $t101_ho_head_view->sign2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_ho_head_view->sign3->Visible) { // sign3 ?>
	<tr id="r_sign3">
		<td class="<?php echo $t101_ho_head_view->TableLeftColumnClass ?>"><span id="elh_t101_ho_head_sign3"><?php echo $t101_ho_head_view->sign3->caption() ?></span></td>
		<td data-name="sign3" <?php echo $t101_ho_head_view->sign3->cellAttributes() ?>>
<span id="el_t101_ho_head_sign3">
<span<?php echo $t101_ho_head_view->sign3->viewAttributes() ?>><?php echo $t101_ho_head_view->sign3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_ho_head_view->sign4->Visible) { // sign4 ?>
	<tr id="r_sign4">
		<td class="<?php echo $t101_ho_head_view->TableLeftColumnClass ?>"><span id="elh_t101_ho_head_sign4"><?php echo $t101_ho_head_view->sign4->caption() ?></span></td>
		<td data-name="sign4" <?php echo $t101_ho_head_view->sign4->cellAttributes() ?>>
<span id="el_t101_ho_head_sign4">
<span<?php echo $t101_ho_head_view->sign4->viewAttributes() ?>><?php echo $t101_ho_head_view->sign4->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php
	if (in_array("t102_ho_detail", explode(",", $t101_ho_head->getCurrentDetailTable())) && $t102_ho_detail->DetailView) {
?>
<?php if ($t101_ho_head->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("t102_ho_detail", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "t102_ho_detailgrid.php" ?>
<?php } ?>
</form>
<?php
$t101_ho_head_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t101_ho_head_view->isExport()) { ?>
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
$t101_ho_head_view->terminate();
?>