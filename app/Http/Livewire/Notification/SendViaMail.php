<?php

namespace App\Http\Livewire\Notification;

use App\helpers\TostMessage;
use App\Jobs\SendNotificationAllUser;
use App\Models\Course;
use App\Models\Student;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class SendViaMail extends Component implements HasForms
{
    use InteractsWithForms;
    public $title = '';
    public $content = '';
    // public $to = '';
    public function mount(): void
    {
        $this->form->fill();
    }
    protected function getFormSchema(): array
    {
        return [
            MultiSelect::make('to')
                ->getSearchResultsUsing(fn (string $search) => Course::where('course_name', 'LIKE', "%{$search}%")->limit(50)->pluck('course_name', 'id')->toArray())
                ->getOptionLabelsUsing(fn (array $values) => Course::find($values)->pluck('course_name', 'id')->toArray()),
            TextInput::make('title'),
            MarkdownEditor::make('content'),
            FileUpload::make('attachment')->multiple()
                ->minFiles(1)
                ->maxFiles(2)
                ->maxSize(1024)
                ->enableDownload()
                ->disk('public_uploads')
                ->acceptedFileTypes(['application/pdf']),
        ];
    }



    public function send(): void
    {
        $FormData = $this->form->getState();
        $courses = Course::find($FormData['to']);
        $to = Student::whereBelongsTo($courses)->get();
        dispatch(new SendNotificationAllUser($to, $FormData));
        $this->dispatchBrowserEvent('toast', TostMessage::success('Notification Request Sent'));
    }
    public function render(): View
    {
        return view('livewire.notification.send-via-mail');
    }
}
