<?php

namespace Packt\HelloWorld\Model\ResourceModel\Subscription;

/**
 * Subscription Collection
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Initialize resource collection
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('Packt\HelloWorld\Model\Subscription', 'Packt\HelloWorld\Model\ResourceModel\Subscription');
    }
}
