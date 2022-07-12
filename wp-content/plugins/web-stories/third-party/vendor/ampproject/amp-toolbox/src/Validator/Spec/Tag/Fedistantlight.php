<?php

/**
 * DO NOT EDIT!
 * This file was automatically generated via bin/generate-validator-spec.php.
 */
namespace Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\Tag;

use Google\Web_Stories_Dependencies\AmpProject\Format;
use Google\Web_Stories_Dependencies\AmpProject\Html\Attribute;
use Google\Web_Stories_Dependencies\AmpProject\Html\Tag as Element;
use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\AttributeList;
use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\Identifiable;
use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\SpecRule;
use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\Tag;
/**
 * Tag class Fedistantlight.
 *
 * @package ampproject/amp-toolbox.
 *
 * @property-read string $tagName
 * @property-read array<array> $attrs
 * @property-read array<string> $attrLists
 * @property-read string $specUrl
 * @property-read string $mandatoryAncestor
 * @property-read array<string> $htmlFormat
 */
final class Fedistantlight extends Tag implements Identifiable
{
    /**
     * ID of the tag.
     *
     * @var string
     */
    const ID = 'FEDISTANTLIGHT';
    /**
     * Array of spec rules.
     *
     * @var array
     */
    const SPEC = [SpecRule::TAG_NAME => Element::FEDISTANTLIGHT, SpecRule::ATTRS => [Attribute::AZIMUTH => [], Attribute::ELEVATION => []], SpecRule::ATTR_LISTS => [AttributeList\SvgCoreAttributes::ID], SpecRule::SPEC_URL => 'https://amp.dev/documentation/guides-and-tutorials/learn/spec/amphtml/#svg', SpecRule::MANDATORY_ANCESTOR => Element::SVG, SpecRule::HTML_FORMAT => [Format::AMP, Format::AMP4ADS]];
}
