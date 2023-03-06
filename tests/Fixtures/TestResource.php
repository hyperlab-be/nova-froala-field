<?php

namespace MichielKempen\NovaFroalaField\Tests\Fixtures;

use MichielKempen\NovaFroalaField\Froala;
use MichielKempen\NovaFroalaField\Tests\TestCase;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Resource;

class TestResource extends Resource
{
    public static $model = Article::class;

    public static function uriKey()
    {
        return 'articles';
    }

    public function fields(Request $request)
    {
        return [
            Text::make('Title'),
            Froala::make('Content')->withFiles(TestCase::DISK, TestCase::PATH),
        ];
    }
}
