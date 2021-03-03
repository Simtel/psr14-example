# Пример реализации стандарта PSR-14

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Simtel/psr14-example/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Simtel/psr14-example/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/Simtel/psr14-example/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Simtel/psr14-example/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/Simtel/psr14-example/badges/build.png?b=master)](https://scrutinizer-ci.com/g/Simtel/psr14-example/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/Simtel/psr14-example/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)

- Связь событий и слушителей задается в Simtel\PSR14Example\ListenerProvider в cвойстве listen. Где ключ это класс
  события, а значения - классы слушитилей.

- Слушатели должны реализовывать контракт Simtel\PSR14Example\Contracts\ListenerInterface

### Запуск

```bash
php example.php
```
