<?php

class Shuklin_Testimonials_Model_Mysql4_Testimonials extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {
        $this->_init('testimonials/testimonials','id');
    }
}