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
$r001_asset_summary = new r001_asset_summary();

// Run the page
$r001_asset_summary->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$r001_asset_summary->Page_Render();
?>
<?php if (!$DashboardReport) { ?>
<?php include_once "header.php"; ?>
<?php } ?>
<?php if (!$r001_asset_summary->isExport() && !$r001_asset_summary->DrillDown && !$DashboardReport) { ?>
<script>
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<a id="top"></a>
<?php if ((!$r001_asset_summary->isExport() || $r001_asset_summary->isExport("print")) && !$DashboardReport) { ?>
<!-- Content Container -->
<div id="ew-report" class="ew-report container-fluid">
<?php } ?>
<div class="btn-toolbar ew-toolbar">
<?php
if (!$r001_asset_summary->DrillDownInPanel) {
	$r001_asset_summary->ExportOptions->render("body");
	$r001_asset_summary->SearchOptions->render("body");
	$r001_asset_summary->FilterOptions->render("body");
}
?>
</div>
<?php $r001_asset_summary->showPageHeader(); ?>
<?php
$r001_asset_summary->showMessage();
?>
<?php if ((!$r001_asset_summary->isExport() || $r001_asset_summary->isExport("print")) && !$DashboardReport) { ?>
<div class="row">
<?php } ?>
<?php if ((!$r001_asset_summary->isExport() || $r001_asset_summary->isExport("print")) && !$DashboardReport) { ?>
<!-- Center Container -->
<div id="ew-center" class="<?php echo $r001_asset_summary->CenterContentClass ?>">
<?php } ?>
<!-- Summary report (begin) -->
<div id="report_summary">
<?php if (!$r001_asset_summary->isExport() && !$r001_asset_summary->DrillDown && !$DashboardReport) { ?>
<?php } ?>
<?php
while ($r001_asset_summary->GroupCount <= count($r001_asset_summary->GroupRecords) && $r001_asset_summary->GroupCount <= $r001_asset_summary->DisplayGroups) {
?>
<?php

	// Show header
	if ($r001_asset_summary->ShowHeader) {
?>
<?php if ($r001_asset_summary->GroupCount > 1) { ?>
</tbody>
</table>
</div>
<!-- /.ew-grid-middle-panel -->
<!-- Report grid (end) -->
<?php if (!$r001_asset_summary->isExport() && !($r001_asset_summary->DrillDown && $r001_asset_summary->TotalGroups > 0)) { ?>
<!-- Bottom pager -->
<div class="card-footer ew-grid-lower-panel">
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $r001_asset_summary->Pager->render() ?>
</form>
<div class="clearfix"></div>
</div>
<?php } ?>
</div>
<!-- /.ew-grid -->
<?php echo $r001_asset_summary->PageBreakContent ?>
<?php } ?>
<div class="<?php if (!$r001_asset_summary->isExport("word") && !$r001_asset_summary->isExport("excel")) { ?>card ew-card <?php } ?>ew-grid"<?php echo $r001_asset_summary->ReportTableStyle ?>>
<!-- Report grid (begin) -->
<div id="gmp_r001_asset" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="<?php echo $r001_asset_summary->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($r001_asset_summary->property_id->Visible) { ?>
	<?php if ($r001_asset_summary->property_id->ShowGroupHeaderAsRow) { ?>
	<th data-name="property_id">&nbsp;</th>
	<?php } else { ?>
		<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->property_id) == "") { ?>
	<th data-name="property_id" class="<?php echo $r001_asset_summary->property_id->headerCellClass() ?>"><div class="r001_asset_property_id"><div class="ew-table-header-caption"><?php echo $r001_asset_summary->property_id->caption() ?></div></div></th>
		<?php } else { ?>
	<th data-name="property_id" class="<?php echo $r001_asset_summary->property_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->property_id) ?>', 2);"><div class="r001_asset_property_id">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->property_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($r001_asset_summary->property_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->property_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
		<?php } ?>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->location_id->Visible) { ?>
	<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->location_id) == "") { ?>
	<th data-name="location_id" class="<?php echo $r001_asset_summary->location_id->headerCellClass() ?>"><div class="r001_asset_location_id"><div class="ew-table-header-caption"><?php echo $r001_asset_summary->location_id->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="location_id" class="<?php echo $r001_asset_summary->location_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->location_id) ?>', 2);"><div class="r001_asset_location_id">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->location_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($r001_asset_summary->location_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->location_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->signature_id->Visible) { ?>
	<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->signature_id) == "") { ?>
	<th data-name="signature_id" class="<?php echo $r001_asset_summary->signature_id->headerCellClass() ?>"><div class="r001_asset_signature_id"><div class="ew-table-header-caption"><?php echo $r001_asset_summary->signature_id->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="signature_id" class="<?php echo $r001_asset_summary->signature_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->signature_id) ?>', 2);"><div class="r001_asset_signature_id">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->signature_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($r001_asset_summary->signature_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->signature_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->Asset->Visible) { ?>
	<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->Asset) == "") { ?>
	<th data-name="Asset" class="<?php echo $r001_asset_summary->Asset->headerCellClass() ?>"><div class="r001_asset_Asset"><div class="ew-table-header-caption"><?php echo $r001_asset_summary->Asset->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="Asset" class="<?php echo $r001_asset_summary->Asset->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->Asset) ?>', 2);"><div class="r001_asset_Asset">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->Asset->caption() ?></span><span class="ew-table-header-sort"><?php if ($r001_asset_summary->Asset->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->Asset->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->Periode->Visible) { ?>
	<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->Periode) == "") { ?>
	<th data-name="Periode" class="<?php echo $r001_asset_summary->Periode->headerCellClass() ?>"><div class="r001_asset_Periode"><div class="ew-table-header-caption"><?php echo $r001_asset_summary->Periode->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="Periode" class="<?php echo $r001_asset_summary->Periode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->Periode) ?>', 2);"><div class="r001_asset_Periode">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->Periode->caption() ?></span><span class="ew-table-header-sort"><?php if ($r001_asset_summary->Periode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->Periode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->Qty->Visible) { ?>
	<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->Qty) == "") { ?>
	<th data-name="Qty" class="<?php echo $r001_asset_summary->Qty->headerCellClass() ?>"><div class="r001_asset_Qty"><div class="ew-table-header-caption"><?php echo $r001_asset_summary->Qty->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="Qty" class="<?php echo $r001_asset_summary->Qty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->Qty) ?>', 2);"><div class="r001_asset_Qty">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->Qty->caption() ?></span><span class="ew-table-header-sort"><?php if ($r001_asset_summary->Qty->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->Qty->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
	</tr>
</thead>
<tbody>
<?php
		if ($r001_asset_summary->TotalGroups == 0)
			break; // Show header only
		$r001_asset_summary->ShowHeader = FALSE;
	} // End show header
?>
<?php

	// Build detail SQL
	$where = DetailFilterSql($r001_asset_summary->property_id, $r001_asset_summary->getSqlFirstGroupField(), $r001_asset_summary->property_id->groupValue(), $r001_asset_summary->Dbid);
	if ($r001_asset_summary->PageFirstGroupFilter != "") $r001_asset_summary->PageFirstGroupFilter .= " OR ";
	$r001_asset_summary->PageFirstGroupFilter .= $where;
	if ($r001_asset_summary->Filter != "")
		$where = "($r001_asset_summary->Filter) AND ($where)";
	$sql = BuildReportSql($r001_asset_summary->getSqlSelect(), $r001_asset_summary->getSqlWhere(), $r001_asset_summary->getSqlGroupBy(), $r001_asset_summary->getSqlHaving(), $r001_asset_summary->getSqlOrderBy(), $where, $r001_asset_summary->Sort);
	$rs = $r001_asset_summary->getRecordset($sql);
	$r001_asset_summary->DetailRecords = $rs ? $rs->getRows() : [];
	$r001_asset_summary->DetailRecordCount = count($r001_asset_summary->DetailRecords);
	$r001_asset_summary->setGroupCount($r001_asset_summary->DetailRecordCount, $r001_asset_summary->GroupCount);

	// Load detail records
	$r001_asset_summary->property_id->Records = &$r001_asset_summary->DetailRecords;
	$r001_asset_summary->property_id->LevelBreak = TRUE; // Set field level break
		$r001_asset_summary->GroupCounter[1] = $r001_asset_summary->GroupCount;
		$r001_asset_summary->property_id->getCnt($r001_asset_summary->property_id->Records); // Get record count
		$r001_asset_summary->setGroupCount($r001_asset_summary->property_id->Count, $r001_asset_summary->GroupCounter[1]);
?>
<?php if ($r001_asset_summary->property_id->Visible && $r001_asset_summary->property_id->ShowGroupHeaderAsRow) { ?>
<?php

		// Render header row
		$r001_asset_summary->resetAttributes();
		$r001_asset_summary->RowType = ROWTYPE_TOTAL;
		$r001_asset_summary->RowTotalType = ROWTOTAL_GROUP;
		$r001_asset_summary->RowTotalSubType = ROWTOTAL_HEADER;
		$r001_asset_summary->RowGroupLevel = 1;
		$r001_asset_summary->renderRow();
?>
	<tr<?php echo $r001_asset_summary->rowAttributes(); ?>>
<?php if ($r001_asset_summary->property_id->Visible) { ?>
		<td data-field="property_id"<?php echo $r001_asset_summary->property_id->cellAttributes(); ?>><span class="ew-group-toggle icon-collapse"></span></td>
<?php } ?>
		<td data-field="property_id" colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount - 1) ?>"<?php echo $r001_asset_summary->property_id->cellAttributes() ?>>
<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->property_id) == "") { ?>
		<span class="ew-summary-caption r001_asset_property_id"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->property_id->caption() ?></span></span>
<?php } else { ?>
		<span class="ew-table-header-btn ew-pointer ew-summary-caption r001_asset_property_id" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->property_id) ?>', 2);">
			<span class="ew-table-header-caption"><?php echo $r001_asset_summary->property_id->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($r001_asset_summary->property_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->property_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span>
		</span>
<?php } ?>
		<?php echo $Language->phrase("SummaryColon") ?><span<?php echo $r001_asset_summary->property_id->viewAttributes() ?>><?php echo $r001_asset_summary->property_id->GroupViewValue ?></span>
		<span class="ew-summary-count">(<span class="ew-aggregate-caption"><?php echo $Language->phrase("RptCnt") ?></span><?php echo $Language->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($r001_asset_summary->property_id->Count, 0); ?></span>)</span>
		</td>
	</tr>
<?php } ?>
<?php
	$r001_asset_summary->RecordCount = 0; // Reset record count
	foreach ($r001_asset_summary->property_id->Records as $record) {
		$r001_asset_summary->RecordCount++;
		$r001_asset_summary->RecordIndex++;
		$r001_asset_summary->loadRowValues($record);
?>
<?php

		// Render detail row
		$r001_asset_summary->resetAttributes();
		$r001_asset_summary->RowType = ROWTYPE_DETAIL;
		$r001_asset_summary->renderRow();
?>
	<tr<?php echo $r001_asset_summary->rowAttributes(); ?>>
<?php if ($r001_asset_summary->property_id->Visible) { ?>
	<?php if ($r001_asset_summary->property_id->ShowGroupHeaderAsRow) { ?>
		<td data-field="property_id"<?php echo $r001_asset_summary->property_id->cellAttributes(); ?>>&nbsp;</td>
	<?php } else { ?>
		<td data-field="property_id"<?php echo $r001_asset_summary->property_id->cellAttributes(); ?>><span<?php echo $r001_asset_summary->property_id->viewAttributes() ?>><?php echo $r001_asset_summary->property_id->GroupViewValue ?></span></td>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->location_id->Visible) { ?>
		<td data-field="location_id"<?php echo $r001_asset_summary->location_id->cellAttributes() ?>>
<span<?php echo $r001_asset_summary->location_id->viewAttributes() ?>><?php echo $r001_asset_summary->location_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r001_asset_summary->signature_id->Visible) { ?>
		<td data-field="signature_id"<?php echo $r001_asset_summary->signature_id->cellAttributes() ?>>
<span<?php echo $r001_asset_summary->signature_id->viewAttributes() ?>><?php echo $r001_asset_summary->signature_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r001_asset_summary->Asset->Visible) { ?>
		<td data-field="Asset"<?php echo $r001_asset_summary->Asset->cellAttributes() ?>>
<span<?php echo $r001_asset_summary->Asset->viewAttributes() ?>><?php echo $r001_asset_summary->Asset->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r001_asset_summary->Periode->Visible) { ?>
		<td data-field="Periode"<?php echo $r001_asset_summary->Periode->cellAttributes() ?>>
<span<?php echo $r001_asset_summary->Periode->viewAttributes() ?>><?php echo $r001_asset_summary->Periode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r001_asset_summary->Qty->Visible) { ?>
		<td data-field="Qty"<?php echo $r001_asset_summary->Qty->cellAttributes() ?>>
<span<?php echo $r001_asset_summary->Qty->viewAttributes() ?>><?php echo $r001_asset_summary->Qty->getViewValue() ?></span>
</td>
<?php } ?>
	</tr>
<?php
	}
?>
<?php

	// Next group
	$r001_asset_summary->loadGroupRowValues();

	// Show header if page break
	if ($r001_asset_summary->isExport())
		$r001_asset_summary->ShowHeader = ($r001_asset_summary->ExportPageBreakCount == 0) ? FALSE : ($r001_asset_summary->GroupCount % $r001_asset_summary->ExportPageBreakCount == 0);

	// Page_Breaking server event
	if ($r001_asset_summary->ShowHeader)
		$r001_asset_summary->Page_Breaking($r001_asset_summary->ShowHeader, $r001_asset_summary->PageBreakContent);
	$r001_asset_summary->GroupCount++;
} // End while
?>
<?php if ($r001_asset_summary->TotalGroups > 0) { ?>
</tbody>
<tfoot>
</tfoot>
</table>
</div>
<!-- /.ew-grid-middle-panel -->
<!-- Report grid (end) -->
<?php if (!$r001_asset_summary->isExport() && !($r001_asset_summary->DrillDown && $r001_asset_summary->TotalGroups > 0)) { ?>
<!-- Bottom pager -->
<div class="card-footer ew-grid-lower-panel">
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $r001_asset_summary->Pager->render() ?>
</form>
<div class="clearfix"></div>
</div>
<?php } ?>
</div>
<!-- /.ew-grid -->
<?php } ?>
</div>
<!-- /#report-summary -->
<!-- Summary report (end) -->
<?php if ((!$r001_asset_summary->isExport() || $r001_asset_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /#ew-center -->
<?php } ?>
<?php if ((!$r001_asset_summary->isExport() || $r001_asset_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /.row -->
<?php } ?>
<?php if ((!$r001_asset_summary->isExport() || $r001_asset_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /.ew-report -->
<?php } ?>
<?php
$r001_asset_summary->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$r001_asset_summary->isExport() && !$r001_asset_summary->DrillDown && !$DashboardReport) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php if (!$DashboardReport) { ?>
<?php include_once "footer.php"; ?>
<?php } ?>
<?php
$r001_asset_summary->terminate();
?>