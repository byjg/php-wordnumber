# Wordnumber

Write float number in a word number.

Support multiple languages. Until this moment supports
* English
* Portuguese

## Examples

```php
$wordNumber = new \ByJG\WordNumber\EnglishWordNumber();
$wordnumber->write(100);  # writes one hundred
```

or

```php
$wordNumber = new \ByJG\WordNumber\PortugueseWordNumber();
$wordnumber->write(143);  # writes cento e quarenta três.
```

## Create other languages

You have to implement the interface WordNumberInterface with the proper word number in your language.
If you create feel free to send to us.

```php
interface WordNumberInterface
{
	function concatWord();

	function currency();

	function tens();

	function unit();

	function elevenToNineteen();

	function twentyToNinety();

	function hundreds();

	function oneHundred();
}
```
