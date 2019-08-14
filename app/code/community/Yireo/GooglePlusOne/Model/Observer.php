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

class Yireo_GooglePlusOne_Model_Observer
{
    /*
     * Listen to the event core_block_abstract_to_html_after
     * 
     * @access public
     * @parameter Varien_Event_Observer $observer
     * @return $this
     */
    public function coreBlockAbstractToHtmlAfter($observer)
    {
        $transport = $observer->getEvent()->getTransport();
        $block = $observer->getEvent()->getBlock();

        if($block->getNameInLayout() == 'head') {
            $layout = Mage::app()->getLayout();
            $html = $transport->getHtml()."\n".Mage::helper('googleplusone')->getHeaderScript();
            $transport->setHtml($html);
        }

        return $this;
    }

    /*
     * Method fired on the event <controller_action_predispatch>
     *
     * @access public
     * @param Varien_Event_Observer $observer
     * @return Yireo_DeleteAnyOrder_Model_Observer
     */
    public function controllerActionPredispatch($observer)
    {
        // Run the feed
        Mage::getModel('googleplusone/feed')->updateIfAllowed();
    }
}
