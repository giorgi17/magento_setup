<?php

declare(strict_types=1);

namespace Macademy\Blog\Controller\Post;

use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;

class DetailOld implements HttpGetActionInterface
{
    public function __construct(
        private Session $session,
        private RequestInterface $request,
    ) {
    }

    public function execute()
    {
        // TODO: Implement execute() method.
        // die("Blog post detail.");

        // This is how to get instance with ObjectManager (Bad practice)
//        $om = ObjectManager::getInstance();
//        $session = $om->get(Session::class);
//        echo '<pre>';
//        var_dump($session->getData());
//        die();

        // Example using Dependency injection
        echo '<pre>';
        var_dump($this->session->getData());
        var_dump($this->request->getParams());
        die();
    }
}
