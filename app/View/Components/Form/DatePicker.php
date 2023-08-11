<?php

namespace App\View\Components\Form;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DatePicker extends Component
{
    public bool $enableTime;

    public bool $noCalendar;

    public string $dateFormat;

    public string $timeFormat;

    public string $altDateFormat;

    public string $altTimeFormat;

    public string $format;

    public string $altFormat;

    private static array $defaultOptions = [
        'enableTime' => true,
        'noCalendar' => false,
        'dateFormat' => 'Y-m-d',
        'timeFormat' => 'H:i:S',
        'altDateFormat' => 'F j, Y',
        'altTimeFormat' => 'H:i:S',
        'format' => '',
        'altFormat' => '',
    ];

    public function __construct(
        public string $id,
        public string $label,
        public Carbon|string $value = '',
        array $options = [],
        public bool $hideLabel = false,
    ) {
        $this->setOptions($options);
    }

    public function render(): View|Closure|string
    {
        return view('components.form.date-picker');
    }

    private function setOptions(array $options): void
    {
        if (!$options) {
            $options = static::$defaultOptions;
        } else {
            $options = [...static::$defaultOptions, ...$options];
        }

        foreach (array_keys(static::$defaultOptions) as $key) {
            $this->{$key} = $options[$key];
        }

        if (!$this->format) {
            $this->format = $this->makeFormat($this->dateFormat, $this->timeFormat);
        }

        if (!$this->altFormat) {
            $this->altFormat = $this->makeFormat(
                $this->altDateFormat ?: $this->dateFormat,
                $this->altTimeFormat ?: $this->timeFormat,
                ', ',
            );
        }
    }

    private function makeFormat(string $dateFormat, string $timeFormat, string $separator = ' '): string
    {
        $format = '';

        if (!$this->noCalendar) {
            $format .= $dateFormat;
        }

        if ($this->enableTime) {
            if ($format) {
                $format .= $separator;
            }

            $format .= $timeFormat;
        }

        return $format;
    }
}
