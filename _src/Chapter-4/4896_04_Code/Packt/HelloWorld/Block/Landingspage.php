<?php
namespace Packt\HelloWorld\Block;

use Magento\Framework\View\Element\Template;

class Landingspage extends Template
{
    public function getLandingsUrl() {
        return $this->getUrl('helloworld');
    }
    
    public function getForwardUrl() {
        return $this->getUrl('helloworld/index/forward');
    }
}
