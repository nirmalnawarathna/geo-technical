<?php
// config/select_options.php

return [
    'request_types' => [
        '' => 'Select an option',
        // 'ST' => 'Soil test',
        // 'SU' => 'Survey',
        // 'IN' => 'Inspection',
        // 'OJ' => 'Other Jobs',
        'ST' => 'Soil Report',
        'SU' => 'Soil & Survey (combined)',
        'IN' => 'Pre-Site Report (24hr)',
        'OJ' => 'Other Services',
        // Add more options as needed
    ],
    'soil_test' => [
        '' => 'Select an option',
        'PRDT' => '1st Soil Test (Pre-Demo)',
        'PODT' => '2nd Soil Test (Post-Demo)',
        'SAT'  => 'Soil Acidity Test',
        'PCT'  => 'Percolation Test',
        'FP' => 'Footing Prob',
        // Add more options as needed
    ],
    'surveys' => [
        '' => 'Select an option',
        'FS' => 'Feature Survey',
        'AHD' => 'AHD - FFL indicator level to Plumbing riser',
        'RE' => 'Reastablishment',
        // Add more options as needed
    ],
    'feature_surveys' => [
        '' => 'Select an option',
        'PRFS' => 'Pre Demolition Feature Survey',
        'POFS' => 'Post Demolition Feature Survey',
        // Add more options as needed
    ],
    'ahd_ffl' => [
        '' => 'Select an option',
        'PRFS' => 'Pre Pour Mark',
        'POFS' => 'Post Pour Confirmation',
        // Add more options as needed
    ],
    'other_jobs' => [
        '' => 'Select an option',
        'FP' => 'Footing Probe',
        'PI' => 'Pier Inspection',
        'DCP' => 'DCP Test',
        'WR' => 'Wind Rating',
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