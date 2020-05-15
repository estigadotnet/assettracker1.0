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
$t101_opname_edit = new t101_opname_edit();

// Run the page
$t101_opname_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_opname_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft101_opnameedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	ft101_opnameedit = currentForm = new ew.Form("ft101_opnameedit", "edit");

	// Validate form
	ft101_opnameedit.validate = function() {
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
			<?php if ($t101_opname_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_opname_edit->id->caption(), $t101_opname_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_opname_edit->OpnameDate->Required) { ?>
				elm = this.getElements("x" + infix + "_OpnameDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_opname_edit->OpnameDate->caption(), $t101_opname_edit->OpnameDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OpnameDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t101_opname_edit->OpnameDate->errorMessage()) ?>");
			<?php if ($t101_opname_edit->property_id->Required) { ?>
				elm = this.getElements("x" + infix + "_property_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_opname_edit->property_id->caption(), $t101_opname_edit->property_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_property_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t101_opname_edit->property_id->errorMessage()) ?>");
			<?php if ($t101_opname_edit->location_id->Required) { ?>
				elm = this.getElements("x" + infix + "_location_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_opname_edit->location_id->caption(), $t101_opname_edit->location_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_location_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t101_opname_edit->location_id->errorMessage()) ?>");
			<?php if ($t101_opname_edit->asset_id->Required) { ?>
				elm = this.getElements("x" + infix + "_asset_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_opname_edit->asset_id->caption(), $t101_opname_edit->asset_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_asset_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t101_opname_edit->asset_id->errorMessage()) ?>");
			<?php if ($t101_opname_edit->signature_id->Required) { ?>
				elm = this.getElements("x" + infix + "_signature_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_opname_edit->signature_id->caption(), $t101_opname_edit->signature_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_signature_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t101_opname_edit->signature_id->errorMessage()) ?>");
			<?php if ($t101_opname_edit->Actual->Required) { ?>
				elm = this.getElements("x" + infix + "_Actual");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_opname_edit->Actual->caption(), $t101_opname_edit->Actual->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Actual");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t101_opname_edit->Actual->errorMessage()) ?>");
			<?php if ($t101_opname_edit->OpnameQty->Required) { ?>
				elm = this.getElements("x" + infix + "_OpnameQty");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_opname_edit->OpnameQty->caption(), $t101_opname_edit->OpnameQty->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OpnameQty");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t101_opname_edit->OpnameQty->errorMessage()) ?>");
			<?php if ($t101_opname_edit->Diff->Required) { ?>
				elm = this.getElements("x" + infix + "_Diff");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_opname_edit->Diff->caption(), $t101_opname_edit->Diff->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Diff");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t101_opname_edit->Diff->errorMessage()) ?>");
			<?php if ($t101_opname_edit->Remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_Remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_opname_edit->Remarks->caption(), $t101_opname_edit->Remarks->RequiredErrorMessage)) ?>");
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
	ft101_opnameedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft101_opnameedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft101_opnameedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t101_opname_edit->showPageHeader(); ?>
<?php
$t101_opname_edit->showMessage();
?>
<form name="ft101_opnameedit" id="ft101_opnameedit" class="<?php echo $t101_opname_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_opname">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t101_opname_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($t101_opname_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_t101_opname_id" class="<?php echo $t101_opname_edit->LeftColumnClass ?>"><?php echo $t101_opname_edit->id->caption() ?><?php echo $t101_opname_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_opname_edit->RightColumnClass ?>"><div <?php echo $t101_opname_edit->id->cellAttributes() ?>>
<span id="el_t101_opname_id">
<span<?php echo $t101_opname_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t101_opname_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="t101_opname" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t101_opname_edit->id->CurrentValue) ?>">
<?php echo $t101_opname_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_opname_edit->OpnameDate->Visible) { // OpnameDate ?>
	<div id="r_OpnameDate" class="form-group row">
		<label id="elh_t101_opname_OpnameDate" for="x_OpnameDate" class="<?php echo $t101_opname_edit->LeftColumnClass ?>"><?php echo $t101_opname_edit->OpnameDate->caption() ?><?php echo $t101_opname_edit->OpnameDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_opname_edit->RightColumnClass ?>"><div <?php echo $t101_opname_edit->OpnameDate->cellAttributes() ?>>
<span id="el_t101_opname_OpnameDate">
<input type="text" data-table="t101_opname" data-field="x_OpnameDate" name="x_OpnameDate" id="x_OpnameDate" maxlength="10" placeholder="<?php echo HtmlEncode($t101_opname_edit->OpnameDate->getPlaceHolder()) ?>" value="<?php echo $t101_opname_edit->OpnameDate->EditValue ?>"<?php echo $t101_opname_edit->OpnameDate->editAttributes() ?>>
<?php if (!$t101_opname_edit->OpnameDate->ReadOnly && !$t101_opname_edit->OpnameDate->Disabled && !isset($t101_opname_edit->OpnameDate->EditAttrs["readonly"]) && !isset($t101_opname_edit->OpnameDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft101_opnameedit", "datetimepicker"], function() {
	ew.createDateTimePicker("ft101_opnameedit", "x_OpnameDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $t101_opname_edit->OpnameDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_opname_edit->property_id->Visible) { // property_id ?>
	<div id="r_property_id" class="form-group row">
		<label id="elh_t101_opname_property_id" for="x_property_id" class="<?php echo $t101_opname_edit->LeftColumnClass ?>"><?php echo $t101_opname_edit->property_id->caption() ?><?php echo $t101_opname_edit->property_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_opname_edit->RightColumnClass ?>"><div <?php echo $t101_opname_edit->property_id->cellAttributes() ?>>
<span id="el_t101_opname_property_id">
<input type="text" data-table="t101_opname" data-field="x_property_id" name="x_property_id" id="x_property_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t101_opname_edit->property_id->getPlaceHolder()) ?>" value="<?php echo $t101_opname_edit->property_id->EditValue ?>"<?php echo $t101_opname_edit->property_id->editAttributes() ?>>
</span>
<?php echo $t101_opname_edit->property_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_opname_edit->location_id->Visible) { // location_id ?>
	<div id="r_location_id" class="form-group row">
		<label id="elh_t101_opname_location_id" for="x_location_id" class="<?php echo $t101_opname_edit->LeftColumnClass ?>"><?php echo $t101_opname_edit->location_id->caption() ?><?php echo $t101_opname_edit->location_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_opname_edit->RightColumnClass ?>"><div <?php echo $t101_opname_edit->location_id->cellAttributes() ?>>
<span id="el_t101_opname_location_id">
<input type="text" data-table="t101_opname" data-field="x_location_id" name="x_location_id" id="x_location_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t101_opname_edit->location_id->getPlaceHolder()) ?>" value="<?php echo $t101_opname_edit->location_id->EditValue ?>"<?php echo $t101_opname_edit->location_id->editAttributes() ?>>
</span>
<?php echo $t101_opname_edit->location_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_opname_edit->asset_id->Visible) { // asset_id ?>
	<div id="r_asset_id" class="form-group row">
		<label id="elh_t101_opname_asset_id" for="x_asset_id" class="<?php echo $t101_opname_edit->LeftColumnClass ?>"><?php echo $t101_opname_edit->asset_id->caption() ?><?php echo $t101_opname_edit->asset_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_opname_edit->RightColumnClass ?>"><div <?php echo $t101_opname_edit->asset_id->cellAttributes() ?>>
<span id="el_t101_opname_asset_id">
<input type="text" data-table="t101_opname" data-field="x_asset_id" name="x_asset_id" id="x_asset_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t101_opname_edit->asset_id->getPlaceHolder()) ?>" value="<?php echo $t101_opname_edit->asset_id->EditValue ?>"<?php echo $t101_opname_edit->asset_id->editAttributes() ?>>
</span>
<?php echo $t101_opname_edit->asset_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_opname_edit->signature_id->Visible) { // signature_id ?>
	<div id="r_signature_id" class="form-group row">
		<label id="elh_t101_opname_signature_id" for="x_signature_id" class="<?php echo $t101_opname_edit->LeftColumnClass ?>"><?php echo $t101_opname_edit->signature_id->caption() ?><?php echo $t101_opname_edit->signature_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_opname_edit->RightColumnClass ?>"><div <?php echo $t101_opname_edit->signature_id->cellAttributes() ?>>
<span id="el_t101_opname_signature_id">
<input type="text" data-table="t101_opname" data-field="x_signature_id" name="x_signature_id" id="x_signature_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t101_opname_edit->signature_id->getPlaceHolder()) ?>" value="<?php echo $t101_opname_edit->signature_id->EditValue ?>"<?php echo $t101_opname_edit->signature_id->editAttributes() ?>>
</span>
<?php echo $t101_opname_edit->signature_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_opname_edit->Actual->Visible) { // Actual ?>
	<div id="r_Actual" class="form-group row">
		<label id="elh_t101_opname_Actual" for="x_Actual" class="<?php echo $t101_opname_edit->LeftColumnClass ?>"><?php echo $t101_opname_edit->Actual->caption() ?><?php echo $t101_opname_edit->Actual->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_opname_edit->RightColumnClass ?>"><div <?php echo $t101_opname_edit->Actual->cellAttributes() ?>>
<span id="el_t101_opname_Actual">
<input type="text" data-table="t101_opname" data-field="x_Actual" name="x_Actual" id="x_Actual" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t101_opname_edit->Actual->getPlaceHolder()) ?>" value="<?php echo $t101_opname_edit->Actual->EditValue ?>"<?php echo $t101_opname_edit->Actual->editAttributes() ?>>
</span>
<?php echo $t101_opname_edit->Actual->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_opname_edit->OpnameQty->Visible) { // OpnameQty ?>
	<div id="r_OpnameQty" class="form-group row">
		<label id="elh_t101_opname_OpnameQty" for="x_OpnameQty" class="<?php echo $t101_opname_edit->LeftColumnClass ?>"><?php echo $t101_opname_edit->OpnameQty->caption() ?><?php echo $t101_opname_edit->OpnameQty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_opname_edit->RightColumnClass ?>"><div <?php echo $t101_opname_edit->OpnameQty->cellAttributes() ?>>
<span id="el_t101_opname_OpnameQty">
<input type="text" data-table="t101_opname" data-field="x_OpnameQty" name="x_OpnameQty" id="x_OpnameQty" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t101_opname_edit->OpnameQty->getPlaceHolder()) ?>" value="<?php echo $t101_opname_edit->OpnameQty->EditValue ?>"<?php echo $t101_opname_edit->OpnameQty->editAttributes() ?>>
</span>
<?php echo $t101_opname_edit->OpnameQty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_opname_edit->Diff->Visible) { // Diff ?>
	<div id="r_Diff" class="form-group row">
		<label id="elh_t101_opname_Diff" for="x_Diff" class="<?php echo $t101_opname_edit->LeftColumnClass ?>"><?php echo $t101_opname_edit->Diff->caption() ?><?php echo $t101_opname_edit->Diff->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_opname_edit->RightColumnClass ?>"><div <?php echo $t101_opname_edit->Diff->cellAttributes() ?>>
<span id="el_t101_opname_Diff">
<input type="text" data-table="t101_opname" data-field="x_Diff" name="x_Diff" id="x_Diff" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t101_opname_edit->Diff->getPlaceHolder()) ?>" value="<?php echo $t101_opname_edit->Diff->EditValue ?>"<?php echo $t101_opname_edit->Diff->editAttributes() ?>>
</span>
<?php echo $t101_opname_edit->Diff->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_opname_edit->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_t101_opname_Remarks" for="x_Remarks" class="<?php echo $t101_opname_edit->LeftColumnClass ?>"><?php echo $t101_opname_edit->Remarks->caption() ?><?php echo $t101_opname_edit->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_opname_edit->RightColumnClass ?>"><div <?php echo $t101_opname_edit->Remarks->cellAttributes() ?>>
<span id="el_t101_opname_Remarks">
<textarea data-table="t101_opname" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" cols="35" rows="4" placeholder="<?php echo HtmlEncode($t101_opname_edit->Remarks->getPlaceHolder()) ?>"<?php echo $t101_opname_edit->Remarks->editAttributes() ?>><?php echo $t101_opname_edit->Remarks->EditValue ?></textarea>
</span>
<?php echo $t101_opname_edit->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t101_opname_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t101_opname_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t101_opname_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t101_opname_edit->showPageFooter();
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
$t101_opname_edit->terminate();
?>