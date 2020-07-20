# TYPO3 template extension for customer installations

This project contains the basic configuration and customer specific layout

## How to use
go to terminal, navigate to public/typo3conf/ext and execute
````bash
git clone https://git.riconnect.de/riconet/rico_templates_bunk.git
````
go to git.riconnect.de and create a new project with rico_templates_bunk_[customername]
````bash
git remote add -t \* -f origin [URL to new repository]
````
````bash
git pull origin master
````
````bash
Replace all paths from rico_templates_bunk to rico_templates_bunk_[customername]
 - tx_ricotemplates_bunk
 - rico_templates_bunk
 - RicoTemplatesBunk
````
````bash
git push origin master
````

### Supported TYPO3 version
* 9.5.x

### Dependencies
* gridelements 9
* gridelements 8.4

### Frontend dependencies
* bootstrap 4
* jquery 3

## How to run local tests

| Type              | command                     |
|-------------------|-----------------------------|
| Build the project | `composer build`            |
| Quality tools     | `composer quality`          |
| Lint PHP          | `composer lint`             |
| Find debugs       | `composer find-debugs`      |
| Unit tests        | `composer unit-tests`       |
| Functional tests  | `composer functional-tests` |
