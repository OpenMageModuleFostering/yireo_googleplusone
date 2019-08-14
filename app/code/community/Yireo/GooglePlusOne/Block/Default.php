<?php
/**
 * GooglePlusOne plugin for Magento 
 *
 * @category    design_default
 * @package     Yireo_GooglePlusOne
 * @author      Yireo (http://www.yireo.com/)
 * @copyright   Copyright (C) 2014 Yireo (http://www.yireo.com/)
 * @license     Open Source License (OSL v3)
 */

class Yireo_GooglePlusOne_Block_Default extends Mage_Core_Block_Template
{
    public function _construct()
    {
        parent::_construct();
        $this->setTemplate('googleplusone/default.phtml');
    }

    public function getConfig($key = null, $default_value = null)
    {
        return Mage::helper('googleplusone')->getConfigValue($key, $default_value);
    }

    public function getArguments($url = null)
    {
        $arguments = $this->getData('arguments');
        if(!is_array($arguments)) $arguments = array();
        if(!isset($arguments['size'])) $arguments['size'] = $this->getConfig('size');
        if(!isset($arguments['count'])) $arguments['count'] = ($this->getConfig('count') == 1) ? 'true' : 'false';

        $output = array();
        foreach($arguments as $name => $value) {
            if(!empty($value) || $value == 0) {
                if($this->getConfig('pagetype') != 'html5') {
                    $output[] = $name.'="'.$value.'"';
                } else {
                    $output[] = 'data-'.$name.'="'.$value.'"';
                }
            }
        }

        if(empty($output)) { 
            return null;
        }
        return ' '.implode(' ', $output);
    }
}
