<?php
namespace Stephane\Contacts\Controller\Adminhtml\Contactslist;
use Magento\Backend\App\Action;

class Index extends Action
{
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}
