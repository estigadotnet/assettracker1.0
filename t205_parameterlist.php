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
$t205_parameter_list = new t205_parameter_list();

// Run the page
$t205_parameter_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t205_parameter_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t205_parameter_list->isExport()) { ?>
<script>
var ft205_parameterlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft205_parameterlist = currentForm = new ew.Form("ft205_parameterlist", "list");
	ft205_parameterlist.formKeyCountName = '<?php echo $t205_parameter_list->FormKeyCountName ?>';
	loadjs.done("ft205_parameterlist");
});
var ft205_parameterlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft205_parameterlistsrch = currentSearchForm = new ew.Form("ft205_parameterlistsrch");

	// Dynamic selection lists
	// Filters

	ft205_parameterlistsrch.filterList = <?php echo $t205_parameter_list->getFilterList() ?>;
	loadjs.done("ft205_parameterlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t205_parameter_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t205_parameter_list->TotalRecords > 0 && $t205_parameter_list->ExportOptions->visible()) { ?>
<?php $t205_parameter_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t205_parameter_list->ImportOptions->visible()) { ?>
<?php $t205_parameter_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t205_parameter_list->SearchOptions->visible()) { ?>
<?php $t205_parameter_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t205_parameter_list->FilterOptions->visible()) { ?>
<?php $t205_parameter_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t205_parameter_list->renderOtherOptions();
?>
<?php $t205_parameter_list->showPageHeader(); ?>
<?php
$t205_parameter_list->showMessage();
?>
<?php if ($t205_parameter_list->TotalRecords > 0 || $t205_parameter->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t205_parameter_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t205_parameter">
<form name="ft205_parameterlist" id="ft205_parameterlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t205_parameter">
<div id="gmp_t205_parameter" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t205_parameter_list->TotalRecords > 0 || $t205_parameter_list->isGridEdit()) { ?>
<table id="tbl_t205_parameterlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t205_parameter->RowType = ROWTYPE_HEADER;

// Render list options
$t205_parameter_list->renderListOptions();

// Render list options (header, left)
$t205_parameter_list->ListOptions->render("header", "left");
?>
<?php if ($t205_parameter_list->Category->Visible) { // Category ?>
	<?php if ($t205_parameter_list->SortUrl($t205_parameter_list->Category) == "") { ?>
		<th data-name="Category" class="<?php echo $t205_parameter_list->Category->headerCellClass() ?>"><div id="elh_t205_parameter_Category" class="t205_parameter_Category"><div class="ew-table-header-caption"><?php echo $t205_parameter_list->Category->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Category" class="<?php echo $t205_parameter_list->Category->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t205_parameter_list->SortUrl($t205_parameter_list->Category) ?>', 2);"><div id="elh_t205_parameter_Category" class="t205_parameter_Category">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t205_parameter_list->Category->caption() ?></span><span class="ew-table-header-sort"><?php if ($t205_parameter_list->Category->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t205_parameter_list->Category->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t205_parameter_list->Parameter->Visible) { // Parameter ?>
	<?php if ($t205_parameter_list->SortUrl($t205_parameter_list->Parameter) == "") { ?>
		<th data-name="Parameter" class="<?php echo $t205_parameter_list->Parameter->headerCellClass() ?>"><div id="elh_t205_parameter_Parameter" class="t205_parameter_Parameter"><div class="ew-table-header-caption"><?php echo $t205_parameter_list->Parameter->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Parameter" class="<?php echo $t205_parameter_list->Parameter->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t205_parameter_list->SortUrl($t205_parameter_list->Parameter) ?>', 2);"><div id="elh_t205_parameter_Parameter" class="t205_parameter_Parameter">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t205_parameter_list->Parameter->caption() ?></span><span class="ew-table-header-sort"><?php if ($t205_parameter_list->Parameter->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t205_parameter_list->Parameter->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t205_parameter_list->Nilai->Visible) { // Nilai ?>
	<?php if ($t205_parameter_list->SortUrl($t205_parameter_list->Nilai) == "") { ?>
		<th data-name="Nilai" class="<?php echo $t205_parameter_list->Nilai->headerCellClass() ?>"><div id="elh_t205_parameter_Nilai" class="t205_parameter_Nilai"><div class="ew-table-header-caption"><?php echo $t205_parameter_list->Nilai->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nilai" class="<?php echo $t205_parameter_list->Nilai->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t205_parameter_list->SortUrl($t205_parameter_list->Nilai) ?>', 2);"><div id="elh_t205_parameter_Nilai" class="t205_parameter_Nilai">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t205_parameter_list->Nilai->caption() ?></span><span class="ew-table-header-sort"><?php if ($t205_parameter_list->Nilai->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t205_parameter_list->Nilai->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t205_parameter_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t205_parameter_list->ExportAll && $t205_parameter_list->isExport()) {
	$t205_parameter_list->StopRecord = $t205_parameter_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t205_parameter_list->TotalRecords > $t205_parameter_list->StartRecord + $t205_parameter_list->DisplayRecords - 1)
		$t205_parameter_list->StopRecord = $t205_parameter_list->StartRecord + $t205_parameter_list->DisplayRecords - 1;
	else
		$t205_parameter_list->StopRecord = $t205_parameter_list->TotalRecords;
}
$t205_parameter_list->RecordCount = $t205_parameter_list->StartRecord - 1;
if ($t205_parameter_list->Recordset && !$t205_parameter_list->Recordset->EOF) {
	$t205_parameter_list->Recordset->moveFirst();
	$selectLimit = $t205_parameter_list->UseSelectLimit;
	if (!$selectLimit && $t205_parameter_list->StartRecord > 1)
		$t205_parameter_list->Recordset->move($t205_parameter_list->StartRecord - 1);
} elseif (!$t205_parameter->AllowAddDeleteRow && $t205_parameter_list->StopRecord == 0) {
	$t205_parameter_list->StopRecord = $t205_parameter->GridAddRowCount;
}

// Initialize aggregate
$t205_parameter->RowType = ROWTYPE_AGGREGATEINIT;
$t205_parameter->resetAttributes();
$t205_parameter_list->renderRow();
while ($t205_parameter_list->RecordCount < $t205_parameter_list->StopRecord) {
	$t205_parameter_list->RecordCount++;
	if ($t205_parameter_list->RecordCount >= $t205_parameter_list->StartRecord) {
		$t205_parameter_list->RowCount++;

		// Set up key count
		$t205_parameter_list->KeyCount = $t205_parameter_list->RowIndex;

		// Init row class and style
		$t205_parameter->resetAttributes();
		$t205_parameter->CssClass = "";
		if ($t205_parameter_list->isGridAdd()) {
		} else {
			$t205_parameter_list->loadRowValues($t205_parameter_list->Recordset); // Load row values
		}
		$t205_parameter->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t205_parameter->RowAttrs->merge(["data-rowindex" => $t205_parameter_list->RowCount, "id" => "r" . $t205_parameter_list->RowCount . "_t205_parameter", "data-rowtype" => $t205_parameter->RowType]);

		// Render row
		$t205_parameter_list->renderRow();

		// Render list options
		$t205_parameter_list->renderListOptions();
?>
	<tr <?php echo $t205_parameter->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t205_parameter_list->ListOptions->render("body", "left", $t205_parameter_list->RowCount);
?>
	<?php if ($t205_parameter_list->Category->Visible) { // Category ?>
		<td data-name="Category" <?php echo $t205_parameter_list->Category->cellAttributes() ?>>
<span id="el<?php echo $t205_parameter_list->RowCount ?>_t205_parameter_Category">
<span<?php echo $t205_parameter_list->Category->viewAttributes() ?>><?php echo $t205_parameter_list->Category->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t205_parameter_list->Parameter->Visible) { // Parameter ?>
		<td data-name="Parameter" <?php echo $t205_parameter_list->Parameter->cellAttributes() ?>>
<span id="el<?php echo $t205_parameter_list->RowCount ?>_t205_parameter_Parameter">
<span<?php echo $t205_parameter_list->Parameter->viewAttributes() ?>><?php echo $t205_parameter_list->Parameter->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t205_parameter_list->Nilai->Visible) { // Nilai ?>
		<td data-name="Nilai" <?php echo $t205_parameter_list->Nilai->cellAttributes() ?>>
<span id="el<?php echo $t205_parameter_list->RowCount ?>_t205_parameter_Nilai">
<span<?php echo $t205_parameter_list->Nilai->viewAttributes() ?>><?php echo $t205_parameter_list->Nilai->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t205_parameter_list->ListOptions->render("body", "right", $t205_parameter_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$t205_parameter_list->isGridAdd())
		$t205_parameter_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$t205_parameter->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t205_parameter_list->Recordset)
	$t205_parameter_list->Recordset->Close();
?>
<?php if (!$t205_parameter_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t205_parameter_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t205_parameter_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t205_parameter_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t205_parameter_list->TotalRecords == 0 && !$t205_parameter->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t205_parameter_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t205_parameter_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t205_parameter_list->isExport()) { ?>
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
$t205_parameter_list->terminate();
?>