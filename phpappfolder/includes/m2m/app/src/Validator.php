<?php

namespace M2m;

/**
 *
 * A validator class to sanitize user input.
 *
 * Class Validator
 * @package M2m
 */
class Validator
{
    public function __construct() { }

    public function __destruct() { }

    /**
     *
     * Function to sanitise a string.
     *
     * @param string $string_to_sanitise
     * @return string
     */
    public function sanitiseString(string $string_to_sanitise): string
    {
        $sanitised_string = false;

        if (!empty($string_to_sanitise))
        {
            $sanitised_string = filter_var($string_to_sanitise, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        }
        return $sanitised_string;
    }

    /**
     *
     * Function to validate an Integer.
     *
     * @param int $int_to_sanitise
     * @return int
     */
    public function validateInt(int $int_to_sanitise): int
    {
        $validated_int = false;

        if (!empty($int_to_sanitise))
        {
            $sanitised_string = filter_var($int_to_sanitise, FILTER_SANITIZE_STRING);
            $validated_int = filter_var($sanitised_string, FILTER_VALIDATE_INT);
        }
        return $validated_int;
    }

    /**
     *
     * Function to validate a Boolean.
     *
     * @param bool $bool_to_validate
     * @return bool
     */
    public function validateBool(bool $bool_to_validate): bool
    {
        $validated_bool = false;

        if (!empty($bool_to_validate))
        {
            $sanitised_string = filter_var($bool_to_validate, FILTER_VALIDATE_BOOLEAN);
            $validated_bool = filter_var($sanitised_string, FILTER_VALIDATE_BOOLEAN);
        }
        return $validated_bool;
    }

    /**
     *
     * Function to sanitize a date time string.
     *
     * @param string $date_time_to_sanitise
     * @return string
     */
    public function validateDateTime(string $date_time_to_sanitise): string
    {
        $validated_dt = false;


        if (!empty($date_time_to_sanitise))
        {
            $sanitised_string = filter_var($date_time_to_sanitise, FILTER_SANITIZE_STRING);

            $date = str_replace('/', '-', $sanitised_string);

            $validated_dt = date('Y-m-d H:i:s', strtotime($date));

        }
        return $validated_dt;
    }

    /**
     *
     * Function to sanitize an email.
     *
     * @param string $email_to_sanitise
     * @return string
     */
    public function sanitiseEmail(string $email_to_sanitise): string
    {
        $cleaned_string = false;

        if (!empty($email_to_sanitise))
        {
            $sanitised_email = filter_var($email_to_sanitise, FILTER_SANITIZE_EMAIL);
            $cleaned_string = filter_var($sanitised_email, FILTER_VALIDATE_EMAIL);
        }
        return $cleaned_string;
    }
}
