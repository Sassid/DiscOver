<?php

namespace App\Form;

use App\Entity\Recipe;
use phpDocumentor\Reflection\Types\This;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Event\PreSubmitEvent;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\String\Slugger\AsciiSlugger;

class RecipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            // ->add('slug')
            ->add('content')
            // ->add('createdAt', null, [
            //     'widget' => 'single_text',
            // ])
            // ->add('updatedAt', null, [
            //     'widget' => 'single_text',
            // ])
            ->add('duration')
            ->add('save', SubmitType::class, [
                'label' => 'Envoyer'
            ]);
            // ->addEventListener(FormEvents::PRE_SUBMIT, $this->autoSlug(...));
    }

    // public function autoSlug(PreSubmitEvent $event): void
    // {
    //     $data = $event->getData();
    //     // dd($data);
    //     if (empty($data['slug'])) {
    //         $slugger = new AsciiSlugger();
    //         $data['slug'] = strtolower($slugger->slug($data['title']));
    //         $event->setData($data);
    //     }
    // }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recipe::class,
        ]);
    }
}
