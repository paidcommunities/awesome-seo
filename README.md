# Awesome SEO Example Plugin

[![WordPress Compatible](https://img.shields.io/badge/WordPress-6.0%2B-blue.svg)](https://wordpress.org)
[![License](https://img.shields.io/badge/license-GPL--2.0%2B-red.svg)](https://www.gnu.org/licenses/gpl-2.0.html)

This is a template WordPress plugin that demonstrates how to integrate the paidcommunities/wordpress-sdk into your own plugins. It provides a working example of SDK integration, license checking, and license activation field implementation. While named "Awesome SEO", this is purely a demonstration plugin and does not provide actual SEO functionality.

## What This Plugin Demonstrates

- Complete integration example of paidcommunities/wordpress-sdk
- Implementation of license checking functionality
- Proper rendering of license activation fields
- WordPress plugin architecture best practices
- Basic plugin structure and organization

## Requirements

- WordPress 6.0 or later
- PHP 7.4 or later
- paidcommunities/wordpress-sdk

## Getting Started

### 1. Install the SDK

First, add the SDK to your project:

```bash
composer require paidcommunities/wordpress-sdk
```

### 2. SDK Integration Example

The plugin shows how to initialize the SDK with proper license checking:

```php
// Example initialization code
require __DIR__ . '/vendor/autoload.php';

// second argument is the product ID
$config = new \PaidCommunities\WordPress\PluginConfig(
   __FILE__,
   'prd_80y2N3N2L11O2ee1'
);
```

## Plugin Structure

After activation, you'll find examples of:

1. SDK initialization and configuration
2. License validation implementation
3. Admin interface for license activation
4. Example hooks and filters for license management

## Development

To use this template for your own plugin:

1. Fork or clone this repository
2. Replace the plugin name and identifiers
3. Implement your actual plugin functionality
4. Use the provided SDK integration as a reference

## Documentation

For SDK implementation details, see the [SDK Documentation](https://paidcommunities.com/documentation/sdks/wordpress-sdk).

## Support

For SDK-related questions, send an email to support@paidcommunities.com.

For issues with this example plugin, use [GitHub Issues](https://github.com/paidcommunities/awesome-seo/issues).

## License

This project is licensed under the GPL v2 or later - see the [LICENSE](LICENSE) file for details.

## Credits

- Built with [paidcommunities/wordpress-sdk](https://github.com/paidcommunities/wordpress-sdk)
- Demonstrates WordPress plugin development best practices