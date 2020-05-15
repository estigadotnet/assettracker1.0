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
$t001_property_list = new t001_property_list();

// Run the page
$t001_property_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t001_property_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t001_property_list->isExport()) { ?>
<script>
var ft001_propertylist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft001_propertylist = currentForm = new ew.Form("ft001_propertylist", "list");
	ft001_propertylist.formKeyCountName = '<?php echo $t001_property_list->FormKeyCountName ?>';

	// Validate form
	ft001_propertylist.validate = function() {
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
			<?php if ($t001_property_list->Property->Required) { ?>
				elm = this.getElements("x" + infix + "_Property");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_property_list->Property->caption(), $t001_property_list->Property->RequiredErrorMessage)) ?>");
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
	ft001_propertylist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "Property", false)) return false;
		return true;
	}

	// Form_CustomValidate
	ft001_propertylist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft001_propertylist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft001_propertylist");
});
var ft001_propertylistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft001_propertylistsrch = currentSearchForm = new ew.Form("ft001_propertylistsrch");

	// Dynamic selection lists
	// Filters

	ft001_propertylistsrch.filterList = <?php echo $t001_property_list->getFilterList() ?>;
	loadjs.done("ft001_propertylistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t001_property_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t001_property_list->TotalRecords > 0 && $t001_property_list->ExportOptions->visible()) { ?>
<?php $t001_property_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t001_property_list->ImportOptions->visible()) { ?>
<?php $t001_property_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t001_property_list->SearchOptions->visible()) { ?>
<?php $t001_property_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t001_property_list->FilterOptions->visible()) { ?>
<?php $t001_property_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t001_property_list->renderOtherOptions();
?>
<?php $t001_property_list->showPageHeader(); ?>
<?php
$t001_property_list->showMessage();
?>
<?php if ($t001_property_list->TotalRecords > 0 || $t001_property->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t001_property_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t001_property">
<form name="ft001_propertylist" id="ft001_propertylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t001_property">
<div id="gmp_t001_property" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t001_property_list->TotalRecords > 0 || $t001_property_list->isGridEdit()) { ?>
<table id="tbl_t001_propertylist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t001_property->RowType = ROWTYPE_HEADER;

// Render list options
$t001_property_list->renderListOptions();

// Render list options (header, left)
$t001_property_list->ListOptions->render("header", "left");
?>
<?php if ($t001_property_list->Property->Visible) { // Property ?>
	<?php if ($t001_property_list->SortUrl($t001_property_list->Property) == "") { ?>
		<th data-name="Property" class="<?php echo $t001_property_list->Property->headerCellClass() ?>"><div id="elh_t001_property_Property" class="t001_property_Property"><div class="ew-table-header-caption"><?php echo $t001_property_list->Property->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Property" class="<?php echo $t001_property_list->Property->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t001_property_list->SortUrl($t001_property_list->Property) ?>', 2);"><div id="elh_t001_property_Property" class="t001_property_Property">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t001_property_list->Property->caption() ?></span><span class="ew-table-header-sort"><?php if ($t001_property_list->Property->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t001_property_list->Property->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t001_property_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t001_property_list->ExportAll && $t001_property_list->isExport()) {
	$t001_property_list->StopRecord = $t001_property_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t001_property_list->TotalRecords > $t001_property_list->StartRecord + $t001_property_list->DisplayRecords - 1)
		$t001_property_list->StopRecord = $t001_property_list->StartRecord + $t001_property_list->DisplayRecords - 1;
	else
		$t001_property_list->StopRecord = $t001_property_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($t001_property->isConfirm() || $t001_property_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t001_property_list->FormKeyCountName) && ($t001_property_list->isGridAdd() || $t001_property_list->isGridEdit() || $t001_property->isConfirm())) {
		$t001_property_list->KeyCount = $CurrentForm->getValue($t001_property_list->FormKeyCountName);
		$t001_property_list->StopRecord = $t001_property_list->StartRecord + $t001_property_list->KeyCount - 1;
	}
}
$t001_property_list->RecordCount = $t001_property_list->StartRecord - 1;
if ($t001_property_list->Recordset && !$t001_property_list->Recordset->EOF) {
	$t001_property_list->Recordset->moveFirst();
	$selectLimit = $t001_property_list->UseSelectLimit;
	if (!$selectLimit && $t001_property_list->StartRecord > 1)
		$t001_property_list->Recordset->move($t001_property_list->StartRecord - 1);
} elseif (!$t001_property->AllowAddDeleteRow && $t001_property_list->StopRecord == 0) {
	$t001_property_list->StopRecord = $t001_property->GridAddRowCount;
}

// Initialize aggregate
$t001_property->RowType = ROWTYPE_AGGREGATEINIT;
$t001_property->resetAttributes();
$t001_property_list->renderRow();
if ($t001_property_list->isGridAdd())
	$t001_property_list->RowIndex = 0;
if ($t001_property_list->isGridEdit())
	$t001_property_list->RowIndex = 0;
while ($t001_property_list->RecordCount < $t001_property_list->StopRecord) {
	$t001_property_list->RecordCount++;
	if ($t001_property_list->RecordCount >= $t001_property_list->StartRecord) {
		$t001_property_list->RowCount++;
		if ($t001_property_list->isGridAdd() || $t001_property_list->isGridEdit() || $t001_property->isConfirm()) {
			$t001_property_list->RowIndex++;
			$CurrentForm->Index = $t001_property_list->RowIndex;
			if ($CurrentForm->hasValue($t001_property_list->FormActionName) && ($t001_property->isConfirm() || $t001_property_list->EventCancelled))
				$t001_property_list->RowAction = strval($CurrentForm->getValue($t001_property_list->FormActionName));
			elseif ($t001_property_list->isGridAdd())
				$t001_property_list->RowAction = "insert";
			else
				$t001_property_list->RowAction = "";
		}

		// Set up key count
		$t001_property_list->KeyCount = $t001_property_list->RowIndex;

		// Init row class and style
		$t001_property->resetAttributes();
		$t001_property->CssClass = "";
		if ($t001_property_list->isGridAdd()) {
			$t001_property_list->loadRowValues(); // Load default values
		} else {
			$t001_property_list->loadRowValues($t001_property_list->Recordset); // Load row values
		}
		$t001_property->RowType = ROWTYPE_VIEW; // Render view
		if ($t001_property_list->isGridAdd()) // Grid add
			$t001_property->RowType = ROWTYPE_ADD; // Render add
		if ($t001_property_list->isGridAdd() && $t001_property->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t001_property_list->restoreCurrentRowFormValues($t001_property_list->RowIndex); // Restore form values
		if ($t001_property_list->isGridEdit()) { // Grid edit
			if ($t001_property->EventCancelled)
				$t001_property_list->restoreCurrentRowFormValues($t001_property_list->RowIndex); // Restore form values
			if ($t001_property_list->RowAction == "insert")
				$t001_property->RowType = ROWTYPE_ADD; // Render add
			else
				$t001_property->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t001_property_list->isGridEdit() && ($t001_property->RowType == ROWTYPE_EDIT || $t001_property->RowType == ROWTYPE_ADD) && $t001_property->EventCancelled) // Update failed
			$t001_property_list->restoreCurrentRowFormValues($t001_property_list->RowIndex); // Restore form values
		if ($t001_property->RowType == ROWTYPE_EDIT) // Edit row
			$t001_property_list->EditRowCount++;

		// Set up row id / data-rowindex
		$t001_property->RowAttrs->merge(["data-rowindex" => $t001_property_list->RowCount, "id" => "r" . $t001_property_list->RowCount . "_t001_property", "data-rowtype" => $t001_property->RowType]);

		// Render row
		$t001_property_list->renderRow();

		// Render list options
		$t001_property_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t001_property_list->RowAction != "delete" && $t001_property_list->RowAction != "insertdelete" && !($t001_property_list->RowAction == "insert" && $t001_property->isConfirm() && $t001_property_list->emptyRow())) {
?>
	<tr <?php echo $t001_property->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t001_property_list->ListOptions->render("body", "left", $t001_property_list->RowCount);
?>
	<?php if ($t001_property_list->Property->Visible) { // Property ?>
		<td data-name="Property" <?php echo $t001_property_list->Property->cellAttributes() ?>>
<?php if ($t001_property->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t001_property_list->RowCount ?>_t001_property_Property" class="form-group">
<input type="text" data-table="t001_property" data-field="x_Property" name="x<?php echo $t001_property_list->RowIndex ?>_Property" id="x<?php echo $t001_property_list->RowIndex ?>_Property" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t001_property_list->Property->getPlaceHolder()) ?>" value="<?php echo $t001_property_list->Property->EditValue ?>"<?php echo $t001_property_list->Property->editAttributes() ?>>
</span>
<input type="hidden" data-table="t001_property" data-field="x_Property" name="o<?php echo $t001_property_list->RowIndex ?>_Property" id="o<?php echo $t001_property_list->RowIndex ?>_Property" value="<?php echo HtmlEncode($t001_property_list->Property->OldValue) ?>">
<?php } ?>
<?php if ($t001_property->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t001_property_list->RowCount ?>_t001_property_Property" class="form-group">
<input type="text" data-table="t001_property" data-field="x_Property" name="x<?php echo $t001_property_list->RowIndex ?>_Property" id="x<?php echo $t001_property_list->RowIndex ?>_Property" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t001_property_list->Property->getPlaceHolder()) ?>" value="<?php echo $t001_property_list->Property->EditValue ?>"<?php echo $t001_property_list->Property->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t001_property->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t001_property_list->RowCount ?>_t001_property_Property">
<span<?php echo $t001_property_list->Property->viewAttributes() ?>><?php echo $t001_property_list->Property->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t001_property->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t001_property" data-field="x_id" name="x<?php echo $t001_property_list->RowIndex ?>_id" id="x<?php echo $t001_property_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t001_property_list->id->CurrentValue) ?>">
<input type="hidden" data-table="t001_property" data-field="x_id" name="o<?php echo $t001_property_list->RowIndex ?>_id" id="o<?php echo $t001_property_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t001_property_list->id->OldValue) ?>">
<?php } ?>
<?php if ($t001_property->RowType == ROWTYPE_EDIT || $t001_property->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t001_property" data-field="x_id" name="x<?php echo $t001_property_list->RowIndex ?>_id" id="x<?php echo $t001_property_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t001_property_list->id->CurrentValue) ?>">
<?php } ?>
<?php

// Render list options (body, right)
$t001_property_list->ListOptions->render("body", "right", $t001_property_list->RowCount);
?>
	</tr>
<?php if ($t001_property->RowType == ROWTYPE_ADD || $t001_property->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ft001_propertylist", "load"], function() {
	ft001_propertylist.updateLists(<?php echo $t001_property_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t001_property_list->isGridAdd())
		if (!$t001_property_list->Recordset->EOF)
			$t001_property_list->Recordset->moveNext();
}
?>
<?php
	if ($t001_property_list->isGridAdd() || $t001_property_list->isGridEdit()) {
		$t001_property_list->RowIndex = '$rowindex$';
		$t001_property_list->loadRowValues();

		// Set row properties
		$t001_property->resetAttributes();
		$t001_property->RowAttrs->merge(["data-rowindex" => $t001_property_list->RowIndex, "id" => "r0_t001_property", "data-rowtype" => ROWTYPE_ADD]);
		$t001_property->RowAttrs->appendClass("ew-template");
		$t001_property->RowType = ROWTYPE_ADD;

		// Render row
		$t001_property_list->renderRow();

		// Render list options
		$t001_property_list->renderListOptions();
		$t001_property_list->StartRowCount = 0;
?>
	<tr <?php echo $t001_property->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t001_property_list->ListOptions->render("body", "left", $t001_property_list->RowIndex);
?>
	<?php if ($t001_property_list->Property->Visible) { // Property ?>
		<td data-name="Property">
<span id="el$rowindex$_t001_property_Property" class="form-group t001_property_Property">
<input type="text" data-table="t001_property" data-field="x_Property" name="x<?php echo $t001_property_list->RowIndex ?>_Property" id="x<?php echo $t001_property_list->RowIndex ?>_Property" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t001_property_list->Property->getPlaceHolder()) ?>" value="<?php echo $t001_property_list->Property->EditValue ?>"<?php echo $t001_property_list->Property->editAttributes() ?>>
</span>
<input type="hidden" data-table="t001_property" data-field="x_Property" name="o<?php echo $t001_property_list->RowIndex ?>_Property" id="o<?php echo $t001_property_list->RowIndex ?>_Property" value="<?php echo HtmlEncode($t001_property_list->Property->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t001_property_list->ListOptions->render("body", "right", $t001_property_list->RowIndex);
?>
<script>
loadjs.ready(["ft001_propertylist", "load"], function() {
	ft001_propertylist.updateLists(<?php echo $t001_property_list->RowIndex ?>);
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
<?php if ($t001_property_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $t001_property_list->FormKeyCountName ?>" id="<?php echo $t001_property_list->FormKeyCountName ?>" value="<?php echo $t001_property_list->KeyCount ?>">
<?php echo $t001_property_list->MultiSelectKey ?>
<?php } ?>
<?php if ($t001_property_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $t001_property_list->FormKeyCountName ?>" id="<?php echo $t001_property_list->FormKeyCountName ?>" value="<?php echo $t001_property_list->KeyCount ?>">
<?php echo $t001_property_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$t001_property->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t001_property_list->Recordset)
	$t001_property_list->Recordset->Close();
?>
<?php if (!$t001_property_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t001_property_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t001_property_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t001_property_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t001_property_list->TotalRecords == 0 && !$t001_property->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t001_property_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t001_property_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t001_property_list->isExport()) { ?>
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
$t001_property_list->terminate();
?>