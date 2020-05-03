# Command Project  

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

This is a wrapper around some open source package in order to execute and organized you CLI commands, for more information how to use command, i suggest to read more here: 
https://symfony.com/doc/current/components/console.html   


## Install

Via Composer

```bash
$ composer create-project --prefer-dist gravatalonga/command my-new-command
```

Then you need give execute permission  
```bash
chmod +x console
```   

Now you can use, like this:  
```bash
./console
```  

If you don't like use like bash command, you can use like this:  
```bash
php console
```

## Usage

In order to know how to use command, i suggest to go:  
https://symfony.com/doc/current/components/console.html  

All the commands must be registed inside `commands` folder, under `Commands/` namespaces.  

After create commands, it's registed automatically inside application, only need run console application
with the following command:  

```
./console inspiring
```  

You can test your commands, see `tests/` folder to see examples.  

### Advance tip  

Beside call your commands, you can register dependencies into the container, into `dependencies.php` in the following maner:  

```php
return [
    Logger::class => function(\Psr\Container\ContainerInterface $container) {
        return new Logger();
    }
];
```  
After that, you can type hint into your constructor of your commands:  

```php
...
public function __construct(Logger $logger) {
    $this->logger->info("Hello World");
}
```  

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email jonathan.alexey16@gmail.com instead of using the issue tracker.

## Credits

- [Jonathan Fontes][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/gravatalonga/command.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/gravatalonga/command/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/gravatalonga/command.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/gravatalonga/command.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/gravatalonga/command.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/gravatalonga/command
[link-travis]: https://travis-ci.org/gravatalonga/command
[link-scrutinizer]: https://scrutinizer-ci.com/g/gravatalonga/command/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/gravatalonga/command
[link-downloads]: https://packagist.org/packages/gravatalonga/command
[link-author]: https://github.com/gravatalonga
[link-contributors]: ../../contributors
