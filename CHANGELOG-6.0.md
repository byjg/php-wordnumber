# Changelog - Version 6.0

## Overview

Version 6.0 represents a major modernization of the WordNumber library, bringing PHP 8.4 support, improved type safety, enhanced documentation, and stricter code quality standards.

## New Features

### PHP 8.4 Support
- Full compatibility with PHP 8.4
- Added `#[\Override]` attributes to all overridden methods for better type safety and IDE support
- Improved type casting for better static analysis compliance

### Enhanced Documentation
- Created comprehensive documentation structure:
  - [Getting Started Guide](docs/getting-started.md) - Introduction and basic usage
  - [Usage Examples](docs/usage.md) - Detailed usage patterns and examples
  - [Creating Custom Languages](docs/creating-languages.md) - Guide for extending the library with new languages
- Updated README.md with improved structure and organization
- Better feature descriptions and installation instructions

### Improved Testing & CI/CD
- Enhanced GitHub Actions workflow configuration
- Support for multiple PHPUnit versions (^10.5 | ^11.5)
- Improved test structure and organization
- Updated PHPUnit configuration for better test execution

### Code Quality Improvements
- Support for Psalm versions 5.9 and 6.13
- Refined Psalm configuration for stricter static analysis
- Added proper type casting throughout the codebase
- Better IDE support with PhpStorm run configurations

## Breaking Changes

| Aspect | Before (5.x) | After (6.0) | Description |
|--------|-------------|-------------|-------------|
| **PHP Version** | PHP 8.1 - 8.3 | PHP 8.3 - 8.5 | Minimum PHP version increased from 8.1 to 8.3. PHP 8.1 and 8.2 are no longer supported. |
| **PHPUnit Version** | ^9.6 | ^10.5 \| ^11.5 | Updated to support PHPUnit 10 and 11. PHPUnit 9 is no longer supported. |
| **Psalm Version** | ^5.9 | ^5.9 \| ^6.13 | Added support for Psalm 6, while maintaining backward compatibility with Psalm 5.9+. |
| **Type Safety** | Loose type casting | Strict type casting | All numeric operations now use explicit type casting (e.g., `(int)`, `(float)`) for better static analysis. This may affect edge cases with type juggling. |
| **Method Signatures** | No Override attribute | `#[\Override]` attributes | All overridden methods now use the `#[\Override]` attribute. While this doesn't change functionality, it requires PHP 8.3+. |
| **Composer Stability** | Default | `prefer-stable: true`, `minimum-stability: dev` | Composer configuration now explicitly prefers stable packages. |

## Bug Fixes

- Fixed type casting issues in `Base.php` for better precision:
  - Improved fraction calculation in `write()` method (line 24)
  - Fixed modulo operation type safety (line 50)
  - Enhanced division type casting (line 72)
- Corrected potential floating-point precision issues in number processing
- Fixed Psalm static analysis warnings throughout the codebase

## Path to Upgrade from 5.x to 6.x

### Prerequisites
- Ensure your environment is running **PHP 8.3 or higher**
- Update PHPUnit to version 10.5 or 11.5 if you're using the library in tests
- Update Psalm to version 5.9+ or 6.13+ if you're using static analysis

### Step-by-Step Upgrade Process

1. **Update PHP Version**
   ```bash
   # Verify your PHP version
   php -v

   # Ensure it's 8.3 or higher
   # If not, upgrade your PHP installation
   ```

2. **Update Composer Dependencies**
   ```bash
   # Update the package
   composer require byjg/wordnumber:^6.0

   # Update all dependencies
   composer update
   ```

3. **Test Your Application**
   ```bash
   # Run your test suite
   vendor/bin/phpunit

   # Run static analysis if you use Psalm
   vendor/bin/psalm
   ```

4. **Review Code Changes** (if you extended the library)

   If you created custom language implementations by extending the `Base` class:

   - Add `#[\Override]` attributes to all overridden methods:
     ```php
     // Before
     public function concatWord(): string
     {
         return "and";
     }

     // After
     #[\Override]
     public function concatWord(): string
     {
         return "and";
     }
     ```

   - Review any custom number processing logic for type safety
   - Ensure explicit type casting where needed

5. **Update Testing Dependencies** (if applicable)

   If your project uses PHPUnit 9.x:
   ```bash
   # Update to PHPUnit 10 or 11
   composer require --dev phpunit/phpunit:^10.5
   # or
   composer require --dev phpunit/phpunit:^11.5
   ```

   Review PHPUnit's migration guides if needed:
   - [PHPUnit 10 Migration Guide](https://docs.phpunit.de/en/10.5/migration/upgrading-to-phpunit-10.html)
   - [PHPUnit 11 Migration Guide](https://docs.phpunit.de/en/11.5/migration/upgrading-to-phpunit-11.html)

6. **No Code Changes Required for Basic Usage**

   If you're using the library with the provided language classes (`EnglishWordNumber`, `PortugueseWordNumber`, `ItalianWordNumber`), no code changes are required:

   ```php
   // This code works the same in 5.x and 6.x
   use ByJG\WordNumber\EnglishWordNumber;

   $wordNumber = new EnglishWordNumber();
   echo $wordNumber->write(12.34);
   // Output: twelve dollars and thirty four cents
   ```

### Compatibility Notes

- **No Breaking API Changes**: The public API remains compatible with 5.x
- **Internal Improvements**: Type safety improvements are internal and shouldn't affect normal usage
- **Documentation**: New documentation structure provides better guidance for all use cases

### Getting Help

If you encounter issues during the upgrade:
- Check the [Getting Started Guide](docs/getting-started.md)
- Review the [Usage Examples](docs/usage.md)
- Report issues on [GitHub Issues](https://github.com/byjg/php-wordnumber/issues)

## Credits

- Thanks to all contributors who helped test and improve this release
- Special thanks to [willypuzzle](https://github.com/willypuzzle) for the Italian language support
