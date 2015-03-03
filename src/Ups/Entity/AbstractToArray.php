<?php
namespace Ups\Entity;

/**
 * Class ToArrayInterface
 */
abstract class AbstractToArray
{

    /**
     * Transform object to array
     */
    public function toArray()
    {
        $return = array();

        foreach (get_object_vars($this) as $key => $value) {
            $key = ucfirst($key);
            if (is_object($value) && $value instanceof AbstractToArray) {
                $return[$key] = $value->toArray();
            } elseif (is_object($value) && $value instanceof \DateTime) {
                $return[$key] = $value->format('YmdHis');
            } elseif (is_bool($value)) {
                $return[$key] = $value ? 'Y' : 'N';
            } elseif (is_array($value)) {
                if ($value !== array()) {
                    $return[$key] = $value;
                }
            } elseif ($value !== NULL) {
                $return[$key] = (string)$value;
            }
        }
        return $return;
    }
}