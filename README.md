# Bob {^_^}
## A tragicomic chat bot

Bob used to be a lackadaisical teenager and was born in a Code Kata.
In conversation, his responses were limited:
* Bob answered 'Sure.' if you asked him a question.
* He answered 'Whoa, chill out!' if you YELLED AT HIM.
* He answered 'Calm down, I know what I'm doing!' if you yelled a question at him.
* He said 'Fine. Be that way!' if you addressed him without actually saying anything.

Now Bob quotes from Samuel Beckett’s 'Waiting for Godot' in most of the cases.

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
<img width="381" alt="Screenshot 2020-11-27 at 21 33 59" src="https://user-images.githubusercontent.com/23189414/100482624-59b52b00-30f8-11eb-88b5-7ab5d6cee87a.png">

## Author Contact
[alexandra.julius@gmail.com](mailto:alexandra.julius@gmail.com)
