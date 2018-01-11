<?php

namespace App\Http\Controllers;

use App\Services\Slack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SlackController extends Controller
{
    /** @var Slack */
    private $slack;

    public function __construct(Slack $slack)
    {
        $this->slack = $slack;
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index()
    {
        return view('index', [
            'logo' => $this->slack->getTeamLogo(),
            'members' => $this->slack->getMemberCount(),
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function invite(Request $request)
    {
        $this->validate($request, [
            'email' => 'required'
        ]);

        return view('result', [
            'email' => $request->get('email'),
            'logo' => $this->slack->getTeamLogo(),
            'response' => $this->slack->invite($request->get('email'))
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function badge()
    {
        abort_unless(config('slack.badge.enabled'), 404);

        $members = Cache::remember('members', 10, function () {
            return $this->slack->getMemberCount();
        });

        $title = config('slack.badge.title');

        $left = (strlen($title) * 6) + 16;
        $value = $members['online'].'/'.$members['total'];
        $width = $left + (strlen($value) * 6) + 10;


        return view('badge', [
            'title' => $title,
            'color' => config('slack.badge.color'),
            'value' => $value,
            'width' => $width,
            'left' => $left
        ]);
    }
}
