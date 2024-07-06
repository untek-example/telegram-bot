<?php

use Untek\Utility\Init\Presentation\Cli\Tasks\ChmodTask;
use Untek\Utility\Init\Presentation\Cli\Tasks\CopyFilesTask;
use Untek\Utility\Init\Presentation\Cli\Tasks\MkDirTask;
use Untek\Utility\Init\Presentation\Cli\Tasks\RandomTask;

function makeTasksForProfileDirectory(string $profileDirectory): array
{
    $rootDirectory = realpath(__DIR__ . '/../..');
    return [
        new CopyFilesTask($rootDirectory, $profileDirectory),
        new MkDirTask($rootDirectory, 'var', ChmodTask::WRITABLE),
//        new MkDirTask($rootDirectory, 'public/file-storage', ChmodTask::WRITABLE),
        new ChmodTask($rootDirectory, 'bin', ChmodTask::EXECUTABLE),
//        new RandomTask($rootDirectory, '.env.local', 'APP_SECRET'),
//        new RandomTask($rootDirectory, '.env.test', 'APP_SECRET'),
    ];
}

return [
    [
        'title' => 'Custom developer',
        'tasks' => makeTasksForProfileDirectory(__DIR__ . '/profiles/developer'),
    ],
];
