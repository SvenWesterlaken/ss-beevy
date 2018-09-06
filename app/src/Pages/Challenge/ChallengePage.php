<?php

namespace App\Pages;

use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\TextField;
use App\Objects\ChallengeSection;
use SilverStripe\Assets\Image;
use Page;

/**
 * Description
 *
 * @package silverstripe
 * @subpackage mysite
 */
class ChallengePage extends Page
{
  private static $can_be_root = false;

  /**
   * Database fields
   * @var array
   */
  private static $db = [
    'SubTitle' => 'Varchar',
    'HeaderButtonText' => 'Varchar',
    'Type' => 'Varchar',
    'EducationType' => 'Varchar',
    'EducationLevel' => 'Varchar',
    'Place' => 'Varchar',
    'FeatureOnHomepage' => 'Boolean',
    'BottomText' => 'Varchar',
    'BottomButtonText' => 'Varchar'
  ];

  /**
   * Has_one relationship
   * @var array
   */
  private static $has_one = [
    'HeaderImage' => Image::class,
    'BottomButtonLink' => SiteTree::class,
    'HeaderButtonLink' => SiteTree::class
  ];

  /**
   * Has_many relationship
   * @var array
   */
  private static $has_many = [
    'Sections' => ChallengeSection::class,
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
    $fields->addFieldToTab('Root.Main', TextField::create('SubTitle', 'Subtitel'), 'URLSegment');

    $fields->addFieldsToTab(
      'Root.Main',
      [
        TextField::create('HeaderButtonText', 'Tekst voor knop aan het begin'),
        TreeDropdownField::create('HeaderButtonLinkID', 'Link voor knop aan het begin', SiteTree::class),
        CheckboxField::create('FeatureOnHomepage', 'Tonen op de startpagina?'),
        UploadField::create('HeaderImage', 'Afbeelding van challenge'),
        TextField::create('Type', 'Type'),
        TextField::create('EducationType', 'Soort Opleiding'),
        TextField::create('EducationLevel', 'Niveau'),
        TextField::create('Place', 'Plaats (Stad) van de Challenge'),
        TextField::create('BottomText', 'Tekst voor boven de knop aan het eind'),
        TextField::create('BottomButtonText', 'Tekst voor knop aan het eind'),
        TreeDropdownField::create('BottomButtonLinkID', 'Link voor knop aan het eind', SiteTree::class)
      ],
      'Metadata'
    );

    $sortableGridConfig = GridFieldConfig_RecordEditor::create(10);
    $sortableGridConfig->addComponent(new GridFieldSortableRows('Number'));

    $fields->addFieldToTab('Root.Secties', GridField::create('Sections', 'Secties', $this->Sections(), $sortableGridConfig));

    return $fields;
  }
}
