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
$t001_property_view = new t001_property_view();

// Run the page
$t001_property_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t001_property_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t001_property_view->isExport()) { ?>
<script>
var ft001_propertyview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft001_propertyview = currentForm = new ew.Form("ft001_propertyview", "view");
	loadjs.done("ft001_propertyview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t001_property_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t001_property_view->ExportOptions->render("body") ?>
<?php $t001_property_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t001_property_view->showPageHeader(); ?>
<?php
$t001_property_view->showMessage();
?>
<form name="ft001_propertyview" id="ft001_propertyview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t001_property">
<input type="hidden" name="modal" value="<?php echo (int)$t001_property_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t001_property_view->Property->Visible) { // Property ?>
	<tr id="r_Property">
		<td class="<?php echo $t001_property_view->TableLeftColumnClass ?>"><span id="elh_t001_property_Property"><?php echo $t001_property_view->Property->caption() ?></span></td>
		<td data-name="Property" <?php echo $t001_property_view->Property->cellAttributes() ?>>
<span id="el_t001_property_Property">
<span<?php echo $t001_property_view->Property->viewAttributes() ?>><?php echo $t001_property_view->Property->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t001_property_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t001_property_view->isExport()) { ?>
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
$t001_property_view->terminate();
?>