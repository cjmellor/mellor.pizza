<?php

namespace App\Concerns;

use League\CommonMark\Environment\Environment;
use League\CommonMark\MarkdownConverter;
use League\CommonMark\Output\RenderedContentInterface;
use Torchlight\Commonmark\V2\TorchlightExtension;

trait Convert
{
    public function convert($content): RenderedContentInterface
    {
        $environment = Environment::createCommonMarkEnvironment(['html_input' => 'strip']);
        $environment->addExtension(new TorchlightExtension());

        $converter = new MarkdownConverter($environment);

        return $converter->convert($content);
    }
}
