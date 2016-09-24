A basic PHP wrapper for [Captcha3D](https://github.com/marcbp/captcha3d).

```
$captcha = new Captcha3D\Captcha('/path/to/captcha3d');

$captcha->setString('abc')
    ->setHeight(100)
    ->setFile(__DIR__ . '/captcha.png')
    ->run();
```