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
$t101_ho_head_list = new t101_ho_head_list();

// Run the page
$t101_ho_head_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_ho_head_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t101_ho_head_list->isExport()) { ?>
<script>
var ft101_ho_headlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft101_ho_headlist = currentForm = new ew.Form("ft101_ho_headlist", "list");
	ft101_ho_headlist.formKeyCountName = '<?php echo $t101_ho_head_list->FormKeyCountName ?>';

	// Validate form
	ft101_ho_headlist.validate = function() {
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
			<?php if ($t101_ho_head_list->tr_no->Required) { ?>
				elm = this.getElements("x" + infix + "_tr_no");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_list->tr_no->caption(), $t101_ho_head_list->tr_no->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_ho_head_list->tr_date->Required) { ?>
				elm = this.getElements("x" + infix + "_tr_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_list->tr_date->caption(), $t101_ho_head_list->tr_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tr_date");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t101_ho_head_list->tr_date->errorMessage()) ?>");
			<?php if ($t101_ho_head_list->ho_to->Required) { ?>
				elm = this.getElements("x" + infix + "_ho_to");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_list->ho_to->caption(), $t101_ho_head_list->ho_to->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_ho_head_list->cno_to->Required) { ?>
				elm = this.getElements("x" + infix + "_cno_to");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_list->cno_to->caption(), $t101_ho_head_list->cno_to->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_ho_head_list->dept_to->Required) { ?>
				elm = this.getElements("x" + infix + "_dept_to");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_list->dept_to->caption(), $t101_ho_head_list->dept_to->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_ho_head_list->ho_by->Required) { ?>
				elm = this.getElements("x" + infix + "_ho_by");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_list->ho_by->caption(), $t101_ho_head_list->ho_by->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_ho_head_list->cno_by->Required) { ?>
				elm = this.getElements("x" + infix + "_cno_by");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_list->cno_by->caption(), $t101_ho_head_list->cno_by->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_cno_by");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t101_ho_head_list->cno_by->errorMessage()) ?>");
			<?php if ($t101_ho_head_list->dept_by->Required) { ?>
				elm = this.getElements("x" + infix + "_dept_by");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_list->dept_by->caption(), $t101_ho_head_list->dept_by->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_ho_head_list->sign1->Required) { ?>
				elm = this.getElements("x" + infix + "_sign1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_list->sign1->caption(), $t101_ho_head_list->sign1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_ho_head_list->sign2->Required) { ?>
				elm = this.getElements("x" + infix + "_sign2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_list->sign2->caption(), $t101_ho_head_list->sign2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_ho_head_list->sign3->Required) { ?>
				elm = this.getElements("x" + infix + "_sign3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_list->sign3->caption(), $t101_ho_head_list->sign3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_ho_head_list->sign4->Required) { ?>
				elm = this.getElements("x" + infix + "_sign4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_list->sign4->caption(), $t101_ho_head_list->sign4->RequiredErrorMessage)) ?>");
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
	ft101_ho_headlist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "tr_no", false)) return false;
		if (ew.valueChanged(fobj, infix, "tr_date", false)) return false;
		if (ew.valueChanged(fobj, infix, "ho_to", false)) return false;
		if (ew.valueChanged(fobj, infix, "cno_to", false)) return false;
		if (ew.valueChanged(fobj, infix, "dept_to", false)) return false;
		if (ew.valueChanged(fobj, infix, "ho_by", false)) return false;
		if (ew.valueChanged(fobj, infix, "cno_by", false)) return false;
		if (ew.valueChanged(fobj, infix, "dept_by", false)) return false;
		if (ew.valueChanged(fobj, infix, "sign1", false)) return false;
		if (ew.valueChanged(fobj, infix, "sign2", false)) return false;
		if (ew.valueChanged(fobj, infix, "sign3", false)) return false;
		if (ew.valueChanged(fobj, infix, "sign4", false)) return false;
		return true;
	}

	// Form_CustomValidate
	ft101_ho_headlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft101_ho_headlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft101_ho_headlist.lists["x_ho_to"] = <?php echo $t101_ho_head_list->ho_to->Lookup->toClientList($t101_ho_head_list) ?>;
	ft101_ho_headlist.lists["x_ho_to"].options = <?php echo JsonEncode($t101_ho_head_list->ho_to->lookupOptions()) ?>;
	ft101_ho_headlist.lists["x_dept_to"] = <?php echo $t101_ho_head_list->dept_to->Lookup->toClientList($t101_ho_head_list) ?>;
	ft101_ho_headlist.lists["x_dept_to"].options = <?php echo JsonEncode($t101_ho_head_list->dept_to->lookupOptions()) ?>;
	ft101_ho_headlist.lists["x_ho_by"] = <?php echo $t101_ho_head_list->ho_by->Lookup->toClientList($t101_ho_head_list) ?>;
	ft101_ho_headlist.lists["x_ho_by"].options = <?php echo JsonEncode($t101_ho_head_list->ho_by->lookupOptions()) ?>;
	ft101_ho_headlist.lists["x_dept_by"] = <?php echo $t101_ho_head_list->dept_by->Lookup->toClientList($t101_ho_head_list) ?>;
	ft101_ho_headlist.lists["x_dept_by"].options = <?php echo JsonEncode($t101_ho_head_list->dept_by->lookupOptions()) ?>;
	ft101_ho_headlist.lists["x_sign1"] = <?php echo $t101_ho_head_list->sign1->Lookup->toClientList($t101_ho_head_list) ?>;
	ft101_ho_headlist.lists["x_sign1"].options = <?php echo JsonEncode($t101_ho_head_list->sign1->lookupOptions()) ?>;
	ft101_ho_headlist.lists["x_sign2"] = <?php echo $t101_ho_head_list->sign2->Lookup->toClientList($t101_ho_head_list) ?>;
	ft101_ho_headlist.lists["x_sign2"].options = <?php echo JsonEncode($t101_ho_head_list->sign2->lookupOptions()) ?>;
	ft101_ho_headlist.lists["x_sign3"] = <?php echo $t101_ho_head_list->sign3->Lookup->toClientList($t101_ho_head_list) ?>;
	ft101_ho_headlist.lists["x_sign3"].options = <?php echo JsonEncode($t101_ho_head_list->sign3->lookupOptions()) ?>;
	ft101_ho_headlist.lists["x_sign4"] = <?php echo $t101_ho_head_list->sign4->Lookup->toClientList($t101_ho_head_list) ?>;
	ft101_ho_headlist.lists["x_sign4"].options = <?php echo JsonEncode($t101_ho_head_list->sign4->lookupOptions()) ?>;
	loadjs.done("ft101_ho_headlist");
});
var ft101_ho_headlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft101_ho_headlistsrch = currentSearchForm = new ew.Form("ft101_ho_headlistsrch");

	// Dynamic selection lists
	// Filters

	ft101_ho_headlistsrch.filterList = <?php echo $t101_ho_head_list->getFilterList() ?>;
	loadjs.done("ft101_ho_headlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t101_ho_head_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t101_ho_head_list->TotalRecords > 0 && $t101_ho_head_list->ExportOptions->visible()) { ?>
<?php $t101_ho_head_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t101_ho_head_list->ImportOptions->visible()) { ?>
<?php $t101_ho_head_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t101_ho_head_list->SearchOptions->visible()) { ?>
<?php $t101_ho_head_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t101_ho_head_list->FilterOptions->visible()) { ?>
<?php $t101_ho_head_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t101_ho_head_list->renderOtherOptions();
?>
<?php $t101_ho_head_list->showPageHeader(); ?>
<?php
$t101_ho_head_list->showMessage();
?>
<?php if ($t101_ho_head_list->TotalRecords > 0 || $t101_ho_head->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t101_ho_head_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t101_ho_head">
<form name="ft101_ho_headlist" id="ft101_ho_headlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_ho_head">
<div id="gmp_t101_ho_head" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t101_ho_head_list->TotalRecords > 0 || $t101_ho_head_list->isAdd() || $t101_ho_head_list->isCopy() || $t101_ho_head_list->isGridEdit()) { ?>
<table id="tbl_t101_ho_headlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t101_ho_head->RowType = ROWTYPE_HEADER;

// Render list options
$t101_ho_head_list->renderListOptions();

// Render list options (header, left)
$t101_ho_head_list->ListOptions->render("header", "left");
?>
<?php if ($t101_ho_head_list->tr_no->Visible) { // tr_no ?>
	<?php if ($t101_ho_head_list->SortUrl($t101_ho_head_list->tr_no) == "") { ?>
		<th data-name="tr_no" class="<?php echo $t101_ho_head_list->tr_no->headerCellClass() ?>"><div id="elh_t101_ho_head_tr_no" class="t101_ho_head_tr_no"><div class="ew-table-header-caption"><?php echo $t101_ho_head_list->tr_no->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tr_no" class="<?php echo $t101_ho_head_list->tr_no->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t101_ho_head_list->SortUrl($t101_ho_head_list->tr_no) ?>', 2);"><div id="elh_t101_ho_head_tr_no" class="t101_ho_head_tr_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_ho_head_list->tr_no->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_ho_head_list->tr_no->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t101_ho_head_list->tr_no->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_ho_head_list->tr_date->Visible) { // tr_date ?>
	<?php if ($t101_ho_head_list->SortUrl($t101_ho_head_list->tr_date) == "") { ?>
		<th data-name="tr_date" class="<?php echo $t101_ho_head_list->tr_date->headerCellClass() ?>"><div id="elh_t101_ho_head_tr_date" class="t101_ho_head_tr_date"><div class="ew-table-header-caption"><?php echo $t101_ho_head_list->tr_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tr_date" class="<?php echo $t101_ho_head_list->tr_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t101_ho_head_list->SortUrl($t101_ho_head_list->tr_date) ?>', 2);"><div id="elh_t101_ho_head_tr_date" class="t101_ho_head_tr_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_ho_head_list->tr_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_ho_head_list->tr_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t101_ho_head_list->tr_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_ho_head_list->ho_to->Visible) { // ho_to ?>
	<?php if ($t101_ho_head_list->SortUrl($t101_ho_head_list->ho_to) == "") { ?>
		<th data-name="ho_to" class="<?php echo $t101_ho_head_list->ho_to->headerCellClass() ?>"><div id="elh_t101_ho_head_ho_to" class="t101_ho_head_ho_to"><div class="ew-table-header-caption"><?php echo $t101_ho_head_list->ho_to->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ho_to" class="<?php echo $t101_ho_head_list->ho_to->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t101_ho_head_list->SortUrl($t101_ho_head_list->ho_to) ?>', 2);"><div id="elh_t101_ho_head_ho_to" class="t101_ho_head_ho_to">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_ho_head_list->ho_to->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_ho_head_list->ho_to->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t101_ho_head_list->ho_to->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_ho_head_list->cno_to->Visible) { // cno_to ?>
	<?php if ($t101_ho_head_list->SortUrl($t101_ho_head_list->cno_to) == "") { ?>
		<th data-name="cno_to" class="<?php echo $t101_ho_head_list->cno_to->headerCellClass() ?>"><div id="elh_t101_ho_head_cno_to" class="t101_ho_head_cno_to"><div class="ew-table-header-caption"><?php echo $t101_ho_head_list->cno_to->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cno_to" class="<?php echo $t101_ho_head_list->cno_to->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t101_ho_head_list->SortUrl($t101_ho_head_list->cno_to) ?>', 2);"><div id="elh_t101_ho_head_cno_to" class="t101_ho_head_cno_to">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_ho_head_list->cno_to->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_ho_head_list->cno_to->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t101_ho_head_list->cno_to->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_ho_head_list->dept_to->Visible) { // dept_to ?>
	<?php if ($t101_ho_head_list->SortUrl($t101_ho_head_list->dept_to) == "") { ?>
		<th data-name="dept_to" class="<?php echo $t101_ho_head_list->dept_to->headerCellClass() ?>"><div id="elh_t101_ho_head_dept_to" class="t101_ho_head_dept_to"><div class="ew-table-header-caption"><?php echo $t101_ho_head_list->dept_to->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dept_to" class="<?php echo $t101_ho_head_list->dept_to->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t101_ho_head_list->SortUrl($t101_ho_head_list->dept_to) ?>', 2);"><div id="elh_t101_ho_head_dept_to" class="t101_ho_head_dept_to">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_ho_head_list->dept_to->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_ho_head_list->dept_to->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t101_ho_head_list->dept_to->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_ho_head_list->ho_by->Visible) { // ho_by ?>
	<?php if ($t101_ho_head_list->SortUrl($t101_ho_head_list->ho_by) == "") { ?>
		<th data-name="ho_by" class="<?php echo $t101_ho_head_list->ho_by->headerCellClass() ?>"><div id="elh_t101_ho_head_ho_by" class="t101_ho_head_ho_by"><div class="ew-table-header-caption"><?php echo $t101_ho_head_list->ho_by->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ho_by" class="<?php echo $t101_ho_head_list->ho_by->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t101_ho_head_list->SortUrl($t101_ho_head_list->ho_by) ?>', 2);"><div id="elh_t101_ho_head_ho_by" class="t101_ho_head_ho_by">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_ho_head_list->ho_by->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_ho_head_list->ho_by->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t101_ho_head_list->ho_by->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_ho_head_list->cno_by->Visible) { // cno_by ?>
	<?php if ($t101_ho_head_list->SortUrl($t101_ho_head_list->cno_by) == "") { ?>
		<th data-name="cno_by" class="<?php echo $t101_ho_head_list->cno_by->headerCellClass() ?>"><div id="elh_t101_ho_head_cno_by" class="t101_ho_head_cno_by"><div class="ew-table-header-caption"><?php echo $t101_ho_head_list->cno_by->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cno_by" class="<?php echo $t101_ho_head_list->cno_by->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t101_ho_head_list->SortUrl($t101_ho_head_list->cno_by) ?>', 2);"><div id="elh_t101_ho_head_cno_by" class="t101_ho_head_cno_by">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_ho_head_list->cno_by->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_ho_head_list->cno_by->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t101_ho_head_list->cno_by->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_ho_head_list->dept_by->Visible) { // dept_by ?>
	<?php if ($t101_ho_head_list->SortUrl($t101_ho_head_list->dept_by) == "") { ?>
		<th data-name="dept_by" class="<?php echo $t101_ho_head_list->dept_by->headerCellClass() ?>"><div id="elh_t101_ho_head_dept_by" class="t101_ho_head_dept_by"><div class="ew-table-header-caption"><?php echo $t101_ho_head_list->dept_by->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dept_by" class="<?php echo $t101_ho_head_list->dept_by->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t101_ho_head_list->SortUrl($t101_ho_head_list->dept_by) ?>', 2);"><div id="elh_t101_ho_head_dept_by" class="t101_ho_head_dept_by">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_ho_head_list->dept_by->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_ho_head_list->dept_by->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t101_ho_head_list->dept_by->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_ho_head_list->sign1->Visible) { // sign1 ?>
	<?php if ($t101_ho_head_list->SortUrl($t101_ho_head_list->sign1) == "") { ?>
		<th data-name="sign1" class="<?php echo $t101_ho_head_list->sign1->headerCellClass() ?>"><div id="elh_t101_ho_head_sign1" class="t101_ho_head_sign1"><div class="ew-table-header-caption"><?php echo $t101_ho_head_list->sign1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sign1" class="<?php echo $t101_ho_head_list->sign1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t101_ho_head_list->SortUrl($t101_ho_head_list->sign1) ?>', 2);"><div id="elh_t101_ho_head_sign1" class="t101_ho_head_sign1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_ho_head_list->sign1->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_ho_head_list->sign1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t101_ho_head_list->sign1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_ho_head_list->sign2->Visible) { // sign2 ?>
	<?php if ($t101_ho_head_list->SortUrl($t101_ho_head_list->sign2) == "") { ?>
		<th data-name="sign2" class="<?php echo $t101_ho_head_list->sign2->headerCellClass() ?>"><div id="elh_t101_ho_head_sign2" class="t101_ho_head_sign2"><div class="ew-table-header-caption"><?php echo $t101_ho_head_list->sign2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sign2" class="<?php echo $t101_ho_head_list->sign2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t101_ho_head_list->SortUrl($t101_ho_head_list->sign2) ?>', 2);"><div id="elh_t101_ho_head_sign2" class="t101_ho_head_sign2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_ho_head_list->sign2->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_ho_head_list->sign2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t101_ho_head_list->sign2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_ho_head_list->sign3->Visible) { // sign3 ?>
	<?php if ($t101_ho_head_list->SortUrl($t101_ho_head_list->sign3) == "") { ?>
		<th data-name="sign3" class="<?php echo $t101_ho_head_list->sign3->headerCellClass() ?>"><div id="elh_t101_ho_head_sign3" class="t101_ho_head_sign3"><div class="ew-table-header-caption"><?php echo $t101_ho_head_list->sign3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sign3" class="<?php echo $t101_ho_head_list->sign3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t101_ho_head_list->SortUrl($t101_ho_head_list->sign3) ?>', 2);"><div id="elh_t101_ho_head_sign3" class="t101_ho_head_sign3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_ho_head_list->sign3->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_ho_head_list->sign3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t101_ho_head_list->sign3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_ho_head_list->sign4->Visible) { // sign4 ?>
	<?php if ($t101_ho_head_list->SortUrl($t101_ho_head_list->sign4) == "") { ?>
		<th data-name="sign4" class="<?php echo $t101_ho_head_list->sign4->headerCellClass() ?>"><div id="elh_t101_ho_head_sign4" class="t101_ho_head_sign4"><div class="ew-table-header-caption"><?php echo $t101_ho_head_list->sign4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sign4" class="<?php echo $t101_ho_head_list->sign4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t101_ho_head_list->SortUrl($t101_ho_head_list->sign4) ?>', 2);"><div id="elh_t101_ho_head_sign4" class="t101_ho_head_sign4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_ho_head_list->sign4->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_ho_head_list->sign4->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t101_ho_head_list->sign4->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t101_ho_head_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
	if ($t101_ho_head_list->isAdd() || $t101_ho_head_list->isCopy()) {
		$t101_ho_head_list->RowIndex = 0;
		$t101_ho_head_list->KeyCount = $t101_ho_head_list->RowIndex;
		if ($t101_ho_head_list->isCopy() && !$t101_ho_head_list->loadRow())
			$t101_ho_head->CurrentAction = "add";
		if ($t101_ho_head_list->isAdd())
			$t101_ho_head_list->loadRowValues();
		if ($t101_ho_head->EventCancelled) // Insert failed
			$t101_ho_head_list->restoreFormValues(); // Restore form values

		// Set row properties
		$t101_ho_head->resetAttributes();
		$t101_ho_head->RowAttrs->merge(["data-rowindex" => 0, "id" => "r0_t101_ho_head", "data-rowtype" => ROWTYPE_ADD]);
		$t101_ho_head->RowType = ROWTYPE_ADD;

		// Render row
		$t101_ho_head_list->renderRow();

		// Render list options
		$t101_ho_head_list->renderListOptions();
		$t101_ho_head_list->StartRowCount = 0;
?>
	<tr <?php echo $t101_ho_head->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t101_ho_head_list->ListOptions->render("body", "left", $t101_ho_head_list->RowCount);
?>
	<?php if ($t101_ho_head_list->tr_no->Visible) { // tr_no ?>
		<td data-name="tr_no">
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_tr_no" class="form-group t101_ho_head_tr_no">
<input type="text" data-table="t101_ho_head" data-field="x_tr_no" name="x<?php echo $t101_ho_head_list->RowIndex ?>_tr_no" id="x<?php echo $t101_ho_head_list->RowIndex ?>_tr_no" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t101_ho_head_list->tr_no->getPlaceHolder()) ?>" value="<?php echo $t101_ho_head_list->tr_no->EditValue ?>"<?php echo $t101_ho_head_list->tr_no->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_ho_head" data-field="x_tr_no" name="o<?php echo $t101_ho_head_list->RowIndex ?>_tr_no" id="o<?php echo $t101_ho_head_list->RowIndex ?>_tr_no" value="<?php echo HtmlEncode($t101_ho_head_list->tr_no->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_ho_head_list->tr_date->Visible) { // tr_date ?>
		<td data-name="tr_date">
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_tr_date" class="form-group t101_ho_head_tr_date">
<input type="text" data-table="t101_ho_head" data-field="x_tr_date" data-format="7" name="x<?php echo $t101_ho_head_list->RowIndex ?>_tr_date" id="x<?php echo $t101_ho_head_list->RowIndex ?>_tr_date" maxlength="10" placeholder="<?php echo HtmlEncode($t101_ho_head_list->tr_date->getPlaceHolder()) ?>" value="<?php echo $t101_ho_head_list->tr_date->EditValue ?>"<?php echo $t101_ho_head_list->tr_date->editAttributes() ?>>
<?php if (!$t101_ho_head_list->tr_date->ReadOnly && !$t101_ho_head_list->tr_date->Disabled && !isset($t101_ho_head_list->tr_date->EditAttrs["readonly"]) && !isset($t101_ho_head_list->tr_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft101_ho_headlist", "datetimepicker"], function() {
	ew.createDateTimePicker("ft101_ho_headlist", "x<?php echo $t101_ho_head_list->RowIndex ?>_tr_date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="t101_ho_head" data-field="x_tr_date" name="o<?php echo $t101_ho_head_list->RowIndex ?>_tr_date" id="o<?php echo $t101_ho_head_list->RowIndex ?>_tr_date" value="<?php echo HtmlEncode($t101_ho_head_list->tr_date->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_ho_head_list->ho_to->Visible) { // ho_to ?>
		<td data-name="ho_to">
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_ho_to" class="form-group t101_ho_head_ho_to">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t101_ho_head_list->RowIndex ?>_ho_to"><?php echo EmptyValue(strval($t101_ho_head_list->ho_to->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_list->ho_to->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_list->ho_to->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_list->ho_to->ReadOnly || $t101_ho_head_list->ho_to->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t101_ho_head_list->RowIndex ?>_ho_to',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_list->ho_to->Lookup->getParamTag($t101_ho_head_list, "p_x" . $t101_ho_head_list->RowIndex . "_ho_to") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_ho_to" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_list->ho_to->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_ho_head_list->RowIndex ?>_ho_to" id="x<?php echo $t101_ho_head_list->RowIndex ?>_ho_to" value="<?php echo $t101_ho_head_list->ho_to->CurrentValue ?>"<?php echo $t101_ho_head_list->ho_to->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_ho_head" data-field="x_ho_to" name="o<?php echo $t101_ho_head_list->RowIndex ?>_ho_to" id="o<?php echo $t101_ho_head_list->RowIndex ?>_ho_to" value="<?php echo HtmlEncode($t101_ho_head_list->ho_to->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_ho_head_list->cno_to->Visible) { // cno_to ?>
		<td data-name="cno_to">
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_cno_to" class="form-group t101_ho_head_cno_to">
<input type="text" data-table="t101_ho_head" data-field="x_cno_to" name="x<?php echo $t101_ho_head_list->RowIndex ?>_cno_to" id="x<?php echo $t101_ho_head_list->RowIndex ?>_cno_to" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t101_ho_head_list->cno_to->getPlaceHolder()) ?>" value="<?php echo $t101_ho_head_list->cno_to->EditValue ?>"<?php echo $t101_ho_head_list->cno_to->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_ho_head" data-field="x_cno_to" name="o<?php echo $t101_ho_head_list->RowIndex ?>_cno_to" id="o<?php echo $t101_ho_head_list->RowIndex ?>_cno_to" value="<?php echo HtmlEncode($t101_ho_head_list->cno_to->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_ho_head_list->dept_to->Visible) { // dept_to ?>
		<td data-name="dept_to">
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_dept_to" class="form-group t101_ho_head_dept_to">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t101_ho_head_list->RowIndex ?>_dept_to"><?php echo EmptyValue(strval($t101_ho_head_list->dept_to->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_list->dept_to->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_list->dept_to->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_list->dept_to->ReadOnly || $t101_ho_head_list->dept_to->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t101_ho_head_list->RowIndex ?>_dept_to',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_list->dept_to->Lookup->getParamTag($t101_ho_head_list, "p_x" . $t101_ho_head_list->RowIndex . "_dept_to") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_dept_to" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_list->dept_to->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_ho_head_list->RowIndex ?>_dept_to" id="x<?php echo $t101_ho_head_list->RowIndex ?>_dept_to" value="<?php echo $t101_ho_head_list->dept_to->CurrentValue ?>"<?php echo $t101_ho_head_list->dept_to->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_ho_head" data-field="x_dept_to" name="o<?php echo $t101_ho_head_list->RowIndex ?>_dept_to" id="o<?php echo $t101_ho_head_list->RowIndex ?>_dept_to" value="<?php echo HtmlEncode($t101_ho_head_list->dept_to->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_ho_head_list->ho_by->Visible) { // ho_by ?>
		<td data-name="ho_by">
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_ho_by" class="form-group t101_ho_head_ho_by">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t101_ho_head_list->RowIndex ?>_ho_by"><?php echo EmptyValue(strval($t101_ho_head_list->ho_by->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_list->ho_by->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_list->ho_by->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_list->ho_by->ReadOnly || $t101_ho_head_list->ho_by->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t101_ho_head_list->RowIndex ?>_ho_by',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_list->ho_by->Lookup->getParamTag($t101_ho_head_list, "p_x" . $t101_ho_head_list->RowIndex . "_ho_by") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_ho_by" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_list->ho_by->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_ho_head_list->RowIndex ?>_ho_by" id="x<?php echo $t101_ho_head_list->RowIndex ?>_ho_by" value="<?php echo $t101_ho_head_list->ho_by->CurrentValue ?>"<?php echo $t101_ho_head_list->ho_by->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_ho_head" data-field="x_ho_by" name="o<?php echo $t101_ho_head_list->RowIndex ?>_ho_by" id="o<?php echo $t101_ho_head_list->RowIndex ?>_ho_by" value="<?php echo HtmlEncode($t101_ho_head_list->ho_by->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_ho_head_list->cno_by->Visible) { // cno_by ?>
		<td data-name="cno_by">
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_cno_by" class="form-group t101_ho_head_cno_by">
<input type="text" data-table="t101_ho_head" data-field="x_cno_by" name="x<?php echo $t101_ho_head_list->RowIndex ?>_cno_by" id="x<?php echo $t101_ho_head_list->RowIndex ?>_cno_by" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t101_ho_head_list->cno_by->getPlaceHolder()) ?>" value="<?php echo $t101_ho_head_list->cno_by->EditValue ?>"<?php echo $t101_ho_head_list->cno_by->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_ho_head" data-field="x_cno_by" name="o<?php echo $t101_ho_head_list->RowIndex ?>_cno_by" id="o<?php echo $t101_ho_head_list->RowIndex ?>_cno_by" value="<?php echo HtmlEncode($t101_ho_head_list->cno_by->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_ho_head_list->dept_by->Visible) { // dept_by ?>
		<td data-name="dept_by">
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_dept_by" class="form-group t101_ho_head_dept_by">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t101_ho_head_list->RowIndex ?>_dept_by"><?php echo EmptyValue(strval($t101_ho_head_list->dept_by->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_list->dept_by->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_list->dept_by->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_list->dept_by->ReadOnly || $t101_ho_head_list->dept_by->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t101_ho_head_list->RowIndex ?>_dept_by',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_list->dept_by->Lookup->getParamTag($t101_ho_head_list, "p_x" . $t101_ho_head_list->RowIndex . "_dept_by") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_dept_by" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_list->dept_by->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_ho_head_list->RowIndex ?>_dept_by" id="x<?php echo $t101_ho_head_list->RowIndex ?>_dept_by" value="<?php echo $t101_ho_head_list->dept_by->CurrentValue ?>"<?php echo $t101_ho_head_list->dept_by->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_ho_head" data-field="x_dept_by" name="o<?php echo $t101_ho_head_list->RowIndex ?>_dept_by" id="o<?php echo $t101_ho_head_list->RowIndex ?>_dept_by" value="<?php echo HtmlEncode($t101_ho_head_list->dept_by->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_ho_head_list->sign1->Visible) { // sign1 ?>
		<td data-name="sign1">
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_sign1" class="form-group t101_ho_head_sign1">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t101_ho_head_list->RowIndex ?>_sign1"><?php echo EmptyValue(strval($t101_ho_head_list->sign1->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_list->sign1->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_list->sign1->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_list->sign1->ReadOnly || $t101_ho_head_list->sign1->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t101_ho_head_list->RowIndex ?>_sign1',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_list->sign1->Lookup->getParamTag($t101_ho_head_list, "p_x" . $t101_ho_head_list->RowIndex . "_sign1") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_sign1" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_list->sign1->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_ho_head_list->RowIndex ?>_sign1" id="x<?php echo $t101_ho_head_list->RowIndex ?>_sign1" value="<?php echo $t101_ho_head_list->sign1->CurrentValue ?>"<?php echo $t101_ho_head_list->sign1->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_ho_head" data-field="x_sign1" name="o<?php echo $t101_ho_head_list->RowIndex ?>_sign1" id="o<?php echo $t101_ho_head_list->RowIndex ?>_sign1" value="<?php echo HtmlEncode($t101_ho_head_list->sign1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_ho_head_list->sign2->Visible) { // sign2 ?>
		<td data-name="sign2">
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_sign2" class="form-group t101_ho_head_sign2">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t101_ho_head_list->RowIndex ?>_sign2"><?php echo EmptyValue(strval($t101_ho_head_list->sign2->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_list->sign2->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_list->sign2->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_list->sign2->ReadOnly || $t101_ho_head_list->sign2->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t101_ho_head_list->RowIndex ?>_sign2',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_list->sign2->Lookup->getParamTag($t101_ho_head_list, "p_x" . $t101_ho_head_list->RowIndex . "_sign2") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_sign2" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_list->sign2->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_ho_head_list->RowIndex ?>_sign2" id="x<?php echo $t101_ho_head_list->RowIndex ?>_sign2" value="<?php echo $t101_ho_head_list->sign2->CurrentValue ?>"<?php echo $t101_ho_head_list->sign2->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_ho_head" data-field="x_sign2" name="o<?php echo $t101_ho_head_list->RowIndex ?>_sign2" id="o<?php echo $t101_ho_head_list->RowIndex ?>_sign2" value="<?php echo HtmlEncode($t101_ho_head_list->sign2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_ho_head_list->sign3->Visible) { // sign3 ?>
		<td data-name="sign3">
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_sign3" class="form-group t101_ho_head_sign3">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t101_ho_head_list->RowIndex ?>_sign3"><?php echo EmptyValue(strval($t101_ho_head_list->sign3->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_list->sign3->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_list->sign3->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_list->sign3->ReadOnly || $t101_ho_head_list->sign3->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t101_ho_head_list->RowIndex ?>_sign3',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_list->sign3->Lookup->getParamTag($t101_ho_head_list, "p_x" . $t101_ho_head_list->RowIndex . "_sign3") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_sign3" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_list->sign3->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_ho_head_list->RowIndex ?>_sign3" id="x<?php echo $t101_ho_head_list->RowIndex ?>_sign3" value="<?php echo $t101_ho_head_list->sign3->CurrentValue ?>"<?php echo $t101_ho_head_list->sign3->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_ho_head" data-field="x_sign3" name="o<?php echo $t101_ho_head_list->RowIndex ?>_sign3" id="o<?php echo $t101_ho_head_list->RowIndex ?>_sign3" value="<?php echo HtmlEncode($t101_ho_head_list->sign3->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_ho_head_list->sign4->Visible) { // sign4 ?>
		<td data-name="sign4">
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_sign4" class="form-group t101_ho_head_sign4">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t101_ho_head_list->RowIndex ?>_sign4"><?php echo EmptyValue(strval($t101_ho_head_list->sign4->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_list->sign4->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_list->sign4->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_list->sign4->ReadOnly || $t101_ho_head_list->sign4->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t101_ho_head_list->RowIndex ?>_sign4',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_list->sign4->Lookup->getParamTag($t101_ho_head_list, "p_x" . $t101_ho_head_list->RowIndex . "_sign4") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_sign4" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_list->sign4->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_ho_head_list->RowIndex ?>_sign4" id="x<?php echo $t101_ho_head_list->RowIndex ?>_sign4" value="<?php echo $t101_ho_head_list->sign4->CurrentValue ?>"<?php echo $t101_ho_head_list->sign4->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_ho_head" data-field="x_sign4" name="o<?php echo $t101_ho_head_list->RowIndex ?>_sign4" id="o<?php echo $t101_ho_head_list->RowIndex ?>_sign4" value="<?php echo HtmlEncode($t101_ho_head_list->sign4->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t101_ho_head_list->ListOptions->render("body", "right", $t101_ho_head_list->RowCount);
?>
<script>
loadjs.ready(["ft101_ho_headlist", "load"], function() {
	ft101_ho_headlist.updateLists(<?php echo $t101_ho_head_list->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
<?php
if ($t101_ho_head_list->ExportAll && $t101_ho_head_list->isExport()) {
	$t101_ho_head_list->StopRecord = $t101_ho_head_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t101_ho_head_list->TotalRecords > $t101_ho_head_list->StartRecord + $t101_ho_head_list->DisplayRecords - 1)
		$t101_ho_head_list->StopRecord = $t101_ho_head_list->StartRecord + $t101_ho_head_list->DisplayRecords - 1;
	else
		$t101_ho_head_list->StopRecord = $t101_ho_head_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($t101_ho_head->isConfirm() || $t101_ho_head_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t101_ho_head_list->FormKeyCountName) && ($t101_ho_head_list->isGridAdd() || $t101_ho_head_list->isGridEdit() || $t101_ho_head->isConfirm())) {
		$t101_ho_head_list->KeyCount = $CurrentForm->getValue($t101_ho_head_list->FormKeyCountName);
		$t101_ho_head_list->StopRecord = $t101_ho_head_list->StartRecord + $t101_ho_head_list->KeyCount - 1;
	}
}
$t101_ho_head_list->RecordCount = $t101_ho_head_list->StartRecord - 1;
if ($t101_ho_head_list->Recordset && !$t101_ho_head_list->Recordset->EOF) {
	$t101_ho_head_list->Recordset->moveFirst();
	$selectLimit = $t101_ho_head_list->UseSelectLimit;
	if (!$selectLimit && $t101_ho_head_list->StartRecord > 1)
		$t101_ho_head_list->Recordset->move($t101_ho_head_list->StartRecord - 1);
} elseif (!$t101_ho_head->AllowAddDeleteRow && $t101_ho_head_list->StopRecord == 0) {
	$t101_ho_head_list->StopRecord = $t101_ho_head->GridAddRowCount;
}

// Initialize aggregate
$t101_ho_head->RowType = ROWTYPE_AGGREGATEINIT;
$t101_ho_head->resetAttributes();
$t101_ho_head_list->renderRow();
$t101_ho_head_list->EditRowCount = 0;
if ($t101_ho_head_list->isEdit())
	$t101_ho_head_list->RowIndex = 1;
if ($t101_ho_head_list->isGridAdd())
	$t101_ho_head_list->RowIndex = 0;
if ($t101_ho_head_list->isGridEdit())
	$t101_ho_head_list->RowIndex = 0;
while ($t101_ho_head_list->RecordCount < $t101_ho_head_list->StopRecord) {
	$t101_ho_head_list->RecordCount++;
	if ($t101_ho_head_list->RecordCount >= $t101_ho_head_list->StartRecord) {
		$t101_ho_head_list->RowCount++;
		if ($t101_ho_head_list->isGridAdd() || $t101_ho_head_list->isGridEdit() || $t101_ho_head->isConfirm()) {
			$t101_ho_head_list->RowIndex++;
			$CurrentForm->Index = $t101_ho_head_list->RowIndex;
			if ($CurrentForm->hasValue($t101_ho_head_list->FormActionName) && ($t101_ho_head->isConfirm() || $t101_ho_head_list->EventCancelled))
				$t101_ho_head_list->RowAction = strval($CurrentForm->getValue($t101_ho_head_list->FormActionName));
			elseif ($t101_ho_head_list->isGridAdd())
				$t101_ho_head_list->RowAction = "insert";
			else
				$t101_ho_head_list->RowAction = "";
		}

		// Set up key count
		$t101_ho_head_list->KeyCount = $t101_ho_head_list->RowIndex;

		// Init row class and style
		$t101_ho_head->resetAttributes();
		$t101_ho_head->CssClass = "";
		if ($t101_ho_head_list->isGridAdd()) {
			$t101_ho_head_list->loadRowValues(); // Load default values
		} else {
			$t101_ho_head_list->loadRowValues($t101_ho_head_list->Recordset); // Load row values
		}
		$t101_ho_head->RowType = ROWTYPE_VIEW; // Render view
		if ($t101_ho_head_list->isGridAdd()) // Grid add
			$t101_ho_head->RowType = ROWTYPE_ADD; // Render add
		if ($t101_ho_head_list->isGridAdd() && $t101_ho_head->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t101_ho_head_list->restoreCurrentRowFormValues($t101_ho_head_list->RowIndex); // Restore form values
		if ($t101_ho_head_list->isEdit()) {
			if ($t101_ho_head_list->checkInlineEditKey() && $t101_ho_head_list->EditRowCount == 0) { // Inline edit
				$t101_ho_head->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($t101_ho_head_list->isGridEdit()) { // Grid edit
			if ($t101_ho_head->EventCancelled)
				$t101_ho_head_list->restoreCurrentRowFormValues($t101_ho_head_list->RowIndex); // Restore form values
			if ($t101_ho_head_list->RowAction == "insert")
				$t101_ho_head->RowType = ROWTYPE_ADD; // Render add
			else
				$t101_ho_head->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t101_ho_head_list->isEdit() && $t101_ho_head->RowType == ROWTYPE_EDIT && $t101_ho_head->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$t101_ho_head_list->restoreFormValues(); // Restore form values
		}
		if ($t101_ho_head_list->isGridEdit() && ($t101_ho_head->RowType == ROWTYPE_EDIT || $t101_ho_head->RowType == ROWTYPE_ADD) && $t101_ho_head->EventCancelled) // Update failed
			$t101_ho_head_list->restoreCurrentRowFormValues($t101_ho_head_list->RowIndex); // Restore form values
		if ($t101_ho_head->RowType == ROWTYPE_EDIT) // Edit row
			$t101_ho_head_list->EditRowCount++;

		// Set up row id / data-rowindex
		$t101_ho_head->RowAttrs->merge(["data-rowindex" => $t101_ho_head_list->RowCount, "id" => "r" . $t101_ho_head_list->RowCount . "_t101_ho_head", "data-rowtype" => $t101_ho_head->RowType]);

		// Render row
		$t101_ho_head_list->renderRow();

		// Render list options
		$t101_ho_head_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t101_ho_head_list->RowAction != "delete" && $t101_ho_head_list->RowAction != "insertdelete" && !($t101_ho_head_list->RowAction == "insert" && $t101_ho_head->isConfirm() && $t101_ho_head_list->emptyRow())) {
?>
	<tr <?php echo $t101_ho_head->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t101_ho_head_list->ListOptions->render("body", "left", $t101_ho_head_list->RowCount);
?>
	<?php if ($t101_ho_head_list->tr_no->Visible) { // tr_no ?>
		<td data-name="tr_no" <?php echo $t101_ho_head_list->tr_no->cellAttributes() ?>>
<?php if ($t101_ho_head->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_tr_no" class="form-group">
<input type="text" data-table="t101_ho_head" data-field="x_tr_no" name="x<?php echo $t101_ho_head_list->RowIndex ?>_tr_no" id="x<?php echo $t101_ho_head_list->RowIndex ?>_tr_no" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t101_ho_head_list->tr_no->getPlaceHolder()) ?>" value="<?php echo $t101_ho_head_list->tr_no->EditValue ?>"<?php echo $t101_ho_head_list->tr_no->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_ho_head" data-field="x_tr_no" name="o<?php echo $t101_ho_head_list->RowIndex ?>_tr_no" id="o<?php echo $t101_ho_head_list->RowIndex ?>_tr_no" value="<?php echo HtmlEncode($t101_ho_head_list->tr_no->OldValue) ?>">
<?php } ?>
<?php if ($t101_ho_head->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_tr_no" class="form-group">
<input type="text" data-table="t101_ho_head" data-field="x_tr_no" name="x<?php echo $t101_ho_head_list->RowIndex ?>_tr_no" id="x<?php echo $t101_ho_head_list->RowIndex ?>_tr_no" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t101_ho_head_list->tr_no->getPlaceHolder()) ?>" value="<?php echo $t101_ho_head_list->tr_no->EditValue ?>"<?php echo $t101_ho_head_list->tr_no->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_ho_head->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_tr_no">
<span<?php echo $t101_ho_head_list->tr_no->viewAttributes() ?>><?php echo $t101_ho_head_list->tr_no->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t101_ho_head->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_id" name="x<?php echo $t101_ho_head_list->RowIndex ?>_id" id="x<?php echo $t101_ho_head_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t101_ho_head_list->id->CurrentValue) ?>">
<input type="hidden" data-table="t101_ho_head" data-field="x_id" name="o<?php echo $t101_ho_head_list->RowIndex ?>_id" id="o<?php echo $t101_ho_head_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t101_ho_head_list->id->OldValue) ?>">
<?php } ?>
<?php if ($t101_ho_head->RowType == ROWTYPE_EDIT || $t101_ho_head->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_id" name="x<?php echo $t101_ho_head_list->RowIndex ?>_id" id="x<?php echo $t101_ho_head_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t101_ho_head_list->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($t101_ho_head_list->tr_date->Visible) { // tr_date ?>
		<td data-name="tr_date" <?php echo $t101_ho_head_list->tr_date->cellAttributes() ?>>
<?php if ($t101_ho_head->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_tr_date" class="form-group">
<input type="text" data-table="t101_ho_head" data-field="x_tr_date" data-format="7" name="x<?php echo $t101_ho_head_list->RowIndex ?>_tr_date" id="x<?php echo $t101_ho_head_list->RowIndex ?>_tr_date" maxlength="10" placeholder="<?php echo HtmlEncode($t101_ho_head_list->tr_date->getPlaceHolder()) ?>" value="<?php echo $t101_ho_head_list->tr_date->EditValue ?>"<?php echo $t101_ho_head_list->tr_date->editAttributes() ?>>
<?php if (!$t101_ho_head_list->tr_date->ReadOnly && !$t101_ho_head_list->tr_date->Disabled && !isset($t101_ho_head_list->tr_date->EditAttrs["readonly"]) && !isset($t101_ho_head_list->tr_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft101_ho_headlist", "datetimepicker"], function() {
	ew.createDateTimePicker("ft101_ho_headlist", "x<?php echo $t101_ho_head_list->RowIndex ?>_tr_date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="t101_ho_head" data-field="x_tr_date" name="o<?php echo $t101_ho_head_list->RowIndex ?>_tr_date" id="o<?php echo $t101_ho_head_list->RowIndex ?>_tr_date" value="<?php echo HtmlEncode($t101_ho_head_list->tr_date->OldValue) ?>">
<?php } ?>
<?php if ($t101_ho_head->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_tr_date" class="form-group">
<input type="text" data-table="t101_ho_head" data-field="x_tr_date" data-format="7" name="x<?php echo $t101_ho_head_list->RowIndex ?>_tr_date" id="x<?php echo $t101_ho_head_list->RowIndex ?>_tr_date" maxlength="10" placeholder="<?php echo HtmlEncode($t101_ho_head_list->tr_date->getPlaceHolder()) ?>" value="<?php echo $t101_ho_head_list->tr_date->EditValue ?>"<?php echo $t101_ho_head_list->tr_date->editAttributes() ?>>
<?php if (!$t101_ho_head_list->tr_date->ReadOnly && !$t101_ho_head_list->tr_date->Disabled && !isset($t101_ho_head_list->tr_date->EditAttrs["readonly"]) && !isset($t101_ho_head_list->tr_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft101_ho_headlist", "datetimepicker"], function() {
	ew.createDateTimePicker("ft101_ho_headlist", "x<?php echo $t101_ho_head_list->RowIndex ?>_tr_date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($t101_ho_head->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_tr_date">
<span<?php echo $t101_ho_head_list->tr_date->viewAttributes() ?>><?php echo $t101_ho_head_list->tr_date->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_ho_head_list->ho_to->Visible) { // ho_to ?>
		<td data-name="ho_to" <?php echo $t101_ho_head_list->ho_to->cellAttributes() ?>>
<?php if ($t101_ho_head->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_ho_to" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t101_ho_head_list->RowIndex ?>_ho_to"><?php echo EmptyValue(strval($t101_ho_head_list->ho_to->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_list->ho_to->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_list->ho_to->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_list->ho_to->ReadOnly || $t101_ho_head_list->ho_to->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t101_ho_head_list->RowIndex ?>_ho_to',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_list->ho_to->Lookup->getParamTag($t101_ho_head_list, "p_x" . $t101_ho_head_list->RowIndex . "_ho_to") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_ho_to" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_list->ho_to->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_ho_head_list->RowIndex ?>_ho_to" id="x<?php echo $t101_ho_head_list->RowIndex ?>_ho_to" value="<?php echo $t101_ho_head_list->ho_to->CurrentValue ?>"<?php echo $t101_ho_head_list->ho_to->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_ho_head" data-field="x_ho_to" name="o<?php echo $t101_ho_head_list->RowIndex ?>_ho_to" id="o<?php echo $t101_ho_head_list->RowIndex ?>_ho_to" value="<?php echo HtmlEncode($t101_ho_head_list->ho_to->OldValue) ?>">
<?php } ?>
<?php if ($t101_ho_head->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_ho_to" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t101_ho_head_list->RowIndex ?>_ho_to"><?php echo EmptyValue(strval($t101_ho_head_list->ho_to->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_list->ho_to->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_list->ho_to->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_list->ho_to->ReadOnly || $t101_ho_head_list->ho_to->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t101_ho_head_list->RowIndex ?>_ho_to',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_list->ho_to->Lookup->getParamTag($t101_ho_head_list, "p_x" . $t101_ho_head_list->RowIndex . "_ho_to") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_ho_to" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_list->ho_to->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_ho_head_list->RowIndex ?>_ho_to" id="x<?php echo $t101_ho_head_list->RowIndex ?>_ho_to" value="<?php echo $t101_ho_head_list->ho_to->CurrentValue ?>"<?php echo $t101_ho_head_list->ho_to->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_ho_head->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_ho_to">
<span<?php echo $t101_ho_head_list->ho_to->viewAttributes() ?>><?php echo $t101_ho_head_list->ho_to->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_ho_head_list->cno_to->Visible) { // cno_to ?>
		<td data-name="cno_to" <?php echo $t101_ho_head_list->cno_to->cellAttributes() ?>>
<?php if ($t101_ho_head->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_cno_to" class="form-group">
<input type="text" data-table="t101_ho_head" data-field="x_cno_to" name="x<?php echo $t101_ho_head_list->RowIndex ?>_cno_to" id="x<?php echo $t101_ho_head_list->RowIndex ?>_cno_to" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t101_ho_head_list->cno_to->getPlaceHolder()) ?>" value="<?php echo $t101_ho_head_list->cno_to->EditValue ?>"<?php echo $t101_ho_head_list->cno_to->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_ho_head" data-field="x_cno_to" name="o<?php echo $t101_ho_head_list->RowIndex ?>_cno_to" id="o<?php echo $t101_ho_head_list->RowIndex ?>_cno_to" value="<?php echo HtmlEncode($t101_ho_head_list->cno_to->OldValue) ?>">
<?php } ?>
<?php if ($t101_ho_head->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_cno_to" class="form-group">
<input type="text" data-table="t101_ho_head" data-field="x_cno_to" name="x<?php echo $t101_ho_head_list->RowIndex ?>_cno_to" id="x<?php echo $t101_ho_head_list->RowIndex ?>_cno_to" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t101_ho_head_list->cno_to->getPlaceHolder()) ?>" value="<?php echo $t101_ho_head_list->cno_to->EditValue ?>"<?php echo $t101_ho_head_list->cno_to->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_ho_head->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_cno_to">
<span<?php echo $t101_ho_head_list->cno_to->viewAttributes() ?>><?php echo $t101_ho_head_list->cno_to->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_ho_head_list->dept_to->Visible) { // dept_to ?>
		<td data-name="dept_to" <?php echo $t101_ho_head_list->dept_to->cellAttributes() ?>>
<?php if ($t101_ho_head->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_dept_to" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t101_ho_head_list->RowIndex ?>_dept_to"><?php echo EmptyValue(strval($t101_ho_head_list->dept_to->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_list->dept_to->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_list->dept_to->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_list->dept_to->ReadOnly || $t101_ho_head_list->dept_to->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t101_ho_head_list->RowIndex ?>_dept_to',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_list->dept_to->Lookup->getParamTag($t101_ho_head_list, "p_x" . $t101_ho_head_list->RowIndex . "_dept_to") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_dept_to" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_list->dept_to->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_ho_head_list->RowIndex ?>_dept_to" id="x<?php echo $t101_ho_head_list->RowIndex ?>_dept_to" value="<?php echo $t101_ho_head_list->dept_to->CurrentValue ?>"<?php echo $t101_ho_head_list->dept_to->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_ho_head" data-field="x_dept_to" name="o<?php echo $t101_ho_head_list->RowIndex ?>_dept_to" id="o<?php echo $t101_ho_head_list->RowIndex ?>_dept_to" value="<?php echo HtmlEncode($t101_ho_head_list->dept_to->OldValue) ?>">
<?php } ?>
<?php if ($t101_ho_head->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_dept_to" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t101_ho_head_list->RowIndex ?>_dept_to"><?php echo EmptyValue(strval($t101_ho_head_list->dept_to->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_list->dept_to->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_list->dept_to->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_list->dept_to->ReadOnly || $t101_ho_head_list->dept_to->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t101_ho_head_list->RowIndex ?>_dept_to',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_list->dept_to->Lookup->getParamTag($t101_ho_head_list, "p_x" . $t101_ho_head_list->RowIndex . "_dept_to") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_dept_to" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_list->dept_to->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_ho_head_list->RowIndex ?>_dept_to" id="x<?php echo $t101_ho_head_list->RowIndex ?>_dept_to" value="<?php echo $t101_ho_head_list->dept_to->CurrentValue ?>"<?php echo $t101_ho_head_list->dept_to->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_ho_head->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_dept_to">
<span<?php echo $t101_ho_head_list->dept_to->viewAttributes() ?>><?php echo $t101_ho_head_list->dept_to->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_ho_head_list->ho_by->Visible) { // ho_by ?>
		<td data-name="ho_by" <?php echo $t101_ho_head_list->ho_by->cellAttributes() ?>>
<?php if ($t101_ho_head->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_ho_by" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t101_ho_head_list->RowIndex ?>_ho_by"><?php echo EmptyValue(strval($t101_ho_head_list->ho_by->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_list->ho_by->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_list->ho_by->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_list->ho_by->ReadOnly || $t101_ho_head_list->ho_by->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t101_ho_head_list->RowIndex ?>_ho_by',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_list->ho_by->Lookup->getParamTag($t101_ho_head_list, "p_x" . $t101_ho_head_list->RowIndex . "_ho_by") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_ho_by" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_list->ho_by->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_ho_head_list->RowIndex ?>_ho_by" id="x<?php echo $t101_ho_head_list->RowIndex ?>_ho_by" value="<?php echo $t101_ho_head_list->ho_by->CurrentValue ?>"<?php echo $t101_ho_head_list->ho_by->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_ho_head" data-field="x_ho_by" name="o<?php echo $t101_ho_head_list->RowIndex ?>_ho_by" id="o<?php echo $t101_ho_head_list->RowIndex ?>_ho_by" value="<?php echo HtmlEncode($t101_ho_head_list->ho_by->OldValue) ?>">
<?php } ?>
<?php if ($t101_ho_head->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_ho_by" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t101_ho_head_list->RowIndex ?>_ho_by"><?php echo EmptyValue(strval($t101_ho_head_list->ho_by->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_list->ho_by->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_list->ho_by->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_list->ho_by->ReadOnly || $t101_ho_head_list->ho_by->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t101_ho_head_list->RowIndex ?>_ho_by',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_list->ho_by->Lookup->getParamTag($t101_ho_head_list, "p_x" . $t101_ho_head_list->RowIndex . "_ho_by") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_ho_by" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_list->ho_by->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_ho_head_list->RowIndex ?>_ho_by" id="x<?php echo $t101_ho_head_list->RowIndex ?>_ho_by" value="<?php echo $t101_ho_head_list->ho_by->CurrentValue ?>"<?php echo $t101_ho_head_list->ho_by->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_ho_head->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_ho_by">
<span<?php echo $t101_ho_head_list->ho_by->viewAttributes() ?>><?php echo $t101_ho_head_list->ho_by->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_ho_head_list->cno_by->Visible) { // cno_by ?>
		<td data-name="cno_by" <?php echo $t101_ho_head_list->cno_by->cellAttributes() ?>>
<?php if ($t101_ho_head->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_cno_by" class="form-group">
<input type="text" data-table="t101_ho_head" data-field="x_cno_by" name="x<?php echo $t101_ho_head_list->RowIndex ?>_cno_by" id="x<?php echo $t101_ho_head_list->RowIndex ?>_cno_by" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t101_ho_head_list->cno_by->getPlaceHolder()) ?>" value="<?php echo $t101_ho_head_list->cno_by->EditValue ?>"<?php echo $t101_ho_head_list->cno_by->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_ho_head" data-field="x_cno_by" name="o<?php echo $t101_ho_head_list->RowIndex ?>_cno_by" id="o<?php echo $t101_ho_head_list->RowIndex ?>_cno_by" value="<?php echo HtmlEncode($t101_ho_head_list->cno_by->OldValue) ?>">
<?php } ?>
<?php if ($t101_ho_head->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_cno_by" class="form-group">
<input type="text" data-table="t101_ho_head" data-field="x_cno_by" name="x<?php echo $t101_ho_head_list->RowIndex ?>_cno_by" id="x<?php echo $t101_ho_head_list->RowIndex ?>_cno_by" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t101_ho_head_list->cno_by->getPlaceHolder()) ?>" value="<?php echo $t101_ho_head_list->cno_by->EditValue ?>"<?php echo $t101_ho_head_list->cno_by->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_ho_head->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_cno_by">
<span<?php echo $t101_ho_head_list->cno_by->viewAttributes() ?>><?php echo $t101_ho_head_list->cno_by->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_ho_head_list->dept_by->Visible) { // dept_by ?>
		<td data-name="dept_by" <?php echo $t101_ho_head_list->dept_by->cellAttributes() ?>>
<?php if ($t101_ho_head->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_dept_by" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t101_ho_head_list->RowIndex ?>_dept_by"><?php echo EmptyValue(strval($t101_ho_head_list->dept_by->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_list->dept_by->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_list->dept_by->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_list->dept_by->ReadOnly || $t101_ho_head_list->dept_by->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t101_ho_head_list->RowIndex ?>_dept_by',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_list->dept_by->Lookup->getParamTag($t101_ho_head_list, "p_x" . $t101_ho_head_list->RowIndex . "_dept_by") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_dept_by" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_list->dept_by->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_ho_head_list->RowIndex ?>_dept_by" id="x<?php echo $t101_ho_head_list->RowIndex ?>_dept_by" value="<?php echo $t101_ho_head_list->dept_by->CurrentValue ?>"<?php echo $t101_ho_head_list->dept_by->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_ho_head" data-field="x_dept_by" name="o<?php echo $t101_ho_head_list->RowIndex ?>_dept_by" id="o<?php echo $t101_ho_head_list->RowIndex ?>_dept_by" value="<?php echo HtmlEncode($t101_ho_head_list->dept_by->OldValue) ?>">
<?php } ?>
<?php if ($t101_ho_head->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_dept_by" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t101_ho_head_list->RowIndex ?>_dept_by"><?php echo EmptyValue(strval($t101_ho_head_list->dept_by->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_list->dept_by->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_list->dept_by->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_list->dept_by->ReadOnly || $t101_ho_head_list->dept_by->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t101_ho_head_list->RowIndex ?>_dept_by',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_list->dept_by->Lookup->getParamTag($t101_ho_head_list, "p_x" . $t101_ho_head_list->RowIndex . "_dept_by") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_dept_by" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_list->dept_by->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_ho_head_list->RowIndex ?>_dept_by" id="x<?php echo $t101_ho_head_list->RowIndex ?>_dept_by" value="<?php echo $t101_ho_head_list->dept_by->CurrentValue ?>"<?php echo $t101_ho_head_list->dept_by->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_ho_head->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_dept_by">
<span<?php echo $t101_ho_head_list->dept_by->viewAttributes() ?>><?php echo $t101_ho_head_list->dept_by->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_ho_head_list->sign1->Visible) { // sign1 ?>
		<td data-name="sign1" <?php echo $t101_ho_head_list->sign1->cellAttributes() ?>>
<?php if ($t101_ho_head->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_sign1" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t101_ho_head_list->RowIndex ?>_sign1"><?php echo EmptyValue(strval($t101_ho_head_list->sign1->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_list->sign1->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_list->sign1->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_list->sign1->ReadOnly || $t101_ho_head_list->sign1->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t101_ho_head_list->RowIndex ?>_sign1',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_list->sign1->Lookup->getParamTag($t101_ho_head_list, "p_x" . $t101_ho_head_list->RowIndex . "_sign1") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_sign1" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_list->sign1->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_ho_head_list->RowIndex ?>_sign1" id="x<?php echo $t101_ho_head_list->RowIndex ?>_sign1" value="<?php echo $t101_ho_head_list->sign1->CurrentValue ?>"<?php echo $t101_ho_head_list->sign1->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_ho_head" data-field="x_sign1" name="o<?php echo $t101_ho_head_list->RowIndex ?>_sign1" id="o<?php echo $t101_ho_head_list->RowIndex ?>_sign1" value="<?php echo HtmlEncode($t101_ho_head_list->sign1->OldValue) ?>">
<?php } ?>
<?php if ($t101_ho_head->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_sign1" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t101_ho_head_list->RowIndex ?>_sign1"><?php echo EmptyValue(strval($t101_ho_head_list->sign1->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_list->sign1->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_list->sign1->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_list->sign1->ReadOnly || $t101_ho_head_list->sign1->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t101_ho_head_list->RowIndex ?>_sign1',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_list->sign1->Lookup->getParamTag($t101_ho_head_list, "p_x" . $t101_ho_head_list->RowIndex . "_sign1") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_sign1" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_list->sign1->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_ho_head_list->RowIndex ?>_sign1" id="x<?php echo $t101_ho_head_list->RowIndex ?>_sign1" value="<?php echo $t101_ho_head_list->sign1->CurrentValue ?>"<?php echo $t101_ho_head_list->sign1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_ho_head->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_sign1">
<span<?php echo $t101_ho_head_list->sign1->viewAttributes() ?>><?php echo $t101_ho_head_list->sign1->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_ho_head_list->sign2->Visible) { // sign2 ?>
		<td data-name="sign2" <?php echo $t101_ho_head_list->sign2->cellAttributes() ?>>
<?php if ($t101_ho_head->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_sign2" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t101_ho_head_list->RowIndex ?>_sign2"><?php echo EmptyValue(strval($t101_ho_head_list->sign2->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_list->sign2->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_list->sign2->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_list->sign2->ReadOnly || $t101_ho_head_list->sign2->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t101_ho_head_list->RowIndex ?>_sign2',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_list->sign2->Lookup->getParamTag($t101_ho_head_list, "p_x" . $t101_ho_head_list->RowIndex . "_sign2") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_sign2" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_list->sign2->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_ho_head_list->RowIndex ?>_sign2" id="x<?php echo $t101_ho_head_list->RowIndex ?>_sign2" value="<?php echo $t101_ho_head_list->sign2->CurrentValue ?>"<?php echo $t101_ho_head_list->sign2->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_ho_head" data-field="x_sign2" name="o<?php echo $t101_ho_head_list->RowIndex ?>_sign2" id="o<?php echo $t101_ho_head_list->RowIndex ?>_sign2" value="<?php echo HtmlEncode($t101_ho_head_list->sign2->OldValue) ?>">
<?php } ?>
<?php if ($t101_ho_head->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_sign2" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t101_ho_head_list->RowIndex ?>_sign2"><?php echo EmptyValue(strval($t101_ho_head_list->sign2->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_list->sign2->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_list->sign2->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_list->sign2->ReadOnly || $t101_ho_head_list->sign2->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t101_ho_head_list->RowIndex ?>_sign2',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_list->sign2->Lookup->getParamTag($t101_ho_head_list, "p_x" . $t101_ho_head_list->RowIndex . "_sign2") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_sign2" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_list->sign2->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_ho_head_list->RowIndex ?>_sign2" id="x<?php echo $t101_ho_head_list->RowIndex ?>_sign2" value="<?php echo $t101_ho_head_list->sign2->CurrentValue ?>"<?php echo $t101_ho_head_list->sign2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_ho_head->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_sign2">
<span<?php echo $t101_ho_head_list->sign2->viewAttributes() ?>><?php echo $t101_ho_head_list->sign2->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_ho_head_list->sign3->Visible) { // sign3 ?>
		<td data-name="sign3" <?php echo $t101_ho_head_list->sign3->cellAttributes() ?>>
<?php if ($t101_ho_head->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_sign3" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t101_ho_head_list->RowIndex ?>_sign3"><?php echo EmptyValue(strval($t101_ho_head_list->sign3->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_list->sign3->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_list->sign3->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_list->sign3->ReadOnly || $t101_ho_head_list->sign3->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t101_ho_head_list->RowIndex ?>_sign3',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_list->sign3->Lookup->getParamTag($t101_ho_head_list, "p_x" . $t101_ho_head_list->RowIndex . "_sign3") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_sign3" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_list->sign3->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_ho_head_list->RowIndex ?>_sign3" id="x<?php echo $t101_ho_head_list->RowIndex ?>_sign3" value="<?php echo $t101_ho_head_list->sign3->CurrentValue ?>"<?php echo $t101_ho_head_list->sign3->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_ho_head" data-field="x_sign3" name="o<?php echo $t101_ho_head_list->RowIndex ?>_sign3" id="o<?php echo $t101_ho_head_list->RowIndex ?>_sign3" value="<?php echo HtmlEncode($t101_ho_head_list->sign3->OldValue) ?>">
<?php } ?>
<?php if ($t101_ho_head->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_sign3" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t101_ho_head_list->RowIndex ?>_sign3"><?php echo EmptyValue(strval($t101_ho_head_list->sign3->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_list->sign3->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_list->sign3->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_list->sign3->ReadOnly || $t101_ho_head_list->sign3->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t101_ho_head_list->RowIndex ?>_sign3',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_list->sign3->Lookup->getParamTag($t101_ho_head_list, "p_x" . $t101_ho_head_list->RowIndex . "_sign3") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_sign3" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_list->sign3->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_ho_head_list->RowIndex ?>_sign3" id="x<?php echo $t101_ho_head_list->RowIndex ?>_sign3" value="<?php echo $t101_ho_head_list->sign3->CurrentValue ?>"<?php echo $t101_ho_head_list->sign3->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_ho_head->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_sign3">
<span<?php echo $t101_ho_head_list->sign3->viewAttributes() ?>><?php echo $t101_ho_head_list->sign3->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t101_ho_head_list->sign4->Visible) { // sign4 ?>
		<td data-name="sign4" <?php echo $t101_ho_head_list->sign4->cellAttributes() ?>>
<?php if ($t101_ho_head->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_sign4" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t101_ho_head_list->RowIndex ?>_sign4"><?php echo EmptyValue(strval($t101_ho_head_list->sign4->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_list->sign4->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_list->sign4->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_list->sign4->ReadOnly || $t101_ho_head_list->sign4->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t101_ho_head_list->RowIndex ?>_sign4',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_list->sign4->Lookup->getParamTag($t101_ho_head_list, "p_x" . $t101_ho_head_list->RowIndex . "_sign4") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_sign4" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_list->sign4->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_ho_head_list->RowIndex ?>_sign4" id="x<?php echo $t101_ho_head_list->RowIndex ?>_sign4" value="<?php echo $t101_ho_head_list->sign4->CurrentValue ?>"<?php echo $t101_ho_head_list->sign4->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_ho_head" data-field="x_sign4" name="o<?php echo $t101_ho_head_list->RowIndex ?>_sign4" id="o<?php echo $t101_ho_head_list->RowIndex ?>_sign4" value="<?php echo HtmlEncode($t101_ho_head_list->sign4->OldValue) ?>">
<?php } ?>
<?php if ($t101_ho_head->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_sign4" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t101_ho_head_list->RowIndex ?>_sign4"><?php echo EmptyValue(strval($t101_ho_head_list->sign4->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_list->sign4->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_list->sign4->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_list->sign4->ReadOnly || $t101_ho_head_list->sign4->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t101_ho_head_list->RowIndex ?>_sign4',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_list->sign4->Lookup->getParamTag($t101_ho_head_list, "p_x" . $t101_ho_head_list->RowIndex . "_sign4") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_sign4" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_list->sign4->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_ho_head_list->RowIndex ?>_sign4" id="x<?php echo $t101_ho_head_list->RowIndex ?>_sign4" value="<?php echo $t101_ho_head_list->sign4->CurrentValue ?>"<?php echo $t101_ho_head_list->sign4->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_ho_head->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_ho_head_list->RowCount ?>_t101_ho_head_sign4">
<span<?php echo $t101_ho_head_list->sign4->viewAttributes() ?>><?php echo $t101_ho_head_list->sign4->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t101_ho_head_list->ListOptions->render("body", "right", $t101_ho_head_list->RowCount);
?>
	</tr>
<?php if ($t101_ho_head->RowType == ROWTYPE_ADD || $t101_ho_head->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ft101_ho_headlist", "load"], function() {
	ft101_ho_headlist.updateLists(<?php echo $t101_ho_head_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t101_ho_head_list->isGridAdd())
		if (!$t101_ho_head_list->Recordset->EOF)
			$t101_ho_head_list->Recordset->moveNext();
}
?>
<?php
	if ($t101_ho_head_list->isGridAdd() || $t101_ho_head_list->isGridEdit()) {
		$t101_ho_head_list->RowIndex = '$rowindex$';
		$t101_ho_head_list->loadRowValues();

		// Set row properties
		$t101_ho_head->resetAttributes();
		$t101_ho_head->RowAttrs->merge(["data-rowindex" => $t101_ho_head_list->RowIndex, "id" => "r0_t101_ho_head", "data-rowtype" => ROWTYPE_ADD]);
		$t101_ho_head->RowAttrs->appendClass("ew-template");
		$t101_ho_head->RowType = ROWTYPE_ADD;

		// Render row
		$t101_ho_head_list->renderRow();

		// Render list options
		$t101_ho_head_list->renderListOptions();
		$t101_ho_head_list->StartRowCount = 0;
?>
	<tr <?php echo $t101_ho_head->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t101_ho_head_list->ListOptions->render("body", "left", $t101_ho_head_list->RowIndex);
?>
	<?php if ($t101_ho_head_list->tr_no->Visible) { // tr_no ?>
		<td data-name="tr_no">
<span id="el$rowindex$_t101_ho_head_tr_no" class="form-group t101_ho_head_tr_no">
<input type="text" data-table="t101_ho_head" data-field="x_tr_no" name="x<?php echo $t101_ho_head_list->RowIndex ?>_tr_no" id="x<?php echo $t101_ho_head_list->RowIndex ?>_tr_no" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t101_ho_head_list->tr_no->getPlaceHolder()) ?>" value="<?php echo $t101_ho_head_list->tr_no->EditValue ?>"<?php echo $t101_ho_head_list->tr_no->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_ho_head" data-field="x_tr_no" name="o<?php echo $t101_ho_head_list->RowIndex ?>_tr_no" id="o<?php echo $t101_ho_head_list->RowIndex ?>_tr_no" value="<?php echo HtmlEncode($t101_ho_head_list->tr_no->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_ho_head_list->tr_date->Visible) { // tr_date ?>
		<td data-name="tr_date">
<span id="el$rowindex$_t101_ho_head_tr_date" class="form-group t101_ho_head_tr_date">
<input type="text" data-table="t101_ho_head" data-field="x_tr_date" data-format="7" name="x<?php echo $t101_ho_head_list->RowIndex ?>_tr_date" id="x<?php echo $t101_ho_head_list->RowIndex ?>_tr_date" maxlength="10" placeholder="<?php echo HtmlEncode($t101_ho_head_list->tr_date->getPlaceHolder()) ?>" value="<?php echo $t101_ho_head_list->tr_date->EditValue ?>"<?php echo $t101_ho_head_list->tr_date->editAttributes() ?>>
<?php if (!$t101_ho_head_list->tr_date->ReadOnly && !$t101_ho_head_list->tr_date->Disabled && !isset($t101_ho_head_list->tr_date->EditAttrs["readonly"]) && !isset($t101_ho_head_list->tr_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft101_ho_headlist", "datetimepicker"], function() {
	ew.createDateTimePicker("ft101_ho_headlist", "x<?php echo $t101_ho_head_list->RowIndex ?>_tr_date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="t101_ho_head" data-field="x_tr_date" name="o<?php echo $t101_ho_head_list->RowIndex ?>_tr_date" id="o<?php echo $t101_ho_head_list->RowIndex ?>_tr_date" value="<?php echo HtmlEncode($t101_ho_head_list->tr_date->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_ho_head_list->ho_to->Visible) { // ho_to ?>
		<td data-name="ho_to">
<span id="el$rowindex$_t101_ho_head_ho_to" class="form-group t101_ho_head_ho_to">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t101_ho_head_list->RowIndex ?>_ho_to"><?php echo EmptyValue(strval($t101_ho_head_list->ho_to->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_list->ho_to->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_list->ho_to->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_list->ho_to->ReadOnly || $t101_ho_head_list->ho_to->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t101_ho_head_list->RowIndex ?>_ho_to',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_list->ho_to->Lookup->getParamTag($t101_ho_head_list, "p_x" . $t101_ho_head_list->RowIndex . "_ho_to") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_ho_to" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_list->ho_to->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_ho_head_list->RowIndex ?>_ho_to" id="x<?php echo $t101_ho_head_list->RowIndex ?>_ho_to" value="<?php echo $t101_ho_head_list->ho_to->CurrentValue ?>"<?php echo $t101_ho_head_list->ho_to->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_ho_head" data-field="x_ho_to" name="o<?php echo $t101_ho_head_list->RowIndex ?>_ho_to" id="o<?php echo $t101_ho_head_list->RowIndex ?>_ho_to" value="<?php echo HtmlEncode($t101_ho_head_list->ho_to->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_ho_head_list->cno_to->Visible) { // cno_to ?>
		<td data-name="cno_to">
<span id="el$rowindex$_t101_ho_head_cno_to" class="form-group t101_ho_head_cno_to">
<input type="text" data-table="t101_ho_head" data-field="x_cno_to" name="x<?php echo $t101_ho_head_list->RowIndex ?>_cno_to" id="x<?php echo $t101_ho_head_list->RowIndex ?>_cno_to" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t101_ho_head_list->cno_to->getPlaceHolder()) ?>" value="<?php echo $t101_ho_head_list->cno_to->EditValue ?>"<?php echo $t101_ho_head_list->cno_to->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_ho_head" data-field="x_cno_to" name="o<?php echo $t101_ho_head_list->RowIndex ?>_cno_to" id="o<?php echo $t101_ho_head_list->RowIndex ?>_cno_to" value="<?php echo HtmlEncode($t101_ho_head_list->cno_to->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_ho_head_list->dept_to->Visible) { // dept_to ?>
		<td data-name="dept_to">
<span id="el$rowindex$_t101_ho_head_dept_to" class="form-group t101_ho_head_dept_to">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t101_ho_head_list->RowIndex ?>_dept_to"><?php echo EmptyValue(strval($t101_ho_head_list->dept_to->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_list->dept_to->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_list->dept_to->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_list->dept_to->ReadOnly || $t101_ho_head_list->dept_to->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t101_ho_head_list->RowIndex ?>_dept_to',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_list->dept_to->Lookup->getParamTag($t101_ho_head_list, "p_x" . $t101_ho_head_list->RowIndex . "_dept_to") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_dept_to" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_list->dept_to->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_ho_head_list->RowIndex ?>_dept_to" id="x<?php echo $t101_ho_head_list->RowIndex ?>_dept_to" value="<?php echo $t101_ho_head_list->dept_to->CurrentValue ?>"<?php echo $t101_ho_head_list->dept_to->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_ho_head" data-field="x_dept_to" name="o<?php echo $t101_ho_head_list->RowIndex ?>_dept_to" id="o<?php echo $t101_ho_head_list->RowIndex ?>_dept_to" value="<?php echo HtmlEncode($t101_ho_head_list->dept_to->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_ho_head_list->ho_by->Visible) { // ho_by ?>
		<td data-name="ho_by">
<span id="el$rowindex$_t101_ho_head_ho_by" class="form-group t101_ho_head_ho_by">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t101_ho_head_list->RowIndex ?>_ho_by"><?php echo EmptyValue(strval($t101_ho_head_list->ho_by->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_list->ho_by->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_list->ho_by->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_list->ho_by->ReadOnly || $t101_ho_head_list->ho_by->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t101_ho_head_list->RowIndex ?>_ho_by',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_list->ho_by->Lookup->getParamTag($t101_ho_head_list, "p_x" . $t101_ho_head_list->RowIndex . "_ho_by") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_ho_by" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_list->ho_by->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_ho_head_list->RowIndex ?>_ho_by" id="x<?php echo $t101_ho_head_list->RowIndex ?>_ho_by" value="<?php echo $t101_ho_head_list->ho_by->CurrentValue ?>"<?php echo $t101_ho_head_list->ho_by->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_ho_head" data-field="x_ho_by" name="o<?php echo $t101_ho_head_list->RowIndex ?>_ho_by" id="o<?php echo $t101_ho_head_list->RowIndex ?>_ho_by" value="<?php echo HtmlEncode($t101_ho_head_list->ho_by->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_ho_head_list->cno_by->Visible) { // cno_by ?>
		<td data-name="cno_by">
<span id="el$rowindex$_t101_ho_head_cno_by" class="form-group t101_ho_head_cno_by">
<input type="text" data-table="t101_ho_head" data-field="x_cno_by" name="x<?php echo $t101_ho_head_list->RowIndex ?>_cno_by" id="x<?php echo $t101_ho_head_list->RowIndex ?>_cno_by" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t101_ho_head_list->cno_by->getPlaceHolder()) ?>" value="<?php echo $t101_ho_head_list->cno_by->EditValue ?>"<?php echo $t101_ho_head_list->cno_by->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_ho_head" data-field="x_cno_by" name="o<?php echo $t101_ho_head_list->RowIndex ?>_cno_by" id="o<?php echo $t101_ho_head_list->RowIndex ?>_cno_by" value="<?php echo HtmlEncode($t101_ho_head_list->cno_by->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_ho_head_list->dept_by->Visible) { // dept_by ?>
		<td data-name="dept_by">
<span id="el$rowindex$_t101_ho_head_dept_by" class="form-group t101_ho_head_dept_by">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t101_ho_head_list->RowIndex ?>_dept_by"><?php echo EmptyValue(strval($t101_ho_head_list->dept_by->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_list->dept_by->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_list->dept_by->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_list->dept_by->ReadOnly || $t101_ho_head_list->dept_by->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t101_ho_head_list->RowIndex ?>_dept_by',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_list->dept_by->Lookup->getParamTag($t101_ho_head_list, "p_x" . $t101_ho_head_list->RowIndex . "_dept_by") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_dept_by" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_list->dept_by->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_ho_head_list->RowIndex ?>_dept_by" id="x<?php echo $t101_ho_head_list->RowIndex ?>_dept_by" value="<?php echo $t101_ho_head_list->dept_by->CurrentValue ?>"<?php echo $t101_ho_head_list->dept_by->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_ho_head" data-field="x_dept_by" name="o<?php echo $t101_ho_head_list->RowIndex ?>_dept_by" id="o<?php echo $t101_ho_head_list->RowIndex ?>_dept_by" value="<?php echo HtmlEncode($t101_ho_head_list->dept_by->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_ho_head_list->sign1->Visible) { // sign1 ?>
		<td data-name="sign1">
<span id="el$rowindex$_t101_ho_head_sign1" class="form-group t101_ho_head_sign1">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t101_ho_head_list->RowIndex ?>_sign1"><?php echo EmptyValue(strval($t101_ho_head_list->sign1->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_list->sign1->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_list->sign1->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_list->sign1->ReadOnly || $t101_ho_head_list->sign1->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t101_ho_head_list->RowIndex ?>_sign1',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_list->sign1->Lookup->getParamTag($t101_ho_head_list, "p_x" . $t101_ho_head_list->RowIndex . "_sign1") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_sign1" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_list->sign1->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_ho_head_list->RowIndex ?>_sign1" id="x<?php echo $t101_ho_head_list->RowIndex ?>_sign1" value="<?php echo $t101_ho_head_list->sign1->CurrentValue ?>"<?php echo $t101_ho_head_list->sign1->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_ho_head" data-field="x_sign1" name="o<?php echo $t101_ho_head_list->RowIndex ?>_sign1" id="o<?php echo $t101_ho_head_list->RowIndex ?>_sign1" value="<?php echo HtmlEncode($t101_ho_head_list->sign1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_ho_head_list->sign2->Visible) { // sign2 ?>
		<td data-name="sign2">
<span id="el$rowindex$_t101_ho_head_sign2" class="form-group t101_ho_head_sign2">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t101_ho_head_list->RowIndex ?>_sign2"><?php echo EmptyValue(strval($t101_ho_head_list->sign2->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_list->sign2->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_list->sign2->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_list->sign2->ReadOnly || $t101_ho_head_list->sign2->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t101_ho_head_list->RowIndex ?>_sign2',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_list->sign2->Lookup->getParamTag($t101_ho_head_list, "p_x" . $t101_ho_head_list->RowIndex . "_sign2") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_sign2" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_list->sign2->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_ho_head_list->RowIndex ?>_sign2" id="x<?php echo $t101_ho_head_list->RowIndex ?>_sign2" value="<?php echo $t101_ho_head_list->sign2->CurrentValue ?>"<?php echo $t101_ho_head_list->sign2->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_ho_head" data-field="x_sign2" name="o<?php echo $t101_ho_head_list->RowIndex ?>_sign2" id="o<?php echo $t101_ho_head_list->RowIndex ?>_sign2" value="<?php echo HtmlEncode($t101_ho_head_list->sign2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_ho_head_list->sign3->Visible) { // sign3 ?>
		<td data-name="sign3">
<span id="el$rowindex$_t101_ho_head_sign3" class="form-group t101_ho_head_sign3">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t101_ho_head_list->RowIndex ?>_sign3"><?php echo EmptyValue(strval($t101_ho_head_list->sign3->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_list->sign3->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_list->sign3->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_list->sign3->ReadOnly || $t101_ho_head_list->sign3->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t101_ho_head_list->RowIndex ?>_sign3',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_list->sign3->Lookup->getParamTag($t101_ho_head_list, "p_x" . $t101_ho_head_list->RowIndex . "_sign3") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_sign3" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_list->sign3->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_ho_head_list->RowIndex ?>_sign3" id="x<?php echo $t101_ho_head_list->RowIndex ?>_sign3" value="<?php echo $t101_ho_head_list->sign3->CurrentValue ?>"<?php echo $t101_ho_head_list->sign3->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_ho_head" data-field="x_sign3" name="o<?php echo $t101_ho_head_list->RowIndex ?>_sign3" id="o<?php echo $t101_ho_head_list->RowIndex ?>_sign3" value="<?php echo HtmlEncode($t101_ho_head_list->sign3->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_ho_head_list->sign4->Visible) { // sign4 ?>
		<td data-name="sign4">
<span id="el$rowindex$_t101_ho_head_sign4" class="form-group t101_ho_head_sign4">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t101_ho_head_list->RowIndex ?>_sign4"><?php echo EmptyValue(strval($t101_ho_head_list->sign4->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_list->sign4->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_list->sign4->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_list->sign4->ReadOnly || $t101_ho_head_list->sign4->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t101_ho_head_list->RowIndex ?>_sign4',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_list->sign4->Lookup->getParamTag($t101_ho_head_list, "p_x" . $t101_ho_head_list->RowIndex . "_sign4") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_sign4" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_list->sign4->displayValueSeparatorAttribute() ?>" name="x<?php echo $t101_ho_head_list->RowIndex ?>_sign4" id="x<?php echo $t101_ho_head_list->RowIndex ?>_sign4" value="<?php echo $t101_ho_head_list->sign4->CurrentValue ?>"<?php echo $t101_ho_head_list->sign4->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_ho_head" data-field="x_sign4" name="o<?php echo $t101_ho_head_list->RowIndex ?>_sign4" id="o<?php echo $t101_ho_head_list->RowIndex ?>_sign4" value="<?php echo HtmlEncode($t101_ho_head_list->sign4->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t101_ho_head_list->ListOptions->render("body", "right", $t101_ho_head_list->RowIndex);
?>
<script>
loadjs.ready(["ft101_ho_headlist", "load"], function() {
	ft101_ho_headlist.updateLists(<?php echo $t101_ho_head_list->RowIndex ?>);
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
<?php if ($t101_ho_head_list->isAdd() || $t101_ho_head_list->isCopy()) { ?>
<input type="hidden" name="<?php echo $t101_ho_head_list->FormKeyCountName ?>" id="<?php echo $t101_ho_head_list->FormKeyCountName ?>" value="<?php echo $t101_ho_head_list->KeyCount ?>">
<?php } ?>
<?php if ($t101_ho_head_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $t101_ho_head_list->FormKeyCountName ?>" id="<?php echo $t101_ho_head_list->FormKeyCountName ?>" value="<?php echo $t101_ho_head_list->KeyCount ?>">
<?php echo $t101_ho_head_list->MultiSelectKey ?>
<?php } ?>
<?php if ($t101_ho_head_list->isEdit()) { ?>
<input type="hidden" name="<?php echo $t101_ho_head_list->FormKeyCountName ?>" id="<?php echo $t101_ho_head_list->FormKeyCountName ?>" value="<?php echo $t101_ho_head_list->KeyCount ?>">
<?php } ?>
<?php if ($t101_ho_head_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $t101_ho_head_list->FormKeyCountName ?>" id="<?php echo $t101_ho_head_list->FormKeyCountName ?>" value="<?php echo $t101_ho_head_list->KeyCount ?>">
<?php echo $t101_ho_head_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$t101_ho_head->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t101_ho_head_list->Recordset)
	$t101_ho_head_list->Recordset->Close();
?>
<?php if (!$t101_ho_head_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t101_ho_head_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t101_ho_head_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t101_ho_head_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t101_ho_head_list->TotalRecords == 0 && !$t101_ho_head->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t101_ho_head_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t101_ho_head_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t101_ho_head_list->isExport()) { ?>
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
$t101_ho_head_list->terminate();
?>