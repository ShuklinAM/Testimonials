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

    public function editAction()
    {
        $this->_title($this->__('Edit testimonial'));
        $this->loadLayout();
        $this->_setActiveMenu('testimonials');
        $this->renderLayout();
    }

    public function deleteAction()
    {
        $testimonialId = $this->getRequest()->getParam('id');

        Mage::getModel('testimonials/testimonials')
            ->setId($testimonialId)
            ->delete();

        Mage::getSingleton('core/session')->addSuccess($this->__('Testimonial was successfully deleted'));

        return $this->_redirect('*/*');
    }

    public function saveAction()
    {
        $data = $this->getRequest()->getPost();

        if (!empty($data)) {
            try {
                Mage::getModel('testimonials/testimonials')->setData($data)
                    ->save();
                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Testimonial successfully saved'));
            } catch (Mage_Core_Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            } catch (Exception $e) {
                Mage::logException($e);
                Mage::getSingleton('adminhtml/session')->addError($this->__('Somethings went wrong'));
            }
        }

        return $this->_redirect('*/*');
    }
}