# Core Functionality

## Filament v4 Integration

Il modulo Rating è stato aggiornato per essere completamente compatibile con Filament v4. Le principali differenze rispetto a Filament v3:

### Schema Architecture (v4)
```php
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;

// V4: Nuovo approccio con Schema objects
public function form(Schema $schema): Schema
{
    return $schema
        ->components([
            TextInput::make('title'),
            // ...
        ])
        ->statePath('data');
}
```

### VS. Filament v3 (deprecato)
```php
// V3: Array semplici (NON usare più)
protected function getFormSchema(): array
{
    return [
        TextInput::make('title'),
        // ...
    ];
}
```

### Livewire Component Structure (v4)
```php
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;

class RatingPage extends Component implements HasSchemas
{
    use InteractsWithSchemas;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([...])
            ->statePath('data');
    }
}
```

## Rating System Core Features

### HasRating Trait
Il trait `HasRating` fornisce le funzionalità base per qualsiasi modello che può ricevere ratings:

```php
use Modules\Rating\Models\Traits\HasRating;

class Article extends Model
{
    use HasRating;

    // Automaticamente disponibili:
    // - ratings() relationship
    // - averageRating() method
    // - totalRatings() method
}
```

#### PHPStan Compatibility
Il trait è stato ottimizzato per PHPStan livello 10:

```php
/**
 * Relazione morphToMany con il modello Rating
 *
 * @return MorphToMany<Rating, \Illuminate\Database\Eloquent\Model, RatingMorph, 'pivot'>
 */
public function ratings(): MorphToMany
{
    // ... implementazione ...
    
    /** @var MorphToMany<Rating, \Illuminate\Database\Eloquent\Model, RatingMorph, 'pivot'> $relation */
    $relation = $this->morphToMany(Rating::class, 'model', $pivot_table_full)
        ->using($pivot_class)
        ->withPivot($pivot_fields)
        ->withTimestamps();

    return $relation;
}
```

**Note tecniche:**
- Uso di `\Illuminate\Database\Eloquent\Model` invece di `$this` per evitare problemi di covarianza nei template generici
- Tipizzazione esplicita della variabile `$relation` per garantire type safety
- Compatibilità con PHPStan livello 10 senza soppressioni

### Rating Model Structure
Il modello Rating utilizza il nuovo pattern `casts()` di Laravel 12:

```php
public function casts(): array
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

### Filament v4 Resources
I Resources Filament v4 utilizzano la nuova struttura schema:

```php
use Filament\Resources\Resource;
use Filament\Schemas\Schema;

class RatingResource extends Resource
{
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                // Altri componenti...
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                // Altre colonne...
            ]);
    }
}
```
