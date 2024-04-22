<?php

namespace Kubinyete\Edi\Getnet\Document;

final class Version
{
    protected int $versionNumber = 0;

    public function __construct(private string $versionRawString)
    {
        $matches = [];

        if (preg_match('/([0-9]+(\.[0-9]+)*)/', $versionRawString, $matches)) {
            $versionComponents = explode('.', $matches[1]);
            $this->versionNumber =
                (max(0, min(255, intval($versionComponents[0] ?? 0))) << 16) |
                (max(0, min(255, intval($versionComponents[1] ?? 0))) << 8) |
                (max(0, min(255, intval($versionComponents[2] ?? 0))) << 0);
        }
    }

    public function getVersionNumber(): int
    {
        return $this->versionNumber;
    }

    public function getVersionString(): string
    {
        return implode('.', [$this->getMajor(), $this->getMinor(), $this->getPatch()]);
    }

    public function getMajor(): int
    {
        return $this->versionNumber >> 16 & 255;
    }

    public function getMinor(): int
    {
        return $this->versionNumber >> 8 & 255;
    }

    public function getPatch(): int
    {
        return $this->versionNumber >> 0 & 255;
    }

    //

    public function equals($version): bool
    {
        return $this->getVersionNumber() == self::parse($version)->getVersionNumber();
    }

    public function greaterThan($version): bool
    {
        return $this->getVersionNumber() > self::parse($version)->getVersionNumber();
    }

    public function lessThan($version): bool
    {
        return $this->getVersionNumber() < self::parse($version)->getVersionNumber();
    }

    public function greaterThanOrEquals($version): bool
    {
        return $this->getVersionNumber() >= self::parse($version)->getVersionNumber();
    }

    public function lessThanOrEquals($version): bool
    {
        return $this->getVersionNumber() <= self::parse($version)->getVersionNumber();
    }

    //

    public function __toString(): string
    {
        return $this->getVersionString();
    }

    public static function parse($version): self
    {
        return $version instanceof self ? $version : new self($version);
    }
}
