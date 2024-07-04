<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Project Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $homepage
 * @property bool $is_public
 * @property int|null $parent_id
 * @property \Cake\I18n\DateTime|null $created_on
 * @property \Cake\I18n\DateTime|null $updated_on
 * @property string|null $identifier
 * @property int $status
 * @property int|null $lft
 * @property int|null $rgt
 * @property bool $inherit_members
 * @property int|null $default_version_id
 * @property int|null $default_assigned_to_id
 *
 * @property \App\Model\Entity\ParentProject $parent_project
 * @property \App\Model\Entity\IssueCategory[] $issue_categories
 * @property \App\Model\Entity\Issue[] $issues
 * @property \App\Model\Entity\Member[] $members
 * @property \App\Model\Entity\ChildProject[] $child_projects
 * @property \App\Model\Entity\Status[] $statuses
 * @property \App\Model\Entity\TimeEntry[] $time_entries
 * @property \App\Model\Entity\Tracker[] $trackers
 */
class Project extends Entity
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
        'name' => true,
        'description' => true,
        'homepage' => true,
        'is_public' => true,
        'parent_id' => true,
        'created_on' => true,
        'updated_on' => true,
        'identifier' => true,
        'status' => true,
        'lft' => true,
        'rgt' => true,
        'inherit_members' => true,
        'default_version_id' => true,
        'default_assigned_to_id' => true,
        'parent_project' => true,
        'issue_categories' => true,
        'issues' => true,
        'members' => true,
        'child_projects' => true,
        'statuses' => true,
        'time_entries' => true,
        'trackers' => true,
    ];
}
