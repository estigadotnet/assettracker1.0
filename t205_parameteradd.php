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
$t205_parameter_add = new t205_parameter_add();

// Run the page
$t205_parameter_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t205_parameter_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft205_parameteradd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	ft205_parameteradd = currentForm = new ew.Form("ft205_parameteradd", "add");

	// Validate form
	ft205_parameteradd.validate = function() {
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
			<?php if ($t205_parameter_add->Category->Required) { ?>
				elm = this.getElements("x" + infix + "_Category");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t205_parameter_add->Category->caption(), $t205_parameter_add->Category->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t205_parameter_add->Parameter->Required) { ?>
				elm = this.getElements("x" + infix + "_Parameter");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t205_parameter_add->Parameter->caption(), $t205_parameter_add->Parameter->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t205_parameter_add->Nilai->Required) { ?>
				elm = this.getElements("x" + infix + "_Nilai");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t205_parameter_add->Nilai->caption(), $t205_parameter_add->Nilai->RequiredErrorMessage)) ?>");
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
	ft205_parameteradd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft205_parameteradd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft205_parameteradd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t205_parameter_add->showPageHeader(); ?>
<?php
$t205_parameter_add->showMessage();
?>
<form name="ft205_parameteradd" id="ft205_parameteradd" class="<?php echo $t205_parameter_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t205_parameter">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t205_parameter_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($t205_parameter_add->Category->Visible) { // Category ?>
	<div id="r_Category" class="form-group row">
		<label id="elh_t205_parameter_Category" for="x_Category" class="<?php echo $t205_parameter_add->LeftColumnClass ?>"><?php echo $t205_parameter_add->Category->caption() ?><?php echo $t205_parameter_add->Category->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t205_parameter_add->RightColumnClass ?>"><div <?php echo $t205_parameter_add->Category->cellAttributes() ?>>
<span id="el_t205_parameter_Category">
<input type="text" data-table="t205_parameter" data-field="x_Category" name="x_Category" id="x_Category" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t205_parameter_add->Category->getPlaceHolder()) ?>" value="<?php echo $t205_parameter_add->Category->EditValue ?>"<?php echo $t205_parameter_add->Category->editAttributes() ?>>
</span>
<?php echo $t205_parameter_add->Category->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t205_parameter_add->Parameter->Visible) { // Parameter ?>
	<div id="r_Parameter" class="form-group row">
		<label id="elh_t205_parameter_Parameter" for="x_Parameter" class="<?php echo $t205_parameter_add->LeftColumnClass ?>"><?php echo $t205_parameter_add->Parameter->caption() ?><?php echo $t205_parameter_add->Parameter->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t205_parameter_add->RightColumnClass ?>"><div <?php echo $t205_parameter_add->Parameter->cellAttributes() ?>>
<span id="el_t205_parameter_Parameter">
<input type="text" data-table="t205_parameter" data-field="x_Parameter" name="x_Parameter" id="x_Parameter" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t205_parameter_add->Parameter->getPlaceHolder()) ?>" value="<?php echo $t205_parameter_add->Parameter->EditValue ?>"<?php echo $t205_parameter_add->Parameter->editAttributes() ?>>
</span>
<?php echo $t205_parameter_add->Parameter->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t205_parameter_add->Nilai->Visible) { // Nilai ?>
	<div id="r_Nilai" class="form-group row">
		<label id="elh_t205_parameter_Nilai" for="x_Nilai" class="<?php echo $t205_parameter_add->LeftColumnClass ?>"><?php echo $t205_parameter_add->Nilai->caption() ?><?php echo $t205_parameter_add->Nilai->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t205_parameter_add->RightColumnClass ?>"><div <?php echo $t205_parameter_add->Nilai->cellAttributes() ?>>
<span id="el_t205_parameter_Nilai">
<input type="text" data-table="t205_parameter" data-field="x_Nilai" name="x_Nilai" id="x_Nilai" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t205_parameter_add->Nilai->getPlaceHolder()) ?>" value="<?php echo $t205_parameter_add->Nilai->EditValue ?>"<?php echo $t205_parameter_add->Nilai->editAttributes() ?>>
</span>
<?php echo $t205_parameter_add->Nilai->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t205_parameter_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t205_parameter_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t205_parameter_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t205_parameter_add->showPageFooter();
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
$t205_parameter_add->terminate();
?>