# Laravel Settings Package

A Laravel package for managing application settings with a configurable database table.

## Installation

Install the package via Composer:

```bash
composer require alagaccia/laravel-settings
```

The service provider will be automatically registered.

## Configuration

Publish the configuration file:

```bash
php artisan vendor:publish --tag=laravel-settings-config
```

This will create a `config/laravel-settings.php` file where you can customize the table name:

```php
return [
    'table_name' => env('SETTINGS_TABLE_NAME', 'settings'),
];
```

## Migration

Publish the migration file:

```bash
php artisan vendor:publish --tag=laravel-settings-migrations
```

Then run the migration:

```bash
php artisan migrate
```

This will create a table (default name: `settings`) with the following structure:

- `id` - Auto-increment bigint primary key
- `category` - String(255) with index
- `label` - String(255)
- `code` - String(255) with unique index
- `value` - Long text
- `created_at` - Timestamp
- `updated_at` - Timestamp

## Usage

### Using the Model

```php
use Alagaccia\LaravelSettings\Models\Setting;

// Create a setting
Setting::create([
    'category' => 'general',
    'label' => 'Site Name',
    'code' => 'site_name',
    'value' => 'My Awesome Site'
]);

// Get a setting by code
$siteName = Setting::getByCode('site_name');

// Get a setting with a default value
$theme = Setting::getByCode('theme', 'default');

// Set or update a setting
Setting::setByCode('site_name', 'New Site Name', 'general', 'Site Name');

// Get all settings in a category
$generalSettings = Setting::getByCategory('general');
```

### Using Helper Functions

The package provides convenient global helper functions:

```php
// Get a setting value
$siteName = getSetting('site_name');

// Get with default value
$theme = getSetting('theme', 'light');

// Set a setting
setSetting('site_name', 'New Site Name', 'general', 'Site Name');
```

### Customizing the Table Name

You can customize the table name in the config file or via environment variable:

```env
SETTINGS_TABLE_NAME=app_settings
```

## License

MIT
