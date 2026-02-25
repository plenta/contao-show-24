<?php

declare(strict_types=1);

/**
 * Contao Show #24 examples
 *
 * @copyright     Copyright (c) 2026, Plenta.io
 * @author        Christian Barkowsky <https://plenta.io>
 * @author        Plenta.io <https://plenta.io>
 * @link          https://github.com/plenta/
 */

namespace App\Twig;

use Twig\TwigFilter;
use Twig\Extension\AbstractExtension;

class RandpomEmojiExtension extends AbstractExtension
{
    private array $emojis = ['🍎','🚀','🔥','🌈','🎯','✨','🐳','🍕','🎉','🧠'];

    public function getFilters(): array
    {
        return [
            new TwigFilter('randpomEmoji', [$this, 'randpomEmoji']),
            new TwigFilter('isFeatured', [$this, 'isFeatured'], ['is_safe' => ['html']]),
            new TwigFilter('smartTruncate', [$this, 'smartTruncate']),
        ];
    }

    public function randpomEmoji(mixed $value = null): string
    {
        if ($value === null) {
            return $this->emojis[array_rand($this->emojis)];
        }

        return $value.' '.$this->emojis[random_int(0, count($this->emojis) - 1)];
    }

    public function isFeatured(string $headline, bool $featured = false): string
    {
        if (!$featured) {
            return $headline;
        }

        return $headline.' <span class="badge badge-featured">⭐</span>';
    }

    public function smartTruncate(string $text, int $length = 120): string
    {
        if (mb_strlen($text) <= $length) {
            return $text;
        }

        $cut = mb_substr($text, 0, $length);

        $cut = mb_substr($cut, 0, mb_strrpos($cut, ' '));

        return rtrim($cut, ' .,') . '…';
    }
}
