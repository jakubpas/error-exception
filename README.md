## Synopsis

PHP 7 will allow to use of exceptions in the engine and will replace the existing fatal or recoverable fatal errors 
with exceptions.
Meanwhile in older PHP versions the E_USER_WARNING, E_USER_NOTICE, and any other non-terminating error codes, are useless 
and act like E_USER_ERROR that will terminate runtime unless ERROR_HANDLER is not combined with ErrorException to catch 
the error. This library introduces sets of exceptions which handle most of the errors like: CompileError, 
CompileWarning, CoreError, CoreWarning, Deprecated, Handler.php, Notice, Parse, RecoverableError, Strict, UserDeprecated, 
UserError, UserNotice, UserWarning, Warning etc.

## Code Example

To turn on ErrorExceptions handling use:
```
<?php
use JakubPas\Exception\Handler;

Handler::set();
```

## Motivation

The idea of this package is to replace most of the terminating runtime errors with the recoverable exceptions.

## Installation

composer require jakubpas/error-exception

## API Reference

The API Reference is yet to be added.

## Tests

To run the tests:
```
cd test
../vendor/bin/phpunit 

```

## Contributors

Jakub Pas 2015

## License

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
