yii-bootstrap-datetimepicker
=========================

[![Build Status](https://secure.travis-ci.org/intersvyaz/yii-bootstrap-datetimepicker.png)](http://travis-ci.org/intersvyaz/yii-bootstrap-datetimepicker)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/intersvyaz/yii-bootstrap-datetimepicker/badges/quality-score.png?s=e8b97cb25034dab95bcbe18c2b41fcf787cc35bb)](https://scrutinizer-ci.com/g/intersvyaz/yii-bootstrap-datetimepicker/)
[![Code Coverage](https://scrutinizer-ci.com/g/intersvyaz/yii-bootstrap-datetimepicker/badges/coverage.png?s=c286d3af3214412aa7d657e95554e96413cc3ff4)](https://scrutinizer-ci.com/g/intersvyaz/yii-bootstrap-datetimepicker/)

Based on https://github.com/smalot/bootstrap-datetimepicker

## Install via composer

`php composer.phar require intersvyaz/yii-bootstrap-datetimepicker:*`

## Usage example

```php
$this->widget(
    'Intersvyaz\Widgets\BootstrapDateTimePicker', 
    [
        'name' => 'date',
        'value' => date('d.m.Y'),
        'options' => ['format' => 'dd.mm.yyyy']
    ]
);
```
