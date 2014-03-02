<?php
    
namespace HtCustomerLogo\EventManager;

use Zend\EventManager\SharedEventManagerInterface;
use Zend\EventManager\SharedListenerAggregateInterface;
use Zend\EventManager\Event;

class LogoUploadListener implements SharedListenerAggregateInterface
{
    /**
     * @var \Zend\Stdlib\CallbackHandler[]
     */
    protected $listeners = array();
    
    /**
     * Attach the aggregate to the specified event manager
     *
     * @param  SharedEventManagerInterface $events
     * @param  int $priority
     * @return void
     */
    public function attachShared(SharedEventManagerInterface $events)
    {
        $this->listeners[] = $events->attach('HtCustomerLogo\Service\LogoService', 'storeLogo.post', array($this, 'resizeImage'));
        $this->listeners[] = $events->attach('HtCustomerLogo\Service\LogoService', 'storeLogo.post', array($this, 'deleteCache'));
    }

    /**
     * Detach aggregate listeners from the specified event manager
     *
     * @param  SharedEventManagerInterface $events
     * @return void
     */
    public function detachShared(SharedEventManagerInterface $events)
    {
        foreach ($this->listeners as $index => $listener) {
            if ($events->detach($listener)) {
                unset($this->listeners[$index]);
            }
        }
    }
    
    /**
     * Listenter event for "storeLogo.post" event and is responsible for manipulating image
     *
     * @param Event $e
     * @return void
     */
    public function resizeImage(Event $e)
    {
        $image = $e->getParam('image');
        $uploadTarget = $e->getParam('uploadTarget');
        $service = $e->getTarget();
        $options = $service->getOptions();
        $storageFilterAlias = $options->getStorageFilter();
        if ($storageFilterAlias) {
            $filterManager = $service->getServiceLocator()->get('HtImgModule\Imagine\Filter\FilterManager');
            $filter = $filterManager->get($storageFilterAlias);
            $manipulatedImage = $filter->apply($image);
            $manipulatedImage->save($uploadTarget);            
        }
    }

    /**
     * Listenter event for "storeLogo.post" event and is responsible for deleting cache in web root
     *
     * @param Event $e
     * @return void
     */
    public function deleteCache(Event $e)
    {
        
    }
            
}
