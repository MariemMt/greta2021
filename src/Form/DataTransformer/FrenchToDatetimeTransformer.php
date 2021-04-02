<?php 
namespace App\Form\DataTransformer;


use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class FrenchToDatetimeTransformer implements DataTransformerInterface
{


	// lorsque l'on passe des données au formulaire
	public function transform($date)

	{

		if ($date==null){


			return '';

		}

		return $date->format('d/m/Y');




	}



	// on reçoit les données du formulaire
	public function reverseTransform($frenchDate)

	{


		$date = \DateTime::createFromFormat('d/m/Y',$frenchDate);
		// le format 'd/m/Y' dépend du format utilisé dans datepicker 

		$date->setTime(0,0,0);

		return $date;





	}





}








