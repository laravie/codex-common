# Release Notes for v1.x

This changelog references the relevant changes (bug and security fixes) done to `laravie/codex-common`.

## 1.2.1

Released: 2020-01-20

### Changes

* Trivial refactors.

## 1.2.0

Released: 2019-10-11

### Added

* Added `Laravie\Testing\Faker::shouldResponseWithJson()`.
* Added `Laravie\Testing\Faker::expectResponseHeaders()`.

### Changes

* Refactor `Laravie\Testing\Faker` with improved support to asserting response headers.
* Change `Laravie\Exceptions\HttpException::$response` property visibility from `private` to `protected`.

## 1.1.0

Released: 2019-07-09

### Changes

* Bump dependencies and add `php-http/client-implementation` requirement.

## 1.0.1

Released: 2019-05-27

### Added

* Add `Laravie\Codex\Testing\Faker::expectContentTypeIs()` helper method.

## 1.0.0

Released: 2019-03-28

* Separate Common component from `laravie/codex`.
