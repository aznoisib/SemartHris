<?php

namespace KejawenLab\Application\SemartHris\Component\Attendance\Rule;

use KejawenLab\Application\SemartHris\Component\Attendance\Model\AttendanceInterface;
use KejawenLab\Application\SemartHris\Component\Employee\Model\EmployeeInterface;

class AttendanceRule implements RuleInterface
{
    const SEMARTHRIS_ATTENDANCE_RULE = 'semarthris.attendance_rule';

    /**
     * @var RuleInterface[]
     */
    private $rules;

    /**
     * @param RuleInterface[] $rules
     */
    public function __construct(array $rules = [])
    {
        $this->rules = $rules;
    }

    /**
     * @param EmployeeInterface  $employee
     * @param \DateTimeInterface $attendanceDate
     *
     * @return AttendanceInterface
     *
     * @throws NotQualifiedException
     */
    public function apply(EmployeeInterface $employee, \DateTimeInterface $attendanceDate): AttendanceInterface
    {
        foreach ($this->rules as $rule) {
            try {
                return $rule->apply($employee, $attendanceDate);
            } catch (NotQualifiedException $exception) {
                continue;
            }
        }

        throw new NotQualifiedException();
    }
}
