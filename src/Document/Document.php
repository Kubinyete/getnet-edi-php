<?php

namespace Kubinyete\Edi\Getnet\Document;

use Closure;
use RuntimeException;
use Kubinyete\Edi\IO\Stream;
use Kubinyete\Edi\Parser\LineParser;
use Kubinyete\Edi\IO\StreamInterface;
use Kubinyete\Edi\Getnet\Registry\Registry;
use Kubinyete\Edi\Getnet\Reader\Parser as BaselineParser;
use Kubinyete\Edi\Getnet\Registry\Contract\HeaderInterface;

final class Document
{
    protected LineParser $parser;

    protected function __construct(protected StreamInterface $stream)
    {
        $this->parser = new BaselineParser($stream);
        $this->load();
    }

    protected function load(): void
    {
        $this->parser->goto(0);
        $compatibilityFileHeader = $this->parser->next();

        if (!$compatibilityFileHeader instanceof HeaderInterface) {
            throw new RuntimeException("Expected document to have a header entry");
        }

        $this->applyParserCompatibilityChanges(Version::parse($compatibilityFileHeader->getLayoutVersion()));
        $this->parser->goto(0);
    }

    protected function applyParserCompatibilityChanges(Version $version): void
    {
        static $baseline = '10.0.0';

        if ($version->lessThan($baseline)) {
            throw new RuntimeException("Unsupported document version, requires at least version $baseline");
        }

        // @TODO:
        // For compatibility reasons, we can change our parser settings or
        // change the underlying object as we see fit, the only requirement is that
        // our initial parser should be the most compatible of them all.
        // The baseline initial parser should be at least able to correctly parse a header entry to decide
        // which parser or setting to use.
    }

    // Basic reading functions

    /**
     * Gets the current line number from the document cursor.
     *
     * @return integer
     */
    public function currentLineNumber(): int
    {
        return $this->parser->getLineNumber();
    }

    /**
     * Gets the current line from the document cursor.
     *
     * @return string|null
     */
    public function currentLine(): ?string
    {
        return $this->parser->getLine();
    }

    /**
     * Rollback the document cursor to the beginning.
     *
     * @return void
     */
    public function rollback(): void
    {
        $this->parser->rollback();
    }

    /**
     * Rollback the document cursor and attempt to go to the specified line number.
     *
     * @param integer $lineNumber
     * @return void
     */
    public function gotoLine(int $lineNumber): void
    {
        $this->parser->goto($lineNumber);
    }

    /**
     * Returns the next registry from the document cursor.
     * 
     * @return Registry|null
     */
    public function next(): ?Registry
    {
        return $this->parser->next();
    }

    /**
     * Executes the callback for each registry in the document.
     *
     * @param Closure $callback
     * @return void
     */
    public function each(Closure $callback): void
    {
        $this->parser->goto(0);
        foreach ($this->parser as $registry) {
            $callback($registry);
        }
    }

    //

    /**
     * Opens a new document from a stream interface wrapper
     *
     * @param StreamInterface $stream
     * @return self
     */
    public static function openFromStream(StreamInterface $stream): self
    {
        return new self($stream);
    }

    /**
     * Opens a new document from a resource
     *
     * @param mixed $resource
     * @return self
     */
    public static function openFromResource($resource): self
    {
        return new self(Stream::create($resource));
    }

    /**
     * Opens a new document from a file
     *
     * @param string $path
     * @param string $mode
     * @param mixed $context
     * @return self
     */
    public static function open(string $path, string $mode = 'rb', $context = null): self
    {
        return new self(Stream::file($path, $mode, $context));
    }
}
