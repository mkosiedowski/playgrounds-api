<?php

namespace Playgrounds\Domain;

class Photo
{
    /** @var PhotoId */
    public $id;

    /** @var array */
    public $sizes;

    /** @var string */
    public $url;

    /** @var integer */
    public $number;

    /**
     * Photo constructor.
     *
     * @param PhotoId $id
     * @param array $sizes
     * @param string $url
     * @param int $number
     */
    public function __construct(PhotoId $id, array $sizes, $url, $number)
    {
        $this->id = $id;
        $this->sizes = $sizes;
        $this->url = $url;
        $this->number = $number;
    }

    /**
     * @param string $size
     * @param integer $width
     * @param integer $height
     * @return array
     */
    public static function getNewSize($size, $width, $height)
    {
        list($desiredWidth, $desiredHeight) = explode('x', $size);
        $ratio = $width / $height;
        $desiredRatio = $desiredWidth / $desiredHeight;
        if ($width >= $desiredWidth && $height > $desiredHeight) {
            if ($ratio > $desiredRatio) {
                $newHeight = $desiredHeight;
                $newWidth = $width / ($height / $newHeight);
            } else {
                $newWidth = $desiredWidth;
                $newHeight = $height / ($width / $newWidth);
            }
        } elseif ($width > $desiredWidth) {
            $newWidth = $desiredWidth;
            $newHeight = $height / ($width / $newWidth);
        } elseif ($height > $desiredHeight) {
            $newHeight = $desiredHeight;
            $newWidth = $width / ($height / $newHeight);
        } else {
            $newWidth = $width;
            $newHeight = $height;
        }

        return [round($newWidth), round($newHeight)];
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return (string)$this->id;
    }
}
