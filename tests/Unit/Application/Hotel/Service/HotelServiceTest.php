<?php


namespace App\Unit\TestsApplication\Hotel\Service;

use App\Application\Hotel\Service\HotelService as HotelApplicationService;
use App\Domain\Hotel\Service\HotelService as HotelDomainService;
use App\Tests\TestCase;
use Ramsey\Uuid\Uuid;

/**
 * Class HotelServiceTest
 *
 * @package App\Unit\TestsApplication\Hotel\Service
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class HotelServiceTest extends TestCase
{
    /**
     * Test success calling the method responsible for listing companies.
     */
    public function testSuccessListCompanies()
    {
        $expectedResponseCompanies = [];

        $hotelDomainServiceMock = \Mockery::mock(HotelDomainService::class);
        $hotelDomainServiceMock->shouldReceive('listCompanies')
            ->once()
            ->withNoArgs()
            ->andReturn($expectedResponseCompanies);

        $hotelApplicationService = new HotelApplicationService($hotelDomainServiceMock);
        $response = $hotelApplicationService->listCompanies();

        $this->assertEquals($expectedResponseCompanies, $response);
    }

    /**
     * Test success listing a hotels in a company.
     *
     * @throws \Exception
     */
    public function testSuccessListingHotelsByCompanyId()
    {
        $companyIdString = '253e0f90-8842-4731-91dd-0191816e6a28';
        $uuid = Uuid::fromString($companyIdString);

        $this->setUuid4Values($uuid);

        $expectedResponse = ['HOTEL1', 'HOTEL2'];

        $hotelDomainServiceMock = \Mockery::mock(HotelDomainService::class);
        $hotelDomainServiceMock->shouldReceive('listHotelsByCompany')
            ->once()
            ->with($uuid)
            ->andReturn($expectedResponse);

        $hotelApplicationService = new HotelApplicationService($hotelDomainServiceMock);
        $response = $hotelApplicationService->listHotelsByCompany($companyIdString);

        $this->assertEquals($expectedResponse, $response);
    }

    /**
     * Test getting hotel average reviews.
     */
    public function testSuccessGetHotelAverage()
    {
        $hotelIdString = '253e0f90-8842-4731-91dd-0191816e6a28';
        $uuid = Uuid::fromString($hotelIdString);

        $this->setUuid4Values($uuid);

        $expectedResponse = 1.2;

        $hotelDomainServiceMock = \Mockery::mock(HotelDomainService::class);
        $hotelDomainServiceMock->shouldReceive('getHotelAverage')
            ->once()
            ->with($uuid)
            ->andReturn($expectedResponse);

        $hotelApplicationService = new HotelApplicationService($hotelDomainServiceMock);
        $response = $hotelApplicationService->getHotelAverage($hotelIdString);

        $this->assertEquals($expectedResponse, $response);
    }

    /**
     * Test success listing reviews by hotel.
     *
     * @throws \Exception
     */
    public function testSuccessListingReviewsByHotel()
    {
        $hotelIdString = '253e0f90-8842-4731-91dd-0191816e6a28';
        $uuid = Uuid::fromString($hotelIdString);

        $this->setUuid4Values($uuid);

        $expectedResponse = ['REVIEW1' => [1, 2, 3], 'REVIEW2' => 4, 5, 6];

        $hotelDomainServiceMock = \Mockery::mock(HotelDomainService::class);
        $hotelDomainServiceMock->shouldReceive('listReviewsByHotel')
            ->once()
            ->with($uuid)
            ->andReturn($expectedResponse);

        $hotelApplicationService = new HotelApplicationService($hotelDomainServiceMock);
        $response = $hotelApplicationService->listReviewsByHotel($hotelIdString);

        $this->assertEquals($expectedResponse, $response);
    }
}