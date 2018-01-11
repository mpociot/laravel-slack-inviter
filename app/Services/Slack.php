<?php

namespace App\Services;

use GuzzleHttp\Client;

/**
 * Class Slack
 * @package App\Services
 */
class Slack
{

    /** @var Client */
    private $client;

    /**
     * Slack constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = new Client([
            'base_uri' => 'https://'.config('slack.url').'/api/',
        ]);
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getTeamLogo()
    {
        $teamResponse = $this->client->request('GET', 'team.info', [
            'query' => [
                'token' => config('slack.token')
            ]
        ]);

        $response = json_decode($teamResponse->getBody());
        if (!$response->ok) {
            throw new \Exception('Error communicating with Slack: '. $response->error);
        }

        return $response->team->icon->image_88;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function getMemberCount()
    {
        $memberResponse = $this->client->request('GET', 'users.list', [
            'query' => [
                'presence' => true,
                'token' => config('slack.token')
            ]
        ]);

        $response = json_decode($memberResponse->getBody()->getContents());
        if (!$response->ok) {
            throw new \Exception('Error communicating with Slack: '. $response->error);
        }

        $members = collect($response->members)->filter(function ($member) {
            return $member->is_bot === false && $member->name !== 'slackbot';
        });

        $total = $members->count();
        $online = $members->filter(function ($member) {
            return $member->presence === 'active';
        })->count();

        return [
            "total" => $total,
            "online" => $online
        ];
    }

    /**
     * @param $email
     * @return mixed
     */
    public function invite($email)
    {
        $inviteResponse = $this->client->request('POST', 'users.admin.invite', [
            'form_params' => [
                'token' => config('slack.token'),
                'email' => $email,
                'set_active' => true
            ]
        ]);

        return json_decode($inviteResponse->getBody()->getContents());
    }

}