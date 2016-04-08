<?php

class Shuklin_Testimonials_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function getTitle()
    {
        return $this->__('Testimonials');
    }

    public function getFormattedDate($date)
    {
        return Mage::helper('core')->formatDate($date, 'short', true);
    }
}