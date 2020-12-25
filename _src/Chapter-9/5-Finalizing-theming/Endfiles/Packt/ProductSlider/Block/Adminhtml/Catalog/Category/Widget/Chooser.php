<?php

namespace Packt\ProductSlider\Block\Adminhtml\Catalog\Category\Widget;

class Chooser extends \Magento\Catalog\Block\Adminhtml\Category\Widget\Chooser
{
    protected function _construct()
    {
        $this->setModuleName('Magento_Catalog');
        
        parent::_construct();
    }
    
    public function prepareElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        $uniqId = $this->mathRandom->getUniqueHash($element->getId());
        $sourceUrl = $this->getUrl(
            'productslider/catalog_category_widget/chooser',
            ['uniq_id' => $uniqId, 'use_massaction' => false]
        );

        $chooser = $this->getLayout()->createBlock(
            'Magento\Widget\Block\Adminhtml\Widget\Chooser'
        )->setElement(
            $element
        )->setConfig(
            $this->getConfig()
        )->setFieldsetId(
            $this->getFieldsetId()
        )->setSourceUrl(
            $sourceUrl
        )->setUniqId(
            $uniqId
        );

        if ($element->getValue()) {
            $categoryId = $element->getValue();

            $label = $this->_categoryFactory->create()->load($categoryId)->getName();
            $chooser->setLabel($label);
        }

        $element->setData('after_element_html', $chooser->toHtml());
        return $element;
    }

    public function getNodeClickListener()
    {
        if ($this->getData('node_click_listener')) {
            return $this->getData('node_click_listener');
        }
        if ($this->getUseMassaction()) {
            $js = '
                function (node, e) {
                    if (node.ui.toggleCheck) {
                        node.ui.toggleCheck(true);
                    }
                }
            ';
        } else {
            $chooserJsObject = $this->getId();
            $js = '
                function (node, e) {
                    ' .
                $chooserJsObject .
                '.setElementValue(node.attributes.id);
                    ' .
                $chooserJsObject .
                '.setElementLabel(node.text);
                    ' .
                $chooserJsObject .
                '.close();
                }
            ';
        }
        return $js;
    }
}
