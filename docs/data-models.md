# Data Models

## Rating Model

The Rating model is the core entity for handling ratings and predictions within the system.

### Model Structure

```php
class Rating extends BaseModel implements HasMedia
{
    // Database connection
    protected $connection = 'default';

    // Fillable attributes
    protected $fillable = [
        'id', 'extra_attributes', 'title', 'color', 'txt', 'rule',
        'is_disabled', 'is_readonly', 'current_price', 'predict_id',
        'outstanding_shares', 'order_column'
    ];
}
```

### Casts Migration - Laravel 12

In Laravel 12, the `$casts` property has been replaced with a `casts()` method for better type safety and performance:

#### Before (Laravel 11 and earlier):
```php
public $casts = [
    'extra_attributes' => SchemalessAttributes::class,
    'rule' => RuleEnum::class,
    'is_disabled' => 'boolean',
    'is_readonly' => 'boolean',
    'current_price' => 'float',
    'outstanding_shares' => 'float',
];
```

#### After (Laravel 12):
```php
protected function casts(): array
{
    return [
        'extra_attributes' => SchemalessAttributes::class,
        'rule' => RuleEnum::class,
        'is_disabled' => 'boolean',
        'is_readonly' => 'boolean',
        'current_price' => 'float',
        'outstanding_shares' => 'float',
    ];
}
```

### Key Changes:
1. **Method vs Property**: Use `protected function casts(): array` instead of `public $casts = []`
2. **Visibility**: The method should be `protected` not `public`
3. **Type Safety**: Returns strongly typed array
4. **Performance**: Methods are called only when needed

### Module-Specific Implementations

When extending the base Rating model in other modules (like Predict), ensure:

1. Child classes use the same `casts()` method approach
2. Additional casts are properly merged or defined
3. Visibility must match the parent class (public in child if public in parent)

### Migration Guidelines

1. Always update the base model first
2. Update all extending models in the same commit
3. Run PHPStan analysis to verify compatibility
4. Test all affected functionality

### Filament v4 Compatibility

With the upgrade to Filament v4, ensure that:

1. **Type Safety**: All methods have explicit return type declarations
2. **Action Labels**: Use `->label(fn() => __('translation.key'))` instead of arrays
3. **Schema Methods**: Verify `form()`, `infolist()`, and schema method signatures
4. **Enum Handling**: Add proper type hints for enum field states
5. **Authorization**: Replace `can*()` methods with `get*AuthorizationResponse()`
