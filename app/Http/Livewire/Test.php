<?php

namespace App\Http\Livewire;

use App\Models\User;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Test extends Component implements HasTable
{
    use InteractsWithTable;
    protected function getTableQuery(): Builder
    {
        return User::query();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name'),
            TextColumn::make('email'),
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
        ];
    }
    protected function getTableActions(): array
    {
        return [
            Action::make('edit')->action(function (Collection $records, array $data): void {
                foreach ($records as $record) {
                    $record->author()->associate($data['name']);
                    // $record->save();
                }
            })->form([
                TextInput::make('name')
                    ->label('Author')
                    ->required(),
            ])
        ];
    }
    public function render()
    {
        return view('livewire.test');
    }
}
