<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Form\Type;

/**
 * Description of MessageType
 *
 * @author contactenesi
 */
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class MessageType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options ){
        $builder->add("senderName", "text", array("label"=>"Sender Name", "attr"=>array("placeholder"=>"Full Name")))
                ->add("senderEmail","email", array("label"=>"Sender Email", "attr"=>array("placeholder"=>"Email")))
                ->add("senderNo","text", array("label"=>"Sender No.", "attr"=>array("placeholder"=>"Phone no.")))
                ->add("messageBody", "textarea", array("label"=>"Message Body", "attr"=>array("rows"=>"8")))
                ->add("messageStatus", "hidden", array("data"=>"unread"))
                ->add("send", "submit");
    }
    public function getName(){
        return "messagefrm";
    }
    
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            "data_class"=>"AppBundle\Entity\Message",
            "attr"=>array("id"=>"msgfrm")
            ));
    }
}
