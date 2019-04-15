<?php
/**
 * MyAllocator BuildToUs PHP SDK Error Object
 *
 * @package     myallocator/myallocator-php-sdk-ota
 * @author      Nathan Helenihi <support@myallocator.com>
 * @copyright   Copyright (c) MyAllocator
 * @license     http://mit-license.org/
 * @link        https://github.com/MyAllocator/myallocator-php-sdk-ota
 */

namespace MyAllocator\phpsdkota\src\Object;

class MaError
{
    /**
     * @var integer The error id.
     */
    public $id = null;

    /**
     * @var string The error type.
     */
    public $type = null;

    /**
     * @var string The error message
     */
    public $msg = null;

    /**
     * @var mixed The data to return (if any).
     */
    public $data = null;

    /**
     * @var mixed MA error mappings.
     */
    private $errors = null;

    /**
     * Class contructor.
     */
    public function __construct($id = null, $data = null)
    {
        // Load error definitions
        $this->errors = require(dirname(__FILE__) . '/../Config/MaErrorTypes.php');

        // Assign error by id
        if (!$id || !isset($this->errors[$id])) {
            $id = MA_OTA_ERR;
        }

        $this->id = $id;
        $this->type = $this->errors[$id]['type'];
        $this->msg = $this->errors[$id]['msg'];
        if ($data) {
            $this->data = $data;
        }
    }

    /**
     * Get error mappings.
     *
     * @return array Error mappings
     */
    public function getMappings()
    {
        return $this->errors;
    }

    /**
     * Convert error object to an array.
     *
     * @return array Error in array format.
     */
    public function toArray()
    {
        return array(
            'id' => $this->id,
            'type' => $this->type,
            'msg' => $this->msg,
            'data' => $this->data
        );
    }
}
