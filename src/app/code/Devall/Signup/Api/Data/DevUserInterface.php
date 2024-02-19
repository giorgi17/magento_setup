<?php declare(strict_types=1);

namespace Devall\Signup\Api\Data;

/**
 * Dev user interface
 * @api
 * @since 1.0.0
 */
interface DevUserInterface
{
    const ID = 'id';
    const NAME = 'name';
    const DATE = 'date';
    const CREATED_AT = 'created_at';

    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $value
     * @return $this
     */
    public function setId($value);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getDate();

    /**
     * Set the date.
     *
     * @param string $date
     * @return $this
     */
    public function setDate($date);

    /**
     * @return string
     */
    public function getCreatedAt();
}
