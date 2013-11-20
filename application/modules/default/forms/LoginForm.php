<?php

class Default_Form_LoginForm extends Zend_Form
{

    public function init()
    {
        
        $this->setName('Login');
        $this->addPrefixPath('My_Form_Decorator', 'My/Form/Decorator/', 'decorator');

        $usuario = new Zend_Form_Element_Text('usuario');
        $usuario->addFilter('StripTags')->addFilter('StringTrim')->setRequired()->addErrorMessage('Campo requerido');
        $usuario->setLabel('Usuario: ')->setAttrib('class', 'form-control');

        $contrasenia = new Zend_Form_Element_Password('clave');
        $contrasenia->addFilter('StripTags')->addFilter('StringTrim')->setRequired()->addErrorMessage('Campo requerido');
        $contrasenia->setLabel('Clave: ')->setAttrib('class', 'form-control');

        $submit = new Zend_Form_Element_Submit('Ingresar');
        $submit->setAttrib('class', 'btn btn-primary');
        
        $this->addElements(array($usuario, $contrasenia, $submit));

        $this->setElementDecorators(array(
            'ViewHelper',
            //'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array('ErrorsHtmlTag', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));

        $submit->setDecorators(array('ViewHelper',
            array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element')),
            array(array('emptyrow' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));

        $this->setDecorators(
                array(
                    "FormElements",
                    array("HtmlTag", array("tag" => "table")),
                    "Form"
                )
        );
    }


}

