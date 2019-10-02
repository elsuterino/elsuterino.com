<?php

return [
    'discordWebhook' => 'https://discordapp.com/api/webhooks/625258848529416222/r_8aIFSc5ufy6EZ4uzbSZUAfxccywm6EtK71MmHEmbYPrzed9ef3jtx3JyajOuNhSYP3',

    'providers' => [
        'indeed' => [
            // discord styling
            'color' => 548855, // blue
            'name' => 'Indeed.com',
            'displayUrl' => 'https://indeed.com',
            'iconUrl' => 'https://d2q79iu7y748jz.cloudfront.net/s/_squarelogo/a5d3ceab8ffc0d5e24297320fb0c79bd',
            // query url
            'url' => 'https://www.indeed.com/q-php-$40,000-l-Remote-jobs.html',
        ],
        'glassdoor' => [
            // discord settings
            'color' => 111954, // green
            'name' => 'glassdoor.com',
            'displayUrl' => 'https://glassdoor.com',
            'iconUrl' => 'https://www.glassdoor.com/app/static/img/partners/fb/logo-1200x630.png',
            // query
            'url' => 'https://www.glassdoor.com/Job/jobs.htm',
            'params' => [
                'sc.keyword' => 'php',
                'locT' => 'S',
                'locId' => '11047',
                'locKeyword' => 'Remote',
                'jobType' => 'all',
                'fromAge' => '1',//'-1',
                'minSalary' => '50000',
                'includeNoSalaryJobs' => 'true',
                'radius' => '25',
                'cityId' => '-1',
                'minRating' => '3.00',
                'industryId' => '-1',
                'sgocId' => '-1',
                'seniorityType' => 'all',
                'companyId' => '-1',
                'employerSizes' => '0',
                'applicationType' => '0',
                'remoteWorkType' => '0',
            ],
        ],
        'larajobs' => [
            // discord settings
            'color' => 14969959, // red
            'name' => 'larajobs.com',
            'displayUrl' => 'https://larajobs.com',
            'iconUrl' => 'https://pbs.twimg.com/profile_images/487208724184842240/axUo4amk_400x400.png',
            // query
            'url' => 'https://larajobs.com/?remote=1',
        ],
        'remotive' => [
            // discord settings
            'color' => 16777215,//white
            'name' => 'remotive.io',
            'displayUrl' => 'https://remotive.io',
            'iconUrl' => 'https://pbs.twimg.com/profile_images/1151480302721744896/LzBas_bj_400x400.png',
            // query
            'url' => 'https://remotive.io/remote-jobs/software-dev?search=php',
        ],
        'weworkremotely' => [
            // discord settings
            'color' => null,
            'name' => 'WeWorkRemotely',
            'displayUrl' => 'https://WeWorkRemotely.com',
            'iconUrl' => 'https://cdn.slant.co/4ec940ea-e851-4e3d-a06d-613d6b59e4a9/-/format/jpeg/-/progressive/yes/-/preview/480x480/',
            // query
            'url' => 'https://weworkremotely.com/categories/remote-programming-jobs'
        ],
        'bestremotejob' => [
            'color' => null,
            'name' => 'BestRemoteJob',
            'displayUrl' => 'https://bestremotejob.com',
            'iconUrl' => null,
            // query
            'url' => 'https://api.doask.net/search/query/jobs/?is_active=true&search=remote&search=php&limit=1000'
        ]
    ],
];
