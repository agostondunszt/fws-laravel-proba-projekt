<?php

namespace App\Filament\Pages;

use App\Models\HeroContent;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Forms\Components\{TextInput, Textarea, FileUpload};
use Filament\Actions\Action;
use Filament\Notifications\Notification;

class HeroSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Hero Beállítások';
    protected static ?string $modelLabel = 'Hero Beállítások';
    protected static ?string $pluralModelLabel = 'Hero Beállítások';

    protected static string $view = 'filament.pages.hero-settings';
    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(HeroContent::first()?->toArray() ?? []);
    }
    
    public function getTitle(): string
    {
        return 'Hero beállítások';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Főcím')
                    ->required()
                    ->validationMessages(['required' => 'A főcím megadása kötelező.']),
                Textarea::make('description')
                    ->label('Leírás')
                    ->required()
                    ->rows(4)
                    ->validationMessages(['required' => 'A leírás megadása kötelező.']),
                FileUpload::make('background_image')
                    ->label('Háttérkép')
                    ->image()
                    ->imageEditor()
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('1920:780')
                    ->imageResizeTargetWidth('1920')
                    ->imageResizeTargetHeight('780')
                    ->directory('hero')
                    ->validationMessages([
                        'required' => 'A cím megadása kötelező.',
                    ])
                    ->required(),
            ])
            ->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Mentés')
                ->action('save'),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState();
        
        HeroContent::updateOrCreate(
            ['id' => HeroContent::first()?->id], 
            $data
        );

        Notification::make()
            ->success()
            ->title('Sikeresen mentve!')
            ->send();
    }
}