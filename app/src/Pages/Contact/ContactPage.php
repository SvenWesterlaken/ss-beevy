<?php

namespace App\Pages;

use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\TextField;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Assets\Image;
use Page;

/**
 * Description
 *
 * @package silverstripe
 * @subpackage mysite
 */
class ContactPage extends Page
{
  /**
   * Database fields
   * @var array
   */
  private static $db = [
    'Heading' => 'Varchar',
    'SubHeading' => 'Varchar'
  ];

  /**
   * Has_one relationship
   * @var array
   */
  private static $has_one = [
    'HeaderImage' => Image::class
  ];

  /**
   * Relationship version ownership
   * @var array
   */
  private static $owns = [
    'HeaderImage'
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
        TextField::create('Heading', 'Tekst in de header'),
        TextField::create('SubHeading', '\'Subtekst\' in de header'),
        UploadField::create('HeaderImage', 'Achtergrond van de header')
      ],
      'Metadata'
    );
    return $fields;
  }
}
