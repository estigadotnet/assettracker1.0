<?php
namespace PHPMaker2020\p_assettracker1_0;

/**
 * Page class
 */
class t101_ho_head_list extends t101_ho_head
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{A1916BF1-858E-4493-B275-C510122AD7E3}";

	// Table name
	public $TableName = 't101_ho_head';

	// Page object name
	public $PageObjName = "t101_ho_head_list";

	// Grid form hidden field names
	public $FormName = "ft101_ho_headlist";
	public $FormActionName = "k_action";
	public $FormKeyName = "k_key";
	public $FormOldKeyName = "k_oldkey";
	public $FormBlankRowName = "k_blankrow";
	public $FormKeyCountName = "key_count";

	// Page URLs
	public $AddUrl;
	public $EditUrl;
	public $CopyUrl;
	public $DeleteUrl;
	public $ViewUrl;
	public $ListUrl;

	// Export URLs
	public $ExportPrintUrl;
	public $ExportHtmlUrl;
	public $ExportExcelUrl;
	public $ExportWordUrl;
	public $ExportXmlUrl;
	public $ExportCsvUrl;
	public $ExportPdfUrl;

	// Custom export
	public $ExportExcelCustom = FALSE;
	public $ExportWordCustom = FALSE;
	public $ExportPdfCustom = FALSE;
	public $ExportEmailCustom = FALSE;

	// Update URLs
	public $InlineAddUrl;
	public $InlineCopyUrl;
	public $InlineEditUrl;
	public $GridAddUrl;
	public $GridEditUrl;
	public $MultiDeleteUrl;
	public $MultiUpdateUrl;

	// Audit Trail
	public $AuditTrailOnAdd = TRUE;
	public $AuditTrailOnEdit = TRUE;
	public $AuditTrailOnDelete = TRUE;
	public $AuditTrailOnView = FALSE;
	public $AuditTrailOnViewData = FALSE;
	public $AuditTrailOnSearch = FALSE;

	// Page headings
	public $Heading = "";
	public $Subheading = "";
	public $PageHeader;
	public $PageFooter;

	// Token
	public $Token = "";
	public $TokenTimeout = 0;
	public $CheckToken;

	// Page heading
	public function pageHeading()
	{
		global $Language;
		if ($this->Heading != "")
			return $this->Heading;
		if (method_exists($this, "tableCaption"))
			return $this->tableCaption();
		return "";
	}

	// Page subheading
	public function pageSubheading()
	{
		global $Language;
		if ($this->Subheading != "")
			return $this->Subheading;
		if ($this->TableName)
			return $Language->phrase($this->PageID);
		return "";
	}

	// Page name
	public function pageName()
	{
		return CurrentPageName();
	}

	// Page URL
	public function pageUrl()
	{
		$url = CurrentPageName() . "?";
		if ($this->UseTokenInUrl)
			$url .= "t=" . $this->TableVar . "&"; // Add page token
		return $url;
	}

	// Messages
	private $_message = "";
	private $_failureMessage = "";
	private $_successMessage = "";
	private $_warningMessage = "";

	// Get message
	public function getMessage()
	{
		return isset($_SESSION[SESSION_MESSAGE]) ? $_SESSION[SESSION_MESSAGE] : $this->_message;
	}

	// Set message
	public function setMessage($v)
	{
		AddMessage($this->_message, $v);
		$_SESSION[SESSION_MESSAGE] = $this->_message;
	}

	// Get failure message
	public function getFailureMessage()
	{
		return isset($_SESSION[SESSION_FAILURE_MESSAGE]) ? $_SESSION[SESSION_FAILURE_MESSAGE] : $this->_failureMessage;
	}

	// Set failure message
	public function setFailureMessage($v)
	{
		AddMessage($this->_failureMessage, $v);
		$_SESSION[SESSION_FAILURE_MESSAGE] = $this->_failureMessage;
	}

	// Get success message
	public function getSuccessMessage()
	{
		return isset($_SESSION[SESSION_SUCCESS_MESSAGE]) ? $_SESSION[SESSION_SUCCESS_MESSAGE] : $this->_successMessage;
	}

	// Set success message
	public function setSuccessMessage($v)
	{
		AddMessage($this->_successMessage, $v);
		$_SESSION[SESSION_SUCCESS_MESSAGE] = $this->_successMessage;
	}

	// Get warning message
	public function getWarningMessage()
	{
		return isset($_SESSION[SESSION_WARNING_MESSAGE]) ? $_SESSION[SESSION_WARNING_MESSAGE] : $this->_warningMessage;
	}

	// Set warning message
	public function setWarningMessage($v)
	{
		AddMessage($this->_warningMessage, $v);
		$_SESSION[SESSION_WARNING_MESSAGE] = $this->_warningMessage;
	}

	// Clear message
	public function clearMessage()
	{
		$this->_message = "";
		$_SESSION[SESSION_MESSAGE] = "";
	}

	// Clear failure message
	public function clearFailureMessage()
	{
		$this->_failureMessage = "";
		$_SESSION[SESSION_FAILURE_MESSAGE] = "";
	}

	// Clear success message
	public function clearSuccessMessage()
	{
		$this->_successMessage = "";
		$_SESSION[SESSION_SUCCESS_MESSAGE] = "";
	}

	// Clear warning message
	public function clearWarningMessage()
	{
		$this->_warningMessage = "";
		$_SESSION[SESSION_WARNING_MESSAGE] = "";
	}

	// Clear messages
	public function clearMessages()
	{
		$this->clearMessage();
		$this->clearFailureMessage();
		$this->clearSuccessMessage();
		$this->clearWarningMessage();
	}

	// Show message
	public function showMessage()
	{
		$hidden = TRUE;
		$html = "";

		// Message
		$message = $this->getMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($message, "");
		if ($message != "") { // Message in Session, display
			if (!$hidden)
				$message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message;
			$html .= '<div class="alert alert-info alert-dismissible ew-info"><i class="icon fas fa-info"></i>' . $message . '</div>';
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($warningMessage, "warning");
		if ($warningMessage != "") { // Message in Session, display
			if (!$hidden)
				$warningMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $warningMessage;
			$html .= '<div class="alert alert-warning alert-dismissible ew-warning"><i class="icon fas fa-exclamation"></i>' . $warningMessage . '</div>';
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($successMessage, "success");
		if ($successMessage != "") { // Message in Session, display
			if (!$hidden)
				$successMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $successMessage;
			$html .= '<div class="alert alert-success alert-dismissible ew-success"><i class="icon fas fa-check"></i>' . $successMessage . '</div>';
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$errorMessage = $this->getFailureMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($errorMessage, "failure");
		if ($errorMessage != "") { // Message in Session, display
			if (!$hidden)
				$errorMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $errorMessage;
			$html .= '<div class="alert alert-danger alert-dismissible ew-error"><i class="icon fas fa-ban"></i>' . $errorMessage . '</div>';
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		echo '<div class="ew-message-dialog' . (($hidden) ? ' d-none' : "") . '">' . $html . '</div>';
	}

	// Get message as array
	public function getMessages()
	{
		$ar = [];

		// Message
		$message = $this->getMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($message, "");

		if ($message != "") { // Message in Session, display
			$ar["message"] = $message;
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($warningMessage, "warning");

		if ($warningMessage != "") { // Message in Session, display
			$ar["warningMessage"] = $warningMessage;
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($successMessage, "success");

		if ($successMessage != "") { // Message in Session, display
			$ar["successMessage"] = $successMessage;
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$failureMessage = $this->getFailureMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($failureMessage, "failure");

		if ($failureMessage != "") { // Message in Session, display
			$ar["failureMessage"] = $failureMessage;
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		return $ar;
	}

	// Show Page Header
	public function showPageHeader()
	{
		$header = $this->PageHeader;
		$this->Page_DataRendering($header);
		if ($header != "") { // Header exists, display
			echo '<p id="ew-page-header">' . $header . '</p>';
		}
	}

	// Show Page Footer
	public function showPageFooter()
	{
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		if ($footer != "") { // Footer exists, display
			echo '<p id="ew-page-footer">' . $footer . '</p>';
		}
	}

	// Validate page request
	protected function isPageRequest()
	{
		global $CurrentForm;
		if ($this->UseTokenInUrl) {
			if ($CurrentForm)
				return ($this->TableVar == $CurrentForm->getValue("t"));
			if (Get("t") !== NULL)
				return ($this->TableVar == Get("t"));
		}
		return TRUE;
	}

	// Valid Post
	protected function validPost()
	{
		if (!$this->CheckToken || !IsPost() || IsApi())
			return TRUE;
		if (Post(Config("TOKEN_NAME")) === NULL)
			return FALSE;
		$fn = Config("CHECK_TOKEN_FUNC");
		if (is_callable($fn))
			return $fn(Post(Config("TOKEN_NAME")), $this->TokenTimeout);
		return FALSE;
	}

	// Create Token
	public function createToken()
	{
		global $CurrentToken;
		$fn = Config("CREATE_TOKEN_FUNC"); // Always create token, required by API file/lookup request
		if ($this->Token == "" && is_callable($fn)) // Create token
			$this->Token = $fn();
		$CurrentToken = $this->Token; // Save to global variable
	}

	// Constructor
	public function __construct()
	{
		global $Language, $DashboardReport;
		global $UserTable;

		// Check token
		$this->CheckToken = Config("CHECK_TOKEN");

		// Initialize
		$GLOBALS["Page"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		if (!isset($Language))
			$Language = new Language();

		// Parent constuctor
		parent::__construct();

		// Table object (t101_ho_head)
		if (!isset($GLOBALS["t101_ho_head"]) || get_class($GLOBALS["t101_ho_head"]) == PROJECT_NAMESPACE . "t101_ho_head") {
			$GLOBALS["t101_ho_head"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["t101_ho_head"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->AddUrl = "t101_ho_headadd.php?" . Config("TABLE_SHOW_DETAIL") . "=";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "t101_ho_headdelete.php";
		$this->MultiUpdateUrl = "t101_ho_headupdate.php";

		// Table object (t201_users)
		if (!isset($GLOBALS['t201_users']))
			$GLOBALS['t201_users'] = new t201_users();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 't101_ho_head');

		// Start timer
		if (!isset($GLOBALS["DebugTimer"]))
			$GLOBALS["DebugTimer"] = new Timer();

		// Debug message
		LoadDebugMessage();

		// Open connection
		if (!isset($GLOBALS["Conn"]))
			$GLOBALS["Conn"] = $this->getConnection();

		// User table object (t201_users)
		$UserTable = $UserTable ?: new t201_users();

		// List options
		$this->ListOptions = new ListOptions();
		$this->ListOptions->TableVar = $this->TableVar;

		// Export options
		$this->ExportOptions = new ListOptions("div");
		$this->ExportOptions->TagClassName = "ew-export-option";

		// Import options
		$this->ImportOptions = new ListOptions("div");
		$this->ImportOptions->TagClassName = "ew-import-option";

		// Other options
		if (!$this->OtherOptions)
			$this->OtherOptions = new ListOptionsArray();
		$this->OtherOptions["addedit"] = new ListOptions("div");
		$this->OtherOptions["addedit"]->TagClassName = "ew-add-edit-option";
		$this->OtherOptions["detail"] = new ListOptions("div");
		$this->OtherOptions["detail"]->TagClassName = "ew-detail-option";
		$this->OtherOptions["action"] = new ListOptions("div");
		$this->OtherOptions["action"]->TagClassName = "ew-action-option";

		// Filter options
		$this->FilterOptions = new ListOptions("div");
		$this->FilterOptions->TagClassName = "ew-filter-option ft101_ho_headlistsrch";

		// List actions
		$this->ListActions = new ListActions();
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages, $DashboardReport;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		global $t101_ho_head;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($t101_ho_head);
				$doc->Text = @$content;
				if ($this->isExport("email"))
					echo $this->exportEmail($doc->Text);
				else
					$doc->export();
				DeleteTempImages(); // Delete temp images
				exit();
			}
		}
		if (!IsApi())
			$this->Page_Redirecting($url);

		// Close connection
		CloseConnections();

		// Return for API
		if (IsApi()) {
			$res = $url === TRUE;
			if (!$res) // Show error
				WriteJson(array_merge(["success" => FALSE], $this->getMessages()));
			return;
		}

		// Go to URL if specified
		if ($url != "") {
			if (!Config("DEBUG") && ob_get_length())
				ob_end_clean();
			SaveDebugMessage();
			AddHeader("Location", $url);
		}
		exit();
	}

	// Get records from recordset
	protected function getRecordsFromRecordset($rs, $current = FALSE)
	{
		$rows = [];
		if (is_object($rs)) { // Recordset
			while ($rs && !$rs->EOF) {
				$this->loadRowValues($rs); // Set up DbValue/CurrentValue
				$row = $this->getRecordFromArray($rs->fields);
				if ($current)
					return $row;
				else
					$rows[] = $row;
				$rs->moveNext();
			}
		} elseif (is_array($rs)) {
			foreach ($rs as $ar) {
				$row = $this->getRecordFromArray($ar);
				if ($current)
					return $row;
				else
					$rows[] = $row;
			}
		}
		return $rows;
	}

	// Get record from array
	protected function getRecordFromArray($ar)
	{
		$row = [];
		if (is_array($ar)) {
			foreach ($ar as $fldname => $val) {
				if (array_key_exists($fldname, $this->fields) && ($this->fields[$fldname]->Visible || $this->fields[$fldname]->IsPrimaryKey)) { // Primary key or Visible
					$fld = &$this->fields[$fldname];
					if ($fld->HtmlTag == "FILE") { // Upload field
						if (EmptyValue($val)) {
							$row[$fldname] = NULL;
						} else {
							if ($fld->DataType == DATATYPE_BLOB) {
								$url = FullUrl(GetApiUrl(Config("API_FILE_ACTION"),
									Config("API_OBJECT_NAME") . "=" . $fld->TableVar . "&" .
									Config("API_FIELD_NAME") . "=" . $fld->Param . "&" .
									Config("API_KEY_NAME") . "=" . rawurlencode($this->getRecordKeyValue($ar)))); //*** need to add this? API may not be in the same folder
								$row[$fldname] = ["type" => ContentType($val), "url" => $url, "name" => $fld->Param . ContentExtension($val)];
							} elseif (!$fld->UploadMultiple || !ContainsString($val, Config("MULTIPLE_UPLOAD_SEPARATOR"))) { // Single file
								$url = FullUrl(GetApiUrl(Config("API_FILE_ACTION"),
									Config("API_OBJECT_NAME") . "=" . $fld->TableVar . "&" .
									"fn=" . Encrypt($fld->physicalUploadPath() . $val)));
								$row[$fldname] = ["type" => MimeContentType($val), "url" => $url, "name" => $val];
							} else { // Multiple files
								$files = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $val);
								$ar = [];
								foreach ($files as $file) {
									$url = FullUrl(GetApiUrl(Config("API_FILE_ACTION"),
										Config("API_OBJECT_NAME") . "=" . $fld->TableVar . "&" .
										"fn=" . Encrypt($fld->physicalUploadPath() . $file)));
									if (!EmptyValue($file))
										$ar[] = ["type" => MimeContentType($file), "url" => $url, "name" => $file];
								}
								$row[$fldname] = $ar;
							}
						}
					} else {
						if ($fld->DataType == DATATYPE_MEMO && $fld->MemoMaxLength > 0)
							$val = TruncateMemo($val, $fld->MemoMaxLength, $fld->TruncateMemoRemoveHtml);
						$row[$fldname] = $val;
					}
				}
			}
		}
		return $row;
	}

	// Get record key value from array
	protected function getRecordKeyValue($ar)
	{
		$key = "";
		if (is_array($ar)) {
			$key .= @$ar['id'];
		}
		return $key;
	}

	/**
	 * Hide fields for add/edit
	 *
	 * @return void
	 */
	protected function hideFieldsForAddEdit()
	{
		if ($this->isAdd() || $this->isCopy() || $this->isGridAdd())
			$this->id->Visible = FALSE;
	}

	// Lookup data
	public function lookup()
	{
		global $Language, $Security;
		if (!isset($Language))
			$Language = new Language(Config("LANGUAGE_FOLDER"), Post("language", ""));

		// Set up API request
		if (!ValidApiRequest())
			return FALSE;
		$this->setupApiSecurity();

		// Get lookup object
		$fieldName = Post("field");
		if (!array_key_exists($fieldName, $this->fields))
			return FALSE;
		$lookupField = $this->fields[$fieldName];
		$lookup = $lookupField->Lookup;
		if ($lookup === NULL)
			return FALSE;
		$tbl = $lookup->getTable();
		if (!$Security->allowLookup(Config("PROJECT_ID") . $tbl->TableName)) // Lookup permission
			return FALSE;

		// Get lookup parameters
		$lookupType = Post("ajax", "unknown");
		$pageSize = -1;
		$offset = -1;
		$searchValue = "";
		if (SameText($lookupType, "modal")) {
			$searchValue = Post("sv", "");
			$pageSize = Post("recperpage", 10);
			$offset = Post("start", 0);
		} elseif (SameText($lookupType, "autosuggest")) {
			$searchValue = Param("q", "");
			$pageSize = Param("n", -1);
			$pageSize = is_numeric($pageSize) ? (int)$pageSize : -1;
			if ($pageSize <= 0)
				$pageSize = Config("AUTO_SUGGEST_MAX_ENTRIES");
			$start = Param("start", -1);
			$start = is_numeric($start) ? (int)$start : -1;
			$page = Param("page", -1);
			$page = is_numeric($page) ? (int)$page : -1;
			$offset = $start >= 0 ? $start : ($page > 0 && $pageSize > 0 ? ($page - 1) * $pageSize : 0);
		}
		$userSelect = Decrypt(Post("s", ""));
		$userFilter = Decrypt(Post("f", ""));
		$userOrderBy = Decrypt(Post("o", ""));
		$keys = Post("keys");
		$lookup->LookupType = $lookupType; // Lookup type
		if ($keys !== NULL) { // Selected records from modal
			if (is_array($keys))
				$keys = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $keys);
			$lookup->FilterFields = []; // Skip parent fields if any
			$lookup->FilterValues[] = $keys; // Lookup values
			$pageSize = -1; // Show all records
		} else { // Lookup values
			$lookup->FilterValues[] = Post("v0", Post("lookupValue", ""));
		}
		$cnt = is_array($lookup->FilterFields) ? count($lookup->FilterFields) : 0;
		for ($i = 1; $i <= $cnt; $i++)
			$lookup->FilterValues[] = Post("v" . $i, "");
		$lookup->SearchValue = $searchValue;
		$lookup->PageSize = $pageSize;
		$lookup->Offset = $offset;
		if ($userSelect != "")
			$lookup->UserSelect = $userSelect;
		if ($userFilter != "")
			$lookup->UserFilter = $userFilter;
		if ($userOrderBy != "")
			$lookup->UserOrderBy = $userOrderBy;
		$lookup->toJson($this); // Use settings from current page
	}

	// Set up API security
	public function setupApiSecurity()
	{
		global $Security;

		// Setup security for API request
		if ($Security->isLoggedIn()) $Security->TablePermission_Loading();
		$Security->loadCurrentUserLevel(Config("PROJECT_ID") . $this->TableName);
		if ($Security->isLoggedIn()) $Security->TablePermission_Loaded();
		$Security->UserID_Loading();
		$Security->loadUserID();
		$Security->UserID_Loaded();
	}

	// Class variables
	public $ListOptions; // List options
	public $ExportOptions; // Export options
	public $SearchOptions; // Search options
	public $OtherOptions; // Other options
	public $FilterOptions; // Filter options
	public $ImportOptions; // Import options
	public $ListActions; // List actions
	public $SelectedCount = 0;
	public $SelectedIndex = 0;
	public $DisplayRecords = 20;
	public $StartRecord;
	public $StopRecord;
	public $TotalRecords = 0;
	public $RecordRange = 10;
	public $PageSizes = "10,20,50,-1"; // Page sizes (comma separated)
	public $DefaultSearchWhere = ""; // Default search WHERE clause
	public $SearchWhere = ""; // Search WHERE clause
	public $SearchPanelClass = "ew-search-panel collapse show"; // Search Panel class
	public $SearchRowCount = 0; // For extended search
	public $SearchColumnCount = 0; // For extended search
	public $SearchFieldsPerRow = 1; // For extended search
	public $RecordCount = 0; // Record count
	public $EditRowCount;
	public $StartRowCount = 1;
	public $RowCount = 0;
	public $Attrs = []; // Row attributes and cell attributes
	public $RowIndex = 0; // Row index
	public $KeyCount = 0; // Key count
	public $RowAction = ""; // Row action
	public $RowOldKey = ""; // Row old key (for copy)
	public $MultiColumnClass = "col-sm";
	public $MultiColumnEditClass = "w-100";
	public $DbMasterFilter = ""; // Master filter
	public $DbDetailFilter = ""; // Detail filter
	public $MasterRecordExists;
	public $MultiSelectKey;
	public $Command;
	public $RestoreSearch = FALSE;
	public $DetailPages;
	public $OldRecordset;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm,
			$FormError, $SearchError;

		// User profile
		$UserProfile = new UserProfile();

		// Security
		if (ValidApiRequest()) { // API request
			$this->setupApiSecurity(); // Set up API Security
			if (!$Security->canList()) {
				SetStatus(401); // Unauthorized
				return;
			}
		} else {
			$Security = new AdvancedSecurity();
			if (!$Security->isLoggedIn())
				$Security->autoLogin();
			if ($Security->isLoggedIn())
				$Security->TablePermission_Loading();
			$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName);
			if ($Security->isLoggedIn())
				$Security->TablePermission_Loaded();
			if (!$Security->canList()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				$this->terminate(GetUrl("index.php"));
				return;
			}
			if ($Security->isLoggedIn()) {
				$Security->UserID_Loading();
				$Security->loadUserID();
				$Security->UserID_Loaded();
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();

		// Get export parameters
		$custom = "";
		if (Param("export") !== NULL) {
			$this->Export = Param("export");
			$custom = Param("custom", "");
		} elseif (IsPost()) {
			if (Post("exporttype") !== NULL)
				$this->Export = Post("exporttype");
			$custom = Post("custom", "");
		} elseif (Get("cmd") == "json") {
			$this->Export = Get("cmd");
		} else {
			$this->setExportReturnUrl(CurrentUrl());
		}
		$ExportFileName = $this->TableVar; // Get export file, used in header

		// Get custom export parameters
		if ($this->isExport() && $custom != "") {
			$this->CustomExport = $this->Export;
			$this->Export = "print";
		}
		$CustomExportType = $this->CustomExport;
		$ExportType = $this->Export; // Get export parameter, used in header

		// Update Export URLs
		if (Config("USE_PHPEXCEL"))
			$this->ExportExcelCustom = FALSE;
		if ($this->ExportExcelCustom)
			$this->ExportExcelUrl .= "&amp;custom=1";
		if (Config("USE_PHPWORD"))
			$this->ExportWordCustom = FALSE;
		if ($this->ExportWordCustom)
			$this->ExportWordUrl .= "&amp;custom=1";
		if ($this->ExportPdfCustom)
			$this->ExportPdfUrl .= "&amp;custom=1";
		$this->CurrentAction = Param("action"); // Set up current action

		// Get grid add count
		$gridaddcnt = Get(Config("TABLE_GRID_ADD_ROW_COUNT"), "");
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$this->GridAddRowCount = $gridaddcnt;

		// Set up list options
		$this->setupListOptions();

		// Setup export options
		$this->setupExportOptions();
		$this->id->Visible = FALSE;
		$this->tr_no->setVisibility();
		$this->tr_date->setVisibility();
		$this->ho_to->setVisibility();
		$this->cno_to->setVisibility();
		$this->dept_to->setVisibility();
		$this->ho_by->setVisibility();
		$this->cno_by->setVisibility();
		$this->dept_by->setVisibility();
		$this->sign1->setVisibility();
		$this->sign2->setVisibility();
		$this->sign3->setVisibility();
		$this->sign4->setVisibility();
		$this->hideFieldsForAddEdit();

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();

		// Check token
		if (!$this->validPost()) {
			Write($Language->phrase("InvalidPostRequest"));
			$this->terminate();
		}

		// Create Token
		$this->createToken();

		// Setup other options
		$this->setupOtherOptions();

		// Set up custom action (compatible with old version)
		foreach ($this->CustomActions as $name => $action)
			$this->ListActions->add($name, $action);

		// Show checkbox column if multiple action
		foreach ($this->ListActions->Items as $listaction) {
			if ($listaction->Select == ACTION_MULTIPLE && $listaction->Allow) {
				$this->ListOptions["checkbox"]->Visible = TRUE;
				break;
			}
		}

		// Set up lookup cache
		$this->setupLookupOptions($this->ho_to);
		$this->setupLookupOptions($this->dept_to);
		$this->setupLookupOptions($this->ho_by);
		$this->setupLookupOptions($this->dept_by);
		$this->setupLookupOptions($this->sign1);
		$this->setupLookupOptions($this->sign2);
		$this->setupLookupOptions($this->sign3);
		$this->setupLookupOptions($this->sign4);

		// Search filters
		$srchAdvanced = ""; // Advanced search filter
		$srchBasic = ""; // Basic search filter
		$filter = "";

		// Get command
		$this->Command = strtolower(Get("cmd"));
		if ($this->isPageRequest()) { // Validate request

			// Process list action first
			if ($this->processListAction()) // Ajax request
				$this->terminate();

			// Set up records per page
			$this->setupDisplayRecords();

			// Handle reset command
			$this->resetCmd();

			// Set up Breadcrumb
			if (!$this->isExport())
				$this->setupBreadcrumb();

			// Check QueryString parameters
			if (Get("action") !== NULL) {
				$this->CurrentAction = Get("action");

				// Clear inline mode
				if ($this->isCancel())
					$this->clearInlineMode();

				// Switch to grid edit mode
				if ($this->isGridEdit())
					$this->gridEditMode();

				// Switch to inline edit mode
				if ($this->isEdit())
					$this->inlineEditMode();

				// Switch to inline add mode
				if ($this->isAdd() || $this->isCopy())
					$this->inlineAddMode();

				// Switch to grid add mode
				if ($this->isGridAdd())
					$this->gridAddMode();
			} else {
				if (Post("action") !== NULL) {
					$this->CurrentAction = Post("action"); // Get action

					// Grid Update
					if (($this->isGridUpdate() || $this->isGridOverwrite()) && @$_SESSION[SESSION_INLINE_MODE] == "gridedit") {
						if ($this->validateGridForm()) {
							$gridUpdate = $this->gridUpdate();
						} else {
							$gridUpdate = FALSE;
							$this->setFailureMessage($FormError);
						}
						if ($gridUpdate) {
						} else {
							$this->EventCancelled = TRUE;
							$this->gridEditMode(); // Stay in Grid edit mode
						}
					}

					// Inline Update
					if (($this->isUpdate() || $this->isOverwrite()) && @$_SESSION[SESSION_INLINE_MODE] == "edit")
						$this->inlineUpdate();

					// Insert Inline
					if ($this->isInsert() && @$_SESSION[SESSION_INLINE_MODE] == "add")
						$this->inlineInsert();

					// Grid Insert
					if ($this->isGridInsert() && @$_SESSION[SESSION_INLINE_MODE] == "gridadd") {
						if ($this->validateGridForm()) {
							$gridInsert = $this->gridInsert();
						} else {
							$gridInsert = FALSE;
							$this->setFailureMessage($FormError);
						}
						if ($gridInsert) {
						} else {
							$this->EventCancelled = TRUE;
							$this->gridAddMode(); // Stay in Grid add mode
						}
					}
				} elseif (@$_SESSION[SESSION_INLINE_MODE] == "gridedit") { // Previously in grid edit mode
					if (Get(Config("TABLE_START_REC")) !== NULL || Get(Config("TABLE_PAGE_NO")) !== NULL) // Stay in grid edit mode if paging
						$this->gridEditMode();
					else // Reset grid edit
						$this->clearInlineMode();
				}
			}

			// Hide list options
			if ($this->isExport()) {
				$this->ListOptions->hideAllOptions(["sequence"]);
				$this->ListOptions->UseDropDownButton = FALSE; // Disable drop down button
				$this->ListOptions->UseButtonGroup = FALSE; // Disable button group
			} elseif ($this->isGridAdd() || $this->isGridEdit()) {
				$this->ListOptions->hideAllOptions();
				$this->ListOptions->UseDropDownButton = FALSE; // Disable drop down button
				$this->ListOptions->UseButtonGroup = FALSE; // Disable button group
			}

			// Hide options
			if ($this->isExport() || $this->CurrentAction) {
				$this->ExportOptions->hideAllOptions();
				$this->FilterOptions->hideAllOptions();
				$this->ImportOptions->hideAllOptions();
			}

			// Hide other options
			if ($this->isExport())
				$this->OtherOptions->hideAllOptions();

			// Show grid delete link for grid add / grid edit
			if ($this->AllowAddDeleteRow) {
				if ($this->isGridAdd() || $this->isGridEdit()) {
					$item = $this->ListOptions["griddelete"];
					if ($item)
						$item->Visible = TRUE;
				}
			}

			// Get default search criteria
			AddFilter($this->DefaultSearchWhere, $this->advancedSearchWhere(TRUE));

			// Get and validate search values for advanced search
			$this->loadSearchValues(); // Get search values

			// Process filter list
			if ($this->processFilterList())
				$this->terminate();
			if (!$this->validateSearch())
				$this->setFailureMessage($SearchError);

			// Restore search parms from Session if not searching / reset / export
			if (($this->isExport() || $this->Command != "search" && $this->Command != "reset" && $this->Command != "resetall") && $this->Command != "json" && $this->checkSearchParms())
				$this->restoreSearchParms();

			// Call Recordset SearchValidated event
			$this->Recordset_SearchValidated();

			// Set up sorting order
			$this->setupSortOrder();

			// Get search criteria for advanced search
			if ($SearchError == "")
				$srchAdvanced = $this->advancedSearchWhere();
		}

		// Restore display records
		if ($this->Command != "json" && $this->getRecordsPerPage() != "") {
			$this->DisplayRecords = $this->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecords = 20; // Load default
			$this->setRecordsPerPage($this->DisplayRecords); // Save default to Session
		}

		// Load Sorting Order
		if ($this->Command != "json")
			$this->loadSortOrder();

		// Load search default if no existing search criteria
		if (!$this->checkSearchParms()) {

			// Load advanced search from default
			if ($this->loadAdvancedSearchDefault()) {
				$srchAdvanced = $this->advancedSearchWhere();
			}
		}

		// Restore search settings from Session
		if ($SearchError == "")
			$this->loadAdvancedSearch();

		// Build search criteria
		AddFilter($this->SearchWhere, $srchAdvanced);
		AddFilter($this->SearchWhere, $srchBasic);

		// Call Recordset_Searching event
		$this->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->Command == "search" && !$this->RestoreSearch) {
			$this->setSearchWhere($this->SearchWhere); // Save to Session
			$this->StartRecord = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRecord);
		} elseif ($this->Command != "json") {
			$this->SearchWhere = $this->getSearchWhere();
		}

		// Build filter
		$filter = "";
		if (!$Security->canList())
			$filter = "(0=1)"; // Filter all records
		AddFilter($filter, $this->DbDetailFilter);
		AddFilter($filter, $this->SearchWhere);

		// Set up filter
		if ($this->Command == "json") {
			$this->UseSessionForListSql = FALSE; // Do not use session for ListSQL
			$this->CurrentFilter = $filter;
		} else {
			$this->setSessionWhere($filter);
			$this->CurrentFilter = "";
		}

		// Export data only
		if (!$this->CustomExport && in_array($this->Export, array_keys(Config("EXPORT_CLASSES")))) {
			$this->exportData();
			$this->terminate();
		}
		if ($this->isGridAdd()) {
			$this->CurrentFilter = "0=1";
			$this->StartRecord = 1;
			$this->DisplayRecords = $this->GridAddRowCount;
			$this->TotalRecords = $this->DisplayRecords;
			$this->StopRecord = $this->DisplayRecords;
		} else {
			$selectLimit = $this->UseSelectLimit;
			if ($selectLimit) {
				$this->TotalRecords = $this->listRecordCount();
			} else {
				if ($this->Recordset = $this->loadRecordset())
					$this->TotalRecords = $this->Recordset->RecordCount();
			}
			$this->StartRecord = 1;
			if ($this->DisplayRecords <= 0 || ($this->isExport() && $this->ExportAll)) // Display all records
				$this->DisplayRecords = $this->TotalRecords;
			if (!($this->isExport() && $this->ExportAll)) // Set up start record position
				$this->setupStartRecord();
			if ($selectLimit)
				$this->Recordset = $this->loadRecordset($this->StartRecord - 1, $this->DisplayRecords);

			// Set no record found message
			if (!$this->CurrentAction && $this->TotalRecords == 0) {
				if (!$Security->canList())
					$this->setWarningMessage(DeniedMessage());
				if ($this->SearchWhere == "0=101")
					$this->setWarningMessage($Language->phrase("EnterSearchCriteria"));
				else
					$this->setWarningMessage($Language->phrase("NoRecord"));
			}

			// Audit trail on search
			if ($this->AuditTrailOnSearch && $this->Command == "search" && !$this->RestoreSearch) {
				$searchParm = ServerVar("QUERY_STRING");
				$searchSql = $this->getSessionWhere();
				$this->writeAuditTrailOnSearch($searchParm, $searchSql);
			}
		}

		// Search options
		$this->setupSearchOptions();

		// Set up search panel class
		if ($this->SearchWhere != "")
			AppendClass($this->SearchPanelClass, "show");

		// Normal return
		if (IsApi()) {
			$rows = $this->getRecordsFromRecordset($this->Recordset);
			$this->Recordset->close();
			WriteJson(["success" => TRUE, $this->TableVar => $rows, "totalRecordCount" => $this->TotalRecords]);
			$this->terminate(TRUE);
		}

		// Set up pager
		$this->Pager = new PrevNextPager($this->StartRecord, $this->getRecordsPerPage(), $this->TotalRecords, $this->PageSizes, $this->RecordRange, $this->AutoHidePager, $this->AutoHidePageSizeSelector);
	}

	// Set up number of records displayed per page
	protected function setupDisplayRecords()
	{
		$wrk = Get(Config("TABLE_REC_PER_PAGE"), "");
		if ($wrk != "") {
			if (is_numeric($wrk)) {
				$this->DisplayRecords = (int)$wrk;
			} else {
				if (SameText($wrk, "all")) { // Display all records
					$this->DisplayRecords = -1;
				} else {
					$this->DisplayRecords = 20; // Non-numeric, load default
				}
			}
			$this->setRecordsPerPage($this->DisplayRecords); // Save to Session

			// Reset start position
			$this->StartRecord = 1;
			$this->setStartRecordNumber($this->StartRecord);
		}
	}

	// Exit inline mode
	protected function clearInlineMode()
	{
		$this->setKey("id", ""); // Clear inline edit key
		$this->LastAction = $this->CurrentAction; // Save last action
		$this->CurrentAction = ""; // Clear action
		$_SESSION[SESSION_INLINE_MODE] = ""; // Clear inline mode
	}

	// Switch to Grid Add mode
	protected function gridAddMode()
	{
		$this->CurrentAction = "gridadd";
		$_SESSION[SESSION_INLINE_MODE] = "gridadd";
		$this->hideFieldsForAddEdit();
	}

	// Switch to Grid Edit mode
	protected function gridEditMode()
	{
		$this->CurrentAction = "gridedit";
		$_SESSION[SESSION_INLINE_MODE] = "gridedit";
		$this->hideFieldsForAddEdit();
	}

	// Switch to Inline Edit mode
	protected function inlineEditMode()
	{
		global $Security, $Language;
		if (!$Security->canEdit())
			return FALSE; // Edit not allowed
		$inlineEdit = TRUE;
		if (Get("id") !== NULL) {
			$this->id->setQueryStringValue(Get("id"));
		} else {
			$inlineEdit = FALSE;
		}
		if ($inlineEdit) {
			if ($this->loadRow()) {
				$this->setKey("id", $this->id->CurrentValue); // Set up inline edit key
				$_SESSION[SESSION_INLINE_MODE] = "edit"; // Enable inline edit
			}
		}
		return TRUE;
	}

	// Perform update to Inline Edit record
	protected function inlineUpdate()
	{
		global $Language, $CurrentForm, $FormError;
		$CurrentForm->Index = 1;
		$this->loadFormValues(); // Get form values

		// Validate form
		$inlineUpdate = TRUE;
		if (!$this->validateForm()) {
			$inlineUpdate = FALSE; // Form error, reset action
			$this->setFailureMessage($FormError);
		} else {
			$inlineUpdate = FALSE;
			$rowkey = strval($CurrentForm->getValue($this->FormKeyName));
			if ($this->setupKeyValues($rowkey)) { // Set up key values
				if ($this->checkInlineEditKey()) { // Check key
					$this->SendEmail = TRUE; // Send email on update success
					$inlineUpdate = $this->editRow(); // Update record
				} else {
					$inlineUpdate = FALSE;
				}
			}
		}
		if ($inlineUpdate) { // Update success
			if ($this->getSuccessMessage() == "")
				$this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Set up success message
			$this->clearInlineMode(); // Clear inline edit mode
		} else {
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("UpdateFailed")); // Set update failed message
			$this->EventCancelled = TRUE; // Cancel event
			$this->CurrentAction = "edit"; // Stay in edit mode
		}
	}

	// Check Inline Edit key
	public function checkInlineEditKey()
	{
		if ($this->EventCancelled)
			$this->id->OldValue = $this->id->DbValue;
		$val = $this->id->OldValue !== NULL ? $this->id->OldValue : $this->id->CurrentValue;
		if (strval($this->getKey("id")) != strval($val))
			return FALSE;
		return TRUE;
	}

	// Switch to Inline Add mode
	protected function inlineAddMode()
	{
		global $Security, $Language;
		if (!$Security->canAdd())
			return FALSE; // Add not allowed
		if ($this->isCopy()) {
			if (Get("id") !== NULL) {
				$this->id->setQueryStringValue(Get("id"));
				$this->setKey("id", $this->id->CurrentValue); // Set up key
			} else {
				$this->setKey("id", ""); // Clear key
				$this->CurrentAction = "add";
			}
		}
		$_SESSION[SESSION_INLINE_MODE] = "add"; // Enable inline add
		return TRUE;
	}

	// Perform update to Inline Add/Copy record
	protected function inlineInsert()
	{
		global $Language, $CurrentForm, $FormError;
		$this->loadOldRecord(); // Load old record
		$CurrentForm->Index = 0;
		$this->loadFormValues(); // Get form values

		// Validate form
		if (!$this->validateForm()) {
			$this->setFailureMessage($FormError); // Set validation error message
			$this->EventCancelled = TRUE; // Set event cancelled
			$this->CurrentAction = "add"; // Stay in add mode
			return;
		}
		$this->SendEmail = TRUE; // Send email on add success
		if ($this->addRow($this->OldRecordset)) { // Add record
			if ($this->getSuccessMessage() == "")
				$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up add success message
			$this->clearInlineMode(); // Clear inline add mode
		} else { // Add failed
			$this->EventCancelled = TRUE; // Set event cancelled
			$this->CurrentAction = "add"; // Stay in add mode
		}
	}

	// Perform update to grid
	public function gridUpdate()
	{
		global $Language, $CurrentForm, $FormError;
		$gridUpdate = TRUE;

		// Get old recordset
		$this->CurrentFilter = $this->buildKeyFilter();
		if ($this->CurrentFilter == "")
			$this->CurrentFilter = "0=1";
		$sql = $this->getCurrentSql();
		$conn = $this->getConnection();
		if ($rs = $conn->execute($sql)) {
			$rsold = $rs->getRows();
			$rs->close();
		}

		// Call Grid Updating event
		if (!$this->Grid_Updating($rsold)) {
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("GridEditCancelled")); // Set grid edit cancelled message
			return FALSE;
		}

		// Begin transaction
		$conn->beginTrans();
		if ($this->AuditTrailOnEdit)
			$this->writeAuditTrailDummy($Language->phrase("BatchUpdateBegin")); // Batch update begin
		$key = "";

		// Update row index and get row key
		$CurrentForm->Index = -1;
		$rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;

		// Update all rows based on key
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {
			$CurrentForm->Index = $rowindex;
			$rowkey = strval($CurrentForm->getValue($this->FormKeyName));
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));

			// Load all values and keys
			if ($rowaction != "insertdelete") { // Skip insert then deleted rows
				$this->loadFormValues(); // Get form values
				if ($rowaction == "" || $rowaction == "edit" || $rowaction == "delete") {
					$gridUpdate = $this->setupKeyValues($rowkey); // Set up key values
				} else {
					$gridUpdate = TRUE;
				}

				// Skip empty row
				if ($rowaction == "insert" && $this->emptyRow()) {

					// No action required
				// Validate form and insert/update/delete record

				} elseif ($gridUpdate) {
					if ($rowaction == "delete") {
						$this->CurrentFilter = $this->getRecordFilter();
						$gridUpdate = $this->deleteRows(); // Delete this row
					} else if (!$this->validateForm()) {
						$gridUpdate = FALSE; // Form error, reset action
						$this->setFailureMessage($FormError);
					} else {
						if ($rowaction == "insert") {
							$gridUpdate = $this->addRow(); // Insert this row
						} else {
							if ($rowkey != "") {
								$this->SendEmail = FALSE; // Do not send email on update success
								$gridUpdate = $this->editRow(); // Update this row
							}
						} // End update
					}
				}
				if ($gridUpdate) {
					if ($key != "")
						$key .= ", ";
					$key .= $rowkey;
				} else {
					break;
				}
			}
		}
		if ($gridUpdate) {
			$conn->commitTrans(); // Commit transaction

			// Get new recordset
			if ($rs = $conn->execute($sql)) {
				$rsnew = $rs->getRows();
				$rs->close();
			}

			// Call Grid_Updated event
			$this->Grid_Updated($rsold, $rsnew);
			if ($this->AuditTrailOnEdit)
				$this->writeAuditTrailDummy($Language->phrase("BatchUpdateSuccess")); // Batch update success
			if ($this->getSuccessMessage() == "")
				$this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Set up update success message
			$this->clearInlineMode(); // Clear inline edit mode
		} else {
			$conn->rollbackTrans(); // Rollback transaction
			if ($this->AuditTrailOnEdit)
				$this->writeAuditTrailDummy($Language->phrase("BatchUpdateRollback")); // Batch update rollback
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("UpdateFailed")); // Set update failed message
		}
		return $gridUpdate;
	}

	// Build filter for all keys
	protected function buildKeyFilter()
	{
		global $CurrentForm;
		$wrkFilter = "";

		// Update row index and get row key
		$rowindex = 1;
		$CurrentForm->Index = $rowindex;
		$thisKey = strval($CurrentForm->getValue($this->FormKeyName));
		while ($thisKey != "") {
			if ($this->setupKeyValues($thisKey)) {
				$filter = $this->getRecordFilter();
				if ($wrkFilter != "")
					$wrkFilter .= " OR ";
				$wrkFilter .= $filter;
			} else {
				$wrkFilter = "0=1";
				break;
			}

			// Update row index and get row key
			$rowindex++; // Next row
			$CurrentForm->Index = $rowindex;
			$thisKey = strval($CurrentForm->getValue($this->FormKeyName));
		}
		return $wrkFilter;
	}

	// Set up key values
	protected function setupKeyValues($key)
	{
		$arKeyFlds = explode(Config("COMPOSITE_KEY_SEPARATOR"), $key);
		if (count($arKeyFlds) >= 1) {
			$this->id->setOldValue($arKeyFlds[0]);
			if (!is_numeric($this->id->OldValue))
				return FALSE;
		}
		return TRUE;
	}

	// Perform Grid Add
	public function gridInsert()
	{
		global $Language, $CurrentForm, $FormError;
		$rowindex = 1;
		$gridInsert = FALSE;
		$conn = $this->getConnection();

		// Call Grid Inserting event
		if (!$this->Grid_Inserting()) {
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("GridAddCancelled")); // Set grid add cancelled message
			return FALSE;
		}

		// Begin transaction
		$conn->beginTrans();

		// Init key filter
		$wrkfilter = "";
		$addcnt = 0;
		if ($this->AuditTrailOnAdd)
			$this->writeAuditTrailDummy($Language->phrase("BatchInsertBegin")); // Batch insert begin
		$key = "";

		// Get row count
		$CurrentForm->Index = -1;
		$rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;

		// Insert all rows
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {

			// Load current row values
			$CurrentForm->Index = $rowindex;
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));
			if ($rowaction != "" && $rowaction != "insert")
				continue; // Skip
			$this->loadFormValues(); // Get form values
			if (!$this->emptyRow()) {
				$addcnt++;
				$this->SendEmail = FALSE; // Do not send email on insert success

				// Validate form
				if (!$this->validateForm()) {
					$gridInsert = FALSE; // Form error, reset action
					$this->setFailureMessage($FormError);
				} else {
					$gridInsert = $this->addRow($this->OldRecordset); // Insert this row
				}
				if ($gridInsert) {
					if ($key != "")
						$key .= Config("COMPOSITE_KEY_SEPARATOR");
					$key .= $this->id->CurrentValue;

					// Add filter for this record
					$filter = $this->getRecordFilter();
					if ($wrkfilter != "")
						$wrkfilter .= " OR ";
					$wrkfilter .= $filter;
				} else {
					break;
				}
			}
		}
		if ($addcnt == 0) { // No record inserted
			$this->setFailureMessage($Language->phrase("NoAddRecord"));
			$gridInsert = FALSE;
		}
		if ($gridInsert) {
			$conn->commitTrans(); // Commit transaction

			// Get new recordset
			$this->CurrentFilter = $wrkfilter;
			$sql = $this->getCurrentSql();
			if ($rs = $conn->execute($sql)) {
				$rsnew = $rs->getRows();
				$rs->close();
			}

			// Call Grid_Inserted event
			$this->Grid_Inserted($rsnew);
			if ($this->AuditTrailOnAdd)
				$this->writeAuditTrailDummy($Language->phrase("BatchInsertSuccess")); // Batch insert success
			if ($this->getSuccessMessage() == "")
				$this->setSuccessMessage($Language->phrase("InsertSuccess")); // Set up insert success message
			$this->clearInlineMode(); // Clear grid add mode
		} else {
			$conn->rollbackTrans(); // Rollback transaction
			if ($this->AuditTrailOnAdd)
				$this->writeAuditTrailDummy($Language->phrase("BatchInsertRollback")); // Batch insert rollback
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("InsertFailed")); // Set insert failed message
		}
		return $gridInsert;
	}

	// Check if empty row
	public function emptyRow()
	{
		global $CurrentForm;
		if ($CurrentForm->hasValue("x_tr_no") && $CurrentForm->hasValue("o_tr_no") && $this->tr_no->CurrentValue != $this->tr_no->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_tr_date") && $CurrentForm->hasValue("o_tr_date") && $this->tr_date->CurrentValue != $this->tr_date->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ho_to") && $CurrentForm->hasValue("o_ho_to") && $this->ho_to->CurrentValue != $this->ho_to->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_cno_to") && $CurrentForm->hasValue("o_cno_to") && $this->cno_to->CurrentValue != $this->cno_to->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_dept_to") && $CurrentForm->hasValue("o_dept_to") && $this->dept_to->CurrentValue != $this->dept_to->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ho_by") && $CurrentForm->hasValue("o_ho_by") && $this->ho_by->CurrentValue != $this->ho_by->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_cno_by") && $CurrentForm->hasValue("o_cno_by") && $this->cno_by->CurrentValue != $this->cno_by->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_dept_by") && $CurrentForm->hasValue("o_dept_by") && $this->dept_by->CurrentValue != $this->dept_by->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_sign1") && $CurrentForm->hasValue("o_sign1") && $this->sign1->CurrentValue != $this->sign1->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_sign2") && $CurrentForm->hasValue("o_sign2") && $this->sign2->CurrentValue != $this->sign2->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_sign3") && $CurrentForm->hasValue("o_sign3") && $this->sign3->CurrentValue != $this->sign3->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_sign4") && $CurrentForm->hasValue("o_sign4") && $this->sign4->CurrentValue != $this->sign4->OldValue)
			return FALSE;
		return TRUE;
	}

	// Validate grid form
	public function validateGridForm()
	{
		global $CurrentForm;

		// Get row count
		$CurrentForm->Index = -1;
		$rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;

		// Validate all records
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {

			// Load current row values
			$CurrentForm->Index = $rowindex;
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));
			if ($rowaction != "delete" && $rowaction != "insertdelete") {
				$this->loadFormValues(); // Get form values
				if ($rowaction == "insert" && $this->emptyRow()) {

					// Ignore
				} else if (!$this->validateForm()) {
					return FALSE;
				}
			}
		}
		return TRUE;
	}

	// Get all form values of the grid
	public function getGridFormValues()
	{
		global $CurrentForm;

		// Get row count
		$CurrentForm->Index = -1;
		$rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;
		$rows = [];

		// Loop through all records
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {

			// Load current row values
			$CurrentForm->Index = $rowindex;
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));
			if ($rowaction != "delete" && $rowaction != "insertdelete") {
				$this->loadFormValues(); // Get form values
				if ($rowaction == "insert" && $this->emptyRow()) {

					// Ignore
				} else {
					$rows[] = $this->getFieldValues("FormValue"); // Return row as array
				}
			}
		}
		return $rows; // Return as array of array
	}

	// Restore form values for current row
	public function restoreCurrentRowFormValues($idx)
	{
		global $CurrentForm;

		// Get row based on current index
		$CurrentForm->Index = $idx;
		$this->loadFormValues(); // Load form values
	}

	// Get list of filters
	public function getFilterList()
	{
		global $UserProfile;

		// Initialize
		$filterList = "";
		$savedFilterList = "";
		$filterList = Concat($filterList, $this->tr_no->AdvancedSearch->toJson(), ","); // Field tr_no
		$filterList = Concat($filterList, $this->tr_date->AdvancedSearch->toJson(), ","); // Field tr_date
		$filterList = Concat($filterList, $this->ho_to->AdvancedSearch->toJson(), ","); // Field ho_to
		$filterList = Concat($filterList, $this->cno_to->AdvancedSearch->toJson(), ","); // Field cno_to
		$filterList = Concat($filterList, $this->dept_to->AdvancedSearch->toJson(), ","); // Field dept_to
		$filterList = Concat($filterList, $this->ho_by->AdvancedSearch->toJson(), ","); // Field ho_by
		$filterList = Concat($filterList, $this->cno_by->AdvancedSearch->toJson(), ","); // Field cno_by
		$filterList = Concat($filterList, $this->dept_by->AdvancedSearch->toJson(), ","); // Field dept_by
		$filterList = Concat($filterList, $this->sign1->AdvancedSearch->toJson(), ","); // Field sign1
		$filterList = Concat($filterList, $this->sign2->AdvancedSearch->toJson(), ","); // Field sign2
		$filterList = Concat($filterList, $this->sign3->AdvancedSearch->toJson(), ","); // Field sign3
		$filterList = Concat($filterList, $this->sign4->AdvancedSearch->toJson(), ","); // Field sign4

		// Return filter list in JSON
		if ($filterList != "")
			$filterList = "\"data\":{" . $filterList . "}";
		if ($savedFilterList != "")
			$filterList = Concat($filterList, "\"filters\":" . $savedFilterList, ",");
		return ($filterList != "") ? "{" . $filterList . "}" : "null";
	}

	// Process filter list
	protected function processFilterList()
	{
		global $UserProfile;
		if (Post("ajax") == "savefilters") { // Save filter request (Ajax)
			$filters = Post("filters");
			$UserProfile->setSearchFilters(CurrentUserName(), "ft101_ho_headlistsrch", $filters);
			WriteJson([["success" => TRUE]]); // Success
			return TRUE;
		} elseif (Post("cmd") == "resetfilter") {
			$this->restoreFilterList();
		}
		return FALSE;
	}

	// Restore list of filters
	protected function restoreFilterList()
	{

		// Return if not reset filter
		if (Post("cmd") !== "resetfilter")
			return FALSE;
		$filter = json_decode(Post("filter"), TRUE);
		$this->Command = "search";

		// Field tr_no
		$this->tr_no->AdvancedSearch->SearchValue = @$filter["x_tr_no"];
		$this->tr_no->AdvancedSearch->SearchOperator = @$filter["z_tr_no"];
		$this->tr_no->AdvancedSearch->SearchCondition = @$filter["v_tr_no"];
		$this->tr_no->AdvancedSearch->SearchValue2 = @$filter["y_tr_no"];
		$this->tr_no->AdvancedSearch->SearchOperator2 = @$filter["w_tr_no"];
		$this->tr_no->AdvancedSearch->save();

		// Field tr_date
		$this->tr_date->AdvancedSearch->SearchValue = @$filter["x_tr_date"];
		$this->tr_date->AdvancedSearch->SearchOperator = @$filter["z_tr_date"];
		$this->tr_date->AdvancedSearch->SearchCondition = @$filter["v_tr_date"];
		$this->tr_date->AdvancedSearch->SearchValue2 = @$filter["y_tr_date"];
		$this->tr_date->AdvancedSearch->SearchOperator2 = @$filter["w_tr_date"];
		$this->tr_date->AdvancedSearch->save();

		// Field ho_to
		$this->ho_to->AdvancedSearch->SearchValue = @$filter["x_ho_to"];
		$this->ho_to->AdvancedSearch->SearchOperator = @$filter["z_ho_to"];
		$this->ho_to->AdvancedSearch->SearchCondition = @$filter["v_ho_to"];
		$this->ho_to->AdvancedSearch->SearchValue2 = @$filter["y_ho_to"];
		$this->ho_to->AdvancedSearch->SearchOperator2 = @$filter["w_ho_to"];
		$this->ho_to->AdvancedSearch->save();

		// Field cno_to
		$this->cno_to->AdvancedSearch->SearchValue = @$filter["x_cno_to"];
		$this->cno_to->AdvancedSearch->SearchOperator = @$filter["z_cno_to"];
		$this->cno_to->AdvancedSearch->SearchCondition = @$filter["v_cno_to"];
		$this->cno_to->AdvancedSearch->SearchValue2 = @$filter["y_cno_to"];
		$this->cno_to->AdvancedSearch->SearchOperator2 = @$filter["w_cno_to"];
		$this->cno_to->AdvancedSearch->save();

		// Field dept_to
		$this->dept_to->AdvancedSearch->SearchValue = @$filter["x_dept_to"];
		$this->dept_to->AdvancedSearch->SearchOperator = @$filter["z_dept_to"];
		$this->dept_to->AdvancedSearch->SearchCondition = @$filter["v_dept_to"];
		$this->dept_to->AdvancedSearch->SearchValue2 = @$filter["y_dept_to"];
		$this->dept_to->AdvancedSearch->SearchOperator2 = @$filter["w_dept_to"];
		$this->dept_to->AdvancedSearch->save();

		// Field ho_by
		$this->ho_by->AdvancedSearch->SearchValue = @$filter["x_ho_by"];
		$this->ho_by->AdvancedSearch->SearchOperator = @$filter["z_ho_by"];
		$this->ho_by->AdvancedSearch->SearchCondition = @$filter["v_ho_by"];
		$this->ho_by->AdvancedSearch->SearchValue2 = @$filter["y_ho_by"];
		$this->ho_by->AdvancedSearch->SearchOperator2 = @$filter["w_ho_by"];
		$this->ho_by->AdvancedSearch->save();

		// Field cno_by
		$this->cno_by->AdvancedSearch->SearchValue = @$filter["x_cno_by"];
		$this->cno_by->AdvancedSearch->SearchOperator = @$filter["z_cno_by"];
		$this->cno_by->AdvancedSearch->SearchCondition = @$filter["v_cno_by"];
		$this->cno_by->AdvancedSearch->SearchValue2 = @$filter["y_cno_by"];
		$this->cno_by->AdvancedSearch->SearchOperator2 = @$filter["w_cno_by"];
		$this->cno_by->AdvancedSearch->save();

		// Field dept_by
		$this->dept_by->AdvancedSearch->SearchValue = @$filter["x_dept_by"];
		$this->dept_by->AdvancedSearch->SearchOperator = @$filter["z_dept_by"];
		$this->dept_by->AdvancedSearch->SearchCondition = @$filter["v_dept_by"];
		$this->dept_by->AdvancedSearch->SearchValue2 = @$filter["y_dept_by"];
		$this->dept_by->AdvancedSearch->SearchOperator2 = @$filter["w_dept_by"];
		$this->dept_by->AdvancedSearch->save();

		// Field sign1
		$this->sign1->AdvancedSearch->SearchValue = @$filter["x_sign1"];
		$this->sign1->AdvancedSearch->SearchOperator = @$filter["z_sign1"];
		$this->sign1->AdvancedSearch->SearchCondition = @$filter["v_sign1"];
		$this->sign1->AdvancedSearch->SearchValue2 = @$filter["y_sign1"];
		$this->sign1->AdvancedSearch->SearchOperator2 = @$filter["w_sign1"];
		$this->sign1->AdvancedSearch->save();

		// Field sign2
		$this->sign2->AdvancedSearch->SearchValue = @$filter["x_sign2"];
		$this->sign2->AdvancedSearch->SearchOperator = @$filter["z_sign2"];
		$this->sign2->AdvancedSearch->SearchCondition = @$filter["v_sign2"];
		$this->sign2->AdvancedSearch->SearchValue2 = @$filter["y_sign2"];
		$this->sign2->AdvancedSearch->SearchOperator2 = @$filter["w_sign2"];
		$this->sign2->AdvancedSearch->save();

		// Field sign3
		$this->sign3->AdvancedSearch->SearchValue = @$filter["x_sign3"];
		$this->sign3->AdvancedSearch->SearchOperator = @$filter["z_sign3"];
		$this->sign3->AdvancedSearch->SearchCondition = @$filter["v_sign3"];
		$this->sign3->AdvancedSearch->SearchValue2 = @$filter["y_sign3"];
		$this->sign3->AdvancedSearch->SearchOperator2 = @$filter["w_sign3"];
		$this->sign3->AdvancedSearch->save();

		// Field sign4
		$this->sign4->AdvancedSearch->SearchValue = @$filter["x_sign4"];
		$this->sign4->AdvancedSearch->SearchOperator = @$filter["z_sign4"];
		$this->sign4->AdvancedSearch->SearchCondition = @$filter["v_sign4"];
		$this->sign4->AdvancedSearch->SearchValue2 = @$filter["y_sign4"];
		$this->sign4->AdvancedSearch->SearchOperator2 = @$filter["w_sign4"];
		$this->sign4->AdvancedSearch->save();
	}

	// Advanced search WHERE clause based on QueryString
	protected function advancedSearchWhere($default = FALSE)
	{
		global $Security;
		$where = "";
		if (!$Security->canSearch())
			return "";
		$this->buildSearchSql($where, $this->tr_no, $default, FALSE); // tr_no
		$this->buildSearchSql($where, $this->tr_date, $default, FALSE); // tr_date
		$this->buildSearchSql($where, $this->ho_to, $default, FALSE); // ho_to
		$this->buildSearchSql($where, $this->cno_to, $default, FALSE); // cno_to
		$this->buildSearchSql($where, $this->dept_to, $default, FALSE); // dept_to
		$this->buildSearchSql($where, $this->ho_by, $default, FALSE); // ho_by
		$this->buildSearchSql($where, $this->cno_by, $default, FALSE); // cno_by
		$this->buildSearchSql($where, $this->dept_by, $default, FALSE); // dept_by
		$this->buildSearchSql($where, $this->sign1, $default, FALSE); // sign1
		$this->buildSearchSql($where, $this->sign2, $default, FALSE); // sign2
		$this->buildSearchSql($where, $this->sign3, $default, FALSE); // sign3
		$this->buildSearchSql($where, $this->sign4, $default, FALSE); // sign4

		// Set up search parm
		if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->tr_no->AdvancedSearch->save(); // tr_no
			$this->tr_date->AdvancedSearch->save(); // tr_date
			$this->ho_to->AdvancedSearch->save(); // ho_to
			$this->cno_to->AdvancedSearch->save(); // cno_to
			$this->dept_to->AdvancedSearch->save(); // dept_to
			$this->ho_by->AdvancedSearch->save(); // ho_by
			$this->cno_by->AdvancedSearch->save(); // cno_by
			$this->dept_by->AdvancedSearch->save(); // dept_by
			$this->sign1->AdvancedSearch->save(); // sign1
			$this->sign2->AdvancedSearch->save(); // sign2
			$this->sign3->AdvancedSearch->save(); // sign3
			$this->sign4->AdvancedSearch->save(); // sign4
		}
		return $where;
	}

	// Build search SQL
	protected function buildSearchSql(&$where, &$fld, $default, $multiValue)
	{
		$fldParm = $fld->Param;
		$fldVal = ($default) ? $fld->AdvancedSearch->SearchValueDefault : $fld->AdvancedSearch->SearchValue;
		$fldOpr = ($default) ? $fld->AdvancedSearch->SearchOperatorDefault : $fld->AdvancedSearch->SearchOperator;
		$fldCond = ($default) ? $fld->AdvancedSearch->SearchConditionDefault : $fld->AdvancedSearch->SearchCondition;
		$fldVal2 = ($default) ? $fld->AdvancedSearch->SearchValue2Default : $fld->AdvancedSearch->SearchValue2;
		$fldOpr2 = ($default) ? $fld->AdvancedSearch->SearchOperator2Default : $fld->AdvancedSearch->SearchOperator2;
		$wrk = "";
		if (is_array($fldVal))
			$fldVal = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $fldVal);
		if (is_array($fldVal2))
			$fldVal2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $fldVal2);
		$fldOpr = strtoupper(trim($fldOpr));
		if ($fldOpr == "")
			$fldOpr = "=";
		$fldOpr2 = strtoupper(trim($fldOpr2));
		if ($fldOpr2 == "")
			$fldOpr2 = "=";
		if (Config("SEARCH_MULTI_VALUE_OPTION") == 1 || !IsMultiSearchOperator($fldOpr))
			$multiValue = FALSE;
		if ($multiValue) {
			$wrk1 = ($fldVal != "") ? GetMultiSearchSql($fld, $fldOpr, $fldVal, $this->Dbid) : ""; // Field value 1
			$wrk2 = ($fldVal2 != "") ? GetMultiSearchSql($fld, $fldOpr2, $fldVal2, $this->Dbid) : ""; // Field value 2
			$wrk = $wrk1; // Build final SQL
			if ($wrk2 != "")
				$wrk = ($wrk != "") ? "($wrk) $fldCond ($wrk2)" : $wrk2;
		} else {
			$fldVal = $this->convertSearchValue($fld, $fldVal);
			$fldVal2 = $this->convertSearchValue($fld, $fldVal2);
			$wrk = GetSearchSql($fld, $fldVal, $fldOpr, $fldCond, $fldVal2, $fldOpr2, $this->Dbid);
		}
		AddFilter($where, $wrk);
	}

	// Convert search value
	protected function convertSearchValue(&$fld, $fldVal)
	{
		if ($fldVal == Config("NULL_VALUE") || $fldVal == Config("NOT_NULL_VALUE"))
			return $fldVal;
		$value = $fldVal;
		if ($fld->isBoolean()) {
			if ($fldVal != "")
				$value = (SameText($fldVal, "1") || SameText($fldVal, "y") || SameText($fldVal, "t")) ? $fld->TrueValue : $fld->FalseValue;
		} elseif ($fld->DataType == DATATYPE_DATE || $fld->DataType == DATATYPE_TIME) {
			if ($fldVal != "")
				$value = UnFormatDateTime($fldVal, $fld->DateTimeFormat);
		}
		return $value;
	}

	// Check if search parm exists
	protected function checkSearchParms()
	{
		if ($this->tr_no->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->tr_date->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ho_to->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->cno_to->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->dept_to->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ho_by->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->cno_by->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->dept_by->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->sign1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->sign2->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->sign3->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->sign4->AdvancedSearch->issetSession())
			return TRUE;
		return FALSE;
	}

	// Clear all search parameters
	protected function resetSearchParms()
	{

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$this->setSearchWhere($this->SearchWhere);

		// Clear advanced search parameters
		$this->resetAdvancedSearchParms();
	}

	// Load advanced search default values
	protected function loadAdvancedSearchDefault()
	{
		return FALSE;
	}

	// Clear all advanced search parameters
	protected function resetAdvancedSearchParms()
	{
		$this->tr_no->AdvancedSearch->unsetSession();
		$this->tr_date->AdvancedSearch->unsetSession();
		$this->ho_to->AdvancedSearch->unsetSession();
		$this->cno_to->AdvancedSearch->unsetSession();
		$this->dept_to->AdvancedSearch->unsetSession();
		$this->ho_by->AdvancedSearch->unsetSession();
		$this->cno_by->AdvancedSearch->unsetSession();
		$this->dept_by->AdvancedSearch->unsetSession();
		$this->sign1->AdvancedSearch->unsetSession();
		$this->sign2->AdvancedSearch->unsetSession();
		$this->sign3->AdvancedSearch->unsetSession();
		$this->sign4->AdvancedSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore advanced search values
		$this->tr_no->AdvancedSearch->load();
		$this->tr_date->AdvancedSearch->load();
		$this->ho_to->AdvancedSearch->load();
		$this->cno_to->AdvancedSearch->load();
		$this->dept_to->AdvancedSearch->load();
		$this->ho_by->AdvancedSearch->load();
		$this->cno_by->AdvancedSearch->load();
		$this->dept_by->AdvancedSearch->load();
		$this->sign1->AdvancedSearch->load();
		$this->sign2->AdvancedSearch->load();
		$this->sign3->AdvancedSearch->load();
		$this->sign4->AdvancedSearch->load();
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for Ctrl pressed
		$ctrl = Get("ctrl") !== NULL;

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->updateSort($this->tr_no, $ctrl); // tr_no
			$this->updateSort($this->tr_date, $ctrl); // tr_date
			$this->updateSort($this->ho_to, $ctrl); // ho_to
			$this->updateSort($this->cno_to, $ctrl); // cno_to
			$this->updateSort($this->dept_to, $ctrl); // dept_to
			$this->updateSort($this->ho_by, $ctrl); // ho_by
			$this->updateSort($this->cno_by, $ctrl); // cno_by
			$this->updateSort($this->dept_by, $ctrl); // dept_by
			$this->updateSort($this->sign1, $ctrl); // sign1
			$this->updateSort($this->sign2, $ctrl); // sign2
			$this->updateSort($this->sign3, $ctrl); // sign3
			$this->updateSort($this->sign4, $ctrl); // sign4
			$this->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	protected function loadSortOrder()
	{
		$orderBy = $this->getSessionOrderBy(); // Get ORDER BY from Session
		if ($orderBy == "") {
			if ($this->getSqlOrderBy() != "") {
				$orderBy = $this->getSqlOrderBy();
				$this->setSessionOrderBy($orderBy);
			}
		}
	}

	// Reset command
	// - cmd=reset (Reset search parameters)
	// - cmd=resetall (Reset search and master/detail parameters)
	// - cmd=resetsort (Reset sort parameters)

	protected function resetCmd()
	{

		// Check if reset command
		if (StartsString("reset", $this->Command)) {

			// Reset search criteria
			if ($this->Command == "reset" || $this->Command == "resetall")
				$this->resetSearchParms();

			// Reset sorting order
			if ($this->Command == "resetsort") {
				$orderBy = "";
				$this->setSessionOrderBy($orderBy);
				$this->tr_no->setSort("");
				$this->tr_date->setSort("");
				$this->ho_to->setSort("");
				$this->cno_to->setSort("");
				$this->dept_to->setSort("");
				$this->ho_by->setSort("");
				$this->cno_by->setSort("");
				$this->dept_by->setSort("");
				$this->sign1->setSort("");
				$this->sign2->setSort("");
				$this->sign3->setSort("");
				$this->sign4->setSort("");
			}

			// Reset start position
			$this->StartRecord = 1;
			$this->setStartRecordNumber($this->StartRecord);
		}
	}

	// Set up list options
	protected function setupListOptions()
	{
		global $Security, $Language;

		// "griddelete"
		if ($this->AllowAddDeleteRow) {
			$item = &$this->ListOptions->add("griddelete");
			$item->CssClass = "text-nowrap";
			$item->OnLeft = TRUE;
			$item->Visible = FALSE; // Default hidden
		}

		// Add group option item
		$item = &$this->ListOptions->add($this->ListOptions->GroupOptionName);
		$item->Body = "";
		$item->OnLeft = TRUE;
		$item->Visible = FALSE;

		// "view"
		$item = &$this->ListOptions->add("view");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->canView();
		$item->OnLeft = TRUE;

		// "edit"
		$item = &$this->ListOptions->add("edit");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->canEdit();
		$item->OnLeft = TRUE;

		// "copy"
		$item = &$this->ListOptions->add("copy");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->canAdd();
		$item->OnLeft = TRUE;

		// "delete"
		$item = &$this->ListOptions->add("delete");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->canDelete();
		$item->OnLeft = TRUE;

		// "detail_t102_ho_detail"
		$item = &$this->ListOptions->add("detail_t102_ho_detail");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->allowList(CurrentProjectID() . 't102_ho_detail') && !$this->ShowMultipleDetails;
		$item->OnLeft = TRUE;
		$item->ShowInButtonGroup = FALSE;
		if (!isset($GLOBALS["t102_ho_detail_grid"]))
			$GLOBALS["t102_ho_detail_grid"] = new t102_ho_detail_grid();

		// Multiple details
		if ($this->ShowMultipleDetails) {
			$item = &$this->ListOptions->add("details");
			$item->CssClass = "text-nowrap";
			$item->Visible = $this->ShowMultipleDetails;
			$item->OnLeft = TRUE;
			$item->ShowInButtonGroup = FALSE;
		}

		// Set up detail pages
		$pages = new SubPages();
		$pages->add("t102_ho_detail");
		$this->DetailPages = $pages;

		// List actions
		$item = &$this->ListOptions->add("listactions");
		$item->CssClass = "text-nowrap";
		$item->OnLeft = TRUE;
		$item->Visible = FALSE;
		$item->ShowInButtonGroup = FALSE;
		$item->ShowInDropDown = FALSE;

		// "checkbox"
		$item = &$this->ListOptions->add("checkbox");
		$item->Visible = FALSE;
		$item->OnLeft = TRUE;
		$item->Header = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" name=\"key\" id=\"key\" class=\"custom-control-input\" onclick=\"ew.selectAllKey(this);\"><label class=\"custom-control-label\" for=\"key\"></label></div>";
		$item->moveTo(0);
		$item->ShowInDropDown = FALSE;
		$item->ShowInButtonGroup = FALSE;

		// "sequence"
		$item = &$this->ListOptions->add("sequence");
		$item->CssClass = "text-nowrap";
		$item->Visible = TRUE;
		$item->OnLeft = TRUE; // Always on left
		$item->ShowInDropDown = FALSE;
		$item->ShowInButtonGroup = FALSE;

		// Drop down button for ListOptions
		$this->ListOptions->UseDropDownButton = FALSE;
		$this->ListOptions->DropDownButtonPhrase = $Language->phrase("ButtonListOptions");
		$this->ListOptions->UseButtonGroup = FALSE;
		if ($this->ListOptions->UseButtonGroup && IsMobile())
			$this->ListOptions->UseDropDownButton = TRUE;

		//$this->ListOptions->ButtonClass = ""; // Class for button group
		// Call ListOptions_Load event

		$this->ListOptions_Load();
		$this->setupListOptionsExt();
		$item = $this->ListOptions[$this->ListOptions->GroupOptionName];
		$item->Visible = $this->ListOptions->groupOptionVisible();
	}

	// Render list options
	public function renderListOptions()
	{
		global $Security, $Language, $CurrentForm;
		$this->ListOptions->loadDefault();

		// Call ListOptions_Rendering event
		$this->ListOptions_Rendering();

		// Set up row action and key
		if (is_numeric($this->RowIndex) && $this->CurrentMode != "view") {
			$CurrentForm->Index = $this->RowIndex;
			$actionName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormActionName);
			$oldKeyName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormOldKeyName);
			$keyName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormKeyName);
			$blankRowName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormBlankRowName);
			if ($this->RowAction != "")
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $actionName . "\" id=\"" . $actionName . "\" value=\"" . $this->RowAction . "\">";
			if ($this->RowAction == "delete") {
				$rowkey = $CurrentForm->getValue($this->FormKeyName);
				$this->setupKeyValues($rowkey);

				// Reload hidden key for delete
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $keyName . "\" id=\"" . $keyName . "\" value=\"" . HtmlEncode($rowkey) . "\">";
			}
			if ($this->RowAction == "insert" && $this->isConfirm() && $this->emptyRow())
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $blankRowName . "\" id=\"" . $blankRowName . "\" value=\"1\">";
		}

		// "delete"
		if ($this->AllowAddDeleteRow) {
			if ($this->isGridAdd() || $this->isGridEdit()) {
				$options = &$this->ListOptions;
				$options->UseButtonGroup = TRUE; // Use button group for grid delete button
				$opt = $options["griddelete"];
				if (!$Security->canDelete() && is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
					$opt->Body = "&nbsp;";
				} else {
					$opt->Body = "<a class=\"ew-grid-link ew-grid-delete\" title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" onclick=\"return ew.deleteGridRow(this, " . $this->RowIndex . ");\">" . $Language->phrase("DeleteLink") . "</a>";
				}
			}
		}

		// "sequence"
		$opt = $this->ListOptions["sequence"];
		$opt->Body = FormatSequenceNumber($this->RecordCount);

		// "copy"
		$opt = $this->ListOptions["copy"];
		if ($this->isInlineAddRow() || $this->isInlineCopyRow()) { // Inline Add/Copy
			$this->ListOptions->CustomItem = "copy"; // Show copy column only
			$cancelurl = $this->addMasterUrl($this->pageUrl() . "action=cancel");
			$opt->Body = "<div" . (($opt->OnLeft) ? " class=\"text-right\"" : "") . ">" .
				"<a class=\"ew-grid-link ew-inline-insert\" title=\"" . HtmlTitle($Language->phrase("InsertLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("InsertLink")) . "\" href=\"#\" onclick=\"return ew.forms(this).submit('" . $this->pageName() . "');\">" . $Language->phrase("InsertLink") . "</a>&nbsp;" .
				"<a class=\"ew-grid-link ew-inline-cancel\" title=\"" . HtmlTitle($Language->phrase("CancelLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("CancelLink")) . "\" href=\"" . $cancelurl . "\">" . $Language->phrase("CancelLink") . "</a>" .
				"<input type=\"hidden\" name=\"action\" id=\"action\" value=\"insert\"></div>";
			return;
		}

		// "edit"
		$opt = $this->ListOptions["edit"];
		if ($this->isInlineEditRow()) { // Inline-Edit
			$this->ListOptions->CustomItem = "edit"; // Show edit column only
			$cancelurl = $this->addMasterUrl($this->pageUrl() . "action=cancel");
				$opt->Body = "<div" . (($opt->OnLeft) ? " class=\"text-right\"" : "") . ">" .
					"<a class=\"ew-grid-link ew-inline-update\" title=\"" . HtmlTitle($Language->phrase("UpdateLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("UpdateLink")) . "\" href=\"#\" onclick=\"return ew.forms(this).submit('" . UrlAddHash($this->pageName(), "r" . $this->RowCount . "_" . $this->TableVar) . "');\">" . $Language->phrase("UpdateLink") . "</a>&nbsp;" .
					"<a class=\"ew-grid-link ew-inline-cancel\" title=\"" . HtmlTitle($Language->phrase("CancelLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("CancelLink")) . "\" href=\"" . $cancelurl . "\">" . $Language->phrase("CancelLink") . "</a>" .
					"<input type=\"hidden\" name=\"action\" id=\"action\" value=\"update\"></div>";
			$opt->Body .= "<input type=\"hidden\" name=\"k" . $this->RowIndex . "_key\" id=\"k" . $this->RowIndex . "_key\" value=\"" . HtmlEncode($this->id->CurrentValue) . "\">";
			return;
		}

		// "view"
		$opt = $this->ListOptions["view"];
		$viewcaption = HtmlTitle($Language->phrase("ViewLink"));
		if ($Security->canView()) {
			if (IsMobile())
				$opt->Body = "<a class=\"ew-row-link ew-view\" title=\"" . $viewcaption . "\" data-caption=\"" . $viewcaption . "\" href=\"" . HtmlEncode($this->ViewUrl) . "\">" . $Language->phrase("ViewLink") . "</a>";
			else
				$opt->Body = "<a class=\"ew-row-link ew-view\" title=\"" . $viewcaption . "\" data-table=\"t101_ho_head\" data-caption=\"" . $viewcaption . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,url:'" . HtmlEncode($this->ViewUrl) . "',btn:null});\">" . $Language->phrase("ViewLink") . "</a>";
		} else {
			$opt->Body = "";
		}

		// "edit"
		$opt = $this->ListOptions["edit"];
		$editcaption = HtmlTitle($Language->phrase("EditLink"));
		if ($Security->canEdit()) {
			if (IsMobile())
				$opt->Body = "<a class=\"ew-row-link ew-edit\" title=\"" . $editcaption . "\" data-caption=\"" . $editcaption . "\" href=\"" . HtmlEncode($this->EditUrl) . "\">" . $Language->phrase("EditLink") . "</a>";
			else
				$opt->Body = "<a class=\"ew-row-link ew-edit\" title=\"" . $editcaption . "\" data-table=\"t101_ho_head\" data-caption=\"" . $editcaption . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'SaveBtn',url:'" . HtmlEncode($this->EditUrl) . "'});\">" . $Language->phrase("EditLink") . "</a>";
			$opt->Body .= "<a class=\"ew-row-link ew-inline-edit\" title=\"" . HtmlTitle($Language->phrase("InlineEditLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("InlineEditLink")) . "\" href=\"" . HtmlEncode(UrlAddHash($this->InlineEditUrl, "r" . $this->RowCount . "_" . $this->TableVar)) . "\">" . $Language->phrase("InlineEditLink") . "</a>";
		} else {
			$opt->Body = "";
		}

		// "copy"
		$opt = $this->ListOptions["copy"];
		$copycaption = HtmlTitle($Language->phrase("CopyLink"));
		if ($Security->canAdd()) {
			if (IsMobile())
				$opt->Body = "<a class=\"ew-row-link ew-copy\" title=\"" . $copycaption . "\" data-caption=\"" . $copycaption . "\" href=\"" . HtmlEncode($this->CopyUrl) . "\">" . $Language->phrase("CopyLink") . "</a>";
			else
				$opt->Body = "<a class=\"ew-row-link ew-copy\" title=\"" . $copycaption . "\" data-table=\"t101_ho_head\" data-caption=\"" . $copycaption . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'AddBtn',url:'" . HtmlEncode($this->CopyUrl) . "'});\">" . $Language->phrase("CopyLink") . "</a>";
			$opt->Body .= "<a class=\"ew-row-link ew-inline-copy\" title=\"" . HtmlTitle($Language->phrase("InlineCopyLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("InlineCopyLink")) . "\" href=\"" . HtmlEncode($this->InlineCopyUrl) . "\">" . $Language->phrase("InlineCopyLink") . "</a>";
		} else {
			$opt->Body = "";
		}

		// "delete"
		$opt = $this->ListOptions["delete"];
		if ($Security->canDelete())
			$opt->Body = "<a class=\"ew-row-link ew-delete\"" . " onclick=\"return ew.confirmDelete(this);\"" . " title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" href=\"" . HtmlEncode($this->DeleteUrl) . "\">" . $Language->phrase("DeleteLink") . "</a>";
		else
			$opt->Body = "";

		// Set up list action buttons
		$opt = $this->ListOptions["listactions"];
		if ($opt && !$this->isExport() && !$this->CurrentAction) {
			$body = "";
			$links = [];
			foreach ($this->ListActions->Items as $listaction) {
				if ($listaction->Select == ACTION_SINGLE && $listaction->Allow) {
					$action = $listaction->Action;
					$caption = $listaction->Caption;
					$icon = ($listaction->Icon != "") ? "<i class=\"" . HtmlEncode(str_replace(" ew-icon", "", $listaction->Icon)) . "\" data-caption=\"" . HtmlTitle($caption) . "\"></i> " : "";
					$links[] = "<li><a class=\"dropdown-item ew-action ew-list-action\" data-action=\"" . HtmlEncode($action) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({key:" . $this->keyToJson(TRUE) . "}," . $listaction->toJson(TRUE) . "));\">" . $icon . $listaction->Caption . "</a></li>";
					if (count($links) == 1) // Single button
						$body = "<a class=\"ew-action ew-list-action\" data-action=\"" . HtmlEncode($action) . "\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({key:" . $this->keyToJson(TRUE) . "}," . $listaction->toJson(TRUE) . "));\">" . $icon . $listaction->Caption . "</a>";
				}
			}
			if (count($links) > 1) { // More than one buttons, use dropdown
				$body = "<button class=\"dropdown-toggle btn btn-default ew-actions\" title=\"" . HtmlTitle($Language->phrase("ListActionButton")) . "\" data-toggle=\"dropdown\">" . $Language->phrase("ListActionButton") . "</button>";
				$content = "";
				foreach ($links as $link)
					$content .= "<li>" . $link . "</li>";
				$body .= "<ul class=\"dropdown-menu" . ($opt->OnLeft ? "" : " dropdown-menu-right") . "\">". $content . "</ul>";
				$body = "<div class=\"btn-group btn-group-sm\">" . $body . "</div>";
			}
			if (count($links) > 0) {
				$opt->Body = $body;
				$opt->Visible = TRUE;
			}
		}
		$detailViewTblVar = "";
		$detailCopyTblVar = "";
		$detailEditTblVar = "";

		// "detail_t102_ho_detail"
		$opt = $this->ListOptions["detail_t102_ho_detail"];
		if ($Security->allowList(CurrentProjectID() . 't102_ho_detail')) {
			$body = $Language->phrase("DetailLink") . $Language->TablePhrase("t102_ho_detail", "TblCaption");
			$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("t102_ho_detaillist.php?" . Config("TABLE_SHOW_MASTER") . "=t101_ho_head&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "") . "\">" . $body . "</a>";
			$links = "";
			if ($GLOBALS["t102_ho_detail_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 't101_ho_head')) {
				$caption = $Language->phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=t102_ho_detail");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailViewTblVar != "")
					$detailViewTblVar .= ",";
				$detailViewTblVar .= "t102_ho_detail";
			}
			if ($GLOBALS["t102_ho_detail_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 't101_ho_head')) {
				$caption = $Language->phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=t102_ho_detail");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailEditTblVar != "")
					$detailEditTblVar .= ",";
				$detailEditTblVar .= "t102_ho_detail";
			}
			if ($GLOBALS["t102_ho_detail_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 't101_ho_head')) {
				$caption = $Language->phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=t102_ho_detail");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailCopyTblVar != "")
					$detailCopyTblVar .= ",";
				$detailCopyTblVar .= "t102_ho_detail";
			}
			if ($links != "") {
				$body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
				$body .= "<ul class=\"dropdown-menu\">". $links . "</ul>";
			}
			$body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
			$opt->Body = $body;
			if ($this->ShowMultipleDetails)
				$opt->Visible = FALSE;
		}
		if ($this->ShowMultipleDetails) {
			$body = "<div class=\"btn-group btn-group-sm ew-btn-group\">";
			$links = "";
			if ($detailViewTblVar != "") {
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailViewLink")) . "\" href=\"" . HtmlEncode($this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=" . $detailViewTblVar)) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailViewLink")) . "</a></li>";
			}
			if ($detailEditTblVar != "") {
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailEditLink")) . "\" href=\"" . HtmlEncode($this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=" . $detailEditTblVar)) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailEditLink")) . "</a></li>";
			}
			if ($detailCopyTblVar != "") {
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailCopyLink")) . "\" href=\"" . HtmlEncode($this->GetCopyUrl(Config("TABLE_SHOW_DETAIL") . "=" . $detailCopyTblVar)) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailCopyLink")) . "</a></li>";
			}
			if ($links != "") {
				$body .= "<button class=\"dropdown-toggle btn btn-default ew-master-detail\" title=\"" . HtmlTitle($Language->phrase("MultipleMasterDetails")) . "\" data-toggle=\"dropdown\">" . $Language->phrase("MultipleMasterDetails") . "</button>";
				$body .= "<ul class=\"dropdown-menu ew-menu\">". $links . "</ul>";
			}
			$body .= "</div>";

			// Multiple details
			$opt = $this->ListOptions["details"];
			$opt->Body = $body;
		}

		// "checkbox"
		$opt = $this->ListOptions["checkbox"];
		$opt->Body = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" id=\"key_m_" . $this->RowCount . "\" name=\"key_m[]\" class=\"custom-control-input ew-multi-select\" value=\"" . HtmlEncode($this->id->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\"><label class=\"custom-control-label\" for=\"key_m_" . $this->RowCount . "\"></label></div>";
		if ($this->isGridEdit() && is_numeric($this->RowIndex)) {
			$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $keyName . "\" id=\"" . $keyName . "\" value=\"" . $this->id->CurrentValue . "\">";
		}
		$this->renderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set up other options
	protected function setupOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
		$option = $options["addedit"];

		// Add
		$item = &$option->add("add");
		$addcaption = HtmlTitle($Language->phrase("AddLink"));
		if (IsMobile())
			$item->Body = "<a class=\"ew-add-edit ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"" . HtmlEncode($this->AddUrl) . "\">" . $Language->phrase("AddLink") . "</a>";
		else
			$item->Body = "<a class=\"ew-add-edit ew-add\" title=\"" . $addcaption . "\" data-table=\"t101_ho_head\" data-caption=\"" . $addcaption . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'AddBtn',url:'" . HtmlEncode($this->AddUrl) . "'});\">" . $Language->phrase("AddLink") . "</a>";
		$item->Visible = $this->AddUrl != "" && $Security->canAdd();

		// Inline Add
		$item = &$option->add("inlineadd");
		$item->Body = "<a class=\"ew-add-edit ew-inline-add\" title=\"" . HtmlTitle($Language->phrase("InlineAddLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("InlineAddLink")) . "\" href=\"" . HtmlEncode($this->InlineAddUrl) . "\">" .$Language->phrase("InlineAddLink") . "</a>";
		$item->Visible = $this->InlineAddUrl != "" && $Security->canAdd();
		$item = &$option->add("gridadd");
		$item->Body = "<a class=\"ew-add-edit ew-grid-add\" title=\"" . HtmlTitle($Language->phrase("GridAddLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridAddLink")) . "\" href=\"" . HtmlEncode($this->GridAddUrl) . "\">" . $Language->phrase("GridAddLink") . "</a>";
		$item->Visible = $this->GridAddUrl != "" && $Security->canAdd();
		$option = $options["detail"];
		$detailTableLink = "";
		$item = &$option->add("detailadd_t102_ho_detail");
		$url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=t102_ho_detail");
		if (!isset($GLOBALS["t102_ho_detail"]))
			$GLOBALS["t102_ho_detail"] = new t102_ho_detail();
		$caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $GLOBALS["t102_ho_detail"]->tableCaption();
		$item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . $caption . "</a>";
		$item->Visible = ($GLOBALS["t102_ho_detail"]->DetailAdd && $Security->allowAdd(CurrentProjectID() . 't101_ho_head') && $Security->canAdd());
		if ($item->Visible) {
			if ($detailTableLink != "")
				$detailTableLink .= ",";
			$detailTableLink .= "t102_ho_detail";
		}

		// Add multiple details
		if ($this->ShowMultipleDetails) {
			$item = &$option->add("detailsadd");
			$url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=" . $detailTableLink);
			$caption = $Language->phrase("AddMasterDetailLink");
			$item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . $caption . "</a>";
			$item->Visible = $detailTableLink != "" && $Security->canAdd();

			// Hide single master/detail items
			$ar = explode(",", $detailTableLink);
			$cnt = count($ar);
			for ($i = 0; $i < $cnt; $i++) {
				if ($item = $option["detailadd_" . $ar[$i]])
					$item->Visible = FALSE;
			}
		}

		// Add grid edit
		$option = $options["addedit"];
		$item = &$option->add("gridedit");
		$item->Body = "<a class=\"ew-add-edit ew-grid-edit\" title=\"" . HtmlTitle($Language->phrase("GridEditLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridEditLink")) . "\" href=\"" . HtmlEncode($this->GridEditUrl) . "\">" . $Language->phrase("GridEditLink") . "</a>";
		$item->Visible = $this->GridEditUrl != "" && $Security->canEdit();
		$option = $options["action"];

		// Set up options default
		foreach ($options as $option) {
			$option->UseDropDownButton = FALSE;
			$option->UseButtonGroup = TRUE;

			//$option->ButtonClass = ""; // Class for button group
			$item = &$option->add($option->GroupOptionName);
			$item->Body = "";
			$item->Visible = FALSE;
		}
		$options["addedit"]->DropDownButtonPhrase = $Language->phrase("ButtonAddEdit");
		$options["detail"]->DropDownButtonPhrase = $Language->phrase("ButtonDetails");
		$options["action"]->DropDownButtonPhrase = $Language->phrase("ButtonActions");

		// Filter button
		$item = &$this->FilterOptions->add("savecurrentfilter");
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"ft101_ho_headlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"ft101_ho_headlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
		$item->Visible = TRUE;
		$this->FilterOptions->UseDropDownButton = TRUE;
		$this->FilterOptions->UseButtonGroup = !$this->FilterOptions->UseDropDownButton;
		$this->FilterOptions->DropDownButtonPhrase = $Language->phrase("Filters");

		// Add group option item
		$item = &$this->FilterOptions->add($this->FilterOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;
	}

	// Render other options
	public function renderOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
		if (!$this->isGridAdd() && !$this->isGridEdit()) { // Not grid add/edit mode
			$option = $options["action"];

			// Set up list action buttons
			foreach ($this->ListActions->Items as $listaction) {
				if ($listaction->Select == ACTION_MULTIPLE) {
					$item = &$option->add("custom_" . $listaction->Action);
					$caption = $listaction->Caption;
					$icon = ($listaction->Icon != "") ? "<i class=\"" . HtmlEncode($listaction->Icon) . "\" data-caption=\"" . HtmlEncode($caption) . "\"></i> " . $caption : $caption;
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({f:document.ft101_ho_headlist}," . $listaction->toJson(TRUE) . "));\">" . $icon . "</a>";
					$item->Visible = $listaction->Allow;
				}
			}

			// Hide grid edit and other options
			if ($this->TotalRecords <= 0) {
				$option = $options["addedit"];
				$item = $option["gridedit"];
				if ($item)
					$item->Visible = FALSE;
				$option = $options["action"];
				$option->hideAllOptions();
			}
		} else { // Grid add/edit mode

			// Hide all options first
			foreach ($options as $option)
				$option->hideAllOptions();

			// Grid-Add
			if ($this->isGridAdd()) {
				if ($this->AllowAddDeleteRow) {

					// Add add blank row
					$option = $options["addedit"];
					$option->UseDropDownButton = FALSE;
					$item = &$option->add("addblankrow");
					$item->Body = "<a class=\"ew-add-edit ew-add-blank-row\" title=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" href=\"#\" onclick=\"return ew.addGridRow(this);\">" . $Language->phrase("AddBlankRow") . "</a>";
					$item->Visible = $Security->canAdd();
				}
				$option = $options["action"];
				$option->UseDropDownButton = FALSE;

				// Add grid insert
				$item = &$option->add("gridinsert");
				$item->Body = "<a class=\"ew-action ew-grid-insert\" title=\"" . HtmlTitle($Language->phrase("GridInsertLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridInsertLink")) . "\" href=\"#\" onclick=\"return ew.forms(this).submit('" . $this->pageName() . "');\">" . $Language->phrase("GridInsertLink") . "</a>";

				// Add grid cancel
				$item = &$option->add("gridcancel");
				$cancelurl = $this->addMasterUrl($this->pageUrl() . "action=cancel");
				$item->Body = "<a class=\"ew-action ew-grid-cancel\" title=\"" . HtmlTitle($Language->phrase("GridCancelLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridCancelLink")) . "\" href=\"" . $cancelurl . "\">" . $Language->phrase("GridCancelLink") . "</a>";
			}

			// Grid-Edit
			if ($this->isGridEdit()) {
				if ($this->AllowAddDeleteRow) {

					// Add add blank row
					$option = $options["addedit"];
					$option->UseDropDownButton = FALSE;
					$item = &$option->add("addblankrow");
					$item->Body = "<a class=\"ew-add-edit ew-add-blank-row\" title=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" href=\"#\" onclick=\"return ew.addGridRow(this);\">" . $Language->phrase("AddBlankRow") . "</a>";
					$item->Visible = $Security->canAdd();
				}
				$option = $options["action"];
				$option->UseDropDownButton = FALSE;
					$item = &$option->add("gridsave");
					$item->Body = "<a class=\"ew-action ew-grid-save\" title=\"" . HtmlTitle($Language->phrase("GridSaveLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridSaveLink")) . "\" href=\"#\" onclick=\"return ew.forms(this).submit('" . $this->pageName() . "');\">" . $Language->phrase("GridSaveLink") . "</a>";
					$item = &$option->add("gridcancel");
					$cancelurl = $this->addMasterUrl($this->pageUrl() . "action=cancel");
					$item->Body = "<a class=\"ew-action ew-grid-cancel\" title=\"" . HtmlTitle($Language->phrase("GridCancelLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridCancelLink")) . "\" href=\"" . $cancelurl . "\">" . $Language->phrase("GridCancelLink") . "</a>";
			}
		}
	}

	// Process list action
	protected function processListAction()
	{
		global $Language, $Security;
		$userlist = "";
		$user = "";
		$filter = $this->getFilterFromRecordKeys();
		$userAction = Post("useraction", "");
		if ($filter != "" && $userAction != "") {

			// Check permission first
			$actionCaption = $userAction;
			if (array_key_exists($userAction, $this->ListActions->Items)) {
				$actionCaption = $this->ListActions[$userAction]->Caption;
				if (!$this->ListActions[$userAction]->Allow) {
					$errmsg = str_replace('%s', $actionCaption, $Language->phrase("CustomActionNotAllowed"));
					if (Post("ajax") == $userAction) // Ajax
						echo "<p class=\"text-danger\">" . $errmsg . "</p>";
					else
						$this->setFailureMessage($errmsg);
					return FALSE;
				}
			}
			$this->CurrentFilter = $filter;
			$sql = $this->getCurrentSql();
			$conn = $this->getConnection();
			$conn->raiseErrorFn = Config("ERROR_FUNC");
			$rs = $conn->execute($sql);
			$conn->raiseErrorFn = "";
			$this->CurrentAction = $userAction;

			// Call row action event
			if ($rs && !$rs->EOF) {
				$conn->beginTrans();
				$this->SelectedCount = $rs->RecordCount();
				$this->SelectedIndex = 0;
				while (!$rs->EOF) {
					$this->SelectedIndex++;
					$row = $rs->fields;
					$processed = $this->Row_CustomAction($userAction, $row);
					if (!$processed)
						break;
					$rs->moveNext();
				}
				if ($processed) {
					$conn->commitTrans(); // Commit the changes
					if ($this->getSuccessMessage() == "" && !ob_get_length()) // No output
						$this->setSuccessMessage(str_replace('%s', $actionCaption, $Language->phrase("CustomActionCompleted"))); // Set up success message
				} else {
					$conn->rollbackTrans(); // Rollback changes

					// Set up error message
					if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {

						// Use the message, do nothing
					} elseif ($this->CancelMessage != "") {
						$this->setFailureMessage($this->CancelMessage);
						$this->CancelMessage = "";
					} else {
						$this->setFailureMessage(str_replace('%s', $actionCaption, $Language->phrase("CustomActionFailed")));
					}
				}
			}
			if ($rs)
				$rs->close();
			$this->CurrentAction = ""; // Clear action
			if (Post("ajax") == $userAction) { // Ajax
				if ($this->getSuccessMessage() != "") {
					echo "<p class=\"text-success\">" . $this->getSuccessMessage() . "</p>";
					$this->clearSuccessMessage(); // Clear message
				}
				if ($this->getFailureMessage() != "") {
					echo "<p class=\"text-danger\">" . $this->getFailureMessage() . "</p>";
					$this->clearFailureMessage(); // Clear message
				}
				return TRUE;
			}
		}
		return FALSE; // Not ajax request
	}

	// Set up list options (extended codes)
	protected function setupListOptionsExt()
	{
	}

	// Render list options (extended codes)
	protected function renderListOptionsExt()
	{
	}

	// Load default values
	protected function loadDefaultValues()
	{
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->tr_no->CurrentValue = NULL;
		$this->tr_no->OldValue = $this->tr_no->CurrentValue;
		$this->tr_date->CurrentValue = NULL;
		$this->tr_date->OldValue = $this->tr_date->CurrentValue;
		$this->ho_to->CurrentValue = NULL;
		$this->ho_to->OldValue = $this->ho_to->CurrentValue;
		$this->cno_to->CurrentValue = NULL;
		$this->cno_to->OldValue = $this->cno_to->CurrentValue;
		$this->dept_to->CurrentValue = NULL;
		$this->dept_to->OldValue = $this->dept_to->CurrentValue;
		$this->ho_by->CurrentValue = NULL;
		$this->ho_by->OldValue = $this->ho_by->CurrentValue;
		$this->cno_by->CurrentValue = NULL;
		$this->cno_by->OldValue = $this->cno_by->CurrentValue;
		$this->dept_by->CurrentValue = NULL;
		$this->dept_by->OldValue = $this->dept_by->CurrentValue;
		$this->sign1->CurrentValue = NULL;
		$this->sign1->OldValue = $this->sign1->CurrentValue;
		$this->sign2->CurrentValue = NULL;
		$this->sign2->OldValue = $this->sign2->CurrentValue;
		$this->sign3->CurrentValue = NULL;
		$this->sign3->OldValue = $this->sign3->CurrentValue;
		$this->sign4->CurrentValue = NULL;
		$this->sign4->OldValue = $this->sign4->CurrentValue;
	}

	// Load search values for validation
	protected function loadSearchValues()
	{

		// Load search values
		$got = FALSE;

		// tr_no
		if (!$this->isAddOrEdit() && $this->tr_no->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->tr_no->AdvancedSearch->SearchValue != "" || $this->tr_no->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// tr_date
		if (!$this->isAddOrEdit() && $this->tr_date->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->tr_date->AdvancedSearch->SearchValue != "" || $this->tr_date->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// ho_to
		if (!$this->isAddOrEdit() && $this->ho_to->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->ho_to->AdvancedSearch->SearchValue != "" || $this->ho_to->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// cno_to
		if (!$this->isAddOrEdit() && $this->cno_to->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->cno_to->AdvancedSearch->SearchValue != "" || $this->cno_to->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// dept_to
		if (!$this->isAddOrEdit() && $this->dept_to->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->dept_to->AdvancedSearch->SearchValue != "" || $this->dept_to->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// ho_by
		if (!$this->isAddOrEdit() && $this->ho_by->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->ho_by->AdvancedSearch->SearchValue != "" || $this->ho_by->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// cno_by
		if (!$this->isAddOrEdit() && $this->cno_by->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->cno_by->AdvancedSearch->SearchValue != "" || $this->cno_by->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// dept_by
		if (!$this->isAddOrEdit() && $this->dept_by->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->dept_by->AdvancedSearch->SearchValue != "" || $this->dept_by->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// sign1
		if (!$this->isAddOrEdit() && $this->sign1->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->sign1->AdvancedSearch->SearchValue != "" || $this->sign1->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// sign2
		if (!$this->isAddOrEdit() && $this->sign2->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->sign2->AdvancedSearch->SearchValue != "" || $this->sign2->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// sign3
		if (!$this->isAddOrEdit() && $this->sign3->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->sign3->AdvancedSearch->SearchValue != "" || $this->sign3->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// sign4
		if (!$this->isAddOrEdit() && $this->sign4->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->sign4->AdvancedSearch->SearchValue != "" || $this->sign4->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}
		return $got;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'tr_no' first before field var 'x_tr_no'
		$val = $CurrentForm->hasValue("tr_no") ? $CurrentForm->getValue("tr_no") : $CurrentForm->getValue("x_tr_no");
		if (!$this->tr_no->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->tr_no->Visible = FALSE; // Disable update for API request
			else
				$this->tr_no->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_tr_no"))
			$this->tr_no->setOldValue($CurrentForm->getValue("o_tr_no"));

		// Check field name 'tr_date' first before field var 'x_tr_date'
		$val = $CurrentForm->hasValue("tr_date") ? $CurrentForm->getValue("tr_date") : $CurrentForm->getValue("x_tr_date");
		if (!$this->tr_date->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->tr_date->Visible = FALSE; // Disable update for API request
			else
				$this->tr_date->setFormValue($val);
			$this->tr_date->CurrentValue = UnFormatDateTime($this->tr_date->CurrentValue, 7);
		}
		if ($CurrentForm->hasValue("o_tr_date"))
			$this->tr_date->setOldValue($CurrentForm->getValue("o_tr_date"));

		// Check field name 'ho_to' first before field var 'x_ho_to'
		$val = $CurrentForm->hasValue("ho_to") ? $CurrentForm->getValue("ho_to") : $CurrentForm->getValue("x_ho_to");
		if (!$this->ho_to->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ho_to->Visible = FALSE; // Disable update for API request
			else
				$this->ho_to->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ho_to"))
			$this->ho_to->setOldValue($CurrentForm->getValue("o_ho_to"));

		// Check field name 'cno_to' first before field var 'x_cno_to'
		$val = $CurrentForm->hasValue("cno_to") ? $CurrentForm->getValue("cno_to") : $CurrentForm->getValue("x_cno_to");
		if (!$this->cno_to->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->cno_to->Visible = FALSE; // Disable update for API request
			else
				$this->cno_to->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_cno_to"))
			$this->cno_to->setOldValue($CurrentForm->getValue("o_cno_to"));

		// Check field name 'dept_to' first before field var 'x_dept_to'
		$val = $CurrentForm->hasValue("dept_to") ? $CurrentForm->getValue("dept_to") : $CurrentForm->getValue("x_dept_to");
		if (!$this->dept_to->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->dept_to->Visible = FALSE; // Disable update for API request
			else
				$this->dept_to->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_dept_to"))
			$this->dept_to->setOldValue($CurrentForm->getValue("o_dept_to"));

		// Check field name 'ho_by' first before field var 'x_ho_by'
		$val = $CurrentForm->hasValue("ho_by") ? $CurrentForm->getValue("ho_by") : $CurrentForm->getValue("x_ho_by");
		if (!$this->ho_by->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ho_by->Visible = FALSE; // Disable update for API request
			else
				$this->ho_by->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ho_by"))
			$this->ho_by->setOldValue($CurrentForm->getValue("o_ho_by"));

		// Check field name 'cno_by' first before field var 'x_cno_by'
		$val = $CurrentForm->hasValue("cno_by") ? $CurrentForm->getValue("cno_by") : $CurrentForm->getValue("x_cno_by");
		if (!$this->cno_by->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->cno_by->Visible = FALSE; // Disable update for API request
			else
				$this->cno_by->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_cno_by"))
			$this->cno_by->setOldValue($CurrentForm->getValue("o_cno_by"));

		// Check field name 'dept_by' first before field var 'x_dept_by'
		$val = $CurrentForm->hasValue("dept_by") ? $CurrentForm->getValue("dept_by") : $CurrentForm->getValue("x_dept_by");
		if (!$this->dept_by->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->dept_by->Visible = FALSE; // Disable update for API request
			else
				$this->dept_by->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_dept_by"))
			$this->dept_by->setOldValue($CurrentForm->getValue("o_dept_by"));

		// Check field name 'sign1' first before field var 'x_sign1'
		$val = $CurrentForm->hasValue("sign1") ? $CurrentForm->getValue("sign1") : $CurrentForm->getValue("x_sign1");
		if (!$this->sign1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->sign1->Visible = FALSE; // Disable update for API request
			else
				$this->sign1->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_sign1"))
			$this->sign1->setOldValue($CurrentForm->getValue("o_sign1"));

		// Check field name 'sign2' first before field var 'x_sign2'
		$val = $CurrentForm->hasValue("sign2") ? $CurrentForm->getValue("sign2") : $CurrentForm->getValue("x_sign2");
		if (!$this->sign2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->sign2->Visible = FALSE; // Disable update for API request
			else
				$this->sign2->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_sign2"))
			$this->sign2->setOldValue($CurrentForm->getValue("o_sign2"));

		// Check field name 'sign3' first before field var 'x_sign3'
		$val = $CurrentForm->hasValue("sign3") ? $CurrentForm->getValue("sign3") : $CurrentForm->getValue("x_sign3");
		if (!$this->sign3->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->sign3->Visible = FALSE; // Disable update for API request
			else
				$this->sign3->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_sign3"))
			$this->sign3->setOldValue($CurrentForm->getValue("o_sign3"));

		// Check field name 'sign4' first before field var 'x_sign4'
		$val = $CurrentForm->hasValue("sign4") ? $CurrentForm->getValue("sign4") : $CurrentForm->getValue("x_sign4");
		if (!$this->sign4->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->sign4->Visible = FALSE; // Disable update for API request
			else
				$this->sign4->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_sign4"))
			$this->sign4->setOldValue($CurrentForm->getValue("o_sign4"));

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey && !$this->isGridAdd() && !$this->isAdd())
			$this->id->setFormValue($val);
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		if (!$this->isGridAdd() && !$this->isAdd())
			$this->id->CurrentValue = $this->id->FormValue;
		$this->tr_no->CurrentValue = $this->tr_no->FormValue;
		$this->tr_date->CurrentValue = $this->tr_date->FormValue;
		$this->tr_date->CurrentValue = UnFormatDateTime($this->tr_date->CurrentValue, 7);
		$this->ho_to->CurrentValue = $this->ho_to->FormValue;
		$this->cno_to->CurrentValue = $this->cno_to->FormValue;
		$this->dept_to->CurrentValue = $this->dept_to->FormValue;
		$this->ho_by->CurrentValue = $this->ho_by->FormValue;
		$this->cno_by->CurrentValue = $this->cno_by->FormValue;
		$this->dept_by->CurrentValue = $this->dept_by->FormValue;
		$this->sign1->CurrentValue = $this->sign1->FormValue;
		$this->sign2->CurrentValue = $this->sign2->FormValue;
		$this->sign3->CurrentValue = $this->sign3->FormValue;
		$this->sign4->CurrentValue = $this->sign4->FormValue;
	}

	// Load recordset
	public function loadRecordset($offset = -1, $rowcnt = -1)
	{

		// Load List page SQL
		$sql = $this->getListSql();
		$conn = $this->getConnection();

		// Load recordset
		$dbtype = GetConnectionType($this->Dbid);
		if ($this->UseSelectLimit) {
			$conn->raiseErrorFn = Config("ERROR_FUNC");
			if ($dbtype == "MSSQL") {
				$rs = $conn->selectLimit($sql, $rowcnt, $offset, ["_hasOrderBy" => trim($this->getOrderBy()) || trim($this->getSessionOrderBy())]);
			} else {
				$rs = $conn->selectLimit($sql, $rowcnt, $offset);
			}
			$conn->raiseErrorFn = "";
		} else {
			$rs = LoadRecordset($sql, $conn);
		}

		// Call Recordset Selected event
		$this->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	public function loadRow()
	{
		global $Security, $Language;
		$filter = $this->getRecordFilter();

		// Call Row Selecting event
		$this->Row_Selecting($filter);

		// Load SQL based on filter
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = $this->getConnection();
		$res = FALSE;
		$rs = LoadRecordset($sql, $conn);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->loadRowValues($rs); // Load row values
			if (!$this->EventCancelled)
				$this->HashValue = $this->getRowHash($rs); // Get hash value for record
			$rs->close();
		}
		return $res;
	}

	// Load row values from recordset
	public function loadRowValues($rs = NULL)
	{
		if ($rs && !$rs->EOF)
			$row = $rs->fields;
		else
			$row = $this->newRow();

		// Call Row Selected event
		$this->Row_Selected($row);
		if (!$rs || $rs->EOF)
			return;
		$this->id->setDbValue($row['id']);
		$this->tr_no->setDbValue($row['tr_no']);
		$this->tr_date->setDbValue($row['tr_date']);
		$this->ho_to->setDbValue($row['ho_to']);
		$this->cno_to->setDbValue($row['cno_to']);
		$this->dept_to->setDbValue($row['dept_to']);
		$this->ho_by->setDbValue($row['ho_by']);
		$this->cno_by->setDbValue($row['cno_by']);
		$this->dept_by->setDbValue($row['dept_by']);
		$this->sign1->setDbValue($row['sign1']);
		$this->sign2->setDbValue($row['sign2']);
		$this->sign3->setDbValue($row['sign3']);
		$this->sign4->setDbValue($row['sign4']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['tr_no'] = $this->tr_no->CurrentValue;
		$row['tr_date'] = $this->tr_date->CurrentValue;
		$row['ho_to'] = $this->ho_to->CurrentValue;
		$row['cno_to'] = $this->cno_to->CurrentValue;
		$row['dept_to'] = $this->dept_to->CurrentValue;
		$row['ho_by'] = $this->ho_by->CurrentValue;
		$row['cno_by'] = $this->cno_by->CurrentValue;
		$row['dept_by'] = $this->dept_by->CurrentValue;
		$row['sign1'] = $this->sign1->CurrentValue;
		$row['sign2'] = $this->sign2->CurrentValue;
		$row['sign3'] = $this->sign3->CurrentValue;
		$row['sign4'] = $this->sign4->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("id")) != "")
			$this->id->OldValue = $this->getKey("id"); // id
		else
			$validKey = FALSE;

		// Load old record
		$this->OldRecordset = NULL;
		if ($validKey) {
			$this->CurrentFilter = $this->getRecordFilter();
			$sql = $this->getCurrentSql();
			$conn = $this->getConnection();
			$this->OldRecordset = LoadRecordset($sql, $conn);
		}
		$this->loadRowValues($this->OldRecordset); // Load row values
		return $validKey;
	}

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
		$this->ViewUrl = $this->getViewUrl();
		$this->EditUrl = $this->getEditUrl();
		$this->InlineEditUrl = $this->getInlineEditUrl();
		$this->CopyUrl = $this->getCopyUrl();
		$this->InlineCopyUrl = $this->getInlineCopyUrl();
		$this->DeleteUrl = $this->getDeleteUrl();

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
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

		if ($this->RowType == ROWTYPE_VIEW) { // View row

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
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// tr_no
			$this->tr_no->EditAttrs["class"] = "form-control";
			$this->tr_no->EditCustomAttributes = "";
			if (!$this->tr_no->Raw)
				$this->tr_no->CurrentValue = HtmlDecode($this->tr_no->CurrentValue);
			$this->tr_no->EditValue = HtmlEncode($this->tr_no->CurrentValue);
			$this->tr_no->PlaceHolder = RemoveHtml($this->tr_no->caption());

			// tr_date
			$this->tr_date->EditAttrs["class"] = "form-control";
			$this->tr_date->EditCustomAttributes = "";
			$this->tr_date->EditValue = HtmlEncode(FormatDateTime($this->tr_date->CurrentValue, 7));
			$this->tr_date->PlaceHolder = RemoveHtml($this->tr_date->caption());

			// ho_to
			$this->ho_to->EditCustomAttributes = "";
			$curVal = trim(strval($this->ho_to->CurrentValue));
			if ($curVal != "")
				$this->ho_to->ViewValue = $this->ho_to->lookupCacheOption($curVal);
			else
				$this->ho_to->ViewValue = $this->ho_to->Lookup !== NULL && is_array($this->ho_to->Lookup->Options) ? $curVal : NULL;
			if ($this->ho_to->ViewValue !== NULL) { // Load from cache
				$this->ho_to->EditValue = array_values($this->ho_to->Lookup->Options);
				if ($this->ho_to->ViewValue == "")
					$this->ho_to->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->ho_to->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->ho_to->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->ho_to->ViewValue = $this->ho_to->displayValue($arwrk);
				} else {
					$this->ho_to->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->ho_to->EditValue = $arwrk;
			}

			// cno_to
			$this->cno_to->EditAttrs["class"] = "form-control";
			$this->cno_to->EditCustomAttributes = "";
			if (!$this->cno_to->Raw)
				$this->cno_to->CurrentValue = HtmlDecode($this->cno_to->CurrentValue);
			$this->cno_to->EditValue = HtmlEncode($this->cno_to->CurrentValue);
			$this->cno_to->PlaceHolder = RemoveHtml($this->cno_to->caption());

			// dept_to
			$this->dept_to->EditCustomAttributes = "";
			$curVal = trim(strval($this->dept_to->CurrentValue));
			if ($curVal != "")
				$this->dept_to->ViewValue = $this->dept_to->lookupCacheOption($curVal);
			else
				$this->dept_to->ViewValue = $this->dept_to->Lookup !== NULL && is_array($this->dept_to->Lookup->Options) ? $curVal : NULL;
			if ($this->dept_to->ViewValue !== NULL) { // Load from cache
				$this->dept_to->EditValue = array_values($this->dept_to->Lookup->Options);
				if ($this->dept_to->ViewValue == "")
					$this->dept_to->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->dept_to->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->dept_to->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->dept_to->ViewValue = $this->dept_to->displayValue($arwrk);
				} else {
					$this->dept_to->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->dept_to->EditValue = $arwrk;
			}

			// ho_by
			$this->ho_by->EditCustomAttributes = "";
			$curVal = trim(strval($this->ho_by->CurrentValue));
			if ($curVal != "")
				$this->ho_by->ViewValue = $this->ho_by->lookupCacheOption($curVal);
			else
				$this->ho_by->ViewValue = $this->ho_by->Lookup !== NULL && is_array($this->ho_by->Lookup->Options) ? $curVal : NULL;
			if ($this->ho_by->ViewValue !== NULL) { // Load from cache
				$this->ho_by->EditValue = array_values($this->ho_by->Lookup->Options);
				if ($this->ho_by->ViewValue == "")
					$this->ho_by->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->ho_by->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->ho_by->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->ho_by->ViewValue = $this->ho_by->displayValue($arwrk);
				} else {
					$this->ho_by->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->ho_by->EditValue = $arwrk;
			}

			// cno_by
			$this->cno_by->EditAttrs["class"] = "form-control";
			$this->cno_by->EditCustomAttributes = "";
			$this->cno_by->EditValue = HtmlEncode($this->cno_by->CurrentValue);
			$this->cno_by->PlaceHolder = RemoveHtml($this->cno_by->caption());

			// dept_by
			$this->dept_by->EditCustomAttributes = "";
			$curVal = trim(strval($this->dept_by->CurrentValue));
			if ($curVal != "")
				$this->dept_by->ViewValue = $this->dept_by->lookupCacheOption($curVal);
			else
				$this->dept_by->ViewValue = $this->dept_by->Lookup !== NULL && is_array($this->dept_by->Lookup->Options) ? $curVal : NULL;
			if ($this->dept_by->ViewValue !== NULL) { // Load from cache
				$this->dept_by->EditValue = array_values($this->dept_by->Lookup->Options);
				if ($this->dept_by->ViewValue == "")
					$this->dept_by->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->dept_by->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->dept_by->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->dept_by->ViewValue = $this->dept_by->displayValue($arwrk);
				} else {
					$this->dept_by->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->dept_by->EditValue = $arwrk;
			}

			// sign1
			$this->sign1->EditCustomAttributes = "";
			$curVal = trim(strval($this->sign1->CurrentValue));
			if ($curVal != "")
				$this->sign1->ViewValue = $this->sign1->lookupCacheOption($curVal);
			else
				$this->sign1->ViewValue = $this->sign1->Lookup !== NULL && is_array($this->sign1->Lookup->Options) ? $curVal : NULL;
			if ($this->sign1->ViewValue !== NULL) { // Load from cache
				$this->sign1->EditValue = array_values($this->sign1->Lookup->Options);
				if ($this->sign1->ViewValue == "")
					$this->sign1->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->sign1->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->sign1->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->sign1->ViewValue = $this->sign1->displayValue($arwrk);
				} else {
					$this->sign1->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->sign1->EditValue = $arwrk;
			}

			// sign2
			$this->sign2->EditCustomAttributes = "";
			$curVal = trim(strval($this->sign2->CurrentValue));
			if ($curVal != "")
				$this->sign2->ViewValue = $this->sign2->lookupCacheOption($curVal);
			else
				$this->sign2->ViewValue = $this->sign2->Lookup !== NULL && is_array($this->sign2->Lookup->Options) ? $curVal : NULL;
			if ($this->sign2->ViewValue !== NULL) { // Load from cache
				$this->sign2->EditValue = array_values($this->sign2->Lookup->Options);
				if ($this->sign2->ViewValue == "")
					$this->sign2->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->sign2->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->sign2->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->sign2->ViewValue = $this->sign2->displayValue($arwrk);
				} else {
					$this->sign2->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->sign2->EditValue = $arwrk;
			}

			// sign3
			$this->sign3->EditCustomAttributes = "";
			$curVal = trim(strval($this->sign3->CurrentValue));
			if ($curVal != "")
				$this->sign3->ViewValue = $this->sign3->lookupCacheOption($curVal);
			else
				$this->sign3->ViewValue = $this->sign3->Lookup !== NULL && is_array($this->sign3->Lookup->Options) ? $curVal : NULL;
			if ($this->sign3->ViewValue !== NULL) { // Load from cache
				$this->sign3->EditValue = array_values($this->sign3->Lookup->Options);
				if ($this->sign3->ViewValue == "")
					$this->sign3->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->sign3->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->sign3->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->sign3->ViewValue = $this->sign3->displayValue($arwrk);
				} else {
					$this->sign3->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->sign3->EditValue = $arwrk;
			}

			// sign4
			$this->sign4->EditCustomAttributes = "";
			$curVal = trim(strval($this->sign4->CurrentValue));
			if ($curVal != "")
				$this->sign4->ViewValue = $this->sign4->lookupCacheOption($curVal);
			else
				$this->sign4->ViewValue = $this->sign4->Lookup !== NULL && is_array($this->sign4->Lookup->Options) ? $curVal : NULL;
			if ($this->sign4->ViewValue !== NULL) { // Load from cache
				$this->sign4->EditValue = array_values($this->sign4->Lookup->Options);
				if ($this->sign4->ViewValue == "")
					$this->sign4->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->sign4->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->sign4->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->sign4->ViewValue = $this->sign4->displayValue($arwrk);
				} else {
					$this->sign4->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->sign4->EditValue = $arwrk;
			}

			// Add refer script
			// tr_no

			$this->tr_no->LinkCustomAttributes = "";
			$this->tr_no->HrefValue = "";

			// tr_date
			$this->tr_date->LinkCustomAttributes = "";
			$this->tr_date->HrefValue = "";

			// ho_to
			$this->ho_to->LinkCustomAttributes = "";
			$this->ho_to->HrefValue = "";

			// cno_to
			$this->cno_to->LinkCustomAttributes = "";
			$this->cno_to->HrefValue = "";

			// dept_to
			$this->dept_to->LinkCustomAttributes = "";
			$this->dept_to->HrefValue = "";

			// ho_by
			$this->ho_by->LinkCustomAttributes = "";
			$this->ho_by->HrefValue = "";

			// cno_by
			$this->cno_by->LinkCustomAttributes = "";
			$this->cno_by->HrefValue = "";

			// dept_by
			$this->dept_by->LinkCustomAttributes = "";
			$this->dept_by->HrefValue = "";

			// sign1
			$this->sign1->LinkCustomAttributes = "";
			$this->sign1->HrefValue = "";

			// sign2
			$this->sign2->LinkCustomAttributes = "";
			$this->sign2->HrefValue = "";

			// sign3
			$this->sign3->LinkCustomAttributes = "";
			$this->sign3->HrefValue = "";

			// sign4
			$this->sign4->LinkCustomAttributes = "";
			$this->sign4->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// tr_no
			$this->tr_no->EditAttrs["class"] = "form-control";
			$this->tr_no->EditCustomAttributes = "";
			if (!$this->tr_no->Raw)
				$this->tr_no->CurrentValue = HtmlDecode($this->tr_no->CurrentValue);
			$this->tr_no->EditValue = HtmlEncode($this->tr_no->CurrentValue);
			$this->tr_no->PlaceHolder = RemoveHtml($this->tr_no->caption());

			// tr_date
			$this->tr_date->EditAttrs["class"] = "form-control";
			$this->tr_date->EditCustomAttributes = "";
			$this->tr_date->EditValue = HtmlEncode(FormatDateTime($this->tr_date->CurrentValue, 7));
			$this->tr_date->PlaceHolder = RemoveHtml($this->tr_date->caption());

			// ho_to
			$this->ho_to->EditCustomAttributes = "";
			$curVal = trim(strval($this->ho_to->CurrentValue));
			if ($curVal != "")
				$this->ho_to->ViewValue = $this->ho_to->lookupCacheOption($curVal);
			else
				$this->ho_to->ViewValue = $this->ho_to->Lookup !== NULL && is_array($this->ho_to->Lookup->Options) ? $curVal : NULL;
			if ($this->ho_to->ViewValue !== NULL) { // Load from cache
				$this->ho_to->EditValue = array_values($this->ho_to->Lookup->Options);
				if ($this->ho_to->ViewValue == "")
					$this->ho_to->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->ho_to->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->ho_to->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->ho_to->ViewValue = $this->ho_to->displayValue($arwrk);
				} else {
					$this->ho_to->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->ho_to->EditValue = $arwrk;
			}

			// cno_to
			$this->cno_to->EditAttrs["class"] = "form-control";
			$this->cno_to->EditCustomAttributes = "";
			if (!$this->cno_to->Raw)
				$this->cno_to->CurrentValue = HtmlDecode($this->cno_to->CurrentValue);
			$this->cno_to->EditValue = HtmlEncode($this->cno_to->CurrentValue);
			$this->cno_to->PlaceHolder = RemoveHtml($this->cno_to->caption());

			// dept_to
			$this->dept_to->EditCustomAttributes = "";
			$curVal = trim(strval($this->dept_to->CurrentValue));
			if ($curVal != "")
				$this->dept_to->ViewValue = $this->dept_to->lookupCacheOption($curVal);
			else
				$this->dept_to->ViewValue = $this->dept_to->Lookup !== NULL && is_array($this->dept_to->Lookup->Options) ? $curVal : NULL;
			if ($this->dept_to->ViewValue !== NULL) { // Load from cache
				$this->dept_to->EditValue = array_values($this->dept_to->Lookup->Options);
				if ($this->dept_to->ViewValue == "")
					$this->dept_to->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->dept_to->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->dept_to->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->dept_to->ViewValue = $this->dept_to->displayValue($arwrk);
				} else {
					$this->dept_to->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->dept_to->EditValue = $arwrk;
			}

			// ho_by
			$this->ho_by->EditCustomAttributes = "";
			$curVal = trim(strval($this->ho_by->CurrentValue));
			if ($curVal != "")
				$this->ho_by->ViewValue = $this->ho_by->lookupCacheOption($curVal);
			else
				$this->ho_by->ViewValue = $this->ho_by->Lookup !== NULL && is_array($this->ho_by->Lookup->Options) ? $curVal : NULL;
			if ($this->ho_by->ViewValue !== NULL) { // Load from cache
				$this->ho_by->EditValue = array_values($this->ho_by->Lookup->Options);
				if ($this->ho_by->ViewValue == "")
					$this->ho_by->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->ho_by->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->ho_by->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->ho_by->ViewValue = $this->ho_by->displayValue($arwrk);
				} else {
					$this->ho_by->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->ho_by->EditValue = $arwrk;
			}

			// cno_by
			$this->cno_by->EditAttrs["class"] = "form-control";
			$this->cno_by->EditCustomAttributes = "";
			$this->cno_by->EditValue = HtmlEncode($this->cno_by->CurrentValue);
			$this->cno_by->PlaceHolder = RemoveHtml($this->cno_by->caption());

			// dept_by
			$this->dept_by->EditCustomAttributes = "";
			$curVal = trim(strval($this->dept_by->CurrentValue));
			if ($curVal != "")
				$this->dept_by->ViewValue = $this->dept_by->lookupCacheOption($curVal);
			else
				$this->dept_by->ViewValue = $this->dept_by->Lookup !== NULL && is_array($this->dept_by->Lookup->Options) ? $curVal : NULL;
			if ($this->dept_by->ViewValue !== NULL) { // Load from cache
				$this->dept_by->EditValue = array_values($this->dept_by->Lookup->Options);
				if ($this->dept_by->ViewValue == "")
					$this->dept_by->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->dept_by->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->dept_by->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->dept_by->ViewValue = $this->dept_by->displayValue($arwrk);
				} else {
					$this->dept_by->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->dept_by->EditValue = $arwrk;
			}

			// sign1
			$this->sign1->EditCustomAttributes = "";
			$curVal = trim(strval($this->sign1->CurrentValue));
			if ($curVal != "")
				$this->sign1->ViewValue = $this->sign1->lookupCacheOption($curVal);
			else
				$this->sign1->ViewValue = $this->sign1->Lookup !== NULL && is_array($this->sign1->Lookup->Options) ? $curVal : NULL;
			if ($this->sign1->ViewValue !== NULL) { // Load from cache
				$this->sign1->EditValue = array_values($this->sign1->Lookup->Options);
				if ($this->sign1->ViewValue == "")
					$this->sign1->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->sign1->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->sign1->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->sign1->ViewValue = $this->sign1->displayValue($arwrk);
				} else {
					$this->sign1->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->sign1->EditValue = $arwrk;
			}

			// sign2
			$this->sign2->EditCustomAttributes = "";
			$curVal = trim(strval($this->sign2->CurrentValue));
			if ($curVal != "")
				$this->sign2->ViewValue = $this->sign2->lookupCacheOption($curVal);
			else
				$this->sign2->ViewValue = $this->sign2->Lookup !== NULL && is_array($this->sign2->Lookup->Options) ? $curVal : NULL;
			if ($this->sign2->ViewValue !== NULL) { // Load from cache
				$this->sign2->EditValue = array_values($this->sign2->Lookup->Options);
				if ($this->sign2->ViewValue == "")
					$this->sign2->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->sign2->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->sign2->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->sign2->ViewValue = $this->sign2->displayValue($arwrk);
				} else {
					$this->sign2->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->sign2->EditValue = $arwrk;
			}

			// sign3
			$this->sign3->EditCustomAttributes = "";
			$curVal = trim(strval($this->sign3->CurrentValue));
			if ($curVal != "")
				$this->sign3->ViewValue = $this->sign3->lookupCacheOption($curVal);
			else
				$this->sign3->ViewValue = $this->sign3->Lookup !== NULL && is_array($this->sign3->Lookup->Options) ? $curVal : NULL;
			if ($this->sign3->ViewValue !== NULL) { // Load from cache
				$this->sign3->EditValue = array_values($this->sign3->Lookup->Options);
				if ($this->sign3->ViewValue == "")
					$this->sign3->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->sign3->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->sign3->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->sign3->ViewValue = $this->sign3->displayValue($arwrk);
				} else {
					$this->sign3->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->sign3->EditValue = $arwrk;
			}

			// sign4
			$this->sign4->EditCustomAttributes = "";
			$curVal = trim(strval($this->sign4->CurrentValue));
			if ($curVal != "")
				$this->sign4->ViewValue = $this->sign4->lookupCacheOption($curVal);
			else
				$this->sign4->ViewValue = $this->sign4->Lookup !== NULL && is_array($this->sign4->Lookup->Options) ? $curVal : NULL;
			if ($this->sign4->ViewValue !== NULL) { // Load from cache
				$this->sign4->EditValue = array_values($this->sign4->Lookup->Options);
				if ($this->sign4->ViewValue == "")
					$this->sign4->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->sign4->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->sign4->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->sign4->ViewValue = $this->sign4->displayValue($arwrk);
				} else {
					$this->sign4->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->sign4->EditValue = $arwrk;
			}

			// Edit refer script
			// tr_no

			$this->tr_no->LinkCustomAttributes = "";
			$this->tr_no->HrefValue = "";

			// tr_date
			$this->tr_date->LinkCustomAttributes = "";
			$this->tr_date->HrefValue = "";

			// ho_to
			$this->ho_to->LinkCustomAttributes = "";
			$this->ho_to->HrefValue = "";

			// cno_to
			$this->cno_to->LinkCustomAttributes = "";
			$this->cno_to->HrefValue = "";

			// dept_to
			$this->dept_to->LinkCustomAttributes = "";
			$this->dept_to->HrefValue = "";

			// ho_by
			$this->ho_by->LinkCustomAttributes = "";
			$this->ho_by->HrefValue = "";

			// cno_by
			$this->cno_by->LinkCustomAttributes = "";
			$this->cno_by->HrefValue = "";

			// dept_by
			$this->dept_by->LinkCustomAttributes = "";
			$this->dept_by->HrefValue = "";

			// sign1
			$this->sign1->LinkCustomAttributes = "";
			$this->sign1->HrefValue = "";

			// sign2
			$this->sign2->LinkCustomAttributes = "";
			$this->sign2->HrefValue = "";

			// sign3
			$this->sign3->LinkCustomAttributes = "";
			$this->sign3->HrefValue = "";

			// sign4
			$this->sign4->LinkCustomAttributes = "";
			$this->sign4->HrefValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType != ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate search
	protected function validateSearch()
	{
		global $SearchError;

		// Initialize
		$SearchError = "";

		// Check if validation required
		if (!Config("SERVER_VALIDATE"))
			return TRUE;

		// Return validate result
		$validateSearch = ($SearchError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateSearch = $validateSearch && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError != "") {
			AddMessage($SearchError, $formCustomError);
		}
		return $validateSearch;
	}

	// Validate form
	protected function validateForm()
	{
		global $Language, $FormError;

		// Initialize form error message
		$FormError = "";

		// Check if validation required
		if (!Config("SERVER_VALIDATE"))
			return ($FormError == "");
		if ($this->tr_no->Required) {
			if (!$this->tr_no->IsDetailKey && $this->tr_no->FormValue != NULL && $this->tr_no->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->tr_no->caption(), $this->tr_no->RequiredErrorMessage));
			}
		}
		if ($this->tr_date->Required) {
			if (!$this->tr_date->IsDetailKey && $this->tr_date->FormValue != NULL && $this->tr_date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->tr_date->caption(), $this->tr_date->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->tr_date->FormValue)) {
			AddMessage($FormError, $this->tr_date->errorMessage());
		}
		if ($this->ho_to->Required) {
			if (!$this->ho_to->IsDetailKey && $this->ho_to->FormValue != NULL && $this->ho_to->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ho_to->caption(), $this->ho_to->RequiredErrorMessage));
			}
		}
		if ($this->cno_to->Required) {
			if (!$this->cno_to->IsDetailKey && $this->cno_to->FormValue != NULL && $this->cno_to->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->cno_to->caption(), $this->cno_to->RequiredErrorMessage));
			}
		}
		if ($this->dept_to->Required) {
			if (!$this->dept_to->IsDetailKey && $this->dept_to->FormValue != NULL && $this->dept_to->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->dept_to->caption(), $this->dept_to->RequiredErrorMessage));
			}
		}
		if ($this->ho_by->Required) {
			if (!$this->ho_by->IsDetailKey && $this->ho_by->FormValue != NULL && $this->ho_by->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ho_by->caption(), $this->ho_by->RequiredErrorMessage));
			}
		}
		if ($this->cno_by->Required) {
			if (!$this->cno_by->IsDetailKey && $this->cno_by->FormValue != NULL && $this->cno_by->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->cno_by->caption(), $this->cno_by->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->cno_by->FormValue)) {
			AddMessage($FormError, $this->cno_by->errorMessage());
		}
		if ($this->dept_by->Required) {
			if (!$this->dept_by->IsDetailKey && $this->dept_by->FormValue != NULL && $this->dept_by->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->dept_by->caption(), $this->dept_by->RequiredErrorMessage));
			}
		}
		if ($this->sign1->Required) {
			if (!$this->sign1->IsDetailKey && $this->sign1->FormValue != NULL && $this->sign1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sign1->caption(), $this->sign1->RequiredErrorMessage));
			}
		}
		if ($this->sign2->Required) {
			if (!$this->sign2->IsDetailKey && $this->sign2->FormValue != NULL && $this->sign2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sign2->caption(), $this->sign2->RequiredErrorMessage));
			}
		}
		if ($this->sign3->Required) {
			if (!$this->sign3->IsDetailKey && $this->sign3->FormValue != NULL && $this->sign3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sign3->caption(), $this->sign3->RequiredErrorMessage));
			}
		}
		if ($this->sign4->Required) {
			if (!$this->sign4->IsDetailKey && $this->sign4->FormValue != NULL && $this->sign4->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sign4->caption(), $this->sign4->RequiredErrorMessage));
			}
		}

		// Return validate result
		$validateForm = ($FormError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateForm = $validateForm && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError != "") {
			AddMessage($FormError, $formCustomError);
		}
		return $validateForm;
	}

	// Delete records based on current filter
	protected function deleteRows()
	{
		global $Language, $Security;
		if (!$Security->canDelete()) {
			$this->setFailureMessage($Language->phrase("NoDeletePermission")); // No delete permission
			return FALSE;
		}
		$deleteRows = TRUE;
		$sql = $this->getCurrentSql();
		$conn = $this->getConnection();
		$conn->raiseErrorFn = Config("ERROR_FUNC");
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = "";
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
			$rs->close();
			return FALSE;
		}
		$rows = ($rs) ? $rs->getRows() : [];
		if ($this->AuditTrailOnDelete)
			$this->writeAuditTrailDummy($Language->phrase("BatchDeleteBegin")); // Batch delete begin

		// Clone old rows
		$rsold = $rows;
		if ($rs)
			$rs->close();

		// Call row deleting event
		if ($deleteRows) {
			foreach ($rsold as $row) {
				$deleteRows = $this->Row_Deleting($row);
				if (!$deleteRows)
					break;
			}
		}
		if ($deleteRows) {
			$key = "";
			foreach ($rsold as $row) {
				$thisKey = "";
				if ($thisKey != "")
					$thisKey .= Config("COMPOSITE_KEY_SEPARATOR");
				$thisKey .= $row['id'];
				if (Config("DELETE_UPLOADED_FILES")) // Delete old files
					$this->deleteUploadedFiles($row);
				$conn->raiseErrorFn = Config("ERROR_FUNC");
				$deleteRows = $this->delete($row); // Delete
				$conn->raiseErrorFn = "";
				if ($deleteRows === FALSE)
					break;
				if ($key != "")
					$key .= ", ";
				$key .= $thisKey;
			}
		}
		if (!$deleteRows) {

			// Set up error message
			if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage != "") {
				$this->setFailureMessage($this->CancelMessage);
				$this->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->phrase("DeleteCancelled"));
			}
		}

		// Call Row Deleted event
		if ($deleteRows) {
			foreach ($rsold as $row) {
				$this->Row_Deleted($row);
			}
		}

		// Write JSON for API request (Support single row only)
		if (IsApi() && $deleteRows) {
			$row = $this->getRecordsFromRecordset($rsold, TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $deleteRows;
	}

	// Update record based on key values
	protected function editRow()
	{
		global $Security, $Language;
		$oldKeyFilter = $this->getRecordFilter();
		$filter = $this->applyUserIDFilters($oldKeyFilter);
		$conn = $this->getConnection();
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn->raiseErrorFn = Config("ERROR_FUNC");
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = "";
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
			$editRow = FALSE; // Update Failed
		} else {

			// Save old values
			$rsold = &$rs->fields;
			$this->loadDbValues($rsold);
			$rsnew = [];

			// tr_no
			$this->tr_no->setDbValueDef($rsnew, $this->tr_no->CurrentValue, "", $this->tr_no->ReadOnly);

			// tr_date
			$this->tr_date->setDbValueDef($rsnew, UnFormatDateTime($this->tr_date->CurrentValue, 7), CurrentDate(), $this->tr_date->ReadOnly);

			// ho_to
			$this->ho_to->setDbValueDef($rsnew, $this->ho_to->CurrentValue, 0, $this->ho_to->ReadOnly);

			// cno_to
			$this->cno_to->setDbValueDef($rsnew, $this->cno_to->CurrentValue, "", $this->cno_to->ReadOnly);

			// dept_to
			$this->dept_to->setDbValueDef($rsnew, $this->dept_to->CurrentValue, 0, $this->dept_to->ReadOnly);

			// ho_by
			$this->ho_by->setDbValueDef($rsnew, $this->ho_by->CurrentValue, 0, $this->ho_by->ReadOnly);

			// cno_by
			$this->cno_by->setDbValueDef($rsnew, $this->cno_by->CurrentValue, 0, $this->cno_by->ReadOnly);

			// dept_by
			$this->dept_by->setDbValueDef($rsnew, $this->dept_by->CurrentValue, 0, $this->dept_by->ReadOnly);

			// sign1
			$this->sign1->setDbValueDef($rsnew, $this->sign1->CurrentValue, 0, $this->sign1->ReadOnly);

			// sign2
			$this->sign2->setDbValueDef($rsnew, $this->sign2->CurrentValue, 0, $this->sign2->ReadOnly);

			// sign3
			$this->sign3->setDbValueDef($rsnew, $this->sign3->CurrentValue, 0, $this->sign3->ReadOnly);

			// sign4
			$this->sign4->setDbValueDef($rsnew, $this->sign4->CurrentValue, 0, $this->sign4->ReadOnly);

			// Call Row Updating event
			$updateRow = $this->Row_Updating($rsold, $rsnew);

			// Check for duplicate key when key changed
			if ($updateRow) {
				$newKeyFilter = $this->getRecordFilter($rsnew);
				if ($newKeyFilter != $oldKeyFilter) {
					$rsChk = $this->loadRs($newKeyFilter);
					if ($rsChk && !$rsChk->EOF) {
						$keyErrMsg = str_replace("%f", $newKeyFilter, $Language->phrase("DupKey"));
						$this->setFailureMessage($keyErrMsg);
						$rsChk->close();
						$updateRow = FALSE;
					}
				}
			}
			if ($updateRow) {
				$conn->raiseErrorFn = Config("ERROR_FUNC");
				if (count($rsnew) > 0)
					$editRow = $this->update($rsnew, "", $rsold);
				else
					$editRow = TRUE; // No field to update
				$conn->raiseErrorFn = "";
				if ($editRow) {
				}
			} else {
				if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {

					// Use the message, do nothing
				} elseif ($this->CancelMessage != "") {
					$this->setFailureMessage($this->CancelMessage);
					$this->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->phrase("UpdateCancelled"));
				}
				$editRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($editRow)
			$this->Row_Updated($rsold, $rsnew);
		$rs->close();

		// Clean upload path if any
		if ($editRow) {
		}

		// Write JSON for API request
		if (IsApi() && $editRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $editRow;
	}

	// Load row hash
	protected function loadRowHash()
	{
		$filter = $this->getRecordFilter();

		// Load SQL based on filter
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = $this->getConnection();
		$rsRow = $conn->Execute($sql);
		$this->HashValue = ($rsRow && !$rsRow->EOF) ? $this->getRowHash($rsRow) : ""; // Get hash value for record
		$rsRow->close();
	}

	// Get Row Hash
	public function getRowHash(&$rs)
	{
		if (!$rs)
			return "";
		$hash = "";
		$hash .= GetFieldHash($rs->fields('tr_no')); // tr_no
		$hash .= GetFieldHash($rs->fields('tr_date')); // tr_date
		$hash .= GetFieldHash($rs->fields('ho_to')); // ho_to
		$hash .= GetFieldHash($rs->fields('cno_to')); // cno_to
		$hash .= GetFieldHash($rs->fields('dept_to')); // dept_to
		$hash .= GetFieldHash($rs->fields('ho_by')); // ho_by
		$hash .= GetFieldHash($rs->fields('cno_by')); // cno_by
		$hash .= GetFieldHash($rs->fields('dept_by')); // dept_by
		$hash .= GetFieldHash($rs->fields('sign1')); // sign1
		$hash .= GetFieldHash($rs->fields('sign2')); // sign2
		$hash .= GetFieldHash($rs->fields('sign3')); // sign3
		$hash .= GetFieldHash($rs->fields('sign4')); // sign4
		return md5($hash);
	}

	// Add record
	protected function addRow($rsold = NULL)
	{
		global $Language, $Security;
		$conn = $this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// tr_no
		$this->tr_no->setDbValueDef($rsnew, $this->tr_no->CurrentValue, "", FALSE);

		// tr_date
		$this->tr_date->setDbValueDef($rsnew, UnFormatDateTime($this->tr_date->CurrentValue, 7), CurrentDate(), FALSE);

		// ho_to
		$this->ho_to->setDbValueDef($rsnew, $this->ho_to->CurrentValue, 0, FALSE);

		// cno_to
		$this->cno_to->setDbValueDef($rsnew, $this->cno_to->CurrentValue, "", FALSE);

		// dept_to
		$this->dept_to->setDbValueDef($rsnew, $this->dept_to->CurrentValue, 0, FALSE);

		// ho_by
		$this->ho_by->setDbValueDef($rsnew, $this->ho_by->CurrentValue, 0, FALSE);

		// cno_by
		$this->cno_by->setDbValueDef($rsnew, $this->cno_by->CurrentValue, 0, FALSE);

		// dept_by
		$this->dept_by->setDbValueDef($rsnew, $this->dept_by->CurrentValue, 0, FALSE);

		// sign1
		$this->sign1->setDbValueDef($rsnew, $this->sign1->CurrentValue, 0, FALSE);

		// sign2
		$this->sign2->setDbValueDef($rsnew, $this->sign2->CurrentValue, 0, FALSE);

		// sign3
		$this->sign3->setDbValueDef($rsnew, $this->sign3->CurrentValue, 0, FALSE);

		// sign4
		$this->sign4->setDbValueDef($rsnew, $this->sign4->CurrentValue, 0, FALSE);

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);
		if ($insertRow) {
			$conn->raiseErrorFn = Config("ERROR_FUNC");
			$addRow = $this->insert($rsnew);
			$conn->raiseErrorFn = "";
			if ($addRow) {
			}
		} else {
			if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage != "") {
				$this->setFailureMessage($this->CancelMessage);
				$this->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->phrase("InsertCancelled"));
			}
			$addRow = FALSE;
		}
		if ($addRow) {

			// Call Row Inserted event
			$rs = ($rsold) ? $rsold->fields : NULL;
			$this->Row_Inserted($rs, $rsnew);
		}

		// Clean upload path if any
		if ($addRow) {
		}

		// Write JSON for API request
		if (IsApi() && $addRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $addRow;
	}

	// Load advanced search
	public function loadAdvancedSearch()
	{
		$this->tr_no->AdvancedSearch->load();
		$this->tr_date->AdvancedSearch->load();
		$this->ho_to->AdvancedSearch->load();
		$this->cno_to->AdvancedSearch->load();
		$this->dept_to->AdvancedSearch->load();
		$this->ho_by->AdvancedSearch->load();
		$this->cno_by->AdvancedSearch->load();
		$this->dept_by->AdvancedSearch->load();
		$this->sign1->AdvancedSearch->load();
		$this->sign2->AdvancedSearch->load();
		$this->sign3->AdvancedSearch->load();
		$this->sign4->AdvancedSearch->load();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.ft101_ho_headlist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.ft101_ho_headlist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.ft101_ho_headlist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
			else
				return "<a href=\"" . $this->ExportPdfUrl . "\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\">" . $Language->phrase("ExportToPDF") . "</a>";
		} elseif (SameText($type, "html")) {
			return "<a href=\"" . $this->ExportHtmlUrl . "\" class=\"ew-export-link ew-html\" title=\"" . HtmlEncode($Language->phrase("ExportToHtmlText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToHtmlText")) . "\">" . $Language->phrase("ExportToHtml") . "</a>";
		} elseif (SameText($type, "xml")) {
			return "<a href=\"" . $this->ExportXmlUrl . "\" class=\"ew-export-link ew-xml\" title=\"" . HtmlEncode($Language->phrase("ExportToXmlText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToXmlText")) . "\">" . $Language->phrase("ExportToXml") . "</a>";
		} elseif (SameText($type, "csv")) {
			return "<a href=\"" . $this->ExportCsvUrl . "\" class=\"ew-export-link ew-csv\" title=\"" . HtmlEncode($Language->phrase("ExportToCsvText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToCsvText")) . "\">" . $Language->phrase("ExportToCsv") . "</a>";
		} elseif (SameText($type, "email")) {
			$url = $custom ? ",url:'" . $this->pageUrl() . "export=email&amp;custom=1'" : "";
			return '<button id="emf_t101_ho_head" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_t101_ho_head\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.ft101_ho_headlist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
		} elseif (SameText($type, "print")) {
			return "<a href=\"" . $this->ExportPrintUrl . "\" class=\"ew-export-link ew-print\" title=\"" . HtmlEncode($Language->phrase("PrinterFriendlyText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("PrinterFriendlyText")) . "\">" . $Language->phrase("PrinterFriendly") . "</a>";
		}
	}

	// Set up export options
	protected function setupExportOptions()
	{
		global $Language;

		// Printer friendly
		$item = &$this->ExportOptions->add("print");
		$item->Body = $this->getExportTag("print");
		$item->Visible = FALSE;

		// Export to Excel
		$item = &$this->ExportOptions->add("excel");
		$item->Body = $this->getExportTag("excel");
		$item->Visible = TRUE;

		// Export to Word
		$item = &$this->ExportOptions->add("word");
		$item->Body = $this->getExportTag("word");
		$item->Visible = FALSE;

		// Export to Html
		$item = &$this->ExportOptions->add("html");
		$item->Body = $this->getExportTag("html");
		$item->Visible = FALSE;

		// Export to Xml
		$item = &$this->ExportOptions->add("xml");
		$item->Body = $this->getExportTag("xml");
		$item->Visible = FALSE;

		// Export to Csv
		$item = &$this->ExportOptions->add("csv");
		$item->Body = $this->getExportTag("csv");
		$item->Visible = FALSE;

		// Export to Pdf
		$item = &$this->ExportOptions->add("pdf");
		$item->Body = $this->getExportTag("pdf");
		$item->Visible = FALSE;

		// Export to Email
		$item = &$this->ExportOptions->add("email");
		$item->Body = $this->getExportTag("email");
		$item->Visible = FALSE;

		// Drop down button for export
		$this->ExportOptions->UseButtonGroup = TRUE;
		$this->ExportOptions->UseDropDownButton = FALSE;
		if ($this->ExportOptions->UseButtonGroup && IsMobile())
			$this->ExportOptions->UseDropDownButton = TRUE;
		$this->ExportOptions->DropDownButtonPhrase = $Language->phrase("ButtonExport");

		// Add group option item
		$item = &$this->ExportOptions->add($this->ExportOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;
	}

	// Set up search options
	protected function setupSearchOptions()
	{
		global $Language;
		$this->SearchOptions = new ListOptions("div");
		$this->SearchOptions->TagClassName = "ew-search-option";

		// Show all button
		$item = &$this->SearchOptions->add("showall");
		$item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $this->pageUrl() . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
		$item->Visible = ($this->SearchWhere != $this->DefaultSearchWhere && $this->SearchWhere != "0=101");

		// Advanced search button
		$item = &$this->SearchOptions->add("advancedsearch");
		if (IsMobile())
			$item->Body = "<a class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" href=\"t101_ho_headsrch.php\">" . $Language->phrase("AdvancedSearchBtn") . "</a>";
		else
			$item->Body = "<a class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-table=\"t101_ho_head\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'SearchBtn',url:'t101_ho_headsrch.php'});\">" . $Language->phrase("AdvancedSearchBtn") . "</a>";
		$item->Visible = TRUE;

		// Button group for search
		$this->SearchOptions->UseDropDownButton = FALSE;
		$this->SearchOptions->UseButtonGroup = TRUE;
		$this->SearchOptions->DropDownButtonPhrase = $Language->phrase("ButtonSearch");

		// Add group option item
		$item = &$this->SearchOptions->add($this->SearchOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;

		// Hide search options
		if ($this->isExport() || $this->CurrentAction)
			$this->SearchOptions->hideAllOptions();
		global $Security;
		if (!$Security->canSearch()) {
			$this->SearchOptions->hideAllOptions();
			$this->FilterOptions->hideAllOptions();
		}
	}

	/**
	 * Export data in HTML/CSV/Word/Excel/XML/Email/PDF format
	 *
	 * @param boolean $return Return the data rather than output it
	 * @return mixed
	 */
	public function exportData($return = FALSE)
	{
		global $Language;
		$utf8 = SameText(Config("PROJECT_CHARSET"), "utf-8");
		$selectLimit = $this->UseSelectLimit;

		// Load recordset
		if ($selectLimit) {
			$this->TotalRecords = $this->listRecordCount();
		} else {
			if (!$this->Recordset)
				$this->Recordset = $this->loadRecordset();
			$rs = &$this->Recordset;
			if ($rs)
				$this->TotalRecords = $rs->RecordCount();
		}
		$this->StartRecord = 1;

		// Export all
		if ($this->ExportAll) {
			set_time_limit(Config("EXPORT_ALL_TIME_LIMIT"));
			$this->DisplayRecords = $this->TotalRecords;
			$this->StopRecord = $this->TotalRecords;
		} else { // Export one page only
			$this->setupStartRecord(); // Set up start record position

			// Set the last record to display
			if ($this->DisplayRecords <= 0) {
				$this->StopRecord = $this->TotalRecords;
			} else {
				$this->StopRecord = $this->StartRecord + $this->DisplayRecords - 1;
			}
		}
		if ($selectLimit)
			$rs = $this->loadRecordset($this->StartRecord - 1, $this->DisplayRecords <= 0 ? $this->TotalRecords : $this->DisplayRecords);
		$this->ExportDoc = GetExportDocument($this, "h");
		$doc = &$this->ExportDoc;
		if (!$doc)
			$this->setFailureMessage($Language->phrase("ExportClassNotFound")); // Export class not found
		if (!$rs || !$doc) {
			RemoveHeader("Content-Type"); // Remove header
			RemoveHeader("Content-Disposition");
			$this->showMessage();
			return;
		}
		if ($selectLimit) {
			$this->StartRecord = 1;
			$this->StopRecord = $this->DisplayRecords <= 0 ? $this->TotalRecords : $this->DisplayRecords;
		}

		// Call Page Exporting server event
		$this->ExportDoc->ExportCustom = !$this->Page_Exporting();
		$header = $this->PageHeader;
		$this->Page_DataRendering($header);
		$doc->Text .= $header;
		$this->exportDocument($doc, $rs, $this->StartRecord, $this->StopRecord, "");
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		$doc->Text .= $footer;

		// Close recordset
		$rs->close();

		// Call Page Exported server event
		$this->Page_Exported();

		// Export header and footer
		$doc->exportHeaderAndFooter();

		// Clean output buffer (without destroying output buffer)
		$buffer = ob_get_contents(); // Save the output buffer
		if (!Config("DEBUG") && $buffer)
			ob_clean();

		// Write debug message if enabled
		if (Config("DEBUG") && !$this->isExport("pdf"))
			echo GetDebugMessage();

		// Output data
		if ($this->isExport("email")) {

			// Export-to-email disabled
		} else {
			$doc->export();
			if ($return) {
				RemoveHeader("Content-Type"); // Remove header
				RemoveHeader("Content-Disposition");
				$content = ob_get_contents();
				if ($content)
					ob_clean();
				if ($buffer)
					echo $buffer; // Resume the output buffer
				return $content;
			}
		}
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$url = preg_replace('/\?cmd=reset(all){0,1}$/i', '', $url); // Remove cmd=reset / cmd=resetall
		$Breadcrumb->add("list", $this->TableVar, $url, "", $this->TableVar, TRUE);
	}

	// Setup lookup options
	public function setupLookupOptions($fld)
	{
		if ($fld->Lookup !== NULL && $fld->Lookup->Options === NULL) {

			// Get default connection and filter
			$conn = $this->getConnection();
			$lookupFilter = "";

			// No need to check any more
			$fld->Lookup->Options = [];

			// Set up lookup SQL and connection
			switch ($fld->FieldVar) {
				case "x_ho_to":
					break;
				case "x_dept_to":
					break;
				case "x_ho_by":
					break;
				case "x_dept_by":
					break;
				case "x_sign1":
					break;
				case "x_sign2":
					break;
				case "x_sign3":
					break;
				case "x_sign4":
					break;
				default:
					$lookupFilter = "";
					break;
			}

			// Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
			$sql = $fld->Lookup->getSql(FALSE, "", $lookupFilter, $this);

			// Set up lookup cache
			if ($fld->UseLookupCache && $sql != "" && count($fld->Lookup->Options) == 0) {
				$totalCnt = $this->getRecordCount($sql, $conn);
				if ($totalCnt > $fld->LookupCacheCount) // Total count > cache count, do not cache
					return;
				$rs = $conn->execute($sql);
				$ar = [];
				while ($rs && !$rs->EOF) {
					$row = &$rs->fields;

					// Format the field values
					switch ($fld->FieldVar) {
						case "x_ho_to":
							break;
						case "x_dept_to":
							break;
						case "x_ho_by":
							break;
						case "x_dept_by":
							break;
						case "x_sign1":
							break;
						case "x_sign2":
							break;
						case "x_sign3":
							break;
						case "x_sign4":
							break;
					}
					$ar[strval($row[0])] = $row;
					$rs->moveNext();
				}
				if ($rs)
					$rs->close();
				$fld->Lookup->Options = $ar;
			}
		}
	}

	// Set up starting record parameters
	public function setupStartRecord()
	{
		if ($this->DisplayRecords == 0)
			return;
		if ($this->isPageRequest()) { // Validate request
			$startRec = Get(Config("TABLE_START_REC"));
			$pageNo = Get(Config("TABLE_PAGE_NO"));
			if ($pageNo !== NULL) { // Check for "pageno" parameter first
				if (is_numeric($pageNo)) {
					$this->StartRecord = ($pageNo - 1) * $this->DisplayRecords + 1;
					if ($this->StartRecord <= 0) {
						$this->StartRecord = 1;
					} elseif ($this->StartRecord >= (int)(($this->TotalRecords - 1)/$this->DisplayRecords) * $this->DisplayRecords + 1) {
						$this->StartRecord = (int)(($this->TotalRecords - 1)/$this->DisplayRecords) * $this->DisplayRecords + 1;
					}
					$this->setStartRecordNumber($this->StartRecord);
				}
			} elseif ($startRec !== NULL) { // Check for "start" parameter
				$this->StartRecord = $startRec;
				$this->setStartRecordNumber($this->StartRecord);
			}
		}
		$this->StartRecord = $this->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRecord) || $this->StartRecord == "") { // Avoid invalid start record counter
			$this->StartRecord = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRecord);
		} elseif ($this->StartRecord > $this->TotalRecords) { // Avoid starting record > total records
			$this->StartRecord = (int)(($this->TotalRecords - 1)/$this->DisplayRecords) * $this->DisplayRecords + 1; // Point to last page first record
			$this->setStartRecordNumber($this->StartRecord);
		} elseif (($this->StartRecord - 1) % $this->DisplayRecords != 0) {
			$this->StartRecord = (int)(($this->StartRecord - 1)/$this->DisplayRecords) * $this->DisplayRecords + 1; // Point to page boundary
			$this->setStartRecordNumber($this->StartRecord);
		}
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Page Redirecting event
	function Page_Redirecting(&$url) {

		// Example:
		//$url = "your URL";

	}

	// Message Showing event
	// $type = ''|'success'|'failure'|'warning'
	function Message_Showing(&$msg, $type) {
		if ($type == 'success') {

			//$msg = "your success message";
		} elseif ($type == 'failure') {

			//$msg = "your failure message";
		} elseif ($type == 'warning') {

			//$msg = "your warning message";
		} else {

			//$msg = "your message";
		}
	}

	// Page Render event
	function Page_Render() {

		//echo "Page Render";
	}

	// Page Data Rendering event
	function Page_DataRendering(&$header) {

		// Example:
		//$header = "your header";

	}

	// Page Data Rendered event
	function Page_DataRendered(&$footer) {

		// Example:
		//$footer = "your footer";

	}

	// Form Custom Validate event
	function Form_CustomValidate(&$customError) {

		// Return error message in CustomError
		return TRUE;
	}

	// ListOptions Load event
	function ListOptions_Load() {

		// Example:
		//$opt = &$this->ListOptions->Add("new");
		//$opt->Header = "xxx";
		//$opt->OnLeft = TRUE; // Link on left
		//$opt->MoveTo(0); // Move to first column

	}

	// ListOptions Rendering event
	function ListOptions_Rendering() {

		//$GLOBALS["xxx_grid"]->DetailAdd = (...condition...); // Set to TRUE or FALSE conditionally
		//$GLOBALS["xxx_grid"]->DetailEdit = (...condition...); // Set to TRUE or FALSE conditionally
		//$GLOBALS["xxx_grid"]->DetailView = (...condition...); // Set to TRUE or FALSE conditionally

	}

	// ListOptions Rendered event
	function ListOptions_Rendered() {

		// Example:
		//$this->ListOptions["new"]->Body = "xxx";

	}

	// Row Custom Action event
	function Row_CustomAction($action, $row) {

		// Return FALSE to abort
		return TRUE;
	}

	// Page Exporting event
	// $this->ExportDoc = export document object
	function Page_Exporting() {

		//$this->ExportDoc->Text = "my header"; // Export header
		//return FALSE; // Return FALSE to skip default export and use Row_Export event

		return TRUE; // Return TRUE to use default export and skip Row_Export event
	}

	// Row Export event
	// $this->ExportDoc = export document object
	function Row_Export($rs) {

		//$this->ExportDoc->Text .= "my content"; // Build HTML with field value: $rs["MyField"] or $this->MyField->ViewValue
	}

	// Page Exported event
	// $this->ExportDoc = export document object
	function Page_Exported() {

		//$this->ExportDoc->Text .= "my footer"; // Export footer
		//echo $this->ExportDoc->Text;

	}

	// Page Importing event
	function Page_Importing($reader, &$options) {

		//var_dump($reader); // Import data reader
		//var_dump($options); // Show all options for importing
		//return FALSE; // Return FALSE to skip import

		return TRUE;
	}

	// Row Import event
	function Row_Import(&$row, $cnt) {

		//echo $cnt; // Import record count
		//var_dump($row); // Import row
		//return FALSE; // Return FALSE to skip import

		return TRUE;
	}

	// Page Imported event
	function Page_Imported($reader, $results) {

		//var_dump($reader); // Import data reader
		//var_dump($results); // Import results

	}
} // End class
?>