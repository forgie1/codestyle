# ArtFocus Coding Standards for PHP CodeSniffer

* Based [Consistence](https://github.com/consistence/coding-standard/tree/master/Consistence).
* But it differs in some cases and all of them are TEMPORARY (back-compatibility):
** Arrays: Arrays without key are allowed also when the first key is specified (Nette\Database $criteria).
** Classes: Multiple classes can be found in one file (exceptions).
** Constants: Uppercase constants including TRUE, FALSE, NULL (Nette Code Style).
** Functions: Opening brace of function with multiline arguments must be on the same line as closing parenthesis.
** Whitespace: There is no space after type cast.
** and some other differences.

## Example Usage

Install into your project the best via [Composer](https://getcomposer.org):

	$ composer require artfocus/codestyle

Run [PHP CodeSniffer](https://pear.php.net/package/PHP_CodeSniffer/) like this:

	$ phpcs --standard=/path/to/Artfocus/ruleset.xml app libs/custom migrations tests
