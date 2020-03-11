<?php

use Tamtamchik\SimpleFlash\BaseTemplate;
use Tamtamchik\SimpleFlash\TemplateInterface;

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

class CustomTemplate extends BaseTemplate implements TemplateInterface
{
    protected $prefix  = '<li>'; // every line prefix
    protected $postfix = '</li>'; // every postfix
    protected $wrapper = '<ul class="a a-%s">%s</ul>'; // wrapper over messages of same type

    /**
     * @param $messages - message text
     * @param $type     - message type: success, info, warning, error
     *
     * @return string
     */
    public function wrapMessages($messages, $type)
    {
        return sprintf($this->getWrapper(), $type, $messages);
    }
}

flash()->setTemplate(new CustomTemplate)->error(['Invalid email!', 'Invalid username!'])
    ->warning('Warning message.')
    ->info('Info message.')
    ->success('Success message!');

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test custom template example.</title>

    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            font-family: -apple-system, --sans-serif, sans-serif;
        }
        .a {
            border: 1px solid;
            border-radius: 10px;
            padding: 1em;
            margin: 0.25em 0;
        }

        .a li {
            list-style: none;
        }

        .a-info {
            background: lightblue;
        }

        .a-error {
            background: lightpink;
        }

        .a-warning {
            background: lightgoldenrodyellow;
        }

        .a-success {
            background: lightgreen;
        }
    </style>
</head>
<body>

<a href="https://github.com/tamtamchik/simple-flash"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/365986a132ccd6a44c23a9169022c0b5c890c387/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f7265645f6161303030302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png"></a>
<br/>

<div class="container" style="width: 600px;">

    <?php include_once '_menu.php'; ?>

    <?= flash() ?>

</div>

</body>
</html>
