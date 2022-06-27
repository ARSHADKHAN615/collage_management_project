<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use App\Models\User;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use pxlrbt\FilamentExcel\Columns\Column;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

class StudentList extends Component implements HasTable
{
    use InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return Student::query();
    }

    protected function getTableColumns(): array
    {
        return [
            ImageColumn::make('student_image')->rounded()->extraImgAttributes(['title' => 'student_name']),
            TextColumn::make('student_name')->sortable(),
            TextColumn::make('student_email'),
            TextColumn::make('course.course_name'),
            TextColumn::make('roll_no'),
            // TextColumn::make('paid_fees')->money('inr', true)->sortable(),
            TextColumn::make('student_dob')->dateTime('d-m-Y')->sortable()->toggleable(),
            TextColumn::make('unpaid fees')->getStateUsing(fn ($record): string => ($record->course->course_fees - $record->paid_fees))->money('inr', true),
            BooleanColumn::make('status')
                ->trueColor('success')
                ->falseColor('danger'),

        ];
    }

    protected function getTableBulkActions(): array
    {
        return [
            BulkAction::make('delete')
                ->action(fn (Collection $records) => $records->each->delete())
                ->deselectRecordsAfterCompletion()
                ->color('danger')
                ->icon('heroicon-o-trash')
                ->requiresConfirmation(),

                ExportBulkAction::make()->exports([
                    ExcelExport::make()->withColumns([
                        Column::make('student_name')->heading('Student Name'),
                        Column::make('student_email')->heading('Student Email'),
                        Column::make('course.course_name')->heading('Course'),
                        Column::make('unpaid fees')
                        ->format(NumberFormat::FORMAT_CURRENCY_INR_SIMPLE)
                        ->formatStateUsing(fn ($record): string => ($record->course->course_fees - $record->paid_fees)),
                        Column::make('student_image')
                        ->formatStateUsing(fn ($state) => public_path('storage/').$state ),
                        Column::make('paid_status')
                            ->formatStateUsing(fn ($state) => $state == 0 ? "Unpaid" : "Paid"),
                        Column::make('status')
                            ->formatStateUsing(fn ($state) => $state == 0 ? "Deactivate" : "Active"),
                    ])
                    ->askForFilename()
                    ->askForWriterType(),
                ])->icon('heroicon-o-document-report')
        ];
    }
    protected function getTableActions(): array
    {
        return [
            Action::make('edit')
                ->label('Edit')
                ->url(fn (Student $record): string => route('student.edit', $record))
                ->openUrlInNewTab()
                ->icon('heroicon-s-pencil')->visible(User::find(Auth::user()->id)->hasAnyRole('admin','student'))->tooltip('Edit Student'),
                Action::make('Report')
                ->label('Report')
                ->url(fn (Student $record): string => route('student.report', $record))
                // ->openUrlInNewTab()
                ->icon('heroicon-s-document-report')->visible(User::find(Auth::user()->id)->hasAnyRole('admin','student'))->color('success')->tooltip(fn (Model $record): string => "{$record->student_name} Report"),
        ];
    }
    protected function getTableFilters(): array
    {
        return [
            MultiSelectFilter::make('course')->relationship('course', 'course_name'),
            TernaryFilter::make('paid_status')->placeholder('All')->trueLabel('Paid')->falseLabel('Unpaid'),
        ];
    }
    public function isTableSearchable(): bool
    {
        return true;
    }
    protected function applySearchToTableQuery(Builder $query): Builder
    {
        if (filled($searchQuery = $this->getTableSearchQuery())) {
            $query->whereIn('id', Student::search($searchQuery)->keys());
        }

        return $query;
    }
    public function render(): View
    {
        return view('livewire.student.student-list');
    }
}
