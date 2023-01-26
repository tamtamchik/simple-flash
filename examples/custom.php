<?php

use Tamtamchik\SimpleFlash\BaseTemplate;
use Tamtamchik\SimpleFlash\TemplateInterface;
use function Tamtamchik\SimpleFlash\flash;

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

class CustomTemplate extends BaseTemplate implements TemplateInterface
{
    protected $prefix = '<li>'; // every line prefix
    protected $postfix = '</li>'; // every postfix
    protected $wrapper = '<ul class="a a-%s">%s</ul>'; // wrapper over messages of same type

    /**
     * @param string $messages - message text
     * @param string $type - message type: success, info, warning, error
     *
     * @return string
     */
    public function wrapMessages(string $messages, string $type): string
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

<?php include_once '_ribbon.php'; ?>

<div class="container" style="width: 600px;">

    <?php include_once '_menu.php'; ?>

    <?= flash() ?>

</div>

</body>
</html>
