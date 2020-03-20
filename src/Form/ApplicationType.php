<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;


class ApplicationType extends AbstractType {
    /**
     * Permet d'avoir la configuration de base d'un champ !
     *
     * @param string $label
     * @param string $placeholder
     * @param array $options
     * @return array
     */
    protected function setFormConfiguration($label, $placeholder, $options = []) {
        return array_merge_recursive([
            'label' => $label,
            'attr' => [
                'placeholder' => $placeholder,
                'class' => 'form-control-sm'
            ]
        ], $options);
    }

    /**
     * Permet d'avoir la configuration de base d'un champ choice !
     *
     * @param string $label
     * @param array $options
     * @return array
     */
    protected function setChoiceFormConfiguration($label, $options = []) {
        return array_merge_recursive([
            'label' => $label,
            'attr' => [
                'class' => 'small'
            ]
        ], $options);
    }   
}