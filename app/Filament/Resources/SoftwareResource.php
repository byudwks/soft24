<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SoftwareResource\Pages;
use App\Filament\Resources\SoftwareResource\RelationManagers;
use App\Models\Software;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Spatie\MediaLibrary\InteractsWithMedia;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Illuminate\Support\Str;
use Filament\Forms\Get;
use App\Models\Os;
 

class SoftwareResource extends Resource
{
    protected static ?string $model = Software::class;

    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';

    public static function form(Form $form): Form
    {
        return $form
        
            ->schema([

              Section::make()
                    ->schema([

                        TextInput::make('name')
                            ->label('Nama Software')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Get $get, set $set, ?string $operation, ?string $old,  ?string $state, ?Software $record) {

                                if($operation == 'edit' && $record->isPublished()) {
                                    return;
                                }

                                if(($get('slug') ?? '' ) !== Str::slug($old)) {
                                    return;
                                }
                                $set('slug', Str::slug($state));
                            }),

                        TextInput::make('slug')
                            ->required()
                            ->live()
                            ->label('Slug')
                            ->unique(Software::class, 'slug', fn ($record) => $record)
                            ->disabled (fn (?string $operation, ?Software $record) => $operation == 'edit' && $record->isPublished())
                            ->readOnly(),

                           RichEditor::make('description')
                            ->toolbarButtons([
                                    'bold',
                                    'bulletList',
                                    'h2',
                                    'h3',
                                    'italic',
                                    'link',
                                    'redo',
                                    'underline',
                                    'undo'])
                            ->required()
                            ->label('Deskripsi'),

                        RichEditor::make('how_install')
                        ->toolbarButtons([
                                'bold',
                                'bulletList',
                                'h2',
                                'h3',
                                'italic',
                                'link',
                                'redo',
                                'underline',
                                'undo'])
                        ->required()
                        ->label('Fitur Baru dan Cara Install'),
                        
                        Grid::make(2)
                            ->schema([
                                
                                SpatieMediaLibraryFileUpload::make('icon')
                                    ->label('Icon')
                                    ->collection('icon')
                                    ->image()
                                    ->required(),

                                SpatieMediaLibraryFileUpload::make('image')
                                    ->label('Image')
                                    ->collection('image')
                                    ->image()
                                    ->required()
                            ]),

                        TextInput::make('version')
                            ->label('Versi')
                            ->required(),

                        TextInput::make('size')
                            ->label('Size')
                            ->required(),

                        Select::make('os_id')
                            ->options(function () {
                                return Os::pluck('name', 'id')->toArray();
                            })
                            ->required()
                            ->label('Os'),
        
                        TextInput::make('link_1')
                            ->url(),
        
                        TextInput::make('link_2')
                            ->url(),
        
                        TextInput::make('link_3')
                            ->url(),
                        
                    ])
                    ->columns(1),

            ]);
    }

    public static function saving($data)
    {
        $data['slug'] = \Str::slug($data['name']);
        return $data;
    }


    public static function table(Table $table): Table
    {
        return $table

            ->query(Software::orderBy('created_at', 'desc')) 
            ->columns([

                TextColumn::make('row_number')
                    ->label('No.')
                    ->rowIndex(),

                TextColumn::make('name')
                    ->label('Nama Software'),

                TextColumn::make('version')
                    ->label('Version'),

                TextColumn::make('created_at')
                    ->since()
                    ->label('Publish')
               
            ])
            

            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make()
            ])
            ->bulkActions([
                    Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSoftware::route('/'),
            'create' => Pages\CreateSoftware::route('/create'),
            'edit' => Pages\EditSoftware::route('/{record}/edit'),
        ];
    }
    
}
