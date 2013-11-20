<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Zend Framework addition by skoch
 * 
 * @category   Skoch
 * @package    Skoch_Filter
 * @license    http://opensource.org/licenses/gpl-license.php GNU Public License
 * @author     Stefan Koch <cct@stefan-koch.name>
 */
abstract class My_Filter_File_Resize_Adapter_Abstract
{
    abstract public function resize($width, $height, $keepRatio, $file, $target, $keepSmaller = true);
 
    protected function _calculateWidth($oldWidth, $oldHeight, $width, $height)
    {
        // now we need the resize factor
        // use the bigger one of both and apply them on both
        $factor = max(($oldWidth/$width), ($oldHeight/$height));
        return array($oldWidth/$factor, $oldHeight/$factor);
    }
}

