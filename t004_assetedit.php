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
$t004_asset_edit = new t004_asset_edit();

// Run the page
$t004_asset_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t004_asset_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft004_assetedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	ft004_assetedit = currentForm = new ew.Form("ft004_assetedit", "edit");

	// Validate form
	ft004_assetedit.validate = function() {
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
			<?php if ($t004_asset_edit->property_id->Required) { ?>
				elm = this.getElements("x" + infix + "_property_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_asset_edit->property_id->caption(), $t004_asset_edit->property_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t004_asset_edit->location_id->Required) { ?>
				elm = this.getElements("x" + infix + "_location_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_asset_edit->location_id->caption(), $t004_asset_edit->location_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t004_asset_edit->signature_id->Required) { ?>
				elm = this.getElements("x" + infix + "_signature_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_asset_edit->signature_id->caption(), $t004_asset_edit->signature_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t004_asset_edit->Asset->Required) { ?>
				elm = this.getElements("x" + infix + "_Asset");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_asset_edit->Asset->caption(), $t004_asset_edit->Asset->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t004_asset_edit->Periode->Required) { ?>
				elm = this.getElements("x" + infix + "_Periode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_asset_edit->Periode->caption(), $t004_asset_edit->Periode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Periode");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t004_asset_edit->Periode->errorMessage()) ?>");
			<?php if ($t004_asset_edit->Qty->Required) { ?>
				elm = this.getElements("x" + infix + "_Qty");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_asset_edit->Qty->caption(), $t004_asset_edit->Qty->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Qty");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t004_asset_edit->Qty->errorMessage()) ?>");

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
	ft004_assetedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft004_assetedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft004_assetedit.lists["x_property_id"] = <?php echo $t004_asset_edit->property_id->Lookup->toClientList($t004_asset_edit) ?>;
	ft004_assetedit.lists["x_property_id"].options = <?php echo JsonEncode($t004_asset_edit->property_id->lookupOptions()) ?>;
	ft004_assetedit.lists["x_location_id"] = <?php echo $t004_asset_edit->location_id->Lookup->toClientList($t004_asset_edit) ?>;
	ft004_assetedit.lists["x_location_id"].options = <?php echo JsonEncode($t004_asset_edit->location_id->lookupOptions()) ?>;
	ft004_assetedit.lists["x_signature_id"] = <?php echo $t004_asset_edit->signature_id->Lookup->toClientList($t004_asset_edit) ?>;
	ft004_assetedit.lists["x_signature_id"].options = <?php echo JsonEncode($t004_asset_edit->signature_id->lookupOptions()) ?>;
	loadjs.done("ft004_assetedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t004_asset_edit->showPageHeader(); ?>
<?php
$t004_asset_edit->showMessage();
?>
<form name="ft004_assetedit" id="ft004_assetedit" class="<?php echo $t004_asset_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t004_asset">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t004_asset_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($t004_asset_edit->property_id->Visible) { // property_id ?>
	<div id="r_property_id" class="form-group row">
		<label id="elh_t004_asset_property_id" for="x_property_id" class="<?php echo $t004_asset_edit->LeftColumnClass ?>"><?php echo $t004_asset_edit->property_id->caption() ?><?php echo $t004_asset_edit->property_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t004_asset_edit->RightColumnClass ?>"><div <?php echo $t004_asset_edit->property_id->cellAttributes() ?>>
<span id="el_t004_asset_property_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_property_id"><?php echo EmptyValue(strval($t004_asset_edit->property_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_asset_edit->property_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_asset_edit->property_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_asset_edit->property_id->ReadOnly || $t004_asset_edit->property_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_property_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t004_asset_edit->property_id->Lookup->getParamTag($t004_asset_edit, "p_x_property_id") ?>
<input type="hidden" data-table="t004_asset" data-field="x_property_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_asset_edit->property_id->displayValueSeparatorAttribute() ?>" name="x_property_id" id="x_property_id" value="<?php echo $t004_asset_edit->property_id->CurrentValue ?>"<?php echo $t004_asset_edit->property_id->editAttributes() ?>>
</span>
<?php echo $t004_asset_edit->property_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t004_asset_edit->location_id->Visible) { // location_id ?>
	<div id="r_location_id" class="form-group row">
		<label id="elh_t004_asset_location_id" for="x_location_id" class="<?php echo $t004_asset_edit->LeftColumnClass ?>"><?php echo $t004_asset_edit->location_id->caption() ?><?php echo $t004_asset_edit->location_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t004_asset_edit->RightColumnClass ?>"><div <?php echo $t004_asset_edit->location_id->cellAttributes() ?>>
<span id="el_t004_asset_location_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_location_id"><?php echo EmptyValue(strval($t004_asset_edit->location_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_asset_edit->location_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_asset_edit->location_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_asset_edit->location_id->ReadOnly || $t004_asset_edit->location_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_location_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t004_asset_edit->location_id->Lookup->getParamTag($t004_asset_edit, "p_x_location_id") ?>
<input type="hidden" data-table="t004_asset" data-field="x_location_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_asset_edit->location_id->displayValueSeparatorAttribute() ?>" name="x_location_id" id="x_location_id" value="<?php echo $t004_asset_edit->location_id->CurrentValue ?>"<?php echo $t004_asset_edit->location_id->editAttributes() ?>>
</span>
<?php echo $t004_asset_edit->location_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t004_asset_edit->signature_id->Visible) { // signature_id ?>
	<div id="r_signature_id" class="form-group row">
		<label id="elh_t004_asset_signature_id" for="x_signature_id" class="<?php echo $t004_asset_edit->LeftColumnClass ?>"><?php echo $t004_asset_edit->signature_id->caption() ?><?php echo $t004_asset_edit->signature_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t004_asset_edit->RightColumnClass ?>"><div <?php echo $t004_asset_edit->signature_id->cellAttributes() ?>>
<span id="el_t004_asset_signature_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_signature_id"><?php echo EmptyValue(strval($t004_asset_edit->signature_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_asset_edit->signature_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_asset_edit->signature_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_asset_edit->signature_id->ReadOnly || $t004_asset_edit->signature_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_signature_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t004_asset_edit->signature_id->Lookup->getParamTag($t004_asset_edit, "p_x_signature_id") ?>
<input type="hidden" data-table="t004_asset" data-field="x_signature_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_asset_edit->signature_id->displayValueSeparatorAttribute() ?>" name="x_signature_id" id="x_signature_id" value="<?php echo $t004_asset_edit->signature_id->CurrentValue ?>"<?php echo $t004_asset_edit->signature_id->editAttributes() ?>>
</span>
<?php echo $t004_asset_edit->signature_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t004_asset_edit->Asset->Visible) { // Asset ?>
	<div id="r_Asset" class="form-group row">
		<label id="elh_t004_asset_Asset" for="x_Asset" class="<?php echo $t004_asset_edit->LeftColumnClass ?>"><?php echo $t004_asset_edit->Asset->caption() ?><?php echo $t004_asset_edit->Asset->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t004_asset_edit->RightColumnClass ?>"><div <?php echo $t004_asset_edit->Asset->cellAttributes() ?>>
<span id="el_t004_asset_Asset">
<input type="text" data-table="t004_asset" data-field="x_Asset" name="x_Asset" id="x_Asset" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($t004_asset_edit->Asset->getPlaceHolder()) ?>" value="<?php echo $t004_asset_edit->Asset->EditValue ?>"<?php echo $t004_asset_edit->Asset->editAttributes() ?>>
</span>
<?php echo $t004_asset_edit->Asset->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t004_asset_edit->Periode->Visible) { // Periode ?>
	<div id="r_Periode" class="form-group row">
		<label id="elh_t004_asset_Periode" for="x_Periode" class="<?php echo $t004_asset_edit->LeftColumnClass ?>"><?php echo $t004_asset_edit->Periode->caption() ?><?php echo $t004_asset_edit->Periode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t004_asset_edit->RightColumnClass ?>"><div <?php echo $t004_asset_edit->Periode->cellAttributes() ?>>
<span id="el_t004_asset_Periode">
<input type="text" data-table="t004_asset" data-field="x_Periode" data-format="7" name="x_Periode" id="x_Periode" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t004_asset_edit->Periode->getPlaceHolder()) ?>" value="<?php echo $t004_asset_edit->Periode->EditValue ?>"<?php echo $t004_asset_edit->Periode->editAttributes() ?>>
<?php if (!$t004_asset_edit->Periode->ReadOnly && !$t004_asset_edit->Periode->Disabled && !isset($t004_asset_edit->Periode->EditAttrs["readonly"]) && !isset($t004_asset_edit->Periode->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft004_assetedit", "datetimepicker"], function() {
	ew.createDateTimePicker("ft004_assetedit", "x_Periode", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php echo $t004_asset_edit->Periode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t004_asset_edit->Qty->Visible) { // Qty ?>
	<div id="r_Qty" class="form-group row">
		<label id="elh_t004_asset_Qty" for="x_Qty" class="<?php echo $t004_asset_edit->LeftColumnClass ?>"><?php echo $t004_asset_edit->Qty->caption() ?><?php echo $t004_asset_edit->Qty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t004_asset_edit->RightColumnClass ?>"><div <?php echo $t004_asset_edit->Qty->cellAttributes() ?>>
<span id="el_t004_asset_Qty">
<input type="text" data-table="t004_asset" data-field="x_Qty" name="x_Qty" id="x_Qty" size="5" maxlength="14" placeholder="<?php echo HtmlEncode($t004_asset_edit->Qty->getPlaceHolder()) ?>" value="<?php echo $t004_asset_edit->Qty->EditValue ?>"<?php echo $t004_asset_edit->Qty->editAttributes() ?>>
</span>
<?php echo $t004_asset_edit->Qty->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="t004_asset" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t004_asset_edit->id->CurrentValue) ?>">
<?php if (!$t004_asset_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t004_asset_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t004_asset_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t004_asset_edit->showPageFooter();
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
$t004_asset_edit->terminate();
?>