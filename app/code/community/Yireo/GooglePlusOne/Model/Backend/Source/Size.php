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

class Yireo_GooglePlusOne_Model_Backend_Source_Size
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => 'small', 'label'=> Mage::helper('googleplusone')->__('Small')),
            array('value' => 'standard', 'label'=> Mage::helper('googleplusone')->__('Standard')),
            array('value' => 'medium', 'label'=> Mage::helper('googleplusone')->__('Medium')),
            array('value' => 'tall', 'label'=> Mage::helper('googleplusone')->__('Tall')),
        );
    }

}
