<?php
//define BOOLEAN constants
define('BOOL_TRUE', 1);
define('BOOL_FALSE', 0);


 define('SOCIETY_CODE_ALPHA', 'EZS');

//define SITE related constants
define('SITE_NAME', 'Track Property');
define('URL_EXTENSION', 'html');
define('COLLAGENAME', 'JIT');
@define('ENCRYPTIONKEY', Configure::read('Security.salt'));
@define('SITE_LINK', Configure::read('URL'));
@define('HOME_PAGE_URL', '/');
@define('ROOT_URL', '');
@define('DEFAULT_LANGUAGE', 'english');

@define('PAGINATION_LIMIT', 20);

// User Role
define('ADMIN_ROLE_ID', 1);
define('COMPANY_ADMIN_ROLE_ID', 2);
define('DESIGN_ROLE_ID', 3);
define('TOOL_ROOM_ROLE_ID', 4);
define('HR_ROLE_ID', 5);


//define user PERMISSION related constants
define('CREATE_PERMISSION_ID', 1);
define('READ_PERMISSION_ID', 2);
define('UPDATE_PERMISSION_ID', 3);
define('DELETE_PERMISSION_ID', 4);

// Income frequency type constance
define('INCOME_FREQUENCY_MONTHLY', 1);
define('INCOME_FREQUENCY_QUATERLY', 2);
define('INCOME_FREQUENCY_HALFYEARLY', 3);
define('INCOME_FREQUENCY_YEARLY', 4);

// Wheeler Type
define('TWO_WHEElLER', 1);
define('FOUR_WHEElLER', 2);
//Engine Type

define('ENGINE_TYPE_ELECTRIC', 1);
define('ENGINE_TYPE_FUEL', 2);

// Complaint Type
define('INDIVIDUAL_COMPLAINT', 1);
define('COMMUNITY_COMPLAINT', 2);

// Payment trnction tranction type raleted constance
define('INCOME_TYPE_PAYMENT', 1);

//define groups
define('GROUP_VENDOR_ID', 2);
define('GROUP_SUNDRY_DEBTORS_ID', 13);
define('GROUP_BANK_ACCOUNT_ID',1);
define('GROUP_INDIRECT_EXPENSES_ID',21);
define('GROUP_DIRECT_EXPENSES_ID',10);
define('GROUP_INDIRECT_INCOME_ID',6);
define('GROUP_DIRECT_INCOME_ID',5);
?>