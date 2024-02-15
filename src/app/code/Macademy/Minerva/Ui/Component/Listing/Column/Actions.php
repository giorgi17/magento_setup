<?php declare(strict_types=1);

namespace Macademy\Minerva\Ui\Component\Listing\Column;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class Actions extends Column
{
    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        protected UrlInterface $urlBuilder,
        array $components = [],
        array $data = [],
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource): array
    {
        if (!isset($dataSource['data']['items'])) {
            return $dataSource;
        }

        foreach ($dataSource['data']['items'] as & $item) {
            if (!isset($item['id'])) {
                continue;
            }

            $item[$this->getData('name')] = [
              'edit' => [
                  'href' => $this->urlBuilder->getUrl('minerva/faq/edit', [
                      'id' => $item['id'],
                  ]),
                  'label' => __('Edit'),
              ],
                'delete' => [
                    'href' => $this->urlBuilder->getUrl('minerva/faq/delete', [
                        'id' => $item['id'],
                    ]),
                    'label' => __('Delete'),
                    'confirm' => [
                        'title' => __('Delete "%1"', $item['question']),
                        'message' => __('Are you sure you want to delete a "%1" record?', $item['question']),
                    ],
                ],

            ];
        }

        return $dataSource;
    }
}
