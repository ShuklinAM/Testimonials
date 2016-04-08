<?php

class Shuklin_Testimonials_Block_Adminhtml_List_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    protected function _construct()
    {
        $this->setId('listGrid');
        $this->setDefaultSort('created_at');
        $this->setDefaultDir('desc');
        $this->setVarNameFilter('list_filter');
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('testimonials/testimonials')
            ->getCollection(false);
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {

        $this->addColumn('id', array(
            'header'        => $this->__('Id'),
            'align'         => 'right',
            'width'         => '20px',
            'filter_index'  => 'id',
            'index'         => 'id'
        ));

        $this->addColumn('testimonial', array(
            'header'        => $this->__('testimonial'),
            'align'         => 'left',
            'filter_index'  => 'testimonial',
            'index'         => 'testimonial'
        ));

        $this->addColumn('customer_email', array(
            'header'        => $this->__('Customer email'),
            'align'         => 'left',
            'filter_index'  => 'email',
            'index'         => 'customer_email'
        ));

        $this->addColumn('customer_first_name', array(
            'header'        => $this->__('Customer first name'),
            'align'         => 'right',
            'filter_index'  => 'ce2.value',
            'index'         => 'customer_first_name'
        ));

        $this->addColumn('customer_last_name', array(
            'header'        => $this->__('Customer last name'),
            'align'         => 'left',
            'filter_index'  => 'ce3.value',
            'index'         => 'customer_last_name'
        ));

        $this->addColumn('action', array(
            'header'    => $this->__('Action'),
            'width'     => '50px',
            'type'      => 'action',
            'getter'     => 'getId',
            'actions'   => array(
                array(
                    'caption' => $this->__('Edit'),
                    'url'     => array(
                        'base'=>'*/*/edit',
                    ),
                    'field'   => 'id'
                )
            ),
            'filter'    => false,
            'sortable'  => false,
            'index'     => 'id',
        ));

        return parent::_prepareColumns();
    }

    public function getRowUrl($testimonial)
    {
        return $this->getUrl('*/*/edit', array(
            'id' => $testimonial->getId(),
        ));
    }

    public function getGridUrl()
    {
        return $this->getUrl('*/*/',array('_current' => true));
    }
}