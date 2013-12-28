<?php
    
namespace HtCustomerLogo\EventManager;

use Zend\EventManager\SharedEventManagerInterface;
use Zend\EventManager\SharedListenerAggregateInterface;
use Zend\EventManager\Event;
use HtCustomerLogo\Options\LogoStorageOptionsInterface;
use HCommons\Image\ResizingInterface;

class LogoResizer implements SharedListenerAggregateInterface
{
    /**
     * @var \Zend\Stdlib\CallbackHandler[]
     */
    protected $listeners = array();

    /**
     * @var LogoStorageOptionsInterface
     */
    protected $storageOptions;
    
    /**
     * Attach the aggregate to the specified event manager
     *
     * @param  SharedEventManagerInterface $events
     * @param  int $priority
     * @return void
     */
    public function attachShared(SharedEventManagerInterface $events)
    {
        $this->listeners[] = $events->attach('HtCustomerLogo\Service\LogoService', 'logoUploaded', array($this, 'resizeImage'));
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
     * listenter event for "logoUploaded" event and is responsible for manipulating image
     * @param Event $e
     * @return void
     * @throws \RunTimeException
     */
    public function resizeImage(Event $e)
    {
        $file = $e->getParam('uploadTarget');
        $options = $this->getStorageOptions();
        $resizeOptions = $options->getStorageResizer();

        if (!$resizeOptions) {
            return ;
        }
        
        $class = $resizeOptions['name'];
        $imageManipulator = new $class;
        $imageManipulator->setImagepath($file);
        if (!$imageManipulator instanceof ResizingInterface) {
            throw new \RunTimeException("Manipulator class must implement HCommons\Image\ResizingInterface;");
        }
        $imageManipulator->setOptions($resizeOptions['options']);
        $imageManipulator->setSave();
        $phpThumb = $imageManipulator->getPhpThumb();
    }
    
    /**
     * sets storage options
     * @param LogoStorageOptionsInterface
     * @return void
     */
    public function setStorageOptions(LogoStorageOptionsInterface $storageOptions)
    {
        $this->storageOptions = $storageOptions;
    }

    /**
     * gets storage options
     * @return LogoStorageOptionsInterface
     */    
    public function getStorageOptions()
    {
        return $this->storageOptions;
    }
        
}
