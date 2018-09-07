<?php

namespace App\Pages;

use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\TextField;
use Page;

/**
 * Description
 *
 * @package silverstripe
 * @subpackage mysite
 */
class ChallengeHolder extends Page
{
  /**
   * Defines the allowed child page types
   * @var array
   */
  private static $allowed_children = [
    ChallengePage::class
  ];

  /**
   * Database fields
   * @var array
   */
  private static $db = [
    'BottomText' => 'Varchar',
    'BottomButtonText' => 'Varchar'
  ];

  /**
   * Has_one relationship
   * @var array
   */
  private static $has_one = [
    'BottomButtonLink' => SiteTree::class,
  ];

  /**
   * CMS Fields
   * @return FieldList
   */
  public function getCMSFields()
  {
    $fields = parent::getCMSFields();
    $fields->removeByName(['Content']);

    $fields->addFieldsToTab(
      'Root.Main',
      [
        TextField::create('BottomText', 'Tekst voor aan het eind'),
        TextField::create('BottomButtonText', 'Tekst voor knop aan het eind'),
        TreeDropdownField::create('BottomButtonLinkID', 'Link voor knop aan het eind', SiteTree::class)
      ],
      'Metadata'
    );
    return $fields;
  }
}
