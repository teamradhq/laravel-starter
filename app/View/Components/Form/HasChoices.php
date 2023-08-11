<?php

namespace App\View\Components\Form;

/**
 * Provides methods for form components that have choice selection.
 */
trait HasChoices
{
    protected function setChoices(array $choices): void
    {
        $this->choices = [];

        foreach ($choices as $choice) {
            $this->choices[] = $this->setChoice($choice);
        }
    }

    /**
     * @return array|string[]
     */
    private function setChoice(array|string|bool|int $choice): array
    {
        if (!is_array($choice)) {
            return [
                'value' => $choice,
                'label' => $choice,
                'selected' => (string) $choice === (string) $this->value,
            ];
        }

        return [
            ...$choice,
            'selected' => (string) $choice['value'] === (string) $this->value,
        ];
    }
}
