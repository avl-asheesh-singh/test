<?php
namespace ClassyLlama\AvaTax\Test\Unit\Helper;

use PHPUnit\Framework\TestCase;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;

/**
 * Class ExtensionAttributeMergerTest
 * @covers \ClassyLlama\AvaTax\Helper\ExtensionAttributeMerger
 * @package \ClassyLlama\AvaTax\Test\Unit\Helper
 */
class ExtensionAttributeMergerTest extends TestCase
{
   
    /**
     * setup
     * @covers \ClassyLlama\AvaTax\Helper\ExtensionAttributeMerger::__construct
     * {@inheritDoc}
     */
    protected function setUp(): void
    {
        $this->objectManager = new ObjectManager($this);

        $this->joinProcessorHelper = $this->getMockBuilder(\Magento\Framework\Api\ExtensionAttribute\JoinProcessorHelper::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->extensionAttributesFactory  = $this->getMockBuilder(\Magento\Framework\Api\ExtensionAttributesFactory::class)
            ->disableOriginalConstructor()
            ->getMock();
                 
        
        $this->ExtensionAttributeMerger = $this->objectManager->getObject(
            \ClassyLlama\AvaTax\Helper\ExtensionAttributeMerger::class,
            [
                "joinProcessorHelper" => $this->joinProcessorHelper,
                "extensionAttributesFactory " => $this->extensionAttributesFactory
            ]
        );

        parent::setUp();
    }
    /**
     * getExtensionAttributeMethodName
     * @test
     * @covers \ClassyLlama\AvaTax\Helper\ExtensionAttributeMerger::getExtensionAttributeMethodName
     */
    public function testGetExtensionAttributeMethodName()
    {
        $key = 1;
        $reflection = new \ReflectionClass(\ClassyLlama\AvaTax\Helper\ExtensionAttributeMerger::class);
        $method = $reflection->getMethod('getExtensionAttributeMethodName');
        $method->setAccessible(true);
        $this->assertIsString($method->invokeArgs($this->ExtensionAttributeMerger, [$key]));
    }
}
