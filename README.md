# Laravel Slack Inviter

This is a small Laravel application that allows you to invite users into your Slack team.
It also generates a badge to show the online / total number of members in your Slack team.

Want to see it in action? See [BotMan Slack Team](https://slack.botman.io).

![](https://raw.github.com/mpociot/laravel-slack-inviter/master/screenshots/index.png)

## Getting started

To use this application, clone the repository and copy the `.env.example` as `.env` in your filesystem.

## Settings

You can configure the inviter settings in the `config/slack.php` file or using your environment variables.

Available variables:


`SLACK_COMMUNITY_NAME` - The name of the community/team to display on join page

`SLACK_TEAM_URL` - Your Slack team url (ex.: botman-io.slack.com)

`SLACK_TOKEN` - Your Slack access token

`SLACK_BADGE_ENABLED` - Toggle badge creation

`SLACK_BADGE_TITLE` - The badge title to use. Default: "slack"

`SLACK_BADGE_COLOR` - The color to use for the badge background

## Issue token

1. Visit https://api.slack.com/apps and Create New App.
   
2. Click "Permissions".
   
3. In "OAuth & Permissions" page, select admin scope under "Permission Scopes" menu and save changes.
   
4. Click "Install App to Team".
   
5. Visit `https://slack.com/oauth/authorize?&client_id=CLIENT_ID&team=TEAM_ID&install_redirect=install-on-team&scope=admin+client` in your browser and authorize it.
   
    Your `CLIENT_ID` can be found in the "Basic Information" menu of your app page that you just installed.

    Your `TEAM_ID` can be found at https://api.slack.com/methods/team.info/test

## Badge

![](https://raw.github.com/mpociot/laravel-slack-inviter/master/screenshots/badge.png)


You can use the included badge to show the number of online/total users in your Slack team.

```html
<img src="https://your.domain/badge.svg">
```