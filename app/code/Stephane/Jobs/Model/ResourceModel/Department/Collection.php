<?php
namespace Stephane\Jobs\Model\ResourceModel\Department;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Stephane\Jobs\Model\Department;

class Collection extends AbstractCollection
{

    protected $_idFieldName = Department::DEPARTMENT_ID;

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Stephane\Jobs\Model\Department', 'Stephane\Jobs\Model\ResourceModel\Department');
    }

}