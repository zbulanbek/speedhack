<?php

namespace App\Http\Controllers;

use Lesson, SendEmail;
use App\Events\{ModeNotice};
use App\Services\Directory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\{Application, MethodistStatus, TrialLesson, User, Mode, Notification,Order};
use App\Events\{TopicKey, ShowTopicBlock, MetodistApplication};
use App\Http\Requests\{MetodistCommentRequest};
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;


class MetodistController extends Controller
{

    public function profile(Request $request)
    {
        return inertia('Speedhack/Account/Profile/Profile');

    }

    public function getNotice(Request $request)
    {
        $notifications = Notification::where('key', 'mode')->where('is_read', false)->with(['from'])->get();
        $item = [];
        $item = $request->item;
        $item['notifications'] = $notifications;
        $item['count'] = $notifications->count();
        broadcast(new ModeNotice($item))->toOthers();
        return response()->json(null, 204);
    }

    public function updateMode(Request $request)
    {
        $notifications = Notification::where('key', 'mode')->where('is_read', false)->get();

        foreach ($notifications as $value) {
            $value->is_read = true;
            $value->save();
        }

        return [
            'status' => 'success',
        ];
    }

    public function changeMode(Request $request)
    {

        $message = 'День недели: ' . $request->form['week'] . ', ' .
            'Желаемое время: ' . $request->form['start'] . ' - ' . $request->form['end'] . ', ' .
            'Комментарии: ' . $request->form['comment'];
        Notification::create(array(
            'from_id' => Auth::id(),
            'message' => $message,
            'key' => 'mode',
        ));

        return [
            'status' => 'success',
        ];
    }

    public function timetables()
    {
        $mode = Mode::where('user_id', Auth::id())->first();
        return inertia('Speedhack/Account/Metodist/Timetables', compact('mode'));
    }

    public function applications(): \Inertia\Response
    {
        return inertia('Speedhack/Account/Metodist/Applications');
    }

    public function apies()
    {
        $trialLessons = TrialLesson::where('metodist_id', Auth::id())
            ->with(['student', 'metodist', 'application'])
            ->orderBy('id', 'desc')
            ->get();
        return inertia('Speedhack/Account/Metodist/TrialLessons', compact('trialLessons'));
    }

    public function results()
    {
        if (Gate::check('check-methodist')) {
            $lessons = TrialLesson::where('metodist_id', Auth::id())
                ->with(['student', 'metodist', 'application'])
                ->orderBy('id', 'DESC')
                ->get();

            $orders = Order::where('methodist_id', Auth::id())
                ->with(['user'])
                ->orderBy('id', 'DESC')
                ->get();

            $user = User::find(Auth::id());
            return inertia('Speedhack/Account/Metodist/Results', compact('user', 'lessons', 'orders'));
        } else {
            return inertia('Speedhack/Static/Error');
        }
    }

    public function topic_key(Request $request)
    {
        broadcast(new TopicKey($request->item))->toOthers();
        return response()->json(null, 204);
    }

    public function topic_block(Request $request)
    {
        broadcast(new ShowTopicBlock($request->item))->toOthers();
        return response()->json(null, 204);
    }

    public function comment(MetodistCommentRequest $request)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $name = substr(str_shuffle($chars), 0, 12);
        $name = $name . '.txt';
        $goal = '';
        if ($request->form['goal'] !== []) {
            foreach ($request->form['goal'] as $key => $value) {
                $goal = $goal . ' ' . $value . ',';
            }
        }

        $contents = "Имя: " . $request->form['name'] . ','
            . ' Фамилия: ' . $request->form['surname'] . ','
            . ' Пол: ' . $request->form['gender'] . ','
            . ' Возраст: ' . $request->form['age'] . ','
            . ' Дата рождения : ' . $request->form['birthday'] . ','
            . ' Цели: ' . $goal;

        Storage::disk('metodist_comment')->put($name, $contents);

        $application = Application::find($request->trial_lesson['application_id']);
        $application->comment = '/metodist_comment/' . $name;
        $application->save();

        return $this->successMessage();
    }


}
