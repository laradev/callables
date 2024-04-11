## Features

This php package allows any php object to create magic getter, setter and adder functions. 
This avoids creating a multitude of methods that are not always optimal to read.

## Getting started

```bash
    composer require wearelaradev/callables
```

## Usage
```php
use Wearelaradev\Callables\Callables;

class MyObject 
{
    use Callables;
    
    public string $foo = "foo";
    protected string $bar = "bar";
    private string $toto = "toto";
    private array $arr = [];
}

var_dump((new MyObject())->getBar());
//output: "bar"

$obj = (new MyObject())
    ->setFoo("foo1")
    ->setToto("toto1")
    ->addArr("test")
;

var_dump(["foo" => $obj->getFoo(), "toto" => $obj->getToto(), "arr" => $obj->getArr()]);
// output: ["foo" => "foo1", "toto" => "toto1", "arr" => ["test"]];

```

## Additional information

If you encounter a bug or have any ideas for improvement, don't hesitate to send me a PR
or contact me via email at florian@laradev.ca :)
