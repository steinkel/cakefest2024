<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Issue Entity
 *
 * @property int $id
 * @property int $tracker_id
 * @property int $project_id
 * @property string $subject
 * @property string|null $description
 * @property \Cake\I18n\Date|null $due_date
 * @property int|null $category_id
 * @property int $status_id
 * @property int|null $assigned_to_id
 * @property int $priority_id
 * @property int|null $fixed_version_id
 * @property int $author_id
 * @property int $lock_version
 * @property \Cake\I18n\DateTime|null $created_on
 * @property \Cake\I18n\DateTime|null $updated_on
 * @property \Cake\I18n\Date|null $start_date
 * @property int $done_ratio
 * @property float|null $estimated_hours
 * @property int|null $parent_id
 * @property int|null $root_id
 * @property int|null $lft
 * @property int|null $rgt
 * @property bool $is_private
 * @property \Cake\I18n\DateTime|null $closed_on
 *
 * @property \App\Model\Entity\Tracker $tracker
 * @property \App\Model\Entity\Project $project
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\ParentIssue $parent_issue
 * @property \App\Model\Entity\ChildIssue[] $child_issues
 * @property \App\Model\Entity\TimeEntry[] $time_entries
 */
class Issue extends Entity
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
        'tracker_id' => true,
        'project_id' => true,
        'subject' => true,
        'description' => true,
        'due_date' => true,
        'category_id' => true,
        'status_id' => true,
        'assigned_to_id' => true,
        'priority_id' => true,
        'fixed_version_id' => true,
        'author_id' => true,
        'lock_version' => true,
        'created_on' => true,
        'updated_on' => true,
        'start_date' => true,
        'done_ratio' => true,
        'estimated_hours' => true,
        'parent_id' => true,
        'root_id' => true,
        'lft' => true,
        'rgt' => true,
        'is_private' => true,
        'closed_on' => true,
        'tracker' => true,
        'project' => true,
        'status' => true,
        'parent_issue' => true,
        'child_issues' => true,
        'time_entries' => true,
    ];
}
