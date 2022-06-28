<?php

namespace App\Http\Livewire\Notification;

use App\Models\Course;
use App\Models\Student;
use App\Notifications\ViaMail;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Notification;
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
                ->getSearchResultsUsing(fn (string $search) => Course::where('course_name', 'like', "%{$search}%")->limit(50)->pluck('course_name', 'id'))
                ->getOptionLabelsUsing(fn (array $values) => Course::find($values)->pluck('course_name', 'id')),
            TextInput::make('title'),
            MarkdownEditor::make('content'),
            FileUpload::make('attachment')->multiple()
            ->minFiles(1)
            ->maxFiles(2)
            ->maxSize(1024)
            ->enableDownload()
            ->acceptedFileTypes(['application/pdf']),
        ];
    }



    public function send(): void
    {
        $FormData = $this->form->getState();
        $courses = Course::find($FormData['to']);
        $to = Student::whereBelongsTo($courses)->get();
        Notification::send($to, new ViaMail($FormData));

        // $this->form->fill();
        $this->dispatchBrowserEvent('toast', [
            'type' => 'success',
            'icon' => 'bx-check-circle',
            'message' => "Send Successfully!"
        ]);
    }
    public function render(): View
    {
        return view('livewire.notification.send-via-mail');
    }
}
