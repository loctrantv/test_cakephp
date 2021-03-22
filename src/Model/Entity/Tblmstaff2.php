<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tblmstaff2 Entity
 *
 * @property string $StaffID
 * @property string $Email
 * @property int $Gender
 * @property string $Hometown
 * @property int $MarialStatus
 * @property string $KeyCard
 * @property \Cake\I18n\FrozenTime $DateUpdated
 */
class Tblmstaff2 extends Entity
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
        'Email' => true,
        'Gender' => true,
        'Hometown' => true,
        'MarialStatus' => true,
        'KeyCard' => true,
        'DateUpdated' => true,
    ];
}
