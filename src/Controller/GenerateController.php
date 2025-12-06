<?php

namespace App\Controller;

use Faker\Factory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class GenerateController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index():Response
    {
      return  $this->redirectToRoute('app_generate');
    }

    #[Route('/generate', name: 'app_generate')]
    public function generate():JsonResponse
    {
        $faker = Factory::create('fr_FR');

        $data = [
            'nom' => $faker->lastName(),
            'prénom' => $faker->firstName(),
            'age' => $faker->numberBetween(18, 60),
            'email' => $faker->email(),
            'adresse' => $faker->address(),
            'rue' => $faker->streetAddress(),
            'date_naissance' => $faker->date('Y-m-d', '-18 years'),
            'date_creation' => $faker->dateTimeBetween('-1 years', 'now'),
            'ddernier_connection' => $faker->dateTimeThisMonth(),
            'description' => $faker->text(),
            'telephone' => $faker->phoneNumber(),
            'ville' => $faker->city(),
            'code_postal' => $faker->postcode(),
            'pays' => $faker->country(),
            'genre' => $faker->randomElement(['male', 'female']),
            'langue' => $faker->languageCode(),
            'timezone' => $faker->timezone(),
            'mot_de_passe' => $faker->password(minLength: 8, maxLength: 20),
        ];

        return new JsonResponse($data);
    }
}