<?php

namespace Mvdnbrk\MyParcel\Resources;

use Mvdnbrk\MyParcel\Contracts\Arrayable;

class PickupLocation extends Address implements Arrayable
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var int
     */
    public $distance;

    /**
     * @var string
     */
    public $locationCode;

    /**
     * @var array
     */
    public $openingHours;

    /**
     * @var string
     */
    public $phone;

    /**
     * @var float
     */
    public $latitude;

    /**
     * @var float
     */
    public $longitude;

    public function distanceForHumans()
    {
        if ($this->distance >= 10000) {
            return round($this->distance / 1000, 0) . ' km';
        }

        if ($this->distance >= 1000) {
            return round($this->distance / 1000, 1) . ' km';
        }

        return "{$this->distance} meter";
    }

    public function toArray()
    {
        return array_merge(
            get_object_vars($this),
            ['distance' => $this->distanceForHumans()]
        );
    }
}