<?php
class Shuklin_Testimonials_Adminhtml_TestimonialsController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('Testimonials'));
        $this->loadLayout();
        $this->_setActiveMenu('testimonials');
        $this->renderLayout();
    }
}