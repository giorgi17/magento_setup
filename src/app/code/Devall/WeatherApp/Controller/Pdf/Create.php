<?php declare(strict_types=1);

namespace Devall\WeatherApp\Controller\Pdf;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Devall\WeatherApp\Model\ResourceModel\WeatherHistorical\CollectionFactory;


class Create implements HttpPostActionInterface
{
    public function __construct(
        private ResultFactory $resultFactory,
        private CollectionFactory $weatherHistoricalCollectionFactory,
    )
    {
    }

    public function execute()
    {
        // Getting historical data and populate
        $weatherHistoricalCollection = $this->weatherHistoricalCollectionFactory->create();
        $items = $weatherHistoricalCollection->getItems();
        $firstItem = reset($items);

        // Create a new PDF document
        $pdf = new \Zend_Pdf();

        // Add a page to the document
        $page = $pdf->newPage('1000:800:');
        $pdf->pages[] = $page;

        // Set the font
        $font = \Zend_Pdf_Font::fontWithName(\Zend_Pdf_Font::FONT_HELVETICA);
        $page->setFont($font, 6);

        $columnsForHeader = $firstItem->getData();

        // Get the property names from the first item
        $headers = array_keys($columnsForHeader);
        array_shift($headers);

        // Add the headers to the PDF table
        $xPos = 10; // Initial X position
        $yPos = 10; // Initial Y position
        $rowHeight = 20; // Height of each row

        // Set the bold line width
        foreach ($headers as $header) {
            $page->setFont($font, 8);
            $page->drawText($header, $xPos, $page->getHeight() - $yPos);
            $xPos += 100; // Adjust X position for the next header
        }
        $page->setFont($font, 6);

        // Set the initial Y position below the headers
        $yPos += $rowHeight;

        // Iterate over the items and draw data for each row
        foreach ($items as $item) {
            $xPos = 10; // Reset X position for each row

            // Skip the first element of the data array
            $first = true;
            foreach ($item->getData() as $data) {
                if ($first) {
                    $first = false;
                    continue;
                }
                $page->drawText($data, $xPos, $page->getHeight() - $yPos);
                $xPos += 100; // Adjust X position for the next column
            }
            $yPos += $rowHeight; // Move to the next row
        }

        // Sending the pdf file
        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $result->setHeader('Content-Type', 'application/pdf');
        $result->setHeader('Content-Disposition', 'attachment; filename="weather-historical.pdf"');
        $result->setContents($pdf->render());

        return $result;
    }
}
