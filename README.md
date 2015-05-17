# ArtFocus Coding Standards for PHP CodeSniffer

* Based on [PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md).
* Whitespace: TABS instead of SPACES.
* Constants: Uppercase constants including TRUE, FALSE, NULL.
* Classes: Before closing brace it must be one empty line.
* Files: BOM is not allowed.
* Files: Max. line length is increased to 80 - 160 chars.
* Whitespace: File must end with one empty line.
* Whitespace: Function spacing is 1 empty line.
* Whitespace: There is no space after type cast.
* PHP: Short open tags are not allowed.

## Example Usage

Install into your project the best via [Composer](https://getcomposer.org):

	$ composer require artfocus/codestyle

Run [PHP CodeSniffer](https://pear.php.net/package/PHP_CodeSniffer/) like this:

	$ phpcs --standard=/path/to/Artfocus/ruleset.xml app libs/custom migrations tests
