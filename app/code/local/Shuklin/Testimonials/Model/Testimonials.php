<?php

class Shuklin_Testimonials_Model_Testimonials extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('testimonials/testimonials');
    }

    public function getCollection()
    {
        $collection = parent::getCollection()
            ->setOrder('created_at', 'DESC');

        $entityType = 'customer';
        $attributeModel = Mage::getModel('eav/entity_attribute');
        $firstNameAttributeId = $attributeModel->loadByCode($entityType, 'firstname')
            ->getAttributeId();
        $lastNameAttributeId = $attributeModel->loadByCode($entityType, 'lastname')
            ->getAttributeId();

        $collection->addFieldToFilter('ce2.attribute_id', array('eq' => array($firstNameAttributeId)))
            ->addFieldToFilter('ce3.attribute_id', array('eq' => array($lastNameAttributeId)));

        $collection->getSelect()
            ->join( array('ce1' => 'customer_entity'), 'ce1.entity_id=main_table.customer_id', array('customer_email' => 'email'))
            ->join( array('ce2' => 'customer_entity_varchar'), 'ce2.entity_id=ce1.entity_id', array('customer_first_name' => 'value'))
            ->join( array('ce3' => 'customer_entity_varchar'), 'ce3.entity_id=ce1.entity_id', array('customer_last_name' => 'value'));

        return $collection;
    }
}