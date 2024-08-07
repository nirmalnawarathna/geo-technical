<?php
// config/select_options.php

return [
    'request_types' => [
        '' => 'Select a option',
        'ST' => 'Soil test',
        'SU' => 'Survey',
        'IN' => 'Inspection',
        'OJ' => 'Other Jobs',
        // Add more options as needed
    ],
    'soil_test' => [
        '' => 'Select a option',
        'PRDT' => 'Pre-Demolished (1st) Test',
        'PODT' => 'Post-Demolished (2nd) Test',
        'FP' => 'Footing Prob',
        // Add more options as needed
    ],
    'surveys' => [
        '' => 'Select a option',
        'FS' => 'Feature Survey',
        'AHD' => 'AHD - FFL indicator level to Plumbing riser',
        'RE' => 'Reastablishment',
        // Add more options as needed
    ],
    'feature_surveys' => [
        '' => 'Select a option',
        'PRFS' => 'Pre Demolition Feature Survey',
        'POFS' => 'Post Demolition Feature Survey',
        // Add more options as needed
    ],
    'ahd_ffl' => [
        '' => 'Select a option',
        'PRFS' => 'Pre Pour Mark',
        'POFS' => 'Post Pour Confirmation',
        // Add more options as needed
    ],
    'other_jobs' => [
        '' => 'Select a option',
        'J1' => 'Job 1',
        'J2' => 'Job 2',
        'J3' => 'Job 3',
        // Add more options as needed
    ],
    'status' => [
       '' => 'All Status',
            'Requested' => 'Requested',
            'Confirmed' => 'Confirmed',
            // 'In-progress' => 'In-progress',
            'Site_work_date' => 'Site_work_date',
            'Report_eta' => 'Report_eta',
            'Completed' => 'Completed',
            'Hold' => 'Hold',
        // Add more options as needed
    ],
    // Add more select fields as needed
];