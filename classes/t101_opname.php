<?php namespace PHPMaker2020\p_assettracker1_0; ?>
<?php

/**
 * Table class for t101_opname
 */
class t101_opname extends DbTable
{
	protected $SqlFrom = "";
	protected $SqlSelect = "";
	protected $SqlSelectList = "";
	protected $SqlWhere = "";
	protected $SqlGroupBy = "";
	protected $SqlHaving = "";
	protected $SqlOrderBy = "";
	public $UseSessionForListSql = TRUE;

	// Column CSS classes
	public $LeftColumnClass = "col-sm-2 col-form-label ew-label";
	public $RightColumnClass = "col-sm-10";
	public $OffsetColumnClass = "col-sm-10 offset-sm-2";
	public $TableLeftColumnClass = "w-col-2";

	// Export
	public $ExportDoc;

	// Fields
	public $id;
	public $OpnameDate;
	public $property_id;
	public $location_id;
	public $asset_id;
	public $signature_id;
	public $Actual;
	public $OpnameQty;
	public $Diff;
	public $Remarks;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 't101_opname';
		$this->TableName = 't101_opname';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`t101_opname`";
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = FALSE; // Allow detail add
		$this->DetailEdit = FALSE; // Allow detail edit
		$this->DetailView = FALSE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = Config("USER_ID_ALLOW_SECURITY"); // Default User ID Allow Security
		$this->UserIDAllowSecurity |= 0; // User ID Allow
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// id
		$this->id = new DbField('t101_opname', 't101_opname', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// OpnameDate
		$this->OpnameDate = new DbField('t101_opname', 't101_opname', 'x_OpnameDate', 'OpnameDate', '`OpnameDate`', CastDateFieldForLike("`OpnameDate`", 0, "DB"), 133, 10, 0, FALSE, '`OpnameDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OpnameDate->Nullable = FALSE; // NOT NULL field
		$this->OpnameDate->Required = TRUE; // Required field
		$this->OpnameDate->Sortable = TRUE; // Allow sort
		$this->OpnameDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['OpnameDate'] = &$this->OpnameDate;

		// property_id
		$this->property_id = new DbField('t101_opname', 't101_opname', 'x_property_id', 'property_id', '`property_id`', '`property_id`', 3, 11, -1, FALSE, '`property_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->property_id->Nullable = FALSE; // NOT NULL field
		$this->property_id->Required = TRUE; // Required field
		$this->property_id->Sortable = TRUE; // Allow sort
		$this->property_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['property_id'] = &$this->property_id;

		// location_id
		$this->location_id = new DbField('t101_opname', 't101_opname', 'x_location_id', 'location_id', '`location_id`', '`location_id`', 3, 11, -1, FALSE, '`location_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->location_id->Nullable = FALSE; // NOT NULL field
		$this->location_id->Required = TRUE; // Required field
		$this->location_id->Sortable = TRUE; // Allow sort
		$this->location_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['location_id'] = &$this->location_id;

		// asset_id
		$this->asset_id = new DbField('t101_opname', 't101_opname', 'x_asset_id', 'asset_id', '`asset_id`', '`asset_id`', 3, 11, -1, FALSE, '`asset_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->asset_id->Nullable = FALSE; // NOT NULL field
		$this->asset_id->Required = TRUE; // Required field
		$this->asset_id->Sortable = TRUE; // Allow sort
		$this->asset_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['asset_id'] = &$this->asset_id;

		// signature_id
		$this->signature_id = new DbField('t101_opname', 't101_opname', 'x_signature_id', 'signature_id', '`signature_id`', '`signature_id`', 3, 11, -1, FALSE, '`signature_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->signature_id->Nullable = FALSE; // NOT NULL field
		$this->signature_id->Required = TRUE; // Required field
		$this->signature_id->Sortable = TRUE; // Allow sort
		$this->signature_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['signature_id'] = &$this->signature_id;

		// Actual
		$this->Actual = new DbField('t101_opname', 't101_opname', 'x_Actual', 'Actual', '`Actual`', '`Actual`', 4, 14, -1, FALSE, '`Actual`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Actual->Nullable = FALSE; // NOT NULL field
		$this->Actual->Sortable = TRUE; // Allow sort
		$this->Actual->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Actual'] = &$this->Actual;

		// OpnameQty
		$this->OpnameQty = new DbField('t101_opname', 't101_opname', 'x_OpnameQty', 'OpnameQty', '`OpnameQty`', '`OpnameQty`', 4, 14, -1, FALSE, '`OpnameQty`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OpnameQty->Nullable = FALSE; // NOT NULL field
		$this->OpnameQty->Sortable = TRUE; // Allow sort
		$this->OpnameQty->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['OpnameQty'] = &$this->OpnameQty;

		// Diff
		$this->Diff = new DbField('t101_opname', 't101_opname', 'x_Diff', 'Diff', '`Diff`', '`Diff`', 4, 14, -1, FALSE, '`Diff`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Diff->Nullable = FALSE; // NOT NULL field
		$this->Diff->Sortable = TRUE; // Allow sort
		$this->Diff->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Diff'] = &$this->Diff;

		// Remarks
		$this->Remarks = new DbField('t101_opname', 't101_opname', 'x_Remarks', 'Remarks', '`Remarks`', '`Remarks`', 201, 65535, -1, FALSE, '`Remarks`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Remarks->Sortable = TRUE; // Allow sort
		$this->fields['Remarks'] = &$this->Remarks;
	}

	// Field Visibility
	public function getFieldVisibility($fldParm)
	{
		global $Security;
		return $this->$fldParm->Visible; // Returns original value
	}

	// Set left column class (must be predefined col-*-* classes of Bootstrap grid system)
	function setLeftColumnClass($class)
	{
		if (preg_match('/^col\-(\w+)\-(\d+)$/', $class, $match)) {
			$this->LeftColumnClass = $class . " col-form-label ew-label";
			$this->RightColumnClass = "col-" . $match[1] . "-" . strval(12 - (int)$match[2]);
			$this->OffsetColumnClass = $this->RightColumnClass . " " . str_replace("col-", "offset-", $class);
			$this->TableLeftColumnClass = preg_replace('/^col-\w+-(\d+)$/', "w-col-$1", $class); // Change to w-col-*
		}
	}

	// Multiple column sort
	public function updateSort(&$fld, $ctrl)
	{
		if ($this->CurrentOrder == $fld->Name) {
			$sortField = $fld->Expression;
			$lastSort = $fld->getSort();
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$thisSort = $this->CurrentOrderType;
			} else {
				$thisSort = ($lastSort == "ASC") ? "DESC" : "ASC";
			}
			$fld->setSort($thisSort);
			if ($ctrl) {
				$orderBy = $this->getSessionOrderBy();
				if (ContainsString($orderBy, $sortField . " " . $lastSort)) {
					$orderBy = str_replace($sortField . " " . $lastSort, $sortField . " " . $thisSort, $orderBy);
				} else {
					if ($orderBy != "")
						$orderBy .= ", ";
					$orderBy .= $sortField . " " . $thisSort;
				}
				$this->setSessionOrderBy($orderBy); // Save to Session
			} else {
				$this->setSessionOrderBy($sortField . " " . $thisSort); // Save to Session
			}
		} else {
			if (!$ctrl)
				$fld->setSort("");
		}
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`t101_opname`";
	}
	public function sqlFrom() // For backward compatibility
	{
		return $this->getSqlFrom();
	}
	public function setSqlFrom($v)
	{
		$this->SqlFrom = $v;
	}
	public function getSqlSelect() // Select
	{
		return ($this->SqlSelect != "") ? $this->SqlSelect : "SELECT * FROM " . $this->getSqlFrom();
	}
	public function sqlSelect() // For backward compatibility
	{
		return $this->getSqlSelect();
	}
	public function setSqlSelect($v)
	{
		$this->SqlSelect = $v;
	}
	public function getSqlWhere() // Where
	{
		$where = ($this->SqlWhere != "") ? $this->SqlWhere : "";
		$this->TableFilter = "";
		AddFilter($where, $this->TableFilter);
		return $where;
	}
	public function sqlWhere() // For backward compatibility
	{
		return $this->getSqlWhere();
	}
	public function setSqlWhere($v)
	{
		$this->SqlWhere = $v;
	}
	public function getSqlGroupBy() // Group By
	{
		return ($this->SqlGroupBy != "") ? $this->SqlGroupBy : "";
	}
	public function sqlGroupBy() // For backward compatibility
	{
		return $this->getSqlGroupBy();
	}
	public function setSqlGroupBy($v)
	{
		$this->SqlGroupBy = $v;
	}
	public function getSqlHaving() // Having
	{
		return ($this->SqlHaving != "") ? $this->SqlHaving : "";
	}
	public function sqlHaving() // For backward compatibility
	{
		return $this->getSqlHaving();
	}
	public function setSqlHaving($v)
	{
		$this->SqlHaving = $v;
	}
	public function getSqlOrderBy() // Order By
	{
		return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : "";
	}
	public function sqlOrderBy() // For backward compatibility
	{
		return $this->getSqlOrderBy();
	}
	public function setSqlOrderBy($v)
	{
		$this->SqlOrderBy = $v;
	}

	// Apply User ID filters
	public function applyUserIDFilters($filter, $id = "")
	{
		return $filter;
	}

	// Check if User ID security allows view all
	public function userIDAllow($id = "")
	{
		$allow = Config("USER_ID_ALLOW");
		switch ($id) {
			case "add":
			case "copy":
			case "gridadd":
			case "register":
			case "addopt":
				return (($allow & 1) == 1);
			case "edit":
			case "gridedit":
			case "update":
			case "changepwd":
			case "forgotpwd":
				return (($allow & 4) == 4);
			case "delete":
				return (($allow & 2) == 2);
			case "view":
				return (($allow & 32) == 32);
			case "search":
				return (($allow & 64) == 64);
			case "lookup":
				return (($allow & 256) == 256);
			default:
				return (($allow & 8) == 8);
		}
	}

	// Get recordset
	public function getRecordset($sql, $rowcnt = -1, $offset = -1)
	{
		$conn = $this->getConnection();
		$conn->raiseErrorFn = Config("ERROR_FUNC");
		$rs = $conn->selectLimit($sql, $rowcnt, $offset);
		$conn->raiseErrorFn = "";
		return $rs;
	}

	// Get record count
	public function getRecordCount($sql, $c = NULL)
	{
		$cnt = -1;
		$rs = NULL;
		$sql = preg_replace('/\/\*BeginOrderBy\*\/[\s\S]+\/\*EndOrderBy\*\//', "", $sql); // Remove ORDER BY clause (MSSQL)
		$pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';

		// Skip Custom View / SubQuery / SELECT DISTINCT / ORDER BY
		if (($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
			preg_match($pattern, $sql) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sql) &&
			!preg_match('/^\s*select\s+distinct\s+/i', $sql) && !preg_match('/\s+order\s+by\s+/i', $sql)) {
			$sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sql);
		} else {
			$sqlwrk = "SELECT COUNT(*) FROM (" . $sql . ") COUNT_TABLE";
		}
		$conn = $c ?: $this->getConnection();
		if ($rs = $conn->execute($sqlwrk)) {
			if (!$rs->EOF && $rs->FieldCount() > 0) {
				$cnt = $rs->fields[0];
				$rs->close();
			}
			return (int)$cnt;
		}

		// Unable to get count, get record count directly
		if ($rs = $conn->execute($sql)) {
			$cnt = $rs->RecordCount();
			$rs->close();
			return (int)$cnt;
		}
		return $cnt;
	}

	// Get SQL
	public function getSql($where, $orderBy = "")
	{
		return BuildSelectSql($this->getSqlSelect(), $this->getSqlWhere(),
			$this->getSqlGroupBy(), $this->getSqlHaving(), $this->getSqlOrderBy(),
			$where, $orderBy);
	}

	// Table SQL
	public function getCurrentSql()
	{
		$filter = $this->CurrentFilter;
		$filter = $this->applyUserIDFilters($filter);
		$sort = $this->getSessionOrderBy();
		return $this->getSql($filter, $sort);
	}

	// Table SQL with List page filter
	public function getListSql()
	{
		$filter = $this->UseSessionForListSql ? $this->getSessionWhere() : "";
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->getSqlSelect();
		$sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
		return BuildSelectSql($select, $this->getSqlWhere(), $this->getSqlGroupBy(),
			$this->getSqlHaving(), $this->getSqlOrderBy(), $filter, $sort);
	}

	// Get ORDER BY clause
	public function getOrderBy()
	{
		$sort = $this->getSessionOrderBy();
		return BuildSelectSql("", "", "", "", $this->getSqlOrderBy(), "", $sort);
	}

	// Get record count based on filter (for detail record count in master table pages)
	public function loadRecordCount($filter)
	{
		$origFilter = $this->CurrentFilter;
		$this->CurrentFilter = $filter;
		$this->Recordset_Selecting($this->CurrentFilter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $this->CurrentFilter, "");
		$cnt = $this->getRecordCount($sql);
		$this->CurrentFilter = $origFilter;
		return $cnt;
	}

	// Get record count (for current List page)
	public function listRecordCount()
	{
		$filter = $this->getSessionWhere();
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
		$cnt = $this->getRecordCount($sql);
		return $cnt;
	}

	// INSERT statement
	protected function insertSql(&$rs)
	{
		$names = "";
		$values = "";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom)
				continue;
			$names .= $this->fields[$name]->Expression . ",";
			$values .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$names = preg_replace('/,+$/', "", $names);
		$values = preg_replace('/,+$/', "", $values);
		return "INSERT INTO " . $this->UpdateTable . " (" . $names . ") VALUES (" . $values . ")";
	}

	// Insert
	public function insert(&$rs)
	{
		$conn = $this->getConnection();
		$success = $conn->execute($this->insertSql($rs));
		if ($success) {

			// Get insert id if necessary
			$this->id->setDbValue($conn->insert_ID());
			$rs['id'] = $this->id->DbValue;
		}
		return $success;
	}

	// UPDATE statement
	protected function updateSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "UPDATE " . $this->UpdateTable . " SET ";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom || $this->fields[$name]->IsAutoIncrement)
				continue;
			$sql .= $this->fields[$name]->Expression . "=";
			$sql .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$sql = preg_replace('/,+$/', "", $sql);
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		AddFilter($filter, $where);
		if ($filter != "")
			$sql .= " WHERE " . $filter;
		return $sql;
	}

	// Update
	public function update(&$rs, $where = "", $rsold = NULL, $curfilter = TRUE)
	{
		$conn = $this->getConnection();
		$success = $conn->execute($this->updateSql($rs, $where, $curfilter));
		return $success;
	}

	// DELETE statement
	protected function deleteSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "DELETE FROM " . $this->UpdateTable . " WHERE ";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		if ($rs) {
			if (array_key_exists('id', $rs))
				AddFilter($where, QuotedName('id', $this->Dbid) . '=' . QuotedValue($rs['id'], $this->id->DataType, $this->Dbid));
		}
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		AddFilter($filter, $where);
		if ($filter != "")
			$sql .= $filter;
		else
			$sql .= "0=1"; // Avoid delete
		return $sql;
	}

	// Delete
	public function delete(&$rs, $where = "", $curfilter = FALSE)
	{
		$success = TRUE;
		$conn = $this->getConnection();
		if ($success)
			$success = $conn->execute($this->deleteSql($rs, $where, $curfilter));
		return $success;
	}

	// Load DbValue from recordset or array
	protected function loadDbValues(&$rs)
	{
		if (!$rs || !is_array($rs) && $rs->EOF)
			return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->id->DbValue = $row['id'];
		$this->OpnameDate->DbValue = $row['OpnameDate'];
		$this->property_id->DbValue = $row['property_id'];
		$this->location_id->DbValue = $row['location_id'];
		$this->asset_id->DbValue = $row['asset_id'];
		$this->signature_id->DbValue = $row['signature_id'];
		$this->Actual->DbValue = $row['Actual'];
		$this->OpnameQty->DbValue = $row['OpnameQty'];
		$this->Diff->DbValue = $row['Diff'];
		$this->Remarks->DbValue = $row['Remarks'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`id` = @id@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		if (is_array($row))
			$val = array_key_exists('id', $row) ? $row['id'] : NULL;
		else
			$val = $this->id->OldValue !== NULL ? $this->id->OldValue : $this->id->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@id@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
		return $keyFilter;
	}

	// Return page URL
	public function getReturnUrl()
	{
		$name = PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL");

		// Get referer URL automatically
		if (ServerVar("HTTP_REFERER") != "" && ReferPageName() != CurrentPageName() && ReferPageName() != "login.php") // Referer not same page or login page
			$_SESSION[$name] = ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] != "") {
			return $_SESSION[$name];
		} else {
			return "t101_opnamelist.php";
		}
	}
	public function setReturnUrl($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL")] = $v;
	}

	// Get modal caption
	public function getModalCaption($pageName)
	{
		global $Language;
		if ($pageName == "t101_opnameview.php")
			return $Language->phrase("View");
		elseif ($pageName == "t101_opnameedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "t101_opnameadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "t101_opnamelist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("t101_opnameview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("t101_opnameview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "t101_opnameadd.php?" . $this->getUrlParm($parm);
		else
			$url = "t101_opnameadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("t101_opnameedit.php", $this->getUrlParm($parm));
		return $this->addMasterUrl($url);
	}

	// Inline edit URL
	public function getInlineEditUrl()
	{
		$url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=edit"));
		return $this->addMasterUrl($url);
	}

	// Copy URL
	public function getCopyUrl($parm = "")
	{
		$url = $this->keyUrl("t101_opnameadd.php", $this->getUrlParm($parm));
		return $this->addMasterUrl($url);
	}

	// Inline copy URL
	public function getInlineCopyUrl()
	{
		$url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=copy"));
		return $this->addMasterUrl($url);
	}

	// Delete URL
	public function getDeleteUrl()
	{
		return $this->keyUrl("t101_opnamedelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "id:" . JsonEncode($this->id->CurrentValue, "number");
		$json = "{" . $json . "}";
		if ($htmlEncode)
			$json = HtmlEncode($json);
		return $json;
	}

	// Add key value to URL
	public function keyUrl($url, $parm = "")
	{
		$url = $url . "?";
		if ($parm != "")
			$url .= $parm . "&";
		if ($this->id->CurrentValue != NULL) {
			$url .= "id=" . urlencode($this->id->CurrentValue);
		} else {
			return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
		}
		return $url;
	}

	// Sort URL
	public function sortUrl(&$fld)
	{
		if ($this->CurrentAction || $this->isExport() ||
			in_array($fld->Type, [128, 204, 205])) { // Unsortable data type
				return "";
		} elseif ($fld->Sortable) {
			$urlParm = $this->getUrlParm("order=" . urlencode($fld->Name) . "&amp;ordertype=" . $fld->reverseSort());
			return $this->addMasterUrl(CurrentPageName() . "?" . $urlParm);
		} else {
			return "";
		}
	}

	// Get record keys from Post/Get/Session
	public function getRecordKeys()
	{
		$arKeys = [];
		$arKey = [];
		if (Param("key_m") !== NULL) {
			$arKeys = Param("key_m");
			$cnt = count($arKeys);
		} else {
			if (Param("id") !== NULL)
				$arKeys[] = Param("id");
			elseif (IsApi() && Key(0) !== NULL)
				$arKeys[] = Key(0);
			elseif (IsApi() && Route(2) !== NULL)
				$arKeys[] = Route(2);
			else
				$arKeys = NULL; // Do not setup

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = [];
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
				if (!is_numeric($key))
					continue;
				$ar[] = $key;
			}
		}
		return $ar;
	}

	// Get filter from record keys
	public function getFilterFromRecordKeys($setCurrent = TRUE)
	{
		$arKeys = $this->getRecordKeys();
		$keyFilter = "";
		foreach ($arKeys as $key) {
			if ($keyFilter != "") $keyFilter .= " OR ";
			if ($setCurrent)
				$this->id->CurrentValue = $key;
			else
				$this->id->OldValue = $key;
			$keyFilter .= "(" . $this->getRecordFilter() . ")";
		}
		return $keyFilter;
	}

	// Load rows based on filter
	public function &loadRs($filter)
	{

		// Set up filter (WHERE Clause)
		$sql = $this->getSql($filter);
		$conn = $this->getConnection();
		$rs = $conn->execute($sql);
		return $rs;
	}

	// Load row values from recordset
	public function loadListRowValues(&$rs)
	{
		$this->id->setDbValue($rs->fields('id'));
		$this->OpnameDate->setDbValue($rs->fields('OpnameDate'));
		$this->property_id->setDbValue($rs->fields('property_id'));
		$this->location_id->setDbValue($rs->fields('location_id'));
		$this->asset_id->setDbValue($rs->fields('asset_id'));
		$this->signature_id->setDbValue($rs->fields('signature_id'));
		$this->Actual->setDbValue($rs->fields('Actual'));
		$this->OpnameQty->setDbValue($rs->fields('OpnameQty'));
		$this->Diff->setDbValue($rs->fields('Diff'));
		$this->Remarks->setDbValue($rs->fields('Remarks'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// OpnameDate
		// property_id
		// location_id
		// asset_id
		// signature_id
		// Actual
		// OpnameQty
		// Diff
		// Remarks
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// OpnameDate
		$this->OpnameDate->ViewValue = $this->OpnameDate->CurrentValue;
		$this->OpnameDate->ViewValue = FormatDateTime($this->OpnameDate->ViewValue, 0);
		$this->OpnameDate->ViewCustomAttributes = "";

		// property_id
		$this->property_id->ViewValue = $this->property_id->CurrentValue;
		$this->property_id->ViewValue = FormatNumber($this->property_id->ViewValue, 0, -2, -2, -2);
		$this->property_id->ViewCustomAttributes = "";

		// location_id
		$this->location_id->ViewValue = $this->location_id->CurrentValue;
		$this->location_id->ViewValue = FormatNumber($this->location_id->ViewValue, 0, -2, -2, -2);
		$this->location_id->ViewCustomAttributes = "";

		// asset_id
		$this->asset_id->ViewValue = $this->asset_id->CurrentValue;
		$this->asset_id->ViewValue = FormatNumber($this->asset_id->ViewValue, 0, -2, -2, -2);
		$this->asset_id->ViewCustomAttributes = "";

		// signature_id
		$this->signature_id->ViewValue = $this->signature_id->CurrentValue;
		$this->signature_id->ViewValue = FormatNumber($this->signature_id->ViewValue, 0, -2, -2, -2);
		$this->signature_id->ViewCustomAttributes = "";

		// Actual
		$this->Actual->ViewValue = $this->Actual->CurrentValue;
		$this->Actual->ViewValue = FormatNumber($this->Actual->ViewValue, 2, -2, -2, -2);
		$this->Actual->ViewCustomAttributes = "";

		// OpnameQty
		$this->OpnameQty->ViewValue = $this->OpnameQty->CurrentValue;
		$this->OpnameQty->ViewValue = FormatNumber($this->OpnameQty->ViewValue, 2, -2, -2, -2);
		$this->OpnameQty->ViewCustomAttributes = "";

		// Diff
		$this->Diff->ViewValue = $this->Diff->CurrentValue;
		$this->Diff->ViewValue = FormatNumber($this->Diff->ViewValue, 2, -2, -2, -2);
		$this->Diff->ViewCustomAttributes = "";

		// Remarks
		$this->Remarks->ViewValue = $this->Remarks->CurrentValue;
		$this->Remarks->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// OpnameDate
		$this->OpnameDate->LinkCustomAttributes = "";
		$this->OpnameDate->HrefValue = "";
		$this->OpnameDate->TooltipValue = "";

		// property_id
		$this->property_id->LinkCustomAttributes = "";
		$this->property_id->HrefValue = "";
		$this->property_id->TooltipValue = "";

		// location_id
		$this->location_id->LinkCustomAttributes = "";
		$this->location_id->HrefValue = "";
		$this->location_id->TooltipValue = "";

		// asset_id
		$this->asset_id->LinkCustomAttributes = "";
		$this->asset_id->HrefValue = "";
		$this->asset_id->TooltipValue = "";

		// signature_id
		$this->signature_id->LinkCustomAttributes = "";
		$this->signature_id->HrefValue = "";
		$this->signature_id->TooltipValue = "";

		// Actual
		$this->Actual->LinkCustomAttributes = "";
		$this->Actual->HrefValue = "";
		$this->Actual->TooltipValue = "";

		// OpnameQty
		$this->OpnameQty->LinkCustomAttributes = "";
		$this->OpnameQty->HrefValue = "";
		$this->OpnameQty->TooltipValue = "";

		// Diff
		$this->Diff->LinkCustomAttributes = "";
		$this->Diff->HrefValue = "";
		$this->Diff->TooltipValue = "";

		// Remarks
		$this->Remarks->LinkCustomAttributes = "";
		$this->Remarks->HrefValue = "";
		$this->Remarks->TooltipValue = "";

		// Call Row Rendered event
		$this->Row_Rendered();

		// Save data for Custom Template
		$this->Rows[] = $this->customTemplateFieldValues();
	}

	// Render edit row values
	public function renderEditRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// id
		$this->id->EditAttrs["class"] = "form-control";
		$this->id->EditCustomAttributes = "";
		$this->id->EditValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// OpnameDate
		$this->OpnameDate->EditAttrs["class"] = "form-control";
		$this->OpnameDate->EditCustomAttributes = "";
		$this->OpnameDate->EditValue = FormatDateTime($this->OpnameDate->CurrentValue, 8);
		$this->OpnameDate->PlaceHolder = RemoveHtml($this->OpnameDate->caption());

		// property_id
		$this->property_id->EditAttrs["class"] = "form-control";
		$this->property_id->EditCustomAttributes = "";
		$this->property_id->EditValue = $this->property_id->CurrentValue;
		$this->property_id->PlaceHolder = RemoveHtml($this->property_id->caption());

		// location_id
		$this->location_id->EditAttrs["class"] = "form-control";
		$this->location_id->EditCustomAttributes = "";
		$this->location_id->EditValue = $this->location_id->CurrentValue;
		$this->location_id->PlaceHolder = RemoveHtml($this->location_id->caption());

		// asset_id
		$this->asset_id->EditAttrs["class"] = "form-control";
		$this->asset_id->EditCustomAttributes = "";
		$this->asset_id->EditValue = $this->asset_id->CurrentValue;
		$this->asset_id->PlaceHolder = RemoveHtml($this->asset_id->caption());

		// signature_id
		$this->signature_id->EditAttrs["class"] = "form-control";
		$this->signature_id->EditCustomAttributes = "";
		$this->signature_id->EditValue = $this->signature_id->CurrentValue;
		$this->signature_id->PlaceHolder = RemoveHtml($this->signature_id->caption());

		// Actual
		$this->Actual->EditAttrs["class"] = "form-control";
		$this->Actual->EditCustomAttributes = "";
		$this->Actual->EditValue = $this->Actual->CurrentValue;
		$this->Actual->PlaceHolder = RemoveHtml($this->Actual->caption());
		if (strval($this->Actual->EditValue) != "" && is_numeric($this->Actual->EditValue))
			$this->Actual->EditValue = FormatNumber($this->Actual->EditValue, -2, -2, -2, -2);
		

		// OpnameQty
		$this->OpnameQty->EditAttrs["class"] = "form-control";
		$this->OpnameQty->EditCustomAttributes = "";
		$this->OpnameQty->EditValue = $this->OpnameQty->CurrentValue;
		$this->OpnameQty->PlaceHolder = RemoveHtml($this->OpnameQty->caption());
		if (strval($this->OpnameQty->EditValue) != "" && is_numeric($this->OpnameQty->EditValue))
			$this->OpnameQty->EditValue = FormatNumber($this->OpnameQty->EditValue, -2, -2, -2, -2);
		

		// Diff
		$this->Diff->EditAttrs["class"] = "form-control";
		$this->Diff->EditCustomAttributes = "";
		$this->Diff->EditValue = $this->Diff->CurrentValue;
		$this->Diff->PlaceHolder = RemoveHtml($this->Diff->caption());
		if (strval($this->Diff->EditValue) != "" && is_numeric($this->Diff->EditValue))
			$this->Diff->EditValue = FormatNumber($this->Diff->EditValue, -2, -2, -2, -2);
		

		// Remarks
		$this->Remarks->EditAttrs["class"] = "form-control";
		$this->Remarks->EditCustomAttributes = "";
		$this->Remarks->EditValue = $this->Remarks->CurrentValue;
		$this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Aggregate list row values
	public function aggregateListRowValues()
	{
	}

	// Aggregate list row (for rendering)
	public function aggregateListRow()
	{

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/Email/PDF format
	public function exportDocument($doc, $recordset, $startRec = 1, $stopRec = 1, $exportPageType = "")
	{
		if (!$recordset || !$doc)
			return;
		if (!$doc->ExportCustom) {

			// Write header
			$doc->exportTableHeader();
			if ($doc->Horizontal) { // Horizontal format, write header
				$doc->beginExportRow();
				if ($exportPageType == "view") {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->OpnameDate);
					$doc->exportCaption($this->property_id);
					$doc->exportCaption($this->location_id);
					$doc->exportCaption($this->asset_id);
					$doc->exportCaption($this->signature_id);
					$doc->exportCaption($this->Actual);
					$doc->exportCaption($this->OpnameQty);
					$doc->exportCaption($this->Diff);
					$doc->exportCaption($this->Remarks);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->OpnameDate);
					$doc->exportCaption($this->property_id);
					$doc->exportCaption($this->location_id);
					$doc->exportCaption($this->asset_id);
					$doc->exportCaption($this->signature_id);
					$doc->exportCaption($this->Actual);
					$doc->exportCaption($this->OpnameQty);
					$doc->exportCaption($this->Diff);
				}
				$doc->endExportRow();
			}
		}

		// Move to first record
		$recCnt = $startRec - 1;
		if (!$recordset->EOF) {
			$recordset->moveFirst();
			if ($startRec > 1)
				$recordset->move($startRec - 1);
		}
		while (!$recordset->EOF && $recCnt < $stopRec) {
			$recCnt++;
			if ($recCnt >= $startRec) {
				$rowCnt = $recCnt - $startRec + 1;

				// Page break
				if ($this->ExportPageBreakCount > 0) {
					if ($rowCnt > 1 && ($rowCnt - 1) % $this->ExportPageBreakCount == 0)
						$doc->exportPageBreak();
				}
				$this->loadListRowValues($recordset);

				// Render row
				$this->RowType = ROWTYPE_VIEW; // Render view
				$this->resetAttributes();
				$this->renderListRow();
				if (!$doc->ExportCustom) {
					$doc->beginExportRow($rowCnt); // Allow CSS styles if enabled
					if ($exportPageType == "view") {
						$doc->exportField($this->id);
						$doc->exportField($this->OpnameDate);
						$doc->exportField($this->property_id);
						$doc->exportField($this->location_id);
						$doc->exportField($this->asset_id);
						$doc->exportField($this->signature_id);
						$doc->exportField($this->Actual);
						$doc->exportField($this->OpnameQty);
						$doc->exportField($this->Diff);
						$doc->exportField($this->Remarks);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->OpnameDate);
						$doc->exportField($this->property_id);
						$doc->exportField($this->location_id);
						$doc->exportField($this->asset_id);
						$doc->exportField($this->signature_id);
						$doc->exportField($this->Actual);
						$doc->exportField($this->OpnameQty);
						$doc->exportField($this->Diff);
					}
					$doc->endExportRow($rowCnt);
				}
			}

			// Call Row Export server event
			if ($doc->ExportCustom)
				$this->Row_Export($recordset->fields);
			$recordset->moveNext();
		}
		if (!$doc->ExportCustom) {
			$doc->exportTableFooter();
		}
	}

	// Get file data
	public function getFileData($fldparm, $key, $resize, $width = 0, $height = 0)
	{

		// No binary fields
		return FALSE;
	}

	// Table level events
	// Recordset Selecting event
	function Recordset_Selecting(&$filter) {

		// Enter your code here
	}

	// Recordset Selected event
	function Recordset_Selected(&$rs) {

		//echo "Recordset Selected";
	}

	// Recordset Search Validated event
	function Recordset_SearchValidated() {

		// Example:
		//$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value

	}

	// Recordset Searching event
	function Recordset_Searching(&$filter) {

		// Enter your code here
	}

	// Row_Selecting event
	function Row_Selecting(&$filter) {

		// Enter your code here
	}

	// Row Selected event
	function Row_Selected(&$rs) {

		//echo "Row Selected";
	}

	// Row Inserting event
	function Row_Inserting($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Inserted event
	function Row_Inserted($rsold, &$rsnew) {

		//echo "Row Inserted"
	}

	// Row Updating event
	function Row_Updating($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Updated event
	function Row_Updated($rsold, &$rsnew) {

		//echo "Row Updated";
	}

	// Row Update Conflict event
	function Row_UpdateConflict($rsold, &$rsnew) {

		// Enter your code here
		// To ignore conflict, set return value to FALSE

		return TRUE;
	}

	// Grid Inserting event
	function Grid_Inserting() {

		// Enter your code here
		// To reject grid insert, set return value to FALSE

		return TRUE;
	}

	// Grid Inserted event
	function Grid_Inserted($rsnew) {

		//echo "Grid Inserted";
	}

	// Grid Updating event
	function Grid_Updating($rsold) {

		// Enter your code here
		// To reject grid update, set return value to FALSE

		return TRUE;
	}

	// Grid Updated event
	function Grid_Updated($rsold, $rsnew) {

		//echo "Grid Updated";
	}

	// Row Deleting event
	function Row_Deleting(&$rs) {

		// Enter your code here
		// To cancel, set return value to False

		return TRUE;
	}

	// Row Deleted event
	function Row_Deleted(&$rs) {

		//echo "Row Deleted";
	}

	// Email Sending event
	function Email_Sending($email, &$args) {

		//var_dump($email); var_dump($args); exit();
		return TRUE;
	}

	// Lookup Selecting event
	function Lookup_Selecting($fld, &$filter) {

		//var_dump($fld->Name, $fld->Lookup, $filter); // Uncomment to view the filter
		// Enter your code here

	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here
	}

	// Row Rendered event
	function Row_Rendered() {

		// To view properties of field class, use:
		//var_dump($this-><FieldName>);

	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}
}
?>