<?php

namespace App\Pages;

use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\HTMLEditor\HtmlEditorField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\TextField;
use SilverStripe\Assets\Image;
use App\Objects\ChallengeCard;
use App\Objects\Benefit;
use Page;

/**
 * Description
 *
 * @package silverstripe
 * @subpackage mysite
 */
class HomePage extends Page
{
  /**
   * Database fields
   * @var array
   */
  private static $db = [
    'HeaderTitle' => 'HTMLVarchar',
    'SubTitle' => 'Varchar',
    'ButtonText' => 'Varchar',
    'VideoLink' => 'Varchar',
    'CardsHeading' => 'HTMLVarchar',
    'CardsButtonText' => 'Varchar',
    'CardsSubLinkText' => 'Varchar',
    'ChallengesHeading' => 'HTMLVarchar',
    'ChallengesSubHeading' => 'Varchar',
    'BenefitsHeading' => 'Varchar',
    'InformationHeading' => 'HTMLText',
    'InformationButtonText' => 'Varchar'
  ];

  /**
   * Has_one relationship
   * @var array
   */
  private static $has_one = [
    'ImageMobile' => Image::class,
    'ImageDesktop' => Image::class,
    'ButtonLink' => SiteTree::class,
    'CardsButtonLink' => SiteTree::class,
    'CardsSubLink' => SiteTree::class,
    'BenefitsBackgroundImage' => Image::class,
    'InformationButtonLink' => SiteTree::class
  ];

  /**
   * Has_many relationship
   * @var array
   */
  private static $has_many = [
    'Benefits' => Benefit::class,
  ];

  /**
   * Many_many relationship
   * @var array
   */
  private static $many_many = [
    'ChallengeCards' => ChallengeCard::class,
  ];

  /**
   * Defines Database fields for the Many_many bridging table
   * @var array
   */
  private static $many_many_extraFields = [
    'ChallengeCards' => [
      'SortOrder' => 'Int'
    ]
  ];

  /**
   * Relationship version ownership
   * @var array
   */
  private static $owns = [
    'ImageMobile',
    'ImageDesktop',
    'BenefitsBackgroundImage'
  ];

  /**
   * Ensures that the methods are wrapped in the correct type and
   * values are safely escaped while rendering in the template.
   * @var array
   */
  private static $casting = [
    'TitleFormatted' => 'HTMLVarchar',
    'CardsHeadingFormatted' => 'HTMLVarchar',
    'ChallengesHeading' => 'HTMLVarchar',
    'InformationHeading' => 'HTMLVarchar'
  ];

  public function TitleFormatted() {
    return $this->escapeHTMLText($this->HeaderTitle);
  }

  public function CardsHeadingFormatted() {
    return $this->escapeHTMLText($this->CardsHeading);
  }

  public function ChallengesHeading() {
    return $this->escapeHTMLText($this->ChallengesHeading);
  }

  public function InformationHeading() {
    return $this->escapeHTMLText($this->InformationHeading);
  }

  private static function escapeHTMLText($str) {
    $tagEndIndex = strpos($str, '>') + 1;
    $formatted = str_replace("&nbsp;", "</br>", substr($str, $tagEndIndex, -$tagEndIndex - 1));
    return $formatted;
  }

  /**
   * CMS Fields
   * @return FieldList
   */
  public function getCMSFields()
  {
    $fields = parent::getCMSFields();

    $fields->removeByName(['Content']);

    $imageMobile = UploadField::create('ImageMobile', 'Afbeelding op kleinere schermen');
    $imageMobile->getValidator()->setAllowedExtensions(array('png', 'jpg', 'jpeg', 'gif'));
    $imageDesktop = UploadFIeld::create('ImageDesktop', 'Afbeelding op grotere schermen');
    $imageDesktop->getValidator()->setAllowedExtensions(array('png', 'jpg', 'jpeg', 'gif'));
    $title = HtmlEditorField::create('HeaderTitle', 'Grote tekst voor de banner');

    $fields->addFieldsToTab(
      'Root.Header',
      [
        $title,
        TextField::create('SubTitle', 'Subtitel voor de banner'),
        TextField::create('ButtonText', 'Tekst voor de knop'),
        TreeDropdownField::create('ButtonLinkID', 'Link naar pagina voor knop', SiteTree::class),
        $imageMobile,
        $imageDesktop,
        TextField::create('VideoLink', 'Link naar Youtube Video')
      ]
    );

    $sortableGridConfig = GridFieldConfig_RelationEditor::create(10);
    $sortableGridConfig->addComponent(new GridFieldSortableRows('SortOrder'));

    $fields->addFieldsToTab(
      'Root.Stappen',
      [
        HtmlEditorField::create('CardsHeading', 'Titel van kaarten sectie'),
        GridField::create('ChallengeCards', 'Challenge Kaarten', $this->ChallengeCards(), $sortableGridConfig),
        TextField::create('CardsButtonText', 'Tekst voor knop'),
        TreeDropdownField::create('CardsButtonLinkID', 'Link voor knop', SiteTree::class),
        TextField::create('CardsSubLinkText', 'Tekst voor link onder de knop'),
        TreeDropdownField::create('CardsSubLinkID', 'Link voor tekst onder de knop', SiteTree::class)
      ]
    );

    $sortableGridConfig = GridFieldConfig_RecordEditor::create(10);
    $sortableGridConfig->addComponent(new GridFieldSortableRows('SortOrder'));

    $fields->addFieldsToTab(
      'Root.Challenges',
      [
        HtmlEditorField::create('ChallengesHeading', 'Titel van challenges sectie'),
        TextField::create('ChallengesSubHeading', 'Subtitel van challenges sectie')
      ]
    );

    $fields->addFieldsToTab(
      'Root.Voordelen',
      [
        TextField::create('BenefitsHeading', 'Titel'),
        UploadField::create('BenefitsBackgroundImage', 'Achtergrondafbeelding'),
        GridField::create('Benefits', 'Voordelen', $this->Benefits(), $sortableGridConfig)
      ]
    );

    $fields->addFieldsToTab(
      'Root.Informatie',
      [
        HtmlEditorField::create('InformationHeading', 'Titel'),
        HtmlEditorField::create('Content', 'Inhoud'),
        TextField::create('InformationButtonText', 'Tekst voor de knop'),
        TreeDropdownField::create('InformationButtonLinkID', 'Link voor de knop', SiteTree::class)
      ]
    );

    return $fields;
  }
}
