<?php

namespace xemware\fuelux;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\InputWidget;


/**
 * @see http://exacttarget.github.io/fuelux/javascript.html#checkboxes
 * @author Leandrogehlen <leandroghelen@gmail.com>
 * @since 2.0
 */
class Combobox extends InputWidget
{
    /**
     * @var string the drop down menu alignment
     */
    public $menuAlignment = 'right';

    /**
     * @var Array drop down items
     */
    public $data = [];

    private $_internalOptions;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->initInternalOptions();
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
        Html::addCssClass($this->options, 'sr-only');

        $this->renderCombobox();
    }

    /**
     * Renders the combobox input
     */
    public function renderCombobox()
    {
        Html::addCssClass($this->_internalOptions, 'input-group input-append dropdown combobox');
        echo Html::beginTag('div', $this->_internalOptions) . "\n";
        if ($this->hasModel()) {
            echo Html::activeTextInput($this->model, $this->attribute, ['class' => 'form-control']) . "\n";
        } else {
            echo Html::textInput($this->name, $this->value, ['class' => 'form-control']) . "\n";
        }

        echo Html::beginTag('div', ['class' => 'input-group-btn']) . "\n";

        echo Html::tag('button','<span class="caret"></span>', ['data' => ['toggle' => 'dropdown'],'class' => 'btn btn-default dropdown-toggle']) . "\n";
        echo Html::beginTag('ul', ['class' => 'dropdown-menu' . ($this->menuAlignment == 'right' ? ' dropdown-menu-right' : '')]);
        foreach($this->data as $dataItem)
        {
            echo Html::beginTag('li',['data-value' => $dataItem['value']]);
            echo Html::a($dataItem['label'],'#');
            echo Html::endTag('li') . "\n";
        }

        echo Html::endTag('ul') . "\n";
        echo Html::endTag('div') . "\n";

        echo Html::endTag('div') . "\n";
    }

    /**
     * Initializes the internal options.
     * This method sets the default values for various options.
     */
    protected function initInternalOptions()
    {
        $this->_internalOptions = [
            'id' => ArrayHelper::remove($this->options, 'id'),
            'data-initialize' => 'combobox'
        ];

    }

} 