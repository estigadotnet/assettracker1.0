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
$t003_signature_list = new t003_signature_list();

// Run the page
$t003_signature_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t003_signature_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t003_signature_list->isExport()) { ?>
<script>
var ft003_signaturelist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft003_signaturelist = currentForm = new ew.Form("ft003_signaturelist", "list");
	ft003_signaturelist.formKeyCountName = '<?php echo $t003_signature_list->FormKeyCountName ?>';

	// Validate form
	ft003_signaturelist.validate = function() {
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
			var checkrow = (gridinsert) ? !this.emptyRow(infix) : true;
			if (checkrow) {
				addcnt++;
			<?php if ($t003_signature_list->Signature->Required) { ?>
				elm = this.getElements("x" + infix + "_Signature");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t003_signature_list->Signature->caption(), $t003_signature_list->Signature->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		if (gridinsert && addcnt == 0) { // No row added
			ew.alert(ew.language.phrase("NoAddRecord"));
			return false;
		}
		return true;
	}

	// Check empty row
	ft003_signaturelist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "Signature", false)) return false;
		return true;
	}

	// Form_CustomValidate
	ft003_signaturelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft003_signaturelist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft003_signaturelist");
});
var ft003_signaturelistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft003_signaturelistsrch = currentSearchForm = new ew.Form("ft003_signaturelistsrch");

	// Dynamic selection lists
	// Filters

	ft003_signaturelistsrch.filterList = <?php echo $t003_signature_list->getFilterList() ?>;
	loadjs.done("ft003_signaturelistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t003_signature_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t003_signature_list->TotalRecords > 0 && $t003_signature_list->ExportOptions->visible()) { ?>
<?php $t003_signature_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t003_signature_list->ImportOptions->visible()) { ?>
<?php $t003_signature_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t003_signature_list->SearchOptions->visible()) { ?>
<?php $t003_signature_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t003_signature_list->FilterOptions->visible()) { ?>
<?php $t003_signature_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t003_signature_list->renderOtherOptions();
?>
<?php $t003_signature_list->showPageHeader(); ?>
<?php
$t003_signature_list->showMessage();
?>
<?php if ($t003_signature_list->TotalRecords > 0 || $t003_signature->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t003_signature_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t003_signature">
<form name="ft003_signaturelist" id="ft003_signaturelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t003_signature">
<div id="gmp_t003_signature" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t003_signature_list->TotalRecords > 0 || $t003_signature_list->isGridEdit()) { ?>
<table id="tbl_t003_signaturelist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t003_signature->RowType = ROWTYPE_HEADER;

// Render list options
$t003_signature_list->renderListOptions();

// Render list options (header, left)
$t003_signature_list->ListOptions->render("header", "left");
?>
<?php if ($t003_signature_list->Signature->Visible) { // Signature ?>
	<?php if ($t003_signature_list->SortUrl($t003_signature_list->Signature) == "") { ?>
		<th data-name="Signature" class="<?php echo $t003_signature_list->Signature->headerCellClass() ?>"><div id="elh_t003_signature_Signature" class="t003_signature_Signature"><div class="ew-table-header-caption"><?php echo $t003_signature_list->Signature->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Signature" class="<?php echo $t003_signature_list->Signature->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t003_signature_list->SortUrl($t003_signature_list->Signature) ?>', 2);"><div id="elh_t003_signature_Signature" class="t003_signature_Signature">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t003_signature_list->Signature->caption() ?></span><span class="ew-table-header-sort"><?php if ($t003_signature_list->Signature->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t003_signature_list->Signature->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t003_signature_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t003_signature_list->ExportAll && $t003_signature_list->isExport()) {
	$t003_signature_list->StopRecord = $t003_signature_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t003_signature_list->TotalRecords > $t003_signature_list->StartRecord + $t003_signature_list->DisplayRecords - 1)
		$t003_signature_list->StopRecord = $t003_signature_list->StartRecord + $t003_signature_list->DisplayRecords - 1;
	else
		$t003_signature_list->StopRecord = $t003_signature_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($t003_signature->isConfirm() || $t003_signature_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t003_signature_list->FormKeyCountName) && ($t003_signature_list->isGridAdd() || $t003_signature_list->isGridEdit() || $t003_signature->isConfirm())) {
		$t003_signature_list->KeyCount = $CurrentForm->getValue($t003_signature_list->FormKeyCountName);
		$t003_signature_list->StopRecord = $t003_signature_list->StartRecord + $t003_signature_list->KeyCount - 1;
	}
}
$t003_signature_list->RecordCount = $t003_signature_list->StartRecord - 1;
if ($t003_signature_list->Recordset && !$t003_signature_list->Recordset->EOF) {
	$t003_signature_list->Recordset->moveFirst();
	$selectLimit = $t003_signature_list->UseSelectLimit;
	if (!$selectLimit && $t003_signature_list->StartRecord > 1)
		$t003_signature_list->Recordset->move($t003_signature_list->StartRecord - 1);
} elseif (!$t003_signature->AllowAddDeleteRow && $t003_signature_list->StopRecord == 0) {
	$t003_signature_list->StopRecord = $t003_signature->GridAddRowCount;
}

// Initialize aggregate
$t003_signature->RowType = ROWTYPE_AGGREGATEINIT;
$t003_signature->resetAttributes();
$t003_signature_list->renderRow();
if ($t003_signature_list->isGridAdd())
	$t003_signature_list->RowIndex = 0;
if ($t003_signature_list->isGridEdit())
	$t003_signature_list->RowIndex = 0;
while ($t003_signature_list->RecordCount < $t003_signature_list->StopRecord) {
	$t003_signature_list->RecordCount++;
	if ($t003_signature_list->RecordCount >= $t003_signature_list->StartRecord) {
		$t003_signature_list->RowCount++;
		if ($t003_signature_list->isGridAdd() || $t003_signature_list->isGridEdit() || $t003_signature->isConfirm()) {
			$t003_signature_list->RowIndex++;
			$CurrentForm->Index = $t003_signature_list->RowIndex;
			if ($CurrentForm->hasValue($t003_signature_list->FormActionName) && ($t003_signature->isConfirm() || $t003_signature_list->EventCancelled))
				$t003_signature_list->RowAction = strval($CurrentForm->getValue($t003_signature_list->FormActionName));
			elseif ($t003_signature_list->isGridAdd())
				$t003_signature_list->RowAction = "insert";
			else
				$t003_signature_list->RowAction = "";
		}

		// Set up key count
		$t003_signature_list->KeyCount = $t003_signature_list->RowIndex;

		// Init row class and style
		$t003_signature->resetAttributes();
		$t003_signature->CssClass = "";
		if ($t003_signature_list->isGridAdd()) {
			$t003_signature_list->loadRowValues(); // Load default values
		} else {
			$t003_signature_list->loadRowValues($t003_signature_list->Recordset); // Load row values
		}
		$t003_signature->RowType = ROWTYPE_VIEW; // Render view
		if ($t003_signature_list->isGridAdd()) // Grid add
			$t003_signature->RowType = ROWTYPE_ADD; // Render add
		if ($t003_signature_list->isGridAdd() && $t003_signature->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t003_signature_list->restoreCurrentRowFormValues($t003_signature_list->RowIndex); // Restore form values
		if ($t003_signature_list->isGridEdit()) { // Grid edit
			if ($t003_signature->EventCancelled)
				$t003_signature_list->restoreCurrentRowFormValues($t003_signature_list->RowIndex); // Restore form values
			if ($t003_signature_list->RowAction == "insert")
				$t003_signature->RowType = ROWTYPE_ADD; // Render add
			else
				$t003_signature->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t003_signature_list->isGridEdit() && ($t003_signature->RowType == ROWTYPE_EDIT || $t003_signature->RowType == ROWTYPE_ADD) && $t003_signature->EventCancelled) // Update failed
			$t003_signature_list->restoreCurrentRowFormValues($t003_signature_list->RowIndex); // Restore form values
		if ($t003_signature->RowType == ROWTYPE_EDIT) // Edit row
			$t003_signature_list->EditRowCount++;

		// Set up row id / data-rowindex
		$t003_signature->RowAttrs->merge(["data-rowindex" => $t003_signature_list->RowCount, "id" => "r" . $t003_signature_list->RowCount . "_t003_signature", "data-rowtype" => $t003_signature->RowType]);

		// Render row
		$t003_signature_list->renderRow();

		// Render list options
		$t003_signature_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t003_signature_list->RowAction != "delete" && $t003_signature_list->RowAction != "insertdelete" && !($t003_signature_list->RowAction == "insert" && $t003_signature->isConfirm() && $t003_signature_list->emptyRow())) {
?>
	<tr <?php echo $t003_signature->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t003_signature_list->ListOptions->render("body", "left", $t003_signature_list->RowCount);
?>
	<?php if ($t003_signature_list->Signature->Visible) { // Signature ?>
		<td data-name="Signature" <?php echo $t003_signature_list->Signature->cellAttributes() ?>>
<?php if ($t003_signature->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t003_signature_list->RowCount ?>_t003_signature_Signature" class="form-group">
<input type="text" data-table="t003_signature" data-field="x_Signature" name="x<?php echo $t003_signature_list->RowIndex ?>_Signature" id="x<?php echo $t003_signature_list->RowIndex ?>_Signature" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t003_signature_list->Signature->getPlaceHolder()) ?>" value="<?php echo $t003_signature_list->Signature->EditValue ?>"<?php echo $t003_signature_list->Signature->editAttributes() ?>>
</span>
<input type="hidden" data-table="t003_signature" data-field="x_Signature" name="o<?php echo $t003_signature_list->RowIndex ?>_Signature" id="o<?php echo $t003_signature_list->RowIndex ?>_Signature" value="<?php echo HtmlEncode($t003_signature_list->Signature->OldValue) ?>">
<?php } ?>
<?php if ($t003_signature->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t003_signature_list->RowCount ?>_t003_signature_Signature" class="form-group">
<input type="text" data-table="t003_signature" data-field="x_Signature" name="x<?php echo $t003_signature_list->RowIndex ?>_Signature" id="x<?php echo $t003_signature_list->RowIndex ?>_Signature" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t003_signature_list->Signature->getPlaceHolder()) ?>" value="<?php echo $t003_signature_list->Signature->EditValue ?>"<?php echo $t003_signature_list->Signature->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t003_signature->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t003_signature_list->RowCount ?>_t003_signature_Signature">
<span<?php echo $t003_signature_list->Signature->viewAttributes() ?>><?php echo $t003_signature_list->Signature->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t003_signature->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t003_signature" data-field="x_id" name="x<?php echo $t003_signature_list->RowIndex ?>_id" id="x<?php echo $t003_signature_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t003_signature_list->id->CurrentValue) ?>">
<input type="hidden" data-table="t003_signature" data-field="x_id" name="o<?php echo $t003_signature_list->RowIndex ?>_id" id="o<?php echo $t003_signature_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t003_signature_list->id->OldValue) ?>">
<?php } ?>
<?php if ($t003_signature->RowType == ROWTYPE_EDIT || $t003_signature->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t003_signature" data-field="x_id" name="x<?php echo $t003_signature_list->RowIndex ?>_id" id="x<?php echo $t003_signature_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t003_signature_list->id->CurrentValue) ?>">
<?php } ?>
<?php

// Render list options (body, right)
$t003_signature_list->ListOptions->render("body", "right", $t003_signature_list->RowCount);
?>
	</tr>
<?php if ($t003_signature->RowType == ROWTYPE_ADD || $t003_signature->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ft003_signaturelist", "load"], function() {
	ft003_signaturelist.updateLists(<?php echo $t003_signature_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t003_signature_list->isGridAdd())
		if (!$t003_signature_list->Recordset->EOF)
			$t003_signature_list->Recordset->moveNext();
}
?>
<?php
	if ($t003_signature_list->isGridAdd() || $t003_signature_list->isGridEdit()) {
		$t003_signature_list->RowIndex = '$rowindex$';
		$t003_signature_list->loadRowValues();

		// Set row properties
		$t003_signature->resetAttributes();
		$t003_signature->RowAttrs->merge(["data-rowindex" => $t003_signature_list->RowIndex, "id" => "r0_t003_signature", "data-rowtype" => ROWTYPE_ADD]);
		$t003_signature->RowAttrs->appendClass("ew-template");
		$t003_signature->RowType = ROWTYPE_ADD;

		// Render row
		$t003_signature_list->renderRow();

		// Render list options
		$t003_signature_list->renderListOptions();
		$t003_signature_list->StartRowCount = 0;
?>
	<tr <?php echo $t003_signature->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t003_signature_list->ListOptions->render("body", "left", $t003_signature_list->RowIndex);
?>
	<?php if ($t003_signature_list->Signature->Visible) { // Signature ?>
		<td data-name="Signature">
<span id="el$rowindex$_t003_signature_Signature" class="form-group t003_signature_Signature">
<input type="text" data-table="t003_signature" data-field="x_Signature" name="x<?php echo $t003_signature_list->RowIndex ?>_Signature" id="x<?php echo $t003_signature_list->RowIndex ?>_Signature" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t003_signature_list->Signature->getPlaceHolder()) ?>" value="<?php echo $t003_signature_list->Signature->EditValue ?>"<?php echo $t003_signature_list->Signature->editAttributes() ?>>
</span>
<input type="hidden" data-table="t003_signature" data-field="x_Signature" name="o<?php echo $t003_signature_list->RowIndex ?>_Signature" id="o<?php echo $t003_signature_list->RowIndex ?>_Signature" value="<?php echo HtmlEncode($t003_signature_list->Signature->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t003_signature_list->ListOptions->render("body", "right", $t003_signature_list->RowIndex);
?>
<script>
loadjs.ready(["ft003_signaturelist", "load"], function() {
	ft003_signaturelist.updateLists(<?php echo $t003_signature_list->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if ($t003_signature_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $t003_signature_list->FormKeyCountName ?>" id="<?php echo $t003_signature_list->FormKeyCountName ?>" value="<?php echo $t003_signature_list->KeyCount ?>">
<?php echo $t003_signature_list->MultiSelectKey ?>
<?php } ?>
<?php if ($t003_signature_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $t003_signature_list->FormKeyCountName ?>" id="<?php echo $t003_signature_list->FormKeyCountName ?>" value="<?php echo $t003_signature_list->KeyCount ?>">
<?php echo $t003_signature_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$t003_signature->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t003_signature_list->Recordset)
	$t003_signature_list->Recordset->Close();
?>
<?php if (!$t003_signature_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t003_signature_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t003_signature_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t003_signature_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t003_signature_list->TotalRecords == 0 && !$t003_signature->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t003_signature_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t003_signature_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t003_signature_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$t003_signature_list->terminate();
?>