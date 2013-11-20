<?php
class My_View_Helper_HeadMeta extends Zend_View_Helper_HeadMeta
{
    /**
     * Determine if item is valid
     *
     * @param  mixed $item
     * @return boolean
     */
    protected function _isValid($item)
    {
        if ((!$item instanceof stdClass)
            || !isset($item->type)
            || !isset($item->modifiers))
        {
            return false;
        }

        if (!isset($item->content)
        && (! $this->view->doctype()->isHtml5()
        || (! $this->view->doctype()->isHtml5() && $item->type !== 'charset'))) {
            return false;
        }

        // <meta property= ... /> is only supported with doctype RDFa
        if (!$this->view->doctype()->isRdfa()
            && !$this->view->doctype()->isHtml5()
            && $item->type === 'property') {
            return false;
        }

        return true;
    }
}