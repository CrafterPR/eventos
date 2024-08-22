<?php

use App\Enum\EventStatus;
use App\Models\Event;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * @param $dayId
 * @return Collection|array
 */

if (! function_exists('transform_config')) {
    function trim_text($text, $count = 10)
    {
        $text = str_replace("  ", " ", $text);
        $string = explode(" ", $text);
        $trimmed = "";
        for ($wordCounter = 0; $wordCounter <= $count; $wordCounter++) {
            if (array_key_exists($wordCounter, $string)) {
                $trimmed .= $string[$wordCounter];
            }
            if ($wordCounter < $count) {
                $trimmed .= " ";
            } else {
                $trimmed .= "...";
            }
        }
        return trim($trimmed);
    }
}

if (! function_exists('transform_config')) {
    function transform_config(string $configKeyString, $dataVariables = []): string
    {
        foreach ($dataVariables as $key => $variable) {
            if ($key) {
                $configKeyString = str_replace('{' . $key . '}', $variable, $configKeyString);
            }
        }

        return $configKeyString;
    }
}

if (!function_exists('getDaySchedules')) {
    function getDaySchedules($dayId): Collection|array
    {
        return Schedule::query()->where('programme_id', $dayId)
            ->get();
    }
}


if (!function_exists('checkEventDateTime')) {
    function checkEventDateTime($event): bool
    {
        $datetimeToCheck = Carbon::now();

        $startDatetime = $event->start == '00:00:00' ? Carbon::parse('01-09-2023') : Carbon::parse($event->programme->date . $event->start);
        $endDatetime = Carbon::parse($event->programme->date . $event->end);

        if ($datetimeToCheck->between($startDatetime, $endDatetime)) {
            return true;
        }
        return false;
    }
}

if (!function_exists('isTheDateCurrent')) {
    function isTheDateCurrent($day): bool
    {
        if (Carbon::now() < Carbon::parse('27-11-2023')) {
            return $day->date == Carbon::parse('27-11-2023');
        } else {
            return Carbon::parse($day->date) == Carbon::now();
        }
    }
}
if (!function_exists('theme')) {
    function theme()
    {
        return app(App\Core\Theme::class);
    }
}


if (!function_exists('getName')) {
    /**
     * Get product name
     *
     * @return void
     */
    function getName()
    {
        return config('settings.KT_THEME');
    }
}


if (!function_exists('addHtmlAttribute')) {
    /**
     * Add HTML attributes by scope
     *
     * @param $scope
     * @param $name
     * @param $value
     *
     * @return void
     */
    function addHtmlAttribute($scope, $name, $value)
    {
        theme()->addHtmlAttribute($scope, $name, $value);
    }
}


if (!function_exists('addHtmlAttributes')) {
    /**
     * Add multiple HTML attributes by scope
     *
     * @param $scope
     * @param $attributes
     *
     * @return void
     */
    function addHtmlAttributes($scope, $attributes)
    {
        theme()->addHtmlAttributes($scope, $attributes);
    }
}


if (!function_exists('addHtmlClass')) {
    /**
     * Add HTML class by scope
     *
     * @param $scope
     * @param $value
     *
     * @return void
     */
    function addHtmlClass($scope, $value)
    {
        theme()->addHtmlClass($scope, $value);
    }
}


if (!function_exists('printHtmlAttributes')) {
    /**
     * Print HTML attributes for the HTML template
     *
     * @param $scope
     *
     * @return string
     */
    function printHtmlAttributes($scope)
    {
        return theme()->printHtmlAttributes($scope);
    }
}


if (!function_exists('printHtmlClasses')) {
    /**
     * Print HTML classes for the HTML template
     *
     * @param $scope
     * @param $full
     *
     * @return string
     */
    function printHtmlClasses($scope, $full = true)
    {
        return theme()->printHtmlClasses($scope, $full);
    }
}


if (!function_exists('getSvgIcon')) {
    /**
     * Get SVG icon content
     *
     * @param $path
     * @param $classNames
     * @param $folder
     *
     * @return string
     */
    function getSvgIcon($path, $classNames = 'svg-icon', $folder = 'assets/media/icons/')
    {
        return theme()->getSvgIcon($path, $classNames, $folder);
    }
}


if (!function_exists('setModeSwitch')) {
    /**
     * Set dark mode enabled status
     *
     * @param $flag
     *
     * @return void
     */
    function setModeSwitch($flag)
    {
        theme()->setModeSwitch($flag);
    }
}


if (!function_exists('isModeSwitchEnabled')) {
    /**
     * Check dark mode status
     *
     * @return void
     */
    function isModeSwitchEnabled()
    {
        return theme()->isModeSwitchEnabled();
    }
}


if (!function_exists('setModeDefault')) {
    /**
     * Set the mode to dark or light
     *
     * @param $mode
     *
     * @return void
     */
    function setModeDefault($mode)
    {
        theme()->setModeDefault($mode);
    }
}


if (!function_exists('getModeDefault')) {
    /**
     * Get current mode
     *
     * @return void
     */
    function getModeDefault()
    {
        return theme()->getModeDefault();
    }
}


if (!function_exists('setDirection')) {
    /**
     * Set style direction
     *
     * @param $direction
     *
     * @return void
     */
    function setDirection($direction)
    {
        theme()->setDirection($direction);
    }
}


if (!function_exists('getDirection')) {
    /**
     * Get style direction
     *
     * @return void
     */
    function getDirection()
    {
        return theme()->getDirection();
    }
}


if (!function_exists('isRtlDirection')) {
    /**
     * Check if style direction is RTL
     *
     * @return void
     */
    function isRtlDirection()
    {
        return theme()->isRtlDirection();
    }
}


if (!function_exists('extendCssFilename')) {
    /**
     * Extend CSS file name with RTL or dark mode
     *
     * @param $path
     *
     * @return void
     */
    function extendCssFilename($path)
    {
        return theme()->extendCssFilename($path);
    }
}


if (!function_exists('includeFavicon')) {
    /**
     * Include favicon from settings
     *
     * @return string
     */
    function includeFavicon()
    {
        return theme()->includeFavicon();
    }
}


if (!function_exists('includeFonts')) {
    /**
     * Include the fonts from settings
     *
     * @return string
     */
    function includeFonts()
    {
        return theme()->includeFonts();
    }
}


if (!function_exists('getGlobalAssets')) {
    /**
     * Get the global assets
     *
     * @param $type
     *
     * @return array
     */
    function getGlobalAssets($type = 'js')
    {
        return theme()->getGlobalAssets($type);
    }
}


if (!function_exists('addVendors')) {
    /**
     * Add multiple vendors to the page by name. Refer to settings KT_THEME_VENDORS
     *
     * @param $vendors
     *
     * @return void
     */
    function addVendors($vendors)
    {
        theme()->addVendors($vendors);
    }
}


if (!function_exists('addVendor')) {
    /**
     * Add single vendor to the page by name. Refer to settings KT_THEME_VENDORS
     *
     * @param $vendor
     *
     * @return void
     */
    function addVendor($vendor)
    {
        theme()->addVendor($vendor);
    }
}


if (!function_exists('addJavascriptFile')) {
    /**
     * Add custom javascript file to the page
     *
     * @param $file
     *
     * @return void
     */
    function addJavascriptFile($file): void
    {
        theme()->addJavascriptFile($file);
    }
}


if (!function_exists('addCssFile')) {
    /**
     * Add custom CSS file to the page
     *
     * @param $file
     *
     * @return void
     */
    function addCssFile($file)
    {
        theme()->addCssFile($file);
    }
}


if (!function_exists('getVendors')) {
    /**
     * Get vendor files from settings. Refer to settings KT_THEME_VENDORS
     *
     * @param $type
     *
     * @return array
     */
    function getVendors($type)
    {
        return theme()->getVendors($type);
    }
}


if (!function_exists('getCustomJs')) {
    /**
     * Get custom js files from the settings
     *
     * @return array
     */
    function getCustomJs()
    {
        return theme()->getCustomJs();
    }
}


if (!function_exists('getCustomCss')) {
    /**
     * Get custom css files from the settings
     *
     * @return array
     */
    function getCustomCss()
    {
        return theme()->getCustomCss();
    }
}


if (!function_exists('getHtmlAttribute')) {
    /**
     * Get HTML attribute based on the scope
     *
     * @param $scope
     * @param $attribute
     *
     * @return array
     */
    function getHtmlAttribute($scope, $attribute)
    {
        return theme()->getHtmlAttribute($scope, $attribute);
    }
}


if (!function_exists('isUrl')) {
    /**
     * Get HTML attribute based on the scope
     *
     * @param $url
     *
     * @return mixed
     */
    function isUrl($url)
    {
        return filter_var($url, FILTER_VALIDATE_URL);
    }
}


if (!function_exists('image')) {
    /**
     * Get image url by path
     *
     * @param $path
     *
     * @return string
     */
    function image($path): string
    {
        return asset('assets/media/' . $path);
    }
}


if (!function_exists('format_time')) {
    /**
     * Get icon
     *
     * @param string $time
     * @param string $format
     * @return string
     */
    function format_time(string $time, string $format = 'H:i a'): string
    {
        return Carbon::parse($time)->format($format);
    }
}

if (!function_exists('format_date')) {
    /**
     * Get icon
     *
     * @param string $time
     * @param string|null $format
     * @return string|null
     */
    function format_date(string $time, ?string $format = 'dS M, Y'): ?string
    {
        if ($time != '') {
            return Carbon::parse($time)->format($format);
        }

        return null;
    }
}


if (!function_exists('getIcon')) {
    /**
     * Get icon
     *
     * @param $name
     * @param string $class
     * @param string $type
     * @param string $tag
     * @return string
     */
    function getIcon($name, string $class = '', string $type = '', string $tag = 'span'): string
    {
        return theme()->getIcon($name, $class, $type, $tag);
    }
}

if (!function_exists('generate_reference_no')) {
    function generate_reference_no($table, $col, $chars = 8): int|string
    {
        $unique = false;

        // Store tested results in array to not test them again
        $tested = [];

        do {
            // Generate random string of characters
            $random = rand(1, 9);
            for ($i = 0; $i < $chars - 1; $i++) {
                $random .= mt_rand(0, 9);
            }

            // Check if it's already testing
            // If so, don't query the database again
            if (in_array($random, $tested)) {
                continue;
            }

            // Check if it is unique in the database
            $count = DB::table($table)->where($col, '=', $random)->count();

            // Store the random character in the tested array
            // To keep track which ones are already tested
            $tested[] = $random;

            // String appears to be unique
            if ($count == 0) {
                // Set unique to true to break the loop
                $unique = true;
            }

            // If unique is still false at this point
            // it will just repeat all the steps until
            // it has generated a random string of characters
        } while (!$unique);

        return $random;
    }
}

if (!function_exists("get_current_summit")) {
    /**
     * @return Model|Builder|Event
     * @throws Exception
     */
    function get_current_summit(): Model|Builder|Event
    {
        return Event::where('status', EventStatus::ACTIVE)
             ->latest()
             ->firstOrFail();
    }
}


if (!function_exists("get_first_last_name")) {
    /**
     * @param $fullName
     * @return array
     */
    function get_first_last_name($fullName): array
    {
        $nameParts = explode(' ', $fullName);

        if (count($nameParts) >= 2) {
            $first_name = $nameParts[0];
            $last_name = implode(' ', array_slice($nameParts, 1));
        } else {
            $first_name = $fullName;
            $last_name = '';
        }

        return [
            $first_name,
            $last_name
        ];
    }
}

if (!function_exists("generate_random_password")) {
    /**
     * @param int $length
     * @return string
     */
    function generate_random_password(int $length = 8): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*';
        $password = '';

        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $password;
    }
}

if (!function_exists("random_bg")) {
    /**
     * Retrieve random background color
     * @return string
     */
    function random_bg(): string
    {
        $colors = [
            'bg-info text-inverse-info',
            'bg-primary text-inverse-primary',
            'bg-success text-inverse-success',
            'bg-danger text-inverse-danger',
            'bg-warning text-inverse-warning',
        ];

        $randomIndex = array_rand($colors);

        return $colors[$randomIndex];
    }
}

if (!function_exists("get_status")) {
    /**
     * Get badge background color
     * @param string $status
     * @return string
     */
    function get_status(string $status): string
    {
        $color = match ($status) {
            "pending" => "primary",
            "settled" => "success",
            "failed" => "danger",
            default => "info"
        };

        return '<span class="badge py-3 px-4 fs-7 badge-' . $color . '">' . ucfirst($status) . '</span>';
    }
}
