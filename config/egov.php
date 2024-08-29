<?php

return [
    'dev' => env('EGOV_DEV', true),
    'test' => env('EGOV_TEST', false),
    'software_id' => env('EGOV_SOFTWARE_ID'),
    'api_key' => env('EGOV_API_KEY'),
    'redirect_uri' => env('EGOV_REDIRECT_URI'),
    'account_path' => env('ACCOUNT_PATH', 'https://account.e-gov.go.jp'),
    'account_dev_path' => env('ACCOUNT_DEV_PATH', 'https://account2.sbx.e-gov.go.jp'),
    'api_path' => env('API_PATH', 'https://api.e-gov.go.jp/shinsei/v2'),
    'api_dev_path' => env('API_DEV_PATH', 'https://api2.sbx.e-gov.go.jp/shinsei/v2')
];
