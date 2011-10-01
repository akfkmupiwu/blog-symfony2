<?php

namespace Ricardclau\LittlewebBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Symfony\Component\Console\Formatter\OutputFormatterStyle;

class NewsletterCommand extends ContainerAwareCommand
{
    protected function configure()
    {

        $this
            ->setName('littleweb:newsletter')
            ->setDescription('Sends our daily newsletter to our registered users')
            ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $dialog = $this->getHelperSet()->get('dialog');
        if (!$dialog->askConfirmation($output, '<question>Do you confirm spamming our users?</question>', false)) {
            return;
        }    

        $output->writeln('<comment>Starting Newsletter process</comment>');

        $output->getFormatter()->setStyle('fcbarcelona', new OutputFormatterStyle('red', 'blue', array('blink', 'bold', 'underscore')));
        $output->writeln('<fcbarcelona>Messi is the best</fcbarcelona>');       

        $output->writeln('<info>Newsletter process ended succesfully</info>');
    }
}
