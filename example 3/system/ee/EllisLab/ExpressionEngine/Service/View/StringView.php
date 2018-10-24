<?php
/**
 * ExpressionEngine (https://expressionengine.com)
 *
 * @link      https://expressionengine.com/
 * @copyright Copyright (c) 2003-2018, EllisLab, Inc. (https://ellislab.com)
 * @license   https://expressionengine.com/license
 */

namespace EllisLab\ExpressionEngine\Service\View;

/**
 * String View
 */
class StringView extends View {

	protected $string = '';

	public function __construct($string)
	{
		$this->string = $string;
	}

	/**
	 * In view for legacy reasons, probably will never be called.
	 */
	public function parse($path, $vars, $rewrite = FALSE)
	{
		return $this->render($vars);
	}

	/**
	 * Renders the view
	 */
	public function render(array $vars = array())
	{
		extract($vars);

		ob_start();

		ee()->evalStringInFacadeScope($this->string, $vars);

		$buffer = ob_get_contents();
		ob_end_clean();
		return $buffer;
	}

	// Unimplemented
	public function ee_view($view, $vars = array(), $return = FALSE)
	{
		throw new \Exception("Cannot call `ee_view` on string views.");
	}

	public function view($view, $vars = array(), $return = FALSE)
	{
		throw new \Exception("Cannot call `view` on string views.");
	}

	public function startBlock($name)
	{
		throw new \Exception("Cannot call `startBlock` on string views.");
	}

	public function startOrAppendBlock($name)
	{
		throw new \Exception("Cannot call `startOrAppendBlock` on string views.");
	}

	public function endBlock()
	{
		throw new \Exception("Cannot call `endBlock` on string views.");
	}

}
