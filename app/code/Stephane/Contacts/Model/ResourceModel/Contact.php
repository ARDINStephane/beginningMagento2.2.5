<?php

namespace Stephane\Contacts\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Contact Resource Model
 *
 * @author      stephane
 */
class Contact extends AbstractDb
{
    /**
     * Initialize resource
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('stephane_contacts', 'stephane_contacts_id');
    }
}