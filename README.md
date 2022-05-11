# Kataboard Local Runner

## Commands

### Run workplace with examples and usage of module

php ./scripts/LocalRunner/run.php -w workplaceDirName

Command options:
* -w {{workplaceId}} | Specify workplace to run
* -s {{solutionId}} | Specify solution id of workplace (subpath name of workplace), by default will be selected first dir after scan

**example:** php ./scripts/LocalRunner/run.php -w InsertionSorting

### Run tests for workplace

php ./scripts/LocalRunner/runTests.php -w InsertionSorting

**example:** php ./scripts/LocalRunner/runTests.php -w InsertionSorting


