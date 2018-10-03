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

    public function addStatusFilter($job, $department){
        $this->addFieldToSelect('*')
            ->addFieldToFilter('status', $job->getEnableStatus())
            ->join(
                array('department' => $department->getResource()->getMainTable()),
                'main_table.department_id = department.'.$department->getIdFieldName(),
                array('department_name' => 'name')
            );
//  Pour faire un ET
/*        $this->addFieldToSelect('*')
            ->addFieldToFilter('status', array('eq' => $job->getEnableStatus()))
            ->addFieldToFilter('date', array('gt' => date('2017-12-31'))
            );*/

//  Pour faire un OU
/*        $this->addFieldToSelect('*')
            ->addFieldToFilter(
                array(
                    'status',
                    'date'
                ),
                array(
                    array('eq' => $job->getEnableStatus()),
                    array('gt' => date('Y-m-d'))
                )
            );        */

//  Pour faire un JOIN
/*        $this->addFieldToSelect('*')
            ->addFieldToFilter('status', $job->getEnableStatus())
            ->join(
                array('department' => $department->getResource()->getMainTable()),
                'main_table.department_id = department.'.$department->getIdFieldName(),
                array('department_name' => 'name')
            );
        */

//  Pour faire d'autres jointures
/*        $this->addFieldToSelect('*')
            ->addFieldToFilter('status', $job->getEnableStatus())
            ->addFieldToFilter(
                array(
                    'title',
                    'date'
                ),
                array(
                    array('like' => '%Sample Marketing Job%'),
                    array('gteq' => date('Y-m-d'))
                )
            )
            ->getSelect()
            ->joinLeft(
                array('department' => $department->getResource()->getMainTable()),
                'main_table.department_id = department.'.$department->getIdFieldName(),
                array('department_name' => 'name')
            ->where('main_table.status = ?', $job->getEnableStatus())
            ->orWhere('main_table.status = ? AND main_table.date >= '.date('Y-m-d'), $job->getDisableStatus())
            );*/

        return $this;
    }
}