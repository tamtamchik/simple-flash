<?php

use Tamtamchik\SimpleFlash\BaseTemplate;
use Tamtamchik\SimpleFlash\TemplateFactory;
use Tamtamchik\SimpleFlash\TemplateInterface;
use Tamtamchik\SimpleFlash\Templates;
use function Tamtamchik\SimpleFlash\flash;

if ( ! session_id()) {
    session_start();
}

require_once '../../vendor/autoload.php';

class Bootstrap5DismissibleTemplate extends BaseTemplate implements TemplateInterface
{
    protected $prefix = ''; // every line prefix
    protected $postfix = '<br>'; // every postfix
    protected $wrapper = '<div class="alert alert-%s alert-dismissible fade show" role="alert">
                            %s
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>'; // wrapper over messages of same type

    /**
     * @param string $messages - message text
     * @param string $type - message type: success, info, warning, error
     *
     * @return string
     */
    public function wrapMessages(string $messages, string $type): string
    {
        $type = ($type == 'error') ? 'danger' : $type;

        return sprintf($this->getWrapper(), $type, $messages);
    }
}

flash()
    ->error(['Invalid email!', 'Invalid username!'])
    ->warning('Warning message.')
    ->info('Info message.')
    ->success('Success message!');

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Bootstrap default template example.</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>

<div class="container" style="width: 600px; margin: 1em auto;">
    <?php
    if (flash()->some('error')) {
        echo flash()->setTemplate(new Bootstrap5DismissibleTemplate())->display('error');
    }
    echo flash()->setTemplate(TemplateFactory::create(Templates::BOOTSTRAP))->display()
    ?>
</div>

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
        crossorigin="anonymous"></script>

</body>
</html>
