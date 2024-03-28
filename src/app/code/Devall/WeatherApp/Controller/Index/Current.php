<?php

namespace Devall\WeatherApp\Controller\Index;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\HTTP\Client\Curl;

class current implements HttpPostActionInterface
{
    public function __construct(
        protected JsonFactory $resultJsonFactory,
        private RequestInterface $request,
        private Curl $curlClient
    ) {}

    public function execute()
    {
        $apiKey = '2be7390dc3dd57d10af6f221a23438db';

        $result = $this->resultJsonFactory->create();

        $city = $this->request->getPost('city');

        if (!$city) {
            return $result->setData(['error' => 'City name was not provided.']);
        }

        try {
            $this->curlClient->addHeader('Content-Type', 'application/json');
            $this->curlClient->setOption(CURLOPT_RETURNTRANSFER, true);
            $this->curlClient->get("https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey&units=metric");

            $response = $this->curlClient->getBody();
            $data = json_decode($response, true);

            return $result->setData(['success' => $data]);
        } catch (\Exception $exception) {
            return $result->setData(['error' => $exception->getMessage()]);
        }
    }
}
