<?php

namespace App\Enums;

enum JobType: string
{
    case FullTime = 'FullTime';
    case PartTime = 'PartTime';
    case Contract = 'Contract';
    case Temporary = 'Temporary';
    case Internship = 'Internship';
    case Volunteer = 'Volunteer';
    case OnCall = 'OnCall';
}
