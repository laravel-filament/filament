<?php

namespace Filament\Fields;

class Choices extends BaseField
{
    public $options = [];

    public $type = 'checkbox';

    public function options(array $options)
    {
        foreach ($options as $value => $label) {
            $this->options[] = Checkbox::make($this->model)
                ->type($this->type)
                ->label($label)
                ->hideErrorOutput()
                ->extraAttributes([
                    'name' => $this->name(),
                ])
                ->value($value);
        }

        return $this;
    }

    public function radio()
    {
        $this->type = 'radio';

        return $this;
    }

    protected function name()
    {
        return 'radio' === $this->type ? $this->model : $this->model . '[]';
    }
}
