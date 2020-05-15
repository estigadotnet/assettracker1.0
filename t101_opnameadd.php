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
$t101_opname_add = new t101_opname_add();

// Run the page
$t101_opname_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_opname_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft101_opnameadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	ft101_opnameadd = currentForm = new ew.Form("ft101_opnameadd", "add");

	// Validate form
	ft101_opnameadd.validate = function() {
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
			<?php if ($t101_opname_add->OpnameDate->Required) { ?>
				elm = this.getElements("x" + infix + "_OpnameDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_opname_add->OpnameDate->caption(), $t101_opname_add->OpnameDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OpnameDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t101_opname_add->OpnameDate->errorMessage()) ?>");
			<?php if ($t101_opname_add->property_id->Required) { ?>
				elm = this.getElements("x" + infix + "_property_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_opname_add->property_id->caption(), $t101_opname_add->property_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_property_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t101_opname_add->property_id->errorMessage()) ?>");
			<?php if ($t101_opname_add->location_id->Required) { ?>
				elm = this.getElements("x" + infix + "_location_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_opname_add->location_id->caption(), $t101_opname_add->location_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_location_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t101_opname_add->location_id->errorMessage()) ?>");
			<?php if ($t101_opname_add->asset_id->Required) { ?>
				elm = this.getElements("x" + infix + "_asset_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_opname_add->asset_id->caption(), $t101_opname_add->asset_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_asset_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t101_opname_add->asset_id->errorMessage()) ?>");
			<?php if ($t101_opname_add->signature_id->Required) { ?>
				elm = this.getElements("x" + infix + "_signature_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_opname_add->signature_id->caption(), $t101_opname_add->signature_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_signature_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t101_opname_add->signature_id->errorMessage()) ?>");
			<?php if ($t101_opname_add->Actual->Required) { ?>
				elm = this.getElements("x" + infix + "_Actual");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_opname_add->Actual->caption(), $t101_opname_add->Actual->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Actual");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t101_opname_add->Actual->errorMessage()) ?>");
			<?php if ($t101_opname_add->OpnameQty->Required) { ?>
				elm = this.getElements("x" + infix + "_OpnameQty");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_opname_add->OpnameQty->caption(), $t101_opname_add->OpnameQty->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OpnameQty");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t101_opname_add->OpnameQty->errorMessage()) ?>");
			<?php if ($t101_opname_add->Diff->Required) { ?>
				elm = this.getElements("x" + infix + "_Diff");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_opname_add->Diff->caption(), $t101_opname_add->Diff->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Diff");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t101_opname_add->Diff->errorMessage()) ?>");
			<?php if ($t101_opname_add->Remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_Remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_opname_add->Remarks->caption(), $t101_opname_add->Remarks->RequiredErrorMessage)) ?>");
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
	ft101_opnameadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft101_opnameadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft101_opnameadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t101_opname_add->showPageHeader(); ?>
<?php
$t101_opname_add->showMessage();
?>
<form name="ft101_opnameadd" id="ft101_opnameadd" class="<?php echo $t101_opname_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_opname">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t101_opname_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($t101_opname_add->OpnameDate->Visible) { // OpnameDate ?>
	<div id="r_OpnameDate" class="form-group row">
		<label id="elh_t101_opname_OpnameDate" for="x_OpnameDate" class="<?php echo $t101_opname_add->LeftColumnClass ?>"><?php echo $t101_opname_add->OpnameDate->caption() ?><?php echo $t101_opname_add->OpnameDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_opname_add->RightColumnClass ?>"><div <?php echo $t101_opname_add->OpnameDate->cellAttributes() ?>>
<span id="el_t101_opname_OpnameDate">
<input type="text" data-table="t101_opname" data-field="x_OpnameDate" name="x_OpnameDate" id="x_OpnameDate" maxlength="10" placeholder="<?php echo HtmlEncode($t101_opname_add->OpnameDate->getPlaceHolder()) ?>" value="<?php echo $t101_opname_add->OpnameDate->EditValue ?>"<?php echo $t101_opname_add->OpnameDate->editAttributes() ?>>
<?php if (!$t101_opname_add->OpnameDate->ReadOnly && !$t101_opname_add->OpnameDate->Disabled && !isset($t101_opname_add->OpnameDate->EditAttrs["readonly"]) && !isset($t101_opname_add->OpnameDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft101_opnameadd", "datetimepicker"], function() {
	ew.createDateTimePicker("ft101_opnameadd", "x_OpnameDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $t101_opname_add->OpnameDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_opname_add->property_id->Visible) { // property_id ?>
	<div id="r_property_id" class="form-group row">
		<label id="elh_t101_opname_property_id" for="x_property_id" class="<?php echo $t101_opname_add->LeftColumnClass ?>"><?php echo $t101_opname_add->property_id->caption() ?><?php echo $t101_opname_add->property_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_opname_add->RightColumnClass ?>"><div <?php echo $t101_opname_add->property_id->cellAttributes() ?>>
<span id="el_t101_opname_property_id">
<input type="text" data-table="t101_opname" data-field="x_property_id" name="x_property_id" id="x_property_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t101_opname_add->property_id->getPlaceHolder()) ?>" value="<?php echo $t101_opname_add->property_id->EditValue ?>"<?php echo $t101_opname_add->property_id->editAttributes() ?>>
</span>
<?php echo $t101_opname_add->property_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_opname_add->location_id->Visible) { // location_id ?>
	<div id="r_location_id" class="form-group row">
		<label id="elh_t101_opname_location_id" for="x_location_id" class="<?php echo $t101_opname_add->LeftColumnClass ?>"><?php echo $t101_opname_add->location_id->caption() ?><?php echo $t101_opname_add->location_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_opname_add->RightColumnClass ?>"><div <?php echo $t101_opname_add->location_id->cellAttributes() ?>>
<span id="el_t101_opname_location_id">
<input type="text" data-table="t101_opname" data-field="x_location_id" name="x_location_id" id="x_location_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t101_opname_add->location_id->getPlaceHolder()) ?>" value="<?php echo $t101_opname_add->location_id->EditValue ?>"<?php echo $t101_opname_add->location_id->editAttributes() ?>>
</span>
<?php echo $t101_opname_add->location_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_opname_add->asset_id->Visible) { // asset_id ?>
	<div id="r_asset_id" class="form-group row">
		<label id="elh_t101_opname_asset_id" for="x_asset_id" class="<?php echo $t101_opname_add->LeftColumnClass ?>"><?php echo $t101_opname_add->asset_id->caption() ?><?php echo $t101_opname_add->asset_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_opname_add->RightColumnClass ?>"><div <?php echo $t101_opname_add->asset_id->cellAttributes() ?>>
<span id="el_t101_opname_asset_id">
<input type="text" data-table="t101_opname" data-field="x_asset_id" name="x_asset_id" id="x_asset_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t101_opname_add->asset_id->getPlaceHolder()) ?>" value="<?php echo $t101_opname_add->asset_id->EditValue ?>"<?php echo $t101_opname_add->asset_id->editAttributes() ?>>
</span>
<?php echo $t101_opname_add->asset_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_opname_add->signature_id->Visible) { // signature_id ?>
	<div id="r_signature_id" class="form-group row">
		<label id="elh_t101_opname_signature_id" for="x_signature_id" class="<?php echo $t101_opname_add->LeftColumnClass ?>"><?php echo $t101_opname_add->signature_id->caption() ?><?php echo $t101_opname_add->signature_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_opname_add->RightColumnClass ?>"><div <?php echo $t101_opname_add->signature_id->cellAttributes() ?>>
<span id="el_t101_opname_signature_id">
<input type="text" data-table="t101_opname" data-field="x_signature_id" name="x_signature_id" id="x_signature_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t101_opname_add->signature_id->getPlaceHolder()) ?>" value="<?php echo $t101_opname_add->signature_id->EditValue ?>"<?php echo $t101_opname_add->signature_id->editAttributes() ?>>
</span>
<?php echo $t101_opname_add->signature_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_opname_add->Actual->Visible) { // Actual ?>
	<div id="r_Actual" class="form-group row">
		<label id="elh_t101_opname_Actual" for="x_Actual" class="<?php echo $t101_opname_add->LeftColumnClass ?>"><?php echo $t101_opname_add->Actual->caption() ?><?php echo $t101_opname_add->Actual->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_opname_add->RightColumnClass ?>"><div <?php echo $t101_opname_add->Actual->cellAttributes() ?>>
<span id="el_t101_opname_Actual">
<input type="text" data-table="t101_opname" data-field="x_Actual" name="x_Actual" id="x_Actual" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t101_opname_add->Actual->getPlaceHolder()) ?>" value="<?php echo $t101_opname_add->Actual->EditValue ?>"<?php echo $t101_opname_add->Actual->editAttributes() ?>>
</span>
<?php echo $t101_opname_add->Actual->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_opname_add->OpnameQty->Visible) { // OpnameQty ?>
	<div id="r_OpnameQty" class="form-group row">
		<label id="elh_t101_opname_OpnameQty" for="x_OpnameQty" class="<?php echo $t101_opname_add->LeftColumnClass ?>"><?php echo $t101_opname_add->OpnameQty->caption() ?><?php echo $t101_opname_add->OpnameQty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_opname_add->RightColumnClass ?>"><div <?php echo $t101_opname_add->OpnameQty->cellAttributes() ?>>
<span id="el_t101_opname_OpnameQty">
<input type="text" data-table="t101_opname" data-field="x_OpnameQty" name="x_OpnameQty" id="x_OpnameQty" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t101_opname_add->OpnameQty->getPlaceHolder()) ?>" value="<?php echo $t101_opname_add->OpnameQty->EditValue ?>"<?php echo $t101_opname_add->OpnameQty->editAttributes() ?>>
</span>
<?php echo $t101_opname_add->OpnameQty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_opname_add->Diff->Visible) { // Diff ?>
	<div id="r_Diff" class="form-group row">
		<label id="elh_t101_opname_Diff" for="x_Diff" class="<?php echo $t101_opname_add->LeftColumnClass ?>"><?php echo $t101_opname_add->Diff->caption() ?><?php echo $t101_opname_add->Diff->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_opname_add->RightColumnClass ?>"><div <?php echo $t101_opname_add->Diff->cellAttributes() ?>>
<span id="el_t101_opname_Diff">
<input type="text" data-table="t101_opname" data-field="x_Diff" name="x_Diff" id="x_Diff" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t101_opname_add->Diff->getPlaceHolder()) ?>" value="<?php echo $t101_opname_add->Diff->EditValue ?>"<?php echo $t101_opname_add->Diff->editAttributes() ?>>
</span>
<?php echo $t101_opname_add->Diff->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_opname_add->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_t101_opname_Remarks" for="x_Remarks" class="<?php echo $t101_opname_add->LeftColumnClass ?>"><?php echo $t101_opname_add->Remarks->caption() ?><?php echo $t101_opname_add->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_opname_add->RightColumnClass ?>"><div <?php echo $t101_opname_add->Remarks->cellAttributes() ?>>
<span id="el_t101_opname_Remarks">
<textarea data-table="t101_opname" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" cols="35" rows="4" placeholder="<?php echo HtmlEncode($t101_opname_add->Remarks->getPlaceHolder()) ?>"<?php echo $t101_opname_add->Remarks->editAttributes() ?>><?php echo $t101_opname_add->Remarks->EditValue ?></textarea>
</span>
<?php echo $t101_opname_add->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t101_opname_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t101_opname_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t101_opname_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t101_opname_add->showPageFooter();
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
$t101_opname_add->terminate();
?>