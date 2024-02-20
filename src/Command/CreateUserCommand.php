<?php

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(
    name: 'app:create-user',
    description: 'Command to create a new user in our app',
)]
class CreateUserCommand extends Command
{
    private const USERNAME = 'username';
    private const PASSWORD = 'password';
    private const ROLE = 'role';

    public function __construct(
        private readonly EntityManagerInterface      $entityManager,
        private readonly UserPasswordHasherInterface $passwordHasher
    )
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument(self::USERNAME, InputArgument::REQUIRED, 'Login of the user')
            ->addArgument(self::PASSWORD, InputArgument::REQUIRED, 'Password of the user')
            ->addArgument(self::ROLE, InputArgument::REQUIRED, 'Role of the user');
    }

    protected function interact(InputInterface $input, OutputInterface $output): void
    {
        $username = $input->getArgument(self::USERNAME);
        $password = $input->getArgument(self::PASSWORD);
        $role = $input->getArgument(self::ROLE);
        $helper = new QuestionHelper();
        if (!$username) {
            $this->askArgument(input: $input, output: $output, helper: $helper, argument: self::USERNAME, question: 'Username ? (tolkien) ', default: 'tolkien');
        }
        if (!$password) {
            $this->askArgument(input: $input, output: $output, helper: $helper, argument: self::PASSWORD, question: 'Password ? (tolkien) ', default: 'tolkien');
        }
        if (!$role) {
            $this->askArgument(input: $input, output: $output, helper: $helper, argument: self::ROLE, question: 'Role ? (ROLE_USER) ', default: 'ROLE_USER');
        }
        parent::interact($input, $output);
    }

    private function askArgument(
        InputInterface  $input,
        OutputInterface $output,
        QuestionHelper  $helper,
        string          $argument,
        string          $question,
        ?string         $default = ''
    ): void
    {
        $input->setArgument($argument, $helper->ask($input, $output, new Question($question, $default)));
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $password = $input->getArgument(self::PASSWORD);

        $user = (new User())
            ->setUsername($input->getArgument(self::USERNAME))
            ->setRoles([$input->getArgument(self::ROLE)]);

        $user->setPassword($this->passwordHasher->hashPassword($user, $password));
        $this->entityManager->persist($user);
        $this->entityManager->flush();
        $roles = implode(',',$user->getRoles());
        $io->success("New user created with username {$user->getUserName()} and roles : $roles");

        return Command::SUCCESS;
    }
}
