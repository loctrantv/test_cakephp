<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tblmstaff Entity
 *
 * @property string $StaffID
 * @property string $StaffName
 * @property string $JapaneseName
 * @property \Cake\I18n\FrozenDate $TrialEntryDate
 * @property \Cake\I18n\FrozenDate|null $TrialEndDate
 * @property \Cake\I18n\FrozenDate|null $QuitJobDate
 * @property \Cake\I18n\FrozenTime $DateUpdated
 */
class Tblmstaff extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'StaffName' => true,
        'JapaneseName' => true,
        'TrialEntryDate' => true,
        'TrialEndDate' => true,
        'QuitJobDate' => true,
        'DateUpdated' => true,
    ];
}
