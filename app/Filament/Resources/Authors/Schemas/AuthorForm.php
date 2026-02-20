<?php

namespace App\Filament\Resources\Authors\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AuthorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('username')
                    ->required(),
                FileUpload::make('avatar')
                    ->disk('public')
                    ->directory('avatars')
                    ->visibility('public')
                    ->image()
                    ->avatar()
                    ->imageEditor()
                    // ->imageEditorAspectRatioOptions([
                    //     '1:1',
                    //     '4:5',
                    //     ])
                    ->imageAspectRatio('1:1')
                    ->automaticallyOpenImageEditorForAspectRatio()
                    ->columnSpanFull()
                    ->required(),
                Textarea::make('bio')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
