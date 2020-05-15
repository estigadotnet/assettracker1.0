<?php
namespace PHPMaker2020\p_assettracker1_0;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($t102_ho_detail_grid))
	$t102_ho_detail_grid = new t102_ho_detail_grid();

// Run the page
$t102_ho_detail_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t102_ho_detail_grid->Page_Render();
?>
<?php if (!$t102_ho_detail_grid->isExport()) { ?>
<script>
var ft102_ho_detailgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	ft102_ho_detailgrid = new ew.Form("ft102_ho_detailgrid", "grid");
	ft102_ho_detailgrid.formKeyCountName = '<?php echo $t102_ho_detail_grid->FormKeyCountName ?>';

	// Validate form
	ft102_ho_detailgrid.validate = function() {
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
			<?php if ($t102_ho_detail_grid->hohead_id->Required) { ?>
				elm = this.getElements("x" + infix + "_hohead_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_ho_detail_grid->hohead_id->caption(), $t102_ho_detail_grid->hohead_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_hohead_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t102_ho_detail_grid->hohead_id->errorMessage()) ?>");
			<?php if ($t102_ho_detail_grid->asset_id->Required) { ?>
				elm = this.getElements("x" + infix + "_asset_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_ho_detail_grid->asset_id->caption(), $t102_ho_detail_grid->asset_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_asset_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t102_ho_detail_grid->asset_id->errorMessage()) ?>");
			<?php if ($t102_ho_detail_grid->proc_date->Required) { ?>
				elm = this.getElements("x" + infix + "_proc_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_ho_detail_grid->proc_date->caption(), $t102_ho_detail_grid->proc_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_proc_date");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t102_ho_detail_grid->proc_date->errorMessage()) ?>");
			<?php if ($t102_ho_detail_grid->proc_ccost->Required) { ?>
				elm = this.getElements("x" + infix + "_proc_ccost");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_ho_detail_grid->proc_ccost->caption(), $t102_ho_detail_grid->proc_ccost->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_proc_ccost");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t102_ho_detail_grid->proc_ccost->errorMessage()) ?>");
			<?php if ($t102_ho_detail_grid->dep_amount->Required) { ?>
				elm = this.getElements("x" + infix + "_dep_amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_ho_detail_grid->dep_amount->caption(), $t102_ho_detail_grid->dep_amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_dep_amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t102_ho_detail_grid->dep_amount->errorMessage()) ?>");
			<?php if ($t102_ho_detail_grid->dep_ytd->Required) { ?>
				elm = this.getElements("x" + infix + "_dep_ytd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_ho_detail_grid->dep_ytd->caption(), $t102_ho_detail_grid->dep_ytd->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_dep_ytd");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t102_ho_detail_grid->dep_ytd->errorMessage()) ?>");
			<?php if ($t102_ho_detail_grid->nb_val->Required) { ?>
				elm = this.getElements("x" + infix + "_nb_val");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_ho_detail_grid->nb_val->caption(), $t102_ho_detail_grid->nb_val->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_nb_val");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t102_ho_detail_grid->nb_val->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	ft102_ho_detailgrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "hohead_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "asset_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "proc_date", false)) return false;
		if (ew.valueChanged(fobj, infix, "proc_ccost", false)) return false;
		if (ew.valueChanged(fobj, infix, "dep_amount", false)) return false;
		if (ew.valueChanged(fobj, infix, "dep_ytd", false)) return false;
		if (ew.valueChanged(fobj, infix, "nb_val", false)) return false;
		return true;
	}

	// Form_CustomValidate
	ft102_ho_detailgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft102_ho_detailgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft102_ho_detailgrid");
});
</script>
<?php } ?>
<?php
$t102_ho_detail_grid->renderOtherOptions();
?>
<?php if ($t102_ho_detail_grid->TotalRecords > 0 || $t102_ho_detail->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t102_ho_detail_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t102_ho_detail">
<div id="ft102_ho_detailgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_t102_ho_detail" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_t102_ho_detailgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t102_ho_detail->RowType = ROWTYPE_HEADER;

// Render list options
$t102_ho_detail_grid->renderListOptions();

// Render list options (header, left)
$t102_ho_detail_grid->ListOptions->render("header", "left");
?>
<?php if ($t102_ho_detail_grid->hohead_id->Visible) { // hohead_id ?>
	<?php if ($t102_ho_detail_grid->SortUrl($t102_ho_detail_grid->hohead_id) == "") { ?>
		<th data-name="hohead_id" class="<?php echo $t102_ho_detail_grid->hohead_id->headerCellClass() ?>"><div id="elh_t102_ho_detail_hohead_id" class="t102_ho_detail_hohead_id"><div class="ew-table-header-caption"><?php echo $t102_ho_detail_grid->hohead_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hohead_id" class="<?php echo $t102_ho_detail_grid->hohead_id->headerCellClass() ?>"><div><div id="elh_t102_ho_detail_hohead_id" class="t102_ho_detail_hohead_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_ho_detail_grid->hohead_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_ho_detail_grid->hohead_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t102_ho_detail_grid->hohead_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_ho_detail_grid->asset_id->Visible) { // asset_id ?>
	<?php if ($t102_ho_detail_grid->SortUrl($t102_ho_detail_grid->asset_id) == "") { ?>
		<th data-name="asset_id" class="<?php echo $t102_ho_detail_grid->asset_id->headerCellClass() ?>"><div id="elh_t102_ho_detail_asset_id" class="t102_ho_detail_asset_id"><div class="ew-table-header-caption"><?php echo $t102_ho_detail_grid->asset_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="asset_id" class="<?php echo $t102_ho_detail_grid->asset_id->headerCellClass() ?>"><div><div id="elh_t102_ho_detail_asset_id" class="t102_ho_detail_asset_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_ho_detail_grid->asset_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_ho_detail_grid->asset_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t102_ho_detail_grid->asset_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_ho_detail_grid->proc_date->Visible) { // proc_date ?>
	<?php if ($t102_ho_detail_grid->SortUrl($t102_ho_detail_grid->proc_date) == "") { ?>
		<th data-name="proc_date" class="<?php echo $t102_ho_detail_grid->proc_date->headerCellClass() ?>"><div id="elh_t102_ho_detail_proc_date" class="t102_ho_detail_proc_date"><div class="ew-table-header-caption"><?php echo $t102_ho_detail_grid->proc_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="proc_date" class="<?php echo $t102_ho_detail_grid->proc_date->headerCellClass() ?>"><div><div id="elh_t102_ho_detail_proc_date" class="t102_ho_detail_proc_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_ho_detail_grid->proc_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_ho_detail_grid->proc_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t102_ho_detail_grid->proc_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_ho_detail_grid->proc_ccost->Visible) { // proc_ccost ?>
	<?php if ($t102_ho_detail_grid->SortUrl($t102_ho_detail_grid->proc_ccost) == "") { ?>
		<th data-name="proc_ccost" class="<?php echo $t102_ho_detail_grid->proc_ccost->headerCellClass() ?>"><div id="elh_t102_ho_detail_proc_ccost" class="t102_ho_detail_proc_ccost"><div class="ew-table-header-caption"><?php echo $t102_ho_detail_grid->proc_ccost->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="proc_ccost" class="<?php echo $t102_ho_detail_grid->proc_ccost->headerCellClass() ?>"><div><div id="elh_t102_ho_detail_proc_ccost" class="t102_ho_detail_proc_ccost">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_ho_detail_grid->proc_ccost->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_ho_detail_grid->proc_ccost->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t102_ho_detail_grid->proc_ccost->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_ho_detail_grid->dep_amount->Visible) { // dep_amount ?>
	<?php if ($t102_ho_detail_grid->SortUrl($t102_ho_detail_grid->dep_amount) == "") { ?>
		<th data-name="dep_amount" class="<?php echo $t102_ho_detail_grid->dep_amount->headerCellClass() ?>"><div id="elh_t102_ho_detail_dep_amount" class="t102_ho_detail_dep_amount"><div class="ew-table-header-caption"><?php echo $t102_ho_detail_grid->dep_amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dep_amount" class="<?php echo $t102_ho_detail_grid->dep_amount->headerCellClass() ?>"><div><div id="elh_t102_ho_detail_dep_amount" class="t102_ho_detail_dep_amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_ho_detail_grid->dep_amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_ho_detail_grid->dep_amount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t102_ho_detail_grid->dep_amount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_ho_detail_grid->dep_ytd->Visible) { // dep_ytd ?>
	<?php if ($t102_ho_detail_grid->SortUrl($t102_ho_detail_grid->dep_ytd) == "") { ?>
		<th data-name="dep_ytd" class="<?php echo $t102_ho_detail_grid->dep_ytd->headerCellClass() ?>"><div id="elh_t102_ho_detail_dep_ytd" class="t102_ho_detail_dep_ytd"><div class="ew-table-header-caption"><?php echo $t102_ho_detail_grid->dep_ytd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dep_ytd" class="<?php echo $t102_ho_detail_grid->dep_ytd->headerCellClass() ?>"><div><div id="elh_t102_ho_detail_dep_ytd" class="t102_ho_detail_dep_ytd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_ho_detail_grid->dep_ytd->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_ho_detail_grid->dep_ytd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t102_ho_detail_grid->dep_ytd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_ho_detail_grid->nb_val->Visible) { // nb_val ?>
	<?php if ($t102_ho_detail_grid->SortUrl($t102_ho_detail_grid->nb_val) == "") { ?>
		<th data-name="nb_val" class="<?php echo $t102_ho_detail_grid->nb_val->headerCellClass() ?>"><div id="elh_t102_ho_detail_nb_val" class="t102_ho_detail_nb_val"><div class="ew-table-header-caption"><?php echo $t102_ho_detail_grid->nb_val->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nb_val" class="<?php echo $t102_ho_detail_grid->nb_val->headerCellClass() ?>"><div><div id="elh_t102_ho_detail_nb_val" class="t102_ho_detail_nb_val">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_ho_detail_grid->nb_val->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_ho_detail_grid->nb_val->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t102_ho_detail_grid->nb_val->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t102_ho_detail_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$t102_ho_detail_grid->StartRecord = 1;
$t102_ho_detail_grid->StopRecord = $t102_ho_detail_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($t102_ho_detail->isConfirm() || $t102_ho_detail_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t102_ho_detail_grid->FormKeyCountName) && ($t102_ho_detail_grid->isGridAdd() || $t102_ho_detail_grid->isGridEdit() || $t102_ho_detail->isConfirm())) {
		$t102_ho_detail_grid->KeyCount = $CurrentForm->getValue($t102_ho_detail_grid->FormKeyCountName);
		$t102_ho_detail_grid->StopRecord = $t102_ho_detail_grid->StartRecord + $t102_ho_detail_grid->KeyCount - 1;
	}
}
$t102_ho_detail_grid->RecordCount = $t102_ho_detail_grid->StartRecord - 1;
if ($t102_ho_detail_grid->Recordset && !$t102_ho_detail_grid->Recordset->EOF) {
	$t102_ho_detail_grid->Recordset->moveFirst();
	$selectLimit = $t102_ho_detail_grid->UseSelectLimit;
	if (!$selectLimit && $t102_ho_detail_grid->StartRecord > 1)
		$t102_ho_detail_grid->Recordset->move($t102_ho_detail_grid->StartRecord - 1);
} elseif (!$t102_ho_detail->AllowAddDeleteRow && $t102_ho_detail_grid->StopRecord == 0) {
	$t102_ho_detail_grid->StopRecord = $t102_ho_detail->GridAddRowCount;
}

// Initialize aggregate
$t102_ho_detail->RowType = ROWTYPE_AGGREGATEINIT;
$t102_ho_detail->resetAttributes();
$t102_ho_detail_grid->renderRow();
if ($t102_ho_detail_grid->isGridAdd())
	$t102_ho_detail_grid->RowIndex = 0;
if ($t102_ho_detail_grid->isGridEdit())
	$t102_ho_detail_grid->RowIndex = 0;
while ($t102_ho_detail_grid->RecordCount < $t102_ho_detail_grid->StopRecord) {
	$t102_ho_detail_grid->RecordCount++;
	if ($t102_ho_detail_grid->RecordCount >= $t102_ho_detail_grid->StartRecord) {
		$t102_ho_detail_grid->RowCount++;
		if ($t102_ho_detail_grid->isGridAdd() || $t102_ho_detail_grid->isGridEdit() || $t102_ho_detail->isConfirm()) {
			$t102_ho_detail_grid->RowIndex++;
			$CurrentForm->Index = $t102_ho_detail_grid->RowIndex;
			if ($CurrentForm->hasValue($t102_ho_detail_grid->FormActionName) && ($t102_ho_detail->isConfirm() || $t102_ho_detail_grid->EventCancelled))
				$t102_ho_detail_grid->RowAction = strval($CurrentForm->getValue($t102_ho_detail_grid->FormActionName));
			elseif ($t102_ho_detail_grid->isGridAdd())
				$t102_ho_detail_grid->RowAction = "insert";
			else
				$t102_ho_detail_grid->RowAction = "";
		}

		// Set up key count
		$t102_ho_detail_grid->KeyCount = $t102_ho_detail_grid->RowIndex;

		// Init row class and style
		$t102_ho_detail->resetAttributes();
		$t102_ho_detail->CssClass = "";
		if ($t102_ho_detail_grid->isGridAdd()) {
			if ($t102_ho_detail->CurrentMode == "copy") {
				$t102_ho_detail_grid->loadRowValues($t102_ho_detail_grid->Recordset); // Load row values
				$t102_ho_detail_grid->setRecordKey($t102_ho_detail_grid->RowOldKey, $t102_ho_detail_grid->Recordset); // Set old record key
			} else {
				$t102_ho_detail_grid->loadRowValues(); // Load default values
				$t102_ho_detail_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$t102_ho_detail_grid->loadRowValues($t102_ho_detail_grid->Recordset); // Load row values
		}
		$t102_ho_detail->RowType = ROWTYPE_VIEW; // Render view
		if ($t102_ho_detail_grid->isGridAdd()) // Grid add
			$t102_ho_detail->RowType = ROWTYPE_ADD; // Render add
		if ($t102_ho_detail_grid->isGridAdd() && $t102_ho_detail->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t102_ho_detail_grid->restoreCurrentRowFormValues($t102_ho_detail_grid->RowIndex); // Restore form values
		if ($t102_ho_detail_grid->isGridEdit()) { // Grid edit
			if ($t102_ho_detail->EventCancelled)
				$t102_ho_detail_grid->restoreCurrentRowFormValues($t102_ho_detail_grid->RowIndex); // Restore form values
			if ($t102_ho_detail_grid->RowAction == "insert")
				$t102_ho_detail->RowType = ROWTYPE_ADD; // Render add
			else
				$t102_ho_detail->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t102_ho_detail_grid->isGridEdit() && ($t102_ho_detail->RowType == ROWTYPE_EDIT || $t102_ho_detail->RowType == ROWTYPE_ADD) && $t102_ho_detail->EventCancelled) // Update failed
			$t102_ho_detail_grid->restoreCurrentRowFormValues($t102_ho_detail_grid->RowIndex); // Restore form values
		if ($t102_ho_detail->RowType == ROWTYPE_EDIT) // Edit row
			$t102_ho_detail_grid->EditRowCount++;
		if ($t102_ho_detail->isConfirm()) // Confirm row
			$t102_ho_detail_grid->restoreCurrentRowFormValues($t102_ho_detail_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$t102_ho_detail->RowAttrs->merge(["data-rowindex" => $t102_ho_detail_grid->RowCount, "id" => "r" . $t102_ho_detail_grid->RowCount . "_t102_ho_detail", "data-rowtype" => $t102_ho_detail->RowType]);

		// Render row
		$t102_ho_detail_grid->renderRow();

		// Render list options
		$t102_ho_detail_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t102_ho_detail_grid->RowAction != "delete" && $t102_ho_detail_grid->RowAction != "insertdelete" && !($t102_ho_detail_grid->RowAction == "insert" && $t102_ho_detail->isConfirm() && $t102_ho_detail_grid->emptyRow())) {
?>
	<tr <?php echo $t102_ho_detail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t102_ho_detail_grid->ListOptions->render("body", "left", $t102_ho_detail_grid->RowCount);
?>
	<?php if ($t102_ho_detail_grid->hohead_id->Visible) { // hohead_id ?>
		<td data-name="hohead_id" <?php echo $t102_ho_detail_grid->hohead_id->cellAttributes() ?>>
<?php if ($t102_ho_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($t102_ho_detail_grid->hohead_id->getSessionValue() != "") { ?>
<span id="el<?php echo $t102_ho_detail_grid->RowCount ?>_t102_ho_detail_hohead_id" class="form-group">
<span<?php echo $t102_ho_detail_grid->hohead_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t102_ho_detail_grid->hohead_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_hohead_id" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_hohead_id" value="<?php echo HtmlEncode($t102_ho_detail_grid->hohead_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $t102_ho_detail_grid->RowCount ?>_t102_ho_detail_hohead_id" class="form-group">
<input type="text" data-table="t102_ho_detail" data-field="x_hohead_id" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_hohead_id" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_hohead_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t102_ho_detail_grid->hohead_id->getPlaceHolder()) ?>" value="<?php echo $t102_ho_detail_grid->hohead_id->EditValue ?>"<?php echo $t102_ho_detail_grid->hohead_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="t102_ho_detail" data-field="x_hohead_id" name="o<?php echo $t102_ho_detail_grid->RowIndex ?>_hohead_id" id="o<?php echo $t102_ho_detail_grid->RowIndex ?>_hohead_id" value="<?php echo HtmlEncode($t102_ho_detail_grid->hohead_id->OldValue) ?>">
<?php } ?>
<?php if ($t102_ho_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($t102_ho_detail_grid->hohead_id->getSessionValue() != "") { ?>
<span id="el<?php echo $t102_ho_detail_grid->RowCount ?>_t102_ho_detail_hohead_id" class="form-group">
<span<?php echo $t102_ho_detail_grid->hohead_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t102_ho_detail_grid->hohead_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_hohead_id" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_hohead_id" value="<?php echo HtmlEncode($t102_ho_detail_grid->hohead_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $t102_ho_detail_grid->RowCount ?>_t102_ho_detail_hohead_id" class="form-group">
<input type="text" data-table="t102_ho_detail" data-field="x_hohead_id" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_hohead_id" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_hohead_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t102_ho_detail_grid->hohead_id->getPlaceHolder()) ?>" value="<?php echo $t102_ho_detail_grid->hohead_id->EditValue ?>"<?php echo $t102_ho_detail_grid->hohead_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($t102_ho_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_ho_detail_grid->RowCount ?>_t102_ho_detail_hohead_id">
<span<?php echo $t102_ho_detail_grid->hohead_id->viewAttributes() ?>><?php echo $t102_ho_detail_grid->hohead_id->getViewValue() ?></span>
</span>
<?php if (!$t102_ho_detail->isConfirm()) { ?>
<input type="hidden" data-table="t102_ho_detail" data-field="x_hohead_id" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_hohead_id" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_hohead_id" value="<?php echo HtmlEncode($t102_ho_detail_grid->hohead_id->FormValue) ?>">
<input type="hidden" data-table="t102_ho_detail" data-field="x_hohead_id" name="o<?php echo $t102_ho_detail_grid->RowIndex ?>_hohead_id" id="o<?php echo $t102_ho_detail_grid->RowIndex ?>_hohead_id" value="<?php echo HtmlEncode($t102_ho_detail_grid->hohead_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t102_ho_detail" data-field="x_hohead_id" name="ft102_ho_detailgrid$x<?php echo $t102_ho_detail_grid->RowIndex ?>_hohead_id" id="ft102_ho_detailgrid$x<?php echo $t102_ho_detail_grid->RowIndex ?>_hohead_id" value="<?php echo HtmlEncode($t102_ho_detail_grid->hohead_id->FormValue) ?>">
<input type="hidden" data-table="t102_ho_detail" data-field="x_hohead_id" name="ft102_ho_detailgrid$o<?php echo $t102_ho_detail_grid->RowIndex ?>_hohead_id" id="ft102_ho_detailgrid$o<?php echo $t102_ho_detail_grid->RowIndex ?>_hohead_id" value="<?php echo HtmlEncode($t102_ho_detail_grid->hohead_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t102_ho_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t102_ho_detail" data-field="x_id" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_id" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t102_ho_detail_grid->id->CurrentValue) ?>">
<input type="hidden" data-table="t102_ho_detail" data-field="x_id" name="o<?php echo $t102_ho_detail_grid->RowIndex ?>_id" id="o<?php echo $t102_ho_detail_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t102_ho_detail_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($t102_ho_detail->RowType == ROWTYPE_EDIT || $t102_ho_detail->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t102_ho_detail" data-field="x_id" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_id" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t102_ho_detail_grid->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($t102_ho_detail_grid->asset_id->Visible) { // asset_id ?>
		<td data-name="asset_id" <?php echo $t102_ho_detail_grid->asset_id->cellAttributes() ?>>
<?php if ($t102_ho_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_ho_detail_grid->RowCount ?>_t102_ho_detail_asset_id" class="form-group">
<input type="text" data-table="t102_ho_detail" data-field="x_asset_id" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_asset_id" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_asset_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t102_ho_detail_grid->asset_id->getPlaceHolder()) ?>" value="<?php echo $t102_ho_detail_grid->asset_id->EditValue ?>"<?php echo $t102_ho_detail_grid->asset_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_ho_detail" data-field="x_asset_id" name="o<?php echo $t102_ho_detail_grid->RowIndex ?>_asset_id" id="o<?php echo $t102_ho_detail_grid->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t102_ho_detail_grid->asset_id->OldValue) ?>">
<?php } ?>
<?php if ($t102_ho_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_ho_detail_grid->RowCount ?>_t102_ho_detail_asset_id" class="form-group">
<input type="text" data-table="t102_ho_detail" data-field="x_asset_id" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_asset_id" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_asset_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t102_ho_detail_grid->asset_id->getPlaceHolder()) ?>" value="<?php echo $t102_ho_detail_grid->asset_id->EditValue ?>"<?php echo $t102_ho_detail_grid->asset_id->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t102_ho_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_ho_detail_grid->RowCount ?>_t102_ho_detail_asset_id">
<span<?php echo $t102_ho_detail_grid->asset_id->viewAttributes() ?>><?php echo $t102_ho_detail_grid->asset_id->getViewValue() ?></span>
</span>
<?php if (!$t102_ho_detail->isConfirm()) { ?>
<input type="hidden" data-table="t102_ho_detail" data-field="x_asset_id" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_asset_id" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t102_ho_detail_grid->asset_id->FormValue) ?>">
<input type="hidden" data-table="t102_ho_detail" data-field="x_asset_id" name="o<?php echo $t102_ho_detail_grid->RowIndex ?>_asset_id" id="o<?php echo $t102_ho_detail_grid->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t102_ho_detail_grid->asset_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t102_ho_detail" data-field="x_asset_id" name="ft102_ho_detailgrid$x<?php echo $t102_ho_detail_grid->RowIndex ?>_asset_id" id="ft102_ho_detailgrid$x<?php echo $t102_ho_detail_grid->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t102_ho_detail_grid->asset_id->FormValue) ?>">
<input type="hidden" data-table="t102_ho_detail" data-field="x_asset_id" name="ft102_ho_detailgrid$o<?php echo $t102_ho_detail_grid->RowIndex ?>_asset_id" id="ft102_ho_detailgrid$o<?php echo $t102_ho_detail_grid->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t102_ho_detail_grid->asset_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t102_ho_detail_grid->proc_date->Visible) { // proc_date ?>
		<td data-name="proc_date" <?php echo $t102_ho_detail_grid->proc_date->cellAttributes() ?>>
<?php if ($t102_ho_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_ho_detail_grid->RowCount ?>_t102_ho_detail_proc_date" class="form-group">
<input type="text" data-table="t102_ho_detail" data-field="x_proc_date" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_date" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_date" maxlength="10" placeholder="<?php echo HtmlEncode($t102_ho_detail_grid->proc_date->getPlaceHolder()) ?>" value="<?php echo $t102_ho_detail_grid->proc_date->EditValue ?>"<?php echo $t102_ho_detail_grid->proc_date->editAttributes() ?>>
<?php if (!$t102_ho_detail_grid->proc_date->ReadOnly && !$t102_ho_detail_grid->proc_date->Disabled && !isset($t102_ho_detail_grid->proc_date->EditAttrs["readonly"]) && !isset($t102_ho_detail_grid->proc_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft102_ho_detailgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("ft102_ho_detailgrid", "x<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="t102_ho_detail" data-field="x_proc_date" name="o<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_date" id="o<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_date" value="<?php echo HtmlEncode($t102_ho_detail_grid->proc_date->OldValue) ?>">
<?php } ?>
<?php if ($t102_ho_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_ho_detail_grid->RowCount ?>_t102_ho_detail_proc_date" class="form-group">
<input type="text" data-table="t102_ho_detail" data-field="x_proc_date" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_date" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_date" maxlength="10" placeholder="<?php echo HtmlEncode($t102_ho_detail_grid->proc_date->getPlaceHolder()) ?>" value="<?php echo $t102_ho_detail_grid->proc_date->EditValue ?>"<?php echo $t102_ho_detail_grid->proc_date->editAttributes() ?>>
<?php if (!$t102_ho_detail_grid->proc_date->ReadOnly && !$t102_ho_detail_grid->proc_date->Disabled && !isset($t102_ho_detail_grid->proc_date->EditAttrs["readonly"]) && !isset($t102_ho_detail_grid->proc_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft102_ho_detailgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("ft102_ho_detailgrid", "x<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($t102_ho_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_ho_detail_grid->RowCount ?>_t102_ho_detail_proc_date">
<span<?php echo $t102_ho_detail_grid->proc_date->viewAttributes() ?>><?php echo $t102_ho_detail_grid->proc_date->getViewValue() ?></span>
</span>
<?php if (!$t102_ho_detail->isConfirm()) { ?>
<input type="hidden" data-table="t102_ho_detail" data-field="x_proc_date" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_date" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_date" value="<?php echo HtmlEncode($t102_ho_detail_grid->proc_date->FormValue) ?>">
<input type="hidden" data-table="t102_ho_detail" data-field="x_proc_date" name="o<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_date" id="o<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_date" value="<?php echo HtmlEncode($t102_ho_detail_grid->proc_date->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t102_ho_detail" data-field="x_proc_date" name="ft102_ho_detailgrid$x<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_date" id="ft102_ho_detailgrid$x<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_date" value="<?php echo HtmlEncode($t102_ho_detail_grid->proc_date->FormValue) ?>">
<input type="hidden" data-table="t102_ho_detail" data-field="x_proc_date" name="ft102_ho_detailgrid$o<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_date" id="ft102_ho_detailgrid$o<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_date" value="<?php echo HtmlEncode($t102_ho_detail_grid->proc_date->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t102_ho_detail_grid->proc_ccost->Visible) { // proc_ccost ?>
		<td data-name="proc_ccost" <?php echo $t102_ho_detail_grid->proc_ccost->cellAttributes() ?>>
<?php if ($t102_ho_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_ho_detail_grid->RowCount ?>_t102_ho_detail_proc_ccost" class="form-group">
<input type="text" data-table="t102_ho_detail" data-field="x_proc_ccost" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_ccost" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_ccost" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t102_ho_detail_grid->proc_ccost->getPlaceHolder()) ?>" value="<?php echo $t102_ho_detail_grid->proc_ccost->EditValue ?>"<?php echo $t102_ho_detail_grid->proc_ccost->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_ho_detail" data-field="x_proc_ccost" name="o<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_ccost" id="o<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_ccost" value="<?php echo HtmlEncode($t102_ho_detail_grid->proc_ccost->OldValue) ?>">
<?php } ?>
<?php if ($t102_ho_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_ho_detail_grid->RowCount ?>_t102_ho_detail_proc_ccost" class="form-group">
<input type="text" data-table="t102_ho_detail" data-field="x_proc_ccost" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_ccost" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_ccost" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t102_ho_detail_grid->proc_ccost->getPlaceHolder()) ?>" value="<?php echo $t102_ho_detail_grid->proc_ccost->EditValue ?>"<?php echo $t102_ho_detail_grid->proc_ccost->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t102_ho_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_ho_detail_grid->RowCount ?>_t102_ho_detail_proc_ccost">
<span<?php echo $t102_ho_detail_grid->proc_ccost->viewAttributes() ?>><?php echo $t102_ho_detail_grid->proc_ccost->getViewValue() ?></span>
</span>
<?php if (!$t102_ho_detail->isConfirm()) { ?>
<input type="hidden" data-table="t102_ho_detail" data-field="x_proc_ccost" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_ccost" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_ccost" value="<?php echo HtmlEncode($t102_ho_detail_grid->proc_ccost->FormValue) ?>">
<input type="hidden" data-table="t102_ho_detail" data-field="x_proc_ccost" name="o<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_ccost" id="o<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_ccost" value="<?php echo HtmlEncode($t102_ho_detail_grid->proc_ccost->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t102_ho_detail" data-field="x_proc_ccost" name="ft102_ho_detailgrid$x<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_ccost" id="ft102_ho_detailgrid$x<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_ccost" value="<?php echo HtmlEncode($t102_ho_detail_grid->proc_ccost->FormValue) ?>">
<input type="hidden" data-table="t102_ho_detail" data-field="x_proc_ccost" name="ft102_ho_detailgrid$o<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_ccost" id="ft102_ho_detailgrid$o<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_ccost" value="<?php echo HtmlEncode($t102_ho_detail_grid->proc_ccost->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t102_ho_detail_grid->dep_amount->Visible) { // dep_amount ?>
		<td data-name="dep_amount" <?php echo $t102_ho_detail_grid->dep_amount->cellAttributes() ?>>
<?php if ($t102_ho_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_ho_detail_grid->RowCount ?>_t102_ho_detail_dep_amount" class="form-group">
<input type="text" data-table="t102_ho_detail" data-field="x_dep_amount" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_amount" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_amount" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t102_ho_detail_grid->dep_amount->getPlaceHolder()) ?>" value="<?php echo $t102_ho_detail_grid->dep_amount->EditValue ?>"<?php echo $t102_ho_detail_grid->dep_amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_ho_detail" data-field="x_dep_amount" name="o<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_amount" id="o<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_amount" value="<?php echo HtmlEncode($t102_ho_detail_grid->dep_amount->OldValue) ?>">
<?php } ?>
<?php if ($t102_ho_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_ho_detail_grid->RowCount ?>_t102_ho_detail_dep_amount" class="form-group">
<input type="text" data-table="t102_ho_detail" data-field="x_dep_amount" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_amount" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_amount" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t102_ho_detail_grid->dep_amount->getPlaceHolder()) ?>" value="<?php echo $t102_ho_detail_grid->dep_amount->EditValue ?>"<?php echo $t102_ho_detail_grid->dep_amount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t102_ho_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_ho_detail_grid->RowCount ?>_t102_ho_detail_dep_amount">
<span<?php echo $t102_ho_detail_grid->dep_amount->viewAttributes() ?>><?php echo $t102_ho_detail_grid->dep_amount->getViewValue() ?></span>
</span>
<?php if (!$t102_ho_detail->isConfirm()) { ?>
<input type="hidden" data-table="t102_ho_detail" data-field="x_dep_amount" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_amount" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_amount" value="<?php echo HtmlEncode($t102_ho_detail_grid->dep_amount->FormValue) ?>">
<input type="hidden" data-table="t102_ho_detail" data-field="x_dep_amount" name="o<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_amount" id="o<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_amount" value="<?php echo HtmlEncode($t102_ho_detail_grid->dep_amount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t102_ho_detail" data-field="x_dep_amount" name="ft102_ho_detailgrid$x<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_amount" id="ft102_ho_detailgrid$x<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_amount" value="<?php echo HtmlEncode($t102_ho_detail_grid->dep_amount->FormValue) ?>">
<input type="hidden" data-table="t102_ho_detail" data-field="x_dep_amount" name="ft102_ho_detailgrid$o<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_amount" id="ft102_ho_detailgrid$o<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_amount" value="<?php echo HtmlEncode($t102_ho_detail_grid->dep_amount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t102_ho_detail_grid->dep_ytd->Visible) { // dep_ytd ?>
		<td data-name="dep_ytd" <?php echo $t102_ho_detail_grid->dep_ytd->cellAttributes() ?>>
<?php if ($t102_ho_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_ho_detail_grid->RowCount ?>_t102_ho_detail_dep_ytd" class="form-group">
<input type="text" data-table="t102_ho_detail" data-field="x_dep_ytd" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_ytd" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_ytd" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t102_ho_detail_grid->dep_ytd->getPlaceHolder()) ?>" value="<?php echo $t102_ho_detail_grid->dep_ytd->EditValue ?>"<?php echo $t102_ho_detail_grid->dep_ytd->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_ho_detail" data-field="x_dep_ytd" name="o<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_ytd" id="o<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_ytd" value="<?php echo HtmlEncode($t102_ho_detail_grid->dep_ytd->OldValue) ?>">
<?php } ?>
<?php if ($t102_ho_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_ho_detail_grid->RowCount ?>_t102_ho_detail_dep_ytd" class="form-group">
<input type="text" data-table="t102_ho_detail" data-field="x_dep_ytd" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_ytd" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_ytd" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t102_ho_detail_grid->dep_ytd->getPlaceHolder()) ?>" value="<?php echo $t102_ho_detail_grid->dep_ytd->EditValue ?>"<?php echo $t102_ho_detail_grid->dep_ytd->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t102_ho_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_ho_detail_grid->RowCount ?>_t102_ho_detail_dep_ytd">
<span<?php echo $t102_ho_detail_grid->dep_ytd->viewAttributes() ?>><?php echo $t102_ho_detail_grid->dep_ytd->getViewValue() ?></span>
</span>
<?php if (!$t102_ho_detail->isConfirm()) { ?>
<input type="hidden" data-table="t102_ho_detail" data-field="x_dep_ytd" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_ytd" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_ytd" value="<?php echo HtmlEncode($t102_ho_detail_grid->dep_ytd->FormValue) ?>">
<input type="hidden" data-table="t102_ho_detail" data-field="x_dep_ytd" name="o<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_ytd" id="o<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_ytd" value="<?php echo HtmlEncode($t102_ho_detail_grid->dep_ytd->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t102_ho_detail" data-field="x_dep_ytd" name="ft102_ho_detailgrid$x<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_ytd" id="ft102_ho_detailgrid$x<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_ytd" value="<?php echo HtmlEncode($t102_ho_detail_grid->dep_ytd->FormValue) ?>">
<input type="hidden" data-table="t102_ho_detail" data-field="x_dep_ytd" name="ft102_ho_detailgrid$o<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_ytd" id="ft102_ho_detailgrid$o<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_ytd" value="<?php echo HtmlEncode($t102_ho_detail_grid->dep_ytd->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t102_ho_detail_grid->nb_val->Visible) { // nb_val ?>
		<td data-name="nb_val" <?php echo $t102_ho_detail_grid->nb_val->cellAttributes() ?>>
<?php if ($t102_ho_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_ho_detail_grid->RowCount ?>_t102_ho_detail_nb_val" class="form-group">
<input type="text" data-table="t102_ho_detail" data-field="x_nb_val" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_nb_val" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_nb_val" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t102_ho_detail_grid->nb_val->getPlaceHolder()) ?>" value="<?php echo $t102_ho_detail_grid->nb_val->EditValue ?>"<?php echo $t102_ho_detail_grid->nb_val->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_ho_detail" data-field="x_nb_val" name="o<?php echo $t102_ho_detail_grid->RowIndex ?>_nb_val" id="o<?php echo $t102_ho_detail_grid->RowIndex ?>_nb_val" value="<?php echo HtmlEncode($t102_ho_detail_grid->nb_val->OldValue) ?>">
<?php } ?>
<?php if ($t102_ho_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_ho_detail_grid->RowCount ?>_t102_ho_detail_nb_val" class="form-group">
<input type="text" data-table="t102_ho_detail" data-field="x_nb_val" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_nb_val" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_nb_val" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t102_ho_detail_grid->nb_val->getPlaceHolder()) ?>" value="<?php echo $t102_ho_detail_grid->nb_val->EditValue ?>"<?php echo $t102_ho_detail_grid->nb_val->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t102_ho_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_ho_detail_grid->RowCount ?>_t102_ho_detail_nb_val">
<span<?php echo $t102_ho_detail_grid->nb_val->viewAttributes() ?>><?php echo $t102_ho_detail_grid->nb_val->getViewValue() ?></span>
</span>
<?php if (!$t102_ho_detail->isConfirm()) { ?>
<input type="hidden" data-table="t102_ho_detail" data-field="x_nb_val" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_nb_val" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_nb_val" value="<?php echo HtmlEncode($t102_ho_detail_grid->nb_val->FormValue) ?>">
<input type="hidden" data-table="t102_ho_detail" data-field="x_nb_val" name="o<?php echo $t102_ho_detail_grid->RowIndex ?>_nb_val" id="o<?php echo $t102_ho_detail_grid->RowIndex ?>_nb_val" value="<?php echo HtmlEncode($t102_ho_detail_grid->nb_val->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t102_ho_detail" data-field="x_nb_val" name="ft102_ho_detailgrid$x<?php echo $t102_ho_detail_grid->RowIndex ?>_nb_val" id="ft102_ho_detailgrid$x<?php echo $t102_ho_detail_grid->RowIndex ?>_nb_val" value="<?php echo HtmlEncode($t102_ho_detail_grid->nb_val->FormValue) ?>">
<input type="hidden" data-table="t102_ho_detail" data-field="x_nb_val" name="ft102_ho_detailgrid$o<?php echo $t102_ho_detail_grid->RowIndex ?>_nb_val" id="ft102_ho_detailgrid$o<?php echo $t102_ho_detail_grid->RowIndex ?>_nb_val" value="<?php echo HtmlEncode($t102_ho_detail_grid->nb_val->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t102_ho_detail_grid->ListOptions->render("body", "right", $t102_ho_detail_grid->RowCount);
?>
	</tr>
<?php if ($t102_ho_detail->RowType == ROWTYPE_ADD || $t102_ho_detail->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ft102_ho_detailgrid", "load"], function() {
	ft102_ho_detailgrid.updateLists(<?php echo $t102_ho_detail_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t102_ho_detail_grid->isGridAdd() || $t102_ho_detail->CurrentMode == "copy")
		if (!$t102_ho_detail_grid->Recordset->EOF)
			$t102_ho_detail_grid->Recordset->moveNext();
}
?>
<?php
	if ($t102_ho_detail->CurrentMode == "add" || $t102_ho_detail->CurrentMode == "copy" || $t102_ho_detail->CurrentMode == "edit") {
		$t102_ho_detail_grid->RowIndex = '$rowindex$';
		$t102_ho_detail_grid->loadRowValues();

		// Set row properties
		$t102_ho_detail->resetAttributes();
		$t102_ho_detail->RowAttrs->merge(["data-rowindex" => $t102_ho_detail_grid->RowIndex, "id" => "r0_t102_ho_detail", "data-rowtype" => ROWTYPE_ADD]);
		$t102_ho_detail->RowAttrs->appendClass("ew-template");
		$t102_ho_detail->RowType = ROWTYPE_ADD;

		// Render row
		$t102_ho_detail_grid->renderRow();

		// Render list options
		$t102_ho_detail_grid->renderListOptions();
		$t102_ho_detail_grid->StartRowCount = 0;
?>
	<tr <?php echo $t102_ho_detail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t102_ho_detail_grid->ListOptions->render("body", "left", $t102_ho_detail_grid->RowIndex);
?>
	<?php if ($t102_ho_detail_grid->hohead_id->Visible) { // hohead_id ?>
		<td data-name="hohead_id">
<?php if (!$t102_ho_detail->isConfirm()) { ?>
<?php if ($t102_ho_detail_grid->hohead_id->getSessionValue() != "") { ?>
<span id="el$rowindex$_t102_ho_detail_hohead_id" class="form-group t102_ho_detail_hohead_id">
<span<?php echo $t102_ho_detail_grid->hohead_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t102_ho_detail_grid->hohead_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_hohead_id" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_hohead_id" value="<?php echo HtmlEncode($t102_ho_detail_grid->hohead_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_t102_ho_detail_hohead_id" class="form-group t102_ho_detail_hohead_id">
<input type="text" data-table="t102_ho_detail" data-field="x_hohead_id" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_hohead_id" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_hohead_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t102_ho_detail_grid->hohead_id->getPlaceHolder()) ?>" value="<?php echo $t102_ho_detail_grid->hohead_id->EditValue ?>"<?php echo $t102_ho_detail_grid->hohead_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_t102_ho_detail_hohead_id" class="form-group t102_ho_detail_hohead_id">
<span<?php echo $t102_ho_detail_grid->hohead_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t102_ho_detail_grid->hohead_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t102_ho_detail" data-field="x_hohead_id" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_hohead_id" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_hohead_id" value="<?php echo HtmlEncode($t102_ho_detail_grid->hohead_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t102_ho_detail" data-field="x_hohead_id" name="o<?php echo $t102_ho_detail_grid->RowIndex ?>_hohead_id" id="o<?php echo $t102_ho_detail_grid->RowIndex ?>_hohead_id" value="<?php echo HtmlEncode($t102_ho_detail_grid->hohead_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_ho_detail_grid->asset_id->Visible) { // asset_id ?>
		<td data-name="asset_id">
<?php if (!$t102_ho_detail->isConfirm()) { ?>
<span id="el$rowindex$_t102_ho_detail_asset_id" class="form-group t102_ho_detail_asset_id">
<input type="text" data-table="t102_ho_detail" data-field="x_asset_id" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_asset_id" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_asset_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t102_ho_detail_grid->asset_id->getPlaceHolder()) ?>" value="<?php echo $t102_ho_detail_grid->asset_id->EditValue ?>"<?php echo $t102_ho_detail_grid->asset_id->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t102_ho_detail_asset_id" class="form-group t102_ho_detail_asset_id">
<span<?php echo $t102_ho_detail_grid->asset_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t102_ho_detail_grid->asset_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t102_ho_detail" data-field="x_asset_id" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_asset_id" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t102_ho_detail_grid->asset_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t102_ho_detail" data-field="x_asset_id" name="o<?php echo $t102_ho_detail_grid->RowIndex ?>_asset_id" id="o<?php echo $t102_ho_detail_grid->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t102_ho_detail_grid->asset_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_ho_detail_grid->proc_date->Visible) { // proc_date ?>
		<td data-name="proc_date">
<?php if (!$t102_ho_detail->isConfirm()) { ?>
<span id="el$rowindex$_t102_ho_detail_proc_date" class="form-group t102_ho_detail_proc_date">
<input type="text" data-table="t102_ho_detail" data-field="x_proc_date" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_date" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_date" maxlength="10" placeholder="<?php echo HtmlEncode($t102_ho_detail_grid->proc_date->getPlaceHolder()) ?>" value="<?php echo $t102_ho_detail_grid->proc_date->EditValue ?>"<?php echo $t102_ho_detail_grid->proc_date->editAttributes() ?>>
<?php if (!$t102_ho_detail_grid->proc_date->ReadOnly && !$t102_ho_detail_grid->proc_date->Disabled && !isset($t102_ho_detail_grid->proc_date->EditAttrs["readonly"]) && !isset($t102_ho_detail_grid->proc_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft102_ho_detailgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("ft102_ho_detailgrid", "x<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_t102_ho_detail_proc_date" class="form-group t102_ho_detail_proc_date">
<span<?php echo $t102_ho_detail_grid->proc_date->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t102_ho_detail_grid->proc_date->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t102_ho_detail" data-field="x_proc_date" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_date" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_date" value="<?php echo HtmlEncode($t102_ho_detail_grid->proc_date->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t102_ho_detail" data-field="x_proc_date" name="o<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_date" id="o<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_date" value="<?php echo HtmlEncode($t102_ho_detail_grid->proc_date->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_ho_detail_grid->proc_ccost->Visible) { // proc_ccost ?>
		<td data-name="proc_ccost">
<?php if (!$t102_ho_detail->isConfirm()) { ?>
<span id="el$rowindex$_t102_ho_detail_proc_ccost" class="form-group t102_ho_detail_proc_ccost">
<input type="text" data-table="t102_ho_detail" data-field="x_proc_ccost" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_ccost" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_ccost" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t102_ho_detail_grid->proc_ccost->getPlaceHolder()) ?>" value="<?php echo $t102_ho_detail_grid->proc_ccost->EditValue ?>"<?php echo $t102_ho_detail_grid->proc_ccost->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t102_ho_detail_proc_ccost" class="form-group t102_ho_detail_proc_ccost">
<span<?php echo $t102_ho_detail_grid->proc_ccost->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t102_ho_detail_grid->proc_ccost->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t102_ho_detail" data-field="x_proc_ccost" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_ccost" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_ccost" value="<?php echo HtmlEncode($t102_ho_detail_grid->proc_ccost->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t102_ho_detail" data-field="x_proc_ccost" name="o<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_ccost" id="o<?php echo $t102_ho_detail_grid->RowIndex ?>_proc_ccost" value="<?php echo HtmlEncode($t102_ho_detail_grid->proc_ccost->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_ho_detail_grid->dep_amount->Visible) { // dep_amount ?>
		<td data-name="dep_amount">
<?php if (!$t102_ho_detail->isConfirm()) { ?>
<span id="el$rowindex$_t102_ho_detail_dep_amount" class="form-group t102_ho_detail_dep_amount">
<input type="text" data-table="t102_ho_detail" data-field="x_dep_amount" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_amount" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_amount" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t102_ho_detail_grid->dep_amount->getPlaceHolder()) ?>" value="<?php echo $t102_ho_detail_grid->dep_amount->EditValue ?>"<?php echo $t102_ho_detail_grid->dep_amount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t102_ho_detail_dep_amount" class="form-group t102_ho_detail_dep_amount">
<span<?php echo $t102_ho_detail_grid->dep_amount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t102_ho_detail_grid->dep_amount->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t102_ho_detail" data-field="x_dep_amount" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_amount" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_amount" value="<?php echo HtmlEncode($t102_ho_detail_grid->dep_amount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t102_ho_detail" data-field="x_dep_amount" name="o<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_amount" id="o<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_amount" value="<?php echo HtmlEncode($t102_ho_detail_grid->dep_amount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_ho_detail_grid->dep_ytd->Visible) { // dep_ytd ?>
		<td data-name="dep_ytd">
<?php if (!$t102_ho_detail->isConfirm()) { ?>
<span id="el$rowindex$_t102_ho_detail_dep_ytd" class="form-group t102_ho_detail_dep_ytd">
<input type="text" data-table="t102_ho_detail" data-field="x_dep_ytd" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_ytd" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_ytd" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t102_ho_detail_grid->dep_ytd->getPlaceHolder()) ?>" value="<?php echo $t102_ho_detail_grid->dep_ytd->EditValue ?>"<?php echo $t102_ho_detail_grid->dep_ytd->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t102_ho_detail_dep_ytd" class="form-group t102_ho_detail_dep_ytd">
<span<?php echo $t102_ho_detail_grid->dep_ytd->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t102_ho_detail_grid->dep_ytd->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t102_ho_detail" data-field="x_dep_ytd" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_ytd" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_ytd" value="<?php echo HtmlEncode($t102_ho_detail_grid->dep_ytd->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t102_ho_detail" data-field="x_dep_ytd" name="o<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_ytd" id="o<?php echo $t102_ho_detail_grid->RowIndex ?>_dep_ytd" value="<?php echo HtmlEncode($t102_ho_detail_grid->dep_ytd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_ho_detail_grid->nb_val->Visible) { // nb_val ?>
		<td data-name="nb_val">
<?php if (!$t102_ho_detail->isConfirm()) { ?>
<span id="el$rowindex$_t102_ho_detail_nb_val" class="form-group t102_ho_detail_nb_val">
<input type="text" data-table="t102_ho_detail" data-field="x_nb_val" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_nb_val" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_nb_val" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t102_ho_detail_grid->nb_val->getPlaceHolder()) ?>" value="<?php echo $t102_ho_detail_grid->nb_val->EditValue ?>"<?php echo $t102_ho_detail_grid->nb_val->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t102_ho_detail_nb_val" class="form-group t102_ho_detail_nb_val">
<span<?php echo $t102_ho_detail_grid->nb_val->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t102_ho_detail_grid->nb_val->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t102_ho_detail" data-field="x_nb_val" name="x<?php echo $t102_ho_detail_grid->RowIndex ?>_nb_val" id="x<?php echo $t102_ho_detail_grid->RowIndex ?>_nb_val" value="<?php echo HtmlEncode($t102_ho_detail_grid->nb_val->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t102_ho_detail" data-field="x_nb_val" name="o<?php echo $t102_ho_detail_grid->RowIndex ?>_nb_val" id="o<?php echo $t102_ho_detail_grid->RowIndex ?>_nb_val" value="<?php echo HtmlEncode($t102_ho_detail_grid->nb_val->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t102_ho_detail_grid->ListOptions->render("body", "right", $t102_ho_detail_grid->RowIndex);
?>
<script>
loadjs.ready(["ft102_ho_detailgrid", "load"], function() {
	ft102_ho_detailgrid.updateLists(<?php echo $t102_ho_detail_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($t102_ho_detail->CurrentMode == "add" || $t102_ho_detail->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $t102_ho_detail_grid->FormKeyCountName ?>" id="<?php echo $t102_ho_detail_grid->FormKeyCountName ?>" value="<?php echo $t102_ho_detail_grid->KeyCount ?>">
<?php echo $t102_ho_detail_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($t102_ho_detail->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $t102_ho_detail_grid->FormKeyCountName ?>" id="<?php echo $t102_ho_detail_grid->FormKeyCountName ?>" value="<?php echo $t102_ho_detail_grid->KeyCount ?>">
<?php echo $t102_ho_detail_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($t102_ho_detail->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="ft102_ho_detailgrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t102_ho_detail_grid->Recordset)
	$t102_ho_detail_grid->Recordset->Close();
?>
<?php if ($t102_ho_detail_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $t102_ho_detail_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t102_ho_detail_grid->TotalRecords == 0 && !$t102_ho_detail->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t102_ho_detail_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$t102_ho_detail_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php
$t102_ho_detail_grid->terminate();
?>