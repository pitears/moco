<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Set;
use Filament\Schemas\Components\Utilities\Set as UtilitiesSet;
use Illuminate\Support\Str;

class NewsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('author_id')
                    ->relationship('author', 'name')
                    ->searchable()
                    ->preload()
                    ->noOptionsMessage('No authors available.')
                    ->required(),
                Select::make('news_category_id')
                    ->relationship('newsCategory', 'title')
                    ->searchable()
                    ->preload()
                    ->noOptionsMessage('No news category available.')
                    ->required(),
                TextInput::make('title')
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (UtilitiesSet $set, ?string $state) => $set('slug', Str::slug($state)))
                    ->required(),
                TextInput::make('slug')
                    ->readOnly(),
                FileUpload::make('thumbnail')
                    ->disk('public')
                    ->directory('thumbnails')
                    ->visibility('public')
                    ->image()
                    ->imageEditor()
                    ->columnSpanFull()
                    ->required(),
                RichEditor::make('content')
                    ->toolbarButtons([
                        ['bold', 'italic', 'underline', 'strike', 'link'],
                        ['h2', 'h3', 'alignStart', 'alignCenter', 'alignEnd'],
                        ['blockquote', 'bulletList', 'orderedList'],
                        ['table'], 
                        ['undo', 'redo'],
                    ])
                    ->required()
                    ->columnSpanFull(),
                Toggle::make('is_featured')
                    ->label('Featured')
                    ->columnSpanFull(),
            ]);
    }
}
