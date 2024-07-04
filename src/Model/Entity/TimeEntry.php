<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TimeEntry Entity
 *
 * @property int $id
 * @property int $project_id
 * @property int|null $author_id
 * @property int $user_id
 * @property int|null $issue_id
 * @property float $hours
 * @property string|null $comments
 * @property int $activity_id
 * @property \Cake\I18n\Date $spent_on
 * @property int $tyear
 * @property int $tmonth
 * @property int $tweek
 * @property \Cake\I18n\DateTime $created_on
 * @property \Cake\I18n\DateTime $updated_on
 * @property int|null $rate_id
 *
 * @property \App\Model\Entity\Project $project
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Issue $issue
 */
class TimeEntry extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'project_id' => true,
        'author_id' => true,
        'user_id' => true,
        'issue_id' => true,
        'hours' => true,
        'comments' => true,
        'activity_id' => true,
        'spent_on' => true,
        'tyear' => true,
        'tmonth' => true,
        'tweek' => true,
        'created_on' => true,
        'updated_on' => true,
        'rate_id' => true,
        'project' => true,
        'user' => true,
        'issue' => true,
    ];
}
