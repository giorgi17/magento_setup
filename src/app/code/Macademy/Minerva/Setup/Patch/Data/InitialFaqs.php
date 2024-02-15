<?php declare(strict_types=1);

namespace Macademy\Minerva\Setup\Patch\Data;

use Macademy\Minerva\Model\ResourceModel\Faq;
use Magento\Framework\App\ResourceConnection;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class InitialFaqs implements DataPatchInterface
{
    public function __construct(
        protected ModuleDataSetupInterface $moduleDataSetup,
        protected ResourceConnection $resource,
    ) {
    }

    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }

    public function apply(): self
    {
        $connection = $this->resource->getConnection();
        $data = [
            [
                'question' => 'What is your best selling item?',
                'answer' => 'The item to buy!',
                'is_published' => 1,
            ],
            [
                'question' => 'What is your customer support number?',
                'answer' => '591-271-271. Ask for Jenny!',
                'is_published' => 1,
            ],
            [
                'question' => 'When will i get my order?',
                'answer' => 'When it gets delivered, silly!',
                'is_published' => 0,
            ]
        ];

        $connection->insertMultiple(Faq::MAIN_TABLE, $data);
        return $this;
    }
}
