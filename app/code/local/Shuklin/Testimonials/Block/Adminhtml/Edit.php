<?php

class Shuklin_Testimonials_Block_Adminhtml_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();

        $this->_blockGroup = 'testimonials';
        $this->_mode = 'edit';
        $this->_controller = 'adminhtml';

        $testimonialId = $this->getRequest()
            ->getParam('id');

        if($testimonialId) {
            $this->_updateButton('delete','label', $this->__('Delete'));
            $this->_updateButton('delete','onclick', "
                if(confirm('".$this->__('Delete testimonial?')."')) {
                    setLocation('".$this->getUrl('*/*/delete/id/'.$testimonialId)."')
                }
           ");
        }

        $this->_updateButton('back','onclick', "setLocation('".$this->getUrl('*/*')."')");
        $testimonial = Mage::getModel('testimonials/testimonials')
            ->load($testimonialId);

        Mage::register('current_testimonial', $testimonial);
    }

    public function getHeaderText()
    {
        $testimonial = Mage::registry('current_testimonial');
        if ($testimonial->getId()) {
            return $this->__("Edit testimonial");
        } else {
            return $this->__("Add testimonial");
        }
    }
}