## Plugin for Grav CMS for currency conversion, CBR (Russian)
**This is a plugin For the currencies of the Bank of Russia, therefore it works with the currency "Ruble"**

The plugin refers to [cbr.ru/scripts/XML_daily.asp](https://www.cbr.ru/scripts/XML_daily.asp)<br>
Collects all currency names, number, code, and values into an array

As a result, we get an array `cbr()` of this kind (in the example, only two currencies, for understanding):
```bash
array(34) {
  ["USD"]=>
    array(4) {
      ["NumCode"]=> string(3) "840"
      ["CharCode"]=> string(3) "USD"
      ["Name"]=> string(19) "Доллар США"
      ["Value"]=> string(7) "64,4711"
    }
  ["EUR"]=>
    array(4) {
      ["NumCode"]=> string(3) "978"
      ["CharCode"]=> string(3) "EUR"
      ["Name"]=> string(8) "Евро"
      ["Value"]=> string(7) "71,5307"
    }
}
```

Each currency code is the name of its data array.<br>
For an example:

So we get the name of the currency with the code USD:
```bash
{{ cbr()['USD']['Name']  }}
```

Thus we get the dollar against the ruble at the rate of the Central Bank :
```bash
{{ cbr()['USD']['Value']  }}
```

So this is how we show the name of the currency and the value:
```bash
{{ cbr()['USD']['Name']  }} = {{ cbr()['USD']['Value']  }}
```
Result:

> Доллар США = 64,4711

With [number_format](https://twig.symfony.com/doc/2.x/filters/number_format.html) you can discard the extra digits after the decimal point.
