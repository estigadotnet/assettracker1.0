<?php
namespace PHPMaker2020\p_assettracker1_0;

/**
 * Page class
 */
class t102_ho_detail_add extends t102_ho_detail
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{A1916BF1-858E-4493-B275-C510122AD7E3}";

	// Table name
	public $TableName = 't102_ho_detail';

	// Page object name
	public $PageObjName = "t102_ho_detail_add";

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

		// Table object (t102_ho_detail)
		if (!isset($GLOBALS["t102_ho_detail"]) || get_class($GLOBALS["t102_ho_detail"]) == PROJECT_NAMESPACE . "t102_ho_detail") {
			$GLOBALS["t102_ho_detail"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["t102_ho_detail"];
		}

		// Table object (t101_ho_head)
		if (!isset($GLOBALS['t101_ho_head']))
			$GLOBALS['t101_ho_head'] = new t101_ho_head();

		// Table object (t201_users)
		if (!isset($GLOBALS['t201_users']))
			$GLOBALS['t201_users'] = new t201_users();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 't102_ho_detail');

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
		global $t102_ho_detail;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($t102_ho_detail);
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

			// Handle modal response
			if ($this->IsModal) { // Show as modal
				$row = ["url" => $url, "modal" => "1"];
				$pageName = GetPageName($url);
				if ($pageName != $this->getListUrl()) { // Not List page
					$row["caption"] = $this->getModalCaption($pageName);
					if ($pageName == "t102_ho_detailview.php")
						$row["view"] = "1";
				} else { // List page should not be shown as modal => error
					$row["error"] = $this->getFailureMessage();
					$this->clearFailureMessage();
				}
				WriteJson($row);
			} else {
				SaveDebugMessage();
				AddHeader("Location", $url);
			}
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
	public $FormClassName = "ew-horizontal ew-form ew-add-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter = "";
	public $DbDetailFilter = "";
	public $StartRecord;
	public $Priv = 0;
	public $OldRecordset;
	public $CopyRecord;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm,
			$FormError, $SkipHeaderFooter;

		// Is modal
		$this->IsModal = (Param("modal") == "1");

		// User profile
		$UserProfile = new UserProfile();

		// Security
		if (ValidApiRequest()) { // API request
			$this->setupApiSecurity(); // Set up API Security
			if (!$Security->canAdd()) {
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
			if (!$Security->canAdd()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("t102_ho_detaillist.php"));
				else
					$this->terminate(GetUrl("login.php"));
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
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->hohead_id->setVisibility();
		$this->asset_id->setVisibility();
		$this->proc_date->setVisibility();
		$this->proc_ccost->setVisibility();
		$this->dep_amount->setVisibility();
		$this->dep_ytd->setVisibility();
		$this->nb_val->setVisibility();
		$this->remarks->setVisibility();
		$this->hideFieldsForAddEdit();

		// Do not use lookup cache
		$this->setUseLookupCache(FALSE);

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

		// Set up lookup cache
		// Check permission

		if (!$Security->canAdd()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("t102_ho_detaillist.php");
			return;
		}

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-add-form ew-horizontal";
		$postBack = FALSE;

		// Set up current action
		if (IsApi()) {
			$this->CurrentAction = "insert"; // Add record directly
			$postBack = TRUE;
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action"); // Get form action
			$postBack = TRUE;
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (Get("id") !== NULL) {
				$this->id->setQueryStringValue(Get("id"));
				$this->setKey("id", $this->id->CurrentValue); // Set up key
			} else {
				$this->setKey("id", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if ($this->CopyRecord) {
				$this->CurrentAction = "copy"; // Copy record
			} else {
				$this->CurrentAction = "show"; // Display blank record
			}
		}

		// Load old record / default values
		$loaded = $this->loadOldRecord();

		// Set up master/detail parameters
		// NOTE: must be after loadOldRecord to prevent master key values overwritten

		$this->setupMasterParms();

		// Load form values
		if ($postBack) {
			$this->loadFormValues(); // Load form values
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues(); // Restore form values
				$this->setFailureMessage($FormError);
				if (IsApi()) {
					$this->terminate();
					return;
				} else {
					$this->CurrentAction = "show"; // Form error, reset action
				}
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "copy": // Copy an existing record
				if (!$loaded) { // Record not loaded
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
					$this->terminate("t102_ho_detaillist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "t102_ho_detaillist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "t102_ho_detailview.php")
						$returnUrl = $this->getViewUrl(); // View page, return to View page with keyurl directly
					if (IsApi()) { // Return to caller
						$this->terminate(TRUE);
						return;
					} else {
						$this->terminate($returnUrl);
					}
				} elseif (IsApi()) { // API request, return
					$this->terminate();
					return;
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Add failed, restore form values
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render row based on row type
		$this->RowType = ROWTYPE_ADD; // Render add type

		// Render row
		$this->resetAttributes();
		$this->renderRow();
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
	}

	// Load default values
	protected function loadDefaultValues()
	{
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->hohead_id->CurrentValue = NULL;
		$this->hohead_id->OldValue = $this->hohead_id->CurrentValue;
		$this->asset_id->CurrentValue = NULL;
		$this->asset_id->OldValue = $this->asset_id->CurrentValue;
		$this->proc_date->CurrentValue = NULL;
		$this->proc_date->OldValue = $this->proc_date->CurrentValue;
		$this->proc_ccost->CurrentValue = 0.00;
		$this->dep_amount->CurrentValue = 0.00;
		$this->dep_ytd->CurrentValue = 0.00;
		$this->nb_val->CurrentValue = 0.00;
		$this->remarks->CurrentValue = NULL;
		$this->remarks->OldValue = $this->remarks->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'hohead_id' first before field var 'x_hohead_id'
		$val = $CurrentForm->hasValue("hohead_id") ? $CurrentForm->getValue("hohead_id") : $CurrentForm->getValue("x_hohead_id");
		if (!$this->hohead_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->hohead_id->Visible = FALSE; // Disable update for API request
			else
				$this->hohead_id->setFormValue($val);
		}

		// Check field name 'asset_id' first before field var 'x_asset_id'
		$val = $CurrentForm->hasValue("asset_id") ? $CurrentForm->getValue("asset_id") : $CurrentForm->getValue("x_asset_id");
		if (!$this->asset_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->asset_id->Visible = FALSE; // Disable update for API request
			else
				$this->asset_id->setFormValue($val);
		}

		// Check field name 'proc_date' first before field var 'x_proc_date'
		$val = $CurrentForm->hasValue("proc_date") ? $CurrentForm->getValue("proc_date") : $CurrentForm->getValue("x_proc_date");
		if (!$this->proc_date->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->proc_date->Visible = FALSE; // Disable update for API request
			else
				$this->proc_date->setFormValue($val);
			$this->proc_date->CurrentValue = UnFormatDateTime($this->proc_date->CurrentValue, 0);
		}

		// Check field name 'proc_ccost' first before field var 'x_proc_ccost'
		$val = $CurrentForm->hasValue("proc_ccost") ? $CurrentForm->getValue("proc_ccost") : $CurrentForm->getValue("x_proc_ccost");
		if (!$this->proc_ccost->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->proc_ccost->Visible = FALSE; // Disable update for API request
			else
				$this->proc_ccost->setFormValue($val);
		}

		// Check field name 'dep_amount' first before field var 'x_dep_amount'
		$val = $CurrentForm->hasValue("dep_amount") ? $CurrentForm->getValue("dep_amount") : $CurrentForm->getValue("x_dep_amount");
		if (!$this->dep_amount->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->dep_amount->Visible = FALSE; // Disable update for API request
			else
				$this->dep_amount->setFormValue($val);
		}

		// Check field name 'dep_ytd' first before field var 'x_dep_ytd'
		$val = $CurrentForm->hasValue("dep_ytd") ? $CurrentForm->getValue("dep_ytd") : $CurrentForm->getValue("x_dep_ytd");
		if (!$this->dep_ytd->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->dep_ytd->Visible = FALSE; // Disable update for API request
			else
				$this->dep_ytd->setFormValue($val);
		}

		// Check field name 'nb_val' first before field var 'x_nb_val'
		$val = $CurrentForm->hasValue("nb_val") ? $CurrentForm->getValue("nb_val") : $CurrentForm->getValue("x_nb_val");
		if (!$this->nb_val->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->nb_val->Visible = FALSE; // Disable update for API request
			else
				$this->nb_val->setFormValue($val);
		}

		// Check field name 'remarks' first before field var 'x_remarks'
		$val = $CurrentForm->hasValue("remarks") ? $CurrentForm->getValue("remarks") : $CurrentForm->getValue("x_remarks");
		if (!$this->remarks->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->remarks->Visible = FALSE; // Disable update for API request
			else
				$this->remarks->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->hohead_id->CurrentValue = $this->hohead_id->FormValue;
		$this->asset_id->CurrentValue = $this->asset_id->FormValue;
		$this->proc_date->CurrentValue = $this->proc_date->FormValue;
		$this->proc_date->CurrentValue = UnFormatDateTime($this->proc_date->CurrentValue, 0);
		$this->proc_ccost->CurrentValue = $this->proc_ccost->FormValue;
		$this->dep_amount->CurrentValue = $this->dep_amount->FormValue;
		$this->dep_ytd->CurrentValue = $this->dep_ytd->FormValue;
		$this->nb_val->CurrentValue = $this->nb_val->FormValue;
		$this->remarks->CurrentValue = $this->remarks->FormValue;
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
		$this->hohead_id->setDbValue($row['hohead_id']);
		$this->asset_id->setDbValue($row['asset_id']);
		$this->proc_date->setDbValue($row['proc_date']);
		$this->proc_ccost->setDbValue($row['proc_ccost']);
		$this->dep_amount->setDbValue($row['dep_amount']);
		$this->dep_ytd->setDbValue($row['dep_ytd']);
		$this->nb_val->setDbValue($row['nb_val']);
		$this->remarks->setDbValue($row['remarks']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['hohead_id'] = $this->hohead_id->CurrentValue;
		$row['asset_id'] = $this->asset_id->CurrentValue;
		$row['proc_date'] = $this->proc_date->CurrentValue;
		$row['proc_ccost'] = $this->proc_ccost->CurrentValue;
		$row['dep_amount'] = $this->dep_amount->CurrentValue;
		$row['dep_ytd'] = $this->dep_ytd->CurrentValue;
		$row['nb_val'] = $this->nb_val->CurrentValue;
		$row['remarks'] = $this->remarks->CurrentValue;
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
		// Convert decimal values if posted back

		if ($this->proc_ccost->FormValue == $this->proc_ccost->CurrentValue && is_numeric(ConvertToFloatString($this->proc_ccost->CurrentValue)))
			$this->proc_ccost->CurrentValue = ConvertToFloatString($this->proc_ccost->CurrentValue);

		// Convert decimal values if posted back
		if ($this->dep_amount->FormValue == $this->dep_amount->CurrentValue && is_numeric(ConvertToFloatString($this->dep_amount->CurrentValue)))
			$this->dep_amount->CurrentValue = ConvertToFloatString($this->dep_amount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->dep_ytd->FormValue == $this->dep_ytd->CurrentValue && is_numeric(ConvertToFloatString($this->dep_ytd->CurrentValue)))
			$this->dep_ytd->CurrentValue = ConvertToFloatString($this->dep_ytd->CurrentValue);

		// Convert decimal values if posted back
		if ($this->nb_val->FormValue == $this->nb_val->CurrentValue && is_numeric(ConvertToFloatString($this->nb_val->CurrentValue)))
			$this->nb_val->CurrentValue = ConvertToFloatString($this->nb_val->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// hohead_id
		// asset_id
		// proc_date
		// proc_ccost
		// dep_amount
		// dep_ytd
		// nb_val
		// remarks

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// hohead_id
			$this->hohead_id->ViewValue = $this->hohead_id->CurrentValue;
			$this->hohead_id->ViewValue = FormatNumber($this->hohead_id->ViewValue, 0, -2, -2, -2);
			$this->hohead_id->ViewCustomAttributes = "";

			// asset_id
			$this->asset_id->ViewValue = $this->asset_id->CurrentValue;
			$this->asset_id->ViewValue = FormatNumber($this->asset_id->ViewValue, 0, -2, -2, -2);
			$this->asset_id->ViewCustomAttributes = "";

			// proc_date
			$this->proc_date->ViewValue = $this->proc_date->CurrentValue;
			$this->proc_date->ViewValue = FormatDateTime($this->proc_date->ViewValue, 0);
			$this->proc_date->ViewCustomAttributes = "";

			// proc_ccost
			$this->proc_ccost->ViewValue = $this->proc_ccost->CurrentValue;
			$this->proc_ccost->ViewValue = FormatNumber($this->proc_ccost->ViewValue, 2, -2, -2, -2);
			$this->proc_ccost->ViewCustomAttributes = "";

			// dep_amount
			$this->dep_amount->ViewValue = $this->dep_amount->CurrentValue;
			$this->dep_amount->ViewValue = FormatNumber($this->dep_amount->ViewValue, 2, -2, -2, -2);
			$this->dep_amount->ViewCustomAttributes = "";

			// dep_ytd
			$this->dep_ytd->ViewValue = $this->dep_ytd->CurrentValue;
			$this->dep_ytd->ViewValue = FormatNumber($this->dep_ytd->ViewValue, 2, -2, -2, -2);
			$this->dep_ytd->ViewCustomAttributes = "";

			// nb_val
			$this->nb_val->ViewValue = $this->nb_val->CurrentValue;
			$this->nb_val->ViewValue = FormatNumber($this->nb_val->ViewValue, 2, -2, -2, -2);
			$this->nb_val->ViewCustomAttributes = "";

			// remarks
			$this->remarks->ViewValue = $this->remarks->CurrentValue;
			$this->remarks->ViewCustomAttributes = "";

			// hohead_id
			$this->hohead_id->LinkCustomAttributes = "";
			$this->hohead_id->HrefValue = "";
			$this->hohead_id->TooltipValue = "";

			// asset_id
			$this->asset_id->LinkCustomAttributes = "";
			$this->asset_id->HrefValue = "";
			$this->asset_id->TooltipValue = "";

			// proc_date
			$this->proc_date->LinkCustomAttributes = "";
			$this->proc_date->HrefValue = "";
			$this->proc_date->TooltipValue = "";

			// proc_ccost
			$this->proc_ccost->LinkCustomAttributes = "";
			$this->proc_ccost->HrefValue = "";
			$this->proc_ccost->TooltipValue = "";

			// dep_amount
			$this->dep_amount->LinkCustomAttributes = "";
			$this->dep_amount->HrefValue = "";
			$this->dep_amount->TooltipValue = "";

			// dep_ytd
			$this->dep_ytd->LinkCustomAttributes = "";
			$this->dep_ytd->HrefValue = "";
			$this->dep_ytd->TooltipValue = "";

			// nb_val
			$this->nb_val->LinkCustomAttributes = "";
			$this->nb_val->HrefValue = "";
			$this->nb_val->TooltipValue = "";

			// remarks
			$this->remarks->LinkCustomAttributes = "";
			$this->remarks->HrefValue = "";
			$this->remarks->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// hohead_id
			$this->hohead_id->EditAttrs["class"] = "form-control";
			$this->hohead_id->EditCustomAttributes = "";
			if ($this->hohead_id->getSessionValue() != "") {
				$this->hohead_id->CurrentValue = $this->hohead_id->getSessionValue();
				$this->hohead_id->ViewValue = $this->hohead_id->CurrentValue;
				$this->hohead_id->ViewValue = FormatNumber($this->hohead_id->ViewValue, 0, -2, -2, -2);
				$this->hohead_id->ViewCustomAttributes = "";
			} else {
				$this->hohead_id->EditValue = HtmlEncode($this->hohead_id->CurrentValue);
				$this->hohead_id->PlaceHolder = RemoveHtml($this->hohead_id->caption());
			}

			// asset_id
			$this->asset_id->EditAttrs["class"] = "form-control";
			$this->asset_id->EditCustomAttributes = "";
			$this->asset_id->EditValue = HtmlEncode($this->asset_id->CurrentValue);
			$this->asset_id->PlaceHolder = RemoveHtml($this->asset_id->caption());

			// proc_date
			$this->proc_date->EditAttrs["class"] = "form-control";
			$this->proc_date->EditCustomAttributes = "";
			$this->proc_date->EditValue = HtmlEncode(FormatDateTime($this->proc_date->CurrentValue, 8));
			$this->proc_date->PlaceHolder = RemoveHtml($this->proc_date->caption());

			// proc_ccost
			$this->proc_ccost->EditAttrs["class"] = "form-control";
			$this->proc_ccost->EditCustomAttributes = "";
			$this->proc_ccost->EditValue = HtmlEncode($this->proc_ccost->CurrentValue);
			$this->proc_ccost->PlaceHolder = RemoveHtml($this->proc_ccost->caption());
			if (strval($this->proc_ccost->EditValue) != "" && is_numeric($this->proc_ccost->EditValue))
				$this->proc_ccost->EditValue = FormatNumber($this->proc_ccost->EditValue, -2, -2, -2, -2);
			

			// dep_amount
			$this->dep_amount->EditAttrs["class"] = "form-control";
			$this->dep_amount->EditCustomAttributes = "";
			$this->dep_amount->EditValue = HtmlEncode($this->dep_amount->CurrentValue);
			$this->dep_amount->PlaceHolder = RemoveHtml($this->dep_amount->caption());
			if (strval($this->dep_amount->EditValue) != "" && is_numeric($this->dep_amount->EditValue))
				$this->dep_amount->EditValue = FormatNumber($this->dep_amount->EditValue, -2, -2, -2, -2);
			

			// dep_ytd
			$this->dep_ytd->EditAttrs["class"] = "form-control";
			$this->dep_ytd->EditCustomAttributes = "";
			$this->dep_ytd->EditValue = HtmlEncode($this->dep_ytd->CurrentValue);
			$this->dep_ytd->PlaceHolder = RemoveHtml($this->dep_ytd->caption());
			if (strval($this->dep_ytd->EditValue) != "" && is_numeric($this->dep_ytd->EditValue))
				$this->dep_ytd->EditValue = FormatNumber($this->dep_ytd->EditValue, -2, -2, -2, -2);
			

			// nb_val
			$this->nb_val->EditAttrs["class"] = "form-control";
			$this->nb_val->EditCustomAttributes = "";
			$this->nb_val->EditValue = HtmlEncode($this->nb_val->CurrentValue);
			$this->nb_val->PlaceHolder = RemoveHtml($this->nb_val->caption());
			if (strval($this->nb_val->EditValue) != "" && is_numeric($this->nb_val->EditValue))
				$this->nb_val->EditValue = FormatNumber($this->nb_val->EditValue, -2, -2, -2, -2);
			

			// remarks
			$this->remarks->EditAttrs["class"] = "form-control";
			$this->remarks->EditCustomAttributes = "";
			$this->remarks->EditValue = HtmlEncode($this->remarks->CurrentValue);
			$this->remarks->PlaceHolder = RemoveHtml($this->remarks->caption());

			// Add refer script
			// hohead_id

			$this->hohead_id->LinkCustomAttributes = "";
			$this->hohead_id->HrefValue = "";

			// asset_id
			$this->asset_id->LinkCustomAttributes = "";
			$this->asset_id->HrefValue = "";

			// proc_date
			$this->proc_date->LinkCustomAttributes = "";
			$this->proc_date->HrefValue = "";

			// proc_ccost
			$this->proc_ccost->LinkCustomAttributes = "";
			$this->proc_ccost->HrefValue = "";

			// dep_amount
			$this->dep_amount->LinkCustomAttributes = "";
			$this->dep_amount->HrefValue = "";

			// dep_ytd
			$this->dep_ytd->LinkCustomAttributes = "";
			$this->dep_ytd->HrefValue = "";

			// nb_val
			$this->nb_val->LinkCustomAttributes = "";
			$this->nb_val->HrefValue = "";

			// remarks
			$this->remarks->LinkCustomAttributes = "";
			$this->remarks->HrefValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType != ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
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
		if ($this->hohead_id->Required) {
			if (!$this->hohead_id->IsDetailKey && $this->hohead_id->FormValue != NULL && $this->hohead_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->hohead_id->caption(), $this->hohead_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->hohead_id->FormValue)) {
			AddMessage($FormError, $this->hohead_id->errorMessage());
		}
		if ($this->asset_id->Required) {
			if (!$this->asset_id->IsDetailKey && $this->asset_id->FormValue != NULL && $this->asset_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->asset_id->caption(), $this->asset_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->asset_id->FormValue)) {
			AddMessage($FormError, $this->asset_id->errorMessage());
		}
		if ($this->proc_date->Required) {
			if (!$this->proc_date->IsDetailKey && $this->proc_date->FormValue != NULL && $this->proc_date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->proc_date->caption(), $this->proc_date->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->proc_date->FormValue)) {
			AddMessage($FormError, $this->proc_date->errorMessage());
		}
		if ($this->proc_ccost->Required) {
			if (!$this->proc_ccost->IsDetailKey && $this->proc_ccost->FormValue != NULL && $this->proc_ccost->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->proc_ccost->caption(), $this->proc_ccost->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->proc_ccost->FormValue)) {
			AddMessage($FormError, $this->proc_ccost->errorMessage());
		}
		if ($this->dep_amount->Required) {
			if (!$this->dep_amount->IsDetailKey && $this->dep_amount->FormValue != NULL && $this->dep_amount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->dep_amount->caption(), $this->dep_amount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->dep_amount->FormValue)) {
			AddMessage($FormError, $this->dep_amount->errorMessage());
		}
		if ($this->dep_ytd->Required) {
			if (!$this->dep_ytd->IsDetailKey && $this->dep_ytd->FormValue != NULL && $this->dep_ytd->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->dep_ytd->caption(), $this->dep_ytd->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->dep_ytd->FormValue)) {
			AddMessage($FormError, $this->dep_ytd->errorMessage());
		}
		if ($this->nb_val->Required) {
			if (!$this->nb_val->IsDetailKey && $this->nb_val->FormValue != NULL && $this->nb_val->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nb_val->caption(), $this->nb_val->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->nb_val->FormValue)) {
			AddMessage($FormError, $this->nb_val->errorMessage());
		}
		if ($this->remarks->Required) {
			if (!$this->remarks->IsDetailKey && $this->remarks->FormValue != NULL && $this->remarks->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->remarks->caption(), $this->remarks->RequiredErrorMessage));
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

	// Add record
	protected function addRow($rsold = NULL)
	{
		global $Language, $Security;

		// Check referential integrity for master table 't102_ho_detail'
		$validMasterRecord = TRUE;
		$masterFilter = $this->sqlMasterFilter_t101_ho_head();
		if (strval($this->hohead_id->CurrentValue) != "") {
			$masterFilter = str_replace("@id@", AdjustSql($this->hohead_id->CurrentValue, "DB"), $masterFilter);
		} else {
			$validMasterRecord = FALSE;
		}
		if ($validMasterRecord) {
			if (!isset($GLOBALS["t101_ho_head"]))
				$GLOBALS["t101_ho_head"] = new t101_ho_head();
			$rsmaster = $GLOBALS["t101_ho_head"]->loadRs($masterFilter);
			$validMasterRecord = ($rsmaster && !$rsmaster->EOF);
			$rsmaster->close();
		}
		if (!$validMasterRecord) {
			$relatedRecordMsg = str_replace("%t", "t101_ho_head", $Language->phrase("RelatedRecordRequired"));
			$this->setFailureMessage($relatedRecordMsg);
			return FALSE;
		}
		$conn = $this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// hohead_id
		$this->hohead_id->setDbValueDef($rsnew, $this->hohead_id->CurrentValue, 0, FALSE);

		// asset_id
		$this->asset_id->setDbValueDef($rsnew, $this->asset_id->CurrentValue, 0, FALSE);

		// proc_date
		$this->proc_date->setDbValueDef($rsnew, UnFormatDateTime($this->proc_date->CurrentValue, 0), CurrentDate(), FALSE);

		// proc_ccost
		$this->proc_ccost->setDbValueDef($rsnew, $this->proc_ccost->CurrentValue, 0, strval($this->proc_ccost->CurrentValue) == "");

		// dep_amount
		$this->dep_amount->setDbValueDef($rsnew, $this->dep_amount->CurrentValue, 0, strval($this->dep_amount->CurrentValue) == "");

		// dep_ytd
		$this->dep_ytd->setDbValueDef($rsnew, $this->dep_ytd->CurrentValue, 0, strval($this->dep_ytd->CurrentValue) == "");

		// nb_val
		$this->nb_val->setDbValueDef($rsnew, $this->nb_val->CurrentValue, 0, strval($this->nb_val->CurrentValue) == "");

		// remarks
		$this->remarks->setDbValueDef($rsnew, $this->remarks->CurrentValue, NULL, FALSE);

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

	// Set up master/detail based on QueryString
	protected function setupMasterParms()
	{
		$validMaster = FALSE;

		// Get the keys for master table
		if (($master = Get(Config("TABLE_SHOW_MASTER")) ?: Get(Config("TABLE_MASTER"))) !== NULL) {
			$masterTblVar = $master;
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "t101_ho_head") {
				$validMaster = TRUE;
				if (($parm = Get("fk_id") ?: Get("hohead_id")) !== NULL) {
					$GLOBALS["t101_ho_head"]->id->setQueryStringValue($parm);
					$this->hohead_id->setQueryStringValue($GLOBALS["t101_ho_head"]->id->QueryStringValue);
					$this->hohead_id->setSessionValue($this->hohead_id->QueryStringValue);
					if (!is_numeric($GLOBALS["t101_ho_head"]->id->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
		} elseif (($master = Post(Config("TABLE_SHOW_MASTER")) ?: Post(Config("TABLE_MASTER"))) !== NULL) {
			$masterTblVar = $master;
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "t101_ho_head") {
				$validMaster = TRUE;
				if (($parm = Post("fk_id") ?: Post("hohead_id")) !== NULL) {
					$GLOBALS["t101_ho_head"]->id->setFormValue($parm);
					$this->hohead_id->setFormValue($GLOBALS["t101_ho_head"]->id->FormValue);
					$this->hohead_id->setSessionValue($this->hohead_id->FormValue);
					if (!is_numeric($GLOBALS["t101_ho_head"]->id->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
		}
		if ($validMaster) {

			// Save current master table
			$this->setCurrentMasterTable($masterTblVar);

			// Reset start record counter (new master key)
			if (!$this->isAddOrEdit()) {
				$this->StartRecord = 1;
				$this->setStartRecordNumber($this->StartRecord);
			}

			// Clear previous master key from Session
			if ($masterTblVar != "t101_ho_head") {
				if ($this->hohead_id->CurrentValue == "")
					$this->hohead_id->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $this->getMasterFilter(); // Get master filter
		$this->DbDetailFilter = $this->getDetailFilter(); // Get detail filter
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("t102_ho_detaillist.php"), "", $this->TableVar, TRUE);
		$pageId = ($this->isCopy()) ? "Copy" : "Add";
		$Breadcrumb->add("add", $pageId, $url);
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
} // End class
?>