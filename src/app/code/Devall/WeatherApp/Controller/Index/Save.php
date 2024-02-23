<?php declare(strict_types=1);

namespace Devall\WeatherApp\Controller\Index;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Devall\WeatherApp\Model\WeatherHistoricalFactory;
use Devall\WeatherApp\Model\ResourceModel\WeatherHistorical as WeatherHistoricalResourceModel;

class Save implements HttpPostActionInterface
{
    public function __construct(
        private RequestInterface $request,
        protected JsonFactory $resultJsonFactory,
        private WeatherHistoricalFactory $weatherHistoricalFactory,
        private WeatherHistoricalResourceModel $weatherHistoricalResourceModel
    )
    {
    }

    public function execute()
    {
        $result = $this->resultJsonFactory->create();

        $city = $this->request->getPost('city');
        $country = $this->request->getPost('country');
        $description = $this->request->getPost('description');
        $temperature = $this->request->getPost('temperature');
        $feelsLike = $this->request->getPost('feelsLike');
        $pressure = $this->request->getPost('pressure');
        $humidity = $this->request->getPost('humidity');
        $windspeed = $this->request->getPost('windspeed');
        $sunrise = $this->request->getPost('sunrise');
        $sunset = $this->request->getPost('sunset');

        try {
            $newWeatherHistorical = $this->weatherHistoricalFactory->create();
            $newWeatherHistorical->setData([
                'city' => $city,
                'country' => $country,
                'description' => $description,
                'temperature' => $temperature,
                'feelsLike' => $feelsLike,
                'pressure' => $pressure,
                'humidity' => $humidity,
                'windspeed' => $windspeed,
                'sunrise' => $sunrise,
                'sunset' => $sunset,
            ]);
            $this->weatherHistoricalResourceModel->save($newWeatherHistorical);

            return $result->setData(['success' => true]);
        } catch (\Exception $exception) {
            return $result->setData(['error' => $exception->getMessage()]);
        }
    }
}
