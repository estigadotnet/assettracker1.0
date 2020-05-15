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
$t003_signature_search = new t003_signature_search();

// Run the page
$t003_signature_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t003_signature_search->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft003_signaturesearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($t003_signature_search->IsModal) { ?>
	ft003_signaturesearch = currentAdvancedSearchForm = new ew.Form("ft003_signaturesearch", "search");
	<?php } else { ?>
	ft003_signaturesearch = currentForm = new ew.Form("ft003_signaturesearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	ft003_signaturesearch.validate = function(fobj) {
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
	ft003_signaturesearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft003_signaturesearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft003_signaturesearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t003_signature_search->showPageHeader(); ?>
<?php
$t003_signature_search->showMessage();
?>
<form name="ft003_signaturesearch" id="ft003_signaturesearch" class="<?php echo $t003_signature_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t003_signature">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$t003_signature_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($t003_signature_search->Signature->Visible) { // Signature ?>
	<div id="r_Signature" class="form-group row">
		<label for="x_Signature" class="<?php echo $t003_signature_search->LeftColumnClass ?>"><span id="elh_t003_signature_Signature"><?php echo $t003_signature_search->Signature->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Signature" id="z_Signature" value="LIKE">
</span>
		</label>
		<div class="<?php echo $t003_signature_search->RightColumnClass ?>"><div <?php echo $t003_signature_search->Signature->cellAttributes() ?>>
			<span id="el_t003_signature_Signature" class="ew-search-field">
<input type="text" data-table="t003_signature" data-field="x_Signature" name="x_Signature" id="x_Signature" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t003_signature_search->Signature->getPlaceHolder()) ?>" value="<?php echo $t003_signature_search->Signature->EditValue ?>"<?php echo $t003_signature_search->Signature->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t003_signature_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t003_signature_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t003_signature_search->showPageFooter();
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
$t003_signature_search->terminate();
?>