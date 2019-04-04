<?php
return [
    'adminEmail' => 'admin@example.com',
    'amazonS3' => require(__DIR__ . '/amazon-s3.php'),
    'gitRevision' => @file_exists(__DIR__ . '/git-revision.php') ? require(__DIR__ . '/git-revision.php') : null,
    'googleAdsense' => require(__DIR__ . '/google-adsense.php'),
    'googleAnalytics' => require(__DIR__ . '/google-analytics.php'),
    'googleRecaptcha' => require(__DIR__ . '/google-recaptcha.php'),
    'lepton' => require(__DIR__ . '/lepton.php'),
    'minimumPHP' => '7.3.0',
    'twitter' => require(__DIR__ . '/twitter.php'),
    'useImgStatInk' => strpos($_SERVER['HTTP_HOST'] ?? '', 'stat.ink') !== false,
];
