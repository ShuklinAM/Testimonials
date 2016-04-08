<?php

class Shuklin_Testimonials_Block_Adminhtml_List extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        parent::__construct();

        $this->_controller = 'adminhtml_list';
        $this->_blockGroup = 'testimonials';
        $this->_headerText = $this->__('Testimonials list');

        $this->_updateButton('add','label' , $this->__('Add testimonial'));
        $this->_updateButton('add','onclick' ,"setLocation('".$this->getUrl('*/*/add')."')" );
    }

    protected function _prepareLayout()
    {
        $this->setChild('grid', $this->getLayout()->createBlock('testimonials/adminhtml_list_grid', 'testimonials.grid'));
        return parent::_prepareLayout();
    }

}