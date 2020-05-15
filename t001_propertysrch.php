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
$t001_property_search = new t001_property_search();

// Run the page
$t001_property_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t001_property_search->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft001_propertysearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($t001_property_search->IsModal) { ?>
	ft001_propertysearch = currentAdvancedSearchForm = new ew.Form("ft001_propertysearch", "search");
	<?php } else { ?>
	ft001_propertysearch = currentForm = new ew.Form("ft001_propertysearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	ft001_propertysearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	ft001_propertysearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft001_propertysearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft001_propertysearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t001_property_search->showPageHeader(); ?>
<?php
$t001_property_search->showMessage();
?>
<form name="ft001_propertysearch" id="ft001_propertysearch" class="<?php echo $t001_property_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t001_property">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$t001_property_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($t001_property_search->Property->Visible) { // Property ?>
	<div id="r_Property" class="form-group row">
		<label for="x_Property" class="<?php echo $t001_property_search->LeftColumnClass ?>"><span id="elh_t001_property_Property"><?php echo $t001_property_search->Property->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Property" id="z_Property" value="LIKE">
</span>
		</label>
		<div class="<?php echo $t001_property_search->RightColumnClass ?>"><div <?php echo $t001_property_search->Property->cellAttributes() ?>>
			<span id="el_t001_property_Property" class="ew-search-field">
<input type="text" data-table="t001_property" data-field="x_Property" name="x_Property" id="x_Property" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t001_property_search->Property->getPlaceHolder()) ?>" value="<?php echo $t001_property_search->Property->EditValue ?>"<?php echo $t001_property_search->Property->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t001_property_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t001_property_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t001_property_search->showPageFooter();
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
$t001_property_search->terminate();
?>