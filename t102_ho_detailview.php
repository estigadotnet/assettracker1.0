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
$t102_ho_detail_view = new t102_ho_detail_view();

// Run the page
$t102_ho_detail_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t102_ho_detail_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t102_ho_detail_view->isExport()) { ?>
<script>
var ft102_ho_detailview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft102_ho_detailview = currentForm = new ew.Form("ft102_ho_detailview", "view");
	loadjs.done("ft102_ho_detailview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t102_ho_detail_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t102_ho_detail_view->ExportOptions->render("body") ?>
<?php $t102_ho_detail_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t102_ho_detail_view->showPageHeader(); ?>
<?php
$t102_ho_detail_view->showMessage();
?>
<form name="ft102_ho_detailview" id="ft102_ho_detailview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t102_ho_detail">
<input type="hidden" name="modal" value="<?php echo (int)$t102_ho_detail_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t102_ho_detail_view->hohead_id->Visible) { // hohead_id ?>
	<tr id="r_hohead_id">
		<td class="<?php echo $t102_ho_detail_view->TableLeftColumnClass ?>"><span id="elh_t102_ho_detail_hohead_id"><?php echo $t102_ho_detail_view->hohead_id->caption() ?></span></td>
		<td data-name="hohead_id" <?php echo $t102_ho_detail_view->hohead_id->cellAttributes() ?>>
<span id="el_t102_ho_detail_hohead_id">
<span<?php echo $t102_ho_detail_view->hohead_id->viewAttributes() ?>><?php echo $t102_ho_detail_view->hohead_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t102_ho_detail_view->asset_id->Visible) { // asset_id ?>
	<tr id="r_asset_id">
		<td class="<?php echo $t102_ho_detail_view->TableLeftColumnClass ?>"><span id="elh_t102_ho_detail_asset_id"><?php echo $t102_ho_detail_view->asset_id->caption() ?></span></td>
		<td data-name="asset_id" <?php echo $t102_ho_detail_view->asset_id->cellAttributes() ?>>
<span id="el_t102_ho_detail_asset_id">
<span<?php echo $t102_ho_detail_view->asset_id->viewAttributes() ?>><?php echo $t102_ho_detail_view->asset_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t102_ho_detail_view->proc_date->Visible) { // proc_date ?>
	<tr id="r_proc_date">
		<td class="<?php echo $t102_ho_detail_view->TableLeftColumnClass ?>"><span id="elh_t102_ho_detail_proc_date"><?php echo $t102_ho_detail_view->proc_date->caption() ?></span></td>
		<td data-name="proc_date" <?php echo $t102_ho_detail_view->proc_date->cellAttributes() ?>>
<span id="el_t102_ho_detail_proc_date">
<span<?php echo $t102_ho_detail_view->proc_date->viewAttributes() ?>><?php echo $t102_ho_detail_view->proc_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t102_ho_detail_view->proc_ccost->Visible) { // proc_ccost ?>
	<tr id="r_proc_ccost">
		<td class="<?php echo $t102_ho_detail_view->TableLeftColumnClass ?>"><span id="elh_t102_ho_detail_proc_ccost"><?php echo $t102_ho_detail_view->proc_ccost->caption() ?></span></td>
		<td data-name="proc_ccost" <?php echo $t102_ho_detail_view->proc_ccost->cellAttributes() ?>>
<span id="el_t102_ho_detail_proc_ccost">
<span<?php echo $t102_ho_detail_view->proc_ccost->viewAttributes() ?>><?php echo $t102_ho_detail_view->proc_ccost->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t102_ho_detail_view->dep_amount->Visible) { // dep_amount ?>
	<tr id="r_dep_amount">
		<td class="<?php echo $t102_ho_detail_view->TableLeftColumnClass ?>"><span id="elh_t102_ho_detail_dep_amount"><?php echo $t102_ho_detail_view->dep_amount->caption() ?></span></td>
		<td data-name="dep_amount" <?php echo $t102_ho_detail_view->dep_amount->cellAttributes() ?>>
<span id="el_t102_ho_detail_dep_amount">
<span<?php echo $t102_ho_detail_view->dep_amount->viewAttributes() ?>><?php echo $t102_ho_detail_view->dep_amount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t102_ho_detail_view->dep_ytd->Visible) { // dep_ytd ?>
	<tr id="r_dep_ytd">
		<td class="<?php echo $t102_ho_detail_view->TableLeftColumnClass ?>"><span id="elh_t102_ho_detail_dep_ytd"><?php echo $t102_ho_detail_view->dep_ytd->caption() ?></span></td>
		<td data-name="dep_ytd" <?php echo $t102_ho_detail_view->dep_ytd->cellAttributes() ?>>
<span id="el_t102_ho_detail_dep_ytd">
<span<?php echo $t102_ho_detail_view->dep_ytd->viewAttributes() ?>><?php echo $t102_ho_detail_view->dep_ytd->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t102_ho_detail_view->nb_val->Visible) { // nb_val ?>
	<tr id="r_nb_val">
		<td class="<?php echo $t102_ho_detail_view->TableLeftColumnClass ?>"><span id="elh_t102_ho_detail_nb_val"><?php echo $t102_ho_detail_view->nb_val->caption() ?></span></td>
		<td data-name="nb_val" <?php echo $t102_ho_detail_view->nb_val->cellAttributes() ?>>
<span id="el_t102_ho_detail_nb_val">
<span<?php echo $t102_ho_detail_view->nb_val->viewAttributes() ?>><?php echo $t102_ho_detail_view->nb_val->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t102_ho_detail_view->remarks->Visible) { // remarks ?>
	<tr id="r_remarks">
		<td class="<?php echo $t102_ho_detail_view->TableLeftColumnClass ?>"><span id="elh_t102_ho_detail_remarks"><?php echo $t102_ho_detail_view->remarks->caption() ?></span></td>
		<td data-name="remarks" <?php echo $t102_ho_detail_view->remarks->cellAttributes() ?>>
<span id="el_t102_ho_detail_remarks">
<span<?php echo $t102_ho_detail_view->remarks->viewAttributes() ?>><?php echo $t102_ho_detail_view->remarks->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t102_ho_detail_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t102_ho_detail_view->isExport()) { ?>
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
$t102_ho_detail_view->terminate();
?>