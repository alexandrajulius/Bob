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

Maybe in the future, Bob will be able to use normalized data such as 
* [https://type.fit/api/quotes](https://type.fit/api/quotes) or
* [https://www.kaggle.com/akmittal/quotes-dataset](https://www.kaggle.com/akmittal/quotes-dataset)
You could then initialize him with an argument `author` and make him quote Albert Einstein, Toni Morrison or Douglas Adams.

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

## Author Contact
[alexandra.julius@gmail.com](mailto:alexandra.julius@gmail.com)
