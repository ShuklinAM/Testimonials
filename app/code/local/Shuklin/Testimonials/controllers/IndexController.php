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

        $this->renderLayout();
    }


}