<?php

namespace App\Nova;

use App\Models\User;
use Ek0519\Quilljs\Quilljs;
use Ganyicz\NovaCallbacks\HasCallbacks;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use YesWeDev\Nova\Translatable\Translatable;

class Post extends Resource
{













    use HasCallbacks;

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Post::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),

            BelongsTo::make('User'),

            Text::make('Url', function () {
                foreach ($this->translations as $translation) {
                    if (!empty($this->translateOrNew($translation->locale)->slug)) {
                        $link = route('posts.show', $this->translateOrNew($translation->locale)->slug);

                        return "<a href='{$link}'>Go to the Post</a>";
                    }
                }

                return 'No Link!';
            })
                ->asHtml()
                ->showOnIndex()
                ->showOnDetail(),

            Translatable::make('Title')
                ->singleLine()
                ->rules('required'),

            Translatable::make('Subtitle')
                ->nullable(),

            Translatable::make('Slug')
                ->singleLine()
                ->nullable(),

            Image::make('Image')
                ->disk('public')
                ->nullable(),

            Quilljs::make('Description')
                ->withFiles('public')
                ->rules('required'),

            Translatable::make(__('Published (1 True/ 0 False)'), 'published')
                ->nullable()
                ->singleLine(),

            Translatable::make(__('Publish to Dev.to (1 True/ 0 False)'), 'publish_to_dev_to')
                ->nullable()
                ->singleLine(),

            DateTime::make('Created At', 'created_at')->rules('required'),
        ];
    }

    public static function afterCreate(NovaRequest $request, Model $model)
    {
        self::createPostOnDevTo($model);
    }

    public static function afterUpdate(Request $request, $model)
    {
        foreach ($model->translations as $translation) {
            if (blank($model->translateOrNew($translation->locale)->dev_to_article_id)) {
                self::createPostOnDevTo($model->translateOrNew($translation->locale));
            }
        }
        self::updatePostOnDevTo($model);
    }

    /**
     * Get the cards available for the request.
     *
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }

    public static function createPostOnDevTo(Model $post)
    {
        // TODO: Login olmuş kullanıcının dev_to_secret bilgisine bakılmalı.
        $secret = User::pluck('dev_to_secret')[0] ?? null;
        if (!blank($secret)) {
            if (blank($post->translations)) {
                $response = Http::withHeaders([
                    'api-key' => $secret,
                    'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.96 Safari/537.36',
                ])->post('https://dev.to/api/articles', [
                    'article' => [
                        'title' => $post->title,
                        'published' => $post->publish_to_dev_to,
                        'body_markdown' => $post->description,
                    ],
                ]);
                $post->dev_to_article_id = $response['id'];
                $post->save();
            } else {
                foreach ($post->translations as $translation) {
                    // Create an article on dev.to

                    $response = Http::withHeaders([
                        'api-key' => $secret,
                        'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.96 Safari/537.36',
                    ])->post('https://dev.to/api/articles', [
                        'article' => [
                            'title' => $post->translateOrNew($translation->locale)->title,
                            'published' => $post->translateOrNew($translation->locale)->publish_to_dev_to,
                            'body_markdown' => $post->translateOrNew($translation->locale)->description,
                        ],
                    ]);
                    $post->translateOrNew($translation->locale)->dev_to_article_id = $response['id'];
                    $post->save();
                }
            }
        }
    }

    public static function updatePostOnDevTo(Model $post)
    {
        // TODO: Login olmuş kullanıcının dev_to_secret bilgisine bakılmalı.
        $secret = User::pluck('dev_to_secret')[0] ?? null;
        if (!blank($secret)) {
            foreach ($post->translations as $translation) {
                // Update an article on dev.to

                Http::withHeaders([
                    'api-key' => $secret,
                    'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.96 Safari/537.36',
                ])->put('https://dev.to/api/articles/'.$post->translateOrNew($translation->locale)->dev_to_article_id, [
                    'article' => [
                        'title' => $post->translateOrNew($translation->locale)->title,
                        'published' => $post->translateOrNew($translation->locale)->publish_to_dev_to,
                        'body_markdown' => $post->translateOrNew($translation->locale)->description,
                    ],
                ]);
            }
        }
    }
}
