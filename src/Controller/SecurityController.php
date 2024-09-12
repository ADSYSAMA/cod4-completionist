<?php

namespace App\Controller;

use App\Entity\Challenge;
use App\Entity\Challenges\CamouflageChallenge;
use App\Entity\Challenges\CampaignChallenge;
use App\Entity\Challenges\MultiplayerChallenge;
use App\Entity\User;
use App\Form\LoginFormType;
use App\Repository\Challenges\CamouflageChallengeRepository;
use App\Repository\Challenges\CampaignChallengeRepository;
use App\Repository\Challenges\MultiplayerChallengeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    public function __construct(
        private readonly CamouflageChallengeRepository  $camouflageChallengeRepository,
        private readonly CampaignChallengeRepository    $campaignChallengeRepository,
        private readonly MultiplayerChallengeRepository $multiplayerChallengeRepository,
    )
    {
    }

    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $form = $this->createForm(LoginFormType::class);

        $form->get('_username')->setData($authenticationUtils->getLastUsername());

        if ($error = $authenticationUtils->getLastAuthenticationError()) {
            $form->addError(new FormError($error->getMessageKey()));
        }

        return $this->render('security/login.html.twig', [
            'loginForm' => $form,
        ]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    #[Route(path: '/profile', name: 'app_profile')]
    public function profile(): Response
    {
        if (!$user = $this->getUser()) {
            return $this->redirectToRoute('app_login');
        }

        $userCompletedChallenges = $user instanceof User
            ? $user->getCompletedChallenges()
            : new ArrayCollection();

        $countCamouflageCompletedChallenges = $userCompletedChallenges->reduce(function (int $accumulator, Challenge $challenge) {
            return $challenge instanceof CamouflageChallenge
                ? $accumulator + 1
                : $accumulator;
        }, 0);
        $countCampaignCompletedChallenges = $userCompletedChallenges->reduce(function (int $accumulator, Challenge $challenge) {
            return $challenge instanceof CampaignChallenge
                ? $accumulator + 1
                : $accumulator;
        }, 0);
        $countMultiplayerCompletedChallenges = $userCompletedChallenges->reduce(function (int $accumulator, Challenge $challenge) {
            return $challenge instanceof MultiplayerChallenge
                ? $accumulator + 1
                : $accumulator;
        }, 0);

        $criteria = Criteria::create();
        $criteria->where($criteria->expr()->neq('type', 'default'));
        $totalCamouflageChallenges = $this->camouflageChallengeRepository->matching($criteria)->count();

        return $this->render('security/profile.html.twig', [
            'user' => $user,
            'challenges' => [
                'Camouflage' => [
                    'completed' => $countCamouflageCompletedChallenges,
                    'total' => $totalCamouflageChallenges,
                ],
                'Multiplayer' => [
                    'completed' => $countMultiplayerCompletedChallenges,
                    'total' => $this->multiplayerChallengeRepository->count(),
                ],
                'Campaign' => [
                    'completed' => $countCampaignCompletedChallenges,
                    'total' => $this->campaignChallengeRepository->count(),
                ],
            ]
        ]);
    }
}
