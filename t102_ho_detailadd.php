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
$t102_ho_detail_add = new t102_ho_detail_add();

// Run the page
$t102_ho_detail_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t102_ho_detail_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft102_ho_detailadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	ft102_ho_detailadd = currentForm = new ew.Form("ft102_ho_detailadd", "add");

	// Validate form
	ft102_ho_detailadd.validate = function() {
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
			<?php if ($t102_ho_detail_add->hohead_id->Required) { ?>
				elm = this.getElements("x" + infix + "_hohead_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_ho_detail_add->hohead_id->caption(), $t102_ho_detail_add->hohead_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_hohead_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t102_ho_detail_add->hohead_id->errorMessage()) ?>");
			<?php if ($t102_ho_detail_add->asset_id->Required) { ?>
				elm = this.getElements("x" + infix + "_asset_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_ho_detail_add->asset_id->caption(), $t102_ho_detail_add->asset_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_asset_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t102_ho_detail_add->asset_id->errorMessage()) ?>");
			<?php if ($t102_ho_detail_add->proc_date->Required) { ?>
				elm = this.getElements("x" + infix + "_proc_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_ho_detail_add->proc_date->caption(), $t102_ho_detail_add->proc_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_proc_date");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t102_ho_detail_add->proc_date->errorMessage()) ?>");
			<?php if ($t102_ho_detail_add->proc_ccost->Required) { ?>
				elm = this.getElements("x" + infix + "_proc_ccost");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_ho_detail_add->proc_ccost->caption(), $t102_ho_detail_add->proc_ccost->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_proc_ccost");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t102_ho_detail_add->proc_ccost->errorMessage()) ?>");
			<?php if ($t102_ho_detail_add->dep_amount->Required) { ?>
				elm = this.getElements("x" + infix + "_dep_amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_ho_detail_add->dep_amount->caption(), $t102_ho_detail_add->dep_amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_dep_amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t102_ho_detail_add->dep_amount->errorMessage()) ?>");
			<?php if ($t102_ho_detail_add->dep_ytd->Required) { ?>
				elm = this.getElements("x" + infix + "_dep_ytd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_ho_detail_add->dep_ytd->caption(), $t102_ho_detail_add->dep_ytd->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_dep_ytd");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t102_ho_detail_add->dep_ytd->errorMessage()) ?>");
			<?php if ($t102_ho_detail_add->nb_val->Required) { ?>
				elm = this.getElements("x" + infix + "_nb_val");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_ho_detail_add->nb_val->caption(), $t102_ho_detail_add->nb_val->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_nb_val");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t102_ho_detail_add->nb_val->errorMessage()) ?>");
			<?php if ($t102_ho_detail_add->remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_ho_detail_add->remarks->caption(), $t102_ho_detail_add->remarks->RequiredErrorMessage)) ?>");
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
	ft102_ho_detailadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft102_ho_detailadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft102_ho_detailadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t102_ho_detail_add->showPageHeader(); ?>
<?php
$t102_ho_detail_add->showMessage();
?>
<form name="ft102_ho_detailadd" id="ft102_ho_detailadd" class="<?php echo $t102_ho_detail_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t102_ho_detail">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t102_ho_detail_add->IsModal ?>">
<?php if ($t102_ho_detail->getCurrentMasterTable() == "t101_ho_head") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="t101_ho_head">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($t102_ho_detail_add->hohead_id->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($t102_ho_detail_add->hohead_id->Visible) { // hohead_id ?>
	<div id="r_hohead_id" class="form-group row">
		<label id="elh_t102_ho_detail_hohead_id" for="x_hohead_id" class="<?php echo $t102_ho_detail_add->LeftColumnClass ?>"><?php echo $t102_ho_detail_add->hohead_id->caption() ?><?php echo $t102_ho_detail_add->hohead_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t102_ho_detail_add->RightColumnClass ?>"><div <?php echo $t102_ho_detail_add->hohead_id->cellAttributes() ?>>
<?php if ($t102_ho_detail_add->hohead_id->getSessionValue() != "") { ?>
<span id="el_t102_ho_detail_hohead_id">
<span<?php echo $t102_ho_detail_add->hohead_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t102_ho_detail_add->hohead_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_hohead_id" name="x_hohead_id" value="<?php echo HtmlEncode($t102_ho_detail_add->hohead_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el_t102_ho_detail_hohead_id">
<input type="text" data-table="t102_ho_detail" data-field="x_hohead_id" name="x_hohead_id" id="x_hohead_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t102_ho_detail_add->hohead_id->getPlaceHolder()) ?>" value="<?php echo $t102_ho_detail_add->hohead_id->EditValue ?>"<?php echo $t102_ho_detail_add->hohead_id->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $t102_ho_detail_add->hohead_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t102_ho_detail_add->asset_id->Visible) { // asset_id ?>
	<div id="r_asset_id" class="form-group row">
		<label id="elh_t102_ho_detail_asset_id" for="x_asset_id" class="<?php echo $t102_ho_detail_add->LeftColumnClass ?>"><?php echo $t102_ho_detail_add->asset_id->caption() ?><?php echo $t102_ho_detail_add->asset_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t102_ho_detail_add->RightColumnClass ?>"><div <?php echo $t102_ho_detail_add->asset_id->cellAttributes() ?>>
<span id="el_t102_ho_detail_asset_id">
<input type="text" data-table="t102_ho_detail" data-field="x_asset_id" name="x_asset_id" id="x_asset_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t102_ho_detail_add->asset_id->getPlaceHolder()) ?>" value="<?php echo $t102_ho_detail_add->asset_id->EditValue ?>"<?php echo $t102_ho_detail_add->asset_id->editAttributes() ?>>
</span>
<?php echo $t102_ho_detail_add->asset_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t102_ho_detail_add->proc_date->Visible) { // proc_date ?>
	<div id="r_proc_date" class="form-group row">
		<label id="elh_t102_ho_detail_proc_date" for="x_proc_date" class="<?php echo $t102_ho_detail_add->LeftColumnClass ?>"><?php echo $t102_ho_detail_add->proc_date->caption() ?><?php echo $t102_ho_detail_add->proc_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t102_ho_detail_add->RightColumnClass ?>"><div <?php echo $t102_ho_detail_add->proc_date->cellAttributes() ?>>
<span id="el_t102_ho_detail_proc_date">
<input type="text" data-table="t102_ho_detail" data-field="x_proc_date" name="x_proc_date" id="x_proc_date" maxlength="10" placeholder="<?php echo HtmlEncode($t102_ho_detail_add->proc_date->getPlaceHolder()) ?>" value="<?php echo $t102_ho_detail_add->proc_date->EditValue ?>"<?php echo $t102_ho_detail_add->proc_date->editAttributes() ?>>
<?php if (!$t102_ho_detail_add->proc_date->ReadOnly && !$t102_ho_detail_add->proc_date->Disabled && !isset($t102_ho_detail_add->proc_date->EditAttrs["readonly"]) && !isset($t102_ho_detail_add->proc_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft102_ho_detailadd", "datetimepicker"], function() {
	ew.createDateTimePicker("ft102_ho_detailadd", "x_proc_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $t102_ho_detail_add->proc_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t102_ho_detail_add->proc_ccost->Visible) { // proc_ccost ?>
	<div id="r_proc_ccost" class="form-group row">
		<label id="elh_t102_ho_detail_proc_ccost" for="x_proc_ccost" class="<?php echo $t102_ho_detail_add->LeftColumnClass ?>"><?php echo $t102_ho_detail_add->proc_ccost->caption() ?><?php echo $t102_ho_detail_add->proc_ccost->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t102_ho_detail_add->RightColumnClass ?>"><div <?php echo $t102_ho_detail_add->proc_ccost->cellAttributes() ?>>
<span id="el_t102_ho_detail_proc_ccost">
<input type="text" data-table="t102_ho_detail" data-field="x_proc_ccost" name="x_proc_ccost" id="x_proc_ccost" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t102_ho_detail_add->proc_ccost->getPlaceHolder()) ?>" value="<?php echo $t102_ho_detail_add->proc_ccost->EditValue ?>"<?php echo $t102_ho_detail_add->proc_ccost->editAttributes() ?>>
</span>
<?php echo $t102_ho_detail_add->proc_ccost->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t102_ho_detail_add->dep_amount->Visible) { // dep_amount ?>
	<div id="r_dep_amount" class="form-group row">
		<label id="elh_t102_ho_detail_dep_amount" for="x_dep_amount" class="<?php echo $t102_ho_detail_add->LeftColumnClass ?>"><?php echo $t102_ho_detail_add->dep_amount->caption() ?><?php echo $t102_ho_detail_add->dep_amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t102_ho_detail_add->RightColumnClass ?>"><div <?php echo $t102_ho_detail_add->dep_amount->cellAttributes() ?>>
<span id="el_t102_ho_detail_dep_amount">
<input type="text" data-table="t102_ho_detail" data-field="x_dep_amount" name="x_dep_amount" id="x_dep_amount" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t102_ho_detail_add->dep_amount->getPlaceHolder()) ?>" value="<?php echo $t102_ho_detail_add->dep_amount->EditValue ?>"<?php echo $t102_ho_detail_add->dep_amount->editAttributes() ?>>
</span>
<?php echo $t102_ho_detail_add->dep_amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t102_ho_detail_add->dep_ytd->Visible) { // dep_ytd ?>
	<div id="r_dep_ytd" class="form-group row">
		<label id="elh_t102_ho_detail_dep_ytd" for="x_dep_ytd" class="<?php echo $t102_ho_detail_add->LeftColumnClass ?>"><?php echo $t102_ho_detail_add->dep_ytd->caption() ?><?php echo $t102_ho_detail_add->dep_ytd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t102_ho_detail_add->RightColumnClass ?>"><div <?php echo $t102_ho_detail_add->dep_ytd->cellAttributes() ?>>
<span id="el_t102_ho_detail_dep_ytd">
<input type="text" data-table="t102_ho_detail" data-field="x_dep_ytd" name="x_dep_ytd" id="x_dep_ytd" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t102_ho_detail_add->dep_ytd->getPlaceHolder()) ?>" value="<?php echo $t102_ho_detail_add->dep_ytd->EditValue ?>"<?php echo $t102_ho_detail_add->dep_ytd->editAttributes() ?>>
</span>
<?php echo $t102_ho_detail_add->dep_ytd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t102_ho_detail_add->nb_val->Visible) { // nb_val ?>
	<div id="r_nb_val" class="form-group row">
		<label id="elh_t102_ho_detail_nb_val" for="x_nb_val" class="<?php echo $t102_ho_detail_add->LeftColumnClass ?>"><?php echo $t102_ho_detail_add->nb_val->caption() ?><?php echo $t102_ho_detail_add->nb_val->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t102_ho_detail_add->RightColumnClass ?>"><div <?php echo $t102_ho_detail_add->nb_val->cellAttributes() ?>>
<span id="el_t102_ho_detail_nb_val">
<input type="text" data-table="t102_ho_detail" data-field="x_nb_val" name="x_nb_val" id="x_nb_val" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t102_ho_detail_add->nb_val->getPlaceHolder()) ?>" value="<?php echo $t102_ho_detail_add->nb_val->EditValue ?>"<?php echo $t102_ho_detail_add->nb_val->editAttributes() ?>>
</span>
<?php echo $t102_ho_detail_add->nb_val->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t102_ho_detail_add->remarks->Visible) { // remarks ?>
	<div id="r_remarks" class="form-group row">
		<label id="elh_t102_ho_detail_remarks" for="x_remarks" class="<?php echo $t102_ho_detail_add->LeftColumnClass ?>"><?php echo $t102_ho_detail_add->remarks->caption() ?><?php echo $t102_ho_detail_add->remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t102_ho_detail_add->RightColumnClass ?>"><div <?php echo $t102_ho_detail_add->remarks->cellAttributes() ?>>
<span id="el_t102_ho_detail_remarks">
<textarea data-table="t102_ho_detail" data-field="x_remarks" name="x_remarks" id="x_remarks" cols="35" rows="4" placeholder="<?php echo HtmlEncode($t102_ho_detail_add->remarks->getPlaceHolder()) ?>"<?php echo $t102_ho_detail_add->remarks->editAttributes() ?>><?php echo $t102_ho_detail_add->remarks->EditValue ?></textarea>
</span>
<?php echo $t102_ho_detail_add->remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t102_ho_detail_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t102_ho_detail_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t102_ho_detail_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t102_ho_detail_add->showPageFooter();
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
$t102_ho_detail_add->terminate();
?>