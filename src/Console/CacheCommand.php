<?php
/**
 * Author: Mykola Chomenko
 * Email: mykola.chomenko@dipcom.cz
 */

namespace Chomenko\CacheCleaner\Console;

use Chomenko\CacheCleaner\Cleaner;
use Chomenko\CacheCleaner\CleanerFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CacheCommand extends Command
{

	protected function configure()
	{
		$this->setName('cache:clean')
			->setDescription('Remove cache');
	}

	/**
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @throws \Exception
	 */
	public function execute(InputInterface $input, OutputInterface $output)
	{
		$cleaner = CleanerFactory::getCleaner();
		$data = $cleaner->getFileList();
		$cleaner->clean();
		$count = count($data["files"]);

		$message = "Cache success remove. Remove {$count} files.";
		$line = str_pad("", strlen($message), "-");
		$output->writeln("<info>{$line}</info>");
		$output->writeln("<info>{$message}</info>");
		$output->writeln("<info>{$line}</info>");
	}

}
