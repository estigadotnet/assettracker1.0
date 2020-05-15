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
$t205_parameter_search = new t205_parameter_search();

// Run the page
$t205_parameter_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t205_parameter_search->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft205_parametersearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($t205_parameter_search->IsModal) { ?>
	ft205_parametersearch = currentAdvancedSearchForm = new ew.Form("ft205_parametersearch", "search");
	<?php } else { ?>
	ft205_parametersearch = currentForm = new ew.Form("ft205_parametersearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	ft205_parametersearch.validate = function(fobj) {
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
	ft205_parametersearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft205_parametersearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft205_parametersearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t205_parameter_search->showPageHeader(); ?>
<?php
$t205_parameter_search->showMessage();
?>
<form name="ft205_parametersearch" id="ft205_parametersearch" class="<?php echo $t205_parameter_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t205_parameter">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$t205_parameter_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($t205_parameter_search->Category->Visible) { // Category ?>
	<div id="r_Category" class="form-group row">
		<label for="x_Category" class="<?php echo $t205_parameter_search->LeftColumnClass ?>"><span id="elh_t205_parameter_Category"><?php echo $t205_parameter_search->Category->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Category" id="z_Category" value="LIKE">
</span>
		</label>
		<div class="<?php echo $t205_parameter_search->RightColumnClass ?>"><div <?php echo $t205_parameter_search->Category->cellAttributes() ?>>
			<span id="el_t205_parameter_Category" class="ew-search-field">
<input type="text" data-table="t205_parameter" data-field="x_Category" name="x_Category" id="x_Category" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t205_parameter_search->Category->getPlaceHolder()) ?>" value="<?php echo $t205_parameter_search->Category->EditValue ?>"<?php echo $t205_parameter_search->Category->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t205_parameter_search->Parameter->Visible) { // Parameter ?>
	<div id="r_Parameter" class="form-group row">
		<label for="x_Parameter" class="<?php echo $t205_parameter_search->LeftColumnClass ?>"><span id="elh_t205_parameter_Parameter"><?php echo $t205_parameter_search->Parameter->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Parameter" id="z_Parameter" value="LIKE">
</span>
		</label>
		<div class="<?php echo $t205_parameter_search->RightColumnClass ?>"><div <?php echo $t205_parameter_search->Parameter->cellAttributes() ?>>
			<span id="el_t205_parameter_Parameter" class="ew-search-field">
<input type="text" data-table="t205_parameter" data-field="x_Parameter" name="x_Parameter" id="x_Parameter" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t205_parameter_search->Parameter->getPlaceHolder()) ?>" value="<?php echo $t205_parameter_search->Parameter->EditValue ?>"<?php echo $t205_parameter_search->Parameter->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t205_parameter_search->Nilai->Visible) { // Nilai ?>
	<div id="r_Nilai" class="form-group row">
		<label for="x_Nilai" class="<?php echo $t205_parameter_search->LeftColumnClass ?>"><span id="elh_t205_parameter_Nilai"><?php echo $t205_parameter_search->Nilai->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Nilai" id="z_Nilai" value="LIKE">
</span>
		</label>
		<div class="<?php echo $t205_parameter_search->RightColumnClass ?>"><div <?php echo $t205_parameter_search->Nilai->cellAttributes() ?>>
			<span id="el_t205_parameter_Nilai" class="ew-search-field">
<input type="text" data-table="t205_parameter" data-field="x_Nilai" name="x_Nilai" id="x_Nilai" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t205_parameter_search->Nilai->getPlaceHolder()) ?>" value="<?php echo $t205_parameter_search->Nilai->EditValue ?>"<?php echo $t205_parameter_search->Nilai->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t205_parameter_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t205_parameter_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t205_parameter_search->showPageFooter();
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
$t205_parameter_search->terminate();
?>