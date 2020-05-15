<?php namespace PHPMaker2020\p_assettracker1_0; ?>
<?php

/**
 * Table class for t101_ho_head
 */
class t101_ho_head extends DbTable
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

	// Audit trail
	public $AuditTrailOnAdd = TRUE;
	public $AuditTrailOnEdit = TRUE;
	public $AuditTrailOnDelete = TRUE;
	public $AuditTrailOnView = FALSE;
	public $AuditTrailOnViewData = FALSE;
	public $AuditTrailOnSearch = FALSE;

	// Export
	public $ExportDoc;

	// Fields
	public $id;
	public $tr_no;
	public $tr_date;
	public $ho_to;
	public $cno_to;
	public $dept_to;
	public $ho_by;
	public $cno_by;
	public $dept_by;
	public $sign1;
	public $sign2;
	public $sign3;
	public $sign4;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 't101_ho_head';
		$this->TableName = 't101_ho_head';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`t101_ho_head`";
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
		$this->id = new DbField('t101_ho_head', 't101_ho_head', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->IsForeignKey = TRUE; // Foreign key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// tr_no
		$this->tr_no = new DbField('t101_ho_head', 't101_ho_head', 'x_tr_no', 'tr_no', '`tr_no`', '`tr_no`', 200, 25, -1, FALSE, '`tr_no`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tr_no->Nullable = FALSE; // NOT NULL field
		$this->tr_no->Required = TRUE; // Required field
		$this->tr_no->Sortable = TRUE; // Allow sort
		$this->fields['tr_no'] = &$this->tr_no;

		// tr_date
		$this->tr_date = new DbField('t101_ho_head', 't101_ho_head', 'x_tr_date', 'tr_date', '`tr_date`', CastDateFieldForLike("`tr_date`", 7, "DB"), 133, 10, 7, FALSE, '`tr_date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tr_date->Nullable = FALSE; // NOT NULL field
		$this->tr_date->Required = TRUE; // Required field
		$this->tr_date->Sortable = TRUE; // Allow sort
		$this->tr_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['tr_date'] = &$this->tr_date;

		// ho_to
		$this->ho_to = new DbField('t101_ho_head', 't101_ho_head', 'x_ho_to', 'ho_to', '`ho_to`', '`ho_to`', 3, 11, -1, FALSE, '`ho_to`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->ho_to->Nullable = FALSE; // NOT NULL field
		$this->ho_to->Required = TRUE; // Required field
		$this->ho_to->Sortable = TRUE; // Allow sort
		$this->ho_to->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->ho_to->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->ho_to->Lookup = new Lookup('ho_to', 't003_signature', FALSE, 'id', ["Signature","","",""], [], [], [], [], [], [], '', '');
		$this->ho_to->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['ho_to'] = &$this->ho_to;

		// cno_to
		$this->cno_to = new DbField('t101_ho_head', 't101_ho_head', 'x_cno_to', 'cno_to', '`cno_to`', '`cno_to`', 200, 25, -1, FALSE, '`cno_to`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->cno_to->Nullable = FALSE; // NOT NULL field
		$this->cno_to->Required = TRUE; // Required field
		$this->cno_to->Sortable = TRUE; // Allow sort
		$this->fields['cno_to'] = &$this->cno_to;

		// dept_to
		$this->dept_to = new DbField('t101_ho_head', 't101_ho_head', 'x_dept_to', 'dept_to', '`dept_to`', '`dept_to`', 3, 11, -1, FALSE, '`dept_to`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->dept_to->Nullable = FALSE; // NOT NULL field
		$this->dept_to->Required = TRUE; // Required field
		$this->dept_to->Sortable = TRUE; // Allow sort
		$this->dept_to->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->dept_to->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->dept_to->Lookup = new Lookup('dept_to', 't002_location', FALSE, 'id', ["Location","","",""], [], [], [], [], [], [], '', '');
		$this->dept_to->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['dept_to'] = &$this->dept_to;

		// ho_by
		$this->ho_by = new DbField('t101_ho_head', 't101_ho_head', 'x_ho_by', 'ho_by', '`ho_by`', '`ho_by`', 3, 11, -1, FALSE, '`ho_by`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->ho_by->Nullable = FALSE; // NOT NULL field
		$this->ho_by->Required = TRUE; // Required field
		$this->ho_by->Sortable = TRUE; // Allow sort
		$this->ho_by->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->ho_by->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->ho_by->Lookup = new Lookup('ho_by', 't003_signature', FALSE, 'id', ["Signature","","",""], [], [], [], [], [], [], '', '');
		$this->ho_by->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['ho_by'] = &$this->ho_by;

		// cno_by
		$this->cno_by = new DbField('t101_ho_head', 't101_ho_head', 'x_cno_by', 'cno_by', '`cno_by`', '`cno_by`', 3, 11, -1, FALSE, '`cno_by`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->cno_by->Nullable = FALSE; // NOT NULL field
		$this->cno_by->Required = TRUE; // Required field
		$this->cno_by->Sortable = TRUE; // Allow sort
		$this->cno_by->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['cno_by'] = &$this->cno_by;

		// dept_by
		$this->dept_by = new DbField('t101_ho_head', 't101_ho_head', 'x_dept_by', 'dept_by', '`dept_by`', '`dept_by`', 3, 11, -1, FALSE, '`dept_by`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->dept_by->Nullable = FALSE; // NOT NULL field
		$this->dept_by->Required = TRUE; // Required field
		$this->dept_by->Sortable = TRUE; // Allow sort
		$this->dept_by->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->dept_by->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->dept_by->Lookup = new Lookup('dept_by', 't002_location', FALSE, 'id', ["Location","","",""], [], [], [], [], [], [], '', '');
		$this->dept_by->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['dept_by'] = &$this->dept_by;

		// sign1
		$this->sign1 = new DbField('t101_ho_head', 't101_ho_head', 'x_sign1', 'sign1', '`sign1`', '`sign1`', 3, 11, -1, FALSE, '`sign1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->sign1->Nullable = FALSE; // NOT NULL field
		$this->sign1->Required = TRUE; // Required field
		$this->sign1->Sortable = TRUE; // Allow sort
		$this->sign1->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->sign1->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->sign1->Lookup = new Lookup('sign1', 't003_signature', FALSE, 'id', ["Signature","","",""], [], [], [], [], [], [], '', '');
		$this->sign1->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['sign1'] = &$this->sign1;

		// sign2
		$this->sign2 = new DbField('t101_ho_head', 't101_ho_head', 'x_sign2', 'sign2', '`sign2`', '`sign2`', 3, 11, -1, FALSE, '`sign2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->sign2->Nullable = FALSE; // NOT NULL field
		$this->sign2->Required = TRUE; // Required field
		$this->sign2->Sortable = TRUE; // Allow sort
		$this->sign2->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->sign2->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->sign2->Lookup = new Lookup('sign2', 't003_signature', FALSE, 'id', ["Signature","","",""], [], [], [], [], [], [], '', '');
		$this->sign2->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['sign2'] = &$this->sign2;

		// sign3
		$this->sign3 = new DbField('t101_ho_head', 't101_ho_head', 'x_sign3', 'sign3', '`sign3`', '`sign3`', 3, 11, -1, FALSE, '`sign3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->sign3->Nullable = FALSE; // NOT NULL field
		$this->sign3->Required = TRUE; // Required field
		$this->sign3->Sortable = TRUE; // Allow sort
		$this->sign3->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->sign3->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->sign3->Lookup = new Lookup('sign3', 't003_signature', FALSE, 'id', ["Signature","","",""], [], [], [], [], [], [], '', '');
		$this->sign3->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['sign3'] = &$this->sign3;

		// sign4
		$this->sign4 = new DbField('t101_ho_head', 't101_ho_head', 'x_sign4', 'sign4', '`sign4`', '`sign4`', 3, 11, -1, FALSE, '`sign4`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->sign4->Nullable = FALSE; // NOT NULL field
		$this->sign4->Required = TRUE; // Required field
		$this->sign4->Sortable = TRUE; // Allow sort
		$this->sign4->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->sign4->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->sign4->Lookup = new Lookup('sign4', 't003_signature', FALSE, 'id', ["Signature","","",""], [], [], [], [], [], [], '', '');
		$this->sign4->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['sign4'] = &$this->sign4;
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

	// Current detail table name
	public function getCurrentDetailTable()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_DETAIL_TABLE")];
	}
	public function setCurrentDetailTable($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_DETAIL_TABLE")] = $v;
	}

	// Get detail url
	public function getDetailUrl()
	{

		// Detail url
		$detailUrl = "";
		if ($this->getCurrentDetailTable() == "t102_ho_detail") {
			$detailUrl = $GLOBALS["t102_ho_detail"]->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
		}
		if ($detailUrl == "")
			$detailUrl = "t101_ho_headlist.php";
		return $detailUrl;
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`t101_ho_head`";
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
			if ($this->AuditTrailOnAdd)
				$this->writeAuditTrailOnAdd($rs);
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

		// Cascade Update detail table 't102_ho_detail'
		$cascadeUpdate = FALSE;
		$rscascade = [];
		if ($rsold && (isset($rs['id']) && $rsold['id'] != $rs['id'])) { // Update detail field 'hohead_id'
			$cascadeUpdate = TRUE;
			$rscascade['hohead_id'] = $rs['id'];
		}
		if ($cascadeUpdate) {
			if (!isset($GLOBALS["t102_ho_detail"]))
				$GLOBALS["t102_ho_detail"] = new t102_ho_detail();
			$rswrk = $GLOBALS["t102_ho_detail"]->loadRs("`hohead_id` = " . QuotedValue($rsold['id'], DATATYPE_NUMBER, 'DB'));
			while ($rswrk && !$rswrk->EOF) {
				$rskey = [];
				$fldname = 'id';
				$rskey[$fldname] = $rswrk->fields[$fldname];
				$rsdtlold = &$rswrk->fields;
				$rsdtlnew = array_merge($rsdtlold, $rscascade);

				// Call Row_Updating event
				$success = $GLOBALS["t102_ho_detail"]->Row_Updating($rsdtlold, $rsdtlnew);
				if ($success)
					$success = $GLOBALS["t102_ho_detail"]->update($rscascade, $rskey, $rswrk->fields);
				if (!$success)
					return FALSE;

				// Call Row_Updated event
				$GLOBALS["t102_ho_detail"]->Row_Updated($rsdtlold, $rsdtlnew);
				$rswrk->moveNext();
			}
		}
		$success = $conn->execute($this->updateSql($rs, $where, $curfilter));
		if ($success && $this->AuditTrailOnEdit && $rsold) {
			$rsaudit = $rs;
			$fldname = 'id';
			if (!array_key_exists($fldname, $rsaudit))
				$rsaudit[$fldname] = $rsold[$fldname];
			$this->writeAuditTrailOnEdit($rsold, $rsaudit);
		}
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

		// Cascade delete detail table 't102_ho_detail'
		if (!isset($GLOBALS["t102_ho_detail"]))
			$GLOBALS["t102_ho_detail"] = new t102_ho_detail();
		$rscascade = $GLOBALS["t102_ho_detail"]->loadRs("`hohead_id` = " . QuotedValue($rs['id'], DATATYPE_NUMBER, "DB"));
		$dtlrows = ($rscascade) ? $rscascade->getRows() : [];

		// Call Row Deleting event
		foreach ($dtlrows as $dtlrow) {
			$success = $GLOBALS["t102_ho_detail"]->Row_Deleting($dtlrow);
			if (!$success)
				break;
		}
		if ($success) {
			foreach ($dtlrows as $dtlrow) {
				$success = $GLOBALS["t102_ho_detail"]->delete($dtlrow); // Delete
				if (!$success)
					break;
			}
		}

		// Call Row Deleted event
		if ($success) {
			foreach ($dtlrows as $dtlrow)
				$GLOBALS["t102_ho_detail"]->Row_Deleted($dtlrow);
		}
		if ($success)
			$success = $conn->execute($this->deleteSql($rs, $where, $curfilter));
		if ($success && $this->AuditTrailOnDelete)
			$this->writeAuditTrailOnDelete($rs);
		return $success;
	}

	// Load DbValue from recordset or array
	protected function loadDbValues(&$rs)
	{
		if (!$rs || !is_array($rs) && $rs->EOF)
			return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->id->DbValue = $row['id'];
		$this->tr_no->DbValue = $row['tr_no'];
		$this->tr_date->DbValue = $row['tr_date'];
		$this->ho_to->DbValue = $row['ho_to'];
		$this->cno_to->DbValue = $row['cno_to'];
		$this->dept_to->DbValue = $row['dept_to'];
		$this->ho_by->DbValue = $row['ho_by'];
		$this->cno_by->DbValue = $row['cno_by'];
		$this->dept_by->DbValue = $row['dept_by'];
		$this->sign1->DbValue = $row['sign1'];
		$this->sign2->DbValue = $row['sign2'];
		$this->sign3->DbValue = $row['sign3'];
		$this->sign4->DbValue = $row['sign4'];
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
			return "t101_ho_headlist.php";
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
		if ($pageName == "t101_ho_headview.php")
			return $Language->phrase("View");
		elseif ($pageName == "t101_ho_headedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "t101_ho_headadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "t101_ho_headlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("t101_ho_headview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("t101_ho_headview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "t101_ho_headadd.php?" . $this->getUrlParm($parm);
		else
			$url = "t101_ho_headadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("t101_ho_headedit.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("t101_ho_headedit.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
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
		if ($parm != "")
			$url = $this->keyUrl("t101_ho_headadd.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("t101_ho_headadd.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
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
		return $this->keyUrl("t101_ho_headdelete.php", $this->getUrlParm());
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
		$this->tr_no->setDbValue($rs->fields('tr_no'));
		$this->tr_date->setDbValue($rs->fields('tr_date'));
		$this->ho_to->setDbValue($rs->fields('ho_to'));
		$this->cno_to->setDbValue($rs->fields('cno_to'));
		$this->dept_to->setDbValue($rs->fields('dept_to'));
		$this->ho_by->setDbValue($rs->fields('ho_by'));
		$this->cno_by->setDbValue($rs->fields('cno_by'));
		$this->dept_by->setDbValue($rs->fields('dept_by'));
		$this->sign1->setDbValue($rs->fields('sign1'));
		$this->sign2->setDbValue($rs->fields('sign2'));
		$this->sign3->setDbValue($rs->fields('sign3'));
		$this->sign4->setDbValue($rs->fields('sign4'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// tr_no
		// tr_date
		// ho_to
		// cno_to
		// dept_to
		// ho_by
		// cno_by
		// dept_by
		// sign1
		// sign2
		// sign3
		// sign4
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// tr_no
		$this->tr_no->ViewValue = $this->tr_no->CurrentValue;
		$this->tr_no->ViewCustomAttributes = "";

		// tr_date
		$this->tr_date->ViewValue = $this->tr_date->CurrentValue;
		$this->tr_date->ViewValue = FormatDateTime($this->tr_date->ViewValue, 7);
		$this->tr_date->ViewCustomAttributes = "";

		// ho_to
		$curVal = strval($this->ho_to->CurrentValue);
		if ($curVal != "") {
			$this->ho_to->ViewValue = $this->ho_to->lookupCacheOption($curVal);
			if ($this->ho_to->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->ho_to->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->ho_to->ViewValue = $this->ho_to->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->ho_to->ViewValue = $this->ho_to->CurrentValue;
				}
			}
		} else {
			$this->ho_to->ViewValue = NULL;
		}
		$this->ho_to->ViewCustomAttributes = "";

		// cno_to
		$this->cno_to->ViewValue = $this->cno_to->CurrentValue;
		$this->cno_to->ViewCustomAttributes = "";

		// dept_to
		$curVal = strval($this->dept_to->CurrentValue);
		if ($curVal != "") {
			$this->dept_to->ViewValue = $this->dept_to->lookupCacheOption($curVal);
			if ($this->dept_to->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->dept_to->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->dept_to->ViewValue = $this->dept_to->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->dept_to->ViewValue = $this->dept_to->CurrentValue;
				}
			}
		} else {
			$this->dept_to->ViewValue = NULL;
		}
		$this->dept_to->ViewCustomAttributes = "";

		// ho_by
		$curVal = strval($this->ho_by->CurrentValue);
		if ($curVal != "") {
			$this->ho_by->ViewValue = $this->ho_by->lookupCacheOption($curVal);
			if ($this->ho_by->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->ho_by->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->ho_by->ViewValue = $this->ho_by->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->ho_by->ViewValue = $this->ho_by->CurrentValue;
				}
			}
		} else {
			$this->ho_by->ViewValue = NULL;
		}
		$this->ho_by->ViewCustomAttributes = "";

		// cno_by
		$this->cno_by->ViewValue = $this->cno_by->CurrentValue;
		$this->cno_by->ViewValue = FormatNumber($this->cno_by->ViewValue, 0, -2, -2, -2);
		$this->cno_by->ViewCustomAttributes = "";

		// dept_by
		$curVal = strval($this->dept_by->CurrentValue);
		if ($curVal != "") {
			$this->dept_by->ViewValue = $this->dept_by->lookupCacheOption($curVal);
			if ($this->dept_by->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->dept_by->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->dept_by->ViewValue = $this->dept_by->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->dept_by->ViewValue = $this->dept_by->CurrentValue;
				}
			}
		} else {
			$this->dept_by->ViewValue = NULL;
		}
		$this->dept_by->ViewCustomAttributes = "";

		// sign1
		$curVal = strval($this->sign1->CurrentValue);
		if ($curVal != "") {
			$this->sign1->ViewValue = $this->sign1->lookupCacheOption($curVal);
			if ($this->sign1->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->sign1->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->sign1->ViewValue = $this->sign1->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->sign1->ViewValue = $this->sign1->CurrentValue;
				}
			}
		} else {
			$this->sign1->ViewValue = NULL;
		}
		$this->sign1->ViewCustomAttributes = "";

		// sign2
		$curVal = strval($this->sign2->CurrentValue);
		if ($curVal != "") {
			$this->sign2->ViewValue = $this->sign2->lookupCacheOption($curVal);
			if ($this->sign2->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->sign2->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->sign2->ViewValue = $this->sign2->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->sign2->ViewValue = $this->sign2->CurrentValue;
				}
			}
		} else {
			$this->sign2->ViewValue = NULL;
		}
		$this->sign2->ViewCustomAttributes = "";

		// sign3
		$curVal = strval($this->sign3->CurrentValue);
		if ($curVal != "") {
			$this->sign3->ViewValue = $this->sign3->lookupCacheOption($curVal);
			if ($this->sign3->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->sign3->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->sign3->ViewValue = $this->sign3->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->sign3->ViewValue = $this->sign3->CurrentValue;
				}
			}
		} else {
			$this->sign3->ViewValue = NULL;
		}
		$this->sign3->ViewCustomAttributes = "";

		// sign4
		$curVal = strval($this->sign4->CurrentValue);
		if ($curVal != "") {
			$this->sign4->ViewValue = $this->sign4->lookupCacheOption($curVal);
			if ($this->sign4->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->sign4->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->sign4->ViewValue = $this->sign4->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->sign4->ViewValue = $this->sign4->CurrentValue;
				}
			}
		} else {
			$this->sign4->ViewValue = NULL;
		}
		$this->sign4->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// tr_no
		$this->tr_no->LinkCustomAttributes = "";
		$this->tr_no->HrefValue = "";
		$this->tr_no->TooltipValue = "";

		// tr_date
		$this->tr_date->LinkCustomAttributes = "";
		$this->tr_date->HrefValue = "";
		$this->tr_date->TooltipValue = "";

		// ho_to
		$this->ho_to->LinkCustomAttributes = "";
		$this->ho_to->HrefValue = "";
		$this->ho_to->TooltipValue = "";

		// cno_to
		$this->cno_to->LinkCustomAttributes = "";
		$this->cno_to->HrefValue = "";
		$this->cno_to->TooltipValue = "";

		// dept_to
		$this->dept_to->LinkCustomAttributes = "";
		$this->dept_to->HrefValue = "";
		$this->dept_to->TooltipValue = "";

		// ho_by
		$this->ho_by->LinkCustomAttributes = "";
		$this->ho_by->HrefValue = "";
		$this->ho_by->TooltipValue = "";

		// cno_by
		$this->cno_by->LinkCustomAttributes = "";
		$this->cno_by->HrefValue = "";
		$this->cno_by->TooltipValue = "";

		// dept_by
		$this->dept_by->LinkCustomAttributes = "";
		$this->dept_by->HrefValue = "";
		$this->dept_by->TooltipValue = "";

		// sign1
		$this->sign1->LinkCustomAttributes = "";
		$this->sign1->HrefValue = "";
		$this->sign1->TooltipValue = "";

		// sign2
		$this->sign2->LinkCustomAttributes = "";
		$this->sign2->HrefValue = "";
		$this->sign2->TooltipValue = "";

		// sign3
		$this->sign3->LinkCustomAttributes = "";
		$this->sign3->HrefValue = "";
		$this->sign3->TooltipValue = "";

		// sign4
		$this->sign4->LinkCustomAttributes = "";
		$this->sign4->HrefValue = "";
		$this->sign4->TooltipValue = "";

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

		// tr_no
		$this->tr_no->EditAttrs["class"] = "form-control";
		$this->tr_no->EditCustomAttributes = "";
		if (!$this->tr_no->Raw)
			$this->tr_no->CurrentValue = HtmlDecode($this->tr_no->CurrentValue);
		$this->tr_no->EditValue = $this->tr_no->CurrentValue;
		$this->tr_no->PlaceHolder = RemoveHtml($this->tr_no->caption());

		// tr_date
		$this->tr_date->EditAttrs["class"] = "form-control";
		$this->tr_date->EditCustomAttributes = "";
		$this->tr_date->EditValue = FormatDateTime($this->tr_date->CurrentValue, 7);
		$this->tr_date->PlaceHolder = RemoveHtml($this->tr_date->caption());

		// ho_to
		$this->ho_to->EditAttrs["class"] = "form-control";
		$this->ho_to->EditCustomAttributes = "";

		// cno_to
		$this->cno_to->EditAttrs["class"] = "form-control";
		$this->cno_to->EditCustomAttributes = "";
		if (!$this->cno_to->Raw)
			$this->cno_to->CurrentValue = HtmlDecode($this->cno_to->CurrentValue);
		$this->cno_to->EditValue = $this->cno_to->CurrentValue;
		$this->cno_to->PlaceHolder = RemoveHtml($this->cno_to->caption());

		// dept_to
		$this->dept_to->EditAttrs["class"] = "form-control";
		$this->dept_to->EditCustomAttributes = "";

		// ho_by
		$this->ho_by->EditAttrs["class"] = "form-control";
		$this->ho_by->EditCustomAttributes = "";

		// cno_by
		$this->cno_by->EditAttrs["class"] = "form-control";
		$this->cno_by->EditCustomAttributes = "";
		$this->cno_by->EditValue = $this->cno_by->CurrentValue;
		$this->cno_by->PlaceHolder = RemoveHtml($this->cno_by->caption());

		// dept_by
		$this->dept_by->EditAttrs["class"] = "form-control";
		$this->dept_by->EditCustomAttributes = "";

		// sign1
		$this->sign1->EditAttrs["class"] = "form-control";
		$this->sign1->EditCustomAttributes = "";

		// sign2
		$this->sign2->EditAttrs["class"] = "form-control";
		$this->sign2->EditCustomAttributes = "";

		// sign3
		$this->sign3->EditAttrs["class"] = "form-control";
		$this->sign3->EditCustomAttributes = "";

		// sign4
		$this->sign4->EditAttrs["class"] = "form-control";
		$this->sign4->EditCustomAttributes = "";

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
					$doc->exportCaption($this->tr_no);
					$doc->exportCaption($this->tr_date);
					$doc->exportCaption($this->ho_to);
					$doc->exportCaption($this->cno_to);
					$doc->exportCaption($this->dept_to);
					$doc->exportCaption($this->ho_by);
					$doc->exportCaption($this->cno_by);
					$doc->exportCaption($this->dept_by);
					$doc->exportCaption($this->sign1);
					$doc->exportCaption($this->sign2);
					$doc->exportCaption($this->sign3);
					$doc->exportCaption($this->sign4);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->tr_no);
					$doc->exportCaption($this->tr_date);
					$doc->exportCaption($this->ho_to);
					$doc->exportCaption($this->cno_to);
					$doc->exportCaption($this->dept_to);
					$doc->exportCaption($this->ho_by);
					$doc->exportCaption($this->cno_by);
					$doc->exportCaption($this->dept_by);
					$doc->exportCaption($this->sign1);
					$doc->exportCaption($this->sign2);
					$doc->exportCaption($this->sign3);
					$doc->exportCaption($this->sign4);
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
						$doc->exportField($this->tr_no);
						$doc->exportField($this->tr_date);
						$doc->exportField($this->ho_to);
						$doc->exportField($this->cno_to);
						$doc->exportField($this->dept_to);
						$doc->exportField($this->ho_by);
						$doc->exportField($this->cno_by);
						$doc->exportField($this->dept_by);
						$doc->exportField($this->sign1);
						$doc->exportField($this->sign2);
						$doc->exportField($this->sign3);
						$doc->exportField($this->sign4);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->tr_no);
						$doc->exportField($this->tr_date);
						$doc->exportField($this->ho_to);
						$doc->exportField($this->cno_to);
						$doc->exportField($this->dept_to);
						$doc->exportField($this->ho_by);
						$doc->exportField($this->cno_by);
						$doc->exportField($this->dept_by);
						$doc->exportField($this->sign1);
						$doc->exportField($this->sign2);
						$doc->exportField($this->sign3);
						$doc->exportField($this->sign4);
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

	// Write Audit Trail start/end for grid update
	public function writeAuditTrailDummy($typ)
	{
		$table = 't101_ho_head';
		$usr = CurrentUserID();
		WriteAuditTrail("log", DbCurrentDateTime(), ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (add page)
	public function writeAuditTrailOnAdd(&$rs)
	{
		global $Language;
		if (!$this->AuditTrailOnAdd)
			return;
		$table = 't101_ho_head';

		// Get key value
		$key = "";
		if ($key != "")
			$key .= Config("COMPOSITE_KEY_SEPARATOR");
		$key .= $rs['id'];

		// Write Audit Trail
		$dt = DbCurrentDateTime();
		$id = ScriptName();
		$usr = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if (array_key_exists($fldname, $this->fields) && $this->fields[$fldname]->DataType != DATATYPE_BLOB) { // Ignore BLOB fields
				if ($this->fields[$fldname]->HtmlTag == "PASSWORD") {
					$newvalue = $Language->phrase("PasswordMask"); // Password Field
				} elseif ($this->fields[$fldname]->DataType == DATATYPE_MEMO) {
					if (Config("AUDIT_TRAIL_TO_DATABASE"))
						$newvalue = $rs[$fldname];
					else
						$newvalue = "[MEMO]"; // Memo Field
				} elseif ($this->fields[$fldname]->DataType == DATATYPE_XML) {
					$newvalue = "[XML]"; // XML Field
				} else {
					$newvalue = $rs[$fldname];
				}
				WriteAuditTrail("log", $dt, $id, $usr, "A", $table, $fldname, $key, "", $newvalue);
			}
		}
	}

	// Write Audit Trail (edit page)
	public function writeAuditTrailOnEdit(&$rsold, &$rsnew)
	{
		global $Language;
		if (!$this->AuditTrailOnEdit)
			return;
		$table = 't101_ho_head';

		// Get key value
		$key = "";
		if ($key != "")
			$key .= Config("COMPOSITE_KEY_SEPARATOR");
		$key .= $rsold['id'];

		// Write Audit Trail
		$dt = DbCurrentDateTime();
		$id = ScriptName();
		$usr = CurrentUserID();
		foreach (array_keys($rsnew) as $fldname) {
			if (array_key_exists($fldname, $this->fields) && array_key_exists($fldname, $rsold) && $this->fields[$fldname]->DataType != DATATYPE_BLOB) { // Ignore BLOB fields
				if ($this->fields[$fldname]->DataType == DATATYPE_DATE) { // DateTime field
					$modified = (FormatDateTime($rsold[$fldname], 0) != FormatDateTime($rsnew[$fldname], 0));
				} else {
					$modified = !CompareValue($rsold[$fldname], $rsnew[$fldname]);
				}
				if ($modified) {
					if ($this->fields[$fldname]->HtmlTag == "PASSWORD") { // Password Field
						$oldvalue = $Language->phrase("PasswordMask");
						$newvalue = $Language->phrase("PasswordMask");
					} elseif ($this->fields[$fldname]->DataType == DATATYPE_MEMO) { // Memo field
						if (Config("AUDIT_TRAIL_TO_DATABASE")) {
							$oldvalue = $rsold[$fldname];
							$newvalue = $rsnew[$fldname];
						} else {
							$oldvalue = "[MEMO]";
							$newvalue = "[MEMO]";
						}
					} elseif ($this->fields[$fldname]->DataType == DATATYPE_XML) { // XML field
						$oldvalue = "[XML]";
						$newvalue = "[XML]";
					} else {
						$oldvalue = $rsold[$fldname];
						$newvalue = $rsnew[$fldname];
					}
					WriteAuditTrail("log", $dt, $id, $usr, "U", $table, $fldname, $key, $oldvalue, $newvalue);
				}
			}
		}
	}

	// Write Audit Trail (delete page)
	public function writeAuditTrailOnDelete(&$rs)
	{
		global $Language;
		if (!$this->AuditTrailOnDelete)
			return;
		$table = 't101_ho_head';

		// Get key value
		$key = "";
		if ($key != "")
			$key .= Config("COMPOSITE_KEY_SEPARATOR");
		$key .= $rs['id'];

		// Write Audit Trail
		$dt = DbCurrentDateTime();
		$id = ScriptName();
		$curUser = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if (array_key_exists($fldname, $this->fields) && $this->fields[$fldname]->DataType != DATATYPE_BLOB) { // Ignore BLOB fields
				if ($this->fields[$fldname]->HtmlTag == "PASSWORD") {
					$oldvalue = $Language->phrase("PasswordMask"); // Password Field
				} elseif ($this->fields[$fldname]->DataType == DATATYPE_MEMO) {
					if (Config("AUDIT_TRAIL_TO_DATABASE"))
						$oldvalue = $rs[$fldname];
					else
						$oldvalue = "[MEMO]"; // Memo field
				} elseif ($this->fields[$fldname]->DataType == DATATYPE_XML) {
					$oldvalue = "[XML]"; // XML field
				} else {
					$oldvalue = $rs[$fldname];
				}
				WriteAuditTrail("log", $dt, $id, $curUser, "D", $table, $fldname, $key, $oldvalue, "");
			}
		}
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