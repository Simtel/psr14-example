# Пример реализации стандарта PSR-14

- Связь событий и слушителей задается в Simtel\PSR14Example\ListenerProvider в cвойстве listen. Где ключ это класс
  события, а значения - классы слушитилей.

- Слушатели должны реализовывать контракт Simtel\PSR14Example\Contracts\ListenerInterface

### Запуск

```bash
php example.php
```
