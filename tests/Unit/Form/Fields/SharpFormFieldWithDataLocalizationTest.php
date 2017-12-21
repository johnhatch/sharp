<?php

namespace Code16\Sharp\Tests\Unit\Form\Fields;

use Code16\Sharp\Form\Fields\SharpFormMarkdownField;
use Code16\Sharp\Form\Fields\SharpFormTextareaField;
use Code16\Sharp\Form\Fields\SharpFormTextField;
use Code16\Sharp\Form\Fields\SharpFormWysiwygField;
use Code16\Sharp\Tests\SharpTestCase;

class SharpFormFieldWithDataLocalizationTest extends SharpTestCase
{

    /** @test */
    function we_can_define_the_localized_attribute_for_text_field()
    {
        $formField = SharpFormTextField::make("name")
            ->setLocalized(false);

        $this->assertArrayNotHasKey(
            "localized", $formField->toArray()
        );

        $formField->setLocalized();

        $this->assertArraySubset(
            ["localized" => true], $formField->toArray()
        );
    }

    /** @test */
    function we_can_define_the_localized_attribute_for_textarea_field()
    {
        $formField = SharpFormTextareaField::make("name")
            ->setLocalized();

        $this->assertArraySubset(
            ["localized" => true], $formField->toArray()
        );
    }

    /** @test */
    function we_can_define_the_localized_attribute_for_wysiwyg_field()
    {
        $formField = SharpFormWysiwygField::make("name")
            ->setLocalized();

        $this->assertArraySubset(
            ["localized" => true], $formField->toArray()
        );
    }

    /** @test */
    function we_can_define_the_localized_attribute_for_markdown_field()
    {
        $formField = SharpFormMarkdownField::make("name")
            ->setLocalized();

        $this->assertArraySubset(
            ["localized" => true], $formField->toArray()
        );
    }
}