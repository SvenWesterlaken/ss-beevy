<?php

namespace App\Objects;

use SilverStripe\Forms\HTMLEditor\HtmlEditorField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataObject;
use App\Pages\ChallengePage;

/**
 * Description
 *
 * @package silverstripe
 * @subpackage mysite
 */
class ChallengeSection extends DataObject
{
  /**
   * Default sort ordering
   * @var array
   */
  private static $default_sort = 'Number';

  /**
   * Database fields
   * @var array
   */
  private static $db = [
    'Title' => 'Varchar',
    'Content' => 'HTMLText',
    'Number' => 'Int'
  ];

  /**
   * Has_one relationship
   * @var array
   */
  private static $has_one = [
    'ChallengePage' => ChallengePage::class,
  ];

  /**
   * Defines summary fields commonly used in table columns
   * as a quick overview of the data for this dataobject
   * @var array
   */
  private static $summary_fields = [
    'Number' => '#',
    'Title' => 'Titel'
  ];

  /**
   * CMS Fields
   * @return FieldList
   */
  public function getCMSFields()
  {
    return FieldList::create(
      TextField::create('Title', 'Titel'),
      HtmlEditorField::create('Content', 'Inhoud')
    );
  }
}
