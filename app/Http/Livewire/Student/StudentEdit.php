<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TextInput\Mask;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class StudentEdit extends Component implements HasForms
{
    use InteractsWithForms;
    public Student $student;

    public function mount(): void
    {
        $this->form->fill([
            'student_name' => $this->student->student_name,
            'student_email' => $this->student->student_email,
            'student_phone' => $this->student->student_phone,
            'status' => $this->student->status,
            'paid_status' => $this->student->paid_status,
            'admission_date' => $this->student->admission_date,
            'paid_fees' => $this->student->paid_fees,
            'student_image' => $this->student->student_image,
        ]);
    }


    protected function getFormSchema(): array
    {
        return [
            Grid::make()
                ->schema([
                    TextInput::make('student_name')->required(),
                    TextInput::make('student_email')->email()->required(),
                    TextInput::make('student_phone')->required(),
                    DatePicker::make('admission_date')->required(),
                    // TextInput::make('paid_fees')->prefixIcon('heroicon-o-currency-rupee')->numeric()->required(),
                    TextInput::make('paid_fees')
                    ->mask(fn (Mask $mask) => $mask
                        ->patternBlocks([
                            'money' => fn (Mask $mask) => $mask
                                ->numeric()
                                ->thousandsSeparator(',')
                                ->decimalSeparator('.'),
                        ])
                        ->pattern('₹money')),
                    Select::make('course')
                        ->relationship('course', 'course_name'),
                    Toggle::make('status')
                        ->onIcon('heroicon-s-check')
                        ->offIcon('heroicon-s-x'),
                    Toggle::make('paid_status')
                        ->onIcon('heroicon-s-check')
                        ->offIcon('heroicon-s-x')
                        ,
                        FileUpload::make('student_image')->disk('public_uploads'),
                ])->columns(2)
        ];
    }
    protected function getFormModel(): Student
    {
        return $this->student;
    }
    public function save(): void
    {
        $this->student->update(
            $this->form->getState(),
        );
        Notification::make() 
        ->title('Saved successfully')
        ->success()
        ->send();
    }

    public function render(): View
    {
        return view('livewire.student.student-edit');
    }
}
