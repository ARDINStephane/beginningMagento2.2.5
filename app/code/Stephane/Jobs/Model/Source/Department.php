<?php
namespace Stephane\Jobs\Model\Source;

use Magento\Framework\Data\OptionSourceInterface;

class Department implements OptionSourceInterface
{
    /**
     * @var Department
     */
    protected $_department;

    /**
     * Constructor
     *
     * @param \Stephane\Jobs\Model\Department $department
     */
    public function __construct(\Stephane\Jobs\Model\Department $department)
    {
        $this->_department = $department;
    }

    /**
     * Get options
     */
    public function toOptionArray(): array
    {
        $options[] = ['label' => '', 'value' => ''];
        $departmentCollection = $this->_department->getCollection()
            ->addFieldToSelect('entity_id')
            ->addFieldToSelect('name');
        foreach ($departmentCollection as $department) {
            $options[] = [
                'label' => $department->getName(),
                'value' => $department->getId(),
            ];
        }
        return $options;
    }
}