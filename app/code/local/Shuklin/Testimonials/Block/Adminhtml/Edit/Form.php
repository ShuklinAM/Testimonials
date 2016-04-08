<?php

class Shuklin_Testimonials_Block_Adminhtml_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $testimonial = Mage::registry('current_testimonial');
        $form = new Varien_Data_Form();
        $fieldset = $form->addFieldset('edit_form', array(
            'legend' => $this->__('Set testimonial')
        ));

        if($testimonial->getId()) {
            $fieldset->addField('id', 'hidden', array(
                'name'      => 'id',
                'required'  => true,
            ));
        }

        $fieldset->addField('testimonial', 'textarea', array(
            'name'      => 'testimonial',
            'label'     => $this->__('Testimonial'),
            'required'  => true
        ));

        $customers = Mage::getModel('customer/customer')->getCollection();
        $customerList = array();
        foreach($customers as $customer) {
            $customerList[] = array (
                'value' => $customer->getId(),
                'label' => $customer->getEmail().' '.$customer->getFirstname().' '.$customer->getLastname()
            );
        }

        $fieldset->addField('customer_id', 'select', array(
            'name'      => 'customer_id',
            'label'     => $this->__('Customer'),
            'required'  => true,
            'values'    => $customerList
        ));

        $form->setMethod('post');
        $form->setUseContainer(true);
        $form->setId('edit_form');
        $form->setAction($this->getUrl('*/*/save'));
        $form->setValues($testimonial->getData());

        $this->setForm($form);
    }
}