# Bob [^_^]
## A tragicomic chat bot

Bob used to be a lackadaisical teenager and was born in a Code Kata.
In conversation, his responses were limited:
* Bob answered "Sure." if you asked him a question.
* He answered "Whoa, chill out!" if you YELLED AT HIM.
* He answered "Calm down, I know what I'm doing!" if you yelled a question at him.
* He said "Fine. Be that way!" if you addressed him without actually saying anything.

Now Bob quotes from Samuel Beckett’s [<em>Waiting for Godot</em>](https://en.wikipedia.org/wiki/Waiting_for_Godot) in most of the cases.

## How to run
dependencies:

* [PHP 7.2+](http://php.net/downloads.php)
* [composer](https://getcomposer.org/)

Both PhpUnit and PhpSpec are included in composer.json:
```
$ composer install
```

## Usage

In the root directory type:
      
      php bobtalk.php

and have elementary conversations with Bob such as:
<img width="810" alt="Screenshot 2020-11-28 at 16 31 34" src="https://user-images.githubusercontent.com/23189414/100519284-4ad18580-3197-11eb-85e6-d3c917f19699.png">

You can further extends Bob to quote from your favourite book by requesting quotes from [https://en.wikiquote.org/](https://en.wikiquote.org/wiki/Main_Page)

## How to test
Dependencies:

* [phpunit 9.4](https://phpunit.de/getting-started/phpunit-9.html)

Run test suites in in root directory
```
$ vendor/bin/phpspec run
$ vendor/bin/phpunit tests --testdox --colors
```
Run phpunit code coverage
```
$ vendor/bin/phpunit tests --coverage-text
```
<img width="378" alt="Screenshot 2020-11-28 at 17 08 03" src="https://user-images.githubusercontent.com/23189414/100520095-570c1180-319c-11eb-845c-9841af212c27.png">

## Author Contact
[alexandra.julius@gmail.com](mailto:alexandra.julius@gmail.com)
