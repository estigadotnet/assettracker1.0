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
$t101_ho_head_search = new t101_ho_head_search();

// Run the page
$t101_ho_head_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_ho_head_search->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft101_ho_headsearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($t101_ho_head_search->IsModal) { ?>
	ft101_ho_headsearch = currentAdvancedSearchForm = new ew.Form("ft101_ho_headsearch", "search");
	<?php } else { ?>
	ft101_ho_headsearch = currentForm = new ew.Form("ft101_ho_headsearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	ft101_ho_headsearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_tr_date");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($t101_ho_head_search->tr_date->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_cno_by");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($t101_ho_head_search->cno_by->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	ft101_ho_headsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft101_ho_headsearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft101_ho_headsearch.lists["x_ho_to"] = <?php echo $t101_ho_head_search->ho_to->Lookup->toClientList($t101_ho_head_search) ?>;
	ft101_ho_headsearch.lists["x_ho_to"].options = <?php echo JsonEncode($t101_ho_head_search->ho_to->lookupOptions()) ?>;
	ft101_ho_headsearch.lists["x_dept_to"] = <?php echo $t101_ho_head_search->dept_to->Lookup->toClientList($t101_ho_head_search) ?>;
	ft101_ho_headsearch.lists["x_dept_to"].options = <?php echo JsonEncode($t101_ho_head_search->dept_to->lookupOptions()) ?>;
	ft101_ho_headsearch.lists["x_ho_by"] = <?php echo $t101_ho_head_search->ho_by->Lookup->toClientList($t101_ho_head_search) ?>;
	ft101_ho_headsearch.lists["x_ho_by"].options = <?php echo JsonEncode($t101_ho_head_search->ho_by->lookupOptions()) ?>;
	ft101_ho_headsearch.lists["x_dept_by"] = <?php echo $t101_ho_head_search->dept_by->Lookup->toClientList($t101_ho_head_search) ?>;
	ft101_ho_headsearch.lists["x_dept_by"].options = <?php echo JsonEncode($t101_ho_head_search->dept_by->lookupOptions()) ?>;
	ft101_ho_headsearch.lists["x_sign1"] = <?php echo $t101_ho_head_search->sign1->Lookup->toClientList($t101_ho_head_search) ?>;
	ft101_ho_headsearch.lists["x_sign1"].options = <?php echo JsonEncode($t101_ho_head_search->sign1->lookupOptions()) ?>;
	ft101_ho_headsearch.lists["x_sign2"] = <?php echo $t101_ho_head_search->sign2->Lookup->toClientList($t101_ho_head_search) ?>;
	ft101_ho_headsearch.lists["x_sign2"].options = <?php echo JsonEncode($t101_ho_head_search->sign2->lookupOptions()) ?>;
	ft101_ho_headsearch.lists["x_sign3"] = <?php echo $t101_ho_head_search->sign3->Lookup->toClientList($t101_ho_head_search) ?>;
	ft101_ho_headsearch.lists["x_sign3"].options = <?php echo JsonEncode($t101_ho_head_search->sign3->lookupOptions()) ?>;
	ft101_ho_headsearch.lists["x_sign4"] = <?php echo $t101_ho_head_search->sign4->Lookup->toClientList($t101_ho_head_search) ?>;
	ft101_ho_headsearch.lists["x_sign4"].options = <?php echo JsonEncode($t101_ho_head_search->sign4->lookupOptions()) ?>;
	loadjs.done("ft101_ho_headsearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t101_ho_head_search->showPageHeader(); ?>
<?php
$t101_ho_head_search->showMessage();
?>
<form name="ft101_ho_headsearch" id="ft101_ho_headsearch" class="<?php echo $t101_ho_head_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_ho_head">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$t101_ho_head_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($t101_ho_head_search->tr_no->Visible) { // tr_no ?>
	<div id="r_tr_no" class="form-group row">
		<label for="x_tr_no" class="<?php echo $t101_ho_head_search->LeftColumnClass ?>"><span id="elh_t101_ho_head_tr_no"><?php echo $t101_ho_head_search->tr_no->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_tr_no" id="z_tr_no" value="LIKE">
</span>
		</label>
		<div class="<?php echo $t101_ho_head_search->RightColumnClass ?>"><div <?php echo $t101_ho_head_search->tr_no->cellAttributes() ?>>
			<span id="el_t101_ho_head_tr_no" class="ew-search-field">
<input type="text" data-table="t101_ho_head" data-field="x_tr_no" name="x_tr_no" id="x_tr_no" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t101_ho_head_search->tr_no->getPlaceHolder()) ?>" value="<?php echo $t101_ho_head_search->tr_no->EditValue ?>"<?php echo $t101_ho_head_search->tr_no->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_search->tr_date->Visible) { // tr_date ?>
	<div id="r_tr_date" class="form-group row">
		<label for="x_tr_date" class="<?php echo $t101_ho_head_search->LeftColumnClass ?>"><span id="elh_t101_ho_head_tr_date"><?php echo $t101_ho_head_search->tr_date->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_tr_date" id="z_tr_date" value="=">
</span>
		</label>
		<div class="<?php echo $t101_ho_head_search->RightColumnClass ?>"><div <?php echo $t101_ho_head_search->tr_date->cellAttributes() ?>>
			<span id="el_t101_ho_head_tr_date" class="ew-search-field">
<input type="text" data-table="t101_ho_head" data-field="x_tr_date" data-format="7" name="x_tr_date" id="x_tr_date" maxlength="10" placeholder="<?php echo HtmlEncode($t101_ho_head_search->tr_date->getPlaceHolder()) ?>" value="<?php echo $t101_ho_head_search->tr_date->EditValue ?>"<?php echo $t101_ho_head_search->tr_date->editAttributes() ?>>
<?php if (!$t101_ho_head_search->tr_date->ReadOnly && !$t101_ho_head_search->tr_date->Disabled && !isset($t101_ho_head_search->tr_date->EditAttrs["readonly"]) && !isset($t101_ho_head_search->tr_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft101_ho_headsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("ft101_ho_headsearch", "x_tr_date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_search->ho_to->Visible) { // ho_to ?>
	<div id="r_ho_to" class="form-group row">
		<label for="x_ho_to" class="<?php echo $t101_ho_head_search->LeftColumnClass ?>"><span id="elh_t101_ho_head_ho_to"><?php echo $t101_ho_head_search->ho_to->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_ho_to" id="z_ho_to" value="=">
</span>
		</label>
		<div class="<?php echo $t101_ho_head_search->RightColumnClass ?>"><div <?php echo $t101_ho_head_search->ho_to->cellAttributes() ?>>
			<span id="el_t101_ho_head_ho_to" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ho_to"><?php echo EmptyValue(strval($t101_ho_head_search->ho_to->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_search->ho_to->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_search->ho_to->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_search->ho_to->ReadOnly || $t101_ho_head_search->ho_to->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_ho_to',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_search->ho_to->Lookup->getParamTag($t101_ho_head_search, "p_x_ho_to") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_ho_to" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_search->ho_to->displayValueSeparatorAttribute() ?>" name="x_ho_to" id="x_ho_to" value="<?php echo $t101_ho_head_search->ho_to->AdvancedSearch->SearchValue ?>"<?php echo $t101_ho_head_search->ho_to->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_search->cno_to->Visible) { // cno_to ?>
	<div id="r_cno_to" class="form-group row">
		<label for="x_cno_to" class="<?php echo $t101_ho_head_search->LeftColumnClass ?>"><span id="elh_t101_ho_head_cno_to"><?php echo $t101_ho_head_search->cno_to->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_cno_to" id="z_cno_to" value="LIKE">
</span>
		</label>
		<div class="<?php echo $t101_ho_head_search->RightColumnClass ?>"><div <?php echo $t101_ho_head_search->cno_to->cellAttributes() ?>>
			<span id="el_t101_ho_head_cno_to" class="ew-search-field">
<input type="text" data-table="t101_ho_head" data-field="x_cno_to" name="x_cno_to" id="x_cno_to" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t101_ho_head_search->cno_to->getPlaceHolder()) ?>" value="<?php echo $t101_ho_head_search->cno_to->EditValue ?>"<?php echo $t101_ho_head_search->cno_to->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_search->dept_to->Visible) { // dept_to ?>
	<div id="r_dept_to" class="form-group row">
		<label for="x_dept_to" class="<?php echo $t101_ho_head_search->LeftColumnClass ?>"><span id="elh_t101_ho_head_dept_to"><?php echo $t101_ho_head_search->dept_to->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_dept_to" id="z_dept_to" value="=">
</span>
		</label>
		<div class="<?php echo $t101_ho_head_search->RightColumnClass ?>"><div <?php echo $t101_ho_head_search->dept_to->cellAttributes() ?>>
			<span id="el_t101_ho_head_dept_to" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_dept_to"><?php echo EmptyValue(strval($t101_ho_head_search->dept_to->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_search->dept_to->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_search->dept_to->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_search->dept_to->ReadOnly || $t101_ho_head_search->dept_to->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_dept_to',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_search->dept_to->Lookup->getParamTag($t101_ho_head_search, "p_x_dept_to") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_dept_to" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_search->dept_to->displayValueSeparatorAttribute() ?>" name="x_dept_to" id="x_dept_to" value="<?php echo $t101_ho_head_search->dept_to->AdvancedSearch->SearchValue ?>"<?php echo $t101_ho_head_search->dept_to->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_search->ho_by->Visible) { // ho_by ?>
	<div id="r_ho_by" class="form-group row">
		<label for="x_ho_by" class="<?php echo $t101_ho_head_search->LeftColumnClass ?>"><span id="elh_t101_ho_head_ho_by"><?php echo $t101_ho_head_search->ho_by->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_ho_by" id="z_ho_by" value="=">
</span>
		</label>
		<div class="<?php echo $t101_ho_head_search->RightColumnClass ?>"><div <?php echo $t101_ho_head_search->ho_by->cellAttributes() ?>>
			<span id="el_t101_ho_head_ho_by" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ho_by"><?php echo EmptyValue(strval($t101_ho_head_search->ho_by->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_search->ho_by->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_search->ho_by->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_search->ho_by->ReadOnly || $t101_ho_head_search->ho_by->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_ho_by',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_search->ho_by->Lookup->getParamTag($t101_ho_head_search, "p_x_ho_by") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_ho_by" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_search->ho_by->displayValueSeparatorAttribute() ?>" name="x_ho_by" id="x_ho_by" value="<?php echo $t101_ho_head_search->ho_by->AdvancedSearch->SearchValue ?>"<?php echo $t101_ho_head_search->ho_by->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_search->cno_by->Visible) { // cno_by ?>
	<div id="r_cno_by" class="form-group row">
		<label for="x_cno_by" class="<?php echo $t101_ho_head_search->LeftColumnClass ?>"><span id="elh_t101_ho_head_cno_by"><?php echo $t101_ho_head_search->cno_by->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_cno_by" id="z_cno_by" value="=">
</span>
		</label>
		<div class="<?php echo $t101_ho_head_search->RightColumnClass ?>"><div <?php echo $t101_ho_head_search->cno_by->cellAttributes() ?>>
			<span id="el_t101_ho_head_cno_by" class="ew-search-field">
<input type="text" data-table="t101_ho_head" data-field="x_cno_by" name="x_cno_by" id="x_cno_by" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t101_ho_head_search->cno_by->getPlaceHolder()) ?>" value="<?php echo $t101_ho_head_search->cno_by->EditValue ?>"<?php echo $t101_ho_head_search->cno_by->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_search->dept_by->Visible) { // dept_by ?>
	<div id="r_dept_by" class="form-group row">
		<label for="x_dept_by" class="<?php echo $t101_ho_head_search->LeftColumnClass ?>"><span id="elh_t101_ho_head_dept_by"><?php echo $t101_ho_head_search->dept_by->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_dept_by" id="z_dept_by" value="=">
</span>
		</label>
		<div class="<?php echo $t101_ho_head_search->RightColumnClass ?>"><div <?php echo $t101_ho_head_search->dept_by->cellAttributes() ?>>
			<span id="el_t101_ho_head_dept_by" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_dept_by"><?php echo EmptyValue(strval($t101_ho_head_search->dept_by->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_search->dept_by->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_search->dept_by->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_search->dept_by->ReadOnly || $t101_ho_head_search->dept_by->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_dept_by',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_search->dept_by->Lookup->getParamTag($t101_ho_head_search, "p_x_dept_by") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_dept_by" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_search->dept_by->displayValueSeparatorAttribute() ?>" name="x_dept_by" id="x_dept_by" value="<?php echo $t101_ho_head_search->dept_by->AdvancedSearch->SearchValue ?>"<?php echo $t101_ho_head_search->dept_by->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_search->sign1->Visible) { // sign1 ?>
	<div id="r_sign1" class="form-group row">
		<label for="x_sign1" class="<?php echo $t101_ho_head_search->LeftColumnClass ?>"><span id="elh_t101_ho_head_sign1"><?php echo $t101_ho_head_search->sign1->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_sign1" id="z_sign1" value="=">
</span>
		</label>
		<div class="<?php echo $t101_ho_head_search->RightColumnClass ?>"><div <?php echo $t101_ho_head_search->sign1->cellAttributes() ?>>
			<span id="el_t101_ho_head_sign1" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_sign1"><?php echo EmptyValue(strval($t101_ho_head_search->sign1->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_search->sign1->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_search->sign1->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_search->sign1->ReadOnly || $t101_ho_head_search->sign1->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_sign1',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_search->sign1->Lookup->getParamTag($t101_ho_head_search, "p_x_sign1") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_sign1" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_search->sign1->displayValueSeparatorAttribute() ?>" name="x_sign1" id="x_sign1" value="<?php echo $t101_ho_head_search->sign1->AdvancedSearch->SearchValue ?>"<?php echo $t101_ho_head_search->sign1->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_search->sign2->Visible) { // sign2 ?>
	<div id="r_sign2" class="form-group row">
		<label for="x_sign2" class="<?php echo $t101_ho_head_search->LeftColumnClass ?>"><span id="elh_t101_ho_head_sign2"><?php echo $t101_ho_head_search->sign2->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_sign2" id="z_sign2" value="=">
</span>
		</label>
		<div class="<?php echo $t101_ho_head_search->RightColumnClass ?>"><div <?php echo $t101_ho_head_search->sign2->cellAttributes() ?>>
			<span id="el_t101_ho_head_sign2" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_sign2"><?php echo EmptyValue(strval($t101_ho_head_search->sign2->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_search->sign2->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_search->sign2->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_search->sign2->ReadOnly || $t101_ho_head_search->sign2->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_sign2',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_search->sign2->Lookup->getParamTag($t101_ho_head_search, "p_x_sign2") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_sign2" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_search->sign2->displayValueSeparatorAttribute() ?>" name="x_sign2" id="x_sign2" value="<?php echo $t101_ho_head_search->sign2->AdvancedSearch->SearchValue ?>"<?php echo $t101_ho_head_search->sign2->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_search->sign3->Visible) { // sign3 ?>
	<div id="r_sign3" class="form-group row">
		<label for="x_sign3" class="<?php echo $t101_ho_head_search->LeftColumnClass ?>"><span id="elh_t101_ho_head_sign3"><?php echo $t101_ho_head_search->sign3->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_sign3" id="z_sign3" value="=">
</span>
		</label>
		<div class="<?php echo $t101_ho_head_search->RightColumnClass ?>"><div <?php echo $t101_ho_head_search->sign3->cellAttributes() ?>>
			<span id="el_t101_ho_head_sign3" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_sign3"><?php echo EmptyValue(strval($t101_ho_head_search->sign3->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_search->sign3->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_search->sign3->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_search->sign3->ReadOnly || $t101_ho_head_search->sign3->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_sign3',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_search->sign3->Lookup->getParamTag($t101_ho_head_search, "p_x_sign3") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_sign3" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_search->sign3->displayValueSeparatorAttribute() ?>" name="x_sign3" id="x_sign3" value="<?php echo $t101_ho_head_search->sign3->AdvancedSearch->SearchValue ?>"<?php echo $t101_ho_head_search->sign3->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_search->sign4->Visible) { // sign4 ?>
	<div id="r_sign4" class="form-group row">
		<label for="x_sign4" class="<?php echo $t101_ho_head_search->LeftColumnClass ?>"><span id="elh_t101_ho_head_sign4"><?php echo $t101_ho_head_search->sign4->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_sign4" id="z_sign4" value="=">
</span>
		</label>
		<div class="<?php echo $t101_ho_head_search->RightColumnClass ?>"><div <?php echo $t101_ho_head_search->sign4->cellAttributes() ?>>
			<span id="el_t101_ho_head_sign4" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_sign4"><?php echo EmptyValue(strval($t101_ho_head_search->sign4->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_search->sign4->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_search->sign4->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_search->sign4->ReadOnly || $t101_ho_head_search->sign4->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_sign4',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_search->sign4->Lookup->getParamTag($t101_ho_head_search, "p_x_sign4") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_sign4" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_search->sign4->displayValueSeparatorAttribute() ?>" name="x_sign4" id="x_sign4" value="<?php echo $t101_ho_head_search->sign4->AdvancedSearch->SearchValue ?>"<?php echo $t101_ho_head_search->sign4->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t101_ho_head_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t101_ho_head_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t101_ho_head_search->showPageFooter();
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
$t101_ho_head_search->terminate();
?>