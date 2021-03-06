<?php
namespace PromisePay\Tests;

use PromisePay\PromisePay;
use PromisePay\Enum\FeeType;

class FeeTest extends \PHPUnit_Framework_TestCase {
    
    protected $enum, $GUID, $feeData;
    
    public function setUp() {
        $this->enum = new FeeType;
        $this->GUID = GUID();
        
        $this->feeData = array(
            'amount'      => 1000,
            'name'        => 'DELIVERY FEE',
            'fee_type_id' => (string) $this->enum->Fixed,
            'cap'         => '1',
            'max'         => '3',
            'min'         => '2',
            'to'          => 'buyer'
        );
    }
    
    public function testCreateFee() {
        $createFee = PromisePay::Fee()->create($this->feeData);
        
        $this->assertNotNull($createFee['id']);
        $this->assertEquals($createFee['name'], $this->feeData['name']);
    }

    public function testGetFeeById() {
        $createFee = PromisePay::Fee()->create($this->feeData);
        
        $this->assertNotNull($createFee['id']);
        $this->assertEquals($createFee['name'], $this->feeData['name']);
        
        $getFeeById = PromisePay::Fee()->get($createFee['id']);
        
        $this->assertNotNull($getFeeById['id']);
        $this->assertEquals($createFee['id'], $getFeeById['id']);
        $this->assertEquals($createFee['name'], $getFeeById['name']);
    }

    public function testList() {
        
        $createFee = PromisePay::Fee()->create($this->feeData);
        
        $getList = PromisePay::Fee()->getList(200);
        
        //var_dump($createFee, $getList);
        $this->markTestSkipped(__METHOD__ . ' skipped ' . PHP_EOL);
    }

}