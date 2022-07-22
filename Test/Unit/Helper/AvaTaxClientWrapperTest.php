<?php
/*
 *
 * Avalara_BrSalesTax
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @copyright Copyright (c) 2021 Avalara, Inc
 * @license    http: //opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */
namespace ClassyLlama\AvaTax\Test\Unit\Helper;

use Magento\Framework\TestFramework\Unit\Helper\ObjectManager as ObjectManagerHelper;
use PHPUnit\Framework\TestCase;

use Psr\Log\LoggerInterface;
use GuzzleHttp\Psr7\Response as GuzzleHttpResponse;
use ClassyLlama\AvaTax\Helper\Config as ConfigHelper;
use Magento\Framework\DataObjectFactory;
use Magento\Framework\DataObject;
/**
 * Class AvaTaxClientWrapperTest
 * @covers \ClassyLlama\AvaTax\Helper\AvaTaxClientWrapper
 * @package \ClassyLlama\AvaTax\Test\Unit\Helper
 */
class AvaTaxClientWrapperTest extends TestCase
{
    protected $objectManagerHelper;
    protected $context;
    protected $controller;
    protected $resultFactoryMock;
    protected $resultMock;

    /**
     * setup
     * @covers \ClassyLlama\AvaTax\Helper\AvaTaxClientWrapper::__construct
     * {@inheritDoc}
     */
    protected function setUp(): void
    {
        $this->objectManagerHelper = new ObjectManagerHelper($this);

        $this->context = $this->createPartialMock(\Magento\Framework\App\Helper\Context::class, ['getScopeConfig']);
        $this->storeManagerMock = $this->getMockBuilder(\Magento\Store\Model\StoreManagerInterface::class)
            ->disableOriginalConstructor()
            ->setMethods(
                [ 'getDefaultStoreView' ]
            )
            ->getMockForAbstractClass();
        
        $this->dataObjectFactoryMock = $this->getMockBuilder(\Magento\Framework\DataObjectFactory::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->configHelperMock = $this->getMockBuilder(\ClassyLlama\AvaTax\Helper\Config::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->loggerMock = $this->getMockBuilder(\Psr\Log\LoggerInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->avaTaxClientWrapperMock = $this->getMockBuilder(\ClassyLlama\AvaTax\Helper\AvaTaxClientWrapper::class)
            ->disableOriginalConstructor()
            ->getMock();               
        
        $this->avaTaxClientWrapper = $this->objectManagerHelper->getObject(
            \ClassyLlama\AvaTax\Helper\AvaTaxClientWrapper::class,
            [
                'DataObjectFactory' => $this->dataObjectFactoryMock,
                'ConfigHelper' => $this->configHelperMock,
                'LoggerInterface' => $this->loggerMock,
                'appName' => 'Avalara API',
                'appVersion' => '1.0',
                'machineName' => 'local',
                'environment' => 'localhost',
                'guzzleParams' => []
            ]
        );
        parent::setUp();
    }
    
    /**
     * downloadCertificateImage
     * @test
     * @covers \ClassyLlama\AvaTax\Helper\AvaTaxClientWrapper::downloadCertificateImage
     */
    public function testDownloadCertificateImage()
    {
		$companyId = 1;
		$id = 1;
		$page = 1;
		$type = 'test';
		$method = 'GET';
        $path = 'https://localhost/api-endpoint';
        $guzzleParams = [
							'query' => ['$page' => 1, 'type' => $type],
							'body' => null,
							'headers' => [
								'Accept' => '*/*'
							]
						];
		$response = ['response'];
			
        //$this->assertIsArray($this->avaTaxClientWrapper->downloadCertificateImage($companyId, $id, $page, $type));
    }
    
}
