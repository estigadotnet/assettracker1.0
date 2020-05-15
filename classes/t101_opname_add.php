<?php
namespace PHPMaker2020\p_assettracker1_0;

/**
 * Page class
 */
class t101_opname_add extends t101_opname
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{A1916BF1-858E-4493-B275-C510122AD7E3}";

	// Table name
	public $TableName = 't101_opname';

	// Page object name
	public $PageObjName = "t101_opname_add";

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

		// Table object (t101_opname)
		if (!isset($GLOBALS["t101_opname"]) || get_class($GLOBALS["t101_opname"]) == PROJECT_NAMESPACE . "t101_opname") {
			$GLOBALS["t101_opname"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["t101_opname"];
		}

		// Table object (t201_users)
		if (!isset($GLOBALS['t201_users']))
			$GLOBALS['t201_users'] = new t201_users();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 't101_opname');

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
		global $t101_opname;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($t101_opname);
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
					if ($pageName == "t101_opnameview.php")
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
					$this->terminate(GetUrl("t101_opnamelist.php"));
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
		$this->OpnameDate->setVisibility();
		$this->property_id->setVisibility();
		$this->location_id->setVisibility();
		$this->asset_id->setVisibility();
		$this->signature_id->setVisibility();
		$this->Actual->setVisibility();
		$this->OpnameQty->setVisibility();
		$this->Diff->setVisibility();
		$this->Remarks->setVisibility();
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
			$this->terminate("t101_opnamelist.php");
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
					$this->terminate("t101_opnamelist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "t101_opnamelist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "t101_opnameview.php")
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
		$this->OpnameDate->CurrentValue = NULL;
		$this->OpnameDate->OldValue = $this->OpnameDate->CurrentValue;
		$this->property_id->CurrentValue = NULL;
		$this->property_id->OldValue = $this->property_id->CurrentValue;
		$this->location_id->CurrentValue = NULL;
		$this->location_id->OldValue = $this->location_id->CurrentValue;
		$this->asset_id->CurrentValue = NULL;
		$this->asset_id->OldValue = $this->asset_id->CurrentValue;
		$this->signature_id->CurrentValue = NULL;
		$this->signature_id->OldValue = $this->signature_id->CurrentValue;
		$this->Actual->CurrentValue = 0.00;
		$this->OpnameQty->CurrentValue = 0.00;
		$this->Diff->CurrentValue = 0.00;
		$this->Remarks->CurrentValue = NULL;
		$this->Remarks->OldValue = $this->Remarks->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'OpnameDate' first before field var 'x_OpnameDate'
		$val = $CurrentForm->hasValue("OpnameDate") ? $CurrentForm->getValue("OpnameDate") : $CurrentForm->getValue("x_OpnameDate");
		if (!$this->OpnameDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->OpnameDate->Visible = FALSE; // Disable update for API request
			else
				$this->OpnameDate->setFormValue($val);
			$this->OpnameDate->CurrentValue = UnFormatDateTime($this->OpnameDate->CurrentValue, 0);
		}

		// Check field name 'property_id' first before field var 'x_property_id'
		$val = $CurrentForm->hasValue("property_id") ? $CurrentForm->getValue("property_id") : $CurrentForm->getValue("x_property_id");
		if (!$this->property_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->property_id->Visible = FALSE; // Disable update for API request
			else
				$this->property_id->setFormValue($val);
		}

		// Check field name 'location_id' first before field var 'x_location_id'
		$val = $CurrentForm->hasValue("location_id") ? $CurrentForm->getValue("location_id") : $CurrentForm->getValue("x_location_id");
		if (!$this->location_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->location_id->Visible = FALSE; // Disable update for API request
			else
				$this->location_id->setFormValue($val);
		}

		// Check field name 'asset_id' first before field var 'x_asset_id'
		$val = $CurrentForm->hasValue("asset_id") ? $CurrentForm->getValue("asset_id") : $CurrentForm->getValue("x_asset_id");
		if (!$this->asset_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->asset_id->Visible = FALSE; // Disable update for API request
			else
				$this->asset_id->setFormValue($val);
		}

		// Check field name 'signature_id' first before field var 'x_signature_id'
		$val = $CurrentForm->hasValue("signature_id") ? $CurrentForm->getValue("signature_id") : $CurrentForm->getValue("x_signature_id");
		if (!$this->signature_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->signature_id->Visible = FALSE; // Disable update for API request
			else
				$this->signature_id->setFormValue($val);
		}

		// Check field name 'Actual' first before field var 'x_Actual'
		$val = $CurrentForm->hasValue("Actual") ? $CurrentForm->getValue("Actual") : $CurrentForm->getValue("x_Actual");
		if (!$this->Actual->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Actual->Visible = FALSE; // Disable update for API request
			else
				$this->Actual->setFormValue($val);
		}

		// Check field name 'OpnameQty' first before field var 'x_OpnameQty'
		$val = $CurrentForm->hasValue("OpnameQty") ? $CurrentForm->getValue("OpnameQty") : $CurrentForm->getValue("x_OpnameQty");
		if (!$this->OpnameQty->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->OpnameQty->Visible = FALSE; // Disable update for API request
			else
				$this->OpnameQty->setFormValue($val);
		}

		// Check field name 'Diff' first before field var 'x_Diff'
		$val = $CurrentForm->hasValue("Diff") ? $CurrentForm->getValue("Diff") : $CurrentForm->getValue("x_Diff");
		if (!$this->Diff->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Diff->Visible = FALSE; // Disable update for API request
			else
				$this->Diff->setFormValue($val);
		}

		// Check field name 'Remarks' first before field var 'x_Remarks'
		$val = $CurrentForm->hasValue("Remarks") ? $CurrentForm->getValue("Remarks") : $CurrentForm->getValue("x_Remarks");
		if (!$this->Remarks->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Remarks->Visible = FALSE; // Disable update for API request
			else
				$this->Remarks->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->OpnameDate->CurrentValue = $this->OpnameDate->FormValue;
		$this->OpnameDate->CurrentValue = UnFormatDateTime($this->OpnameDate->CurrentValue, 0);
		$this->property_id->CurrentValue = $this->property_id->FormValue;
		$this->location_id->CurrentValue = $this->location_id->FormValue;
		$this->asset_id->CurrentValue = $this->asset_id->FormValue;
		$this->signature_id->CurrentValue = $this->signature_id->FormValue;
		$this->Actual->CurrentValue = $this->Actual->FormValue;
		$this->OpnameQty->CurrentValue = $this->OpnameQty->FormValue;
		$this->Diff->CurrentValue = $this->Diff->FormValue;
		$this->Remarks->CurrentValue = $this->Remarks->FormValue;
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
		$this->OpnameDate->setDbValue($row['OpnameDate']);
		$this->property_id->setDbValue($row['property_id']);
		$this->location_id->setDbValue($row['location_id']);
		$this->asset_id->setDbValue($row['asset_id']);
		$this->signature_id->setDbValue($row['signature_id']);
		$this->Actual->setDbValue($row['Actual']);
		$this->OpnameQty->setDbValue($row['OpnameQty']);
		$this->Diff->setDbValue($row['Diff']);
		$this->Remarks->setDbValue($row['Remarks']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['OpnameDate'] = $this->OpnameDate->CurrentValue;
		$row['property_id'] = $this->property_id->CurrentValue;
		$row['location_id'] = $this->location_id->CurrentValue;
		$row['asset_id'] = $this->asset_id->CurrentValue;
		$row['signature_id'] = $this->signature_id->CurrentValue;
		$row['Actual'] = $this->Actual->CurrentValue;
		$row['OpnameQty'] = $this->OpnameQty->CurrentValue;
		$row['Diff'] = $this->Diff->CurrentValue;
		$row['Remarks'] = $this->Remarks->CurrentValue;
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

		if ($this->Actual->FormValue == $this->Actual->CurrentValue && is_numeric(ConvertToFloatString($this->Actual->CurrentValue)))
			$this->Actual->CurrentValue = ConvertToFloatString($this->Actual->CurrentValue);

		// Convert decimal values if posted back
		if ($this->OpnameQty->FormValue == $this->OpnameQty->CurrentValue && is_numeric(ConvertToFloatString($this->OpnameQty->CurrentValue)))
			$this->OpnameQty->CurrentValue = ConvertToFloatString($this->OpnameQty->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Diff->FormValue == $this->Diff->CurrentValue && is_numeric(ConvertToFloatString($this->Diff->CurrentValue)))
			$this->Diff->CurrentValue = ConvertToFloatString($this->Diff->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
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

		if ($this->RowType == ROWTYPE_VIEW) { // View row

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
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// OpnameDate
			$this->OpnameDate->EditAttrs["class"] = "form-control";
			$this->OpnameDate->EditCustomAttributes = "";
			$this->OpnameDate->EditValue = HtmlEncode(FormatDateTime($this->OpnameDate->CurrentValue, 8));
			$this->OpnameDate->PlaceHolder = RemoveHtml($this->OpnameDate->caption());

			// property_id
			$this->property_id->EditAttrs["class"] = "form-control";
			$this->property_id->EditCustomAttributes = "";
			$this->property_id->EditValue = HtmlEncode($this->property_id->CurrentValue);
			$this->property_id->PlaceHolder = RemoveHtml($this->property_id->caption());

			// location_id
			$this->location_id->EditAttrs["class"] = "form-control";
			$this->location_id->EditCustomAttributes = "";
			$this->location_id->EditValue = HtmlEncode($this->location_id->CurrentValue);
			$this->location_id->PlaceHolder = RemoveHtml($this->location_id->caption());

			// asset_id
			$this->asset_id->EditAttrs["class"] = "form-control";
			$this->asset_id->EditCustomAttributes = "";
			$this->asset_id->EditValue = HtmlEncode($this->asset_id->CurrentValue);
			$this->asset_id->PlaceHolder = RemoveHtml($this->asset_id->caption());

			// signature_id
			$this->signature_id->EditAttrs["class"] = "form-control";
			$this->signature_id->EditCustomAttributes = "";
			$this->signature_id->EditValue = HtmlEncode($this->signature_id->CurrentValue);
			$this->signature_id->PlaceHolder = RemoveHtml($this->signature_id->caption());

			// Actual
			$this->Actual->EditAttrs["class"] = "form-control";
			$this->Actual->EditCustomAttributes = "";
			$this->Actual->EditValue = HtmlEncode($this->Actual->CurrentValue);
			$this->Actual->PlaceHolder = RemoveHtml($this->Actual->caption());
			if (strval($this->Actual->EditValue) != "" && is_numeric($this->Actual->EditValue))
				$this->Actual->EditValue = FormatNumber($this->Actual->EditValue, -2, -2, -2, -2);
			

			// OpnameQty
			$this->OpnameQty->EditAttrs["class"] = "form-control";
			$this->OpnameQty->EditCustomAttributes = "";
			$this->OpnameQty->EditValue = HtmlEncode($this->OpnameQty->CurrentValue);
			$this->OpnameQty->PlaceHolder = RemoveHtml($this->OpnameQty->caption());
			if (strval($this->OpnameQty->EditValue) != "" && is_numeric($this->OpnameQty->EditValue))
				$this->OpnameQty->EditValue = FormatNumber($this->OpnameQty->EditValue, -2, -2, -2, -2);
			

			// Diff
			$this->Diff->EditAttrs["class"] = "form-control";
			$this->Diff->EditCustomAttributes = "";
			$this->Diff->EditValue = HtmlEncode($this->Diff->CurrentValue);
			$this->Diff->PlaceHolder = RemoveHtml($this->Diff->caption());
			if (strval($this->Diff->EditValue) != "" && is_numeric($this->Diff->EditValue))
				$this->Diff->EditValue = FormatNumber($this->Diff->EditValue, -2, -2, -2, -2);
			

			// Remarks
			$this->Remarks->EditAttrs["class"] = "form-control";
			$this->Remarks->EditCustomAttributes = "";
			$this->Remarks->EditValue = HtmlEncode($this->Remarks->CurrentValue);
			$this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

			// Add refer script
			// OpnameDate

			$this->OpnameDate->LinkCustomAttributes = "";
			$this->OpnameDate->HrefValue = "";

			// property_id
			$this->property_id->LinkCustomAttributes = "";
			$this->property_id->HrefValue = "";

			// location_id
			$this->location_id->LinkCustomAttributes = "";
			$this->location_id->HrefValue = "";

			// asset_id
			$this->asset_id->LinkCustomAttributes = "";
			$this->asset_id->HrefValue = "";

			// signature_id
			$this->signature_id->LinkCustomAttributes = "";
			$this->signature_id->HrefValue = "";

			// Actual
			$this->Actual->LinkCustomAttributes = "";
			$this->Actual->HrefValue = "";

			// OpnameQty
			$this->OpnameQty->LinkCustomAttributes = "";
			$this->OpnameQty->HrefValue = "";

			// Diff
			$this->Diff->LinkCustomAttributes = "";
			$this->Diff->HrefValue = "";

			// Remarks
			$this->Remarks->LinkCustomAttributes = "";
			$this->Remarks->HrefValue = "";
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
		if ($this->OpnameDate->Required) {
			if (!$this->OpnameDate->IsDetailKey && $this->OpnameDate->FormValue != NULL && $this->OpnameDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OpnameDate->caption(), $this->OpnameDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->OpnameDate->FormValue)) {
			AddMessage($FormError, $this->OpnameDate->errorMessage());
		}
		if ($this->property_id->Required) {
			if (!$this->property_id->IsDetailKey && $this->property_id->FormValue != NULL && $this->property_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->property_id->caption(), $this->property_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->property_id->FormValue)) {
			AddMessage($FormError, $this->property_id->errorMessage());
		}
		if ($this->location_id->Required) {
			if (!$this->location_id->IsDetailKey && $this->location_id->FormValue != NULL && $this->location_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->location_id->caption(), $this->location_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->location_id->FormValue)) {
			AddMessage($FormError, $this->location_id->errorMessage());
		}
		if ($this->asset_id->Required) {
			if (!$this->asset_id->IsDetailKey && $this->asset_id->FormValue != NULL && $this->asset_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->asset_id->caption(), $this->asset_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->asset_id->FormValue)) {
			AddMessage($FormError, $this->asset_id->errorMessage());
		}
		if ($this->signature_id->Required) {
			if (!$this->signature_id->IsDetailKey && $this->signature_id->FormValue != NULL && $this->signature_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->signature_id->caption(), $this->signature_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->signature_id->FormValue)) {
			AddMessage($FormError, $this->signature_id->errorMessage());
		}
		if ($this->Actual->Required) {
			if (!$this->Actual->IsDetailKey && $this->Actual->FormValue != NULL && $this->Actual->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Actual->caption(), $this->Actual->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Actual->FormValue)) {
			AddMessage($FormError, $this->Actual->errorMessage());
		}
		if ($this->OpnameQty->Required) {
			if (!$this->OpnameQty->IsDetailKey && $this->OpnameQty->FormValue != NULL && $this->OpnameQty->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OpnameQty->caption(), $this->OpnameQty->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->OpnameQty->FormValue)) {
			AddMessage($FormError, $this->OpnameQty->errorMessage());
		}
		if ($this->Diff->Required) {
			if (!$this->Diff->IsDetailKey && $this->Diff->FormValue != NULL && $this->Diff->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Diff->caption(), $this->Diff->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Diff->FormValue)) {
			AddMessage($FormError, $this->Diff->errorMessage());
		}
		if ($this->Remarks->Required) {
			if (!$this->Remarks->IsDetailKey && $this->Remarks->FormValue != NULL && $this->Remarks->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Remarks->caption(), $this->Remarks->RequiredErrorMessage));
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
		$conn = $this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// OpnameDate
		$this->OpnameDate->setDbValueDef($rsnew, UnFormatDateTime($this->OpnameDate->CurrentValue, 0), CurrentDate(), FALSE);

		// property_id
		$this->property_id->setDbValueDef($rsnew, $this->property_id->CurrentValue, 0, FALSE);

		// location_id
		$this->location_id->setDbValueDef($rsnew, $this->location_id->CurrentValue, 0, FALSE);

		// asset_id
		$this->asset_id->setDbValueDef($rsnew, $this->asset_id->CurrentValue, 0, FALSE);

		// signature_id
		$this->signature_id->setDbValueDef($rsnew, $this->signature_id->CurrentValue, 0, FALSE);

		// Actual
		$this->Actual->setDbValueDef($rsnew, $this->Actual->CurrentValue, 0, strval($this->Actual->CurrentValue) == "");

		// OpnameQty
		$this->OpnameQty->setDbValueDef($rsnew, $this->OpnameQty->CurrentValue, 0, strval($this->OpnameQty->CurrentValue) == "");

		// Diff
		$this->Diff->setDbValueDef($rsnew, $this->Diff->CurrentValue, 0, strval($this->Diff->CurrentValue) == "");

		// Remarks
		$this->Remarks->setDbValueDef($rsnew, $this->Remarks->CurrentValue, NULL, FALSE);

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

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("t101_opnamelist.php"), "", $this->TableVar, TRUE);
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