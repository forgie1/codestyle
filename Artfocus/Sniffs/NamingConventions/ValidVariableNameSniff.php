<?php

/**
 * @author Vašek Purchart, https://github.com/consistence/coding-standard
 */

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Util\Common;

class Artfocus_Sniffs_NamingConventions_ValidVariableNameSniff extends \PHP_CodeSniffer\Sniffs\AbstractVariableSniff
{

	const CODE_CAMEL_CAPS = 'NotCamelCaps';

	/** @var string[] */
	protected $phpReservedVars = [
		'_SERVER',
		'_GET',
		'_POST',
		'_REQUEST',
		'_SESSION',
		'_ENV',
		'_COOKIE',
		'_FILES',
		'GLOBALS',
	];

	/**
	 * @param $phpcsFile $file
	 * @param integer $stackPointer position of the double quoted string
	 */
	protected function processVariable(File $phpcsFile, $stackPtr)
	{
		$tokens = $phpcsFile->getTokens();
		$varName = ltrim($tokens[$stackPtr]['content'], '$');
		if (in_array($varName, $this->phpReservedVars, TRUE)) {
			return; // skip PHP reserved vars
		}
		$objOperator = $phpcsFile->findPrevious([T_WHITESPACE], ($stackPtr - 1), NULL, TRUE);
		if ($tokens[$objOperator]['code'] === T_DOUBLE_COLON) {
			return; // skip MyClass::$variable, there might be no control over the declaration
		}
		if (Common::isCamelCaps($varName, FALSE, TRUE, FALSE) === FALSE) {
			$error = 'Variable "%s" is not in valid camel caps format';
			$data = [$varName];
			$phpcsFile->addError($error, $stackPtr, self::CODE_CAMEL_CAPS, $data);
		}
	}

	/**
	 * @codeCoverageIgnore
	 *
	 * @param \PHP_CodeSniffer_File $file
	 * @param integer $stackPointer position of the double quoted string
	 */
	protected function processMemberVar(File $file, $stackPointer)
	{
		// handled by PSR2.Classes.PropertyDeclaration
	}

	/**
	 * @codeCoverageIgnore
	 *
	 * @param \PHP_CodeSniffer_File $file
	 * @param integer $stackPointer position of the double quoted string
	 */
	protected function processVariableInString(File $file, $stackPointer)
	{
		// Consistence standard does not allow variables in strings, handled by Squiz.Strings.DoubleQuoteUsage
	}

}
