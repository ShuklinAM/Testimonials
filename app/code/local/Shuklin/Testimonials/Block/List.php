<?php

class Shuklin_Testimonials_Block_List extends Mage_Core_Block_Template
{
    public function __construct()
    {
        parent::__construct();

        $collection = Mage::getModel('testimonials/testimonials')
            ->getCollection();
        $this->setCollection($collection);
    }

    protected function _prepareLayout()
    {
        parent::_prepareLayout();

        $this->setTemplate('testimonials/list.phtml');

        $pager = $this->getLayout()->createBlock('page/html_pager', 'testimonials.pager')
            ->setCollection($this->getCollection());
        $this->setChild('pager', $pager);

        return $this;
    }

    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
}
