<?php

declare(strict_types=1);

namespace Modules\Rating\Models;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> d06edcd (.)
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Rating\Database\Factories\RatingFactory;
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Modules\Rating\Enums\RuleEnum;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\SchemalessAttributes\Casts\SchemalessAttributes;

/**
 * Modules\Rating\Models\Rating.
 *
 * @property \Spatie\SchemalessAttributes\SchemalessAttributes $extra_attributes
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> d06edcd (.)
 * @property RuleEnum $rule
 *
 * @method static Builder|Rating newModelQuery()
 * @method static Builder|Rating newQuery()
 * @method static Builder|Rating query()
 * @method static Builder|Rating withExtraAttributes()
 *
 * @property int $id
 * @property int $user_id
 * @property float $value
 * @property string|null $related_type
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $deleted_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $post_id
 * @property string|null $title
 * @property string|null $color
 * @property string|null $icon
 * @property string|null $txt
 * @property bool|null $is_disabled
 * @property bool|null $is_readonly
 * @property int|null $order_column
 * @property Model|Eloquent $linkedTo
 *
 * @method static Builder|Rating whereColor($value)
 * @method static Builder|Rating whereCreatedAt($value)
 * @method static Builder|Rating whereCreatedBy($value)
 * @method static Builder|Rating whereDeletedBy($value)
 * @method static Builder|Rating whereIcon($value)
 * @method static Builder|Rating whereId($value)
 * @method static Builder|Rating whereIsDisabled($value)
 * @method static Builder|Rating whereIsReadonly($value)
 * @method static Builder|Rating whereOrderColumn($value)
 * @method static Builder|Rating wherePostId($value)
 * @method static Builder|Rating whereRelatedType($value)
 * @method static Builder|Rating whereRule($value)
 * @method static Builder|Rating whereTitle($value)
 * @method static Builder|Rating whereTxt($value)
 * @method static Builder|Rating whereUpdatedAt($value)
 * @method static Builder|Rating whereUpdatedBy($value)
 *
 * @property MediaCollection<int, \Modules\Media\Models\Media> $media
 * @property int|null $media_count
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 *
 * @mixin Eloquent
 *
 * @method static RatingFactory factory($count = null, $state = [])
 *
<<<<<<< HEAD
=======
=======
 * @property RuleEnum                                          $rule
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Rating newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating withExtraAttributes()
 *
 * @property int                                           $id
 * @property int                                           $user_id
 * @property float                                         $value
 * @property string|null                                   $related_type
 * @property string|null                                   $created_by
 * @property string|null                                   $updated_by
 * @property string|null                                   $deleted_by
 * @property \Illuminate\Support\Carbon|null               $created_at
 * @property \Illuminate\Support\Carbon|null               $updated_at
 * @property int|null                                      $post_id
 * @property string|null                                   $title
 * @property string|null                                   $color
 * @property string|null                                   $icon
 * @property string|null                                   $txt
 * @property bool|null                                     $is_disabled
 * @property bool|null                                     $is_readonly
 * @property int|null                                      $order_column
 * @property \Illuminate\Database\Eloquent\Model|\Eloquent $linkedTo
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereIsDisabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereIsReadonly($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereRelatedType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereRule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereTxt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereUpdatedBy($value)
 *
 * @property \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Modules\Media\Models\Media> $media
 * @property int|null                                                                                                   $media_count
 * @property \Modules\Xot\Contracts\ProfileContract|null                                                                $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null                                                                $updater
 *
 * @mixin \Eloquent
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
 * @mixin Eloquent
 */
class Rating extends BaseModel implements HasMedia
{
    use InteractsWithMedia;

    public $casts = [
        'extra_attributes' => SchemalessAttributes::class,
        'rule' => RuleEnum::class,
        'is_disabled' => 'boolean',
        'is_readonly' => 'boolean',
    ];

    protected $fillable = [
        'id',
        'extra_attributes',
        'title',
        'color',
        'txt',
        'rule',
        'is_disabled',
        'is_readonly',
        'order_column',
    ];

    public function scopeWithExtraAttributes(): Builder
    {
        return $this->extra_attributes->modelScope();
    }

    public function linkedTo(): MorphTo
    {
        return $this->morphTo('model');
    }

    /**
     * Register the conversions that should be performed.
<<<<<<< HEAD
     */
    public function registerMediaConversions(?Media $media = null): void
=======
<<<<<<< HEAD
     */
    public function registerMediaConversions(?Media $media = null): void
=======
     *
     */
    public function registerMediaConversions(?\Spatie\MediaLibrary\MediaCollections\Models\Media $media = null): void
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
    {
        /*
        $this
            ->addMediaConversion('my-conversion')
            ->greyscale()
            ->quality(80)
            ->withResponsiveImages();
        */
        $this->addMediaConversion('300x300')
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> d06edcd (.)
            ->width(300)
            ->height(300);
        $this->addMediaConversion('150x150')
            ->width(151)
            ->height(151);
        $this->addMediaConversion('50x50')
            ->width(150)
            ->height(150);
<<<<<<< HEAD
=======
=======
              ->width(300)
              ->height(300);
        $this->addMediaConversion('150x150')
              ->width(151)
              ->height(151);
        $this->addMediaConversion('50x50')
              ->width(150)
              ->height(150);
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
    }
}
