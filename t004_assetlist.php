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
$t004_asset_list = new t004_asset_list();

// Run the page
$t004_asset_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t004_asset_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t004_asset_list->isExport()) { ?>
<script>
var ft004_assetlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft004_assetlist = currentForm = new ew.Form("ft004_assetlist", "list");
	ft004_assetlist.formKeyCountName = '<?php echo $t004_asset_list->FormKeyCountName ?>';

	// Validate form
	ft004_assetlist.validate = function() {
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
			<?php if ($t004_asset_list->property_id->Required) { ?>
				elm = this.getElements("x" + infix + "_property_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_asset_list->property_id->caption(), $t004_asset_list->property_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t004_asset_list->location_id->Required) { ?>
				elm = this.getElements("x" + infix + "_location_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_asset_list->location_id->caption(), $t004_asset_list->location_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t004_asset_list->signature_id->Required) { ?>
				elm = this.getElements("x" + infix + "_signature_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_asset_list->signature_id->caption(), $t004_asset_list->signature_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t004_asset_list->Asset->Required) { ?>
				elm = this.getElements("x" + infix + "_Asset");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_asset_list->Asset->caption(), $t004_asset_list->Asset->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t004_asset_list->Periode->Required) { ?>
				elm = this.getElements("x" + infix + "_Periode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_asset_list->Periode->caption(), $t004_asset_list->Periode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Periode");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t004_asset_list->Periode->errorMessage()) ?>");
			<?php if ($t004_asset_list->Qty->Required) { ?>
				elm = this.getElements("x" + infix + "_Qty");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_asset_list->Qty->caption(), $t004_asset_list->Qty->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Qty");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t004_asset_list->Qty->errorMessage()) ?>");

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
	ft004_assetlist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "property_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "location_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "signature_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "Asset", false)) return false;
		if (ew.valueChanged(fobj, infix, "Periode", false)) return false;
		if (ew.valueChanged(fobj, infix, "Qty", false)) return false;
		return true;
	}

	// Form_CustomValidate
	ft004_assetlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft004_assetlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft004_assetlist.lists["x_property_id"] = <?php echo $t004_asset_list->property_id->Lookup->toClientList($t004_asset_list) ?>;
	ft004_assetlist.lists["x_property_id"].options = <?php echo JsonEncode($t004_asset_list->property_id->lookupOptions()) ?>;
	ft004_assetlist.lists["x_location_id"] = <?php echo $t004_asset_list->location_id->Lookup->toClientList($t004_asset_list) ?>;
	ft004_assetlist.lists["x_location_id"].options = <?php echo JsonEncode($t004_asset_list->location_id->lookupOptions()) ?>;
	ft004_assetlist.lists["x_signature_id"] = <?php echo $t004_asset_list->signature_id->Lookup->toClientList($t004_asset_list) ?>;
	ft004_assetlist.lists["x_signature_id"].options = <?php echo JsonEncode($t004_asset_list->signature_id->lookupOptions()) ?>;
	loadjs.done("ft004_assetlist");
});
var ft004_assetlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft004_assetlistsrch = currentSearchForm = new ew.Form("ft004_assetlistsrch");

	// Dynamic selection lists
	// Filters

	ft004_assetlistsrch.filterList = <?php echo $t004_asset_list->getFilterList() ?>;
	loadjs.done("ft004_assetlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t004_asset_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t004_asset_list->TotalRecords > 0 && $t004_asset_list->ExportOptions->visible()) { ?>
<?php $t004_asset_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t004_asset_list->ImportOptions->visible()) { ?>
<?php $t004_asset_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t004_asset_list->SearchOptions->visible()) { ?>
<?php $t004_asset_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t004_asset_list->FilterOptions->visible()) { ?>
<?php $t004_asset_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t004_asset_list->renderOtherOptions();
?>
<?php $t004_asset_list->showPageHeader(); ?>
<?php
$t004_asset_list->showMessage();
?>
<?php if ($t004_asset_list->TotalRecords > 0 || $t004_asset->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t004_asset_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t004_asset">
<form name="ft004_assetlist" id="ft004_assetlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t004_asset">
<div id="gmp_t004_asset" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t004_asset_list->TotalRecords > 0 || $t004_asset_list->isGridEdit()) { ?>
<table id="tbl_t004_assetlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t004_asset->RowType = ROWTYPE_HEADER;

// Render list options
$t004_asset_list->renderListOptions();

// Render list options (header, left)
$t004_asset_list->ListOptions->render("header", "left");
?>
<?php if ($t004_asset_list->property_id->Visible) { // property_id ?>
	<?php if ($t004_asset_list->SortUrl($t004_asset_list->property_id) == "") { ?>
		<th data-name="property_id" class="<?php echo $t004_asset_list->property_id->headerCellClass() ?>"><div id="elh_t004_asset_property_id" class="t004_asset_property_id"><div class="ew-table-header-caption"><?php echo $t004_asset_list->property_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="property_id" class="<?php echo $t004_asset_list->property_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t004_asset_list->SortUrl($t004_asset_list->property_id) ?>', 2);"><div id="elh_t004_asset_property_id" class="t004_asset_property_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_asset_list->property_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t004_asset_list->property_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t004_asset_list->property_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t004_asset_list->location_id->Visible) { // location_id ?>
	<?php if ($t004_asset_list->SortUrl($t004_asset_list->location_id) == "") { ?>
		<th data-name="location_id" class="<?php echo $t004_asset_list->location_id->headerCellClass() ?>"><div id="elh_t004_asset_location_id" class="t004_asset_location_id"><div class="ew-table-header-caption"><?php echo $t004_asset_list->location_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="location_id" class="<?php echo $t004_asset_list->location_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t004_asset_list->SortUrl($t004_asset_list->location_id) ?>', 2);"><div id="elh_t004_asset_location_id" class="t004_asset_location_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_asset_list->location_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t004_asset_list->location_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t004_asset_list->location_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t004_asset_list->signature_id->Visible) { // signature_id ?>
	<?php if ($t004_asset_list->SortUrl($t004_asset_list->signature_id) == "") { ?>
		<th data-name="signature_id" class="<?php echo $t004_asset_list->signature_id->headerCellClass() ?>"><div id="elh_t004_asset_signature_id" class="t004_asset_signature_id"><div class="ew-table-header-caption"><?php echo $t004_asset_list->signature_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="signature_id" class="<?php echo $t004_asset_list->signature_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t004_asset_list->SortUrl($t004_asset_list->signature_id) ?>', 2);"><div id="elh_t004_asset_signature_id" class="t004_asset_signature_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_asset_list->signature_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t004_asset_list->signature_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t004_asset_list->signature_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t004_asset_list->Asset->Visible) { // Asset ?>
	<?php if ($t004_asset_list->SortUrl($t004_asset_list->Asset) == "") { ?>
		<th data-name="Asset" class="<?php echo $t004_asset_list->Asset->headerCellClass() ?>"><div id="elh_t004_asset_Asset" class="t004_asset_Asset"><div class="ew-table-header-caption"><?php echo $t004_asset_list->Asset->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Asset" class="<?php echo $t004_asset_list->Asset->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t004_asset_list->SortUrl($t004_asset_list->Asset) ?>', 2);"><div id="elh_t004_asset_Asset" class="t004_asset_Asset">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_asset_list->Asset->caption() ?></span><span class="ew-table-header-sort"><?php if ($t004_asset_list->Asset->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t004_asset_list->Asset->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t004_asset_list->Periode->Visible) { // Periode ?>
	<?php if ($t004_asset_list->SortUrl($t004_asset_list->Periode) == "") { ?>
		<th data-name="Periode" class="<?php echo $t004_asset_list->Periode->headerCellClass() ?>"><div id="elh_t004_asset_Periode" class="t004_asset_Periode"><div class="ew-table-header-caption"><?php echo $t004_asset_list->Periode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Periode" class="<?php echo $t004_asset_list->Periode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t004_asset_list->SortUrl($t004_asset_list->Periode) ?>', 2);"><div id="elh_t004_asset_Periode" class="t004_asset_Periode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_asset_list->Periode->caption() ?></span><span class="ew-table-header-sort"><?php if ($t004_asset_list->Periode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t004_asset_list->Periode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t004_asset_list->Qty->Visible) { // Qty ?>
	<?php if ($t004_asset_list->SortUrl($t004_asset_list->Qty) == "") { ?>
		<th data-name="Qty" class="<?php echo $t004_asset_list->Qty->headerCellClass() ?>"><div id="elh_t004_asset_Qty" class="t004_asset_Qty"><div class="ew-table-header-caption"><?php echo $t004_asset_list->Qty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Qty" class="<?php echo $t004_asset_list->Qty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t004_asset_list->SortUrl($t004_asset_list->Qty) ?>', 2);"><div id="elh_t004_asset_Qty" class="t004_asset_Qty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_asset_list->Qty->caption() ?></span><span class="ew-table-header-sort"><?php if ($t004_asset_list->Qty->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t004_asset_list->Qty->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t004_asset_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t004_asset_list->ExportAll && $t004_asset_list->isExport()) {
	$t004_asset_list->StopRecord = $t004_asset_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t004_asset_list->TotalRecords > $t004_asset_list->StartRecord + $t004_asset_list->DisplayRecords - 1)
		$t004_asset_list->StopRecord = $t004_asset_list->StartRecord + $t004_asset_list->DisplayRecords - 1;
	else
		$t004_asset_list->StopRecord = $t004_asset_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($t004_asset->isConfirm() || $t004_asset_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t004_asset_list->FormKeyCountName) && ($t004_asset_list->isGridAdd() || $t004_asset_list->isGridEdit() || $t004_asset->isConfirm())) {
		$t004_asset_list->KeyCount = $CurrentForm->getValue($t004_asset_list->FormKeyCountName);
		$t004_asset_list->StopRecord = $t004_asset_list->StartRecord + $t004_asset_list->KeyCount - 1;
	}
}
$t004_asset_list->RecordCount = $t004_asset_list->StartRecord - 1;
if ($t004_asset_list->Recordset && !$t004_asset_list->Recordset->EOF) {
	$t004_asset_list->Recordset->moveFirst();
	$selectLimit = $t004_asset_list->UseSelectLimit;
	if (!$selectLimit && $t004_asset_list->StartRecord > 1)
		$t004_asset_list->Recordset->move($t004_asset_list->StartRecord - 1);
} elseif (!$t004_asset->AllowAddDeleteRow && $t004_asset_list->StopRecord == 0) {
	$t004_asset_list->StopRecord = $t004_asset->GridAddRowCount;
}

// Initialize aggregate
$t004_asset->RowType = ROWTYPE_AGGREGATEINIT;
$t004_asset->resetAttributes();
$t004_asset_list->renderRow();
if ($t004_asset_list->isGridAdd())
	$t004_asset_list->RowIndex = 0;
if ($t004_asset_list->isGridEdit())
	$t004_asset_list->RowIndex = 0;
while ($t004_asset_list->RecordCount < $t004_asset_list->StopRecord) {
	$t004_asset_list->RecordCount++;
	if ($t004_asset_list->RecordCount >= $t004_asset_list->StartRecord) {
		$t004_asset_list->RowCount++;
		if ($t004_asset_list->isGridAdd() || $t004_asset_list->isGridEdit() || $t004_asset->isConfirm()) {
			$t004_asset_list->RowIndex++;
			$CurrentForm->Index = $t004_asset_list->RowIndex;
			if ($CurrentForm->hasValue($t004_asset_list->FormActionName) && ($t004_asset->isConfirm() || $t004_asset_list->EventCancelled))
				$t004_asset_list->RowAction = strval($CurrentForm->getValue($t004_asset_list->FormActionName));
			elseif ($t004_asset_list->isGridAdd())
				$t004_asset_list->RowAction = "insert";
			else
				$t004_asset_list->RowAction = "";
		}

		// Set up key count
		$t004_asset_list->KeyCount = $t004_asset_list->RowIndex;

		// Init row class and style
		$t004_asset->resetAttributes();
		$t004_asset->CssClass = "";
		if ($t004_asset_list->isGridAdd()) {
			$t004_asset_list->loadRowValues(); // Load default values
		} else {
			$t004_asset_list->loadRowValues($t004_asset_list->Recordset); // Load row values
		}
		$t004_asset->RowType = ROWTYPE_VIEW; // Render view
		if ($t004_asset_list->isGridAdd()) // Grid add
			$t004_asset->RowType = ROWTYPE_ADD; // Render add
		if ($t004_asset_list->isGridAdd() && $t004_asset->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t004_asset_list->restoreCurrentRowFormValues($t004_asset_list->RowIndex); // Restore form values
		if ($t004_asset_list->isGridEdit()) { // Grid edit
			if ($t004_asset->EventCancelled)
				$t004_asset_list->restoreCurrentRowFormValues($t004_asset_list->RowIndex); // Restore form values
			if ($t004_asset_list->RowAction == "insert")
				$t004_asset->RowType = ROWTYPE_ADD; // Render add
			else
				$t004_asset->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t004_asset_list->isGridEdit() && ($t004_asset->RowType == ROWTYPE_EDIT || $t004_asset->RowType == ROWTYPE_ADD) && $t004_asset->EventCancelled) // Update failed
			$t004_asset_list->restoreCurrentRowFormValues($t004_asset_list->RowIndex); // Restore form values
		if ($t004_asset->RowType == ROWTYPE_EDIT) // Edit row
			$t004_asset_list->EditRowCount++;

		// Set up row id / data-rowindex
		$t004_asset->RowAttrs->merge(["data-rowindex" => $t004_asset_list->RowCount, "id" => "r" . $t004_asset_list->RowCount . "_t004_asset", "data-rowtype" => $t004_asset->RowType]);

		// Render row
		$t004_asset_list->renderRow();

		// Render list options
		$t004_asset_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t004_asset_list->RowAction != "delete" && $t004_asset_list->RowAction != "insertdelete" && !($t004_asset_list->RowAction == "insert" && $t004_asset->isConfirm() && $t004_asset_list->emptyRow())) {
?>
	<tr <?php echo $t004_asset->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t004_asset_list->ListOptions->render("body", "left", $t004_asset_list->RowCount);
?>
	<?php if ($t004_asset_list->property_id->Visible) { // property_id ?>
		<td data-name="property_id" <?php echo $t004_asset_list->property_id->cellAttributes() ?>>
<?php if ($t004_asset->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_property_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t004_asset_list->RowIndex ?>_property_id"><?php echo EmptyValue(strval($t004_asset_list->property_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_asset_list->property_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_asset_list->property_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_asset_list->property_id->ReadOnly || $t004_asset_list->property_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t004_asset_list->RowIndex ?>_property_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t004_asset_list->property_id->Lookup->getParamTag($t004_asset_list, "p_x" . $t004_asset_list->RowIndex . "_property_id") ?>
<input type="hidden" data-table="t004_asset" data-field="x_property_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_asset_list->property_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t004_asset_list->RowIndex ?>_property_id" id="x<?php echo $t004_asset_list->RowIndex ?>_property_id" value="<?php echo $t004_asset_list->property_id->CurrentValue ?>"<?php echo $t004_asset_list->property_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t004_asset" data-field="x_property_id" name="o<?php echo $t004_asset_list->RowIndex ?>_property_id" id="o<?php echo $t004_asset_list->RowIndex ?>_property_id" value="<?php echo HtmlEncode($t004_asset_list->property_id->OldValue) ?>">
<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_property_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t004_asset_list->RowIndex ?>_property_id"><?php echo EmptyValue(strval($t004_asset_list->property_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_asset_list->property_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_asset_list->property_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_asset_list->property_id->ReadOnly || $t004_asset_list->property_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t004_asset_list->RowIndex ?>_property_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t004_asset_list->property_id->Lookup->getParamTag($t004_asset_list, "p_x" . $t004_asset_list->RowIndex . "_property_id") ?>
<input type="hidden" data-table="t004_asset" data-field="x_property_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_asset_list->property_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t004_asset_list->RowIndex ?>_property_id" id="x<?php echo $t004_asset_list->RowIndex ?>_property_id" value="<?php echo $t004_asset_list->property_id->CurrentValue ?>"<?php echo $t004_asset_list->property_id->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_property_id">
<span<?php echo $t004_asset_list->property_id->viewAttributes() ?>><?php echo $t004_asset_list->property_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t004_asset" data-field="x_id" name="x<?php echo $t004_asset_list->RowIndex ?>_id" id="x<?php echo $t004_asset_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t004_asset_list->id->CurrentValue) ?>">
<input type="hidden" data-table="t004_asset" data-field="x_id" name="o<?php echo $t004_asset_list->RowIndex ?>_id" id="o<?php echo $t004_asset_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t004_asset_list->id->OldValue) ?>">
<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_EDIT || $t004_asset->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t004_asset" data-field="x_id" name="x<?php echo $t004_asset_list->RowIndex ?>_id" id="x<?php echo $t004_asset_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t004_asset_list->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($t004_asset_list->location_id->Visible) { // location_id ?>
		<td data-name="location_id" <?php echo $t004_asset_list->location_id->cellAttributes() ?>>
<?php if ($t004_asset->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_location_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t004_asset_list->RowIndex ?>_location_id"><?php echo EmptyValue(strval($t004_asset_list->location_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_asset_list->location_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_asset_list->location_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_asset_list->location_id->ReadOnly || $t004_asset_list->location_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t004_asset_list->RowIndex ?>_location_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t004_asset_list->location_id->Lookup->getParamTag($t004_asset_list, "p_x" . $t004_asset_list->RowIndex . "_location_id") ?>
<input type="hidden" data-table="t004_asset" data-field="x_location_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_asset_list->location_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t004_asset_list->RowIndex ?>_location_id" id="x<?php echo $t004_asset_list->RowIndex ?>_location_id" value="<?php echo $t004_asset_list->location_id->CurrentValue ?>"<?php echo $t004_asset_list->location_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t004_asset" data-field="x_location_id" name="o<?php echo $t004_asset_list->RowIndex ?>_location_id" id="o<?php echo $t004_asset_list->RowIndex ?>_location_id" value="<?php echo HtmlEncode($t004_asset_list->location_id->OldValue) ?>">
<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_location_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t004_asset_list->RowIndex ?>_location_id"><?php echo EmptyValue(strval($t004_asset_list->location_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_asset_list->location_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_asset_list->location_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_asset_list->location_id->ReadOnly || $t004_asset_list->location_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t004_asset_list->RowIndex ?>_location_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t004_asset_list->location_id->Lookup->getParamTag($t004_asset_list, "p_x" . $t004_asset_list->RowIndex . "_location_id") ?>
<input type="hidden" data-table="t004_asset" data-field="x_location_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_asset_list->location_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t004_asset_list->RowIndex ?>_location_id" id="x<?php echo $t004_asset_list->RowIndex ?>_location_id" value="<?php echo $t004_asset_list->location_id->CurrentValue ?>"<?php echo $t004_asset_list->location_id->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_location_id">
<span<?php echo $t004_asset_list->location_id->viewAttributes() ?>><?php echo $t004_asset_list->location_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t004_asset_list->signature_id->Visible) { // signature_id ?>
		<td data-name="signature_id" <?php echo $t004_asset_list->signature_id->cellAttributes() ?>>
<?php if ($t004_asset->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_signature_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t004_asset_list->RowIndex ?>_signature_id"><?php echo EmptyValue(strval($t004_asset_list->signature_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_asset_list->signature_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_asset_list->signature_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_asset_list->signature_id->ReadOnly || $t004_asset_list->signature_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t004_asset_list->RowIndex ?>_signature_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t004_asset_list->signature_id->Lookup->getParamTag($t004_asset_list, "p_x" . $t004_asset_list->RowIndex . "_signature_id") ?>
<input type="hidden" data-table="t004_asset" data-field="x_signature_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_asset_list->signature_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t004_asset_list->RowIndex ?>_signature_id" id="x<?php echo $t004_asset_list->RowIndex ?>_signature_id" value="<?php echo $t004_asset_list->signature_id->CurrentValue ?>"<?php echo $t004_asset_list->signature_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t004_asset" data-field="x_signature_id" name="o<?php echo $t004_asset_list->RowIndex ?>_signature_id" id="o<?php echo $t004_asset_list->RowIndex ?>_signature_id" value="<?php echo HtmlEncode($t004_asset_list->signature_id->OldValue) ?>">
<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_signature_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t004_asset_list->RowIndex ?>_signature_id"><?php echo EmptyValue(strval($t004_asset_list->signature_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_asset_list->signature_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_asset_list->signature_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_asset_list->signature_id->ReadOnly || $t004_asset_list->signature_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t004_asset_list->RowIndex ?>_signature_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t004_asset_list->signature_id->Lookup->getParamTag($t004_asset_list, "p_x" . $t004_asset_list->RowIndex . "_signature_id") ?>
<input type="hidden" data-table="t004_asset" data-field="x_signature_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_asset_list->signature_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t004_asset_list->RowIndex ?>_signature_id" id="x<?php echo $t004_asset_list->RowIndex ?>_signature_id" value="<?php echo $t004_asset_list->signature_id->CurrentValue ?>"<?php echo $t004_asset_list->signature_id->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_signature_id">
<span<?php echo $t004_asset_list->signature_id->viewAttributes() ?>><?php echo $t004_asset_list->signature_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t004_asset_list->Asset->Visible) { // Asset ?>
		<td data-name="Asset" <?php echo $t004_asset_list->Asset->cellAttributes() ?>>
<?php if ($t004_asset->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_Asset" class="form-group">
<input type="text" data-table="t004_asset" data-field="x_Asset" name="x<?php echo $t004_asset_list->RowIndex ?>_Asset" id="x<?php echo $t004_asset_list->RowIndex ?>_Asset" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($t004_asset_list->Asset->getPlaceHolder()) ?>" value="<?php echo $t004_asset_list->Asset->EditValue ?>"<?php echo $t004_asset_list->Asset->editAttributes() ?>>
</span>
<input type="hidden" data-table="t004_asset" data-field="x_Asset" name="o<?php echo $t004_asset_list->RowIndex ?>_Asset" id="o<?php echo $t004_asset_list->RowIndex ?>_Asset" value="<?php echo HtmlEncode($t004_asset_list->Asset->OldValue) ?>">
<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_Asset" class="form-group">
<input type="text" data-table="t004_asset" data-field="x_Asset" name="x<?php echo $t004_asset_list->RowIndex ?>_Asset" id="x<?php echo $t004_asset_list->RowIndex ?>_Asset" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($t004_asset_list->Asset->getPlaceHolder()) ?>" value="<?php echo $t004_asset_list->Asset->EditValue ?>"<?php echo $t004_asset_list->Asset->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_Asset">
<span<?php echo $t004_asset_list->Asset->viewAttributes() ?>><?php echo $t004_asset_list->Asset->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t004_asset_list->Periode->Visible) { // Periode ?>
		<td data-name="Periode" <?php echo $t004_asset_list->Periode->cellAttributes() ?>>
<?php if ($t004_asset->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_Periode" class="form-group">
<input type="text" data-table="t004_asset" data-field="x_Periode" data-format="7" name="x<?php echo $t004_asset_list->RowIndex ?>_Periode" id="x<?php echo $t004_asset_list->RowIndex ?>_Periode" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t004_asset_list->Periode->getPlaceHolder()) ?>" value="<?php echo $t004_asset_list->Periode->EditValue ?>"<?php echo $t004_asset_list->Periode->editAttributes() ?>>
<?php if (!$t004_asset_list->Periode->ReadOnly && !$t004_asset_list->Periode->Disabled && !isset($t004_asset_list->Periode->EditAttrs["readonly"]) && !isset($t004_asset_list->Periode->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft004_assetlist", "datetimepicker"], function() {
	ew.createDateTimePicker("ft004_assetlist", "x<?php echo $t004_asset_list->RowIndex ?>_Periode", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="t004_asset" data-field="x_Periode" name="o<?php echo $t004_asset_list->RowIndex ?>_Periode" id="o<?php echo $t004_asset_list->RowIndex ?>_Periode" value="<?php echo HtmlEncode($t004_asset_list->Periode->OldValue) ?>">
<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_Periode" class="form-group">
<input type="text" data-table="t004_asset" data-field="x_Periode" data-format="7" name="x<?php echo $t004_asset_list->RowIndex ?>_Periode" id="x<?php echo $t004_asset_list->RowIndex ?>_Periode" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t004_asset_list->Periode->getPlaceHolder()) ?>" value="<?php echo $t004_asset_list->Periode->EditValue ?>"<?php echo $t004_asset_list->Periode->editAttributes() ?>>
<?php if (!$t004_asset_list->Periode->ReadOnly && !$t004_asset_list->Periode->Disabled && !isset($t004_asset_list->Periode->EditAttrs["readonly"]) && !isset($t004_asset_list->Periode->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft004_assetlist", "datetimepicker"], function() {
	ew.createDateTimePicker("ft004_assetlist", "x<?php echo $t004_asset_list->RowIndex ?>_Periode", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_Periode">
<span<?php echo $t004_asset_list->Periode->viewAttributes() ?>><?php echo $t004_asset_list->Periode->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t004_asset_list->Qty->Visible) { // Qty ?>
		<td data-name="Qty" <?php echo $t004_asset_list->Qty->cellAttributes() ?>>
<?php if ($t004_asset->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_Qty" class="form-group">
<input type="text" data-table="t004_asset" data-field="x_Qty" name="x<?php echo $t004_asset_list->RowIndex ?>_Qty" id="x<?php echo $t004_asset_list->RowIndex ?>_Qty" size="5" maxlength="14" placeholder="<?php echo HtmlEncode($t004_asset_list->Qty->getPlaceHolder()) ?>" value="<?php echo $t004_asset_list->Qty->EditValue ?>"<?php echo $t004_asset_list->Qty->editAttributes() ?>>
</span>
<input type="hidden" data-table="t004_asset" data-field="x_Qty" name="o<?php echo $t004_asset_list->RowIndex ?>_Qty" id="o<?php echo $t004_asset_list->RowIndex ?>_Qty" value="<?php echo HtmlEncode($t004_asset_list->Qty->OldValue) ?>">
<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_Qty" class="form-group">
<input type="text" data-table="t004_asset" data-field="x_Qty" name="x<?php echo $t004_asset_list->RowIndex ?>_Qty" id="x<?php echo $t004_asset_list->RowIndex ?>_Qty" size="5" maxlength="14" placeholder="<?php echo HtmlEncode($t004_asset_list->Qty->getPlaceHolder()) ?>" value="<?php echo $t004_asset_list->Qty->EditValue ?>"<?php echo $t004_asset_list->Qty->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_Qty">
<span<?php echo $t004_asset_list->Qty->viewAttributes() ?>><?php echo $t004_asset_list->Qty->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t004_asset_list->ListOptions->render("body", "right", $t004_asset_list->RowCount);
?>
	</tr>
<?php if ($t004_asset->RowType == ROWTYPE_ADD || $t004_asset->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ft004_assetlist", "load"], function() {
	ft004_assetlist.updateLists(<?php echo $t004_asset_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t004_asset_list->isGridAdd())
		if (!$t004_asset_list->Recordset->EOF)
			$t004_asset_list->Recordset->moveNext();
}
?>
<?php
	if ($t004_asset_list->isGridAdd() || $t004_asset_list->isGridEdit()) {
		$t004_asset_list->RowIndex = '$rowindex$';
		$t004_asset_list->loadRowValues();

		// Set row properties
		$t004_asset->resetAttributes();
		$t004_asset->RowAttrs->merge(["data-rowindex" => $t004_asset_list->RowIndex, "id" => "r0_t004_asset", "data-rowtype" => ROWTYPE_ADD]);
		$t004_asset->RowAttrs->appendClass("ew-template");
		$t004_asset->RowType = ROWTYPE_ADD;

		// Render row
		$t004_asset_list->renderRow();

		// Render list options
		$t004_asset_list->renderListOptions();
		$t004_asset_list->StartRowCount = 0;
?>
	<tr <?php echo $t004_asset->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t004_asset_list->ListOptions->render("body", "left", $t004_asset_list->RowIndex);
?>
	<?php if ($t004_asset_list->property_id->Visible) { // property_id ?>
		<td data-name="property_id">
<span id="el$rowindex$_t004_asset_property_id" class="form-group t004_asset_property_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t004_asset_list->RowIndex ?>_property_id"><?php echo EmptyValue(strval($t004_asset_list->property_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_asset_list->property_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_asset_list->property_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_asset_list->property_id->ReadOnly || $t004_asset_list->property_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t004_asset_list->RowIndex ?>_property_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t004_asset_list->property_id->Lookup->getParamTag($t004_asset_list, "p_x" . $t004_asset_list->RowIndex . "_property_id") ?>
<input type="hidden" data-table="t004_asset" data-field="x_property_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_asset_list->property_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t004_asset_list->RowIndex ?>_property_id" id="x<?php echo $t004_asset_list->RowIndex ?>_property_id" value="<?php echo $t004_asset_list->property_id->CurrentValue ?>"<?php echo $t004_asset_list->property_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t004_asset" data-field="x_property_id" name="o<?php echo $t004_asset_list->RowIndex ?>_property_id" id="o<?php echo $t004_asset_list->RowIndex ?>_property_id" value="<?php echo HtmlEncode($t004_asset_list->property_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t004_asset_list->location_id->Visible) { // location_id ?>
		<td data-name="location_id">
<span id="el$rowindex$_t004_asset_location_id" class="form-group t004_asset_location_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t004_asset_list->RowIndex ?>_location_id"><?php echo EmptyValue(strval($t004_asset_list->location_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_asset_list->location_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_asset_list->location_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_asset_list->location_id->ReadOnly || $t004_asset_list->location_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t004_asset_list->RowIndex ?>_location_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t004_asset_list->location_id->Lookup->getParamTag($t004_asset_list, "p_x" . $t004_asset_list->RowIndex . "_location_id") ?>
<input type="hidden" data-table="t004_asset" data-field="x_location_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_asset_list->location_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t004_asset_list->RowIndex ?>_location_id" id="x<?php echo $t004_asset_list->RowIndex ?>_location_id" value="<?php echo $t004_asset_list->location_id->CurrentValue ?>"<?php echo $t004_asset_list->location_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t004_asset" data-field="x_location_id" name="o<?php echo $t004_asset_list->RowIndex ?>_location_id" id="o<?php echo $t004_asset_list->RowIndex ?>_location_id" value="<?php echo HtmlEncode($t004_asset_list->location_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t004_asset_list->signature_id->Visible) { // signature_id ?>
		<td data-name="signature_id">
<span id="el$rowindex$_t004_asset_signature_id" class="form-group t004_asset_signature_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t004_asset_list->RowIndex ?>_signature_id"><?php echo EmptyValue(strval($t004_asset_list->signature_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_asset_list->signature_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_asset_list->signature_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_asset_list->signature_id->ReadOnly || $t004_asset_list->signature_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t004_asset_list->RowIndex ?>_signature_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t004_asset_list->signature_id->Lookup->getParamTag($t004_asset_list, "p_x" . $t004_asset_list->RowIndex . "_signature_id") ?>
<input type="hidden" data-table="t004_asset" data-field="x_signature_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_asset_list->signature_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t004_asset_list->RowIndex ?>_signature_id" id="x<?php echo $t004_asset_list->RowIndex ?>_signature_id" value="<?php echo $t004_asset_list->signature_id->CurrentValue ?>"<?php echo $t004_asset_list->signature_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t004_asset" data-field="x_signature_id" name="o<?php echo $t004_asset_list->RowIndex ?>_signature_id" id="o<?php echo $t004_asset_list->RowIndex ?>_signature_id" value="<?php echo HtmlEncode($t004_asset_list->signature_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t004_asset_list->Asset->Visible) { // Asset ?>
		<td data-name="Asset">
<span id="el$rowindex$_t004_asset_Asset" class="form-group t004_asset_Asset">
<input type="text" data-table="t004_asset" data-field="x_Asset" name="x<?php echo $t004_asset_list->RowIndex ?>_Asset" id="x<?php echo $t004_asset_list->RowIndex ?>_Asset" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($t004_asset_list->Asset->getPlaceHolder()) ?>" value="<?php echo $t004_asset_list->Asset->EditValue ?>"<?php echo $t004_asset_list->Asset->editAttributes() ?>>
</span>
<input type="hidden" data-table="t004_asset" data-field="x_Asset" name="o<?php echo $t004_asset_list->RowIndex ?>_Asset" id="o<?php echo $t004_asset_list->RowIndex ?>_Asset" value="<?php echo HtmlEncode($t004_asset_list->Asset->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t004_asset_list->Periode->Visible) { // Periode ?>
		<td data-name="Periode">
<span id="el$rowindex$_t004_asset_Periode" class="form-group t004_asset_Periode">
<input type="text" data-table="t004_asset" data-field="x_Periode" data-format="7" name="x<?php echo $t004_asset_list->RowIndex ?>_Periode" id="x<?php echo $t004_asset_list->RowIndex ?>_Periode" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t004_asset_list->Periode->getPlaceHolder()) ?>" value="<?php echo $t004_asset_list->Periode->EditValue ?>"<?php echo $t004_asset_list->Periode->editAttributes() ?>>
<?php if (!$t004_asset_list->Periode->ReadOnly && !$t004_asset_list->Periode->Disabled && !isset($t004_asset_list->Periode->EditAttrs["readonly"]) && !isset($t004_asset_list->Periode->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft004_assetlist", "datetimepicker"], function() {
	ew.createDateTimePicker("ft004_assetlist", "x<?php echo $t004_asset_list->RowIndex ?>_Periode", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="t004_asset" data-field="x_Periode" name="o<?php echo $t004_asset_list->RowIndex ?>_Periode" id="o<?php echo $t004_asset_list->RowIndex ?>_Periode" value="<?php echo HtmlEncode($t004_asset_list->Periode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t004_asset_list->Qty->Visible) { // Qty ?>
		<td data-name="Qty">
<span id="el$rowindex$_t004_asset_Qty" class="form-group t004_asset_Qty">
<input type="text" data-table="t004_asset" data-field="x_Qty" name="x<?php echo $t004_asset_list->RowIndex ?>_Qty" id="x<?php echo $t004_asset_list->RowIndex ?>_Qty" size="5" maxlength="14" placeholder="<?php echo HtmlEncode($t004_asset_list->Qty->getPlaceHolder()) ?>" value="<?php echo $t004_asset_list->Qty->EditValue ?>"<?php echo $t004_asset_list->Qty->editAttributes() ?>>
</span>
<input type="hidden" data-table="t004_asset" data-field="x_Qty" name="o<?php echo $t004_asset_list->RowIndex ?>_Qty" id="o<?php echo $t004_asset_list->RowIndex ?>_Qty" value="<?php echo HtmlEncode($t004_asset_list->Qty->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t004_asset_list->ListOptions->render("body", "right", $t004_asset_list->RowIndex);
?>
<script>
loadjs.ready(["ft004_assetlist", "load"], function() {
	ft004_assetlist.updateLists(<?php echo $t004_asset_list->RowIndex ?>);
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
<?php if ($t004_asset_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $t004_asset_list->FormKeyCountName ?>" id="<?php echo $t004_asset_list->FormKeyCountName ?>" value="<?php echo $t004_asset_list->KeyCount ?>">
<?php echo $t004_asset_list->MultiSelectKey ?>
<?php } ?>
<?php if ($t004_asset_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $t004_asset_list->FormKeyCountName ?>" id="<?php echo $t004_asset_list->FormKeyCountName ?>" value="<?php echo $t004_asset_list->KeyCount ?>">
<?php echo $t004_asset_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$t004_asset->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t004_asset_list->Recordset)
	$t004_asset_list->Recordset->Close();
?>
<?php if (!$t004_asset_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t004_asset_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t004_asset_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t004_asset_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t004_asset_list->TotalRecords == 0 && !$t004_asset->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t004_asset_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t004_asset_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t004_asset_list->isExport()) { ?>
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
$t004_asset_list->terminate();
?>