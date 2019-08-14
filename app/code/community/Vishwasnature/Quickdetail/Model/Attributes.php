<?php

class Vishwasnature_Quickdetail_Model_Attributes 
{
    protected $_options;

    public function toOptionArray()
{
     $attributeArray = array();
        $collection = Mage::getResourceModel('catalog/product_attribute_collection')->addVisibleFilter();
        foreach($collection as $col){
            $attributeArray[] = array(
                'label' => $col->getAttributeCode(),
                'value' => $col->getAttributeCode()
            );
        }
    return $attributeArray; 
}
}