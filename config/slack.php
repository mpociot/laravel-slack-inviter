<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Community Name
    |--------------------------------------------------------------------------
    |
    | The name of your community / team to display on the join page.
    |
    */
    'community' => env('SLACK_COMMUNITY_NAME'),

    /*
    |--------------------------------------------------------------------------
    | Slack Team URL
    |--------------------------------------------------------------------------
    |
    | Your Slack Team URL (ex. botman-io.slack.com).
    |
    */
    'url' => env('SLACK_TEAM_URL'),

    /*
    |--------------------------------------------------------------------------
    | Slack Token
    |--------------------------------------------------------------------------
    |
    | The access token to perform API requests against the Slack API.
    | This token needs to have admin rights, in order to invite
    | users.
    |
    */
    'token' => env('SLACK_TOKEN'),

    /*
    |--------------------------------------------------------------------------
    | Slack Badge
    |--------------------------------------------------------------------------
    |
    | Configure the appearance of the Slack Badge.
    | You can access it at /badge.svg once enabled.
    |
    */
    'badge' => [

        'enabled' => env('SLACK_BADGE_ENABLED', true),

        'title' => env('SLACK_BADGE_TITLE', 'slack'),

        'color' => env('SLACK_BADGE_COLOR', 'E01563'),

    ]
];