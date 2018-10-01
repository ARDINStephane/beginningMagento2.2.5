<?php
namespace Stephane\Jobs\Controller\Adminhtml\Department;

use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;
use Stephane\Jobs\Model\Department;

class Delete extends Action
{
    protected $_model;

    /**
     * @param Action\Context $context
     * @param Department $model
     */
    public function __construct(
        Action\Context $context,
        Department $model
    ) {
        parent::__construct($context);
        $this->_model = $model;
    }

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Stephane_Jobs::department_delete');
    }

    /**
     * Delete action
     *
     * @return ResultInterface
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        /** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                $model = $this->_model;
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccess(__('Department deleted'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }
        $this->messageManager->addError(__('Department does not exist'));
        return $resultRedirect->setPath('*/*/');
    }
}