<?php
namespace Packt\HelloWorld\Controller\Index;

class Test extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        $product = $this->_objectManager->create('Magento\Catalog\Model\Product')->load(20);
        
        echo $product->getName();
    }
}
