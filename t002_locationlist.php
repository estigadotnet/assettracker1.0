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
$t002_location_list = new t002_location_list();

// Run the page
$t002_location_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t002_location_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t002_location_list->isExport()) { ?>
<script>
var ft002_locationlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft002_locationlist = currentForm = new ew.Form("ft002_locationlist", "list");
	ft002_locationlist.formKeyCountName = '<?php echo $t002_location_list->FormKeyCountName ?>';

	// Validate form
	ft002_locationlist.validate = function() {
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
			<?php if ($t002_location_list->Location->Required) { ?>
				elm = this.getElements("x" + infix + "_Location");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_location_list->Location->caption(), $t002_location_list->Location->RequiredErrorMessage)) ?>");
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
	ft002_locationlist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "Location", false)) return false;
		return true;
	}

	// Form_CustomValidate
	ft002_locationlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft002_locationlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft002_locationlist");
});
var ft002_locationlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft002_locationlistsrch = currentSearchForm = new ew.Form("ft002_locationlistsrch");

	// Dynamic selection lists
	// Filters

	ft002_locationlistsrch.filterList = <?php echo $t002_location_list->getFilterList() ?>;
	loadjs.done("ft002_locationlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t002_location_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t002_location_list->TotalRecords > 0 && $t002_location_list->ExportOptions->visible()) { ?>
<?php $t002_location_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t002_location_list->ImportOptions->visible()) { ?>
<?php $t002_location_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t002_location_list->SearchOptions->visible()) { ?>
<?php $t002_location_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t002_location_list->FilterOptions->visible()) { ?>
<?php $t002_location_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t002_location_list->renderOtherOptions();
?>
<?php $t002_location_list->showPageHeader(); ?>
<?php
$t002_location_list->showMessage();
?>
<?php if ($t002_location_list->TotalRecords > 0 || $t002_location->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t002_location_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t002_location">
<form name="ft002_locationlist" id="ft002_locationlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t002_location">
<div id="gmp_t002_location" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t002_location_list->TotalRecords > 0 || $t002_location_list->isGridEdit()) { ?>
<table id="tbl_t002_locationlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t002_location->RowType = ROWTYPE_HEADER;

// Render list options
$t002_location_list->renderListOptions();

// Render list options (header, left)
$t002_location_list->ListOptions->render("header", "left");
?>
<?php if ($t002_location_list->Location->Visible) { // Location ?>
	<?php if ($t002_location_list->SortUrl($t002_location_list->Location) == "") { ?>
		<th data-name="Location" class="<?php echo $t002_location_list->Location->headerCellClass() ?>"><div id="elh_t002_location_Location" class="t002_location_Location"><div class="ew-table-header-caption"><?php echo $t002_location_list->Location->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Location" class="<?php echo $t002_location_list->Location->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t002_location_list->SortUrl($t002_location_list->Location) ?>', 2);"><div id="elh_t002_location_Location" class="t002_location_Location">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t002_location_list->Location->caption() ?></span><span class="ew-table-header-sort"><?php if ($t002_location_list->Location->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t002_location_list->Location->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t002_location_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t002_location_list->ExportAll && $t002_location_list->isExport()) {
	$t002_location_list->StopRecord = $t002_location_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t002_location_list->TotalRecords > $t002_location_list->StartRecord + $t002_location_list->DisplayRecords - 1)
		$t002_location_list->StopRecord = $t002_location_list->StartRecord + $t002_location_list->DisplayRecords - 1;
	else
		$t002_location_list->StopRecord = $t002_location_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($t002_location->isConfirm() || $t002_location_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t002_location_list->FormKeyCountName) && ($t002_location_list->isGridAdd() || $t002_location_list->isGridEdit() || $t002_location->isConfirm())) {
		$t002_location_list->KeyCount = $CurrentForm->getValue($t002_location_list->FormKeyCountName);
		$t002_location_list->StopRecord = $t002_location_list->StartRecord + $t002_location_list->KeyCount - 1;
	}
}
$t002_location_list->RecordCount = $t002_location_list->StartRecord - 1;
if ($t002_location_list->Recordset && !$t002_location_list->Recordset->EOF) {
	$t002_location_list->Recordset->moveFirst();
	$selectLimit = $t002_location_list->UseSelectLimit;
	if (!$selectLimit && $t002_location_list->StartRecord > 1)
		$t002_location_list->Recordset->move($t002_location_list->StartRecord - 1);
} elseif (!$t002_location->AllowAddDeleteRow && $t002_location_list->StopRecord == 0) {
	$t002_location_list->StopRecord = $t002_location->GridAddRowCount;
}

// Initialize aggregate
$t002_location->RowType = ROWTYPE_AGGREGATEINIT;
$t002_location->resetAttributes();
$t002_location_list->renderRow();
if ($t002_location_list->isGridAdd())
	$t002_location_list->RowIndex = 0;
if ($t002_location_list->isGridEdit())
	$t002_location_list->RowIndex = 0;
while ($t002_location_list->RecordCount < $t002_location_list->StopRecord) {
	$t002_location_list->RecordCount++;
	if ($t002_location_list->RecordCount >= $t002_location_list->StartRecord) {
		$t002_location_list->RowCount++;
		if ($t002_location_list->isGridAdd() || $t002_location_list->isGridEdit() || $t002_location->isConfirm()) {
			$t002_location_list->RowIndex++;
			$CurrentForm->Index = $t002_location_list->RowIndex;
			if ($CurrentForm->hasValue($t002_location_list->FormActionName) && ($t002_location->isConfirm() || $t002_location_list->EventCancelled))
				$t002_location_list->RowAction = strval($CurrentForm->getValue($t002_location_list->FormActionName));
			elseif ($t002_location_list->isGridAdd())
				$t002_location_list->RowAction = "insert";
			else
				$t002_location_list->RowAction = "";
		}

		// Set up key count
		$t002_location_list->KeyCount = $t002_location_list->RowIndex;

		// Init row class and style
		$t002_location->resetAttributes();
		$t002_location->CssClass = "";
		if ($t002_location_list->isGridAdd()) {
			$t002_location_list->loadRowValues(); // Load default values
		} else {
			$t002_location_list->loadRowValues($t002_location_list->Recordset); // Load row values
		}
		$t002_location->RowType = ROWTYPE_VIEW; // Render view
		if ($t002_location_list->isGridAdd()) // Grid add
			$t002_location->RowType = ROWTYPE_ADD; // Render add
		if ($t002_location_list->isGridAdd() && $t002_location->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t002_location_list->restoreCurrentRowFormValues($t002_location_list->RowIndex); // Restore form values
		if ($t002_location_list->isGridEdit()) { // Grid edit
			if ($t002_location->EventCancelled)
				$t002_location_list->restoreCurrentRowFormValues($t002_location_list->RowIndex); // Restore form values
			if ($t002_location_list->RowAction == "insert")
				$t002_location->RowType = ROWTYPE_ADD; // Render add
			else
				$t002_location->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t002_location_list->isGridEdit() && ($t002_location->RowType == ROWTYPE_EDIT || $t002_location->RowType == ROWTYPE_ADD) && $t002_location->EventCancelled) // Update failed
			$t002_location_list->restoreCurrentRowFormValues($t002_location_list->RowIndex); // Restore form values
		if ($t002_location->RowType == ROWTYPE_EDIT) // Edit row
			$t002_location_list->EditRowCount++;

		// Set up row id / data-rowindex
		$t002_location->RowAttrs->merge(["data-rowindex" => $t002_location_list->RowCount, "id" => "r" . $t002_location_list->RowCount . "_t002_location", "data-rowtype" => $t002_location->RowType]);

		// Render row
		$t002_location_list->renderRow();

		// Render list options
		$t002_location_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t002_location_list->RowAction != "delete" && $t002_location_list->RowAction != "insertdelete" && !($t002_location_list->RowAction == "insert" && $t002_location->isConfirm() && $t002_location_list->emptyRow())) {
?>
	<tr <?php echo $t002_location->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t002_location_list->ListOptions->render("body", "left", $t002_location_list->RowCount);
?>
	<?php if ($t002_location_list->Location->Visible) { // Location ?>
		<td data-name="Location" <?php echo $t002_location_list->Location->cellAttributes() ?>>
<?php if ($t002_location->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t002_location_list->RowCount ?>_t002_location_Location" class="form-group">
<input type="text" data-table="t002_location" data-field="x_Location" name="x<?php echo $t002_location_list->RowIndex ?>_Location" id="x<?php echo $t002_location_list->RowIndex ?>_Location" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t002_location_list->Location->getPlaceHolder()) ?>" value="<?php echo $t002_location_list->Location->EditValue ?>"<?php echo $t002_location_list->Location->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_location" data-field="x_Location" name="o<?php echo $t002_location_list->RowIndex ?>_Location" id="o<?php echo $t002_location_list->RowIndex ?>_Location" value="<?php echo HtmlEncode($t002_location_list->Location->OldValue) ?>">
<?php } ?>
<?php if ($t002_location->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t002_location_list->RowCount ?>_t002_location_Location" class="form-group">
<input type="text" data-table="t002_location" data-field="x_Location" name="x<?php echo $t002_location_list->RowIndex ?>_Location" id="x<?php echo $t002_location_list->RowIndex ?>_Location" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t002_location_list->Location->getPlaceHolder()) ?>" value="<?php echo $t002_location_list->Location->EditValue ?>"<?php echo $t002_location_list->Location->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t002_location->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t002_location_list->RowCount ?>_t002_location_Location">
<span<?php echo $t002_location_list->Location->viewAttributes() ?>><?php echo $t002_location_list->Location->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t002_location->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t002_location" data-field="x_id" name="x<?php echo $t002_location_list->RowIndex ?>_id" id="x<?php echo $t002_location_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t002_location_list->id->CurrentValue) ?>">
<input type="hidden" data-table="t002_location" data-field="x_id" name="o<?php echo $t002_location_list->RowIndex ?>_id" id="o<?php echo $t002_location_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t002_location_list->id->OldValue) ?>">
<?php } ?>
<?php if ($t002_location->RowType == ROWTYPE_EDIT || $t002_location->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t002_location" data-field="x_id" name="x<?php echo $t002_location_list->RowIndex ?>_id" id="x<?php echo $t002_location_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t002_location_list->id->CurrentValue) ?>">
<?php } ?>
<?php

// Render list options (body, right)
$t002_location_list->ListOptions->render("body", "right", $t002_location_list->RowCount);
?>
	</tr>
<?php if ($t002_location->RowType == ROWTYPE_ADD || $t002_location->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ft002_locationlist", "load"], function() {
	ft002_locationlist.updateLists(<?php echo $t002_location_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t002_location_list->isGridAdd())
		if (!$t002_location_list->Recordset->EOF)
			$t002_location_list->Recordset->moveNext();
}
?>
<?php
	if ($t002_location_list->isGridAdd() || $t002_location_list->isGridEdit()) {
		$t002_location_list->RowIndex = '$rowindex$';
		$t002_location_list->loadRowValues();

		// Set row properties
		$t002_location->resetAttributes();
		$t002_location->RowAttrs->merge(["data-rowindex" => $t002_location_list->RowIndex, "id" => "r0_t002_location", "data-rowtype" => ROWTYPE_ADD]);
		$t002_location->RowAttrs->appendClass("ew-template");
		$t002_location->RowType = ROWTYPE_ADD;

		// Render row
		$t002_location_list->renderRow();

		// Render list options
		$t002_location_list->renderListOptions();
		$t002_location_list->StartRowCount = 0;
?>
	<tr <?php echo $t002_location->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t002_location_list->ListOptions->render("body", "left", $t002_location_list->RowIndex);
?>
	<?php if ($t002_location_list->Location->Visible) { // Location ?>
		<td data-name="Location">
<span id="el$rowindex$_t002_location_Location" class="form-group t002_location_Location">
<input type="text" data-table="t002_location" data-field="x_Location" name="x<?php echo $t002_location_list->RowIndex ?>_Location" id="x<?php echo $t002_location_list->RowIndex ?>_Location" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t002_location_list->Location->getPlaceHolder()) ?>" value="<?php echo $t002_location_list->Location->EditValue ?>"<?php echo $t002_location_list->Location->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_location" data-field="x_Location" name="o<?php echo $t002_location_list->RowIndex ?>_Location" id="o<?php echo $t002_location_list->RowIndex ?>_Location" value="<?php echo HtmlEncode($t002_location_list->Location->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t002_location_list->ListOptions->render("body", "right", $t002_location_list->RowIndex);
?>
<script>
loadjs.ready(["ft002_locationlist", "load"], function() {
	ft002_locationlist.updateLists(<?php echo $t002_location_list->RowIndex ?>);
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
<?php if ($t002_location_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $t002_location_list->FormKeyCountName ?>" id="<?php echo $t002_location_list->FormKeyCountName ?>" value="<?php echo $t002_location_list->KeyCount ?>">
<?php echo $t002_location_list->MultiSelectKey ?>
<?php } ?>
<?php if ($t002_location_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $t002_location_list->FormKeyCountName ?>" id="<?php echo $t002_location_list->FormKeyCountName ?>" value="<?php echo $t002_location_list->KeyCount ?>">
<?php echo $t002_location_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$t002_location->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t002_location_list->Recordset)
	$t002_location_list->Recordset->Close();
?>
<?php if (!$t002_location_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t002_location_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t002_location_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t002_location_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t002_location_list->TotalRecords == 0 && !$t002_location->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t002_location_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t002_location_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t002_location_list->isExport()) { ?>
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
$t002_location_list->terminate();
?>