<?php

use Tamtamchik\SimpleFlash\BaseTemplate;
use Tamtamchik\SimpleFlash\TemplateInterface;

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

class CustomTemplate extends BaseTemplate implements TemplateInterface
{
    protected $prefix  = '<li>'; // every line prefix
    protected $postfix = '</li>'; // every postfix
    protected $wrapper = '<ul class="alert-%s">%s</ul>'; // wrapper over messages of same type

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
    <title>Test Semantic UI 2 template.</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/uikit/2.24.3/css/uikit.gradient.min.css">
</head>
<body>

<br/>

<div class="uk-container-center uk-width-1-3">

    <?php include_once '_menu.php'; ?>

    <hr/>

    <?= flash() ?>

</div>

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/uikit/2.24.3/js/uikit.min.js"></script>

</body>
</html>
