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
$t003_signature_view = new t003_signature_view();

// Run the page
$t003_signature_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t003_signature_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t003_signature_view->isExport()) { ?>
<script>
var ft003_signatureview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft003_signatureview = currentForm = new ew.Form("ft003_signatureview", "view");
	loadjs.done("ft003_signatureview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t003_signature_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t003_signature_view->ExportOptions->render("body") ?>
<?php $t003_signature_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t003_signature_view->showPageHeader(); ?>
<?php
$t003_signature_view->showMessage();
?>
<form name="ft003_signatureview" id="ft003_signatureview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t003_signature">
<input type="hidden" name="modal" value="<?php echo (int)$t003_signature_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t003_signature_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $t003_signature_view->TableLeftColumnClass ?>"><span id="elh_t003_signature_id"><?php echo $t003_signature_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $t003_signature_view->id->cellAttributes() ?>>
<span id="el_t003_signature_id">
<span<?php echo $t003_signature_view->id->viewAttributes() ?>><?php echo $t003_signature_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t003_signature_view->Signature->Visible) { // Signature ?>
	<tr id="r_Signature">
		<td class="<?php echo $t003_signature_view->TableLeftColumnClass ?>"><span id="elh_t003_signature_Signature"><?php echo $t003_signature_view->Signature->caption() ?></span></td>
		<td data-name="Signature" <?php echo $t003_signature_view->Signature->cellAttributes() ?>>
<span id="el_t003_signature_Signature">
<span<?php echo $t003_signature_view->Signature->viewAttributes() ?>><?php echo $t003_signature_view->Signature->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t003_signature_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t003_signature_view->isExport()) { ?>
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
$t003_signature_view->terminate();
?>