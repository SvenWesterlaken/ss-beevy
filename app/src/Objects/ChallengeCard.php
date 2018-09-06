<?php

namespace App\Objects;

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Assets\File;
use SilverStripe\ORM\DataObject;

/**
 * Description
 *
 * @package silverstripe
 * @subpackage mysite
 */
class ChallengeCard extends DataObject
{

  /**
   * Database fields
   * @var array
   */
  private static $db = [
    'Heading' => 'Varchar',
    'Information' => 'Varchar'
  ];

  /**
   * Has_one relationship
   * @var array
   */
  private static $has_one = [
    'Icon' => File::class,
    'Link' => SiteTree::class
  ];

  /**
   * Relationship version ownership
   * @var array
   */
  private static $owns = [
    'Icon'
  ];

  /**
   * Defines summary fields commonly used in table columns
   * as a quick overview of the data for this dataobject
   * @var array
   */
  private static $summary_fields = [
    'Heading' => 'Titel'
  ];

  /**
   * CMS Fields
   * @return FieldList
   */
  public function getCMSFields()
  {
    $iconField = UploadField::create('Icon', 'Afbeelding')
      ->setAllowedExtensions(array('svg'));

    return FieldList::create(
      TextField::create('Heading', 'Titel'),
      TextField::create('Information', 'Tekst onder titel'),
      $iconField,
      TreeDropdownField::create('LinkID', 'Link', SiteTree::class)
    );
  }



}
