<?php

namespace Stephane\Contacts\Model\ResourceModel\Contact;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Contact Resource Model Collection
 *
 * @author      Stephane
 */
class Collection extends AbstractCollection
{
    /**
     * Initialize resource collection
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('Stephane\Contacts\Model\Contact', 'Stephane\Contacts\Model\ResourceModel\Contact');
    }
}