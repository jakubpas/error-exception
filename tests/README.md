## Synopsis

PHP 7 will allow to use of exceptions in the engine and will replace the existing fatal or recoverable fatal errors 
with exceptions.
Meanwhile in older PHP versions the E_USER_WARNING, E_USER_NOTICE, and any other non-terminating error codes, are useless 
and act like E_USER_ERROR that will terminate when you combine a custom ERROR_HANDLER with ErrorException and do not CATCH 
the error. There is NO way to return execution to the parent scope in the EXCEPTION_HANDLER.

## Code Example

To turn on ErrorEcxeptions handling use:
```
<?php
use JakubPas\Exception\Handler;

Handler::set();
```

## Motivation

The idea of this package is to add composer auto-loader functionality to GAPI code and make it PHP>5.4 compatible. There also some minor bug fixes since the original version.

## Installation

composer require jakubpas/error-exception

## API Reference

The API Reference are yet to be added.

## Tests

The test are yet to be added.

## Contributors

Jakub Pas <jakubpas@gmail.com> 2015
Stig Manning <stig@sdm.co.nz> 2009

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