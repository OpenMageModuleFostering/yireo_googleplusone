<?php
/**
 * GooglePlusOne plugin for Magento 
 *
 * @package     Yireo_GooglePlusOne
 * @author      Yireo (http://www.yireo.com/)
 * @copyright   Copyright (C) 2014 Yireo (http://www.yireo.com/)
 * @license     Open Source License (OSL v3)
 */

class Yireo_GooglePlusOne_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function getConfigValue($key = null, $default_value = null)
    {
        $value = Mage::getStoreConfig('googleplusone/settings/'.$key);
        if(empty($value)) $value = $default_value;
        return $value;
    }

    public function getHeaderScript()
    {
        $script = '<script type="text/javascript" src="https://apis.google.com/js/plusone.js">';
        $script .= '{"lang" : "'.Mage::app()->getLocale()->getLocaleCode().'"}';
        $script .= '</script>';
        return $script;
    }

    /*
     * Usage: 
     *   echo Mage::helper('googleplusone')->getHtml($arguments);
     *   $arguments is an associative array (size, count, url)
    
     */
    public function getHtml($arguments = null)
    {
        if (!($layout = Mage::app()->getFrontController()->getAction()->getLayout())) {
            return '';
        }

        if (!($block = $layout->getBlock('googleplusone'))) {
            return '';
        }

        // Set the arguments
        if(!empty($arguments) && is_array($arguments)) {
            $block->setData('arguments', $arguments);
        }

        return $block->toHtml();
    }
}
