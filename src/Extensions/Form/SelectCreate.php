<?php


namespace Celaraze\DcatPlus\Extensions\Form;


use Celaraze\DcatPlus\Support;
use Dcat\Admin\Form;
use Dcat\Admin\Form\Field\Select;
use Dcat\Admin\Support\Helper;

class SelectCreate extends Select
{
    protected $view = 'celaraze.dcat-extension-plus::select_create';

    protected $url = null;

    /**
     * {@inheritdoc}
     */
    public function render()
    {
        $this->addDefaultConfig([
            'allowClear' => true,
            'placeholder' => [
                'id' => '',
                'text' => $this->placeholder(),
            ],
        ]);

        $this->formatOptions();

        $this->addVariables([
            'options' => $this->options,
            'groups' => $this->groups,
            'configs' => $this->config,
            'cascadeScript' => $this->getCascadeScript(),
            'createDialog' => $this->build()
        ]);

        $this->attribute('data-value', implode(',', Helper::array($this->value())));

        return parent::render();
    }

    protected function build(): string
    {
        Form::dialog('新建')
            ->click('.create-form')
            ->url($this->url)
            ->width('700px')
            ->height('650px');

        $text = Support::trans('main.select_create');

        return "<span class='input-group-append btn btn-success create-form'> $text </span>";
    }

    public function url($url): SelectCreate
    {
        $this->url = $url;
        return $this;
    }
}
