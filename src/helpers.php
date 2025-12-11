<?php

use Alagaccia\LaravelSettings\Models\Setting;

if (! function_exists('getSetting')) {
    /**
     * Get a setting value by code.
     *
     * @param string $code
     * @param mixed $default
     * @return mixed
     */
    function getSetting(string $code, $default = null)
    {
        return Setting::getByCode($code, $default);
    }
}

if (! function_exists('setSetting')) {
    /**
     * Set a setting value by code.
     *
     * @param string $code
     * @param string $value
     * @param string|null $category
     * @param string|null $label
     * @return \Alagaccia\LaravelSettings\Models\Setting
     */
    function setSetting(string $code, string $value, ?string $category = null, ?string $label = null)
    {
        return Setting::setByCode($code, $value, $category, $label);
    }
}
