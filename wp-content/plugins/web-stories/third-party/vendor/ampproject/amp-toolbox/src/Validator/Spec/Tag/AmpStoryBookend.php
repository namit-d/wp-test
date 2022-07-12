<?php

/**
 * DO NOT EDIT!
 * This file was automatically generated via bin/generate-validator-spec.php.
 */
namespace Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\Tag;

use Google\Web_Stories_Dependencies\AmpProject\Extension;
use Google\Web_Stories_Dependencies\AmpProject\Format;
use Google\Web_Stories_Dependencies\AmpProject\Html\Attribute;
use Google\Web_Stories_Dependencies\AmpProject\Protocol;
use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\DescendantTagList;
use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\Identifiable;
use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\SpecRule;
use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\Tag;
/**
 * Tag class AmpStoryBookend.
 *
 * @package ampproject/amp-toolbox.
 *
 * @property-read string $tagName
 * @property-read array $attrs
 * @property-read string $mandatoryAncestor
 * @property-read array<string> $htmlFormat
 * @property-read string $descendantTagList
 * @property-read bool $mandatoryLastChild
 */
final class AmpStoryBookend extends Tag implements Identifiable
{
    /**
     * ID of the tag.
     *
     * @var string
     */
    const ID = 'AMP-STORY-BOOKEND';
    /**
     * Array of spec rules.
     *
     * @var array
     */
    const SPEC = [SpecRule::TAG_NAME => Extension::STORY_BOOKEND, SpecRule::ATTRS => [Attribute::LAYOUT => [SpecRule::MANDATORY => \true, SpecRule::VALUE => ['nodisplay']], Attribute::SRC => [SpecRule::VALUE_URL => [SpecRule::PROTOCOL => [Protocol::HTTP, Protocol::HTTPS]]]], SpecRule::MANDATORY_ANCESTOR => Extension::STORY, SpecRule::HTML_FORMAT => [Format::AMP], SpecRule::DESCENDANT_TAG_LIST => DescendantTagList\AmpStoryBookendAllowedDescendants::ID, SpecRule::MANDATORY_LAST_CHILD => \true];
}