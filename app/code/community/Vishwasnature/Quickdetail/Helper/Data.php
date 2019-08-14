<?php

class Vishwasnature_Quickdetail_Helper_Data extends Mage_Core_Helper_Abstract {

    public function getProductAttributes() {
        $shownAttribute = Mage::getStoreConfig('quickdetail/viewsettings/specificdetail', Mage::app()->getStore());
        $sortOrders = $this->getSortOrder();
        $attributeArray = explode(',', $shownAttribute);
        if ($sortOrders) {
            $particularAtrribute = explode(',', $sortOrders);
            foreach ($particularAtrribute as $attr) {
                $sortedInfo = explode(':', $attr);
                $sortedAttribute[$sortedInfo[1]] = $sortedInfo[0];
            }
            ksort($sortedAttribute);
            $attributeArray = array_diff($attributeArray, $sortedAttribute);
            $sortedAttribute = array_merge($sortedAttribute, $attributeArray);
            return $sortedAttribute;
        } else {
            return $attributeArray;
        }
    }

    public function getHeaderColor() {
        return Mage::getStoreConfig('quickdetail/viewsettings/vishwasnature_pickcolor', Mage::app()->getStore());
    }

    public function getBackgroundColor() {
        return Mage::getStoreConfig('quickdetail/viewsettings/background_color', Mage::app()->getStore());
    }

    public function getPopupStyle() {
        $popupwidth = Mage::getStoreConfig('quickdetail/viewsettings/width', Mage::app()->getStore());
        $popupheight = Mage::getStoreConfig('quickdetail/viewsettings/height', Mage::app()->getStore());
        $style = '';
        if ($popupwidth) {
            $style .= 'width:' . $popupwidth . ($popupwidth == 'auto' ? '' : 'px;');
        }
        if ($popupheight) {
            $style .= 'height:' . $popupheight . ($popupheight == 'auto' ? '' : 'px;');
        }

        if ($style) {
            $style = 'style="' . $style . '"';
        }
        return $style;
    }

    public function getSortOrder() {
        return Mage::getStoreConfig('quickdetail/viewsettings/sort_orders', Mage::app()->getStore());
    }

    public function getAllCollectionWithDesign() {
        $allAttributeWithDesign = array();
        $productAttributesCollection = $this->getProductAttributes();
        $headercolor = $this->getHeaderColor();
        $backgorundColor = $this->getBackgroundColor();
        $popupStyle = $this->getPopupStyle();
        $collectionAttribute = $productAttributesCollection;
        $allAttributeWithDesign ['collectionAttribute'] = $collectionAttribute;
        $allAttributeWithDesign ['popupStyle'] = $popupStyle;
        $allAttributeWithDesign ['backgorundColor'] = $backgorundColor;
        $allAttributeWithDesign ['headercolor'] = $headercolor;
        return $allAttributeWithDesign;
    }

}