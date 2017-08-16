<?php

namespace Playgrounds\Domain;

use Gedmo\Sluggable\Util\Urlizer;

class Location
{
    /** @var string */
    private $address;

    /** @var string */
    private $country;

    /** @var string */
    private $city;

    /** @var string */
    private $code;

    /** @var string */
    private $district;

    /** @var float */
    private $latitude;

    /** @var float */
    private $longitude;

    /**
     * @param float $latitude
     * @param float $longitude
     * @param string $address
     * @param string $city
     * @param string $code
     * @param string $district
     * @param string $country
     */
    public function __construct(
        float $latitude = 0.0,
        float $longitude = 0.0,
        string $address = '',
        string $city = '',
        string $code = '',
        string $district = '',
        string $country = ''
    ) {
        $this->address = $address;
        $this->city = $city;
        $this->code = $code;
        $this->district = $district;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getDistrict(): string
    {
        return $this->district;
    }

    /**
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return empty($this->address) || empty($this->city) || empty($this->latitude) || empty($this->longitude);
    }

    /**
     * @return string
     */
    public function getGeoPoint(): string
    {
        return $this->latitude . ',' . $this->longitude;
    }

    /**
     * @return string
     */
    public function getCitySlug(): string
    {
        return Urlizer::urlize($this->city);
    }

    /**
     * @return string
     */
    public function getCountrySlug(): string
    {
        return Urlizer::urlize($this->country);
    }
}
