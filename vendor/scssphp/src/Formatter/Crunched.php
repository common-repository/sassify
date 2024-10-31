<?php
/**
 * SCSSPHP
 *
 * @copyright 2012-2015 Leaf Corcoran
 *
 * @license http://opensource.org/licenses/gpl-license GPL-3.0
 * @license http://opensource.org/licenses/MIT MIT
 *
 * @link http://leafo.net/scssphp
 */

/* namespace Leafo\ScssPhp\Formatter; */

/* use Leafo\ScssPhp\Formatter; */

/**
 * SCSS crunched formatter
 *
 * @author Anthon Pang <anthon.pang@gmail.com>
 */
class Leafo_ScssPhp_Formatter_Crunched extends Leafo_ScssPhp_Formatter
{
    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        $this->indentLevel = 0;
        $this->indentChar = '  ';
        $this->break = '';
        $this->open = '{';
        $this->close = '}';
        $this->tagSeparator = ',';
        $this->assignSeparator = ':';
    }

    /**
     * {@inheritdoc}
     */
    public function indentStr($n = 0)
    {
        return '';
    }

    /**
     * {@inheritdoc}
     */
    public function blockLines($inner, $block)
    {
        $glue = $this->break . $inner;

        foreach ($block->lines as $index => $line) {
            if (substr($line, 0, 2) === '/*') {
                unset($block->lines[$index]);
            }
        }

        echo $inner . implode($glue, $block->lines);

        if (!empty($block->children)) {
            echo $this->break;
        }
    }
}
