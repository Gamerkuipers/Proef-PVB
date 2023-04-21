<?php

namespace App\Enums;

enum AssignmentStatusses: string
{
    case OPEN = 'Open';
    case PROCESSING = 'Processing';
    case ASSIGNED = 'Assigned';
    case CLOSED = 'Closed';
    case DENIED = 'Denied';
}
