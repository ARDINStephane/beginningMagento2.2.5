<?php
namespace Stephane\Jobs\Model\ResourceModel\Job;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Stephane\Jobs\Model\Job;

class Collection extends AbstractCollection
{

    protected $_idFieldName = Job::JOB_ID;

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Stephane\Jobs\Model\Job', 'Stephane\Jobs\Model\ResourceModel\Job');
    }

}