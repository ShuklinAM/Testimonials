<?php

class Shuklin_Testimonials_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();

        $crumbs = $this->getLayout()->getBlock('breadcrumbs');
        if($crumbs) {
            $helper = Mage::helper('testimonials');

            $crumbs->addCrumb('home', array(
                'label' => $this->__('Home'),
                'title' => $this->__('Home'),
                'link' => Mage::getBaseUrl()
            ));
            $crumbs->addCrumb('brands', array(
                'label' => $helper->getTitle(),
                'title' => $helper->getTitle(),
            ));
        }

        $this->_initLayoutMessages('customer/session');
        $this->renderLayout();
    }

    public function addAction()
    {
        $isLoggedIn = Mage::getSingleton('customer/session')->isLoggedIn();
        $testimonial = $this->getRequest()->getPost('testimonial');

        if($testimonial && $isLoggedIn) {

            $model = Mage::getModel('testimonials/testimonials');
            $customer = Mage::getSingleton('customer/session')->getCustomer()
                ->getId();

            $data = array(
                'customer_id'   => $customer,
                'testimonial'   => $testimonial
            );

            $model->setData($data)
                ->save();

            Mage::getSingleton('customer/session')
                ->addSuccess($this->__('Testimonial was successfully added'));

        } else {
            Mage::getSingleton('customer/session')
                ->addError($this->__('Testimonial must not be empty and you must be log in'));
        }

        return $this->_redirect('testimonials');
    }
}