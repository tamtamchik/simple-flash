<?php

namespace Tamtamchik\SimpleFlash;

use Tamtamchik\SimpleFlash\Exceptions\FlashTemplateNotFoundException;

/**
 * Class Engine.
 */
class Engine
{
    /**
     * @var string - main session key for Flash messages.
     */
    private $key = 'flash_messages';

    private $types = [
        'error',
        'warning',
        'info',
        'success',
    ];

    private $template;

    /**
     * Creates flash container from session.
     *
     * @param TemplateInterface|null $template
     */
    public function __construct(TemplateInterface $template)
    {
        $this->template = $template;

        if (!array_key_exists($this->key, $_SESSION)) {
            $_SESSION[$this->key] = [];
        }
    }

    /**
     * Base method for adding messages to flash.
     *
     * @param string|string[] $message - message text
     * @param string $type - message type: success, info, warning, error
     *
     * @return Engine $this
     */
    public function message($message = '', string $type = 'info'): Engine
    {
        if (is_array($message)) {
            foreach ($message as $issue) {
                $this->addMessage($issue, $type);
            }

            return $this;
        }

        return $this->addMessage($message, $type);
    }

    /**
     * Add message to $_SESSION.
     *
     * @param string $message - message text
     * @param string $type - message type: success, info, warning, error
     *
     * @return Engine $this
     */
    protected function addMessage(string $message = '', string $type = 'info'): Engine
    {
        $type = strip_tags($type);

        if (empty($message) || !in_array($type, $this->types)) {
            return $this;
        }

        if (!array_key_exists($type, $_SESSION[$this->key])) {
            $_SESSION[$this->key][$type] = [];
        }

        $_SESSION[$this->key][$type][] = $message;

        return $this;
    }

    /**
     * Returns Bootstrap ready HTML for Engine messages.
     *
     * @param string|null $type - message type: success, info, warning, error
     * @param string|null $template - template name from Templates class
     *
     * @return string - HTML with flash messages
     *
     * @throws FlashTemplateNotFoundException
     */
    public function display(string $type = null, string $template = null): string
    {
        $result = '';

        if (
            !array_key_exists($this->key, $_SESSION) ||
            (!is_null($type) && !array_key_exists($type, $_SESSION[$this->key]))
        ) {
            return $result;
        }

        if (!is_null($template)) {
            $this->setTemplate(TemplateFactory::create($template));
        }

        if (!is_null($type) && !in_array($type, $this->types)) {
            return $result;
        }

        if (in_array($type, $this->types)) {
            $result .= $this->buildMessages($_SESSION[$this->key][$type], $type);
        } elseif (is_null($type)) {
            foreach ($_SESSION[$this->key] as $messageType => $messages) {
                $result .= $this->buildMessages($messages, $messageType);
            }
        }

        $this->clear($type);

        return $result;
    }

    /**
     * Returns if there are any messages in container.
     *
     * @param string|null $type - message type: success, info, warning, error
     *
     * @return bool
     */
    public function hasMessages(string $type = null): bool
    {
        if (!is_null($type)) {
            return !empty($_SESSION[$this->key][$type]);
        }

        foreach ($this->types as $type) {
            if (!empty($_SESSION[$this->key][$type])) {
                return true;
            }
        }

        return false;
    }

    /**
     * Clears messages from session store.
     *
     * @param string|null $type - message type: success, info, warning, error
     *
     * @return Engine $this
     */
    public function clear(string $type = null): Engine
    {
        if (is_null($type)) {
            $_SESSION[$this->key] = [];
        } else {
            unset($_SESSION[$this->key][$type]);
        }

        return $this;
    }

    /**
     * Builds messages for a single type.
     *
     * @param array $flashes - array of messages to show
     * @param string $type - message type: success, info, warning, error
     *
     * @return string - HTML with flash messages
     */
    protected function buildMessages(array $flashes, string $type): string
    {
        $messages = '';
        foreach ($flashes as $msg) {
            $messages .= $this->template->wrapMessage($msg);
        }

        return $this->template->wrapMessages($messages, $type);
    }

    /**
     * If requested as string will HTML will be returned.
     *
     * @return string - HTML with flash messages
     */
    public function __toString()
    {
        return $this->display();
    }

    /**
     * Shortcut for error message.
     *
     * @param $message - message text
     *
     * @return Engine $this
     */
    public function error($message): Engine
    {
        return $this->message($message, 'error');
    }

    /**
     * Shortcut for warning message.
     *
     * @param $message - message text
     *
     * @return Engine $this
     */
    public function warning($message): Engine
    {
        return $this->message($message, 'warning');
    }

    /**
     * Shortcut for info message.
     *
     * @param $message - message text
     *
     * @return Engine $this
     */
    public function info($message): Engine
    {
        return $this->message($message);
    }

    /**
     * Shortcut for success message.
     *
     * @param $message - message text
     *
     * @return Engine $this
     */
    public function success($message): Engine
    {
        return $this->message($message, 'success');
    }

    /**
     * Setter for $template.
     *
     * @param TemplateInterface $template
     *
     * @return Engine $this
     */
    public function setTemplate(TemplateInterface $template): Engine
    {
        $this->template = $template;

        return $this;
    }

    /**
     * Getter for $template.
     *
     * @return TemplateInterface
     */
    public function getTemplate(): ?TemplateInterface
    {
        return $this->template;
    }

    /**
     * Returns Bootstrap ready HTML for messages.
     *
     * @param string|null $type - message type: success, info, warning, error
     *
     * @throws FlashTemplateNotFoundException
     */
    public function displayBootstrap(string $type = null): string
    {
        return $this->display($type, Templates::BOOTSTRAP);
    }

    /**
     * Returns Foundation ready HTML for messages.
     *
     * @param string|null $type - message type: success, info, warning, error
     *
     * @throws FlashTemplateNotFoundException
     */
    public function displayFoundation(string $type = null): string
    {
        return $this->display($type, Templates::FOUNDATION);
    }

    /**
     * Returns Bulma ready HTML for messages.
     *
     * @param string|null $type - message type: success, info, warning, error
     *
     * @throws FlashTemplateNotFoundException
     */
    public function displayBulma(string $type = null): string
    {
        return $this->display($type, Templates::BULMA);
    }

    /**
     * Returns Materialize ready HTML for messages.
     *
     * @param string|null $type - message type: success, info, warning, error
     *
     * @throws FlashTemplateNotFoundException
     */
    public function displayMaterialize(string $type = null): string
    {
        return $this->display($type, Templates::MATERIALIZE);
    }

    /**
     * Returns Tailwind ready HTML for messages.
     *
     * @param string|null $type - message type: success, info, warning, error
     *
     * @throws FlashTemplateNotFoundException
     */
    public function displayTailwind(string $type = null): string
    {
        return $this->display($type, Templates::TAILWIND);
    }

    /**
     * Returns Primer ready HTML for messages.
     *
     * @param string|null $type - message type: success, info, warning, error
     *
     * @throws FlashTemplateNotFoundException
     */
    public function displayPrimer(string $type = null): string
    {
        return $this->display($type, Templates::PRIMER);
    }

    /**
     * Returns UiKit ready HTML for messages.
     *
     * @param string|null $type - message type: success, info, warning, error
     *
     * @throws FlashTemplateNotFoundException
     */
    public function displayUiKit(string $type = null): string
    {
        return $this->display($type, Templates::UIKIT);
    }

    /**
     * Returns Semantic ready HTML for messages.
     *
     * @param string|null $type - message type: success, info, warning, error
     *
     * @throws FlashTemplateNotFoundException
     */
    public function displaySemantic(string $type = null): string
    {
        return $this->display($type, Templates::SEMANTIC);
    }

    /**
     * Returns Spectre ready HTML for messages.
     *
     * @param string|null $type - message type: success, info, warning, error
     *
     * @throws FlashTemplateNotFoundException
     */
    public function displaySpectre(string $type = null): string
    {
        return $this->display($type, Templates::SPECTRE);
    }
}
