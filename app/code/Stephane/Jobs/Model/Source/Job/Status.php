<?php
namespace Stephane\Jobs\Model\Source\Job;

use Magento\Framework\Data\OptionSourceInterface;
use Stephane\Jobs\Model\Job;

class Status implements OptionSourceInterface
{
    /**
     * @var Job
     */
    protected $_job;

    /**
     * Constructor
     *
     * @param Job $job
     */
    public function __construct(Job $job)
    {
        $this->_job = $job;
    }

    /**
     * Get options
     */
    public function toOptionArray(): array
    {
        $options[] = ['label' => '', 'value' => ''];
        $availableOptions = $this->_job->getAvailableStatuses();
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}