<?php

namespace Playgrounds\Domain;

class OpeningHours
{
    const MONDAY = 'Monday';
    const TUESDAY = 'Tuesday';
    const WEDNESDAY = 'Wednesday';
    const THURSDAY = 'Thursday';
    const FRIDAY = 'Friday';
    const SATURDAY = 'Saturday';
    const SUNDAY = 'Sunday';
    /**
     * Key - ISO-8601 numeric representation of the day of the week - date('N')
     *
     * @var array
     */
    const ALLOWED_DAYS = [
        1 => self::MONDAY,
        2 => self::TUESDAY,
        3 => self::WEDNESDAY,
        4 => self::THURSDAY,
        5 => self::FRIDAY,
        6 => self::SATURDAY,
        7 => self::SUNDAY,
    ];

    /** @var Playground */
    protected $playground;

    /** @var string */
    protected $day;

    /** @var integer */
    protected $fromHour;

    /** @var integer */
    protected $fromMinutes;

    /** @var integer */
    protected $toHour;

    /** @var integer */
    protected $toMinutes;

    /**
     * @param Playground $playground
     * @param string $day
     * @param integer $fromHour
     * @param integer $fromMinutes
     * @param integer $toHour
     * @param integer $toMinutes
     */
    public function __construct(
        Playground $playground,
        string $day,
        int $fromHour,
        int $fromMinutes,
        int $toHour,
        int $toMinutes
    ) {
        $this->playground = $playground;
        $this->setDay($day);
        $this->fromHour = $fromHour;
        $this->fromMinutes = $fromMinutes;
        $this->toHour = $toHour;
        $this->toMinutes = $toMinutes;
    }

    /**
     * @return string
     */
    public function getDay(): string
    {
        return $this->day;
    }

    /**
     * @param string $day
     */
    public function setDay(string $day)
    {
        if (!in_array($day, self::ALLOWED_DAYS)) {
            throw new \InvalidArgumentException('Weekday should be one of: ' . implode(', ', self::ALLOWED_DAYS));
        }
        $this->day = $day;
    }

    /**
     * @return integer
     */
    public function getFromHour(): int
    {
        return $this->fromHour;
    }

    /**
     * @return integer
     */
    public function getFromMinutes(): int
    {
        return $this->fromMinutes;
    }

    /**
     * @return integer
     */
    public function getToHour(): int
    {
        return $this->toHour;
    }

    /**
     * @return integer
     */
    public function getToMinutes(): int
    {
        return $this->toMinutes;
    }
}
