<?php

declare(strict_types=1);

namespace App\Http\Requests\Contracts;

use Endroid\QrCode\Color\ColorInterface;

interface CreateQRModelInterface
{
    public function getQRContent(): string;

    public function getSize(): int;

    public function getFillColor(): ColorInterface;

    public function getBackgroundColor(): ColorInterface;
}
