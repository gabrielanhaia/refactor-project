<?php


namespace App\Tests\Unit\Domain\Hotel\Service;

use App\Domain\Hotel\Contract\ICompanyRepository;
use App\Domain\Hotel\Contract\IHotelRepository;
use App\Domain\Hotel\Entity\Company;
use App\Domain\Hotel\Entity\Hotel;
use App\Domain\Hotel\Service\HotelService;
use App\Tests\TestCase;
use Ramsey\Uuid\Rfc4122\UuidV4;

/**
 * Class HotelServiceTest
 *
 * @package App\Tests\Unit\Domain\Hotel\Service
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class HotelServiceTest extends TestCase
{
    /**
     * Test errors trying to list hotels by company when a company doesn't exists.
     */
    public function testErrorListingHotelsByCompanyWhenCompanyNotFound()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Company not found.');

        $uuid = UuidV4::fromString('253e0f90-8842-4731-91dd-0191816e6a28');

        $companyRepositoryMock = \Mockery::mock(ICompanyRepository::class);
        $companyRepositoryMock->shouldReceive('listHotels')
            ->once()
            ->with($uuid)
            ->andReturnNull();

        $hotelRepositoryMock = \Mockery::mock(IHotelRepository::class);
        $hotelDomainService = new HotelService($companyRepositoryMock, $hotelRepositoryMock);

        $hotelDomainService->listHotelsByCompany($uuid);
    }

    /**
     * Test success listing hotels by company.
     *
     * @throws \Exception
     */
    public function testSuccessListingHotelsByCompany()
    {
        $uuid = UuidV4::fromString('253e0f90-8842-4731-91dd-0191816e6a28');

        $expectedResult = ['HOTEL1', 'HOTEL2'];

        $companyMock = \Mockery::mock(Company::class);
        $companyMock->shouldReceive('getHotels')
            ->once()
            ->withNoArgs()
            ->andReturnSelf();

        $companyMock->shouldReceive('getValues')
            ->once()
            ->withNoArgs()
            ->andReturn($expectedResult);

        $companyRepositoryMock = \Mockery::mock(ICompanyRepository::class);
        $companyRepositoryMock->shouldReceive('listHotels')
            ->once()
            ->with($uuid)
            ->andReturn($companyMock);

        $hotelRepositoryMock = \Mockery::mock(IHotelRepository::class);
        $hotelDomainService = new HotelService($companyRepositoryMock, $hotelRepositoryMock);

        $result = $hotelDomainService->listHotelsByCompany($uuid);

        $this->assertEquals($result, $expectedResult);
    }

    /**
     * Test success listing companies available.
     */
    public function testSuccessListingCompanies()
    {
        $expectedResult = ['COMPANY1', 'COMPANY2'];

        $companyRepositoryMock = \Mockery::mock(ICompanyRepository::class);
        $companyRepositoryMock->shouldReceive('listCompanies')
            ->once()
            ->withNoArgs()
            ->andReturn($expectedResult);

        $hotelRepositoryMock = \Mockery::mock(IHotelRepository::class);
        $hotelDomainService = new HotelService($companyRepositoryMock, $hotelRepositoryMock);

        $result = $hotelDomainService->listCompanies();

        $this->assertEquals($result, $expectedResult);
    }

    /**
     * Test success returning the hotel average (reviews).
     */
    public function testSuccessGetTotalHotelAverage()
    {
        $hotelId = UuidV4::fromString('253e0f90-8842-4731-91dd-0191816e6a28');

        $expectedResult = 9.2;

        $hotelRepositoryMock = \Mockery::mock(IHotelRepository::class);
        $hotelRepositoryMock->shouldReceive('getTotalHotelAverage')
            ->once()
            ->with($hotelId)
            ->andReturn($expectedResult);

        $companyRepositoryMock = \Mockery::mock(ICompanyRepository::class);
        $hotelDomainService = new HotelService($companyRepositoryMock, $hotelRepositoryMock);

        $result = $hotelDomainService->getHotelAverage($hotelId);

        $this->assertEquals($expectedResult, $result);
    }

    /**
     * Test error trying to the the hotels review when the hotels was not found.
     *
     * @throws \Exception
     */
    public function testErrorGettingReviewsByHotelWhenHotelNotFound()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Hotel not found.');

        $hotelId = UuidV4::fromString('253e0f90-8842-4731-91dd-0191816e6a28');

        $hotelRepositoryMock = \Mockery::mock(IHotelRepository::class);
        $hotelRepositoryMock->shouldReceive('getHotel')
            ->once()
            ->with($hotelId)
            ->andReturnNull();

        $companyRepositoryMock = \Mockery::mock(ICompanyRepository::class);
        $hotelDomainService = new HotelService($companyRepositoryMock, $hotelRepositoryMock);

        $hotelDomainService->listReviewsByHotel($hotelId);
    }

    /**
     * Test success getting reviews by hotel.
     *
     * @throws \Exception
     */
    public function testSuccessGettingReviewsByHotel()
    {
        $hotelId = UuidV4::fromString('253e0f90-8842-4731-91dd-0191816e6a28');

        $expectedResult = ['REVIEW1', 'REVIEW2'];

        $hotelMock = \Mockery::mock(Hotel::class);
        $hotelMock->shouldReceive('getReviews')
            ->once()
            ->withNoArgs()
            ->andReturn($expectedResult);

        $hotelRepositoryMock = \Mockery::mock(IHotelRepository::class);
        $hotelRepositoryMock->shouldReceive('getHotel')
            ->once()
            ->with($hotelId)
            ->andReturn($hotelMock);

        $companyRepositoryMock = \Mockery::mock(ICompanyRepository::class);
        $hotelDomainService = new HotelService($companyRepositoryMock, $hotelRepositoryMock);

        $result = $hotelDomainService->listReviewsByHotel($hotelId);

        $this->assertEquals($expectedResult, $result);
    }
}