<?php
/**
 * Created by PhpStorm.
 * User: dmitriy
 * Date: 2020-01-13
 * Time: 13:55
 */

namespace Vaimo\ClemondoMarkGoods\Controller\ReferenceCustomer;

use Magento\Framework\Controller\Result\JsonFactory as ResultJsonFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\Action;
use Magento\Customer\Api\CustomerRepositoryInterface;

/**
 * Class CheckEmail
 * @package Vaimo\ClemondoMarkGoods\Controller\ReferenceCustomer
 */
class CheckEmail extends Action
{
    /**
     * @var ResultJsonFactory
     */
    private $resultJsonFactory;
    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepopsitory;

    /**
     * CheckEmail constructor.
     *
     * @param ResultJsonFactory $resultJsonFactory
     * @param CustomerRepositoryInterface $customerRepository
     * @param Context $context
     */
    public function __construct(
        ResultJsonFactory $resultJsonFactory,
        CustomerRepositoryInterface $customerRepository,
        Context $context
    ) {
        $this->resultJsonFactory = $resultJsonFactory;
        $this->customerRepopsitory = $customerRepository;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Json|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultJson = $this->resultJsonFactory->create();
        $email = $this->getRequest()->getParam('email');
        if($email){
            try {
                $customer = $this->customerRepopsitory->get($email);
                if($customer) {
                    return $resultJson->setData(true);
                }
            }catch (\Exception $exception) {
                return $resultJson->setData(false);
            }
        }
        return $resultJson->setData(false);
    }
}