<?php

/**
 * Verifies that control statements conform to their coding standards.
 *
 * @author Jaroslav Hranička <hranicka@outlook.com>
 */
class Artfocus_Sniffs_ControlStructures_ControlSignatureSniff extends Squiz_Sniffs_ControlStructures_ControlSignatureSniff
{

	public function register()
	{
		$tokens = parent::register();
		$tokens[] = T_SWITCH;

		return $tokens;
	}

}
