<?php
namespace Stephane\Contacts\Controller\Contactslist;
use Magento\Framework\App\Action\Action;

class Index extends Action
{
    public function execute()
    {
        $contactModel = $this->_objectManager->create('Stephane\Contacts\Model\Contact');
        $collection = $contactModel->getCollection()->addFieldToFilter('name', array('like'=> 'Pistache'));
        foreach($collection as $contact) {
            var_dump($contact->getData());
        }

        die('test');
    }
}