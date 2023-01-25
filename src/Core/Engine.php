<?php

namespace Tamtamchik\SimpleFlash\Core;

use Tamtamchik\SimpleFlash\Exceptions\FlashTemplateNotFoundException;
use Tamtamchik\SimpleFlash\TemplateFactory;
use Tamtamchik\SimpleFlash\TemplateInterface;
use Tamtamchik\SimpleFlash\Templates;

/**
 * Class Engine.
 */
class Engine extends MessageManager
{
    /**
     * Creates flash container from session.
     *
     * @param TemplateInterface $template
     */
    public function __construct(TemplateInterface $template)
    {
        parent::__construct($template);
    }

    /**
     * If requested as string will HTML will be returned.
     *
     * @return string - HTML with flash messages
     *
     * @throws FlashTemplateNotFoundException
     */
    public function __toString()
    {
        return $this->display();
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
        $session = $this->getSession();

        $isEmptySession = empty($session);
        $isTypeNotInSession = ! is_null($type) && ! array_key_exists($type, $session);
        $isTypeNotInTypes = ! is_null($type) && ! $this->_hasMessageType($type);

        if ($isEmptySession || $isTypeNotInSession || $isTypeNotInTypes) {
            return $result;
        }

        if ( ! is_null($template)) {
            $this->setTemplate(TemplateFactory::create($template));
        }

        if (is_null($type)) {
            foreach ($session as $messageType => $messages) {
                $result .= $this->_compileMessage($messages, $messageType);
            }
        } else {
            $result .= $this->_compileMessage($session[$type], $type);
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
    public function some(string $type = null): bool
    {
        return $this->_hasMessage($type);
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
        $this->_clearMessage($type);

        return $this;
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
                $this->_addMessage($issue, $type);
            }
        } else {
            $this->_addMessage($message, $type);
        }
        return $this;
    }


    /**
     * Getter for $template.
     *
     * @return TemplateInterface
     */
    public
    function getTemplate(): ?TemplateInterface
    {
        return $this->_getTemplate();
    }

    /**
     * Setter for $template.
     *
     * @param TemplateInterface $template
     *
     * @return Engine $this
     */
    public
    function setTemplate(TemplateInterface $template): Engine
    {
        $this->_setTemplate($template);

        return $this;
    }

    /**
     * Shortcut for error message.
     *
     * @param string|string[] $message - message text
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
     * @param string|string[] $message - message text
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
     * @param string|string[] $message - message text
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
     * @param string|string[] $message - message text
     *
     * @return Engine $this
     */
    public function success($message): Engine
    {
        return $this->message($message, 'success');
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
