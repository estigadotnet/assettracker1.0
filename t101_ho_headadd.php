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
$t101_ho_head_add = new t101_ho_head_add();

// Run the page
$t101_ho_head_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_ho_head_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft101_ho_headadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	ft101_ho_headadd = currentForm = new ew.Form("ft101_ho_headadd", "add");

	// Validate form
	ft101_ho_headadd.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
			return true;
		var elm, felm, uelm, addcnt = 0;
		var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
		var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
		var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
		var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
		for (var i = startcnt; i <= rowcnt; i++) {
			var infix = ($k[0]) ? String(i) : "";
			$fobj.data("rowindex", infix);
			<?php if ($t101_ho_head_add->tr_no->Required) { ?>
				elm = this.getElements("x" + infix + "_tr_no");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_add->tr_no->caption(), $t101_ho_head_add->tr_no->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_ho_head_add->tr_date->Required) { ?>
				elm = this.getElements("x" + infix + "_tr_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_add->tr_date->caption(), $t101_ho_head_add->tr_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tr_date");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t101_ho_head_add->tr_date->errorMessage()) ?>");
			<?php if ($t101_ho_head_add->ho_to->Required) { ?>
				elm = this.getElements("x" + infix + "_ho_to");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_add->ho_to->caption(), $t101_ho_head_add->ho_to->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_ho_head_add->cno_to->Required) { ?>
				elm = this.getElements("x" + infix + "_cno_to");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_add->cno_to->caption(), $t101_ho_head_add->cno_to->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_ho_head_add->dept_to->Required) { ?>
				elm = this.getElements("x" + infix + "_dept_to");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_add->dept_to->caption(), $t101_ho_head_add->dept_to->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_ho_head_add->ho_by->Required) { ?>
				elm = this.getElements("x" + infix + "_ho_by");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_add->ho_by->caption(), $t101_ho_head_add->ho_by->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_ho_head_add->cno_by->Required) { ?>
				elm = this.getElements("x" + infix + "_cno_by");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_add->cno_by->caption(), $t101_ho_head_add->cno_by->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_cno_by");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t101_ho_head_add->cno_by->errorMessage()) ?>");
			<?php if ($t101_ho_head_add->dept_by->Required) { ?>
				elm = this.getElements("x" + infix + "_dept_by");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_add->dept_by->caption(), $t101_ho_head_add->dept_by->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_ho_head_add->sign1->Required) { ?>
				elm = this.getElements("x" + infix + "_sign1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_add->sign1->caption(), $t101_ho_head_add->sign1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_ho_head_add->sign2->Required) { ?>
				elm = this.getElements("x" + infix + "_sign2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_add->sign2->caption(), $t101_ho_head_add->sign2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_ho_head_add->sign3->Required) { ?>
				elm = this.getElements("x" + infix + "_sign3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_add->sign3->caption(), $t101_ho_head_add->sign3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_ho_head_add->sign4->Required) { ?>
				elm = this.getElements("x" + infix + "_sign4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_add->sign4->caption(), $t101_ho_head_add->sign4->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}

		// Process detail forms
		var dfs = $fobj.find("input[name='detailpage']").get();
		for (var i = 0; i < dfs.length; i++) {
			var df = dfs[i], val = df.value;
			if (val && ew.forms[val])
				if (!ew.forms[val].validate())
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	ft101_ho_headadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft101_ho_headadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft101_ho_headadd.lists["x_ho_to"] = <?php echo $t101_ho_head_add->ho_to->Lookup->toClientList($t101_ho_head_add) ?>;
	ft101_ho_headadd.lists["x_ho_to"].options = <?php echo JsonEncode($t101_ho_head_add->ho_to->lookupOptions()) ?>;
	ft101_ho_headadd.lists["x_dept_to"] = <?php echo $t101_ho_head_add->dept_to->Lookup->toClientList($t101_ho_head_add) ?>;
	ft101_ho_headadd.lists["x_dept_to"].options = <?php echo JsonEncode($t101_ho_head_add->dept_to->lookupOptions()) ?>;
	ft101_ho_headadd.lists["x_ho_by"] = <?php echo $t101_ho_head_add->ho_by->Lookup->toClientList($t101_ho_head_add) ?>;
	ft101_ho_headadd.lists["x_ho_by"].options = <?php echo JsonEncode($t101_ho_head_add->ho_by->lookupOptions()) ?>;
	ft101_ho_headadd.lists["x_dept_by"] = <?php echo $t101_ho_head_add->dept_by->Lookup->toClientList($t101_ho_head_add) ?>;
	ft101_ho_headadd.lists["x_dept_by"].options = <?php echo JsonEncode($t101_ho_head_add->dept_by->lookupOptions()) ?>;
	ft101_ho_headadd.lists["x_sign1"] = <?php echo $t101_ho_head_add->sign1->Lookup->toClientList($t101_ho_head_add) ?>;
	ft101_ho_headadd.lists["x_sign1"].options = <?php echo JsonEncode($t101_ho_head_add->sign1->lookupOptions()) ?>;
	ft101_ho_headadd.lists["x_sign2"] = <?php echo $t101_ho_head_add->sign2->Lookup->toClientList($t101_ho_head_add) ?>;
	ft101_ho_headadd.lists["x_sign2"].options = <?php echo JsonEncode($t101_ho_head_add->sign2->lookupOptions()) ?>;
	ft101_ho_headadd.lists["x_sign3"] = <?php echo $t101_ho_head_add->sign3->Lookup->toClientList($t101_ho_head_add) ?>;
	ft101_ho_headadd.lists["x_sign3"].options = <?php echo JsonEncode($t101_ho_head_add->sign3->lookupOptions()) ?>;
	ft101_ho_headadd.lists["x_sign4"] = <?php echo $t101_ho_head_add->sign4->Lookup->toClientList($t101_ho_head_add) ?>;
	ft101_ho_headadd.lists["x_sign4"].options = <?php echo JsonEncode($t101_ho_head_add->sign4->lookupOptions()) ?>;
	loadjs.done("ft101_ho_headadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t101_ho_head_add->showPageHeader(); ?>
<?php
$t101_ho_head_add->showMessage();
?>
<form name="ft101_ho_headadd" id="ft101_ho_headadd" class="<?php echo $t101_ho_head_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_ho_head">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t101_ho_head_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($t101_ho_head_add->tr_no->Visible) { // tr_no ?>
	<div id="r_tr_no" class="form-group row">
		<label id="elh_t101_ho_head_tr_no" for="x_tr_no" class="<?php echo $t101_ho_head_add->LeftColumnClass ?>"><?php echo $t101_ho_head_add->tr_no->caption() ?><?php echo $t101_ho_head_add->tr_no->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_ho_head_add->RightColumnClass ?>"><div <?php echo $t101_ho_head_add->tr_no->cellAttributes() ?>>
<span id="el_t101_ho_head_tr_no">
<input type="text" data-table="t101_ho_head" data-field="x_tr_no" name="x_tr_no" id="x_tr_no" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t101_ho_head_add->tr_no->getPlaceHolder()) ?>" value="<?php echo $t101_ho_head_add->tr_no->EditValue ?>"<?php echo $t101_ho_head_add->tr_no->editAttributes() ?>>
</span>
<?php echo $t101_ho_head_add->tr_no->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_add->tr_date->Visible) { // tr_date ?>
	<div id="r_tr_date" class="form-group row">
		<label id="elh_t101_ho_head_tr_date" for="x_tr_date" class="<?php echo $t101_ho_head_add->LeftColumnClass ?>"><?php echo $t101_ho_head_add->tr_date->caption() ?><?php echo $t101_ho_head_add->tr_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_ho_head_add->RightColumnClass ?>"><div <?php echo $t101_ho_head_add->tr_date->cellAttributes() ?>>
<span id="el_t101_ho_head_tr_date">
<input type="text" data-table="t101_ho_head" data-field="x_tr_date" data-format="7" name="x_tr_date" id="x_tr_date" maxlength="10" placeholder="<?php echo HtmlEncode($t101_ho_head_add->tr_date->getPlaceHolder()) ?>" value="<?php echo $t101_ho_head_add->tr_date->EditValue ?>"<?php echo $t101_ho_head_add->tr_date->editAttributes() ?>>
<?php if (!$t101_ho_head_add->tr_date->ReadOnly && !$t101_ho_head_add->tr_date->Disabled && !isset($t101_ho_head_add->tr_date->EditAttrs["readonly"]) && !isset($t101_ho_head_add->tr_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft101_ho_headadd", "datetimepicker"], function() {
	ew.createDateTimePicker("ft101_ho_headadd", "x_tr_date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php echo $t101_ho_head_add->tr_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_add->ho_to->Visible) { // ho_to ?>
	<div id="r_ho_to" class="form-group row">
		<label id="elh_t101_ho_head_ho_to" for="x_ho_to" class="<?php echo $t101_ho_head_add->LeftColumnClass ?>"><?php echo $t101_ho_head_add->ho_to->caption() ?><?php echo $t101_ho_head_add->ho_to->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_ho_head_add->RightColumnClass ?>"><div <?php echo $t101_ho_head_add->ho_to->cellAttributes() ?>>
<span id="el_t101_ho_head_ho_to">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ho_to"><?php echo EmptyValue(strval($t101_ho_head_add->ho_to->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_add->ho_to->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_add->ho_to->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_add->ho_to->ReadOnly || $t101_ho_head_add->ho_to->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_ho_to',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_add->ho_to->Lookup->getParamTag($t101_ho_head_add, "p_x_ho_to") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_ho_to" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_add->ho_to->displayValueSeparatorAttribute() ?>" name="x_ho_to" id="x_ho_to" value="<?php echo $t101_ho_head_add->ho_to->CurrentValue ?>"<?php echo $t101_ho_head_add->ho_to->editAttributes() ?>>
</span>
<?php echo $t101_ho_head_add->ho_to->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_add->cno_to->Visible) { // cno_to ?>
	<div id="r_cno_to" class="form-group row">
		<label id="elh_t101_ho_head_cno_to" for="x_cno_to" class="<?php echo $t101_ho_head_add->LeftColumnClass ?>"><?php echo $t101_ho_head_add->cno_to->caption() ?><?php echo $t101_ho_head_add->cno_to->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_ho_head_add->RightColumnClass ?>"><div <?php echo $t101_ho_head_add->cno_to->cellAttributes() ?>>
<span id="el_t101_ho_head_cno_to">
<input type="text" data-table="t101_ho_head" data-field="x_cno_to" name="x_cno_to" id="x_cno_to" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t101_ho_head_add->cno_to->getPlaceHolder()) ?>" value="<?php echo $t101_ho_head_add->cno_to->EditValue ?>"<?php echo $t101_ho_head_add->cno_to->editAttributes() ?>>
</span>
<?php echo $t101_ho_head_add->cno_to->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_add->dept_to->Visible) { // dept_to ?>
	<div id="r_dept_to" class="form-group row">
		<label id="elh_t101_ho_head_dept_to" for="x_dept_to" class="<?php echo $t101_ho_head_add->LeftColumnClass ?>"><?php echo $t101_ho_head_add->dept_to->caption() ?><?php echo $t101_ho_head_add->dept_to->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_ho_head_add->RightColumnClass ?>"><div <?php echo $t101_ho_head_add->dept_to->cellAttributes() ?>>
<span id="el_t101_ho_head_dept_to">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_dept_to"><?php echo EmptyValue(strval($t101_ho_head_add->dept_to->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_add->dept_to->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_add->dept_to->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_add->dept_to->ReadOnly || $t101_ho_head_add->dept_to->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_dept_to',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_add->dept_to->Lookup->getParamTag($t101_ho_head_add, "p_x_dept_to") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_dept_to" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_add->dept_to->displayValueSeparatorAttribute() ?>" name="x_dept_to" id="x_dept_to" value="<?php echo $t101_ho_head_add->dept_to->CurrentValue ?>"<?php echo $t101_ho_head_add->dept_to->editAttributes() ?>>
</span>
<?php echo $t101_ho_head_add->dept_to->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_add->ho_by->Visible) { // ho_by ?>
	<div id="r_ho_by" class="form-group row">
		<label id="elh_t101_ho_head_ho_by" for="x_ho_by" class="<?php echo $t101_ho_head_add->LeftColumnClass ?>"><?php echo $t101_ho_head_add->ho_by->caption() ?><?php echo $t101_ho_head_add->ho_by->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_ho_head_add->RightColumnClass ?>"><div <?php echo $t101_ho_head_add->ho_by->cellAttributes() ?>>
<span id="el_t101_ho_head_ho_by">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ho_by"><?php echo EmptyValue(strval($t101_ho_head_add->ho_by->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_add->ho_by->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_add->ho_by->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_add->ho_by->ReadOnly || $t101_ho_head_add->ho_by->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_ho_by',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_add->ho_by->Lookup->getParamTag($t101_ho_head_add, "p_x_ho_by") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_ho_by" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_add->ho_by->displayValueSeparatorAttribute() ?>" name="x_ho_by" id="x_ho_by" value="<?php echo $t101_ho_head_add->ho_by->CurrentValue ?>"<?php echo $t101_ho_head_add->ho_by->editAttributes() ?>>
</span>
<?php echo $t101_ho_head_add->ho_by->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_add->cno_by->Visible) { // cno_by ?>
	<div id="r_cno_by" class="form-group row">
		<label id="elh_t101_ho_head_cno_by" for="x_cno_by" class="<?php echo $t101_ho_head_add->LeftColumnClass ?>"><?php echo $t101_ho_head_add->cno_by->caption() ?><?php echo $t101_ho_head_add->cno_by->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_ho_head_add->RightColumnClass ?>"><div <?php echo $t101_ho_head_add->cno_by->cellAttributes() ?>>
<span id="el_t101_ho_head_cno_by">
<input type="text" data-table="t101_ho_head" data-field="x_cno_by" name="x_cno_by" id="x_cno_by" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t101_ho_head_add->cno_by->getPlaceHolder()) ?>" value="<?php echo $t101_ho_head_add->cno_by->EditValue ?>"<?php echo $t101_ho_head_add->cno_by->editAttributes() ?>>
</span>
<?php echo $t101_ho_head_add->cno_by->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_add->dept_by->Visible) { // dept_by ?>
	<div id="r_dept_by" class="form-group row">
		<label id="elh_t101_ho_head_dept_by" for="x_dept_by" class="<?php echo $t101_ho_head_add->LeftColumnClass ?>"><?php echo $t101_ho_head_add->dept_by->caption() ?><?php echo $t101_ho_head_add->dept_by->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_ho_head_add->RightColumnClass ?>"><div <?php echo $t101_ho_head_add->dept_by->cellAttributes() ?>>
<span id="el_t101_ho_head_dept_by">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_dept_by"><?php echo EmptyValue(strval($t101_ho_head_add->dept_by->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_add->dept_by->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_add->dept_by->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_add->dept_by->ReadOnly || $t101_ho_head_add->dept_by->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_dept_by',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_add->dept_by->Lookup->getParamTag($t101_ho_head_add, "p_x_dept_by") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_dept_by" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_add->dept_by->displayValueSeparatorAttribute() ?>" name="x_dept_by" id="x_dept_by" value="<?php echo $t101_ho_head_add->dept_by->CurrentValue ?>"<?php echo $t101_ho_head_add->dept_by->editAttributes() ?>>
</span>
<?php echo $t101_ho_head_add->dept_by->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_add->sign1->Visible) { // sign1 ?>
	<div id="r_sign1" class="form-group row">
		<label id="elh_t101_ho_head_sign1" for="x_sign1" class="<?php echo $t101_ho_head_add->LeftColumnClass ?>"><?php echo $t101_ho_head_add->sign1->caption() ?><?php echo $t101_ho_head_add->sign1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_ho_head_add->RightColumnClass ?>"><div <?php echo $t101_ho_head_add->sign1->cellAttributes() ?>>
<span id="el_t101_ho_head_sign1">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_sign1"><?php echo EmptyValue(strval($t101_ho_head_add->sign1->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_add->sign1->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_add->sign1->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_add->sign1->ReadOnly || $t101_ho_head_add->sign1->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_sign1',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_add->sign1->Lookup->getParamTag($t101_ho_head_add, "p_x_sign1") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_sign1" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_add->sign1->displayValueSeparatorAttribute() ?>" name="x_sign1" id="x_sign1" value="<?php echo $t101_ho_head_add->sign1->CurrentValue ?>"<?php echo $t101_ho_head_add->sign1->editAttributes() ?>>
</span>
<?php echo $t101_ho_head_add->sign1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_add->sign2->Visible) { // sign2 ?>
	<div id="r_sign2" class="form-group row">
		<label id="elh_t101_ho_head_sign2" for="x_sign2" class="<?php echo $t101_ho_head_add->LeftColumnClass ?>"><?php echo $t101_ho_head_add->sign2->caption() ?><?php echo $t101_ho_head_add->sign2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_ho_head_add->RightColumnClass ?>"><div <?php echo $t101_ho_head_add->sign2->cellAttributes() ?>>
<span id="el_t101_ho_head_sign2">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_sign2"><?php echo EmptyValue(strval($t101_ho_head_add->sign2->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_add->sign2->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_add->sign2->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_add->sign2->ReadOnly || $t101_ho_head_add->sign2->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_sign2',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_add->sign2->Lookup->getParamTag($t101_ho_head_add, "p_x_sign2") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_sign2" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_add->sign2->displayValueSeparatorAttribute() ?>" name="x_sign2" id="x_sign2" value="<?php echo $t101_ho_head_add->sign2->CurrentValue ?>"<?php echo $t101_ho_head_add->sign2->editAttributes() ?>>
</span>
<?php echo $t101_ho_head_add->sign2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_add->sign3->Visible) { // sign3 ?>
	<div id="r_sign3" class="form-group row">
		<label id="elh_t101_ho_head_sign3" for="x_sign3" class="<?php echo $t101_ho_head_add->LeftColumnClass ?>"><?php echo $t101_ho_head_add->sign3->caption() ?><?php echo $t101_ho_head_add->sign3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_ho_head_add->RightColumnClass ?>"><div <?php echo $t101_ho_head_add->sign3->cellAttributes() ?>>
<span id="el_t101_ho_head_sign3">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_sign3"><?php echo EmptyValue(strval($t101_ho_head_add->sign3->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_add->sign3->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_add->sign3->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_add->sign3->ReadOnly || $t101_ho_head_add->sign3->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_sign3',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_add->sign3->Lookup->getParamTag($t101_ho_head_add, "p_x_sign3") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_sign3" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_add->sign3->displayValueSeparatorAttribute() ?>" name="x_sign3" id="x_sign3" value="<?php echo $t101_ho_head_add->sign3->CurrentValue ?>"<?php echo $t101_ho_head_add->sign3->editAttributes() ?>>
</span>
<?php echo $t101_ho_head_add->sign3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_add->sign4->Visible) { // sign4 ?>
	<div id="r_sign4" class="form-group row">
		<label id="elh_t101_ho_head_sign4" for="x_sign4" class="<?php echo $t101_ho_head_add->LeftColumnClass ?>"><?php echo $t101_ho_head_add->sign4->caption() ?><?php echo $t101_ho_head_add->sign4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_ho_head_add->RightColumnClass ?>"><div <?php echo $t101_ho_head_add->sign4->cellAttributes() ?>>
<span id="el_t101_ho_head_sign4">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_sign4"><?php echo EmptyValue(strval($t101_ho_head_add->sign4->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_add->sign4->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_add->sign4->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_add->sign4->ReadOnly || $t101_ho_head_add->sign4->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_sign4',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_add->sign4->Lookup->getParamTag($t101_ho_head_add, "p_x_sign4") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_sign4" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_add->sign4->displayValueSeparatorAttribute() ?>" name="x_sign4" id="x_sign4" value="<?php echo $t101_ho_head_add->sign4->CurrentValue ?>"<?php echo $t101_ho_head_add->sign4->editAttributes() ?>>
</span>
<?php echo $t101_ho_head_add->sign4->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php
	if (in_array("t102_ho_detail", explode(",", $t101_ho_head->getCurrentDetailTable())) && $t102_ho_detail->DetailAdd) {
?>
<?php if ($t101_ho_head->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("t102_ho_detail", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "t102_ho_detailgrid.php" ?>
<?php } ?>
<?php if (!$t101_ho_head_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t101_ho_head_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t101_ho_head_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t101_ho_head_add->showPageFooter();
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
$t101_ho_head_add->terminate();
?>