<?php
namespace PHPMaker2020\p_assettracker1_0;

/**
 * Page class
 */
class t101_ho_head_add extends t101_ho_head
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{A1916BF1-858E-4493-B275-C510122AD7E3}";

	// Table name
	public $TableName = 't101_ho_head';

	// Page object name
	public $PageObjName = "t101_ho_head_add";

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

		// Table object (t201_users)
		if (!isset($GLOBALS['t201_users']))
			$GLOBALS['t201_users'] = new t201_users();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

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

			// Handle modal response
			if ($this->IsModal) { // Show as modal
				$row = ["url" => $url, "modal" => "1"];
				$pageName = GetPageName($url);
				if ($pageName != $this->getListUrl()) { // Not List page
					$row["caption"] = $this->getModalCaption($pageName);
					if ($pageName == "t101_ho_headview.php")
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
					$this->terminate(GetUrl("t101_ho_headlist.php"));
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
		$this->setupLookupOptions($this->ho_to);
		$this->setupLookupOptions($this->dept_to);
		$this->setupLookupOptions($this->ho_by);
		$this->setupLookupOptions($this->dept_by);
		$this->setupLookupOptions($this->sign1);
		$this->setupLookupOptions($this->sign2);
		$this->setupLookupOptions($this->sign3);
		$this->setupLookupOptions($this->sign4);

		// Check permission
		if (!$Security->canAdd()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("t101_ho_headlist.php");
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

		// Set up detail parameters
		$this->setupDetailParms();

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
					$this->terminate("t101_ho_headlist.php"); // No matching record, return to list
				}

				// Set up detail parameters
				$this->setupDetailParms();
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					if ($this->getCurrentDetailTable() != "") // Master/detail add
						$returnUrl = $this->getDetailUrl();
					else
						$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "t101_ho_headlist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "t101_ho_headview.php")
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

					// Set up detail parameters
					$this->setupDetailParms();
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

		// Check field name 'tr_date' first before field var 'x_tr_date'
		$val = $CurrentForm->hasValue("tr_date") ? $CurrentForm->getValue("tr_date") : $CurrentForm->getValue("x_tr_date");
		if (!$this->tr_date->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->tr_date->Visible = FALSE; // Disable update for API request
			else
				$this->tr_date->setFormValue($val);
			$this->tr_date->CurrentValue = UnFormatDateTime($this->tr_date->CurrentValue, 7);
		}

		// Check field name 'ho_to' first before field var 'x_ho_to'
		$val = $CurrentForm->hasValue("ho_to") ? $CurrentForm->getValue("ho_to") : $CurrentForm->getValue("x_ho_to");
		if (!$this->ho_to->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ho_to->Visible = FALSE; // Disable update for API request
			else
				$this->ho_to->setFormValue($val);
		}

		// Check field name 'cno_to' first before field var 'x_cno_to'
		$val = $CurrentForm->hasValue("cno_to") ? $CurrentForm->getValue("cno_to") : $CurrentForm->getValue("x_cno_to");
		if (!$this->cno_to->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->cno_to->Visible = FALSE; // Disable update for API request
			else
				$this->cno_to->setFormValue($val);
		}

		// Check field name 'dept_to' first before field var 'x_dept_to'
		$val = $CurrentForm->hasValue("dept_to") ? $CurrentForm->getValue("dept_to") : $CurrentForm->getValue("x_dept_to");
		if (!$this->dept_to->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->dept_to->Visible = FALSE; // Disable update for API request
			else
				$this->dept_to->setFormValue($val);
		}

		// Check field name 'ho_by' first before field var 'x_ho_by'
		$val = $CurrentForm->hasValue("ho_by") ? $CurrentForm->getValue("ho_by") : $CurrentForm->getValue("x_ho_by");
		if (!$this->ho_by->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ho_by->Visible = FALSE; // Disable update for API request
			else
				$this->ho_by->setFormValue($val);
		}

		// Check field name 'cno_by' first before field var 'x_cno_by'
		$val = $CurrentForm->hasValue("cno_by") ? $CurrentForm->getValue("cno_by") : $CurrentForm->getValue("x_cno_by");
		if (!$this->cno_by->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->cno_by->Visible = FALSE; // Disable update for API request
			else
				$this->cno_by->setFormValue($val);
		}

		// Check field name 'dept_by' first before field var 'x_dept_by'
		$val = $CurrentForm->hasValue("dept_by") ? $CurrentForm->getValue("dept_by") : $CurrentForm->getValue("x_dept_by");
		if (!$this->dept_by->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->dept_by->Visible = FALSE; // Disable update for API request
			else
				$this->dept_by->setFormValue($val);
		}

		// Check field name 'sign1' first before field var 'x_sign1'
		$val = $CurrentForm->hasValue("sign1") ? $CurrentForm->getValue("sign1") : $CurrentForm->getValue("x_sign1");
		if (!$this->sign1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->sign1->Visible = FALSE; // Disable update for API request
			else
				$this->sign1->setFormValue($val);
		}

		// Check field name 'sign2' first before field var 'x_sign2'
		$val = $CurrentForm->hasValue("sign2") ? $CurrentForm->getValue("sign2") : $CurrentForm->getValue("x_sign2");
		if (!$this->sign2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->sign2->Visible = FALSE; // Disable update for API request
			else
				$this->sign2->setFormValue($val);
		}

		// Check field name 'sign3' first before field var 'x_sign3'
		$val = $CurrentForm->hasValue("sign3") ? $CurrentForm->getValue("sign3") : $CurrentForm->getValue("x_sign3");
		if (!$this->sign3->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->sign3->Visible = FALSE; // Disable update for API request
			else
				$this->sign3->setFormValue($val);
		}

		// Check field name 'sign4' first before field var 'x_sign4'
		$val = $CurrentForm->hasValue("sign4") ? $CurrentForm->getValue("sign4") : $CurrentForm->getValue("x_sign4");
		if (!$this->sign4->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->sign4->Visible = FALSE; // Disable update for API request
			else
				$this->sign4->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
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

		// Validate detail grid
		$detailTblVar = explode(",", $this->getCurrentDetailTable());
		if (in_array("t102_ho_detail", $detailTblVar) && $GLOBALS["t102_ho_detail"]->DetailAdd) {
			if (!isset($GLOBALS["t102_ho_detail_grid"]))
				$GLOBALS["t102_ho_detail_grid"] = new t102_ho_detail_grid(); // Get detail page object
			$GLOBALS["t102_ho_detail_grid"]->validateGridForm();
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

		// Begin transaction
		if ($this->getCurrentDetailTable() != "")
			$conn->beginTrans();

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

		// Add detail records
		if ($addRow) {
			$detailTblVar = explode(",", $this->getCurrentDetailTable());
			if (in_array("t102_ho_detail", $detailTblVar) && $GLOBALS["t102_ho_detail"]->DetailAdd) {
				$GLOBALS["t102_ho_detail"]->hohead_id->setSessionValue($this->id->CurrentValue); // Set master key
				if (!isset($GLOBALS["t102_ho_detail_grid"]))
					$GLOBALS["t102_ho_detail_grid"] = new t102_ho_detail_grid(); // Get detail page object
				$Security->loadCurrentUserLevel($this->ProjectID . "t102_ho_detail"); // Load user level of detail table
				$addRow = $GLOBALS["t102_ho_detail_grid"]->gridInsert();
				$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
				if (!$addRow) {
					$GLOBALS["t102_ho_detail"]->hohead_id->setSessionValue(""); // Clear master key if insert failed
				}
			}
		}

		// Commit/Rollback transaction
		if ($this->getCurrentDetailTable() != "") {
			if ($addRow) {
				$conn->commitTrans(); // Commit transaction
			} else {
				$conn->rollbackTrans(); // Rollback transaction
			}
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

	// Set up detail parms based on QueryString
	protected function setupDetailParms()
	{

		// Get the keys for master table
		$detailTblVar = Get(Config("TABLE_SHOW_DETAIL"));
		if ($detailTblVar !== NULL) {
			$this->setCurrentDetailTable($detailTblVar);
		} else {
			$detailTblVar = $this->getCurrentDetailTable();
		}
		if ($detailTblVar != "") {
			$detailTblVar = explode(",", $detailTblVar);
			if (in_array("t102_ho_detail", $detailTblVar)) {
				if (!isset($GLOBALS["t102_ho_detail_grid"]))
					$GLOBALS["t102_ho_detail_grid"] = new t102_ho_detail_grid();
				if ($GLOBALS["t102_ho_detail_grid"]->DetailAdd) {
					if ($this->CopyRecord)
						$GLOBALS["t102_ho_detail_grid"]->CurrentMode = "copy";
					else
						$GLOBALS["t102_ho_detail_grid"]->CurrentMode = "add";
					$GLOBALS["t102_ho_detail_grid"]->CurrentAction = "gridadd";

					// Save current master table to detail table
					$GLOBALS["t102_ho_detail_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["t102_ho_detail_grid"]->setStartRecordNumber(1);
					$GLOBALS["t102_ho_detail_grid"]->hohead_id->IsDetailKey = TRUE;
					$GLOBALS["t102_ho_detail_grid"]->hohead_id->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["t102_ho_detail_grid"]->hohead_id->setSessionValue($GLOBALS["t102_ho_detail_grid"]->hohead_id->CurrentValue);
				}
			}
		}
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("t101_ho_headlist.php"), "", $this->TableVar, TRUE);
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