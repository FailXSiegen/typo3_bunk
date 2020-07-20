# 

## apache

### webp

````
<IfModule mod_rewrite.c>
  RewriteEngine On
  RewriteCond %{HTTP_ACCEPT} image/webp
  RewriteCond %{REQUEST_URI}  (?i)(.*)(\.jpe?g|\.png)$
  RewriteCond %{DOCUMENT_ROOT}/deploy/current/public/%1%2.webp -f
  RewriteRule (?i)(.*)(\.jpe?g|\.png)$ %1%2\.webp [L,T=image/webp,R]
</IfModule>

<IfModule mod_headers.c>
  Header append Vary Accept env=REDIRECT_accept
</IfModule>

AddType image/webp .webp
````

### https

````
RewriteCond %{HTTPS} off
RewriteRule (.*) https://%{HTTP_HOST}%{REQUEST_URI} [R=301,L]
````

### favicon

````
Redirect 301 favicon.ico /typo3conf/ext/rico_templates_xxx/Resources/Public/Images/favicon.ico
````

## Installation
Clone this project and run ``composer install``.

## Customer specific extensions
To use "local extensions" you have to register a path to the extension directory.
````json
    "repositories": [
        {
            "type": "path",
            "url": "extensions/your_ext_key"
        }
    ]
````
Also require the extension.
````json
    "require": {
        "vendor/your-ext-key": "@dev"
    }
````

## How to run the tests
To run tests, quality checks and build, execute the script `Build/Scripts/runTests.sh`.

### The test runner script options
Options:

    -s <...>
        Specifies which test suite to run
            - acceptance: acceptance tests
            - side-runner: Runs the selenium side runner.

    -e "<test options>"
        Only with -s acceptance
        Additional options to send to codeception tests.

    -h
        Show this help.

Examples:

    build/scripts/runTests.sh -s acceptance
    build/scripts/runTests.sh -s acceptance -e tests/Acceptance/SigninCest
    build/scripts/runTests.sh -s side-runner
