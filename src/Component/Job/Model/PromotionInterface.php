<?php

namespace KejawenLab\Application\SemarHris\Component\Job\Model;

use KejawenLab\Application\SemarHris\Component\Job\MutationType;

/**
 * @author Muhamad Surya Iksanudin <surya.iksanudin@personahris.com>
 */
interface PromotionInterface extends MutationInterface
{
    /**
     * @return string
     *
     * @see MutationType
     */
    public function getType(): string;

    /**
     * @return null|JobTitleInterface
     */
    public function getCurrentJobTitle(): ? JobTitleInterface;

    /**
     * @param JobTitleInterface $jobTitle
     */
    public function setCurrentJobTitle(JobTitleInterface $jobTitle = null): void;

    /**
     * @return null|JobTitleInterface
     */
    public function getNewJobTitle(): ? JobTitleInterface;

    /**
     * @param JobTitleInterface $jobTitle
     */
    public function setNewJobTitle(JobTitleInterface $jobTitle = null): void;
}