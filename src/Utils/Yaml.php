<?php namespace Sintattica\Atk\Utils;
/**
 * This file is part of the ATK distribution on GitHub.
 * Detailed copyright and licensing information can be found
 * in the doc/COPYRIGHT and doc/LICENSE files which should be
 * included in the distribution.
 *
 * @package atk
 * @subpackage utils
 *
 * @author Peter C. Verhage <peter@ibuildings.nl>
 *
 * @copyright (c)2007 Ibuildings.nl BV
 * @license see doc/LICENSE
 *
 * @version $Revision: 5798 $
 * $Id$
 */
/**
 * Includes
 * @access private
 */
include_once(Config::getGlobal("assets_url") . "ext/spyc/spyc.php");

/**
 * ATK YAML wrapper.
 *
 * @author Peter C. Verhage <peter@ibuildings.nl>
 * @package atk
 * @subpackage utils
 */
class YAML
{

    /**
     * Convert an array to it's YAML string representation.
     *
     * @param array $array the array
     * @return string YAML string representation
     *
     * @static
     */
    function dump($array)
    {
        return Spyc::YAMLDump($array);
    }

    /**
     * Convert an YAML string representation to an array.
     *
     * @param string $string the YAML string
     * @return array converted array
     *
     * @static
     */
    function load($string)
    {
        return Spyc::YAMLLoad($string);
    }

    /**
     * Create a YAML node string for the given key and value
     * at the given indent level.
     *
     * @param string $key The name of the key
     * @param mixed $value The value of the item
     * @param int $indent The indent of the current node
     */
    function node($key, $value, $indent = 0)
    {
        $spyc = new Spyc();
        $spyc->_dumpIndent = 2;
        $spyc->_dumpWordWrap = 40;
        return $spyc->_yamlize($key, $value, $indent);
    }

}
