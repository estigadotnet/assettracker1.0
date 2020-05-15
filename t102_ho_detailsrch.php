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
$t102_ho_detail_search = new t102_ho_detail_search();

// Run the page
$t102_ho_detail_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t102_ho_detail_search->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft102_ho_detailsearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($t102_ho_detail_search->IsModal) { ?>
	ft102_ho_detailsearch = currentAdvancedSearchForm = new ew.Form("ft102_ho_detailsearch", "search");
	<?php } else { ?>
	ft102_ho_detailsearch = currentForm = new ew.Form("ft102_ho_detailsearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	ft102_ho_detailsearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_hohead_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($t102_ho_detail_search->hohead_id->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_asset_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($t102_ho_detail_search->asset_id->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_proc_date");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($t102_ho_detail_search->proc_date->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_proc_ccost");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($t102_ho_detail_search->proc_ccost->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_dep_amount");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($t102_ho_detail_search->dep_amount->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_dep_ytd");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($t102_ho_detail_search->dep_ytd->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_nb_val");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($t102_ho_detail_search->nb_val->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	ft102_ho_detailsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft102_ho_detailsearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft102_ho_detailsearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t102_ho_detail_search->showPageHeader(); ?>
<?php
$t102_ho_detail_search->showMessage();
?>
<form name="ft102_ho_detailsearch" id="ft102_ho_detailsearch" class="<?php echo $t102_ho_detail_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t102_ho_detail">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$t102_ho_detail_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($t102_ho_detail_search->hohead_id->Visible) { // hohead_id ?>
	<div id="r_hohead_id" class="form-group row">
		<label for="x_hohead_id" class="<?php echo $t102_ho_detail_search->LeftColumnClass ?>"><span id="elh_t102_ho_detail_hohead_id"><?php echo $t102_ho_detail_search->hohead_id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_hohead_id" id="z_hohead_id" value="=">
</span>
		</label>
		<div class="<?php echo $t102_ho_detail_search->RightColumnClass ?>"><div <?php echo $t102_ho_detail_search->hohead_id->cellAttributes() ?>>
			<span id="el_t102_ho_detail_hohead_id" class="ew-search-field">
<input type="text" data-table="t102_ho_detail" data-field="x_hohead_id" name="x_hohead_id" id="x_hohead_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t102_ho_detail_search->hohead_id->getPlaceHolder()) ?>" value="<?php echo $t102_ho_detail_search->hohead_id->EditValue ?>"<?php echo $t102_ho_detail_search->hohead_id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t102_ho_detail_search->asset_id->Visible) { // asset_id ?>
	<div id="r_asset_id" class="form-group row">
		<label for="x_asset_id" class="<?php echo $t102_ho_detail_search->LeftColumnClass ?>"><span id="elh_t102_ho_detail_asset_id"><?php echo $t102_ho_detail_search->asset_id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_asset_id" id="z_asset_id" value="=">
</span>
		</label>
		<div class="<?php echo $t102_ho_detail_search->RightColumnClass ?>"><div <?php echo $t102_ho_detail_search->asset_id->cellAttributes() ?>>
			<span id="el_t102_ho_detail_asset_id" class="ew-search-field">
<input type="text" data-table="t102_ho_detail" data-field="x_asset_id" name="x_asset_id" id="x_asset_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t102_ho_detail_search->asset_id->getPlaceHolder()) ?>" value="<?php echo $t102_ho_detail_search->asset_id->EditValue ?>"<?php echo $t102_ho_detail_search->asset_id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t102_ho_detail_search->proc_date->Visible) { // proc_date ?>
	<div id="r_proc_date" class="form-group row">
		<label for="x_proc_date" class="<?php echo $t102_ho_detail_search->LeftColumnClass ?>"><span id="elh_t102_ho_detail_proc_date"><?php echo $t102_ho_detail_search->proc_date->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_proc_date" id="z_proc_date" value="=">
</span>
		</label>
		<div class="<?php echo $t102_ho_detail_search->RightColumnClass ?>"><div <?php echo $t102_ho_detail_search->proc_date->cellAttributes() ?>>
			<span id="el_t102_ho_detail_proc_date" class="ew-search-field">
<input type="text" data-table="t102_ho_detail" data-field="x_proc_date" name="x_proc_date" id="x_proc_date" maxlength="10" placeholder="<?php echo HtmlEncode($t102_ho_detail_search->proc_date->getPlaceHolder()) ?>" value="<?php echo $t102_ho_detail_search->proc_date->EditValue ?>"<?php echo $t102_ho_detail_search->proc_date->editAttributes() ?>>
<?php if (!$t102_ho_detail_search->proc_date->ReadOnly && !$t102_ho_detail_search->proc_date->Disabled && !isset($t102_ho_detail_search->proc_date->EditAttrs["readonly"]) && !isset($t102_ho_detail_search->proc_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft102_ho_detailsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("ft102_ho_detailsearch", "x_proc_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t102_ho_detail_search->proc_ccost->Visible) { // proc_ccost ?>
	<div id="r_proc_ccost" class="form-group row">
		<label for="x_proc_ccost" class="<?php echo $t102_ho_detail_search->LeftColumnClass ?>"><span id="elh_t102_ho_detail_proc_ccost"><?php echo $t102_ho_detail_search->proc_ccost->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_proc_ccost" id="z_proc_ccost" value="=">
</span>
		</label>
		<div class="<?php echo $t102_ho_detail_search->RightColumnClass ?>"><div <?php echo $t102_ho_detail_search->proc_ccost->cellAttributes() ?>>
			<span id="el_t102_ho_detail_proc_ccost" class="ew-search-field">
<input type="text" data-table="t102_ho_detail" data-field="x_proc_ccost" name="x_proc_ccost" id="x_proc_ccost" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t102_ho_detail_search->proc_ccost->getPlaceHolder()) ?>" value="<?php echo $t102_ho_detail_search->proc_ccost->EditValue ?>"<?php echo $t102_ho_detail_search->proc_ccost->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t102_ho_detail_search->dep_amount->Visible) { // dep_amount ?>
	<div id="r_dep_amount" class="form-group row">
		<label for="x_dep_amount" class="<?php echo $t102_ho_detail_search->LeftColumnClass ?>"><span id="elh_t102_ho_detail_dep_amount"><?php echo $t102_ho_detail_search->dep_amount->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_dep_amount" id="z_dep_amount" value="=">
</span>
		</label>
		<div class="<?php echo $t102_ho_detail_search->RightColumnClass ?>"><div <?php echo $t102_ho_detail_search->dep_amount->cellAttributes() ?>>
			<span id="el_t102_ho_detail_dep_amount" class="ew-search-field">
<input type="text" data-table="t102_ho_detail" data-field="x_dep_amount" name="x_dep_amount" id="x_dep_amount" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t102_ho_detail_search->dep_amount->getPlaceHolder()) ?>" value="<?php echo $t102_ho_detail_search->dep_amount->EditValue ?>"<?php echo $t102_ho_detail_search->dep_amount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t102_ho_detail_search->dep_ytd->Visible) { // dep_ytd ?>
	<div id="r_dep_ytd" class="form-group row">
		<label for="x_dep_ytd" class="<?php echo $t102_ho_detail_search->LeftColumnClass ?>"><span id="elh_t102_ho_detail_dep_ytd"><?php echo $t102_ho_detail_search->dep_ytd->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_dep_ytd" id="z_dep_ytd" value="=">
</span>
		</label>
		<div class="<?php echo $t102_ho_detail_search->RightColumnClass ?>"><div <?php echo $t102_ho_detail_search->dep_ytd->cellAttributes() ?>>
			<span id="el_t102_ho_detail_dep_ytd" class="ew-search-field">
<input type="text" data-table="t102_ho_detail" data-field="x_dep_ytd" name="x_dep_ytd" id="x_dep_ytd" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t102_ho_detail_search->dep_ytd->getPlaceHolder()) ?>" value="<?php echo $t102_ho_detail_search->dep_ytd->EditValue ?>"<?php echo $t102_ho_detail_search->dep_ytd->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t102_ho_detail_search->nb_val->Visible) { // nb_val ?>
	<div id="r_nb_val" class="form-group row">
		<label for="x_nb_val" class="<?php echo $t102_ho_detail_search->LeftColumnClass ?>"><span id="elh_t102_ho_detail_nb_val"><?php echo $t102_ho_detail_search->nb_val->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_nb_val" id="z_nb_val" value="=">
</span>
		</label>
		<div class="<?php echo $t102_ho_detail_search->RightColumnClass ?>"><div <?php echo $t102_ho_detail_search->nb_val->cellAttributes() ?>>
			<span id="el_t102_ho_detail_nb_val" class="ew-search-field">
<input type="text" data-table="t102_ho_detail" data-field="x_nb_val" name="x_nb_val" id="x_nb_val" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t102_ho_detail_search->nb_val->getPlaceHolder()) ?>" value="<?php echo $t102_ho_detail_search->nb_val->EditValue ?>"<?php echo $t102_ho_detail_search->nb_val->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t102_ho_detail_search->remarks->Visible) { // remarks ?>
	<div id="r_remarks" class="form-group row">
		<label for="x_remarks" class="<?php echo $t102_ho_detail_search->LeftColumnClass ?>"><span id="elh_t102_ho_detail_remarks"><?php echo $t102_ho_detail_search->remarks->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_remarks" id="z_remarks" value="LIKE">
</span>
		</label>
		<div class="<?php echo $t102_ho_detail_search->RightColumnClass ?>"><div <?php echo $t102_ho_detail_search->remarks->cellAttributes() ?>>
			<span id="el_t102_ho_detail_remarks" class="ew-search-field">
<input type="text" data-table="t102_ho_detail" data-field="x_remarks" name="x_remarks" id="x_remarks" size="35" maxlength="65535" placeholder="<?php echo HtmlEncode($t102_ho_detail_search->remarks->getPlaceHolder()) ?>" value="<?php echo $t102_ho_detail_search->remarks->EditValue ?>"<?php echo $t102_ho_detail_search->remarks->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t102_ho_detail_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t102_ho_detail_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t102_ho_detail_search->showPageFooter();
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
$t102_ho_detail_search->terminate();
?>