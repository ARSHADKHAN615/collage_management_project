<?php

namespace App\Http\Livewire\Notification;

use App\helpers\TostMessage;
use App\Models\Course;
use App\Models\Student;
use App\Notifications\ViaWhatsapp;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class SendViaWhatsapp extends Component implements HasForms
{
    use InteractsWithForms;
    public $to = '';
    public $content = '';
    protected function getFormSchema(): array
    {
        return [
            MultiSelect::make('to')
                ->getSearchResultsUsing(fn (string $search) => Course::where('course_name', 'LIKE', "%{$search}%")->limit(50)->pluck('course_name', 'id')->toArray())
                ->getOptionLabelsUsing(fn (array $values) => Course::find($values)->pluck('course_name', 'id')->toArray()),
            MarkdownEditor::make('content'),
        ];
    }


    public function send(): void
    {
        $FormData = $this->form->getState();
        $courses = Course::find($FormData['to']);
        $to = Student::whereBelongsTo($courses)->get();

        try {
            Notification::send($to, new ViaWhatsapp($FormData['content']));
            $this->dispatchBrowserEvent('toast', TostMessage::success('Notification Request Sent'));
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('toast', TostMessage::success('Notification Request Failed'.$th));
        }
        // dispatch(new SendNotificationAllUser($to, $FormData));
    }
    public function render(): View
    {
        return view('livewire.notification.send-via-whatsapp');
    }
}
